<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Participant\CreateRequest;
use App\Http\Requests\Participant\UpdateRequest;
use App\Models\EducationLevel;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ParticipantController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $search = request()->input('s');

        $query = User::whereRelation('roles', function ($q) {
            $q->where('name', 'participant');
        });

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        }

        return view('resource.participant.index', [
            'title' => __('Participant List'),
            'search' => $search,
            'participants' => $query->latest()
                ->paginate(10)
                ->appends(request()->query()),
        ]);
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('resource.participant.create', [
            'title' => __('Add Participant'),
            'educationLevels' => EducationLevel::all(),
        ]);
    }

    public function store(CreateRequest $request)
    {
        $this->authorize('create', User::class);

        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            if (isset($validatedData['photo'])) {
                $validatedData['photo'] = $validatedData['photo']->store('user/photo', 'public');
            }

            $user = User::create($validatedData);
            $user->assignRole('participant');
            $user->markEmailAsVerified();

            DB::commit();

            session()->flash('success', __('Participant successfully added'));

            return redirect()->route('participant.index');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            DB::rollBack();

            session()->flash('error', __('Failed to add participant'));

            return redirect()->back();
        }
    }

    public function show(User $user)
    {
        $this->authorize('view', [User::class, $user]);

        return view('resource.participant.show', [
            'title' => __('Show Participant'),
            'participant' => $user,
            'educationLevels' => EducationLevel::all(),
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', [User::class, $user]);

        return view('resource.participant.edit', [
            'title' => __('Edit Participant'),
            'participant' => $user,
            'educationLevels' => EducationLevel::all(),
        ]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $this->authorize('update', [User::class, $user]);

        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            if (isset($validatedData['photo'])) {
                if ($user->photo != null && file_exists(public_path('storage/'.$user->photo))) {
                    File::delete(public_path('storage/'.$user->photo));
                }

                $validatedData['photo'] = $validatedData['photo']->store('user/photo', 'public');
            }

            if ($validatedData['password'] != null) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            } else {
                unset($validatedData['password']);
            }

            $user->update($validatedData);

            DB::commit();

            session()->flash('success', __('Participant successfully updated'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            DB::rollBack();

            session()->flash('error', __('Failed to update participant'));

            return redirect()->back();
        }
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', [User::class, $user]);

        try {
            $user->forceDelete();

            if ($user->photo != null && file_exists(public_path('storage/'.$user->photo))) {
                File::delete(public_path('storage/'.$user->photo));
            }

            session()->flash('success', __('Participant successfully deleted'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to delete participant'));

            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lecturer\CreateRequest;
use App\Http\Requests\Lecturer\UpdateRequest;
use App\Models\Department;
use App\Models\EducationLevel;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LecturerController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);

        $search = request()->input('s');

        $query = User::whereRelation('roles', function ($q) {
            $q->where('name', 'lecturer');
        });

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            });
        }

        return view('resource.lecturer.index', [
            'title' => __('Lecturer List'),
            'search' => $search,
            'lecturers' => $query->latest()
                ->paginate(10)
                ->appends(request()->query()),
        ]);
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return view('resource.lecturer.create', [
            'title' => __('Add Lecturer'),
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
            $user->assignRole('lecturer');
            $user->markEmailAsVerified();
            $user->markVerified();

            DB::commit();

            session()->flash('success', __('Lecturer successfully added'));

            return redirect()->route('lecturer.index');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            DB::rollBack();

            session()->flash('error', __('Failed to add lecturer'));

            return redirect()->back();
        }
    }

    public function show(User $user)
    {
        $this->authorize('view', [User::class, $user]);

        return view('resource.lecturer.show', [
            'title' => __('Show Lecturer'),
            'lecturer' => $user,
            'educationLevels' => EducationLevel::all(),
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', [User::class, $user]);

        return view('resource.lecturer.edit', [
            'title' => __('Edit Lecturer'),
            'lecturer' => $user,
            'educationLevels' => EducationLevel::all(),
            'departments' => Department::all(),
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

            session()->flash('success', __('Lecturer successfully updated'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            DB::rollBack();

            session()->flash('error', __('Failed to update lecturer'));

            return redirect()->back();
        }
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', [User::class, $user]);

        try {
            $user->courses()->each(function ($course) {
                $course->courseParticipants()->forceDelete();
                $course->courseEducationLevels()->forceDelete();
                $course->forceDelete();
            });

            $user->forceDelete();

            if ($user->photo != null && file_exists(public_path('storage/'.$user->photo))) {
                File::delete(public_path('storage/'.$user->photo));
            }

            session()->flash('success', __('Lecturer successfully deleted'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to delete lecturer'));

            return redirect()->back();
        }
    }

    public function verify(User $user)
    {
        try {
            $user->is_verified = true;
            $user->save();

            session()->flash('success', __('Lecturer verification successfully activated'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to activate lecturer verification'));

            return redirect()->back();
        }
    }

    public function unverified(User $user)
    {
        try {
            $user->is_verified = false;
            $user->save();

            session()->flash('success', __('Lecturer verification successfully deactivated'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to deactivate lecturer verification'));

            return redirect()->back();
        }
    }
}

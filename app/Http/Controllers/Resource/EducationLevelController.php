<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\EducationLevel\CreateRequest;
use App\Http\Requests\EducationLevel\EditRequest;
use App\Models\EducationLevel;
use Exception;
use Illuminate\Support\Facades\Log;

class EducationLevelController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', EducationLevel::class);

        $search = request()->input('s');

        $query = EducationLevel::query();

        if ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        }

        return view('resource.education-level.index', [
            'title' => __('Education Level List'),
            'search' => $search,
            'educationLevels' => $query->latest()
                ->paginate(10)
                ->appends(request()->query()),
        ]);
    }

    public function store(CreateRequest $request)
    {
        $this->authorize('create', EducationLevel::class);

        try {
            $validatedData = $request->validated();

            EducationLevel::create($validatedData);

            session()->flash('success', __('Education level successfully added'));

            return redirect()->route('education-level.index');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to add education level'));

            return redirect()->back();
        }
    }

    public function edit(EducationLevel $educationLevel)
    {
        $this->authorize('update', [EducationLevel::class, $educationLevel]);

        $script = '
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const modalElement = document.getElementById("editModal");
                const modal = new coreui.Modal(modalElement);
                modal.show();
            });
        </script>
        ';

        session()->flash('script', $script);

        return redirect()->route('education-level.index')
            ->with('educationLevel', $educationLevel);
    }

    public function update(EditRequest $request, EducationLevel $educationLevel)
    {
        $this->authorize('update', [EducationLevel::class, $educationLevel]);

        try {
            $validatedData = $request->validated();

            $educationLevel->update($validatedData);

            session()->flash('success', __('Education level successfully updated'));

            return redirect()->route('education-level.index');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to update education level'));

            return redirect()->back()->withInput();
        }
    }

    public function destroy(EducationLevel $educationLevel)
    {
        $this->authorize('delete', [EducationLevel::class, $educationLevel]);

        try {
            $educationLevel->forceDelete();

            session()->flash('success', __('Education level successfully deleted'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to delete education level'));

            return redirect()->back();
        }
    }
}

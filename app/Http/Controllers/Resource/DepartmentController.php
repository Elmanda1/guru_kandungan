<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\CreateRequest;
use App\Http\Requests\Department\EditRequest;
use App\Models\Department;
use Exception;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Department::class);

        $search = request()->input('s');

        $query = Department::query();

        if ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        }

        return view('resource.department.index', [
            'title' => __('Department List'),
            'search' => $search,
            'departments' => $query->latest()
                ->paginate(10)
                ->appends(request()->query()),
        ]);
    }

    public function store(CreateRequest $request)
    {
        $this->authorize('create', Department::class);

        try {
            $validatedData = $request->validated();

            Department::create($validatedData);

            session()->flash('success', __('Department successfully added'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to add department'));

            return redirect()->back();
        }
    }

    public function edit(Department $department)
    {
        $this->authorize('update', [Department::class, $department]);

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

        return redirect()->route('department.index')
            ->with('department', $department);
    }

    public function update(EditRequest $request, Department $department)
    {
        $this->authorize('update', [Department::class, $department]);

        try {
            $validatedData = $request->validated();

            $department->update($validatedData);

            session()->flash('success', __('Department successfully updated'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to update department'));

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Department $department)
    {
        $this->authorize('delete', [Department::class, $department]);

        try {
            $department->forceDelete();

            session()->flash('success', __('Department successfully deleted'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to delete department'));

            return redirect()->back();
        }
    }
}

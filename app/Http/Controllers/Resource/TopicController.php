<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\Topic\CreateRequest;
use App\Http\Requests\Topic\EditRequest;
use App\Models\Topic;
use Exception;
use Illuminate\Support\Facades\Log;

class TopicController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Topic::class);

        $search = request()->input('s');

        $query = Topic::query();

        if ($search) {
            $query->where('name', 'like', '%'.$search.'%');
        }

        return view('resource.topic.index', [
            'title' => __('Topic List'),
            'search' => $search,
            'topics' => $query->latest()
                ->paginate(10)
                ->appends(request()->query()),
        ]);
    }

    public function store(CreateRequest $request)
    {
        try {
            $validatedData = $request->validated();

            Topic::create($validatedData);

            session()->flash('success', __('Topic successfully added'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to add topic'));

            return redirect()->back();
        }
    }

    public function edit(Topic $topic)
    {
        $this->authorize('update', [Topic::class, $topic]);

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

        return redirect()->route('topic.index')
            ->with('topic', $topic);
    }

    public function update(EditRequest $request, Topic $topic)
    {
        $this->authorize('update', [Topic::class, $topic]);

        try {
            $validatedData = $request->validated();

            $topic->update($validatedData);

            session()->flash('success', __('Topic successfully updated'));

            return redirect()->route('topic.index');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to update topic'));

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('delete', [Topic::class, $topic]);

        try {
            $topic->forceDelete();

            session()->flash('success', __('Topic successfully deleted'));

            return redirect()->back();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            session()->flash('error', __('Failed to delete topic'));

            return redirect()->back();
        }
    }
}

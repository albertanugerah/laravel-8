<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {

        if ($request->search) {
            $task = Task::where('task', 'LIKE', "%$request->search%")->paginate(4);

            return view('task.index', [
                'data' => $task,
            ]);
        }

        $task = Task::paginate(4);

        return view('task.index', [
            'data' => $task,
        ]);
    }

    public function create(): View
    {
        return view('task.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return string
     */
    public function store(TaskRequest $request): string
    {
        Task::create([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show(int $id)
    {
        return Task::find($id);

    }

    public function edit($id): View
    {
        $task = Task::find($id);

        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     */
    public function update(TaskRequest $request, $id): int|string
    {
        $task = Task::find($id);

        $task->update([
            'task' => $request->task,
            'user' => $request->user,
        ]);
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id): string
    {
        Task::find($id)->delete();
        return redirect('/tasks');

    }
}

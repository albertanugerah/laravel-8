<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private $taskList = [
        'first' => 'Eat',
        'second' => 'Sleep',
        'third' => 'Work'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(Request $request)
    {

        if ($request->search) {
            $tasks = DB::table('tasks')->where('task', 'LIKE', "%$request->search%")->get();
            return $tasks;
        }

        $tasks = DB::table('tasks')->get();
        return $tasks;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return string
     */
    public function store(Request $request): string
    {
        DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user
        ]);

        return 'success';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return int
     */
    public function show($id)
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        ddd($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id): int|string
    {
        DB::table('tasks')->where('id', $id)->update([
            'task' => $request->task,
            'user' => $request->user,
        ]);
        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(Request $request)
    {

        if ($request->search) {
            return DB::table('tasks')->where('task', 'LIKE', "%$request->search%")->get();
        }

        return DB::table('tasks')->get();
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
    public function show($id): int
    {
        $task = DB::table('tasks')->where('id', $id)->first();
        return 'success';
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
     * @return string
     */
    public function destroy($id): string
    {
        DB::table('tasks')->where('id', $id)->delete();
        return 'success';
    }
}

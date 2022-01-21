<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Todo/Index', [
            'todos' => Todo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = Todo::create(['title' => $request->get('title')]);

        return redirect()
            ->route('todos.index')
            ->with('status', 'Todo #' . $todo->id . ' has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($todo = Todo::find($id))) {
            return back()->with('status', 'Todo not found!');
        }

        if ($request->has('toggle')) {
            $todo->update([
                'completed_at' => is_null($todo->completed_at) ? now() : null,
            ]);
        }

        return redirect()
            ->route('todos.index')
            ->with('status', 'Todo #' . $todo->id . ' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($todo = Todo::find($id))) {
            return back()->with('status', 'Todo not found!');
        }

        $todo->delete();

        return redirect()
            ->route('todos.index')
            ->with('status', 'Todo #' . $todo->id . ' has been deleted!');
    }
}

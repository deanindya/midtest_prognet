<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Category;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Todo();
        $category = Category::all();
        return view('todo.form', compact('data', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Todo();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->category_id = $request->category_id;
        $data->save();

        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Todo::findOrFail($id);
        $category = Category::all();

        return view('todo.form', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Todo::findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->category_id = $request->category_id;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Todo::findOrFail($id);
        $data->delete();

        return redirect()->route('welcome');
    }
}

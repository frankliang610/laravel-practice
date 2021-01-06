<?php

namespace App\Http\Controllers;

use App\Hobby;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hobbies = Hobby::orderBy('created_at', 'DESC')->paginate(10);
        return view('hobby.index', [
            'hobbies' => $hobbies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobby.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ]);

        $hobby = new Hobby([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);
        $hobby->save();
        return $this->index()->with([
            'message_success' => "The hobby <b>" . $hobby->name . "</b> has been created successfully."
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Hobby $hobby
     * @return \Illuminate\Http\Response
     */
    public function show(Hobby $hobby)
    {
        return view('hobby.show', [
            'hobby' => $hobby
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Hobby $hobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Hobby $hobby)
    {


        return view('hobby.edit', [
            'hobby' => $hobby
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Hobby $hobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hobby $hobby)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5',
        ]);

        $hobby->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $this->index()->with([
            'message_success' => "The hobby <b>" . $hobby->name . "</b> has been updated successfully."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Hobby $hobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobby $hobby)
    {
        $old_name = $hobby->name;
        $hobby->delete();
        return $this->index()->with([
            'message_success' => "The hobby <b>" . $old_name . "</b> has been deleted successfully."
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Current route name
     * 
     * @param string
     */
    private $route_name;

    public function __construct()
    {
        $this->route_name = substr(\Request::route()->getName(), 0, strrpos(\Request::route()->getName(), '.'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'collection' => User::all(),
            'route_name' => $this->route_name,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            'inputs' => [
                ['type' => 'string', 'name' => 'name'],
                ['type' => 'number', 'name' => 'points']
            ],
            'route_name' => $this->route_name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'points' => 'required|integer',
        ]);

        $user = new User;

        $user->name = $validatedData['name'];
        $user->points = $validatedData['points'];
        $user->created_at = now();
        $user->updated_at = now();

        $user->save();

        return redirect()->route($this->route_name . ".index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('edit', [
            'inputs' => [
                ['type' => 'string', 'name' => 'name', 'value' => $user->name],
                ['type' => 'number', 'name' => 'points', 'value' => $user->points]
            ],
            'collection' => $user,
            'route_name' => $this->route_name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('edit', [
            'inputs' => [
                ['type' => 'string', 'name' => 'name', 'value' => $user->name],
                ['type' => 'number', 'name' => 'points', 'value' => $user->points]
            ],
            'collection' => $user,
            'route_name' => $this->route_name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'points' => 'required|integer',
        ]);

        $user->name = $validatedData['name'];
        $user->points = $validatedData['points'];
        $user->created_at = now();
        $user->updated_at = now();

        $user->save();

        return redirect()->route($this->route_name . ".index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->forceDelete();

        return redirect()->route($this->route_name . ".index");
    }
}

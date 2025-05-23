<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return response()->json([
            'status'=>true, 
            'data'=>$users,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.creste');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request);
        return response()->json([
            'status'=>true,
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated=$request->validated([
            'fio'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'phone'=>'required|string|max:20',
            'login'=>'required|string|max:unique:users|max:5',
            'password'=>'required|string|min:8|max:255|confirm',
        ]);
        $validated['password']=Hash::make($validated['password']);
       
        $user->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('listUser', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::findOrFail($id);
        return view('user_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate input data
        $requestData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,customer',
            // Update to customer
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user data
        $user->fill($requestData);

        // Check if password is being updated
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the updated user data
        $user->save();

        // Flash a success message (optional)
        // flash('User data has been updated successfully')->success();

        // Redirect to the user list
        return redirect()->route('user'); // Update with the correct route
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

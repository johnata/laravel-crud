<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\Models\User;

class UserController extends Controller
{
    public readonly User $user;
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->user->all();
        return view('users/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users/form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);
        $created = $this->user->create($validated);
        if ($created) {
            return redirect()->route('users.index')->with('message_success', 'Successfully created');
        }
        return redirect()->back()->with('message_error', 'Error create');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users/show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users/form', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $updated = $this->user->where('id', $id)->update($request->except(['_token', '_method', 'password']));
        if ($updated) {
            return redirect()->route('users.index')->with('message_success', 'Successfully updated');
        }
        return redirect()->back()->with('message_error', 'Error update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}

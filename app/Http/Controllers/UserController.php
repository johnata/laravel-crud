<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * Atributo que representa o modelo User.
     * Este atributo é utilizado para interagir com a tabela de usuários no banco de dados.
     *
     * @var User
     */
    public readonly User $user;

    /**
     * Construtor da classe UserController.
     * Este construtor inicializa o modelo User e chama o construtor da classe pai.
     *
     * @return void
     */
    public function __construct()
    {
        // Chama o construtor da classe pai
        parent::__construct();
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = $this->user->latest()->paginate(10);
        return view('pages.users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users/form');
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
        return view('pages.users/show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.users/form', ['user' => $user]);
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

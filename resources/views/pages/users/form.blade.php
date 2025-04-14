@extends('layouts.default')

@section('title', Route::is('*create') ? 'Create User' : 'Edit User')

@section('contents')
    @if(isset($user))
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
        {!! Form::hidden('id', $user->id) !!}
    @else
        {!! Form::open(['route' => 'users.store', 'class' => 'mx-auto']) !!}
    @endif

    <div class="mb-5">
        <x-form.input
            name="first_name"
            label="First Name"
            :value="$user->first_name ?? null"
            required
        />
    </div>

    <div class="mb-5">
        <x-form.input
            name="last_name"
            label="Last Name"
            :value="$user->last_name ?? null"
            required
        />
    </div>

    <div class="mb-5">
        <x-form.input
            name="email"
            label="E-mail"
            :value="$user->email ?? null"
            required
        />
    </div>

    @if(!isset($user))
        <div class="mb-5">
            <x-form.input
                name="password"
                label="Password"
                type="password"
                required
            />
        </div>
    @endif

    <div class="mb-5">
        <x-form.button
            type="primary"
            method="submit"
        >
            Salvar
        </x-form.button>
        <x-form.button
            type="secondary"
            link="{{ route('users.index') }}"
            method="GET"
        >
            Cancelar
        </x-form.button>
    </div>

    {!! Form::close() !!}
@endsection

@extends('master')

@section('contents')
    <h2 class="text-xl font-bold">Create User</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 rounded-2xl p-3 mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif (session()->has('message_error'))
        <div class="bg-red-100 text-red-600 rounded-2xl p-3 mb-3">
            {{ session()->get('message_error'); }}
        </div>
    @endif

    @if(isset($user))
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
        {!! Form::hidden('id', $user->id) !!}
    @else
        {!! Form::open(['route' => 'users.store']) !!}
    @endif

    {!! Form::label("name", "Name") !!}
    {!! Form::text('name', $user->name ?? null, ['class' => 'border border-slate-400 px-2']) !!}

    {!! Form::label("email", "E-mail") !!}
    {!! Form::text('email', $user->email ?? null, ['class' => 'border border-slate-400 px-2']) !!}

    @if(!isset($user))
        {!! Form::label("password", "Password") !!}
        {!! Form::password('password', ['class' => 'border border-slate-400 px-2']) !!}
    @endif
    <br><br>
    {!! Form::submit('Salvar', ['class' => 'border border-green-600 text-green-900 bg-green-500 px-2']) !!}

    {!! Form::close() !!}
@endsection

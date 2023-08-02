@extends('master')

@section('contents')
    <h2>User Show</h2>
    <div><strong>Name:</strong> {{ $user->name }}</div>
    <div><strong>E-mail:</strong> {{ $user->email }}</div>
    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
    {!! Form::submit('Delete', ['class' => 'border border-green-600 text-green-900 bg-green-500 px-2']) !!}
    {!! Form::close() !!}
@endsection

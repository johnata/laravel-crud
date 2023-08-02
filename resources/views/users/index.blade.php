@extends('master')
@section('contents')
    <div class="bg-gray-100 p-3">
        <h2 class="text-xl text-center font-bold">Users</h2>
    </div>
    @if (session()->has('message_success'))
        <div class="bg-green-100 text-green-600 rounded-2xl p-3 mb-3">
            {{ session()->get('message_success'); }}
        </div>
    @endif

    <div class="px-3">
        <div class="text-right">
            <a href="{{ route('users.create') }}" class="border border-green-600 text-green-900 bg-green-500 px-2 py-1">Create User</a>
        </div>
        <table class="table-auto w-full mt-3">
            <thead>
              <tr>
                <th class="text-left">Name</th>
                <th class="text-left">Email</th>
                <th class="text-left">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b-2 border-green-600 hover:bg-green-100">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['user' => $user]) }}" class="text-green-700">Edit</a>
                            | <a href="{{ route('users.show', ['user' => $user]) }}" class="text-green-700">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection

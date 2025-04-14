@extends('layouts.default')
@section('title', 'Users')
@section('contents')
    @if (session()->has('message_success'))
        <div class="bg-green-100 text-green-600 rounded-2xl p-3 mb-3">
            {{ session()->get('message_success') }}
        </div>
    @endif

    <div class="px-3">
        {{-- <div class="text-right mb-4">
            <a href="{{ route('users.create') }}" class="border border-green-600 text-green-900 bg-green-500 px-4 py-2 rounded-lg flex items-center">
                <x-icons.plus class="mr-2" />
                Create User
            </a>
        </div> --}}

        <table class="table-auto w-full mt-3 border-collapse">
            <thead>
              <tr class="bg-green-200 text-left">
                <th class="py-2 px-4">Full Name</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b-2 border-green-600 hover:bg-green-100">
                        <td class="py-2 px-4">{{ $user->full_name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4 flex items-center">
                            <!-- Edit Icon -->
                            <a href="{{ route('users.edit', ['user' => $user]) }}" class="text-green-700 hover:text-green-900 flex items-center mr-4">
                                <x-icons.edit />
                            </a>
                            <!-- Show Icon -->
                            <a href="{{ route('users.show', ['user' => $user]) }}" class="text-green-700 hover:text-green-900 flex items-center">
                                <x-icons.viewer />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $users->onEachSide(1)->links() }}
        </div>
    </div>
@endsection

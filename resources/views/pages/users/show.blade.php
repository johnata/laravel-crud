@extends('layouts.default')

@section('title', 'User Details')

@section('contents')
    <!-- Dados do Usuário -->
    <div class="mb-4">
        <strong class="text-lg">UUID:</strong>
        <p class="">{{ $user->uuid }}</p>
    </div>
    <div class="mb-4">
        <strong class="text-lg">Full Name:</strong>
        <p class="">{{ $user->full_name }}</p>
    </div>

    <div class="mb-4">
        <strong class="text-lg">E-mail:</strong>
        <p class="">{{ $user->email }}</p>
    </div>

    <div class="mb-4">
        <strong class="text-lg">Phone:</strong>
        <p class="">{{ $user->phone }}</p>
    </div>
    <!-- Botões de Ação -->
    <div class="flex space-x-4">
        <!-- Botão Voltar -->
        <x-form.button type="secondary" link="{{ route('users.index') }}">
            Back to Users
        </x-form.button>

        <!-- Formulário de Excluir -->
        <x-form.button
            type="danger"
            link="{{ route('users.destroy', $user->id) }}"
            method="DELETE"
        >
            Delete User
        </x-form.button>
    </div>
@endsection

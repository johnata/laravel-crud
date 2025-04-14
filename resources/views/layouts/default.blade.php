<!DOCTYPE html>
<html lang="pt" class="dark">
    <head>
        @include('includes.head')
    </head>
    <body class="bg-green-50 dark:bg-green-950 text-green-900 dark:text-green-100 transition-colors duration-300">
        <!-- Header -->
        @include('includes.header')

        <!-- Conteúdo -->
        <main class="p-6 pb-24 lg:px-12 max-w-7xl mx-auto">
            {{-- <h1 class="text-2xl font-semibold">@yield('title')</h1> --}}
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-semibold">@yield('title')</h1>
                    @if(Route::is('*index'))
                        <x-form.button
                            type="primary"
                            link="{{ route(Str::before(Route::currentRouteName(), '.index') . '.create') }}"
                            class="flex items-center space-x-2"
                        >
                            <x-icons.plus class="w-5 h-5" />Create
                        </x-form.button>
                    @endif
            </div>
            <div class="bg-white shadow-md rounded-lg p-6 mb-4 dark:bg-green-900">
                @yield('contents')
            </div>
        </main>
        <!-- Footer -->
        @include('includes.footer')
    </body>
</html>

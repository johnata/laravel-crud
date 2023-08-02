<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CRUD</title>
</head>

<body class="p-0">
    <nav class="bg-white border-green-200 dark:bg-green-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Crud Laravel</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-green-500 rounded-lg md:hidden hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-200 dark:text-green-400 dark:hover:bg-green-700 dark:focus:ring-green-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-green-100 rounded-lg bg-green-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-green-800 md:dark:bg-green-900 dark:border-green-700">
                    <li>
                        <a href="{{ route('home') }}"
                            @if (URL::current() === route('home')) class="block py-2 pl-3 pr-4 text-white bg-green-700 rounded md:bg-transparent md:text-green-700 md:p-0 dark:text-white md:dark:text-green-500"
                                aria-current="page"
                            @else
                                class="block py-2 pl-3 pr-4 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-green-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            @endif
                        >Home</a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}"
                            @if (URL::current() === route('users.index')) class="block py-2 pl-3 pr-4 text-white bg-green-700 rounded md:bg-transparent md:text-green-700 md:p-0 dark:text-white md:dark:text-green-500"
                                aria-current="page"
                            @else
                                class="block py-2 pl-3 pr-4 text-green-900 rounded hover:bg-green-100 md:hover:bg-transparent md:border-0 md:hover:text-green-700 md:p-0 dark:text-white md:dark:hover:text-green-500 dark:hover:bg-green-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            @endif
                        >Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="grid gap-4">
        @yield('contents')
    </div>
</body>

</html>

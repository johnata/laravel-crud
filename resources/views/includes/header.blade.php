<header class="w-full px-8 py-4 bg-green-200 dark:bg-green-800 shadow-md">
    <!-- Menu -->
    <div class="flex justify-between items-center lg:px-12 max-w-7xl mx-auto">
        <!-- Menu: Left side -->
        <div class="flex items-center gap-8 w-full justify-between md:justify-start">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" class="text-green-800 dark:text-green-200 font-bold text-xl">
                    <!-- componentes/icons/logo.blade.php -->
                    <x-icons.logo class="w-12 h-12" />
                </a>
            </div>

            <!-- Navegação -->
            <nav class="flex gap-4 hidden md:flex">
                @foreach ($modulesMenu as $module)
                    <a href="{{ $module['url'] }}"
                    @if (URL::current() === $module['url'])
                        class="text-green-800 dark:text-green-200 font-semibold border-b-2 border-green-600 dark:border-green-300"
                    @else
                        class="hover:text-green-700 dark:hover:text-green-300"
                    @endif
                    >{{ $module['name'] }}</a>
                @endforeach
            </nav>
        </div>

        <!-- Menu: Right side -->
        <div class="flex items-center gap-4 relative">
            <!-- Botão dark/light -->
            <button id="toggleTheme"
                class="p-2 rounded-full bg-green-100 dark:bg-green-700 hover:bg-green-200 dark:hover:bg-green-600 transition"
            >
                <!-- light mode -->
                <x-icons.light-mode id="sunIcon" />
                <!-- dark mode -->
                <x-icons.dark-mode id="moonIcon" />
            </button>

            <!-- Avatar com submenu -->
            <div class="relative">
                <!-- Botão de Usuário -->
                <button
                    id="userMenuBtn"
                    class="w-9 h-9 bg-gray-700 dark:bg-gray-200 rounded-full flex items-end justify-center overflow-hidden"
                >
                    <x-icons.default-user />
                </button>

                <!-- Submenu do usuário (posição à direita e logo abaixo do botão Hamburger) -->
                <div
                    id="userMenu"
                    class="absolute right-0 mt-2 w-40 bg-green-100 dark:bg-green-700 rounded-md shadow-lg p-2 hidden z-10"
                >
                    <a href="#" class="block px-4 py-2 text-sm text-green-800 dark:text-green-100 hover:bg-green-200 dark:hover:bg-green-600 rounded">Perfil</a>
                    <a href="#" class="block px-4 py-2 text-sm text-green-800 dark:text-green-100 hover:bg-green-200 dark:hover:bg-green-600 rounded">Sair</a>
                </div>
            </div>

            <!-- Menu: sandwich menu icon -->
            <button id="hamburgerMenu" class="text-green-800 dark:text-green-200 focus:outline-none md:hidden">
                <x-icons.hamburger-menu class="w-6 h-6" />
            </button>

            <!-- Menu: Sandwich Menu Items -->
            <div id="mobileMenu" class="fixed top-0 right-0  h-full bg-green-100 dark:bg-green-700 shadow-xl transform translate-x-full md:hidden transition-transform duration-300">
                <div class="flex justify-start">
                    <button id="closeMenu" class="ml-auto text-green-800 dark:text-green-200 p-2">
                        <x-icons.close class="w-6 h-6" />
                    </button>
                </div>
                @foreach ($modulesMenu as $module)
                    <a href="{{ $module['url'] }}"
                    @if (URL::current() === $module['url'])
                        class="block px-4 py-2 text-green-800 dark:text-green-100 hover:bg-green-200 dark:hover:bg-green-600 font-bold"
                    @else
                        class="block px-4 py-2 text-green-800 dark:text-green-100 hover:bg-green-200 dark:hover:bg-green-600"
                    @endif
                    >{{ $module['name'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</header>

<footer class="fixed bottom-0 left-0 z-20 w-full p-4 border-t shadow-sm bg-green-200 border-green-200 dark:bg-green-800 dark:border-green-700">
    <div class="flex justify-between items-center lg:px-12 max-w-7xl mx-auto">
        <span class="text-sm text-gray-500 dark:text-gray-400 sm:text-center">
            <a href="https://github.com/johnata" class="hover:underline text-gray-700 dark:text-gray-300" target="_blank">Johnata Santos</a>
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
            @foreach ($modulesMenu as $module)
                <li>
                    <a href="{{ $module['url'] }}"
                    @if (URL::current() === $module['url'])
                        class="hover:underline me-4 md:me-6 font-semibold"
                    @else
                        class="hover:underline me-4 md:me-6"
                    @endif
                    >{{ $module['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</footer>

<!-- Scripts -->
<script>
    tailwind.config = {
        darkMode: 'class',
    };

    const toggle = document.getElementById('toggleTheme');
    const html = document.documentElement;

    // Persistência no localStorage
    if (
        localStorage.theme === 'dark' ||
        (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
        html.classList.add('dark');
    } else {
        html.classList.remove('dark');
    }

    toggle.addEventListener('click', () => {
        html.classList.toggle('dark');
        localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
    });

    // Submenu do usuário
    const userMenuBtn = document.getElementById('userMenuBtn');
    const userMenu = document.getElementById('userMenu');

    userMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        userMenu.classList.toggle('hidden');
    });

    // Fechar submenu ao clicar fora
    window.addEventListener('click', () => {
        userMenu.classList.add('hidden');
    });

    userMenu.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    // Toggle para o menu mobile
    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu = document.getElementById('closeMenu');

    hamburgerMenu.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-x-full');
    });

    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.add('translate-x-full');
    });

    // Fechar o menu mobile ao clicar fora
    window.addEventListener('click', (e) => {
        if (!mobileMenu.contains(e.target) && !hamburgerMenu.contains(e.target)) {
            mobileMenu.classList.add('translate-x-full');
        }
    });
</script>

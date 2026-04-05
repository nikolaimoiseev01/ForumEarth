<header class="fixed top-0 w-full bg-bright-500 rounded-b-3xl py-4 z-[999]">
    <div class="content flex items-center">
        <x-application-logo class="w-20 mr-10"/>

        <!-- Mobile Navigation -->
        <div class="flex gap-4 text-base md:hidden mx-auto font-medium">
            <a href="/#about">О форуме</a>
            <a href="/#universities">Участники</a>
            <a href="#footer">Контакты</a>
            <a href="/#speakers">Спикеры</a>
            <a href="/#orgs">Организаторы</a>
            <a href="/#news">Новости</a>
            <a wire:navigate href="{{route('portal.program')}}">Программа</a>
            <a wire:navigate href="{{route('portal.journalist-form')}}">Аккредитация для СМИ</a>
        </div>

        <!-- Social Links (smaller) -->
        <div class="flex gap-2 mr-4 md:hidden">
            <a href="https://vk.com/forumzemlyane" target="_blank"
               class="flex items-center justify-center bg-blue-500 w-8 h-8 p-1.5 rounded cursor-pointer hover:bg-blue-600 transition-colors">
                <img src="/fixed/vk-logo.svg" class="w-full" alt="VK">
            </a>
            <a href="https://t.me/forumzemlyane" target="_blank"
               class="flex items-center justify-center bg-blue-500 w-8 h-8 p-1.5 rounded cursor-pointer hover:bg-blue-600 transition-colors">
                <img src="/fixed/telegram-logo.svg" class="w-full" alt="Telegram">
            </a>
            <a href="https://dzen.ru/forumzemlyane" target="_blank"
               class="flex items-center justify-center bg-blue-500 w-8 h-8 p-1.5 rounded cursor-pointer hover:bg-blue-600 transition-colors">
                <img src="/fixed/zen-logo.svg" class="w-full" alt="Дзен">
            </a>
        </div>

        <!-- Auth Section -->
        <div class="ml-auto flex items-center gap-3">
            @guest
                <a wire:navigate href="{{ route('auth.login') }}"
                   class="px-4 py-2 bg-white text-[#006699] rounded-lg font-medium hover:bg-gray-50 transition-colors">
                    Войти
                </a>
            @else
                <!-- User Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                            class="flex items-center gap-2 px-4 py-2 bg-white text-[#006699] rounded-lg font-medium hover:bg-gray-50 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-90"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-90"
                         @click.away="open = false"
                         class="absolute right-0 top-full mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                        <div class="py-2">
                            <div class="px-4 py-2 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                            <a wire:navigate href="{{ route('account.settings') }}"
                               class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Личный кабинет
                            </a>
                            <a wire:navigate href="{{ route('account.webinars') }}"
                               class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Расписание вебинаров
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit"
                                        class="flex items-center gap-3 w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors text-left">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Выйти
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endguest
        </div>

        <!-- Desktop Menu Toggle -->
        <div class="hidden md:flex justify-center ml-4">
            <div x-data="{ open: false }" class="relative flex flex-col justify-center">
                <div @click="open = !open"
                     class="tham tham-e-squeeze tham-w-6"
                     :class="open ? 'tham-active' : ''"
                >
                    <div class="tham-box">
                        <div class="tham-inner bg-bright-100"></div>
                    </div>
                </div>
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    class="absolute right-0 top-6 mt-2 w-48 bg-white rounded-md shadow-lg overflow-hidden z-20">
                    <ul class="py-2">
                        <li><a href="/#about" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">О форуме</a></li>
                        <li><a href="/#universities" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Участники</a></li>
                        <li><a href="/#footer" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Контакты</a></li>
                        <li><a href="/#speakers" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Спикеры</a></li>
                        <li><a href="/#orgs" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Организаторы</a></li>
                        <li><a href="/#news" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Новости</a></li>
                        <li><a wire:navigate href="{{route('portal.program')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Программа</a></li>
                        <li><a wire:navigate href="{{route('portal.journalist-form')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Аккредитация для СМИ</a></li>
                        <li><a wire:navigate href="{{route('portal.participation-form')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-50">Анкета участников</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

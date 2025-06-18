<header class="fixed top-0 w-full bg-bright-500 rounded-b-3xl py-4 z-[999]">
    <div class="content flex items-center">
        <x-application-logo class="w-20 mr-10"/>
        <div class="flex gap-4 text-lg md:hidden mx-auto font-medium">
            <a href="/#about">О форуме</a>
            <a href="/#universities">Участники</a>
            <a href="#footer">Контакты</a>
            <a href="/#speakers">Спикеры</a>
            <a href="/#orgs">Организаторы</a>
            <a href="/#news">Новости</a>
            <a wire:navigate href="{{route('portal.journalist-form')}}">Аккредитация для СМИ</a>
        </div>
        <div class="flex gap-4 ml-auto md:hidden">
            <a href="https://vk.com/forumzemlyane" target="_blank" class="flex items-center justify-center bg-blue-500 w-12 h-12 p-2 rounded cursor-pointer">
                <img src="/fixed/vk-logo.svg" class="w-full" alt="">
            </a>
            <a href="https://t.me/forumzemlyane" target="_blank" class="flex items-center justify-center bg-blue-500 w-12 h-12 p-2 rounded cursor-pointer">
                <img src="/fixed/telegram-logo.svg" class="w-full" alt="">
            </a>
            <a href="https://dzen.ru/forumzemlyane" target="_blank" class="flex items-center justify-center bg-blue-500 w-12 h-12 p-2 rounded cursor-pointer">
                <img src="/fixed/zen-logo.svg" class="w-full" alt="">
            </a>
        </div>

        <div class="hidden md:flex justify-center ml-auto">
            <div class="flex justify-center">
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
                            <li>
                                <a wire:navigate href="/" class="block px-4 py-2 text-gray-800 ">Главная</a>
                            </li>
                            <li>
                                <a href="/#map" class="block px-4 py-2 text-gray-800 ">О форуме</a>
                            </li>
                            <li>
                                <a wire:navigate href="" class="block px-4 py-2 text-gray-800 ">Участники</a>
                            </li>
                            <li>
                                <a wire:navigate href="" class="block px-4 py-2 text-gray-800 ">Контакты</a>
                            </li>
                            <li>
                                <a wire:navigate href="{{route('portal.journalist-form')}}" class="block px-4 py-2 text-gray-800 ">Аккредитация для СМИ</a>
                            </li>
                            <li>
                                <a wire:navigate href="{{route('portal.participation-form')}}"
                                   class="block px-4 py-2 text-gray-800 ">Анкета участников</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

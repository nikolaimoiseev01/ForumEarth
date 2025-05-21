<header class="fixed top-0 w-full bg-bright-500 rounded-b-3xl py-4 z-20">
    <div class="content flex items-center">
        <x-application-logo class="w-20 mr-10"/>
        <div class="flex gap-4 text-lg md:hidden">
            <a href="/#about">О форуме</a>
            <a href="">Участники</a>
            <a href="#footer">Контакты</a>
            <a href="/#journalist-form">Аккредитация для СМИ</a>
        </div>
{{--        <svg class="ml-auto md:hidden" width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--            <g clip-path="url(#clip0_0_144)">--}}
{{--                <mask id="mask0_0_144" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="49"--}}
{{--                      height="49">--}}
{{--                    <path--}}
{{--                        d="M42.367 0.0228386H6.35769C3.04313 0.0228386 0.35614 2.70902 0.35614 6.02259V42.0211C0.35614 45.3347 3.04313 48.0209 6.35769 48.0209H42.367C45.6816 48.0209 48.3686 45.3347 48.3686 42.0211V6.02259C48.3686 2.70902 45.6816 0.0228386 42.367 0.0228386Z"--}}
{{--                        fill="white"/>--}}
{{--                </mask>--}}
{{--                <g mask="url(#mask0_0_144)">--}}
{{--                    <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                          d="M48.3686 0.0228386H0.35614V48.0209H48.3686V0.0228386ZM14.1611 22.3952L34.1126 14.7039C35.0229 14.2921 35.9029 14.9232 35.5552 16.3171L32.1579 32.323C31.9206 33.4614 31.2352 33.7314 30.2809 33.206L25.1058 29.3846L22.6177 31.8032C22.6084 31.8121 22.5992 31.8211 22.5901 31.8299C22.3125 32.0983 22.0824 32.3207 21.5814 32.3207L21.9347 27.0424L31.5368 18.378C31.9576 18.0046 31.4457 17.8211 30.8853 18.1621L19.0337 25.6373L13.9113 24.0399C12.8074 23.7013 12.7995 22.9419 14.1611 22.3952Z"--}}
{{--                          fill="#70AB34"/>--}}
{{--                </g>--}}
{{--            </g>--}}
{{--            <defs>--}}
{{--                <clipPath id="clip0_0_144">--}}
{{--                    <rect width="48.0124" height="47.998" fill="white" transform="translate(0.35614 0.0228386)"/>--}}
{{--                </clipPath>--}}
{{--            </defs>--}}
{{--        </svg>--}}
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
                                <a wire:navigate href="" class="block px-4 py-2 text-gray-800 ">Аккредитация для СМИ</a>
                            </li>
                            <li>
                                <a wire:navigate href="" class="block px-4 py-2 text-gray-800 ">Анкета участников</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

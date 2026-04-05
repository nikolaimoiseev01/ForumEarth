<main class="flex-1 mt-16">
    <section class="bg-bright-500 py-20 rounded-t-[30px] relative" id="register-form">
        <svg class="absolute w-full opacity-60" width="1241" height="1274" viewBox="0 0 1241 1274"
             fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path
                d="M-520.977 538.256C-514.793 536.977 -511.136 533.854 -505.076 530.288C-418.232 479.196 -330.511 430.408 -239.282 387.425C-53.2432 299.771 140.103 229.03 328.297 146.361C336.517 142.75 355.881 132.321 354.735 141.225C353.028 154.471 346.72 166.707 342.388 179.34C319.146 247.123 325.477 229.214 295.33 316.394C220.569 532.593 -177.592 722.018 -266.081 933.084C-295.781 1003.92 -328.087 1074.47 -366.539 1141.11C-369.111 1145.57 -376.661 1158.89 -375.03 1154.01C-368.17 1133.46 -306.557 1089.73 -306.557 1089.73C-102.949 922.309 442.457 809.315 663.895 667.205C724.441 628.35 785.635 590.079 843.711 547.536C864.499 532.312 883.799 514.35 905.299 500.122C911.245 496.181 909.754 502.472 908.722 506.458C895.909 555.505 880.054 603.945 866.165 652.688C829.957 779.798 792.688 907.058 759.569 1035.02C757.056 1044.73 746.481 1057.71 753.808 1064.57C756.921 1067.48 759.935 1058.62 762.688 1055.37C779.119 1035.95 786.682 1027.49 806.884 1007.42C928.985 886.056 1066.37 784.97 1207.68 687.361C1211.42 684.777 1276.69 631.928 1284.26 642.313C1292.24 653.229 1296.44 704.349 1296.81 707.352C1300.31 736.192 1304.16 772.891 1306.94 802.179C1307.58 808.868 1307.1 911.796 1312.59 914.211C1319.96 917.461 1325.93 905.14 1332.4 900.32C1385.56 860.693 1439.1 821.429 1487.05 775.413C1639.4 629.209 1743.47 448.838 1852.32 270.457C1884.09 218.368 1916.77 160.318 1961.99 118.371"
                stroke="#70AB34" stroke-opacity="0.2" stroke-width="236.15" stroke-linecap="round"/>
        </svg>
        <h2 class="text-center  mb-20">Регистрация</h2>
        <form wire:submit="register"
              class="flex bg-bright-500 flex-col gap-12 rounded-3xl p-16 md:p-4 w-full max-w-5xl mx-auto relative">
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Имя')"/>
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required
                              autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Пароль')"/>

                <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Подтвердите пароль')"/>

                <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>
            <button type="submit"
                    class="w-full py-6 text-center bg-blue-500 text-bright-500 rounded-xl text-xl">
                <svg wire:loading aria-hidden="true" class="mx-auto w-8 h-8 text-neutral-tertiary animate-spin fill-blue-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span wire:loading.remove>Зарегистрироваться</span>
            </button>
        </form>

    </section>
</main>

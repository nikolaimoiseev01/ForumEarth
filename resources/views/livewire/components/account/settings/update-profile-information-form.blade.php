<div>
    <header class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">
            Основная информация
        </h3>
        <p class="text-sm text-gray-600">
            Обновите данные вашего профиля и email адрес
        </p>
    </header>

    <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Имя</label>
            <input wire:model="name" id="name" name="name" type="text" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#006699] focus:border-[#006699] transition-colors" 
                   required autofocus autocomplete="name" 
                   placeholder="Введите ваше имя">
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input wire:model="email" id="email" name="email" type="email" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#006699] focus:border-[#006699] transition-colors" 
                   required autocomplete="username" 
                   placeholder="your@email.com">
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-sm text-yellow-800">
                        <strong>Внимание:</strong> Ваш email адрес не подтвержден.
                    </p>
                    <button wire:click.prevent="sendVerification" 
                            class="mt-2 text-sm text-[#006699] hover:text-[#005588] font-medium underline focus:outline-none">
                        Отправить подтверждение повторно
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-green-600">
                            ✓ Новое письмо с подтверждением отправлено на ваш email.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" 
                    class="px-6 py-2 bg-gradient-to-r from-[#006699] to-[#005588] text-white font-medium rounded-lg hover:from-[#005588] hover:to-[#004477] transition-all duration-200 shadow-sm">
                Сохранить изменения
            </button>

            <div wire:loading wire:target="updateProfileInformation" class="flex items-center gap-2">
                <svg class="animate-spin h-4 w-4 text-[#006699]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-sm text-gray-600">Сохранение...</span>
            </div>

            @if (session()->has('profile-updated'))
                <div class="flex items-center gap-2 text-green-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm font-medium">Сохранено!</span>
                </div>
            @endif
        </div>
    </form>
</div>

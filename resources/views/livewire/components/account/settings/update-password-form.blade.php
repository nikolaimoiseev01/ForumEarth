<div>
    <header class="mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-2">
            Изменение пароля
        </h3>
        <p class="text-sm text-gray-600">
            Убедитесь, что ваш аккаунт использует надежный пароль для безопасности
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 mb-2">Текущий пароль</label>
            <input wire:model="current_password" id="update_password_current_password" name="current_password" type="password" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#006699] focus:border-[#006699] transition-colors" 
                   autocomplete="current-password" placeholder="Введите текущий пароль">
            @error('current_password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700 mb-2">Новый пароль</label>
            <input wire:model="password" id="update_password_password" name="password" type="password" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#006699] focus:border-[#006699] transition-colors" 
                   autocomplete="new-password" placeholder="Введите новый пароль">
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Подтверждение пароля</label>
            <input wire:model="password_confirmation" id="update_password_password_confirmation" name="password_confirmation" type="password" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#006699] focus:border-[#006699] transition-colors" 
                   autocomplete="new-password" placeholder="Повторите новый пароль">
            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" 
                    class="px-6 py-2 bg-gradient-to-r from-[#006699] to-[#005588] text-white font-medium rounded-lg hover:from-[#005588] hover:to-[#004477] transition-all duration-200 shadow-sm">
                Обновить пароль
            </button>

            <div wire:loading wire:target="updatePassword" class="flex items-center gap-2">
                <svg class="animate-spin h-4 w-4 text-[#006699]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-sm text-gray-600">Обновление...</span>
            </div>

            @if (session()->has('password-updated'))
                <div class="flex items-center gap-2 text-green-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm font-medium">Пароль обновлен!</span>
                </div>
            @endif
        </div>
    </form>
</div>

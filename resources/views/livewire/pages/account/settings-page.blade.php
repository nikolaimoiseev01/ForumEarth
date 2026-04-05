<div class="space-y-6 md:space-y-8 max-w-3xl">
    <!-- Profile Information Section -->
    <section class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-[#006699] to-[#005588] px-4 md:px-6 py-3 md:py-4">
            <h3 class="text-lg md:text-base font-semibold text-white flex items-center gap-2 md:gap-3">
                <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Профиль пользователя
            </h3>
            <p class="text-blue-100 text-xs md:text-sm mt-1">Управление основной информацией профиля</p>
        </div>

        <div class="p-4 md:p-6">
            <livewire:components.account.settings.update-profile-information-form/>
        </div>
    </section>

    <!-- Password Section -->
    <section class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="bg-gradient-to-r from-[#006699] to-[#005588] px-4 lg:px-6 py-3 lg:py-4">
            <h3 class="text-lg md:text-base lg:text-xl font-semibold text-white flex items-center gap-2 lg:gap-3">
                <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                Безопасность
            </h3>
            <p class="text-blue-100 text-xs lg:text-sm mt-1">Изменение пароля для защиты аккаунта</p>
        </div>

        <div class="p-4 lg:p-6">
            <livewire:components.account.settings.update-password-form/>
        </div>
    </section>

</div>

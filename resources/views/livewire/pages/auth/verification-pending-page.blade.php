<div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg">
        <div class="text-center">
            <!-- Email Icon -->
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-[#006699] bg-opacity-10 mb-4">
                <svg class="h-8 w-8 text-[#006699]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                Подтвердите ваш email
            </h3>

            <p class="text-gray-600 mb-6">
                Для доступа к личному кабинету необходимо подтвердить email адрес. Мы отправили письмо с ссылкой для подтверждения на вашу почту.
            </p>

            @if ($retrySent)
                <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                    <p class="text-sm text-green-700">
                        Новое письмо с подтверждением отправлено!
                    </p>
                </div>
            @endif

            <div class="space-y-4">
                <button
                    wire:click="resendVerificationEmail"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#006699] hover:bg-[#005588] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#006699] transition-colors"
                >
                    <svg wire:loading aria-hidden="true" class="mx-auto w-6 h-6 text-neutral-tertiary animate-spin fill-blue-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span wire:loading.remove>Отправить письмо повторно</span>
                </button>

                <a href="{{ route('portal.index') }}"
                   class="w-full flex justify-center py-3 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors"
                >
                    Вернуться на главную
                </a>
            </div>

            <p class="mt-6 text-sm text-gray-500">
                Не получили письмо? Проверьте папку "Спам" или нажмите кнопку выше для повторной отправки.
            </p>
        </div>
    </div>
</div>

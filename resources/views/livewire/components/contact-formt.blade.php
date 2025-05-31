<form wire:submit.prevent="send" class="flex flex-col max-w-96">
    <div class="flex flex-col gap-2">
        <input required wire:model='email' type="email" class="text-dark-500" placeholder="Ваш Email">
        <input required wire:model='name' type="text" class="text-dark-500" placeholder="Ваше имя">
        <textarea required wire:model='message' class="text-dark-500" placeholder="Сообщение"></textarea>
        <button
            class="bg-dark-500 w-full flex items-center justify-center py-4 text-bright-100 transition hover:bg-coral-500"
            type="submit">@if($sent)
                Отправлено!
            @else
                Отправить
            @endif</button>
    </div>
</form>

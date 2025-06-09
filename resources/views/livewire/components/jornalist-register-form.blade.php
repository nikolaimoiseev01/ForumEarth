<form wire:submit="register" class="flex bg-bright-500 flex-col gap-12 rounded-3xl p-16 md:p-4 w-full max-w-5xl mx-auto relative">
    <input required wire:model="smi_name" type="text" placeholder="СМИ">
    <input required wire:model="fio" type="text" placeholder="ФИО">
    <input required wire:model="position" type="text" placeholder="Должность">
    <input required wire:model="telephone" type="text" placeholder="Телефон">
    <textarea required wire:model="devices" placeholder="Перечень ввозимого оборудования"></textarea>
    <textarea required wire:model="comment" placeholder="Комментарий"></textarea>
    <div class="flex text-gray-600 gap-4 items-center">
        <span>
             Даю свое <a class="text-blue-500" href="/fixed/personal-agreement.doc">
             согласие  на обработку персональных данных
        </a>
        </span>
        <input id="agreement" type="checkbox" required>
    </div>
    <button type="submit" class="w-full py-6 text-center bg-blue-500 text-bright-500 rounded-xl text-xl">Отправить</button>
</form>

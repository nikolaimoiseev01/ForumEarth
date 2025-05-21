<form x-data="{ showByStatus: @entangle('status') }" wire:submit="register" class="flex bg-bright-500 flex-col gap-12 rounded-3xl p-16 w-full max-w-5xl mx-auto relative">
    <input required wire:model="fio" type="text" placeholder="ФИО полностью">
    <input required wire:model="email" type="email" placeholder="Email">
    <input required wire:model="telephone" class="mobile_input" type="text" placeholder="Телефон">
    <input required wire:model="region" type="text" placeholder="Регион">
    <select required wire:model="status">
        <option disabled selected>Статус</option>
        <option value="Студент">Студент</option>
        <option value="Аспирант">Аспирант</option>
        <option value="Преподаватель">Преподаватель</option>
        <option value="Сотрудник">Сотрудник</option>
    </select>
    <input x-show="['Студент', 'Аспирант'].includes(showByStatus)"  wire:model="study_place" type="text" placeholder="Место учебы">
    <input x-show="['Студент', 'Аспирант'].includes(showByStatus)" wire:model="study_level" type="text" placeholder="Курс обучения">
    <input x-show="['Преподаватель', 'Сотрудник'].includes(showByStatus)" wire:model="workplace" type="text" placeholder="Место работы">

    <input required wire:model="specialization" type="text" placeholder="Специальность">
    <input wire:model="team" type="text" placeholder="Команда (необязательно)">

    <textarea required wire:model="interests"  placeholder="Профессиональные интересы"></textarea>
    <textarea required wire:model="expertise" placeholder="В чем я эксперт?"></textarea>
    <textarea required wire:model="interest_fact" placeholder="Интересный факт обо мне"></textarea>
    <button type="submit" class="w-full py-6 text-center bg-green-500 text-bright-500 rounded-xl text-xl">Отправить</button>

</form>

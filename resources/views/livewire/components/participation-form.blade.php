<form x-data="{ showByStatus: @entangle('status') }" wire:submit="register" class="flex bg-bright-500 flex-col gap-12 rounded-3xl p-16 w-full max-w-5xl mx-auto relative">
    <input required wire:model="fio" type="text" placeholder="ФИО полностью. Пример: Иванов Иван Иванович">
    <input required wire:model="email" type="email" placeholder="Email. Пример: example@email.com">
    <input required wire:model="telephone" class="mobile_input" type="text" placeholder="Телефон. Пример: +7 (912) 345 67 89">
    <input required wire:model="region" type="text" placeholder="Регион. Пример: Республика Татарстан, г. Казань">
    <div class="flex text-gray-600 flex-col gap-4">
        <p>Статус</p>
        <select required wire:model="status">
            <option value="Студент">Студент</option>
            <option value="Аспирант">Аспирант</option>
            <option value="Преподаватель">Преподаватель</option>
            <option value="Сотрудник">Сотрудник</option>
        </select>
    </div>

    <template x-if="['Студент', 'Аспирант'].includes(showByStatus)">
        <input required wire:model="study_place" type="text" placeholder="Место учебы. Полное название учебного заведения">
    </template>
    <template x-if="['Студент', 'Аспирант'].includes(showByStatus)">
        <input required wire:model="study_level" type="text" placeholder="Курс обучения. Пример: 3 курс бакалавриата">
    </template>
    <template x-if="['Преподаватель', 'Сотрудник'].includes(showByStatus)">
        <input required wire:model="workplace" type="text" placeholder="Место работы.  Полное название учебного организации">
    </template>




    <input required wire:model="specialization" type="text" placeholder="Специальность. Пример: Экология и природопользование, Химия, Геодезия и картография">
    <input wire:model="team" type="text" placeholder="Команда (необязательно). Пример: команда «ЭкоАрт» / «Команда формируется»">

    <textarea required wire:model="interests"  placeholder="Профессиональные интересы. Пример: урбанистика, экология, проектное управление и т.д."></textarea>
    <textarea required wire:model="expertise" placeholder="В чем я эксперт? (ТОП-3 моих суперзнаний и навыков)"></textarea>
    <textarea required wire:model="interest_fact" placeholder="Интересный факт обо мне. Поделитесь яркой, необычной или вдохновляющей историей — это поможет собрать сильные и сбалансированные команды!"></textarea>
    <button type="submit" class="w-full py-6 text-center bg-green-500 text-bright-500 rounded-xl text-xl">Отправить</button>

</form>

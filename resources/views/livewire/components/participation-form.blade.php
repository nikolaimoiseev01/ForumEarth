<form x-data="{ showByStatus: @entangle('status') }" wire:submit="register"
      class="flex bg-bright-500 flex-col gap-12 rounded-3xl p-16 w-full max-w-5xl mx-auto relative">


    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">ФИО полностью. <span class="text-gray-400 italic">Пример: Иванов Иван Иванович</span></p>
        <input required wire:model="fio" type="text">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Email. <span class="text-gray-400 italic">Пример: example@email.com</span></p>
        <input required wire:model="email" type="email">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Телефон. <span class="text-gray-400 italic">Пример: +7 (912) 345 67 89</span></p>
        <input required wire:model="telephone" class="mobile_input" type="text">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Регион. <span class="text-gray-400 italic">Пример: Республика Татарстан, г. Казань</span></p>
        <input required wire:model="region" type="text">
    </div>

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
        <div class="flex  flex-col gap-4">
            <p class="text-gray-500">Место учебы.  <span class="text-gray-400 italic">Полное название учебного заведения</span></p>
            <input required wire:model="study_place" type="text">
        </div>
    </template>
    <template x-if="['Студент', 'Аспирант'].includes(showByStatus)">
        <div class="flex  flex-col gap-4">
            <p class="text-gray-500">Курс обучения. <span class="text-gray-400 italic">Пример: 3 курс бакалавриата</span></p>
            <input required wire:model="study_level" type="text">
        </div>
    </template>
    <template x-if="['Преподаватель', 'Сотрудник'].includes(showByStatus)">
        <div class="flex  flex-col gap-4">
            <p class="text-gray-500">Место работы. <span class="text-gray-400 italic">Полное название учебного организации</span></p>
            <input required wire:model="workplace" type="text">
        </div>
    </template>


    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Специальность. <span class="text-gray-400 italic">Пример: Экология и природопользование, Химия, Геодезия и картография</span></p>
        <input required wire:model="specialization" type="text">
        <div class="flex  flex-col gap-4">
            <p class="text-gray-500">Команда (необязательно). <span class="text-gray-400 italic">Пример: команда «ЭкоАрт» / «Команда формируется»</span></p>
            <input wire:model="team" type="text">
        </div>

        <div class="flex  flex-col gap-4">
            <p class="text-gray-500">Профессиональные интересы. <span class="text-gray-400 italic">Пример: урбанистика, экология, проектное управление и т.д.</span></p>
            <textarea required wire:model="interests"></textarea>
        </div>

        <div class="flex  flex-col gap-4">
            <p class="text-gray-500">В чем я эксперт? <span class="text-gray-400 italic">(ТОП-3 моих суперзнаний и навыков)</span></p>
            <textarea required wire:model="expertise"></textarea>
        </div>

        <div class="flex  flex-col gap-4">
            <p class="text-gray-500">Интересный факт обо мне. <span class="text-gray-400 italic">Поделитесь яркой, необычной или вдохновляющей историей — это поможет собрать сильные и сбалансированные команды!</span></p>
            <textarea required wire:model="interest_fact"></textarea>
        </div>
        <button type="submit" class="w-full py-6 text-center bg-green-500 text-bright-500 rounded-xl text-xl">Отправить
        </button>

</form>

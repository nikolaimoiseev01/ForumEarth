<form x-data="{ showByStatus: @entangle('status') }" wire:submit="register"
      class="flex bg-bright-500 flex-col gap-12 rounded-3xl p-16 w-full max-w-5xl mx-auto relative">


    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">ФИО полностью. <span class="text-gray-400 italic">Пример: Иванов Иван Иванович</span>
        </p>
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
        <p class="text-gray-500">Дата рождения</p>
        <input required wire:model="birth_dt" type="date">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Место рождения <span
                class="text-gray-400 italic">Пример: г. Москва (как в паспорте)</span></p>
        <input required wire:model="birth_place" type="text">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Пол</p>
        <select required wire:model="gender">
            <option value="Мужской">Мужской</option>
            <option value="Женский">Женский</option>
        </select>
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Гражданство <span class="text-gray-400 italic">Пример: Россия</span></p>
        <input required wire:model="citizenship" type="text">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Серия и номер паспорта <span class="text-gray-400 italic">Пример: 9200 123456</span>
        </p>
        <input required wire:model="passport_number" type="text">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Кем выдан <span class="text-gray-400 italic">Пример: МВД по г. Москве (полностью как в паспорте)</span>
        </p>
        <input required wire:model="passport_issued_by" type="text">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Дата выдачи паспорта</p>
        <input required wire:model="passport_issued_date" type="date">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Код подразделения <span class="text-gray-400 italic">Пример: 110-001 (заполняется для граждан РФ)</span>
        </p>
        <input required wire:model="passport_code" type="text">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Адрес регистрации <span class="text-gray-400 italic">Пример: г. Москва, ул. Лесная, д. 11, кв.30</span>
        </p>
        <input required wire:model="address" type="text">
    </div>


    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Регион. <span
                class="text-gray-400 italic">Пример: Республика Татарстан, г. Казань</span></p>
        <input required wire:model="region" type="text">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Наиболее интересная тема</p>
        <select required wire:model="topic">
            <option value="Природа будущим поколениям: переработка отходов и ликвидация накопленного вреда в Арктике.">Природа будущим поколениям: переработка отходов и ликвидация накопленного вреда в Арктике.</option>
            <option value="Экологические технологии городов будущего (в том числе Арктического региона)">Экологические технологии городов будущего (в том числе Арктического региона)</option>
            <option value="Арктика за гранью фантастики: Северный морской путь и технологии его развития">Арктика за гранью фантастики: Северный морской путь и технологии его развития</option>
            <option value="Научная магия: новая энергетика и материалы будущего.">Научная магия: новая энергетика и материалы будущего.</option>
            <option value="Экологическая трансформация промышленности в Арктическом регионе">Экологическая трансформация промышленности в Арктическом регионе</option>
            <option value="Управление климатом: как управлять климатом, не снижая темпов промышленного роста.">Управление климатом: как управлять климатом, не снижая темпов промышленного роста.</option>
        </select>
        <a target="_blank" href="/fixed/contest-rules.pdf">Подробное описание всех тем</a>
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
            <p class="text-gray-500">Место учебы. <span
                    class="text-gray-400 italic">Полное название учебного заведения</span></p>
            <input required wire:model="study_place" type="text">
        </div>
    </template>
    <template x-if="['Студент', 'Аспирант'].includes(showByStatus)">
        <div class="flex  flex-col gap-4">
            <p class="text-gray-500">Курс обучения. <span
                    class="text-gray-400 italic">Пример: 3 курс бакалавриата</span></p>
            <input required wire:model="study_level" type="text">
        </div>
    </template>
    <template x-if="['Преподаватель', 'Сотрудник'].includes(showByStatus)">
        <div class="flex  flex-col gap-4">
            <p class="text-gray-500">Место работы. <span class="text-gray-400 italic">Полное название учебного организации</span>
            </p>
            <input required wire:model="workplace" type="text">
        </div>
    </template>


    <p class="text-gray-500">Специальность. <span class="text-gray-400 italic">Пример: Экология и природопользование, Химия, Геодезия и картография</span>
    </p>
    <input required wire:model="specialization" type="text">
    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Команда (необязательно). <span class="text-gray-400 italic">Пример: команда «ЭкоАрт» / «Команда формируется»</span>
        </p>
        <input wire:model="team" type="text">
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Профессиональные интересы. <span class="text-gray-400 italic">Пример: урбанистика, экология, проектное управление и т.д.</span>
        </p>
        <textarea required wire:model="interests"></textarea>
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">В чем я эксперт? <span
                class="text-gray-400 italic">(ТОП-3 моих суперзнаний и навыков)</span>
        </p>
        <textarea required wire:model="expertise"></textarea>
    </div>

    <div class="flex  flex-col gap-4">
        <p class="text-gray-500">Интересный факт обо мне. <span class="text-gray-400 italic">Поделитесь яркой, необычной или вдохновляющей историей — это поможет собрать сильные и сбалансированные команды!</span>
        </p>
        <textarea required wire:model="interest_fact"></textarea>
    </div>

    <div class="flex text-gray-600 gap-4 items-center">
        <span>
             Даю свое <a class="text-green-500" href="/fixed/personal-agreement.doc">
             согласие  на обработку персональных данных
        </a>
        </span>
        <input id="agreement" type="checkbox" required>
    </div>

    <button type="submit" class="w-full py-6 text-center bg-green-500 text-bright-500 rounded-xl text-xl">Отправить
    </button>

</form>

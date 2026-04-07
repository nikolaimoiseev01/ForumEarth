<div class="space-y-6 md:space-y-8">
    <div class="flex justify-between items-center mb-4 md:hidden">
        <h1 class="text-3xl font-bold text-[#006699]">Расписание вебинаров</h1>

        <!-- Calendar Navigation -->
        <div class="flex items-center space-x-2">
            <svg wire:loading aria-hidden="true" class="mx-auto w-4 h-4 text-neutral-tertiary animate-spin fill-blue-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <button wire:click="previousWeek"
                    class="p-2 text-gray-600 hover:text-[#006699] transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    {{ $currentStartDate->format('Y-m-d') <= $minDate ? 'disabled' : '' }}>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <span class="text-sm text-gray-600 px-3">
                {{ $calendarDays[0]['formatted'] }} - {{ $calendarDays[count($calendarDays)-1]['formatted'] }}
            </span>

            <button wire:click="nextWeek"
                    class="p-2 text-gray-600 hover:text-[#006699] transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    {{ $currentStartDate->copy()->addDays(4)->format('Y-m-d') >= $maxDate ? 'disabled' : '' }}>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Calendar -->
    <div class="border border-gray-200 rounded-lg overflow-hidden md:hidden">
        <!-- Days Header -->
        <div
            class="grid grid-cols-6 lg:grid-cols-6 md:grid-cols-3 sm:grid-cols-1 border-b border-gray-200">
            <div class="p-2 md:p-3 border-r border-gray-200 bg-gray-50"></div>
            @foreach($calendarDays as $day)
                <div class="p-2 md:p-3 text-center border-r border-gray-200">
                    <div class="text-xs text-gray-600">{{ $day['formatted'] }}</div>
                </div>
            @endforeach
        </div>

        <!-- Time Slots -->
        <div class="divide-y divide-gray-200">
            @foreach($timeSlots as $timeSlot)
                <div
                    class="grid grid-cols-6 lg:grid-cols-6 md:grid-cols-3 sm:grid-cols-1 h-[100px]">
                    <div
                        class="p-2 md:p-3 text-xs text-gray-500 border-r border-gray-200 bg-gray-50 flex items-start justify-end pt-2">
                        {{ $timeSlot }}
                    </div>

                    @foreach($calendarDays as $day)
                        @php
                            $webinar = $this->getWebinarForTimeSlot($day['date'], $timeSlot);
                        @endphp
                        <div class="p-2 border-r border-gray-200 relative">
                            @if($webinar)
                                @php
                                    $start = \Carbon\Carbon::parse($webinar->time_start);
                                    $end = \Carbon\Carbon::parse($webinar->time_end);

                                    $minutes = $end->diffInMinutes($start);
                                    $height = abs(($minutes / 60) * 100) + 20;
                                @endphp
                                <div style="height: {{ $height }}%;"
                                    wire:click="openWebinarModal({{ $webinar->id }})"
                                    x-data
                                    @click="$dispatch('open-modal', 'webinar-modal')"
                                    class="z-50 relative bg-gradient-to-r from-[#006699] to-[#005588] text-white p-2 rounded-lg cursor-pointer hover:from-[#005588] hover:to-[#004477] transition-colors flex flex-col justify-center">
                                    <div
                                        class="text-xs font-semibold mb-1">{{ $webinar->title }}</div>
                                    <div class="text-xs opacity-90">
                                        {{ \Carbon\Carbon::parse($webinar->time_start)->format('H:i') }}
                                        - {{ \Carbon\Carbon::parse($webinar->time_end)->format('H:i') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <!-- Webinar List (Desktop View) -->
    <div class="lg:block hidden space-y-4">
        @foreach($webinars as $webinar)
        <div  wire:click="openWebinarModal({{ $webinar->id }})"
              x-data
              @click="$dispatch('open-modal', 'webinar-modal')"
                 class="bg-white border border-gray-200 rounded-lg p-4 cursor-pointer hover:shadow-md transition-shadow">
                <h3 class="font-semibold text-xl text-[#006699]">{{ $webinar->title }}</h3>
                <span class="text-xs text-gray-500">{{ $webinar->date->translatedFormat('j F') }}</span>
                <div class="text-sm text-gray-600">
                    {{ \Carbon\Carbon::parse($webinar->time_start)->translatedFormat('H:i') }}
                    - {{ \Carbon\Carbon::parse($webinar->time_end)->translatedFormat('H:i') }}
                </div>
                <div
                    class="text-xs text-gray-500 mt-2 line-clamp-2">{{ $webinar->description }}</div>
            </div>
        @endforeach
    </div>

    <x-modal maxWidth="xl" name="webinar-modal">
        <svg wire:loading aria-hidden="true" class="mx-auto w-8 h-8 text-neutral-tertiary animate-spin fill-blue-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        @if($selectedWebinar)
            <div wire:loading.remove  class="sm:flex sm:items-start max-w-3xl">
                <div class="mt-3 sm:mt-0 sm:text-left w-full">
                    <h3 class="text-4xl font-bold text-[#006699] mb-2" id="modal-title">
                        {{ $selectedWebinar->title }}
                    </h3>

                    <div class="mt-4 space-y-2">
                        <div class="text-[#006699] text-2xl">
                            {{ \Carbon\Carbon::parse($selectedWebinar->date)->translatedFormat('j F') }}
                        </div>
                        <div class="text-[#006699] text-2xl">
                            {{ \Carbon\Carbon::parse($selectedWebinar->time_start)->format('H:i') }}
                            - {{ \Carbon\Carbon::parse($selectedWebinar->time_end)->format('H:i') }}
                        </div>
                    </div>
                    <p class="text-lg mt-4">
                        {{ $selectedWebinar->description }}
                    </p>
                    <div class="mt-6">
                        <a href="{{ $selectedWebinar->link }}"
                           target="_blank"
                           class="inline-flex items-center px-4 py-2 bg-[#006699] text-white text-sm font-medium rounded-lg hover:bg-[#005588] transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Ссылка на вебинар
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </x-modal>


</div>

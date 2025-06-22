<main class="flex-1 mt-24">
    <section class="bg-blue-600 h-[40vh] flex flex-col items-center justify-center relative p-8 text-white mb-20 relative">
        {{--        <img src="/fixed/logo-white.png" class="w-40" alt="">--}}
        <img src="/fixed/sots-programm-1.svg" class="absolute top-0 right-0 w-80 md:w-40" alt="">
        <img src="/fixed/sots-programm-2.svg" class="absolute bottom-0 left-0 w-80 md:w-40" alt="">
        <h1 class="text-8xl font-bold text-white mb-4 font-[Lkdown] md:text-5xl">Программа</h1>
        <p class="text-4xl text-center md:text-2xl">22-29 ИЮНЯ 2025 ГОДА</p>
        <p class="">АРХАНГЕЛЬСКАЯ ОБЛАСТЬ</p>
    </section>
    <section class="content">

        {{--        <div class="flex border-2 border-blue-500 rounded-t-3xl w-full">--}}
        {{--            <div class="border-r-2 border-blue-500 text-center py-4 px-2 flex">Время</div>--}}
        {{--            <div class="border-r-2 border-blue-500 text-center py-4 px-2">Мероприятия</div>--}}
        {{--            <div class="border-r-2 border-blue-500 text-center py-4 px-2">ТЕМА</div>--}}
        {{--            <div class="border-r-2 border-blue-500 text-center py-4 px-2">СПИКЕРЫ</div>--}}
        {{--        </div>--}}
        <div class="hidden md:block">
            @foreach($page['content'] as $key=>$day)
                <div class="flex flex-col mb-10" x-data="{ open: false }">
                    <div
                        class="flex justify-between items-center rounded-2xl w-full bg-blue-600  py-2 px-6 text-center">
                        <h2 class="text-3xl md:!text-2xl font-bold text-white">ДЕНЬ {{$key + 1}}
                            &nbsp;&nbsp;|&nbsp;&nbsp;{{$day['date']}}</h2>
                        <div
                            class="bg-blue-500 w-10 h-10 min-w-10 min-h-10 md:h-6 md:h-6 flex items-center justify-center rounded-xl cursor-pointer transition duration-300 hover:bg-blue-400"
                            :class="open ? 'rotate-90' : ''"
                            @click="open = !open"
                        >
                            <x-maki-arrow
                                class="w-8 h-8 md:h-4 md:h-4 fill-white transition-transform duration-300 -rotate-45"/>
                        </div>
                    </div>
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 max-h-0"
                        x-transition:enter-end="opacity-100 max-h-screen"
                        x-transition:leave="transition ease-in duration-400"
                        x-transition:leave-start="opacity-100 max-h-screen"
                        x-transition:leave-end="opacity-0 max-h-0"
                        class="overflow-hidden text-blue-800 text-lg"
                    >
                        @foreach($day['events'] as $key=>$event)
                            <div x-data="{ open_event: false }"
                                 class="flex flex-col border-b border-blue-600 mx-2 rounded-t-3xl w-full text-black">
                                <div class="py-2 flex gap-2" @click="open_event = !open_event">
                                    {{$event['time']}}: {{$event['name']}}
                                    <div
                                        class="flex items-center pr-8"
                                    >
                                        <div :class="open_event ? 'rotate-90' : ' -rotate-45'">
                                            <x-maki-arrow
                                                class="w-4 h-4 md:h-4 md:h-4 fill-blue transition-transform duration-300"/>
                                        </div>

                                    </div>

                                </div>
                                <div
                                    x-show="open_event"
                                    x-transition:enter="transition ease-out duration-500"
                                    x-transition:enter-start="opacity-0 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-screen"
                                    x-transition:leave="transition ease-in duration-400"
                                    x-transition:leave-start="opacity-100 max-h-screen"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="overflow-hidden text-black text-lg"
                                >
                                    <p><b>Тема:</b> {{$event['topic']}}</p>
                                    <p><b>Спикеры:</b> {!! $event['speakers'] !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="overflow-hidden rounded-t-3xl border-t-2 border-blue-600 md:hidden">
            <table class="tg table-auto w-full rounded-t-3xl ">
                <thead class="rounded-t-3xl">
                <tr class="rounded-t-3xl text-blue-600">
                    <th class="border-r-2 border-blue-500 text-center py-4 px-2">Время</th>
                    <th class="border-r-2 border-blue-500 text-center py-4 px-2">Мероприятия</th>
                    <th class="border-r-2 border-blue-500 text-center py-4 px-2">ТЕМА</th>
                    <th class="text-center py-4 px-2">СПИКЕРЫ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($page['content'] as $key=>$day)
                    <tr class="">
                        <td class="w-full text-center @if($key <> 0) pt-16 @endif" colspan="5">
                            <h2 class="text-3xl font-bold text-white mx-auto bg-blue-600  py-2 @if($key <> 0) rounded-t-3xl @endif">
                                ДЕНЬ {{$key + 1}}
                                &nbsp;&nbsp;|&nbsp;&nbsp;{{$day['date']}}</h2>
                        </td>
                    </tr>
                    @foreach($day['events'] as $key=>$event)
                        <tr class="border-b-2 border-blue-600  last:mb-10 ">
                            <td class="px-2 py-4 border-r-2 border-blue-500"><p>{{$event['time']}}</p></td>
                            <td class="px-2 py-4 border-r-2 border-blue-500 font-bold"><p>{{$event['name']}}</p></td>
                            <td class="px-2 py-4 border-r-2 border-blue-500 max-w-7xl"><p>{{$event['topic']}}</p></td>
                            <td class="px-2 py-4 ">{!! $event['speakers'] !!}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>

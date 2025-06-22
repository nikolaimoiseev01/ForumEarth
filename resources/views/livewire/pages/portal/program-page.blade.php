<main class="flex-1">
    <section class="bg-blue-500 h-[60vh] flex flex-col items-center justify-center relative p-8 text-white mb-20">
        <img src="/fixed/logo-white.png" class="w-40" alt="">
        <h1 class="text-8xl font-bold text-white mb-4 font-[Lkdown]">Программа</h1>
        <p class="text-4xl">22-29 ИЮНЯ 2025 ГОДА</p>
        <p class="">АРХАНГЕЛЬСКАЯ ОБЛАСТЬ</p>
    </section>
    <section>
        {{--        <div class="flex border-2 border-blue-500 rounded-t-3xl w-full">--}}
        {{--            <div class="border-r-2 border-blue-500 text-center py-4 px-2 flex">Время</div>--}}
        {{--            <div class="border-r-2 border-blue-500 text-center py-4 px-2">Мероприятия</div>--}}
        {{--            <div class="border-r-2 border-blue-500 text-center py-4 px-2">ТЕМА</div>--}}
        {{--            <div class="border-r-2 border-blue-500 text-center py-4 px-2">СПИКЕРЫ</div>--}}
        {{--        </div>--}}
        {{--        @foreach($page['content'] as $key=>$day)--}}
        {{--            <div class="flex flex-col border-2  mb-10">--}}
        {{--                <div class="rounded-t-3xl w-full bg-blue-600  py-2 text-center">--}}
        {{--                    <h2 class="text-3xl font-bold text-white mx-auto">ДЕНЬ {{$key + 1}}&nbsp;&nbsp;|&nbsp;&nbsp;{{$day['date']}}</h2>--}}
        {{--                </div>--}}

        {{--                @foreach($day['events'] as $key=>$event)--}}
        {{--                    <div class="flex border-b-2 border-blue-600 rounded-t-3xl w-full">--}}
        {{--                        <div class="border-r-2 border-blue-500 text-center py-4 px-2 flex">{{$event['time']}}</div>--}}
        {{--                        <div class="border-r-2 border-blue-500 text-center py-4 px-2">{{$event['name']}}</div>--}}
        {{--                        <div class="border-r-2 border-blue-500 text-center py-4 px-2">{{$event['topic']}}</div>--}}
        {{--                        <div class="border-r-2 border-blue-500 text-center py-4 px-2">{!! $event['speakers'] !!}</div>--}}
        {{--                    </div>--}}
        {{--                @endforeach--}}
        {{--            </div>--}}
        {{--        @endforeach--}}

        <div class="overflow-hidden rounded-t-3xl border-t-2 border-blue-600 content">
            <table class="tg table-auto w-full rounded-t-3xl">
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
                    <tr>
                        <td class="rounded-t-3xl w-full bg-blue-600  py-2 text-center" colspan="5">
                            <h2 class="text-3xl font-bold text-white mx-auto">ДЕНЬ {{$key + 1}}
                                &nbsp;&nbsp;|&nbsp;&nbsp;{{$day['date']}}</h2>
                        </td>
                    </tr>
                    @foreach($day['events'] as $key=>$event)
                        <tr>
                            <td class="tg-0pky">{{$event['time']}}</td>
                            <td class="tg-0pky">{{$event['name']}}</td>
                            <td class="tg-0pky">{{$event['topic']}}</td>
                            <td class="tg-0pky">{!! $event['speakers'] !!}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>

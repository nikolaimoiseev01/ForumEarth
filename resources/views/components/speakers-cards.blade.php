<section id="speakers" {{$attributes->merge(['class' => 'py-20 mb-20 bg-blue-500 flex flex-col rounded-t-3xl'])}}>
    <div class="content">
        <h2 class="text-white mb-20 relative tracking-wide">Приглашенные спикеры</h2>
        <div class="grid grid-cols-3 md:grid-cols-2 sm:!grid-cols-1 gap-8">
            @foreach($speakers as $speaker)
                <div class="col-span-1 flex flex-col gap-4 bg-white rounded-2xl p-6">
                    <img src="{{$speaker->getFirstMediaUrl('image')}}" class="w-full h-64 object-cover rounded-xl"
                         alt="">
                    <h2 class="font-bold text-3xl text-blue-600">{{$speaker['name']}}</h2>
                    <p class="text-xl text-blue-600">{{$speaker['description']}}</p>
                </div>
            @endforeach
            @if($main_page =='true')
                <a wire:navigate href="{{route('portal.speakers')}}" class="col-span-1 flex flex-col items-center justify-center bg-white rounded-2xl p-6 relative transition hover:scale-[1.01] cursor-pointer">
                    <h2 class="font-bold text-3xl text-blue-600 text-center">СМОТРЕТЬ СПИСОК ВСЕХ СПИКЕРОВ</h2>
                    <div
                        class="absolute bottom-6 right-6 bg-blue-500 w-16 h-16 flex items-center justify-center rounded-xl cursor-pointer transition duration-300 hover:bg-blue-400"
                    >

                            <x-maki-arrow class="w-8 h-8 fill-white transition-transform duration-300 -rotate-45"/>

                    </div>
                </a>
            @endif
        </div>
    </div>
</section>

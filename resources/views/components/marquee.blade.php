<div
    x-data
    x-init="
            $nextTick(() => {
                const content = $refs.content;
                const item = $refs.item;
                const clone = item.cloneNode(true);

            });
    "
    {{ $attributes->merge(['class' => 'relative w-full container-block sm:hidden'])}}
>
    <div
        class="relative w-full py-3 mx-auto overflow-hidden text-lg italic tracking-wide text-white uppercase sm:text-xs md:text-sm lg:text-base xl:text-xl 2xl:text-2xl">
        <div class="absolute left-0 z-20 w-40 h-full bg-gradient-to-r from-white to-transparent"></div>
        <div class="absolute right-0 z-20 w-40 h-full bg-gradient-to-l from-white to-transparent"></div>
        <div x-ref="content" class="flex animate-marquee">
            <div x-ref="item" class="flex items-center justify-around flex-shrink-0 w-full py-2 text-white">
                @foreach($elements as $key=>$el)
                    <div
                        class="@if($key == 0)  @endif marquee__item flex mx-6 items-center justify-center overflow-hidden
                        @if($countries == '0')px-16 py-8 max-h-32 bg-blue-300 @else flex-col @endif
                        rounded-3xl">
                        <img src="{{$el->getFirstMediaUrl('image')}}"
                             class="@if($countries == '1') w-72 h-auto !max-w-72 !max-h-44 rounded-xl @else max-w-56 max-h-[inherit] @endif"
                             alt="">
                        @if($countries == '1')
                            <p class="text-blue-500">{{$el['name']}}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<style>
    /*
     *  This is the marquee animation styles.
     *  Instead of adding this CSS you may wish to implement in your tailwind config.
     *  Learn more in the marquee Tailwind Config section
     */
    /*@keyframes marquee {*/
    /*    0% {*/
    /*        transform: translateX(0);*/
    /*    }*/
    /*    100% {*/
    /*        transform: translateX(-100%);*/
    /*    }*/
    /*}*/

    /*.animate-marquee {*/
    /*    animation: marquee 20s linear infinite;*/
    /*}*/
</style>

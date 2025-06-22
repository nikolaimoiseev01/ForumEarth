@if(count($posts) > 0)
    <div {{ $attributes->merge(['class' => 'flex relative flex-col content'])}}>
        <h2 class="text-blue-600 mb-10">Последние новости</h2>
        <div class="swiper postSlider sm:!w-full mb-10">
            <div class="swiper-wrapper">
                @foreach($posts as $key => $post)
                    <a wire:navigate href="{{route('portal.post', $post['id'])}}"
                       class="swiper-slide !flex !flex-col !gap-4">
                        <img src="{{$post->getFirstMediaUrl('cover')}}" class="w-full object-cover mb-4 h-60 sm:!h-auto" alt="">
                        <span
                            class="text-bright-500 px-4 py-1 rounded font-light w-fit bg-blue-500">{{$post['custom_created_at']->translatedFormat('j F H:i')}}</span>
                        <h3 class="text-3xl">{{\Illuminate\Support\Str::limit($post['title'], $limit = 100, $end = '...')}}</h3>
                        <p class="text-bright-700 text-lg">{{\Illuminate\Support\Str::limit($post['desc'], $limit = 50, $end = '...')}}</p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex gap-4">
            <x-eva-arrow-left
                class="w-10 text-bright-500 bg-blue-500 flex justify-center items-center p-2 prev transition cursor-pointer hover:bg-bright-600 hover:text-blue-500"/>
            <x-eva-arrow-right
                class="w-10 text-bright-500 bg-blue-500 flex justify-center items-center p-2 next transition cursor-pointer hover:bg-bright-600 hover:text-blue-500"/>
        </div>
    </div>
@endif
<style>
    .postSlider {
        width: 100%;
        /*max-width: 980px;*/
        height: 100%;
    }

    @media (max-width: 648px) {
        .swiper {
            width: 80%;
        }
    }

    .swiper-wrapper {
        display: flex;
    }

    .swiper-slide {
        /*flex-shrink: 0; !* Убедитесь, что слайды не сжимаются *!*/
        /*width: 100%;    !* Один слайд на всю ширину *!*/
    }
</style>
@push('page-js')
    <script type="module">
        var swiper2 = new Swiper(".postSlider", {
            spaceBetween: 40,
            slidesPerView: 1,
            navigation: {
                nextEl: ".next",
                prevEl: ".prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
            },
            on: {
                click: function (swiper, event) {
                    const clickedSlide = swiper.clickedSlide;

                    if (clickedSlide) {
                        const link = clickedSlide.closest('a');
                        if (link) {
                            // При использовании wire:navigate достаточно просто инициировать клик
                            link.click();
                        }
                    }
                }
            },
        });
    </script>
@endpush

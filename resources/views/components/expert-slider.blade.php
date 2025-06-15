@if(count($experts) > 0)
    <div {{ $attributes->merge(['class' => 'flex relative flex-col content'])}}>
        <h2 class="text-blue-600 mb-20">Приглашенные эксперты</h2>
        <div class="swiper expertSlider sm:!w-full mb-10">
            <div class="swiper-wrapper">
                @foreach($experts as $key => $expert)
                    <div class="swiper-slide !flex !flex-col !gap-4 bg-blue-500 rounded-2xl p-6 !text-white">
                        <img src="{{$expert->getFirstMediaUrl('image')}}" class="w-full h-64 object-cover rounded-xl"
                             alt="">
                        <h2 class="font-bold text-3xl ">{{$expert['name']}}</h2>
                        <p class="text-xl">{{$expert['description']}}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex gap-4">
            <x-eva-arrow-left
                class="w-10 text-bright-500 bg-blue-500 flex justify-center items-center p-2 prevExpert transition cursor-pointer hover:bg-bright-600 hover:text-blue-500"/>
            <x-eva-arrow-right
                class="w-10 text-bright-500 bg-blue-500 flex justify-center items-center p-2 nextExpert transition cursor-pointer hover:bg-bright-600 hover:text-blue-500"/>
        </div>
    </div>
@endif
<style>
    .expertSlider {
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
        var swiper2 = new Swiper(".expertSlider", {
            spaceBetween: 40,
            slidesPerView: 1,
            navigation: {
                nextEl: ".nextExpert",
                prevEl: ".prevExpert",
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

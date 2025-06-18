<div id="news" {{ $attributes->merge(['class' => 'relative flex-col content hidden sm:block'])}}>
    <div class="swiper universitySlider sm:!w-full mb-10">
        <div class="swiper-wrapper">
            @foreach($universities as $key => $el)
                <div
                    class="@if($key == 0)  @endif swiper-slide items-center !flex !w-fit justify-center
                        px-16 py-8 max-h-32 bg-blue-300
                        rounded-3xl">
                    <img src="{{$el->getFirstMediaUrl('image')}}"
                         class="max-w-56 max-h-[inherit]"
                         alt="">
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex gap-4">
        <x-eva-arrow-left
            class="w-10 text-bright-500 bg-blue-500 flex justify-center items-center p-2 prevUni transition cursor-pointer hover:bg-bright-600 hover:text-blue-500"/>
        <x-eva-arrow-right
            class="w-10 text-bright-500 bg-blue-500 flex justify-center items-center p-2 nextUni transition cursor-pointer hover:bg-bright-600 hover:text-blue-500"/>
    </div>
</div>
<style>
    .universitySlider {
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
        /*display: flex;*/
    }

    .swiper-slide {
        /*flex-shrink: 0; !* Убедитесь, что слайды не сжимаются *!*/
        width: 100%;    /* Один слайд на всю ширину */
    }
</style>
@push('page-js')
    <script type="module">
        var swiper2 = new Swiper(".universitySlider", {
            spaceBetween: 20,
            slidesPerView: 'auto',
            navigation: {
                nextEl: ".nextUni",
                prevEl: ".prevUni",
            }
        });
    </script>
@endpush

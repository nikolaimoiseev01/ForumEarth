<div
    x-data="marquee()"
    x-init="init()"
    class="relative w-full container-block"
>
    <div class="relative w-full py-3 mx-auto overflow-hidden">
        <div class="absolute left-0 z-20 w-40 h-full bg-gradient-to-r from-white to-transparent"></div>
        <div class="absolute right-0 z-20 w-40 h-full bg-gradient-to-l from-white to-transparent"></div>

        <div x-ref="viewport" class="overflow-hidden">
            <div x-ref="track" class="flex w-max animate-marquee">
                <template x-ref="template">
                    <div class="flex items-center justify-around flex-shrink-0 w-full py-2">
                        @foreach($elements as $key=>$el)
                            <a @if($el['link']) href="{{$el['link']}}" target="_blank" @endif
                            class="marquee__item flex mx-6 items-center justify-center overflow-hidden
                   @if($countries == '0') px-16 py-8 max-h-32 bg-blue-300 @else flex-col @endif
                   rounded-3xl">
                                <img src="{{$el->getFirstMediaUrl('image')}}"
                                     class="@if($countries == '1') w-72 h-44 !max-w-72 !max-h-44 rounded-xl @else max-w-56 max-h-[inherit] @endif"
                                     alt="">
                                @if($countries == '1')
                                    <p class="text-blue-500 !not-italic">{{$el['name']}}</p>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>

<script>
    function marquee() {
        return {
            viewport: null,
            track: null,
            template: null,
            resizeObserver: null,

            init() {
                this.viewport = this.$refs.viewport;
                this.track = this.$refs.track;
                this.template = this.$refs.template;

                // 1) Вставляем первый набор
                this.track.appendChild(this.template.content.cloneNode(true));

                // 2) Дублируем, пока ширина трека < 2× ширины вьюпорта
                const ensureFill = () => {
                    const need = this.viewport.clientWidth * 2;
                    // Чтобы корректно измерять, даём браузеру отрисовать
                    this.$nextTick(() => {
                        while (this.track.scrollWidth < need) {
                            this.track.appendChild(this.template.content.cloneNode(true));
                        }
                    });
                };

                ensureFill();

                // 3) На ресайз — пересобираем (на случай адаптива)
                this.resizeObserver = new ResizeObserver(() => {
                    // Сбрасываем трек и наполняем заново
                    this.track.innerHTML = '';
                    this.track.appendChild(this.template.content.cloneNode(true));
                    ensureFill();
                });
                this.resizeObserver.observe(this.viewport);
            }
        }
    }
</script>
<style>
    @keyframes marquee {
        from { transform: translateX(0); }
        to   { transform: translateX(-50%); } /* уезжаем на ширину одного набора */
    }
    .animate-marquee { animation: marquee var(--marquee-duration, 30s) linear infinite; will-change: transform; }

</style>

{{--<div class="marquee-wrapper">--}}
{{--    <div class="marquee" data-speed="60" data-direction="right"> <!-- или right -->--}}
{{--        <div class="marquee__ctn">--}}
{{--            <div class="marquee__track">--}}
{{--                @foreach($elements as $el)--}}
{{--                    <div class="marquee__item flex mx-6 items-center justify-center px-16 py-8 bg-blue-300 rounded-3xl">--}}
{{--                        <img src="{{$el->getFirstMediaUrl('image')}}" class="max-w-56" alt="">--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@push('page-js')--}}
{{--    <script>--}}
{{--        function LogosMarquee(options) {--}}
{{--            options = options || {};--}}
{{--            var containerSelector = options.containerSelector || ".marquee__ctn";--}}
{{--            var trackSelector = options.trackSelector || ".marquee__track";--}}

{{--            this.container = document.querySelector(containerSelector);--}}
{{--            this.track = document.querySelector(trackSelector);--}}
{{--            this.marquee = this.container.closest(".marquee");--}}

{{--            if (!this.container || !this.track || !this.marquee) {--}}
{{--                console.warn("Marquee: éléments introuvables.");--}}
{{--                return;--}}
{{--            }--}}

{{--            this.speed = parseFloat(this.marquee.dataset.speed) || 60;--}}
{{--            this.direction = this.marquee.dataset.direction === 'right' ? 1 : -1;--}}

{{--            this.trackWidth = this.track.getBoundingClientRect().width;--}}
{{--            this.pos = 0;--}}
{{--            this.start = null;--}}
{{--            this.rafId = null;--}}

{{--            this.setup();--}}
{{--            this.animate = this.animate.bind(this);--}}
{{--            requestAnimationFrame(this.animate);--}}
{{--        }--}}

{{--        LogosMarquee.prototype.setup = function () {--}}
{{--            this.container.style.width = this.trackWidth + "px";--}}

{{--            this.clone = this.track.cloneNode(true);--}}

{{--            if (this.direction === -1) {--}}
{{--                // Прокрутка влево — добавляем клон *до* основного трека--}}
{{--                this.container.insertBefore(this.clone, this.track);--}}
{{--            } else {--}}
{{--                // Прокрутка вправо — добавляем клон *после* основного трека--}}
{{--                this.container.appendChild(this.clone);--}}
{{--            }--}}

{{--            this.container.style.willChange = "transform";--}}
{{--        };--}}

{{--        LogosMarquee.prototype.animate = function (timestamp) {--}}
{{--            if (!this.start) this.start = timestamp;--}}

{{--            var elapsed = timestamp - this.start;--}}
{{--            this.pos = this.direction * (-(elapsed / 1000) * this.speed);--}}

{{--            // Если прокрутка влево и превысили ширину — сброс--}}
{{--            if (Math.abs(this.pos) >= this.trackWidth) {--}}
{{--                this.start = timestamp;--}}
{{--                this.pos = 0;--}}
{{--            }--}}

{{--            this.container.style.transform = "translateX(" + this.pos + "px)";--}}
{{--            this.rafId = requestAnimationFrame(this.animate);--}}
{{--        };--}}

{{--        LogosMarquee.prototype.destroy = function () {--}}
{{--            cancelAnimationFrame(this.rafId);--}}
{{--            if (this.clone) this.clone.remove();--}}
{{--            this.container.style.transform = "";--}}
{{--            this.container.style.willChange = "";--}}
{{--        };--}}

{{--        window.addEventListener("load", function () {--}}
{{--            new LogosMarquee({--}}
{{--                containerSelector: ".marquee__ctn",--}}
{{--                trackSelector: ".marquee__track"--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}


<div
    x-data
    x-init="
            $nextTick(() => {
                const content = $refs.content;
                const item = $refs.item;
                const clone = item.cloneNode(true);

            });
    "
    class="relative w-full container-block"
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
                        @if($countries == '0')px-16 py-8 bg-blue-300 @endif
                        rounded-3xl">
                        <img src="{{$el->getFirstMediaUrl('image')}}" class="@if($countries == '1') w-72 h-44 !max-w-72 !max-h-44 rounded-xl @else max-w-56 @endif" alt="">
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
    @keyframes marquee {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .animate-marquee {
        animation: marquee 20s linear infinite;
    }
</style>

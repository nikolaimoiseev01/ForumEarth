<section class="trigger bg-blue-500 relative py-16">
    <img src="/fixed/background-3.svg" class="absolute w-full h-full md:hidden" alt="">
    <div class="hero h-[60svh] md:h-auto w-full pb-32 flex flex-col gap-4 content">
        <div class="w-full border-b border-white pb-4 mb-10">
            <h2 class="text-bright-500 text-2xl relative">* информация</h2>
        </div>
        <div class="flex gap-4 md:flex-col">
            <div class="flex flex-col w-1/2 md:w-full">
                <h3 class="mb-10 text-white">"Земляне" МЕЖДУНАРОДНЫЙ <br>
                    <span class="bg-bright-500 text-blue-500 rounded-xl px-2">НАУЧНО-ПРАКТИЧЕСКИЙ</span><br>
                    ЭКОЛОГИЧЕСКИЙ ФОРУМ</h3>
                <div class="card-container md:flex md:flex-col md:gap-4">
                    <div class="card-wrapper">
                        <div class="card grid grid-cols-2 gap-4">
                            <div
                                class="col-span-1 flex items-center flex-col justify-center bg-white text-blue-500 rounded-2xl">
                                <h2>5</h2>
                                <p>тематических блоков</p>
                            </div>
                            <div
                                class="col-span-1 flex items-center flex-col justify-center bg-white text-blue-500 rounded-2xl">
                                <h2>9</h2>
                                <p>дней форума</p>
                            </div>
                            <div
                                class="col-span-2 flex items-center flex-col justify-center bg-white text-blue-500 rounded-2xl">
                                <h2>100+</h2>
                                <p>участников форума</p>
                            </div>
                        </div>
                    </div>
                    @foreach($cards as $card)
                        <div class="card-wrapper">
                            <div
                                class="card p-8 text-2xl text-white text-center flex flex-col gap-4 backdrop-blur-3xl items-center justify-center bg-blue-500 border border-bright-500 rounded-lg">
                                <div class="flex gap-2">
                                    @for($i = 0; $i < $loop->iteration; $i++)
                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.2092 1.67149C7.64246 0.430449 9.39758 0.430449 9.83084 1.67149C10.1203 2.50055 11.097 2.85606 11.8516 2.407C12.9813 1.73481 14.3258 2.86297 13.8599 4.09216C13.5487 4.9133 14.0685 5.81347 14.9352 5.95454C16.2326 6.16572 16.5374 7.89417 15.3904 8.53635C14.6242 8.96535 14.4437 9.98899 15.017 10.6542C15.8751 11.6499 14.9976 13.1699 13.7062 12.9246C12.8435 12.7607 12.0472 13.4288 12.0588 14.3069C12.0761 15.6213 10.4269 16.2216 9.59527 15.2035C9.03973 14.5235 8.0003 14.5235 7.44477 15.2035C6.61318 16.2216 4.96391 15.6213 4.98124 14.3069C4.99282 13.4288 4.19657 12.7607 3.33386 12.9246C2.04246 13.1699 1.1649 11.6499 2.02305 10.6542C2.59632 9.98899 2.41582 8.96535 1.64962 8.53635C0.502664 7.89417 0.807436 6.16572 2.10486 5.95454C2.97158 5.81347 3.4913 4.9133 3.18011 4.09216C2.71428 2.86297 4.05877 1.73481 5.1884 2.407C5.94303 2.85606 6.91977 2.50055 7.2092 1.67149Z"
                                                fill="white"/>
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-2xl">{{$card}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-1/2 md:w-full">
                <img class="img_trigger" src="/fixed/sticky-block-background.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="content">
    </div>
</section>

@push('page-js')
    <script type="module">
        addEventListener("load", (event) => {

            const cardWrappers = gsap.utils.toArray(".card-wrapper");

            const scaleMax = gsap.utils.mapRange(
                1,
                document.querySelectorAll(".card").length - 1,
                1,
                1
            ); // Convert values we know to values we want https://gsap.com/docs/v3/GSAP/UtilityMethods/mapRange()

            const blockHeight = document.querySelector(".card-wrapper")?.offsetHeight || 300;
            const time = 1;
            if (window.innerWidth > 767) {
                gsap.set(cardWrappers, {
                    // Set up the cards styling
                    y: (index) => 3 * index, // set offset
                    transformOrigin: "center top"
                });

                //--------------------------------//
                // The animation
                //--------------------------------//
                const tl = gsap.timeline({
                    defaults: {
                        ease: "none"
                    },
                    scrollTrigger: {
                        trigger: ".hero",
                        start: "bottom bottom",
                        end: `${blockHeight * 5} top`,
                        scrub: true,
                        // pin: true,
                        // markers: true
                    }
                });
                tl.from(".card-container", {
                    // Move the card stack from the bottom of the screen
                    y: () => 0,
                    duration: 1
                });
                // Animte cards up from off screen one by one.
                const heights = cardWrappers.map((el) => el.offsetHeight);
                tl.to(".card-wrapper:not(:first-child)", {
                    y: (i) => -heights.slice(0, i + 1).reduce((sum, h) => sum + h, 0),
                    duration: time / 2,
                    stagger: time
                });

                tl.to(
                    ".card-wrapper:not(:last-child)",
                    {
                        rotationX: -20,
                        scale: (index) => scaleMax(index), // dynamlicly get scale based on the index of the current card
                        stagger: {
                            each: time
                        }
                    },
                    "<" // Start tween when the first cards has done animating
                );

                ScrollTrigger.refresh(); // Refresch ScrollTrigger to get all the values
                const end = tl.scrollTrigger.end;
                ScrollTrigger.create({
                    // Extra ScrollTrigger just for pinning
                    trigger: ".hero",
                    start: "center center",
                    end: () => end, // Set the end the same as the previous ScrollTrigger
                    pin: true,
                    // markers: true,
                    // markers: {startColor: "fuchsia", endColor: "fuchsia"}
                });
            }
        })
    </script>
@endpush

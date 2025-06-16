<main class="flex-1 w-full mx-auto px-10 max-w-7xl">
{{--    <section class="w-full h-screen bg-cover flex items-center px-28 md:px-4 relative mb-20"--}}
{{--    >--}}
{{--        <div class="absolute top-0 left-0 w-full h-full -z-[1]">--}}
{{--            <img src="/fixed/welcome-background.png" class="z-0 h-full w-full object-cover" alt="">--}}
{{--            <div--}}
{{--                style="background: linear-gradient(180deg, rgba(18, 87, 124, 0.2) 116.33%, rgba(255, 255, 255, 0.2) 142.98%);"--}}
{{--                class="absolute top-0 z-10 w-full h-full"></div>--}}
{{--        </div>--}}

{{--        <div--}}
{{--            class="flex items-center justify-start p-6 md:p-2 w-full text-bright-500 md:text-center max-w-[70vw] bg-blue-500 bg-opacity-50 rounded-3xl">--}}
{{--            <div class="flex bg-blue-500 p-12 flex-col justify-center gap-8 w-full relative rounded-3xl min-h-[40vh]">--}}
{{--                <h1 class="relative text-[3vw] leading-[3.5vw] md:text-lg">{{$post['title']}}</h1>--}}
{{--                <h3 class="relative text-2xl font-normal">{{$post['created_at']->translatedFormat('j F H:i')}}</h3>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="mt-32">
        <h2 class="mb-20">{{$post['title']}}</h2>
        <img src="{{$post->getFirstMediaUrl('cover')}}" class="w-full mb-20" alt="">
    </section>

    <section class="mb-20">
        @foreach($post['content'] as $post)
            @if($post['type'] === 'img')
                <div class="mb-10">
                    <img src="{{$post['data']['url']}}" alt="" class="w-full h-auto rounded-lg">
                </div>
            @elseif($post['type'] === 'text')
                <div class="mb-10">
                    {!! $post['data']['content'] !!}
                </div>
            @endif
        @endforeach
    </section>

    <x-post-slider/>
</main>

<section x-data="videoPlayer()" id="manufacture" class="relative">
    <img src="/fixed/cells-bg.svg" class="absolute left-0 top-40" alt="">
    <img src="/fixed/cells-bg-2.svg" class="absolute right-0 bottom-0" alt="">
    <h2 class="text-center text-blue-600 mb-20 relative  tracking-wide">«Земляне» в Архангельске<br>за 3 минуты</h2>
    <div class="content relative !max-w-6xl  rounded-[20px] relative flex items-center justify-center">
{{--        <div id="video-desc" class="absolute -bottom-12 -left-12 flex flex-col gap-2 py-2 px-4 rounded-xl z-50 bg-blue-500 text-bright-500 text-center w-auto border-t-4 border-r-4 border-bright-500 md:hidden">--}}
{{--            <h2 class="text-2xl">«Земляне» на открытии медиаклуба ВСЕРОССИЙСКОГО<br>ЭКОЛОГИЧЕСКОГО ДВИЖЕНИЯ «ЭКОСИСТЕМА»</h2>--}}
{{--            <p class="text-bright-600">Александр Цыбульский, Александр Уланов, Микаил Камилов</p>--}}
{{--        </div>--}}
        <div id="video_cover" style="background-image: url('/fixed/video-background.png')"
             class="w-full z-20 bg-cover absolute  flex items-center justify-center bottom-0 top-0 h-full rounded-3xl">
            <div @click="playVideo('manufactured_video')"
                 class="flex items-center justify-center bg-bright-500 p-5 bg-opacity-80 rounded-full">
                <x-heroicon-s-play class="w-12 cursor-pointer"></x-heroicon-s-play>
            </div>
        </div>
        <video id="manufactured_video" class="w-[99%] rounded-3xl" controls>
            <source src="/fixed/main-video.mp4" type="video/mp4">
            Your browser does not support HTML video.
        </video>
    </div>

    <script>
        function videoPlayer() {
            return {
                playVideo(videoId) {
                    console.log('test')
                    const videoElement = document.getElementById(videoId);
                    if (videoElement) {
                        videoElement.classList.remove('hidden'); // Показываем видео
                        videoElement.play(); // Запускаем видео
                    }
                    const videoCover = document.getElementById('video_cover');
                    videoCover.style.display = 'none'; // Скрываем кнопку
                    document.getElementById('video-desc').style.display = 'none'
                }
            };
        }
    </script>
</section>

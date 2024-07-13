<div class="flex justify-center items-center flex-col gap-4">
    <audio id="audio" controls>
        <source src="{{ $music }}" type="audio/mpeg">
    </audio>
    <div> Tentative : {{ $tentative }}</div>
    <div class="flex gap-4">
        <input type="text" wire:model="guess">
        <button wire:click="check">Guess</button>
    </div>
</div>

@script
    <script>
        let vid = document.getElementById("audio");
        let timeout;
        let duration = 1;
        let maxDuration = 0.5;

        vid.volume = 0.2;

        vid.onplay = function() {
            if (vid.currentTime >= maxDuration) {
                vid.currentTime = 0;
            }

            timeout = setTimeout(() => {
                vid.pause();
            }, duration * 1000)
        };

        $wire.on('check', () => {
            if (@js($musicName) === @this.guess) {
                alert('Correct!');
                @this.success();
            } else {
                alert('Incorrect!');

                console.log({
                    duration
                })
                duration *= 2;
                vid.currentTime = 0;
            }
        });

        $wire.on('success', () => {
            alert('Success!');
            // Next song
        });

        function resetTimeout() {
            clearTimeout(timeout);

            timeout = vid.onplay = function() {
                setTimeout(() => {
                    vid.pause();
                }, duration * 1000)
            };
        };
    </script>
@endscript

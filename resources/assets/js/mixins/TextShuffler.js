export default {
    methods: {
        textShuffle() {
            $('[data-shuffle]').each(function (key, el) {
                var text = new CS(el, {
                    times: 20,
                    chars: '█▓▒░█▓▒░█▓▒░█▓▒░█▓▒░█▓▒░<>/,.?/\\(^)![]{}*&^%$#\'"'
                });
                text.shuffle();
            })
        },
    }
};

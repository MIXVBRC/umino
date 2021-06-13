<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="preload-window">
    <style>
        .preload-window {
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            z-index:9000;
            background-color: #fff;
        }
        @keyframes preload__process {
            0% {opacity:0}
            100% {opacity:1}
        }
        @keyframes preload__ready {
            0% {opacity:1}
            100% {opacity:0}
        }
        .preload__ready {
            animation: preload__ready 200ms ease-in-out forwards;
        }
    </style>
    <div class="preload-window__process"></div>
    <script>
        let preload = document.querySelector('.preload-window');
        window.onload = function () {
            preload.classList.add('preload__ready');
            setTimeout(function () {
                preload.remove();
            }, 200);
        };
    </script>
</div>
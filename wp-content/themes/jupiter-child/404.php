<?php
/*
** 404.php
** mk_build_main_wrapper : builds the main divisions that contains the content. Located in framework/helpers/global.php
** mk_get_view gets the parts of the pages, modules and components. Function located in framework/helpers/global.php
*/

get_header(); ?>

<style>
* {
    margin: 0;
    padding: 0;
}

html {
    height: 100%;
    overflow: hidden;
}

canvas {
    z-index: 1;
    position: absolute;
    left: 0;
    top: 0;
	bottom: 0;
    width: 100%;
    height: 100%;
}

.caps {
    z-index: 2;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    animation: as 8s linear infinite;
}

.caps img {
    display: block;
    width: 100%;
    height: 100%;
}

@keyframes as {
    0% {
        opacity: 0;
    }
    10% {
        opacity: .3;
    }
    20% {
        opacity: .1;
    }
    30% {
        opacity: .5;
    }
    40% {
        opacity: 0;
    }
    50% {
        opacity: .8;
    }
    55% {
        opacity: 0;
    }
    55% {
        opacity: 0;
    }
}

.frame {
    z-index: 3;
    position: absolute;
    left: 0;
    top: 0;
	bottom: 0;
    width: 100%;
    height: 100%;
    background: -moz-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%); /* FF3.6+ */
    background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(19%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.9))); /* Chrome,Safari4+ */
    background: -webkit-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%); /* Chrome10+,Safari5.1+ */
    background: -o-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%); /* Opera 12+ */
    background: -ms-radial-gradient(center, ellipse cover, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%); /* IE10+ */
    background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 19%, rgba(0, 0, 0, 0.9) 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr = '#00000000', endColorstr = '#e6000000', GradientType = 1); /* IE6-9 fallback on horizontal gradient */

}

.frame div {
    position: absolute;
    left: 0;
    top: -20%;
    width: 100%;
    height: 20%;
    background-color: rgba(0, 0, 0, .12);
    box-shadow: 0 0 10px rgba(0, 0, 0, .3);
    animation: asd 12s linear infinite;
}

.frame div:nth-child(1) {
    animation-delay: 0;
}

.frame div:nth-child(2) {
    animation-delay: 4s;
}

.frame div:nth-child(3) {
    animation-delay: 8s;
}

@keyframes asd {
    0% {
        top: -20%;
    }
    100% {
        top: 100%;
    }
}

h1 {
    z-index: 3;
    position: absolute;
    font: bold 200px/200px 'Arvo', sans-serif;
    left: 50%;
    top: 50%;
    margin-top: -10% !important;
    margin-left: -50% !important;
	margin-bottom: inherit !important;
	margin-right: inherit !important;
	width: 100%;
    height: 200px;
	font-size: 8em !important;
	font-weight: 700 !important;
	line-height: inherit !important;
	letter-spacing: 2px;
    text-align: center;
    color: transparent;
    text-shadow: 0 0 30px rgba(0, 0, 0, .5);
    animation: h57-glitch-1 2s linear infinite;
}

h2 {
    z-index: 3;
    position: absolute;
    font: bold 200px/200px 'Arvo', sans-serif;
    left: 50%;
    top: 50%;
    margin-top: 10% !important;
    margin-left: -50% !important;
	margin-bottom: inherit !important;
	margin-right: inherit !important;
	width: 100%;
    height: 200px;
	font-size: 4em !important;
	font-weight: inherit !important;
	line-height: inherit !important;
	letter-spacing: 2px;
    text-align: center;
    color: transparent;
    text-shadow: 0 0 30px rgba(0, 0, 0, .5);
    animation: h57-glitch-1 2s linear infinite;
}

#mk-footer, #sub-footer { display: none;}

@keyframes h57-glitch-1 {
    0% {
        text-shadow: 0 0 30px rgba(0, 0, 0, .5);
    }
	11% {
        text-shadow: 0 0 20px rgba(0, 0, 0, .1);
    }
	22% {
        text-shadow: 0 0 20px rgba(0, 0, 0, .7);
    }
    33% {
        text-shadow: 0 0 10px rgba(0, 0, 0, .5);
    }
	44% {
        text-shadow: 0 0 10px rgba(0, 0, 0, .2);
    }
	55% {
        text-shadow: 0 0 10px rgba(0, 0, 0, .8);
    }
    66% {
        text-shadow: 0 0 20px rgba(0, 0, 0, .1);
    }
	77% {
        text-shadow: 0 0 20px rgba(0, 0, 0, .7);
    }
	88% {
        text-shadow: 0 0 20px rgba(0, 0, 0, .6);
    }
	99% {
        text-shadow: 0 0 20px rgba(0, 0, 0, .1);
    }
    100% {
        text-shadow: 0 0 40px rgba(0, 0, 0, .8);
    }
}


</style>

<h1 class="glitch">404</h1>
<h2 class="glitch">not found</h2>

<div class="frame">
    <div></div>
    <div></div>
    <div></div>
</div>
<canvas id="canvas"></canvas>



<script type="text/javascript">

var Application = ( function () {
        var canvas;
        var ctx;
        var imgData;
        var pix;
        var WIDTH;
        var HEIGHT;
        var flickerInterval;

        var init = function () {
            canvas = document.getElementById('canvas');
            ctx = canvas.getContext('2d');
            canvas.width = WIDTH = 700;
            canvas.height = HEIGHT = 500;
            ctx.fillStyle = 'white';
            ctx.fillRect(0, 0, WIDTH, HEIGHT);
            ctx.fill();
            imgData = ctx.getImageData(0, 0, WIDTH, HEIGHT);
            pix = imgData.data;
            flickerInterval = setInterval(flickering, 30);
        };

        var flickering = function () {
            for (var i = 0; i < pix.length; i += 4) {
                var color = (Math.random() * 255) + 50;
                pix[i] = color;
                pix[i + 1] = color;
                pix[i + 2] = color;
            }
            ctx.putImageData(imgData, 0, 0);
        };

        return {
            init: init
        };
    }());

    Application.init();
</script>

<?php get_footer();
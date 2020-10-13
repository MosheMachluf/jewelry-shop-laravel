$(document).ready(() => {
    $(document.body).removeClass('show-spinner', 5000);
});


$('select.dropdown').dropdown();
$('.dropdown').dropdown();


$(".green.segment.delay").delay(3000).slideUp();

function numberWithCommas(num) {
    return num.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

$(".number-format").each(function () {
    const num = $(this).text();
    $(this).text(numberWithCommas(num));
});


let openNav = false;

function toggleNav() {
    if (!openNav) {
        $('#nav-toggle').attr('style', 'right: 0%;');
        $('.overlay').fadeIn(500);
        disableScroll();
    } else {
        $('#nav-toggle').attr('style', 'right: -50%;');
        $('.overlay').fadeOut(500);
        enableScroll();
    }
    openNav = !openNav;
}

$('#hamburger').on('click', toggleNav);

$(window).on('resize', function () {
    if (window.innerWidth >= 768 && openNav == true) {
        toggleNav();
        openNav = false;
    }
});

// left: 37, up: 38, right: 39, down: 40,
// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
var keys = {
    37: 1,
    38: 1,
    39: 1,
    40: 1
};

function preventDefault(e) {
    e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
    window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
        get: function () {
            supportsPassive = true;
        }
    }));
} catch (e) {}

var wheelOpt = supportsPassive ? {
    passive: false
} : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
    window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
    window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
    window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
    window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// call this to Enable
function enableScroll() {
    window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.removeEventListener(wheelEvent, preventDefault, wheelOpt);
    window.removeEventListener('touchmove', preventDefault, wheelOpt);
    window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}

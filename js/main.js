$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:20,
        nav: false,
        responsiveClass:true,
        autoplay: true,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })
});
$('.owl-carousel').owlCarousel({
    autoplay: true,
    autoplayHoverPause: true,
    autoplayTimeout: 4000,
    loop:true,
    margin:10,
    nav:false,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

function nmNavOpen() {
    document.getElementById("nmNavigation").style.height = "100%";
}

function nmNavClose() {
    document.getElementById("nmNavigation").style.height = "0%";
}
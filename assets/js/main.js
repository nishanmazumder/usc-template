jQuery(document).ready(function ($) {
    $('.nm_course .owl-carousel').owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 4000,
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })

    // var validator = $( "#nmApplyForm" ).validate();
    // validator.form();

    $("#nmApplyForm").validate({
        rules: {
            usc_name: "required",
            usc_email: {
                required: true,
                email: true
            },
            usc_phone: "required",
            usc_country: "required",
            usc_zip: "required"
        },

        // messages: {
        //     usc_name: "Please enter your name",
        //     usc_phone: "Please enter your phone number",
        //     usc_name: "Please enter your name",
        //     usc_name: "Please enter your name",
        //     nmMail: "Please enter a valid email address"
        // }
    })

});


function nmNavOpen() {
    document.getElementById("nmNavigation").style.height = "100%";
}

function nmNavClose() {
    document.getElementById("nmNavigation").style.height = "0%";
}

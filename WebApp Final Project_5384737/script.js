/* Function to add navbar Bckgd color when scrolled down*/
$(document).ready(function () {
    $(window).scroll(function () {
        if (this.scrollY > 100) {
            $('.navbar').addClass("sticky");
        }
        else {
            $('.navbar').removeClass("sticky");
        }
    })
});
console.log($(window).scrollTop())
$(window).scroll(function() {
    var scrollDist = $(window).scrollTop()
    console.log(scrollDist);

    if (scrollDist < 100) {
        document.getElementById("home").addClass("hoverBar")
    }
})
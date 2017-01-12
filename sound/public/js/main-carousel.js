$('.best-carousel').owlCarousel({
    margin:15,
    loop:true,
    autoWidth:true,
    items:5,
	center:true,
	autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
});

$('.artist-carousel').owlCarousel({
    loop:true,
    autoWidth:true,
    items:1,
});

$('.main-list-carousel').owlCarousel({
    autoHeightClass: 'main-list-wrap',
    items: 1,
    center: true,
    autoHeight: true,
    touchDrag: false,
    dotsContainer: '.dots-wrap',
    mouseDrag: false
});
$('#detail-content-carousel').owlCarousel({
    autoHeightClass: 'detail-content-item',
    items: 1,
    center: true,
    autoHeight: true,
    touchDrag: false,
    dotsContainer: '.dots-wrap'
});

$('.post-carousel').owlCarousel({
    margin:0,
    loop:false,
    autoWidth:true,
	center:true,
	lazyLoad:true,
	lazyContent:true
});
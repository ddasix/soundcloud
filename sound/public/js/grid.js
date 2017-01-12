$(window).load(function(){
    $('.grid').masonry({
        itemSelector: '.main-product',
        columnWidth: '.main-product',
        percentPosition: true
    });
});
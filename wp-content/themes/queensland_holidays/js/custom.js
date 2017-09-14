$( document ).ready(function() {
    $('.carousel').carousel({
	  interval: 10000
	});
    //$("a[rel^='prettyPhoto']").prettyPhoto();
});
$(document).ready(function(){

    //$('#mapModal').on('shown.bs.modal', function () {
        //google.maps.event.trigger(map_canvas, "resize");
   // });

    
    $("#carousel-property").owlCarousel({
        autoPlay:3000,
        items:5,
        loop:false,
        margin:10,
        dots:true,
        //nav:true,
        //navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:1,
                
            },
            600:{
                items:3,
                
            },
            1000:{
                items:4,
               
            }
        }
    });
    var dot = $('#carousel-property .owl-dot');
    dot.each(function(){
        var index = $(this).index();
        $(this).text(index + 1);
    });


});
//$('#mapModal').on('shown.bs.modal', function () {
        //google.maps.event.trigger(map_canvas, "resize");
   // });

$(document).ready(function() {
    $('#mapModal').on('shown.bs.modal', function () {
        google.maps.event.trigger(map_canvas, "resize");
            //alert('testjkdsf');
        rescale();
    });
});
$(document).ready(function() {
    $('#map-search a.map-button').on('click', function(){
        var post_code = $('#map-search input[type="search"]').val();
        
    });
});
function rescale(){
    var size = {width: $(window).width() , height: $(window).height() }
    /*CALCULATE SIZE*/
    var offset = 20;
    var offsetBody = 150;

    /*$('#mapModal').css('height', size.height - offset );
    $('.modal-body').css('height', size.height - (offset + offsetBody));*/
    $('#mapModal').css('top', 0);
}
$(window).bind("resize", rescale);
$('#tg-homeslider').owlCarousel({
    nav: true,
    autoplay:true,
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0: { items:1 },
		480: { items:1 },
		600: { items:1 },
		1000: { items:1 },
		1200: { items:1 },
    },
    navText: [
		'<i class="icon-chevron-left"></i>',
		'<i class="icon-chevron-right"></i>'
	],
	navClass: [
		'owl-prev tg-btnround tg-btnprev',
		'owl-next tg-btnround tg-btnnext'
	]
});

$('#tg-authorsslider').owlCarousel({
    nav: true,
    autoplay:true,
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0: { items:2 },
		480: { items:2 },
		600: { items:3 },
		1000: { items:5 },
		1200: { items:6 },
    },
    navText: [
		'<i class="icon-chevron-left"></i>',
		'<i class="icon-chevron-right"></i>'
	],
	navClass: [
		'owl-prev tg-btnround tg-btnprev',
		'owl-next tg-btnround tg-btnnext'
	]
});

$('#tg-bestsellingbooksslider').owlCarousel({
    nav: true,
    autoplay:true,
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0: { items:2 },
		480: { items:2 },
		600: { items:3 },
		1000: { items:5 },
		1200: { items:6 },
    },
    navText: [
		'<i class="icon-chevron-left"></i>',
		'<i class="icon-chevron-right"></i>'
	],
	navClass: [
		'owl-prev tg-btnround tg-btnprev',
		'owl-next tg-btnround tg-btnnext'
	]
});

$('#tg-authorscornerslider').owlCarousel({
    nav: true,
    autoplay:true,
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0: { items:1 },
		600: { items:2 },
		992: { items:3 },
		1200: { items:4 },
    },
    navText: [
		'<i class="icon-chevron-left"></i>',
		'<i class="icon-chevron-right"></i>'
	],
	navClass: [
		'owl-prev tg-btnround tg-btnprev',
		'owl-next tg-btnround tg-btnnext'
	]
});

$('#searchPopBtn').click(function(e) {
	e.preventDefault();
	//alert();
	//$('#searchPopForm')
	var searchPopForm = $('#searchPopForm').html();
	$('#searchModal div div.modal-content').html(searchPopForm);
	$('#searchModal').modal('show');
});
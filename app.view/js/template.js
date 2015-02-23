$(document).ready(function() {
	$('#slider').rhinoslider({
		effectTime: 3000,
		showTime: 10000,
		slideNextDirection: 'toTop',
		easing: 'easeInOutQuart',
		controlsPrevNext: false,
		controlsPlayPause: false,
		autoPlay: true,
		showBullets: 'never',
		changeBullets: 'before',
		prevText: '',
		nextText: ''
	});
});
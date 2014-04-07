$(function() {
	if (window.PIE) {
		$('.top-row .btn-yellow, .slider .text .btn-read-more, input[type="submit"], .btn-more, .service-area, .service-area .block .image-box, .text-area .btn-more').each(function() {
			PIE.attach(this);
		});
	}
});
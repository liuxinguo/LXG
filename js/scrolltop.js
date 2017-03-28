//·µ»Ø¶¥²¿
function b() {
	h = $(window).height(),
	t = $(window).scrollTop(),
	t > 200 ? $("#scrolltop").show() : $("#scrolltop").hide()
}
$(document).ready(function() {
	b(),
	$("#scrolltop").click(function() {
		$(document).scrollTop(0)
	})
}),
$(window).scroll(function() {
	b()
});


$(document).ready(function () {
	const handleCommonNavFunction = () => {
		$("#nav ul li div").removeClass("selected")
		$("#nav ul li a").removeClass("selected")
		$("#nav ul.low_depth").hide()
	}

	$("#nav ul li a.none_low_depth").click(function () {
		handleCommonNavFunction()
		$(this).addClass("selected")
	})
	$("#nav ul li .has_low_depth").click(function () {
		handleCommonNavFunction()
		$(this).addClass("selected")
		$(this).next().slideToggle()
	})
	$("#nav ul.low_depth li a").click(function () {
		$("#nav ul.low_depth li a").removeClass("selected")
		$(this).addClass("selected")
		$(this).next().slideToggle()
	})
})
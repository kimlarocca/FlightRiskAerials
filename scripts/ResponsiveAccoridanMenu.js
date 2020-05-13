$(window).load(function() {
	
	var divs = $('.RAMexpandContent'),
	content = divs.children('div');
	
	// hide all divs initially
	content.hide();
	//show first Div
	//showDiv('0');
	// function that shows the selected div
	function showDiv(divID) {
		var thisContent = $('#'+divID).find('.RAMexpandedContent')
		if ($(thisContent).is(':visible')) {
			thisContent.slideUp("slow");
			$('#'+divID).find('h3 .RAMexpand img').attr('src', 'images/plus.png');
		}
		else {
			content.not(thisContent).slideUp("slow", function() {
				$('#'+divID).parent().find('h3 .RAMexpand img').attr('src', 'images/plus.png');
			});
			thisContent.slideDown("slow", function() {
				$('#'+divID).find('h3 .RAMexpand img').attr('src', 'images/minus.png');
				// scroll to selected div
				$('html, body').animate({
					scrollTop: $("#"+divID).offset().top -50
				}, 700);
			});
		}
	}	
	
	// on click show the selected div
	divs.click(function() {
		showDiv($(this).attr('id'));
	});
	
});
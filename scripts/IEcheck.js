if(!document.addEventListener){
	//user has IE8 or lower
	jQuery('body').prepend('<div id="IEcheck" style="position:fixed; top:0; left:0; right:0; padding:20px; background-color:#eee; border:#333 1px solid; color:#333;z-index:999999;"><strong>Hey there! This website is optimized for modern web browsers and may not display correctly on your browser.</strong><br /><br />It looks like you have Internet Explorer 8 or below. Did you know that Microsoft.com does not even support your browser? Yes, it is *that* ancient. Please upgrade now to experience the best the web has to offer!<br /><br /><a href="http://www.microsoft.com/en-us/download/internet-explorer.htmlx">UPGRADE NOW</a> | <a href="#" id="IEclose">CLOSE THIS WINDOW</a></div>');	
	$('#IEclose').click(function(){
    	$('#IEcheck').hide();
	});
}
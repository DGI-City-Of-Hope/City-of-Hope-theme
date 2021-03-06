var IE6 = (navigator.userAgent.indexOf("MSIE 6")>=0) ? true : false;
if(IE6){

	$(function(){
		
		// overlay
		$("<div>")
			.css({
				'position': 'absolute',
				'top': '0px',
				'left': '0px',
				backgroundColor: 'black',
				'opacity': '0.75',
				'width': '100%',
				'height': $(document).height(),
				zIndex: 5000
			})
			.appendTo("body");
		
		// popup
		$("<div><p>You are using Internet Explorer 6.x, which is not supported by the Authors@City of Hope publications repository.<br /><br />If you are a City of Hope user please click <a href='file://///tech_1/apps/IE/IE7/setup.bat' target='_blank'>here</a> to upgrade to Internet Explorer 7<br /><br />If you are a Non-City of Hope user please click <a href='http://windows.microsoft.com/en-US/internet-explorer/products/ie/home' target='_blank'>here</a> to upgrade to IE7 or later.<br /><br />Reboot your computer after upgrading Internet Explorer.</p>")
			.css({
				backgroundColor: 'white',
				'top': '50%',
				'left': '50%',
				marginLeft: -210,
				marginTop: -100,
				width: 410,
				paddingRight: 10,
				height: 200,
				'position': 'absolute',
				zIndex: 6000,
                                padding: 20
			})
			.appendTo("body");
                $("select").attr("disabled", "disabled").css({ 'opacity': '0.75', 'backgroundColor': '#666'});
                        
	});		
}



// creates a first sidebar with equal height as the main-group column
Drupal.behaviors.equalColumns = function(context) { 
  
  //#sidebar-first-inner
  //#main-group
  
  var sidebarFirstHeight = $('#sidebar-first-inner').height();
  var mainGroupHeight = $('#main-group').height();
  if (mainGroupHeight > sidebarFirstHeight) {
    $('#sidebar-first-inner').height(mainGroupHeight);
  }
}
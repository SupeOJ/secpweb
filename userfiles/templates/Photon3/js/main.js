jQuery(document).ready(function($){
	//open navigation clicking the menu icon
	$('.cd-nav-trigger').on('click', function(event){
		event.preventDefault();
		toggleNav(true);
	});
	//close the navigation
	$('.cd-close-nav, .cd-overlay').on('click', function(event){
		event.preventDefault();
		toggleNav(false);
	});
	//select a new section
	$('.cd-nav li').on('click', function(event){
		event.preventDefault();
		var target = $(this),
			//detect which section user has chosen
			sectionTarget = target.data('menu');
		var url = $(this).children('a').attr('href');

		if( !target.hasClass('cd-selected') ) {
			//if user has selected a section different from the one alredy visible
			//update the navigation -> assign the .cd-selected class to the selected item
			target.addClass('cd-selected').siblings('.cd-selected').removeClass('cd-selected');
			//load the new section
			loadNewContent(sectionTarget);
		} else {
			// otherwise close navigation
			toggleNav(false);
		}
 		var index = url .lastIndexOf("\/");  
		var str  = url .substring(index + 1, url .length);
		// var tempstr = "docx";var temp = str.indexOf(tempstr);//==-1说明不存在
		var temparr = [".docx",".doc",".xlsx",".xls",".pptx",".ppt"];
		var temp = false;
		$.each(temparr,function(index,value){
			var hasStr = str.indexOf(value);
			if(hasStr !=-1){
				temp = true;return;
			}
		})
		
		//console.log(temp);
		if(temp){
			window.open("/docapi?doc="+url);

		}else{
			window.open(url);
		}
		
		// window.location.href= "http://172.16.5.13:8553/docapi?doc="+url;

	});

	function toggleNav(bool) {
		$('.cd-nav-container, .cd-overlay').toggleClass('is-visible', bool);
		$('main').toggleClass('scale-down', bool);
	}

	function loadNewContent(newSection) {
		//create a new section element and insert it into the DOM
		var section = $('<section class="cd-section '+newSection+'"></section>').appendTo($('main'));
		//load the new content from the proper html file
		section.load(newSection+'.html .cd-section > *', function(event){
			//add the .cd-selected to the new section element -> it will cover the old one
			section.addClass('cd-selected').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				//close navigation
				toggleNav(false);
			});
			section.prev('.cd-selected').removeClass('cd-selected');
		});

		$('main').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			//once the navigation is closed, remove the old section from the DOM
			section.prev('.cd-section').remove();
		});

		if( $('.no-csstransitions').length > 0 ) {
			//if browser doesn't support transitions - don't wait but close navigation and remove old item
			toggleNav(false);
			section.prev('.cd-section').remove();
		}
	}
});
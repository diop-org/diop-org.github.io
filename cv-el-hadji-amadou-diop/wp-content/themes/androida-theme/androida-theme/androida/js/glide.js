//Featured Content Glider: By http://www.dynamicdrive.com
//Created: Dec 22nd, 07'
//Updated (Jan 29th, 08): Added four possible slide directions: "updown", "downup", "leftright", or "rightleft"
//Updated (Feb 1st, 08): Changed glide behavior to reverse direction when previous button is clicked
//Updated (Feb 12th, 08): Added ability to retrieve gliding contents from an external file using Ajax ("remotecontent" variable added to configuration)
var $jx = jQuery.noConflict(); 
var featuredcontentglider={
	csszindex: 100,
	ajaxloadingmsg: '<b>Fetching Content. Please wait...</b>',
	glide:function(config, showpage, isprev){
		var selected=parseInt(showpage)
		if (selected>=config.$jxcontentdivs.length){ //if no content exists at this index position
			alert("No content exists at page "+(selected+1)+"! Loading 1st page instead.")
			selected=0
		}
		var $jxtarget=config.$jxcontentdivs.eq(selected)
		//Test for toggler not being initialized yet, or user clicks on the currently selected page):
		if (config.$jxtogglerdiv.attr('lastselected')==null || parseInt(config.$jxtogglerdiv.attr('lastselected'))!=selected){
			var $jxselectedlink=config.$jxtoc.eq(selected)
			config.$jxnext.attr('loadpage', (selected<config.$jxcontentdivs.length-1)? selected+1+'pg' : 0+'pg')
			config.$jxprev.attr('loadpage', (selected==0)? config.$jxcontentdivs.length-1+'pg' : selected-1+'pg')
			var startpoint=(isprev=="previous")? -config.startpoint : config.startpoint
			$jxtarget.css(config.leftortop, startpoint).css("zIndex", this.csszindex++) //hide content so it's just out of view before animating it
			var endpoint=(config.leftortop=="left")? {left:0} : {top:0} //animate it into view
			$jxtarget.animate(endpoint, config.speed)
			config.$jxtoc.removeClass('selected')
			$jxselectedlink.addClass('selected')
			config.$jxtogglerdiv.attr('lastselected', selected+'pg')
		}
	},

	getremotecontent:function(config){
		config.$jxglider.html(this.ajaxloadingmsg)
		$jx.ajax({
			url: config.remotecontent,
			error:function(ajaxrequest){
				config.$jxglider.html('Error fetching content.<br />Server Response: '+ajaxrequest.responseText)
			},
			success:function(content){
				config.$jxglider.html(content)
				featuredcontentglider.setuptoggler(config)
			}
		})
	},

	aligncontents:function(config){
		config.$jxcontentdivs=$jx("#"+config.gliderid+" ."+config.contentclass)
		config.$jxcontentdivs.css(config.leftortop, config.startpoint).css({height: config.$jxglider.height(), visibility: 'visible'}) //position content divs so they're out of view:
	},

	setuptoggler:function(config){
		this.aligncontents(config)
		config.$jxtogglerdiv.hide()
		config.$jxtoc.each(function(index){
				$jx(this).attr('pagenumber', index+'pg')
				if (index > (config.$jxcontentdivs.length-1))
					$jx(this).css({display: 'none'}) //hide redundant "toc" links
		})
		var $jxnextandprev=$jx("#"+config.togglerid+" .next, #"+config.togglerid+" .prev")
		$jxnextandprev.click(function(event){ //Assign click behavior to 'next' and 'prev' links
			featuredcontentglider.glide(config, this.getAttribute('loadpage'), this.getAttribute('buttontype'))
			event.preventDefault() //cancel default link action
		})
		config.$jxtoc.click(function(event){ //Assign click behavior to 'toc' links
			featuredcontentglider.glide(config, this.getAttribute('pagenumber'))
			event.preventDefault()
		})
		config.$jxtogglerdiv.fadeIn(1000, function(){
			featuredcontentglider.glide(config, config.selected)
			if (config.autorotate==true){ //auto rotate contents?
				config.stepcount=0 //set steps taken
				config.totalsteps=config.$jxcontentdivs.length*config.autorotateconfig[1] //Total steps limit: num of contents x num of user specified cycles)
				featuredcontentglider.autorotate(config)
			}
		})
		config.$jxtogglerdiv.click(function(){
			featuredcontentglider.cancelautorotate(config.togglerid)
		})
	},

	autorotate:function(config){
		var rotatespeed=config.speed+config.autorotateconfig[0]
		window[config.togglerid+"timer"]=setInterval(function(){
			if (config.totalsteps>0 && config.stepcount>=config.totalsteps){
				clearInterval(window[config.togglerid+"timer"])
			}
			else{
				config.$jxnext.click()
				config.stepcount++
			}
		}, rotatespeed)
	},

	cancelautorotate:function(togglerid){
		if (window[togglerid+"timer"])
			clearInterval(window[togglerid+"timer"])
	},

	getCookie:function(Name){ 
		var re=new RegExp(Name+"=[^;]+", "i") //construct RE to search for target name/value pair
		if (document.cookie.match(re)) //if cookie found
			return document.cookie.match(re)[0].split("=")[1] //return its value
		return null
	},

	setCookie:function(name, value){
		document.cookie = name+"="+value
	},

	init:function(config){
		$jx(document).ready(function(){
			config.$jxglider=$jx("#"+config.gliderid)
			config.$jxtogglerdiv=$jx("#"+config.togglerid)
			config.$jxtoc=config.$jxtogglerdiv.children('.toc')
			config.$jxnext=config.$jxtogglerdiv.children('.next')
			config.$jxprev=config.$jxtogglerdiv.children('.prev')
			config.$jxprev.attr('buttontype', 'previous')
			var selected=(config.persiststate)? featuredcontentglider.getCookie(config.gliderid) : config.selected
			config.selected=(isNaN(parseInt(selected))) ? config.selected : selected //test for cookie value containing null (1st page load) or "undefined" string	
			config.leftortop=(/up/i.test(config.direction))? "top" : "left" //set which CSS property to manipulate based on "direction"
			config.heightorwidth=(/up/i.test(config.direction))? config.$jxglider.height() : config.$jxglider.width() //Get glider height or width based on "direction"
			config.startpoint=(/^(left|up)/i.test(config.direction))? -config.heightorwidth : config.heightorwidth //set initial position of contents based on "direction"
			if (typeof config.remotecontent!="undefined" && config.remotecontent.length>0)
				featuredcontentglider.getremotecontent(config)
			else
				featuredcontentglider.setuptoggler(config)
			$jx(window).bind('unload', function(){ //clean up and persist
				config.$jxtogglerdiv.unbind('click')
				config.$jxtoc.unbind('click')
				config.$jxnext.unbind('click')
				config.$jxprev.unbind('click')
				if (config.persiststate)
					featuredcontentglider.setCookie(config.gliderid, config.$jxtogglerdiv.attr('lastselected'))
				config=null
				
			})
		})
	}
}
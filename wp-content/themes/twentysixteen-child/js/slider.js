/* Created By Hai
 * Date:10/10/2017
                   ... panel show ..
				   .               .
 cloned slider 2---.---slider 1<---.slider 2<-----cloned slider 1
                   .................                     .
				        ^                                .
						.                                .
						..................................
*/
jQuery(document).ready(function($){
    'use strict';
	var slider_width     = $(window).width();
    var slider_visual_num= 2;//visual display slider items
	var slider_total_num = slider_visual_num +2;//2 for additional clone 
	var sliders_width  = slider_width*slider_total_num;
	var $sliderPanel   = $('.slider-panel');
	var slider_step    = 0;
	var slider_panel   = 0; //0,1,2,3;0,3 for clone panel
	var interval;
	
	$(window).resize(function() {
		 slider_width  = $(window).width();
		 sliders_width  = slider_width*slider_total_num;
		 $sliderPanel.css({'width':sliders_width+ 'px'});
	     $('.item-wrapper').css('width',slider_width + 'px');
    });
		
	function slider_markup(){//start with the none cloned panel
		slider_panel++;
		var slider_initial = -slider_panel*slider_width+'px';
		$sliderPanel.css({'width'             : sliders_width+ 'px',
						  '-webkit-transform' : 'translate3d('+slider_initial+',0,0)',
						  '-ms-transform'     : 'translate3d('+slider_initial+',0,0)',
						  '-o-transform'      : 'translate3d('+slider_initial+',0,0)',
						  '-moz-transform'    : 'translate3d('+slider_initial+',0,0)',
						  'transform'         : 'translate3d('+slider_initial+',0,0)'
							  });	
		$('.item-wrapper').css('width',slider_width + 'px');
		$('.dot1').addClass('activated');
		
	}
		  
	function slider_animation(){
		 var slider_initial_l =-slider_width+'px';
		 slider_panel++;
		 if(slider_panel=== slider_total_num ){//slider overflow
			slider_panel =2;
		 }
		slider_step =-slider_width*slider_panel;
		$sliderPanel.addClass('fancy-slider-transition-1').animate({'opacity':1},{
			duration:1600,
			step:function(){
				$(this).css({
						'-ms-transform'     : 'translate3d('+slider_step+'px,0,0)',
						'-o-transform'      : 'translate3d('+slider_step+'px,0,0)',
						'-moz-transform'    : 'translate3d('+slider_step+'px,0,0)',
						'-webkit-transform' : 'translate3d('+slider_step+'px,0,0)',
						'transform'         : 'translate3d('+slider_step+'px,0,0)'
				});
			},complete:function(){
				      if(slider_panel=== slider_total_num-1 ){//reached the last cloned slider,turn to visual panel 1
					    $(this).removeClass('fancy-slider-transition-1').css({
						  '-webkit-transform' : 'translate3d('+slider_initial_l+',0,0)',
						  'transform'         : 'translate3d('+slider_initial_l+',0,0)',
						  '-ms-transform'     : 'translate3d('+slider_initial_l+',0,0)',
						  '-o-transform'      : 'translate3d('+slider_initial_l+',0,0)',
						  '-moz-transform'    : 'translate3d('+slider_initial_l+',0,0)',
						});	  
				      }
			}
		});
		dot_sync();
	}  
	function arrow_event(){
		$('.slider-banner .btn-prev').click(function(){
			if(slider_panel=== 0){//transform to none-cloned panel
				slider_panel=2;
			}
			slider_animation();
		});
		$('.slider-banner .btn-next').click(function(){
			var slider_initial_r =-slider_visual_num*slider_width+'px';
			if(slider_panel=== 3){//transform to none-cloned panel
				slider_panel=1;
			}
			slider_panel--;
			if(slider_panel=== -1){//slider overflow
				slider_panel=1;
			}
			slider_step =-slider_width*slider_panel;
			$sliderPanel.addClass('fancy-slider-transition-1').animate({'opacity':1},{
			duration:1600,
			step:function(){
				$(this).css({
						'-ms-transform'     : 'translate3d('+slider_step+'px,0,0)',
						'-o-transform'      : 'translate3d('+slider_step+'px,0,0)',
						'-moz-transform'    : 'translate3d('+slider_step+'px,0,0)',
						'-webkit-transform' : 'translate3d('+slider_step+'px,0,0)',
						'transform'         : 'translate3d('+slider_step+'px,0,0)'
				});
			},complete:function(){
				      if(slider_panel===0){  //reached the first cloned slider,turn to visual panel 2
					      $(this).removeClass('fancy-slider-transition-1').css({
						  '-webkit-transform' : 'translate3d('+slider_initial_r+',0,0)',
						  'transform'         : 'translate3d('+slider_initial_r+',0,0)',
						  '-ms-transform'     : 'translate3d('+slider_initial_r+',0,0)',
						  '-o-transform'      : 'translate3d('+slider_initial_r+',0,0)',
						  '-moz-transform'    : 'translate3d('+slider_initial_r+',0,0)',
						  });	  
				       }
			 }
		   });
		   dot_sync();
	    });
	}
	
	function dot_event(){
		$('.slider-dots li').each(function(index){
			var $this =$(this);
			$this.on('click',function(){
			   slider_panel = index+1;
			   slider_step  = -slider_width*slider_panel;
			   $sliderPanel.addClass('fancy-slider-transition-1').css({
						'-ms-transform'     : 'translate3d('+slider_step+'px,0,0)',
						'-o-transform'      : 'translate3d('+slider_step+'px,0,0)',
						'-moz-transform'    : 'translate3d('+slider_step+'px,0,0)',
						'-webkit-transform' : 'translate3d('+slider_step+'px,0,0)',
						'transform'         : 'translate3d('+slider_step+'px,0,0)'
			   });
			   dot_sync();
		    });
		});
	}
	function dot_sync(){
	    var dot_index  = slider_panel;
		$('.slider-dots li').removeClass('activated');
		if(dot_index > slider_visual_num){
			dot_index=1;
		}
		if(dot_index < 1){
			dot_index=2;
		}
		$(".slider-dots li:nth-child("+dot_index+")").addClass('activated');
	}
	function fancy_main_loop(){	
		slider_animation();	
	}

	function stop_fancy_slider(){
		clearInterval(interval);
	}

	function start_fancy_slider(){
		interval=setInterval(fancy_main_loop,4000);
	}
    
	/*fire here*/
	slider_markup();
	start_fancy_slider();
	$('.site-slider').on('mouseenter',stop_fancy_slider).on('mouseleave',start_fancy_slider);
	arrow_event();
	dot_event();
	
	
});
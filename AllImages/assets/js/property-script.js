$ = jQuery;
$( document ).ready(function() {
  
  $h_slider_options =  {
      gallery: true,
      item: 1,
      loop:true,
      slideMargin: 0,
      thumbItem: 6,
      galleryMargin: 10,
      thumbMargin: 10,
      }; 

  $v_slider_options = {
      gallery: true,
      item: 1,
      loop:true,
      slideMargin: 0,
      thumbItem: 6,
      galleryMargin: 10,
      thumbMargin: 10,
      vertical: true
  };

  h_slider = $('#lightSlider').lightSlider($h_slider_options);
  v_slider = $('#lightSliderVertical').lightSlider($v_slider_options);

  /* Fancybox & lightSlider Sync - Bug Fix */
  $selector = '#lightSlider li:not(".clone") a';
  $selector += ',#lightSliderVertical li:not(".clone") a';
  $().fancybox({
    selector : $selector,
    backFocus : false, //The most important options for sync bug fix
    buttons : [ 
      'slideShow',
      'share',
      'zoom',
      'fullScreen',
      'thumbs',
      'download',
      'close'
    ]
  });
});

// #RESIZE BUG FIXING
// # if slider have height in % or vh,
// # on resize rebuild
$( window ).resize(function() {
		slider.destroy();
		h_slider = $('#ocassions-slider').lightSlider(h_slider_options);
});
 
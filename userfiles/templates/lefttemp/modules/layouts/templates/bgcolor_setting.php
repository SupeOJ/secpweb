<?php
  $layoutBackgound = get_option('layoutBackgound',$params['id']);
  $layoutBackgound = $layoutBackgound == false ? 'transparent' : $layoutBackgound;
  $layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
  $layoutBackgoundOpacity = $layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   

?>
<script>
    mw.moduleCSS('<?php print module_url(); ?>../css/jquery.range.css');
    mw.moduleJS('<?php print module_url(); ?>../js/jquery.range.js');


</script>
<div class="mw-ui-field-holder">
   <div style="float: left;line-height: 40px;" class="mw-ui-label">背景颜色</div>
   <span class="mw-ui-btn" id="bg-color-pick" style="background: <?php print $layoutBackgound;?>;">color</span>
   <input type="hidden" name="layoutBackgound"  class="layoutBackgound mw_option_field" value="<?php print $layoutBackgound;?>" />
</div> 
<div class="mw-ui-field-holder" style='padding:0;'>
   <div class="mw-ui-col" >
         <div class="mw-ui-col-container">
             <div class="mw-ui-field-holder">
                 <label class="mw-ui-check">
                    <span> 透明度</span>
                 </label>
             </div>
         </div>
     </div>
     <div class="mw-ui-col">
         <div class="mw-ui-col-container">
             <div class="mw-ui-field-holder">
                 <label class="mw-ui-check ">
                     <input type="hidden" class="range-slider-opacity" value="<?php print $layoutBackgoundOpacity ? $layoutBackgoundOpacity: 1;?>" />
                     <input name="layoutBackgoundOpacity" type="hidden" class="mw-ui-btn mw_option_field layout_backgound_opacity" value="<?php print $layoutBackgoundOpacity;?>" />
                     
                 </label>
             </div>
         </div>
    </div>
    <div class="mw-ui-col">
         <div class="mw-ui-col-container">
             <div class="mw-ui-field-holder" style='padding:0;'>
             <span class="mw-ui-btn submit_opacity">确定</span>
             </div>
         </div>
    </div>
</div>
<script>
$(window).load(function(){
   mw.colorPicker({
    element:'#bg-color-pick',
    position:'right-center',
    onchange:function(color){
      if(color == '#transparent') color = 'transparent';
      $('#bg-color-pick').css('background',color);
      $('.layoutBackgound').val(color);
      $(".layoutBackgound").change();
    }
  });
  	$('.range-slider-opacity').jRange({
  	    theme:'theme-blue',
  	    from: 0,
  	    to: 1,
  	    step: 0.01,
  	    format: '%s',
  	    width: 200,
  	    showLabels: true,
  	    isRange : false,
  	    showScale:false,
  	    onstatechange:function(o){
  	    	$('.layout_backgound_opacity').val(o);
  	    }
  	});

  	$('.submit_opacity').on('click',function() {
  		$('.layout_backgound_opacity').change();
  	})

});

</script>
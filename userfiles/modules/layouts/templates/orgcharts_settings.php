<?php
  $height = get_option('height',$params['id']);
  $height = $height ===false ? '600':$height;
  $circolor = get_option('circolor',$params['id']);
  $circolor = $circolor ===false ? '#ebf7ff':$circolor;  
?>
<module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />


<div class="mw-ui-row-nodrop">

  <div class="mw-ui-col">
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">圆圈颜色</label>
        <button  class="mw-ui-field" id="circolor-pick" style="background: <?php print $circolor;?>;">颜色</button>
        <input type="hidden" name="circolor" class="mw_option_field " id="circolor" value="<?php print $circolor;?>" />
    </div>
  </div>
  <div class="mw-ui-col">
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">高度</label>
        <input class="mw-ui-field mw_option_field " type="text" name="height"  value="<?php print $height;?>"  />
    </div>
  </div>  
</div>

<script>
$(window).load(function(){
   mw.colorPicker({
    element:'#circolor-pick',
    position:'right-center',
    onchange:function(color){
      if(color == '#transparent') color = 'transparent';
      $('#circolor-pick').css('background',color);
      $('#circolor').val(color);
      $("#circolor").change();
    }
  });
    
});

</script>
  
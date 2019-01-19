<?php 
/*

type: layout

name: orgchart

position: 15
*/
?>
<?php 
$orgchart_settings = get_option('orgchart_settings',$params['id']);

$datascource = '{"id":"1","name":"中心主题","children":[{"id":"2", "name":"分支主题一","children":[{"id":"5","name":"子主题一"},{"id":"6","name":"子主题二"},{"id":"7","name":"子主题三"}]},{"id":"3","name":"分支主题二"},{"id":"4", "name":"分支主题三"}]}';

$orgchart_settings = $orgchart_settings == false ? $datascource : $orgchart_settings;
$direction = get_option('direction',$params['id']);
$direction = $direction ? $direction :'t2b';

$orgchart_width = get_option('orgchart_width', $params['id']);
$orgchart_width = $orgchart_width == false ? 160 : $orgchart_width;

$orgchart_height = get_option('orgchart_height', $params['id']);
$orgchart_height = $orgchart_height == false ? 50 : $orgchart_height;

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound = $layoutBackgound == false ? 'transparent' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity = $layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   
$background =  'background:'. $layoutBackgound.';opacity:'.$layoutBackgoundOpacity;

?>
<script>
  mw.moduleCSS("<?php print $config['url_to_module']; ?>css/bootstrap.min.css");
  mw.moduleCSS("<?php print $config['url_to_module']; ?>orgchart/css/font-awesome.min.css");
  mw.moduleCSS("<?php print $config['url_to_module']; ?>orgchart/css/jquery.orgchart.css");
  mw.moduleJS("<?php print $config['url_to_module']; ?>orgchart/js/jquery.orgchart.js");
</script>
<style type="text/css">
  .chart-container {
    position: relative;
    display: inline-block;
    top: 10px;
    left: 10px;
    width: calc(100% - 24px);
    border-radius: 5px;
    overflow: auto;
    text-align: center;
  }
 .orgchart .node .title{
    background: #5983FF;
    border-radius: 0;
    box-shadow:5px 5px 5px 0px #999;
  }
  .orgchart td.top, .orgchart td.left, .orgchart td.right, .orgchart td>.down{border-color: #00B2A1;}

  <?php if($direction == "t2b" || $direction == "b2t"):?>
  #orghcart-<?php echo $params['id'];?> .orgchart .node .title , 
  #orghcart-<?php echo $params['id'];?> .orgchart.b2t .node .title {
    line-height: <?php print $orgchart_height;?>px;
    width: <?php print $orgchart_width;?>px;
    height:<?php print $orgchart_height;?>px;
  }
  <?php endif;?> 

  <?php if($direction == "r2l" || $direction == "l2r"):?>
  <?php 

  $orgchart_height = $orgchart_height %2 == 0 ? $orgchart_height :$orgchart_height +1;  
  $translate = 0.5*($orgchart_width-$orgchart_height);
  $w = $orgchart_height+10;
  $h = $orgchart_width+10;
  $o_w =  $orgchart_width*2;
  ?>
  .orgchart.l2r {position: relative; max-height: 800px;left:-10%;}
  .orgchart.r2l {position: relative; max-height: 800px;left:10%;}
  #orghcart-<?php echo $params['id'];?> .orgchart.l2r .node,
  #orghcart-<?php echo $params['id'];?> .orgchart.r2l .node {
    width: <?php print $w;?>px;
    height:<?php print $h;?>px;
  }
  #orghcart-<?php echo $params['id'];?> .orgchart.r2l .node .title,
  #orghcart-<?php echo $params['id'];?> .orgchart.l2r .node .title {
    line-height: <?php print $orgchart_height;?>px;
    width: <?php print $orgchart_width;?>px;
    height:<?php print $orgchart_height;?>px;
   }
   #orghcart-<?php echo $params['id'];?> .orgchart.r2l .node .title {
    -webkit-transform: rotate(-90deg)  translate(-<?php print $translate;?>px, -<?php print $translate;?>px);
    -moz-transform:rotate(-90deg)  translate(-<?php print $translate;?>px, -<?php print $translate;?>px);
    -ms-transform:rotate(-90deg)  translate(-<?php print $translate;?>px, -<?php print $translate;?>px);
    transform:rotate(-90deg)  translate(-<?php print $translate;?>px, -<?php print $translate;?>px);
   }
  #orghcart-<?php echo $params['id'];?> .orgchart.l2r .node .title {
    -webkit-transform: rotate(-90deg)  translate(-<?php print $translate;?>px, -<?php print $translate;?>px) rotateY(180deg); 
    -moz-transform:  rotate(-90deg)  translate(-<?php print $translate;?>px, -<?php print $translate;?>px) rotateY(180deg); 
    -ms-transform: rotate(-90deg)  translate(-<?php print $translate;?>px, -<?php print $translate;?>px) rotateY(180deg); 
    transform :rotate(-90deg)  translate(-<?php print $translate;?>px, -<?php print $translate;?>px) rotateY(180deg); 
  }
  <?php endif;?> 

  
}
</style>
<div id="orghcart-<?php echo $params['id'];?>" style="<?php echo $background;?>">
  <div class="chart-container"></div>
</div>


<script type="text/javascript">
  'use strict';
  (function($){

    $(function() {
      var datascource = <?php echo $orgchart_settings;?>;
      $('#orghcart-<?php echo $params['id'];?> .chart-container').orgchart({
        'data' : datascource,
        'direction': '<?php print $direction;?>',
        'parentNodeSymbol':''
      });

    });

  })(jQuery);
</script>

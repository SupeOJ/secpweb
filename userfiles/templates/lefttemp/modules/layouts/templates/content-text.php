<?php
/*

type: layout

name: content tabs

position: 9
*/
?>
<?php
$settings = get_option('settings', $params['id']);

if($settings == false){
    if(isset($params['settings'])){
        $settings = $params['settings'];
        $json = json_decode($settings, true);

    }
    else{

      $json = array(
          array('title' => '产业园','id' => 'tab-1-'.$params['id']),
          array('title' => '云计算','id' => 'tab-2-'.$params['id']),
          array('title' => '供应链金融','id' => 'tab-3-'.$params['id'])  
      );
    }
}
else{
    $json = json_decode($settings, true);
}

$tabs_num = get_option('tabs_num', $params['id']);
$tabs_num = count($json) ? count($json) : 3;
// save_option($settings);
$settings = $settings ? $settings : json_encode($json);


$json = json_decode($settings, true);

    switch($tabs_num){
          case 2:
              $tabs_num = 'col-md-6';
              break;
          case 3:
              $tabs_num = 'col-md-4';
              break;
          case 4:
              $tabs_num = 'col-md-3';
              break;                            
          default :
            $tabs_num='col-md-2'; 
          break;
    } 
$ColClass = $tabs_num;


$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'color';

$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/bg.jpg";

$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

$overlay = get_option('overlay', $params['id']); // y|NULL|false

$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#222222";

$overlayOpacity = get_option('overlayOpacity', $params['id']); // 0.1-1.0|false
$overlayOpacity = $overlayOpacity ? $overlayOpacity : "0.5";

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;  

$background =  'background:'. ($layoutBackgound == false ? '#fff' : $layoutBackgound).';opacity:'.($layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity  );

if($overlayColor == 1){$overlayColor = "rgba(255, 255, 255, 0.1)";}
    elseif($overlayColor == 2){$overlayColor = "#88ada6";}
    elseif($overlayColor == 3){$overlayColor = "#896c39";}
    elseif($overlayColor == 4){$overlayColor = "#a88462";}
    elseif($overlayColor == 5){$overlayColor = "#312520";}
    elseif($overlayColor == 6){$overlayColor = "#424c50";}
    elseif($overlayColor == 7){$overlayColor = "#758a99";}
    elseif($overlayColor == 8){$overlayColor = "#425066";}
    elseif($overlayColor == 9){$overlayColor = "#065279";}
    elseif($overlayColor == 10){$overlayColor = "#d3b17d";}
    elseif($overlayColor == 11){$overlayColor = "rgb(48, 48, 48)";}
    elseif($overlayColor == 12){$overlayColor = "#28262b";}
    elseif($overlayColor == 13){$overlayColor = "#B0C4DE";}
    elseif($overlayColor == 14){$overlayColor = "#FFB6C1";}
?>

<script>
mw.moduleCSS("<?php print $config['url_to_module']; ?>css/bootstrap.css");
mw.moduleCSS("<?php print $config['url_to_module']; ?>css/animate.css");
mw.moduleCSS("<?php print $config['url_to_module']; ?>css/tan.css");
</script>
<script>
    $(document).ready(function () {
        mw.tabs({
            nav: '#mw-etctabs-module-<?php print $params['id'] ?> .information_01 div',
            tabs: '#mw-etctabs-module-<?php print $params['id'] ?> .change6Main'
        });
        $('#mw-etctabs-module-<?php print $params['id'] ?> .information_01 div').eq(0).addClass('active');
    });
</script>
<div id="mw-etctabs-module-<?php print $params['id']; ?>" <?php if($parallax=='y' && $bground=='image' && $overlay!='y'){echo 'mbr-parallax-background';}elseif($bground=='image'){echo 'mbr-background';}?>" 
         style="<?php if($bground=='image'):?>background-image:url(<?php print $bgImage;?>);background-size:100% 100%;-moz-background-size:100% 100%;<?php endif;?>
                <?php if($bground=='color'):?><?php echo $background;?>;<?php endif;?>">
    <?php if($overlay=='y' && $bground!='color'): ?>
        <div class="mbr-overlay" style="opacity:<?php echo $overlayOpacity;?>;background-color:<?php echo $overlayColor;?>;"></div>
    <?php endif; ?>
   <div class="container">
    <div class="row">   
         <div class="information_01" style="margin-top: 5%;">
            <?php
                $count = 0;
                foreach ($json as $slide) {
                $count ++;
            ?>
            <div style="padding:0px;" class="<?php echo $ColClass;?> information_03 change6" ><?php echo $slide['title'];?><span class="box"></span></div>
            <?php } ?>      

        </div>

      <div class="">
        <?php

            $count = 0;
            foreach ($json as $slide) {
                $count ++;
                if(!isset($slide['id'])){
                    $slide['id'] = 'tab-'.$count.'-'.$params['id'];
                }
            ?>
        <div class="change6Main" style="<?php if ($count!=1){ ?> display: none; <?php } else { ?>display: block; <?php } ?>">
            <div class="edit allow-drop"
                 field="tab-item-<?php print $params['id'].$slide['id']; ?>"
                 rel="module-<?php print $params['id'].$slide['id']; ?>">
                <div class="element ">
                    <module type="tabscontent" id="<?php print $params['id'].$slide['id'];?>" /></div>
            </div>
        </div>
        <?php } ?>
      </div>        
    
        <!--</div>-->
    </div>
</div>

<?php

/*

type: layout

name: cards 1

position: 4
 

*/
$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'color';

$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/bg.jpg";

//背景视差
$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

//是否启用遮罩层
$overlay = get_option('overlay', $params['id']); // y|NULL|false
$overlay = $overlay === false ? 'y' : $overlay;

//遮罩透明度
$overlayOpacity = get_option('overlayOpacity', $params['id']); // 0.0-1.0|false
$overlayOpacity = $overlayOpacity ? $overlayOpacity : "0.1";

//遮罩层颜色
$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#28324E";

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
<style>.cards-layout-1 h1{margin:0;}</style>
<div class="edit" field="layout-skin-1-<?php print $params['id'] ?>" rel="layout" <?php if($parallax=='y' && $bground=='image' && $overlay!='y'){echo 'mbr-parallax-background';}elseif($bground=='image'){echo 'mbr-background';}?>" 
         style="<?php if($bground=='image'):?>background-image:url(<?php print $bgImage;?>);background-size:100% 100%;-moz-background-size:100% 100%;<?php endif;?>
                <?php if($bground=='color'):?><?php echo $background;?>;<?php endif;?>">
                 <?php if($overlay=='y' && $bground!='color'): ?>
        <div class="mbr-overlay" style="opacity:<?php echo $overlayOpacity;?>;background-color:<?php echo $overlayColor;?>;"></div>
    <?php endif; ?>

    <div class="cards-layout-1">
        <div class="info-text center p-t-30">
            <h1 class="m-b-10">我们的服务/OUT SERVICE</h1>
            <p>
                专注网站建设、网站设计、品牌设计、空间设计、网络营销、网站托管、整合营销服务为核心服务。专注于创意设计实现商业价值最大化，为所有谋求长远发展的企业提升品牌品质。拥有经验丰富技术团队，专业的资深设计师
            </p>
        </div>

        <div class="row cards">
            <div class="card col-xs-12 col-lg-4">
                <div class="icon-wrapper"><span class="fa fa-refresh"></span></div>
                <div class="card-block">
                    <h4 class="card-title">交互原型设计</h4>
                    <p class="card-text">信息架构、界面布局、快速原型

                    </p>
                    <module type="btn" text="阅读更多" button_style="btn-primary"  />
                </div>
            </div>

            <div class="card col-xs-12 col-lg-4">
                <div class="icon-wrapper"><span class="fa fa-refresh"></span></div>
                <div class="card-block">
                    <h4 class="card-title">产品视觉设计</h4>
                    <p class="card-text">视觉设计、品牌设计、图形设计

                    </p>
                    <module type="btn" text="阅读更多" button_style="btn-primary"  />
                </div>
            </div>

            <div class="card col-xs-12 col-lg-4">
                <div class="icon-wrapper"><span class="fa fa-refresh"></span></div>
                <div class="card-block">
                    <h4 class="card-title">软件界面设计</h4>
                    <p class="card-text">MacOS软件界面、Windows软件界面设计、其它终端软件界面
                    </p>
                    <module type="btn" text="阅读更多" button_style="btn-primary"  />
                </div>
            </div>
        </div>
    </div>
</div>

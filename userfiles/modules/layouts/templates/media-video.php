<?php

/*

type: layout

name: media video

position: 8

*/

?>
<?php
$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showSubtitle = get_option('showSubtitle', $params['id']); // y|NULL|false
$showSubtitle = $showSubtitle === false ? 'y' : $showSubtitle;

$showText = get_option('showText', $params['id']); // y|NULL|false
$showText = $showText === false ? 'y' : $showText;

$showBtn = get_option('showBtn', $params['id']); // y|NULL|false
$showBtn = $showBtn === false ? 'y' : $showBtn;

$textSide = get_option('textSide', $params['id']); // left|right|false
$textSide = $textSide ? $textSide : 'right';


$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   

$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/bg.jpg";

$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

$background =  'background:'. ($layoutBackgound == false ? '#3C3C3C' : $layoutBackgound).';opacity:'.($layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity  );

$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'color';

//是否启用遮罩层
$overlay = get_option('overlay', $params['id']); // y|NULL|false
$overlay = $overlay === false ? 'y' : $overlay;

//遮罩层颜色
$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#28324E";

//遮罩透明度
$overlayOpacity = get_option('overlayOpacity', $params['id']); // 0.0-1.0|false
$overlayOpacity = $overlayOpacity ? $overlayOpacity : "0.4";

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

$videoUrl = get_option('videoUrl', $params['id']); // http://...|false
$videoUrl = $videoUrl ? $videoUrl : "http://player.youku.com/embed/XNDkwNjY0NzAw";
?>
<script>
    if (!window.ca_res || !window.ca_res.mobirise_css) {
        mw.moduleCSS("<?php print $config['url_to_module']; ?>../../ca_res/mobirise/css/mobirise.css");
        if (!window.ca_res) window.ca_res = {
            mobirise_css: true
        };
        else window.ca_res.mobirise_css = true;
    };
    if (!window.ca_res || !window.ca_res.mobirise_js) {
        mw.moduleJS("<?php print $config['url_to_module']; ?>../../ca_res/mobirise/js/mobirise.js");
        if (!window.ca_res) window.ca_res = {
            mobirise_js: true
        };
        else window.ca_res.mobirise_js = true;
    };
</script>
<style>
    .module-caMediaVideo-text.mbr-header__text,
    .module-caMediaVideo-subtext.mbr-header__subtext,
    .module-caMediaVideo-article.mbr-article{color:#ffffff;font-family:"Roboto","Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;font-weight:normal;}
    @media (min-width:768px){
        .module-caMediaVideo-col-sm-6.col-sm-6{float:none;}
    }
    .module-caMediaVideo-btn{font-family:"Roboto","Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;font-weight:normal;}
</style>
<section class="mbr-section mbr-section--relative <?php if($parallax=='y' && $bground=='image'){echo 'mbr-parallax-background';}elseif($bground=='image'){echo 'mbr-background';}?>" 
         style="<?php if($bground=='image'):?>background-image:url(<?php print $bgImage;?>);background-size:100% 100%;-moz-background-size:100% 100%;<?php endif;?>
                <?php if($bground=='color'):?><?php echo $background;?>;<?php endif;?>">
    <?php if($overlay=='y' && $bground!='color'): ?>
        <div class="mbr-overlay" style="opacity:<?php echo $overlayOpacity;?>;background-color:<?php echo $overlayColor;?>;"></div>
    <?php endif; ?>
    <div class="mbr-section__container mbr-section__container--isolated container">
        <div class="row">
            <div class="mbr-box mbr-box--fixed mbr-box--adapted">
                <?php if($textSide=='right'):?>
                    <div class="mbr-box__magnet mbr-box__magnet--top-right mbr-section__left col-sm-6 module-caMediaVideo-col-sm-6" style="padding-right:40px;">
                        <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width">
                            <iframe class="mbr-embedded-video" src="<?php echo $videoUrl;?>" frameborder="0" allowfullscreen></iframe>
                        </figure>
                        <script>$(window).resize();</script>
                    </div>
                <?php endif;?>
                <div class="mbr-box__magnet mbr-class-mbr-box__magnet--center-left col-sm-6 module-caMediaVideo-col-sm-6 mbr-section__<?php echo $textSide;?>">
                    <div class="mbr-section__container mbr-section__container--middle">
                        <?php if($showTitle=='y'):?>
                            <div class="edit mbr-header mbr-header--auto-align mbr-header--wysiwyg"
                                 data-field="<?php echo $params['id'];?>-title" 
                                 rel="<?php echo $params['id'];?>" 
                                 data-id="<?php echo $params['id'];?>">
                                <h3 class="module-caMediaVideo-text mbr-header__text">视频嵌入</h3>
                            </div>
                        <?php endif;?>
                        <?php if($showSubtitle=='y'):?>
                            <div class="edit mbr-header mbr-header--auto-align mbr-header--wysiwyg"
                                 data-field="<?php echo $params['id'];?>-subtitle" 
                                 rel="<?php echo $params['id'];?>" 
                                 data-id="<?php echo $params['id'];?>"
                                 style="margin-top:8px;">
                                <p class="module-caMediaVideo-subtext mbr-header__subtext">在线视频一键拥有！</p>
                            </div>
                        <?php endif;?>
                    </div> 
                    <?php if($showText=='y'):?>
                        <div class="mbr-section__container mbr-section__container--middle">
                            <div class="edit module-caMediaVideo-article mbr-article mbr-article--auto-align mbr-article--wysiwyg"
                                 data-field="<?php echo $params['id'];?>-text" 
                                 rel="<?php echo $params['id'];?>" 
                                 data-id="<?php echo $params['id'];?>">
                                <p>在线视频现在是比有线电视更受欢迎的传播媒体，SECPWEB 提供了一个支持在线视频的展示，让您的网站更富有生气。</p>
                            </div>
                        </div>
                    <?php endif;?>
                    <?php if($showBtn=='y'):?>
                        <div class="mbr-section__container">
                            <div class="mbr-buttons mbr-buttons--auto-align btn-inverse">
                                <module class="module-caMediaVideo-btn" 
                                        data-type="caButton" 
                                        id="<?php echo $params['id'];?>-btn"
                                        data-text=" 了解更多 "></module>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
                <?php if($textSide=='left'):?>
                    <div class="mbr-box__magnet mbr-box__magnet--top-left mbr-section__right col-sm-6 module-caMediaVideo-col-sm-6">
                        <figure class="mbr-figure mbr-figure--adapted mbr-figure--caption-inside-bottom mbr-figure--full-width">
                            <iframe class="mbr-embedded-video" src="<?php echo $videoUrl;?>" frameborder="0" allowfullscreen></iframe>
                        </figure>
                        <script>$(window).resize();</script>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
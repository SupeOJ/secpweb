<?php
/*

type: layout

name: head image 2

position: 2

*/
$showTitle = get_option('showTitle', $params['id']); // y|false|NULL
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showText = get_option('showText', $params['id']); // y|false|NULL
$showText = $showText === false ? 'y' : $showText;

$showBtns = get_option('showBtns', $params['id']); // y|false|NULL
$showBtns = $showBtns === false ? 'y' : $showBtns;

$showArrow = get_option('showArrow', $params['id']); // y|false|NULL
$showArrow = $showArrow === false ? 'y' : $showArrow;

$contentAlign = get_option('contentAlign', $params['id']); // left|center|right|false
$contentAlign = $contentAlign ? $contentAlign : 'center';

$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'image';

$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/header_bg.jpg";

$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

$bgVedio = get_option('bgVedio', $params['id']); // http://...|false
$bgVedio = $bgVedio ? $bgVedio : "http://www.youtube.com/watch?v=uNCr7NdOJgw";

$overlay = get_option('overlay', $params['id']); // y|NULL|false
$overlay = $overlay === false ? 'y' : $overlay;

$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#28324E";

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#none' : $layoutBackgound;


$overlayOpacity = get_option('overlayOpacity', $params['id']); // 0.0-1.0|false
$overlayOpacity = $overlayOpacity ? $overlayOpacity : "0.8";

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   
$background =  'background:'. $layoutBackgound.';opacity:'.$layoutBackgoundOpacity;

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
    <?php if($bground=='video'): ?>
    if (!window.ca_res || !window.ca_res.mobirise_YTPlayer) {
        var isMobile = $.isMobile;
        mw.moduleJS("<?php print $config['url_to_module']; ?>../../ca_res/mobirise/js/jquery.mb.YTPlayer.min.js");
        $.isMobile = jQuery.isMobile = isMobile;
        if (!window.ca_res) window.ca_res = {
            mobirise_YTPlayer: true
        };
        else window.ca_res.mobirise_YTPlayer = true;
    };
    <?php endif; ?>
</script>
<style>
    .module-caHeader-btn{display:inline-block;margin-right:10px;}
    .module-caHeader-btn a.module-caButton{font-size:16px;padding-left:50px;padding-right:50px;}
    .module-caHeader-title,
    .module-caHeader-text,
    .module-caHeader-btn{font-family:"Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;}
</style>
<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted <?php if($parallax=='y' && $bground=='image')echo 'mbr-parallax-background'; ?>" 
         style="<?php if($bground=='image'):?>background-image:url(<?php print $bgImage;?>);background-size:100% 100%;-moz-background-size:100% 100%;<?php endif;?>
                <?php if($bground=='color'):?><?php echo $background;?>;<?php endif;?>"
         <?php if($bground=='video'){echo "data-bg-video='$bgVedio'";}?> >
    <div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-<?php if($contentAlign=='center'){echo 'center';}else{echo 'left';} ?>">
        <?php if($overlay=='y' && $bground!='color'): ?>
          <div class="mbr-overlay" style="opacity:<?php echo $overlayOpacity;?>;background-color:<?php echo $overlayColor;?>;"></div>
        <?php endif; ?>
        <div class="mbr-box__container mbr-section__container container">
            <div class="mbr-box mbr-box--stretched">
                <div class="mbr-box__magnet mbr-box__magnet--center-<?php if($contentAlign=='center'){echo 'center';}else{echo 'left';} ?>">
                    <div class="row">
                        <div class="<?php if('left'==$contentAlign){echo 'col-sm-6';}elseif('right'==$contentAlign){echo 'col-sm-6 col-sm-offset-6';}else{echo 'col-sm-8 col-sm-offset-2';} ?>">
                            <?php if ($showTitle == 'y'): ?>
                                <div class="edit mbr-hero animated fadeInUp module-caHeader-title"
                                     data-field="<?php echo $params['id'];?>-title" 
                                     rel="<?php echo $params['id'];?>" 
                                     data-id="<?php echo $params['id'];?>">
                                    <h1 class="mbr-hero__text" style="color:#fff">CASECP 网站建设</h1>
                                </div>
                            <?php endif; ?>
                            <?php if ($showText == 'y'): ?>
                                <div class="edit mbr-hero animated fadeInUp module-caHeader-text"
                                     data-field="<?php echo $params['id'];?>-text" 
                                     rel="<?php echo $params['id'];?>" 
                                     data-id="<?php echo $params['id'];?>">
                                    <p class="mbr-hero__subtext">无需代码，免费，一步到位，快速创建PC/手机/微信网站。</p>
                                </div>
                            <?php endif; ?>
                            <?php if ($showBtns == 'y'): ?>
                                <div class="mbr-buttons btn-inverse mbr-buttons--<?php if($contentAlign=='center'){echo 'center';}else{echo 'left';} ?>">
                                    <module class="module-caHeader-btn animated fadeInUp delay" 
                                            data-type="caButton" 
                                            id="<?php echo $params['id'];?>-btn1"
                                            data-text="免费体验"
                                            data-style="btn-danger"></module>
                                    <module class="module-caHeader-btn animated fadeInUp delay" 
                                            data-type="caButton" 
                                            id="<?php echo $params['id'];?>-btn2"
                                            data-text="抢先注册"></module>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($showArrow == 'y'): ?>
            <div class="mbr-arrow mbr-arrow--floating text-center">
                <div class="mbr-section__container container">
                    <a class="mbr-arrow__link" href="#module_caHeader_arrow_target"> <i class="glyphicon glyphicon-menu-down"></i></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php if ($showArrow == 'y'): ?>
<div id="module_caHeader_arrow_target"></div>
<?php endif; ?>
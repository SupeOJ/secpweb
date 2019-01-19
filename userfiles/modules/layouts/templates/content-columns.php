<?php
/*

type: layout

name: content columns

position: 3
*/

$showImg = get_option('showImg', $params['id']); // y|NULL|false
$showImg = $showImg === false ? 'y' : $showImg;

$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showCaption = get_option('showCaption', $params['id']); // y|NULL|false
$showCaption = $showCaption === false ? 'y' : $showCaption;

$showBtn = get_option('showBtn', $params['id']); // y|NULL|false
$showBtn = $showBtn === false ? 'y' : $showBtn;

$column = get_option('column', $params['id']); // 2|3|4|false
$column = $column ? $column : '4';

$imgSize = get_option('imgSize', $params['id']); // 100%|50%|false
$imgSize = $imgSize ? $imgSize : "50%";

//FGX20151127/////////////////////////////////////////////////
$anchor = get_option('anchor', $params['id']); // #...|NULL|false
$anchor = $anchor ? $anchor : "";

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   

$background =  'background:'. ($layoutBackgound == false ? '#ffffff' : $layoutBackgound).';opacity:'.($layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity  
);
$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'color';

$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/header_bg.jpg";

//背景视差
$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

//是否启用遮罩层
$overlay = get_option('overlay', $params['id']); // y|NULL|false
$overlay = $overlay === false ? 'y' : $overlay;

//遮罩透明度
$overlayOpacity = get_option('overlayOpacity', $params['id']); // 0.0-1.0|false
$overlayOpacity = $overlayOpacity ? $overlayOpacity : "0.4";

//遮罩层颜色
$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#28324E";

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


$showBigTitle = get_option('showBigTitle', $params['id']); // y|NULL|false
$showBigTitle = $showBigTitle === false ? 'y' : $showBigTitle;//显示大标题
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
.module-caContent-btn{display:inline-block;}
.module-caContent-text{height:130px;overflow:hidden;text-overflow:ellipsis;}
.can-proder-center{font-size: 28px;text-align: center;}
</style>
<?php if($anchor){echo "<div id='$anchor'></div>";}?>
<!--FGX20151127-->
<section class="module-caContent content-2 col-<?php echo $column;?>  <?php if($parallax=='y' && $bground=='image')echo 'mbr-parallax-background'; ?>" style="<?php if($bground=='image'):?>background-image:url(<?php print $bgImage;?>);background-size:100% 100%;-moz-background-size:100% 100%;<?php endif;?>
                <?php if($bground=='color'):?><?php echo $background;?>;<?php endif;?>"  >

        <?php if($overlay=='y' && $bground!='color'): ?>
          <div class="mbr-overlay" style="opacity:<?php echo $overlayOpacity;?>;background-color:<?php echo $overlayColor;?>;"></div>
        <?php endif; ?>
    <div class="container ">
        <?php if($showBigTitle=='y'): ?>
        <div class="can-proder-center edit" field="layout-proder-2-<?php print $params['id'] ?>" rel="layout" ><span>产品优势</span></div>
        <?php endif;?>
        <div class="row">
            <div>
                <div class="thumbnail">
                    <?php if($showImg=='y'):?>
                        <div class="edit thumbnail" 
                             data-field="<?php echo $params['id'];?>-img1" 
                             rel="<?php echo $params['id'];?>" 
                             data-id="<?php echo $params['id'];?>">
                            <img style="max-width:<?php echo $imgSize;?>;max-height:<?php echo $imgSize;?>;" src="<?php print $config['url_to_module']; ?>img/bootstrap.png">
                        </div>
                    <?php endif;?>
                    <div class="caption">
                        <div>
                            <?php if($showTitle=='y'):?>
                                <div class="edit" 
                                     data-field="<?php echo $params['id'];?>-title1" 
                                     rel="<?php echo $params['id'];?>" 
                                     data-id="<?php echo $params['id'];?>">
                                    <h3>BOOTSTRAP 3 框架</h3>
                                </div>
                            <?php endif;?>
                            <?php if($showCaption=='y'):?>
                                <div class="edit module-caContent-text" 
                                     data-field="<?php echo $params['id'];?>-text1" 
                                     rel="<?php echo $params['id'];?>" 
                                     data-id="<?php echo $params['id'];?>">
                                    <p>Bootstrap 3 是最受欢迎的 HTML、CSS 和 JS框架，用于开发响应式布局、移动设备优先的 WEB 项目。SECPWEB 正是使用了此框架。</p>
                                </div>
                            <?php endif;?>
                        </div>
                        <?php if($showBtn=='y'):?>
                            <div class="group">
                                <module class="module-caContent-btn" 
                                        data-type="caButton" 
                                        id="<?php echo $params['id'];?>-btn1"
                                        data-text="了解更多"
                                        data-size="btn-sm"></module>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div>
                <div class="thumbnail">
                    <?php if($showImg=='y'):?>
                        <div class="edit thumbnail" 
                             data-field="<?php echo $params['id'];?>-img2" 
                             rel="<?php echo $params['id'];?>" 
                             data-id="<?php echo $params['id'];?>">
                            <img style="max-width:<?php echo $imgSize;?>;max-height:<?php echo $imgSize;?>;" src="<?php print $config['url_to_module'];?>img/responsive.png">
                        </div>
                    <?php endif;?>
                    <div class="caption">
                        <div>
                            <?php if($showTitle=='y'):?>
                                <div class="edit" 
                                     data-field="<?php echo $params['id'];?>-title2" 
                                     rel="<?php echo $params['id'];?>" 
                                     data-id="<?php echo $params['id'];?>">
                                    <h3>响应式布局</h3>
                                </div>
                            <?php endif;?>
                            <?php if($showCaption=='y'):?>
                                <div class="edit module-caContent-text" 
                                     data-field="<?php echo $params['id'];?>-text2" 
                                     rel="<?php echo $params['id'];?>" 
                                     data-id="<?php echo $params['id'];?>">
                                    <p>Bootstrap 3 最大特点是响应各种设备的适配能力，SECPWEB 可以有效地利用此特性生成高度响应的网站给您。</p>
                                </div>
                            <?php endif;?>
                        </div>
                        <?php if($showBtn=='y'):?>
                            <div class="group">
                                <module class="module-caContent-btn" 
                                        data-type="caButton"
                                        id="<?php echo $params['id'];?>-btn2"
                                        data-text="了解更多"
                                        data-size="btn-sm"></module> 
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php if($column=='4'||$column=='3'):?>
                <div>
                    <div class="thumbnail">
                        <?php if($showImg=='y'):?>
                            <div class="edit thumbnail" 
                                 data-field="<?php echo $params['id'];?>-img3" 
                                 rel="<?php echo $params['id'];?>" 
                                 data-id="<?php echo $params['id'];?>">
                                <img style="max-width:<?php echo $imgSize;?>;max-height:<?php echo $imgSize;?>;" src="<?php print $config['url_to_module'];?>img/google-fonts.png">
                            </div>
                        <?php endif;?>
                        <div class="caption">
                            <div>
                                <?php if($showTitle=='y'):?>
                                    <div class="edit" 
                                         data-field="<?php echo $params['id'];?>-title3" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">
                                        <h3>时尚的模块</h3>
                                    </div>
                                <?php endif;?>
                                <?php if($showCaption=='y'):?>
                                    <div class="edit module-caContent-text" 
                                         data-field="<?php echo $params['id'];?>-text3" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">
                                        <p>选择最新的模块制作 —— 全屏幕介绍、轮播图、滑块内容、反应灵敏的图像画廊收藏夹、视差滚动、视频背景、折叠菜单、欢迎页等等</p>
                                    </div>
                                <?php endif;?>
                            </div>
                            <?php if($showBtn=='y'):?>
                                <div class="group">
                                    <module class="module-caContent-btn"
                                            data-type="caButton" 
                                            id="<?php echo $params['id'];?>-btn3"
                                            data-text="了解更多"
                                            data-size="btn-sm"></module> 
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if($column=='4'):?>
                <div>
                    <div class="thumbnail">
                        <?php if($showImg=='y'):?>
                            <div class="edit thumbnail" 
                                 data-field="<?php echo $params['id'];?>-img4" 
                                 rel="<?php echo $params['id'];?>" 
                                 data-id="<?php echo $params['id'];?>">
                                <img style="max-width:<?php echo $imgSize;?>;max-height:<?php echo $imgSize;?>;" src="<?php print $config['url_to_module'];?>img/unlimited-websites.png">
                            </div>
                        <?php endif;?>
                        <div class="caption">
                            <div>
                                <?php if($showTitle=='y'):?>
                                    <div class="edit" 
                                         data-field="<?php echo $params['id'];?>-title4" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">
                                        <h3>无限的网站</h3>
                                    </div>
                                <?php endif;?>
                                <?php if($showCaption=='y'):?>
                                    <div class="edit module-caContent-text" 
                                         data-field="<?php echo $params['id'];?>-text4" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">
                                        <p>SECPWEB 为您提供免费自由的网站空间，以及无限创意的网站模板。为您创造一个分享、快乐的生态社区。</p>
                                    </div>
                                <?php endif;?>
                            </div>
                            <?php if($showBtn=='y'):?>
                                <div class="group">
                                    <module class="module-caContent-btn" 
                                            data-type="caButton"
                                            id="<?php echo $params['id'];?>-btn4"
                                            data-text="了解更多"
                                            data-size="btn-sm"></module> 
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
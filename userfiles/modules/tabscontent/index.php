<?php 
$showImg = get_option('showImg', $params['id']); // y|NULL|false
$showImg = $showImg === false ? 'y' : $showImg;

$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showCaption = get_option('showCaption', $params['id']); // y|NULL|false
$showCaption = $showCaption === false ? 'y' : $showCaption;

$showBigTitle = get_option('showBigTitle', $params['id']); 
$showBigTitle = $showBigTitle === false ? 'y' : $showBigTitle;

$column = get_option('column', $params['id']); // 2|3|4|false
$column = $column ? $column : '3';

$imgSize = get_option('imgSize', $params['id']); // 100%|50%|false
$imgSize = $imgSize ? $imgSize : "50%";

$row_num = get_option('row_num', $params['id']); // 1|num
$row_num = $row_num ? $row_num : 1;

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   

$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/bg.jpg";

$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

$background =  'background:'. ($layoutBackgound == false ? '#fff' : $layoutBackgound).';opacity:'.($layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity  );

$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'color';

//是否启用遮罩层
$overlay = get_option('overlay', $params['id']); // y|NULL|false
$overlay = $overlay === false ? 'y' : $overlay;

//遮罩层颜色
$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#222222";

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
     mw.moduleCSS("<?php print $config['url_to_module']; ?>css/animate.css");
</script>
<style>
.module-caContent-btn{display:inline-block;}
.content-2.tabs .thumbnail.tabsContent_border{border: 1px solid #ddd;}
.content-2.tabs .thumbnail.tabsContent_border p{font-size: 14px;}
/*所有text字段添加module-caContent-text类名*/
.module-caContent-text{overflow:hidden;text-overflow:ellipsis;}
.content-2.tabs .container .row.row_num{margin:20px auto;}
.content-2.tabs{padding: 20px 0 0 0;}
.content-2.tabs .thumbnail p
@media (max-width: 480px){.content-2.tabs .thumbnail {padding-bottom: 0; }}
@media (max-width: 767px){.content-2.tabs .thumbnail {padding-bottom: 0;padding-top: 0; }}
</style>


<section class="module-caContent content-2 tabs col-<?php echo $column;?> <?php if($parallax=='y' && $bground=='image' && $overlay!='y'){echo 'mbr-parallax-background';}elseif($bground=='image'){echo 'mbr-background';}?>" 
         style="<?php if($bground=='image'):?>background-image:url(<?php print $bgImage;?>);<?php endif;?>
                <?php if($bground=='color'):?><?php echo $background;?>;<?php endif;?>">
    <?php if($overlay=='y' && $bground!='color'): ?>
        <div class="mbr-overlay" style="opacity:<?php echo $overlayOpacity;?>;background-color:<?php echo $overlayColor;?>;"></div>
    <?php endif; ?>
    <?php if($showBigTitle=='y'):?>
    <div class="container ">
        <div class="edit" style="text-align: center;margin-bottom: 30px;margin-top: 40px;"
        data-field="<?php echo $params['id'];?>-text-header" 
        rel="<?php echo $params['id'];?>" 
        data-id="<?php echo $params['id'];?>">
          <h2 style="font-size: 24px;font-weight: 100;margin-bottom: 12px;">OMO潜力无限的新模式</h2>
          <span >通过“互联网+的本质创新”商业模式叠加体验时代规划来加速国内相对制造业的效率、品质、创新、合作与营销能力的升级， 以信息流带动物质流，与“一带一路”整体战略相结合，扩展整体产业的国际影响力。</span>
         </div> 
    </div>
     <?php endif;?>
    <div class="container ">
    <?php for($i=0;$i<$row_num;$i++) {?>
        <div class="row row_num" id="row_num-<?php echo $params['id'].$i;?>">
            <div>
                <div class="thumbnail tabsContent_border">
                    <?php if($showImg=='y'):?>
                        <div class="edit thumbnail animated fadeInUp" 
                             data-field="<?php echo $params['id'].$i;?>-img1" 
                             rel="<?php echo $params['id'].$i;?>" 
                             data-id="<?php echo $params['id'].$i;?>">
                            <img data-field="<?php echo $params['id'].$i;?>-img1" 
                             
                            style="max-width:<?php echo $imgSize;?>;max-height:<?php echo $imgSize;?>;" src="<?php print $config['url_to_module']; ?>img/1.png">
                        </div>
                    <?php endif;?>
                    <div class="caption animated fadeInUp">
                        <div>
                            <?php if($showTitle=='y'):?>
                                <div class="edit" 
                                     data-field="<?php echo $params['id'].$i;?>-title1" 
                                     rel="<?php echo $params['id'].$i;?>" 
                                     data-id="<?php echo $params['id'].$i;?>">
                                    <h3 data-field="<?php echo $params['id'].$i;?>-title1" 
                                     rel="<?php echo $params['id'].$i;?>" 
                                     data-id="<?php echo $params['id'].$i;?>">交易中心</h3>
                                </div>
                            <?php endif;?>
                            <?php if($showCaption=='y'):?>
                                <div class="edit module-caContent-text" 
                                     data-field="<?php echo $params['id'].$i;?>-text1" 
                                     rel="<?php echo $params['id'].$i;?>" 
                                     data-id="<?php echo $params['id'].$i;?>">
                                    <p  data-field="<?php echo $params['id'].$i;?>-text1" 
                                     rel="<?php echo $params['id'].$i;?>" 
                                     data-id="<?php echo $params['id'].$i;?>">以12.5万平米电子元器件交易中心为核心，为进驻企业构建“商贸流通、商务服务、企业公馆”三大立体服务平台，是“品牌的世界、展会的总部、采购的基地”</p>
                                </div>
                            <?php endif;?>
                        </div>

                    </div>
                </div>
            </div>
             <?php if($column=='4'||$column=='3' || $column=='2'):?>
            <div>
                <div class="thumbnail tabsContent_border">
                    <?php if($showImg=='y'):?>
                        <div class="edit thumbnail animated fadeInUp" 
                             data-field="<?php echo $params['id'].$i;?>-img2" 
                             rel="<?php echo $params['id'].$i;?>" 
                             data-id="<?php echo $params['id'].$i;?>">
                            <img data-field="<?php echo $params['id'].$i;?>-img2" 
                             rel="<?php echo $params['id'].$i;?>" 
                             data-id="<?php echo $params['id'].$i;?>"
                            style="max-width:<?php echo $imgSize;?>;max-height:<?php echo $imgSize;?>;" src="<?php print $config['url_to_module'];?>img/2.png">
                        </div>
                    <?php endif;?>
                    <div class="caption animated fadeInUp">
                        <div>
                            <?php if($showTitle=='y'):?>
                                <div class="edit" 
                                     data-field="<?php echo $params['id'].$i;?>-title2" 
                                     rel="<?php echo $params['id'].$i;?>" 
                                     data-id="<?php echo $params['id'].$i;?>">
                                    <h3 data-field="<?php echo $params['id'].$i;?>-title2" 
                                     rel="<?php echo $params['id'].$i;?>" 
                                     data-id="<?php echo $params['id'].$i;?>">文化中心</h3>
                                </div>
                            <?php endif;?>
                            <?php if($showCaption=='y'):?>
                                <div class="edit module-caContent-text" 
                                     data-field="<?php echo $params['id'].$i;?>-text2" 
                                     rel="<?php echo $params['id'].$i;?>" 
                                     data-id="<?php echo $params['id'].$i;?>">
                                    <p data-field="<?php echo $params['id'].$i;?>-text2" 
                                     rel="<?php echo $params['id'].$i;?>" 
                                     data-id="<?php echo $params['id'].$i;?>">设有全球营销服务中心、6万平米中亚公共创业就业服务平台、大学生创业园，同时引进中影UL电影院线、美食街等一流生活配套。</p>
                                </div>
                            <?php endif;?>
                        </div>

                    </div>
                </div>
            </div>
            <?php endif;?>
            <?php if($column=='4'||$column=='3'):?>
                <div>
                    <div class="thumbnail tabsContent_border">
                        <?php if($showImg=='y'):?>
                            <div class="edit thumbnail animated fadeInUp" 
                                 data-field="<?php echo $params['id'].$i;?>-img3" 
                                 rel="<?php echo $params['id'].$i;?>" 
                                 data-id="<?php echo $params['id'].$i;?>">
                                <img data-field="<?php echo $params['id'].$i;?>-img3" 
                                 rel="<?php echo $params['id'].$i;?>" 
                                 data-id="<?php echo $params['id'].$i;?>"
                                style="max-width:<?php echo $imgSize;?>;max-height:<?php echo $imgSize;?>;" src="<?php print $config['url_to_module'];?>img/3.png">
                            </div>
                        <?php endif;?>
                        <div class="caption animated fadeInUp">
                            <div>
                                <?php if($showTitle=='y'):?>
                                    <div class="edit" 
                                         data-field="<?php echo $params['id'].$i;?>-title3" 
                                         rel="<?php echo $params['id'].$i;?>" 
                                         data-id="<?php echo $params['id'].$i;?>">
                                        <h3 data-field="<?php echo $params['id'].$i;?>-title3" 
                                         rel="<?php echo $params['id'].$i;?>" 
                                         data-id="<?php echo $params['id'].$i;?>">会展中心</h3>
                                    </div>
                                <?php endif;?>
                                <?php if($showCaption=='y'):?>
                                    <div class="edit module-caContent-text" 
                                         data-field="<?php echo $params['id'].$i;?>-text3" 
                                         rel="<?php echo $params['id'].$i;?>" 
                                         data-id="<?php echo $params['id'].$i;?>">
                                        <p data-field="<?php echo $params['id'].$i;?>-text3" 
                                         rel="<?php echo $params['id'].$i;?>" 
                                         data-id="<?php echo $params['id'].$i;?>">顶级会展场馆及运营团队，包含4大室内展馆，室内、外总展览面积近20万平米，可提供8000个国际标准展位和30000㎡露天展场和大舞台。</p>
                                    </div>
                                <?php endif;?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if($column=='4'):?>
                <div>
                    <div class="thumbnail tabsContent_border">
                        <?php if($showImg=='y'):?>
                            <div class="edit thumbnail animated fadeInUp" 
                                 data-field="<?php echo $params['id'].$i;?>-img4" 
                                 rel="<?php echo $params['id'].$i;?>" 
                                 data-id="<?php echo $params['id'].$i;?>">
                                <img data-field="<?php echo $params['id'].$i;?>-img4" 
                                 rel="<?php echo $params['id'].$i;?>" 
                                 data-id="<?php echo $params['id'].$i;?>"
                                style="max-width:<?php echo $imgSize;?>;max-height:<?php echo $imgSize;?>;" src="<?php print $config['url_to_module'];?>img/4.png">
                            </div>
                        <?php endif;?>
                        <div class="caption animated fadeInUp">
                            <div>
                                <?php if($showTitle=='y'):?>
                                    <div class="edit" 
                                         data-field="<?php echo $params['id'].$i;?>-title4" 
                                         rel="<?php echo $params['id'].$i;?>" 
                                         data-id="<?php echo $params['id'].$i;?>">
                                        <h3 data-field="<?php echo $params['id'].$i;?>-title4" 
                                         rel="<?php echo $params['id'].$i;?>" 
                                         data-id="<?php echo $params['id'].$i;?>">总部基地</h3>
                                    </div>
                                <?php endif;?>
                                <?php if($showCaption=='y'):?>
                                    <div class="edit module-caContent-text" 
                                         data-field="<?php echo $params['id'].$i;?>-text4" 
                                         rel="<?php echo $params['id'].$i;?>" 
                                         data-id="<?php echo $params['id'].$i;?>">
                                        <p data-field="<?php echo $params['id'].$i;?>-text4" 
                                         rel="<?php echo $params['id'].$i;?>" 
                                         data-id="<?php echo $params['id'].$i;?>">低密度建筑，广泛吸引现代服务产业上、下游企业进驻，实现产业的功能配套模块引进，形成规模与聚集效应。</p>
                                    </div>
                                <?php endif;?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif;?>
        </div>
    <?php } ?>
    </div>
</section>

<?php
/*

type: layout

name: testimonials

position: 12

*/
$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showAuthorName = get_option('showAuthorName', $params['id']); // y|NULL|false
$showAuthorName = $showAuthorName === false ? 'y' : $showAuthorName;

$showAuthorTitle = get_option('showAuthorTitle', $params['id']); // y|NULL|false

$column = get_option('column', $params['id']); // 2|3|6|false
$column = $column ? $column : '6';


//FGX20151127/////////////////////////////////////////////////
$anchor = get_option('anchor', $params['id']); // #...|NULL|false
$anchor = $anchor ? $anchor : "";
//FGX20151127/////////////////////////////////////////////////

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   
$background =  'background:'. $layoutBackgound.';opacity:'.$layoutBackgoundOpacity;

?>
<script>
    if (!window.ca_res || !window.ca_res.mobirise_css) {
        mw.moduleCSS("<?php print $config['url_to_module'];?>../../ca_res/mobirise/css/mobirise.css");
        if (!window.ca_res) window.ca_res = {
            mobirise_css: true
        };
        else window.ca_res.mobirise_css = true;
    };

</script>
<style>
    .module-caTestimonials-header,
    .module-caTestimonials-text,
    .module-caTestimonials-bio{font-family:"Roboto","Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;font-weight:normal;}
    .module-caTestimonials-name{font-family:"Roboto","Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;}
    .module-caTestimonials-text{font-style:italic;}
    /*FGX20151127*******************************************************/
    .module-caTestimonials-text .mbr-reviews__p{height:130px;overflow:hidden;text-overflow:ellipsis;}
    @media (max-width:1199px){
        .module-caTestimonials-text .mbr-reviews__p{height:180px;}
    }
    @media (max-width:992px){
        .module-caTestimonials-text .mbr-reviews__p{height:130px;}
    }
    @media (max-width:767px){
        .module-caTestimonials-text .mbr-reviews__p{height:auto;}
    }
    /*FGX20151127*******************************************************/
</style>
<!--FGX20151127-------------------------------------------------->
<?php if($anchor){echo "<div id='$anchor'></div>";}?>
<!--FGX20151127-------------------------------------------------->
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" 
         style="<?php echo $background;?>">

    <div>
        <div class="mbr-section__container mbr-section__container--std-padding container">
            <div class="row">
                <div class="col-sm-12">
                    <?php if($showTitle=='y'):?>
                        <div class="edit"
                             data-field="<?php echo $params['id'];?>-header" 
                             rel="<?php echo $params['id'];?>" 
                             data-id="<?php echo $params['id'];?>">
                            <h2 class="module-caTestimonials-header mbr-section__header">反馈</h2>
                        </div>
                    <?php endif;?>
                    <ul class="mbr-reviews mbr-reviews--wysiwyg row">
                        <li class="mbr-reviews__item col-sm-6 col-md-<?php if($column=='2'){echo '6';}else{echo '4';}?>">
                            <div class="edit module-caTestimonials-text mbr-reviews__text"
                                 data-field="<?php echo $params['id'];?>-text1" 
                                 rel="<?php echo $params['id'];?>" 
                                 data-id="<?php echo $params['id'];?>">
                                <p class="mbr-reviews__p">“它是非常神奇的应用，让我在3分钟内完成了 html 页面（我如果我从零开始通常至少需要1个多小时）。我希望有更多的文档和插件应用程序，再次感谢！”</p>
                            </div>
                            <div class="mbr-reviews__author mbr-reviews__author--short">
                                <?php if($showAuthorName=='y'):?>
                                    <div class="edit module-caTestimonials-name mbr-reviews__author-name"
                                         data-field="<?php echo $params['id'];?>-name1" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">水中的鱼</div>
                                <?php endif;?>
                                <?php if($showAuthorTitle=='y'):?>
                                    <div class="edit module-caTestimonials-bio mbr-reviews__author-bio"
                                         data-field="<?php echo $params['id'];?>-bio1" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">奋斗就会有美好的未来！</div>
                                <?php endif;?>
                            </div>
                        </li>
                        <li class="mbr-reviews__item col-sm-6 col-md-<?php if($column=='2'){echo '6';}else{echo '4';}?>">
                            <div class="edit module-caTestimonials-text mbr-reviews__text"
                                 data-field="<?php echo $params['id'];?>-text2" 
                                 rel="<?php echo $params['id'];?>" 
                                 data-id="<?php echo $params['id'];?>">
                                <p class="mbr-reviews__p">“本产品潜力巨大，这正是我一直在寻找的。我看过非常多的在线构建器，他们大多是每月订阅或者有点复杂和需要我花很长时间。而 SECPWEB 很容易使用也很有效率，非常棒！”</p>
                            </div>
                            <div class="mbr-reviews__author mbr-reviews__author--short">
                                <?php if($showAuthorName=='y'):?>
                                    <div class="edit module-caTestimonials-name mbr-reviews__author-name"
                                         data-field="<?php echo $params['id'];?>-name2" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">流浪的疾风</div>
                                <?php endif;?>
                                <?php if($showAuthorTitle=='y'):?>
                                    <div class="edit module-caTestimonials-bio mbr-reviews__author-bio"
                                         data-field="<?php echo $params['id'];?>-bio2" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">想要拥有从未拥有过的东西，就要去做你从未做过的事情。</div>
                                <?php endif;?>
                            </div>
                        </li>
                        <?php if($column=='3'||$column=='6'):?>
                            <li class="mbr-reviews__item col-sm-6 col-md-4">
                                <div class="edit module-caTestimonials-text mbr-reviews__text"
                                     data-field="<?php echo $params['id'];?>-text3" 
                                     rel="<?php echo $params['id'];?>" 
                                     data-id="<?php echo $params['id'];?>">
                                    <p class="mbr-reviews__p">“我已经远离web开发一段时间，看到这个我很惊讶，这真实一个美丽的的软件。我认为将会有大量的WEB开发人员会下岗，因为它真正移交权力给用户！我认为这是令人难以置信的。做得很好。”</p>
                                </div>
                                <div class="mbr-reviews__author mbr-reviews__author--short">
                                    <?php if($showAuthorName=='y'):?>
                                        <div class="edit module-caTestimonials-name mbr-reviews__author-name"
                                             data-field="<?php echo $params['id'];?>-name3" 
                                             rel="<?php echo $params['id'];?>" 
                                             data-id="<?php echo $params['id'];?>">灰太狼</div>
                                    <?php endif;?>
                                    <?php if($showAuthorTitle=='y'):?>
                                        <div class="edit module-caTestimonials-bio mbr-reviews__author-bio"
                                             data-field="<?php echo $params['id'];?>-bio3" 
                                             rel="<?php echo $params['id'];?>" 
                                             data-id="<?php echo $params['id'];?>">未来美不美取决于你现在拼不拼！</div>
                                    <?php endif;?>
                                </div>
                            </li>
                            <?php if($column=='6'):?>
                                <li class="mbr-reviews__item col-sm-6 col-md-4">
                                    <div class="edit module-caTestimonials-text mbr-reviews__text"
                                         data-field="<?php echo $params['id'];?>-text4" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">
                                        <p class="mbr-reviews__p">“它是非常神奇的应用，让我在3分钟内完成了 html 页面（我如果我从零开始通常至少需要1个多小时）。我希望有更多的文档和插件应用程序，再次感谢！！”</p>
                                    </div>
                                    <div class="mbr-reviews__author mbr-reviews__author--short">
                                        <?php if($showAuthorName=='y'):?>
                                            <div class="edit module-caTestimonials-name mbr-reviews__author-name"
                                                 data-field="<?php echo $params['id'];?>-name4" 
                                                 rel="<?php echo $params['id'];?>" 
                                                 data-id="<?php echo $params['id'];?>">水中的鱼儿</div>
                                        <?php endif;?>
                                        <?php if($showAuthorTitle=='y'):?>
                                            <div class="edit module-caTestimonials-bio mbr-reviews__author-bio"
                                                 data-field="<?php echo $params['id'];?>-bio4" 
                                                 rel="<?php echo $params['id'];?>" 
                                                 data-id="<?php echo $params['id'];?>">奋斗就会有美好的未来！！</div>
                                        <?php endif;?>
                                    </div>
                                </li>
                                <li class="mbr-reviews__item col-sm-6 col-md-4">
                                    <div class="edit module-caTestimonials-text mbr-reviews__text"
                                         data-field="<?php echo $params['id'];?>-text5" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">
                                        <p class="mbr-reviews__p">“本产品潜力巨大，这正是我一直在寻找的。我看过非常多的在线构建器，他们大多是每月订阅或者有点复杂和需要我花很长时间。而 SECPWEB 很容易使用也很有效率，非常棒！！”</p>
                                    </div>
                                    <div class="mbr-reviews__author mbr-reviews__author--short">
                                        <?php if($showAuthorName=='y'):?>
                                            <div class="edit module-caTestimonials-name mbr-reviews__author-name"
                                                 data-field="<?php echo $params['id'];?>-name5" 
                                                 rel="<?php echo $params['id'];?>" 
                                                 data-id="<?php echo $params['id'];?>">流浪の疾风</div>
                                        <?php endif;?>
                                        <?php if($showAuthorTitle=='y'):?>
                                            <div class="edit module-caTestimonials-bio mbr-reviews__author-bio"
                                                 data-field="<?php echo $params['id'];?>-bio5" 
                                                 rel="<?php echo $params['id'];?>" 
                                                 data-id="<?php echo $params['id'];?>">想要拥有从未拥有过的东西，就要去做你从未做过的事情！</div>
                                        <?php endif;?>
                                    </div>
                                </li>
                                <li class="mbr-reviews__item col-sm-6 col-md-4">
                                    <div class="edit module-caTestimonials-text mbr-reviews__text"
                                         data-field="<?php echo $params['id'];?>-text6" 
                                         rel="<?php echo $params['id'];?>" 
                                         data-id="<?php echo $params['id'];?>">
                                        <p class="mbr-reviews__p">“我已经远离web开发一段时间，看到这个我很惊讶，这真实一个美丽的的软件。我认为将会有大量的WEB开发人员会下岗，因为它真正移交权力给用户！我认为这是令人难以置信的。做得很好！”</p>
                                    </div>
                                    <div class="mbr-reviews__author mbr-reviews__author--short">
                                        <?php if($showAuthorName=='y'):?>
                                            <div class="edit module-caTestimonials-name mbr-reviews__author-name"
                                                 data-field="<?php echo $params['id'];?>-name6" 
                                                 rel="<?php echo $params['id'];?>" 
                                                 data-id="<?php echo $params['id'];?>">红太狼</div>
                                        <?php endif;?>
                                        <?php if($showAuthorTitle=='y'):?>
                                            <div class="edit module-caTestimonials-bio mbr-reviews__author-bio"
                                                 data-field="<?php echo $params['id'];?>-bio6" 
                                                 rel="<?php echo $params['id'];?>" 
                                                 data-id="<?php echo $params['id'];?>">未来美不美取决于你现在拼不拼。</div>
                                        <?php endif;?>
                                    </div>
                                </li>
                            <?php endif;?>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
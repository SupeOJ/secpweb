<?php
if (!function_exists('sliderbar_tree')) {
    include_once(__DIR__ . DS . 'functions.php');
}

$sliderbar = mw()->sliderbar_manager->get_sliderbar_items();
$slider = sliderbar_tree(0,$sliderbar);


?>
<style type="text/css">
    .clear{clear:both;}
    .boxx-img{float: left;display:block;}
    ul.boxx-img li{float: left;padding: 1px 1px 0 0;}
    ul.boxx-img li a{width:80px;height:80px;display:block;background: #2C2C2C;text-decoration: none;padding-top: 15px;}
    ul.boxx-img li a:hover{background: #404040;}
    .left-nav-sons-children a{text-decoration: none;}
    ul.boxx-img {margin-bottom: 20px;}
    ul.boxx-img li a span{display:block;text-align:center;color:#fff;font-size: 12px;padding:1px;}

    /*左侧边栏*/
    .left-nav{
        height: 100%;
        width: 70px;
        position: fixed;
        background: #464547;
        margin-left: -70px;
        padding-top: 60px;
        /* box-shadow: 1px 1px 5px #313131; */
        z-index: 999;
        top:0;
    }
    /*左侧边栏按钮*/
    .left-nav-button{
        position: fixed;
        top:0;
        cursor: pointer;
        width: 70px;
        height: 60px;
        /*background:url(<?php print $config['url_to_module']; ?>images/button.png);*/
        z-index: 999;
    }
    .left-nav-button .bar{
      height: 2px;
      width: 25px;
      display: block;
      margin: 6px auto;
      position: relative;
      background-color: #fff;        
    }
    /*左侧边栏隐藏class*/
    .left-nav-hidden{
        margin-left: 0px;
    }

    .left-nav-sons-children .text_h3{
        text-align: left;
        padding: 12px 20px;
        font-weight:500;
        color:#fff;
        font-size: 18px;
        margin:0 -20px;
        background: #666;
    }
    body.mw-live-edit .left-nav-sons-children,
    body.mw-live-edit .left-nav,
    body.mw-live-edit .left-nav-button{top:52px;}

</style>
<script type="text/javascript">
    mw.moduleCSS("<?php print $config['url_to_module']; ?>css/index.css");

</script>

<div id="mw-sliderbarMenu-module-<?php print $params['id']; ?>">
    <!--<头部>-->
    <div id="top" name="top">
        <!--左侧边栏-->
        <div class="left-nav " id="left-nav" >
        <?php if($slider == false) :?>
        <?php else :?>    
            <?php foreach($slider as $item): ?>
                <div class="left-nav-sons" >
                    <a href="<?php print $item['url'];?>" >
                        <img class="Nav-left-img" src="<?php print $item['icon'];?>" target="right">
                        <span class="Nav-left-span"><?php print $item['title'];?></span>
                    </a>
                    

                    <div class="left-nav-sons-children" style="display: none;">
                        <p class="clear text_h3" >
                          <?php print $item['title'];?>
                        </p>
                        <?php if (count($item['sons'])) :?><!--是否存在二级菜单-->
                        <?php $count=0;?>
                        <?php foreach($item['sons'] as $arr) :?>

                            <?php if($arr['is_text']==1) : ?><!--文本-->

                                <p class="clear Nav-left-P"><?php print $arr['title'];?></p>
                                <?php foreach($arr['sons'] as $newarr) :?>
                                    <?php if( $newarr['url']):?>
                                        <a href="<?php print $newarr['url'];?>" target="right"><p class="Nav-left-P1 "><?php print $newarr['title']; ?></p></a>
                                    <?php else: ?>
                                        <p class="Nav-left-P1 "><?php print $newarr['title']; ?></p>
                                    <?php endif;?>
                                <?php endforeach;?>

                            <?php else: ?><!--图文-->
                                <p class="clear Nav-left-P"><?php print $arr['title'];?></p>
                                <?php if (count($arr['sons'])) :?><!--是否存在三级菜单-->
                                    <ul class="boxx-img">
                                        <?php foreach($arr['sons'] as $newarr) :?>
                                            <li>
                                                <a href="<?php print $newarr['url'];?>" target="_Self">
                                                    <img src="<?php print $newarr['icon']; ?>" alt="" >
                                                    <span><?php if(!$newarr['only_icon']){print $newarr['title'];} ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endif;?>

                            <?php endif;?>
                            <?php $count++;?>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                    

                </div>
            <?php endforeach;?>
        <?php endif;?>
        </div>
 



        <!--左侧边栏按钮-->
        <div class="left-nav-button">
            <div style="margin:20px 0;">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


    $(function () {
        $('.left-nav-button').click(function () {
            if (!$('.left-nav').hasClass('left-nav-hidden')) {
                $('.left-nav').addClass('left-nav-hidden');
            } else {
                $('.left-nav').removeClass('left-nav-hidden');
            };
        })
    });


    $(function () {
        $(".left-nav-sons").mouseenter(function(){
            $(this).children('.left-nav-sons-children').css('display','block');
        }).mouseleave(function(){
            $(this).children('.left-nav-sons-children').css('display','none');
        });
    });






</script>
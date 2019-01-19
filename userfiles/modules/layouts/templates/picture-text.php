<?php

/*

type: layout

name: picture-text

position: 5

*/

?>
<?php
$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showText = get_option('showText', $params['id']); // y|NULL|false
$showText = $showText === false ? 'y' : $showText;

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   

$background =  'background:'. ($layoutBackgound == false ? '#fff' : $layoutBackgound).';opacity:'.($layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity  );
?>
<style>
.can-proder-center {
    text-align: center;
    font-family: "Segoe UI", SegoeUI, "Microsoft YaHei", 微软雅黑, "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 28px;
    color: rgb(50, 50, 50);
    padding-top: 40px;
    margin-bottom: 18px;
}
.etc-p {
    text-align: center;
    margin-top: 30px;
    font-family: "Segoe UI", SegoeUI, "Microsoft YaHei", 微软雅黑, "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: rgb(140, 140, 140);
}
.etc-ps {
    font-size: 14px;
    font-family: "Segoe UI", SegoeUI, "Microsoft YaHei", 微软雅黑, "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: rgb(140, 140, 140);
    text-align: center;
    margin-bottom: 15px;
}
p {margin: 0 0 6px;}
.etc-text{text-align: center; padding-bottom: 35px;}
</style>
<div class="edit" field="layout-skin-2-<?php print $params['id'] ?>" rel="layout" style='<?php echo $background;?>;'>
    <div class="head-image-layout-1" >
        <div class="mw-image-text">
         <?php if($showTitle=='y'):?> <p class="can-proder-center">经营管理一体化</p> <?php endif;?>
         <?php if($showText=='y'):?>
            <div class="etc-can-contant">
                <p class="etc-p">我们从企业经营管理和战略相融合，深入分析企业业务运作与管理特性</p>
                <p class="etc-ps">全面整理出信息化之经营管理模式，模式即可以独立应用也可以集成共存，让企业选择信息化更敏捷、更智慧、更幸福</p>
            </div>
        <?php endif;?>
            <div  class="etc-text">    
                <img class="mbr-figure__img" src="<?php print $config['url_to_module'];?>img/text.jpg">
            </div>
        </div>
    </div>
</div>
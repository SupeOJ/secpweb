<?php
/*

type: layout

name: iframe

position: 22

*/

$ifmUrl = get_option('ifmUrl', $params['id']); // http://...|false
$ifmUrl = $ifmUrl ? $ifmUrl : "";

$width = get_option('width', $params['id']);
$width = $width ? $width : "100";

$height = get_option('height', $params['id']);
$height = $height ? $height : "968";
?>
<script>
    if (!window.ca_res || !window.ca_res.mobirise_css) {
        mw.moduleCSS("<?php print $config['url_to_module']; ?>/css/mobirise.css");
        if (!window.ca_res) window.ca_res = {
            mobirise_css: true
        };
        else window.ca_res.mobirise_css = true;
    };
    if (!window.ca_res || !window.ca_res.mobirise_js) {
        mw.moduleJS("<?php print $config['url_to_module']; ?>/js/mobirise.js");
        if (!window.ca_res) window.ca_res = {
            mobirise_js: true
        };
        else window.ca_res.mobirise_js = true;
    };
</script>
<style>
    iframe{ <?php if(in_live_edit()){?>border-width: 2px;<?php }else{?>border-width: 0px;<?php }?>}
    .module-caHeader-btn{display:inline-block;margin-right:10px;}
    .module-caHeader-btn a.module-caButton{font-size:16px;padding-left:50px;padding-right:50px;}
    .module-caHeader-title,
    .module-caHeader-text,
    .module-caHeader-btn{font-family:"Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;}
</style>
<section id="<?php print $params['id'] ?>"  field="layout-iframe-<?php print $params['id'] ?>" rel="module">
   <iframe style="height:<?php echo $height;?>px;width: <?php echo $width;?>%;background-color:#00000094;position:relative;z-index:-1;" src='<?php echo $ifmUrl;?>'></iframe>      
</section>
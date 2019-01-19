<?php

/*

  type: layout
  content_type: static
  name: omo
  position: 11
  description: omo layout

*/



 mw_var('photon_layout', 'photon-default');

?>
<?php include THIS_TEMPLATE_DIR. "header.php"; ?>
<style>
body.mw-live-edit .cd-nav-trigger{
  top:52px;
}
body.mw-live-edit .cd-nav-container{
  top:51px;
}
body.mw-live-edit #cubeTransition div{
  top:-4px;
}
em{font-style:normal}
body{background: url(<?php print TEMPLATE_URL; ?>img/bg.jpg);background-size:100% 100%;}
</style>
<!-- 中间滚屏 -->

    <div class="page1"  style="font-size:50px;text-align: center;font-family: Noto Sans S Chinese; font-weight:lighter;">
      <iframe src="<?php print TEMPLATE_URL; ?>desktop/index2.html" style="height: 860px;width: 1200px;border: none;padding-top: 5%"></iframe>
    </div>



<!-- 中间滚屏 -->
        <!--<div class="credit">a simple demo for cubeTransition.js</div>-->



<?php include THIS_TEMPLATE_DIR. "footer.php"; ?>

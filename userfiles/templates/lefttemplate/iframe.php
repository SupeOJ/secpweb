<?php

/*

  type: layout
  content_type: static
  name: iframe
  position: 2
  description: iframe layout

*/

?>
<?php include TEMPLATE_DIR. "header.php"; ?>
<style>
.iframe-container{
  position: absolute;
  bottom: 0;
  top: 60px;
  right: 0;
  left: 0px;
 /* background: url(<?php echo template_url();?>img/loadding.gif) no-repeat fixed center;*/
}
body{overflow:hidden;} 
iframe{border: 0;}
body.mw-live-edit .iframe-container {padding-top: 52px;}
</style>

 <div class="iframe-container">
 	<iframe src="https://lookstack.casvip.com/ovirt-engine/sso/login.html" scrolling="auto" allowTransparency="true"  rameborder="0" name="right" width="100%" height="100%" 
 	></iframe>   
<!--   <iframe src="http://172.16.4.85/" scrolling="auto" allowTransparency="true"  rameborder="0" name="right" width="100%" height="100%" 
  ></iframe>  -->   
</div>
<?php include TEMPLATE_DIR. "footer.php"; ?>    
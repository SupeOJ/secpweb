<?php

/*
type: layout

name: product window

position: 16
*/


$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/content_img_bg.png";

$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'image';

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound = $layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity = $layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity; 

$background =  'background:'. ($layoutBackgound ?  $layoutBackgound : '#efffc9').';opacity:'.($layoutBackgoundOpacity ? $layoutBackgoundOpacity: 1);

?>
<style type="text/css">

.etc-p-w .etc-can-prodect-window{
	margin-bottom:0;
	}
.etc-thumbnail-window{
	background: rgba(78,77,77,0.3);
	border-radius: 0 !important;
	margin-bottom: 0 !important;
	border: none !important;
	padding: 0 !important;
	}
.etc-can-ps{
	text-align: center;
	/*margin-bottom: 70px;*/
	}
.etc-caption{
	padding: 0 !important;
	}
.etc-can-container{
	margin-bottom: 44px;
	}
.etc-can-proderct-titles{
	height: 208px;
	display: block;
	text-align: center;
	line-height: 208px;
	color: #FFFFFF;
	font-size: 20px;
	text-decoration: none !important;
	}


</style>

<!--桌面-->
<div class="edit etc-p-w"  field="layout-prodect-window-<?php print $params['id']?>" rel="layout">
	<div class="container-fluid etc-can-prodect-window" 
	style="<?php if($bground=='image'):?>background-image:url(<?php print $bgImage;?>);background-size:100% 100%;<?php endif;?>
             <?php if($bground=='color'):?><?php echo $background;?>;<?php endif;?>" >
 		<div class="container">
 			<!--<p class="can-proder-center">产品优势</p>-->
 		<div class="row">
	 		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail-window">
		          	<div class="caption etc-caption">
		                <a href="#" class="etc-can-proderct-titles">企业门户Portal</a>
		          	</div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail-window">
		          	<div class="caption etc-caption">
		                <a href="#" class="etc-can-proderct-titles">云桌面Cloud Desktop</a>
		          	</div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail-window">
		          	<div class="caption etc-caption">
		                <a href="#" class="etc-can-proderct-titles">中亚云Chinaasia Cloud</a>
		          	</div>
		        </div>
	      	</div>
 		
		</div>
 		</div>
 	</div>
 </div>
<!--桌面结束-->
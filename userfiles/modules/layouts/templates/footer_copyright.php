
<?php
/*

type: layout

name: footer copyright

position: 20

*/
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
<style>.footer_copyright{background: #262626;padding:1em 0;color:#fff;}</style>
<section>
	<div class="footer_copyright" >
		<div class="container">
			<div class="row">
				<div class="edit" data-field="<?php echo $params['id'];?>-footer__copyright" rel="<?php echo $params['id'];?>" data-id="<?php echo $params['id'];?>">
					<p class="mbr-footer__copyright">Copyright (c) 2008-<?php echo date('Y');?> 中亚网络技术开发有限公司 版权所有 粤ICP备11051082号-2</p>
				</div>
			</div>
		</div>
	</div>     
</section>
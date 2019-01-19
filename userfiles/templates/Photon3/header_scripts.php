<script>
    AddToCartModalContent = window.AddToCartModalContent || function(title, img){
        var html = ''
        + '<section>'
          + '<span class="mw-icon-shop" style="font-size:50px;"></span>'
          + '<h5>' + title + '</h5>'
          + '<p><?php _e("has been added to your cart"); ?></p></section>'
          + '<a href="javascript:;" onclick="addtocartmodal.remove();" class="mw-ui-btn"><?php _e("Continue shopping"); ?></a>'
          + '<a href="<?php print checkout_url(); ?>" class="mw-ui-btn mw-ui-btn-invert"><?php _e("Checkout"); ?></a>';
        return html;
    }
</script>
<script>
    mw.require("<?php print TEMPLATE_URL; ?>js/owl/owl.carousel.css");
    mw.require("<?php print TEMPLATE_URL; ?>js/owl/owl.carousel.min.js");
    mw.require("<?php print TEMPLATE_URL; ?>js/fotorama/fotorama.js");
    mw.require("<?php print TEMPLATE_URL; ?>js/fotorama/fotorama.css");
    mw.require("<?php print TEMPLATE_URL; ?>js/justified/justifiedGallery.js");
    mw.require("<?php print TEMPLATE_URL; ?>js/justified/justifiedGallery.min.css");

    mw.require("<?php print TEMPLATE_URL; ?>css/style.css");
    mw.require("<?php print TEMPLATE_URL; ?>css/style1.css");


    mw.lib.require('bootstrap3');
</script>

<script src="<?php print TEMPLATE_URL; ?>js/default.js"></script>
<link rel="stylesheet" href="<?php print TEMPLATE_URL; ?>style.css" type="text/css" />
<?php
    $colorscheme = get_option('colorscheme', 'mw-template-photon');
    if($colorscheme == false){
        $colorscheme = 'dark';
    }
?>
<link rel="stylesheet" type="text/css" href="<?php print TEMPLATE_URL; ?>colors/<?php print $colorscheme; ?>.css" id="colorScheme" />
<?php

/*

type: layout

name: Owl Portfolio

description: Owl Portfolio

*/

?>
<?php if (is_array($data)): ?>
    <?php $rand = uniqid(); ?>
    <script>
        $(document).ready(function(){
            $(".owlportfolio-item").height($(window).height());
            $(".portfolio-inner").height($(window).height());
            $("#mw-gallery-<?php print $rand; ?>").owlCarousel({
                items:1,
                nav:true,
                navText:['<span class="mw-icon-arrow-left-slim"></span>', '<span class="mw-icon-arrow-right-slim"></span>']
            });
        });
        $(window).bind('load resize', function(event){
            $(".owlportfolio-item").height($(window).height());
            $(".portfolio-inner").height($(window).height());
            if(event.type == 'load'){
                mw.$(".mw-images-template-owlportfolio-loading").removeClass("mw-images-template-owlportfolio-loading");
            }
        })
    </script>
    <div class="mw-images-template-owlportfolio mw-images-template-owlportfolio-loading" id="mw-gallery-<?php print $rand; ?>"
         style="position: relative;width: 100%;">
        <?php $count = -1; foreach ($data as $item): ?>
            <?php $count++; ?>
            <div class="owlportfolio-item">
                <img src="<?php print thumbnail($item['filename'], 800, 600); ?>" height="100%" />
                <?php if ($item['title'] != '') { ?>
                    <div class="owlportfolio-item-description"><?php print $item['title']; ?></div>
                <?php } ?>
            </div>
        <?php endforeach;  ?>
    </div>
<?php else : ?>
<?php endif; ?>
<?php

/*

type: layout

name: Fotorama

description: Fotorama

*/

?>
<?php if (is_array($data)): ?>
    <?php $rand = uniqid(); ?>


    <script>
        photoramaheight = function(){
          if(self !== top) return false;
           var _h = $(window).height();

           mw.$("#mw-gallery-<?php print $rand; ?>").dataset("height", _h - 50);
        }
        $(document).ready(function(){
            photoramaheight();
            $fotorama<?php print $rand; ?> =  $("#mw-gallery-<?php print $rand; ?>").fotorama();
        });
        $(window).bind('load resize', function(event){
            photoramaheight();
            if(event.type == 'resize' && self !== top){ return false;}
            if(event.type === 'load'){
                setTimeout(function(){
                  $fotorama<?php print $rand; ?>.fotorama();
                }, 222);
            }
            $fotorama<?php print $rand; ?> = $fotorama<?php print $rand; ?>.fotorama();
            if(mw.tools.hasClass(document.body, 'mw-live-edit')){
              mw.$('.fotorama__stage').css('maxHeight', $(window).height() - 120)
            }
        })
    </script>
    <div class="mw-images-template-fotorama fotorama mw-images-template-fotorama-loading" id="mw-gallery-<?php print $rand; ?>"
         style="position: relative;width: 100%;"
         data-nav="thumbs"
         data-keyboard="true"
         data-fit="scaledown"
         data-width="100%"
         data-allowfullscreen="native"
         data-transition="crossfade"
         data-height="100%">
        <?php $count = -1; foreach ($data as $item): ?>
            <?php $count++; ?>

                <a href="<?php print thumbnail($item['filename'], 1200, 800); ?>" <?php if ($item['title'] != '') { ?>data-caption="<?php print $item['title']; ?>"<?php } ?> ><img src="<?php print thumbnail($item['filename'], 800, 600); ?>" height="100%" /></a>

        <?php endforeach;  ?>
    </div>
<?php else : ?>
<?php endif; ?>
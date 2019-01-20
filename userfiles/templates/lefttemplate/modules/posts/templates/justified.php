<?php

/*

type: layout

name: Justified

description: Justified

*/
?>


<?php  $rand = uniqid(); ?>
 

<script>


 init<?php print $rand; ?> = function(){
      var gal<?php print $rand; ?> = mwd.getElementById('posts-<?php print $rand; ?>');
      $(gal<?php print $rand; ?>).justifiedGallery({
        rowHeight :300,
        lastRow : 'justify',
        margins : 7
      });
      mw.$(".caption", gal<?php print $rand; ?>).each(function(){
          if(this.innerHTML === ''){
            $(this).remove();
          }
      });
 }

 $(window).bind('load', function(){
    init<?php print $rand; ?>();
 });
 $(document).ready(function(){
    init<?php print $rand; ?>();
 });
</script>
<div class="clearfix module-posts-template-justified module-posts-template-justifiedfull" id="posts-<?php print $rand; ?>">

    <?php if (!empty($data)): ?>

    <?php
        $count = -1;
        foreach ($data as $item):
        $count++;

        $has_title = (!isset($show_fields) or $show_fields == false or in_array('title', $show_fields));
        $has_created_on = (!isset($show_fields) or $show_fields == false or in_array('created_on', $show_fields));
        $has_description = (!isset($show_fields) or $show_fields == false or in_array('description', $show_fields));
        $has_read_more = (!isset($show_fields) or $show_fields == false or in_array('read_more', $show_fields));





    ?>



            <a class="bgimg" href="<?php print $item['link'] ?>">
                <img src="<?php print thumbnail($item['image'], 600, 600); ?>" alt="" />
                <?php if($has_title or $has_created_on or $has_description or $has_read_more): ?>
                <div class="caption justified-item-container">
                  <?php if($has_title): ?>
                    <h3><?php print $item['title'] ?></h3>
                  <?php endif; ?>
                  <?php if($has_created_on): ?>
                    <small class="muted"><?php _e("Posted on"); ?>: <?php print $item['created_on']; ?></small>
                  <?php endif; ?>
                  <?php if($has_description): ?>
                    <span class="description"><?php print $item['description'] ?></span>
                  <?php endif; ?>
                  <?php if($has_read_more): ?>
                    <div class="blog-post-footer">
                      <span class="mw-ui-link">
                      <?php $read_more_text ? print $read_more_text : print _e('Continue Reading', true); ?>
                      </span>
                    </div>
                  <?php endif; ?>
                </div>
                <?php endif; ?>
            </a>








    <?php endforeach; ?>



    <?php endif; ?>


</div>
<?php if (isset($pages_count) and $pages_count > 1 and isset($paging_param)): ?>
    <?php print paging("num={$pages_count}&paging_param={$paging_param}&current_page={$current_page}") ?>
<?php endif; ?>
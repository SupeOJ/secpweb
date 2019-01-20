<?php

/*

type: layout

name: Photon

description: Photon

*/
?>


<?php  $rand = uniqid(); ?>
<div class="clearfix module-posts-template-photon" id="posts-<?php print $rand; ?>">

    <?php if (!empty($data)): ?>


    <?php
        $count = -1;
        foreach ($data as $item):
        $count++;
    ?>

    <div class="mw-ui-row photon-posts-item">
        <?php if(!isset($show_fields) or $show_fields == false or in_array('thumbnail', $show_fields)): ?>
            <div class="mw-ui-col" style="width: 60%">
              <div class="mw-ui-col-container">
                  <a class="bgimg" href="<?php print $item['link'] ?>" style="background-image: url(<?php print thumbnail($item['image'], 650, 650); ?>);">

                  </a>
              </div>
            </div>
        <?php endif; ?>
        <div class="mw-ui-col"><div class="mw-ui-col-container"><div class="photon-post-item-container">
          <div class="module-posts-head">
          <?php if(!isset($show_fields) or $show_fields == false or in_array('title', $show_fields)): ?>
              <h3><a class="lead" href="<?php print $item['link'] ?>"><?php print $item['title'] ?></a></h3>
          <?php endif; ?>
          <?php if(!isset($show_fields) or $show_fields == false or in_array('created_on', $show_fields)): ?>
              <small class="muted"><?php _e("Posted on"); ?>: <?php print $item['created_on']; ?><br></small>
          <?php endif; ?>
          </div>
          <?php if(!isset($show_fields) or $show_fields == false or in_array('description', $show_fields)): ?>
              <p class="description"><?php print $item['description'] ?></p>
          <?php endif; ?>


        <?php if(!isset($show_fields) or $show_fields == false or in_array('read_more', $show_fields)): ?>
        <div class="blog-post-footer">
          <a href="<?php print $item['link'] ?>" class="mw-ui-btn">
          <?php $read_more_text ? print $read_more_text : print _e('Continue Reading', true); ?>
          </a>
        </div>
        <?php endif; ?>
      </div></div></div>
    </div>
    <?php endforeach; ?>



    <?php endif; ?>


</div>
<?php if (isset($pages_count) and $pages_count > 1 and isset($paging_param)): ?>
    <?php print paging("num={$pages_count}&paging_param={$paging_param}&current_page={$current_page}") ?>
<?php endif; ?>
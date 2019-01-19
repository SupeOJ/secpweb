<?php

/*

type: layout

name: Default

description: Default - 3 Columns

*/
?>
<?php


$tn = $tn_size;
$tn = array(600,600);





?>
<script>

    mw.moduleCSS("<?php print $config['url_to_module']; ?>css/style.css");

    mw.exceptlink = mw.exceptlink || function(url, except, event){
        if(!mw.tools.hasClass(event.target.className, except) && !mw.tools.hasParentsWithClass(event.target, except)){
          window.location.href = url;
        }
    }

</script>
<?php if (!empty($data)): ?>
<?php


    $count = 0;
    $len =  count($data);

    $helpclass = '';

    if($len%3 !=0 ){
        if((($len-1)%3)==0 or $len==1){
             $helpclass = 'last-row-single';
        }
        elseif((($len-2)%3)== 0  or $len==2){
            $helpclass = 'last-row-twoitems';
        }
    } ?>

<div class="module-products-template-columns-3 <?php print $helpclass; ?>">
  <?php
    foreach ($data as $item):

    $count++;
    ?>

    <div class="module-products-template-columns-3-item">
      <div class="mw-ui-col-container" itemscope itemtype="<?php print $schema_org_item_type_tag ?>">
      <div class="product-main-holder">
        <?php if($show_fields == false or in_array('thumbnail', $show_fields)): ?>
        <a class="module-products-template-columns-productimage" style="background-image: url(<?php print thumbnail($item['image'], $tn[0], $tn[1]); ?>);" href="<?php print $item['link'] ?>">
            <?php if($show_fields == false or in_array('title', $show_fields)): ?>
            <strong><?php print $item['title'] ?></strong>
          <?php endif; ?>
        </a>
        <?php endif; ?>
        <div class="module-products-template-columns-data" onclick="mw.exceptlink('<?php print $item['link']; ?>','default-add-to-cart-btn', event);">
        <?php if($show_fields == false or in_array('title', $show_fields)): ?>
        <h3 itemprop="name"><a  class="lead" href="<?php print $item['link'] ?>"><?php print $item['title'] ?></a></h3>
        <?php endif; ?>
        <?php if($show_fields != false and in_array('created_on', $show_fields)): ?>
        <span class="date" itemprop="dateCreated"><?php print $item['created_on'] ?></span>
        <?php endif; ?>
        <?php if($show_fields == false or ($show_fields != false and  is_array($show_fields) and  in_array('description', $show_fields))): ?>
        <p class="description" itemprop="description"><a href="<?php print $item['link']; ?>"><?php print $item['description']; ?></a></p>
        <?php endif; ?>
        <?php if($show_fields != false and ($show_fields != false and  in_array('read_more', $show_fields))): ?>
        <a href="<?php print $item['link'] ?>" itemprop="url" class="mw-more">
        <?php $read_more_text ? print $read_more_text : print _e('Read More', true); ?>
        </a>
        <?php endif; ?>
        <div class="product-price-holder module-products-template-columns-data-footer clearfix">

          <?php if($show_fields == false or in_array('price', $show_fields)): ?>
            <?php if(isset($item['prices']) and is_array($item['prices'])){  ?>
          <?php 
                $vals2 = array_values($item['prices']);
                $val1 = array_shift($vals2); ?>
          <span class="price"><?php print currency_format($val1); ?></span>
          <?php } else{ ?>
          <?php } ?>
          <?php endif; ?>
          <?php if($show_fields == false or in_array('add_to_cart', $show_fields)): ?>
          <?php
              $add_cart_text = get_option('data-add-to-cart-text', $params['id']);
			  if( $add_cart_text == false or $add_cart_text == "Add to cart"){
			    $add_cart_text =  _e("Add to cart", true);
			  }
         ?>
          <?php if(is_array( $item['prices'])): ?>
            <span class="default-add-to-cart-btn"  onclick="mw.cart.add('.mw-add-to-cart-<?php print $item['id'].$count ?>');"><span class="mw-icon-shop"></span><?php print $add_cart_text ?></span>
          <?php endif; ?>
          <?php endif; ?>
        </div>
        <?php if(is_array( $item['prices']) ): ?>
        <?php foreach( $item['prices']  as $k  => $v): ?>
        <div class="clear products-list-proceholder mw-add-to-cart-<?php print $item['id'].$count ?>">
          <input type="hidden"  name="price" value="<?php print $v ?>" />
          <input type="hidden"  name="content_id" value="<?php print $item['id'] ?>" />
        </div>
        <?php break; endforeach ; ?>
        <?php  endif; ?>
      </div>
      </div>
      </div>
    </div>

  <?php  endforeach; ?>
</div>
<?php endif; ?>
<?php if (isset($pages_count) and $pages_count > 1 and isset($paging_param)): ?>
<?php print paging("num={$pages_count}&paging_param={$paging_param}&current_page={$current_page}&limit=7"); ?>
<?php endif; ?>

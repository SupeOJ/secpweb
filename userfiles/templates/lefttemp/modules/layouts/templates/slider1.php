<?php
/*

type: layout

name: silder 1

position: 1
*/





$settings = get_option('settings', $params['id']);
$defaults = '{"0":{"url":"","images":"{SITE_URL}userfiles/media/uploaded/banner.png"},
"1":{"url":"","images":"{SITE_URL}userfiles/media/uploaded/banner_2.png"},
"2":{"url":"","images":"{SITE_URL}userfiles/media/uploaded/banner_3.png"}}';
$settings = $settings ? $settings : $defaults;
$json = json_decode($settings, true);

//$aa = json_decode($default, true);
//var_dump($aa);exit;
?>
<style>


.etc-carousel-caption {
    position: absolute;
    top: 35%;
    left: 30%;
    z-index: 15;
    width: 60%;
    padding-left: 0;
    margin-left: -30%;
    text-align: center;
    list-style: none;
    color: #fff;
  }
  .etc-carousel-caption p{font-size: 20px;}
  .etc-carousel .carousel-indicators .active{
    height: 2px;
    background-color:#fff;
  }
  .etc-carousel .carousel-indicators li{
    width: 32px;
    height: 2px;
    border: 0px;
    background-color:#999;
    margin:0 10px;
  }
</style>
<!--banner图-->
<section id="<?php print $params['id'] ?>"  field="layout-slider-<?php print $params['id'] ?>" rel="module">
    <div id="carousel-example-generic-<?php print $params['id'] ?>" class="carousel slide etc-carousel" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
  
      <?php foreach ($json as $key => $value): ?>
        <li data-target="#carousel-example-generic-<?php print $params['id'] ?>" data-slide-to="<?php echo $key;?>" <?php if($key==0):?> class="active" <?php endif;?> ></li>
      <?php endforeach; ?>
        
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <?php foreach ($json as $key => $value): ?> 
        <div class="item  <?php if($key==0):?> active <?php endif;?>">
          <?php if($value['url']): ?> <a href="<?php echo $value['url'];?>" target="_blank">  <?php endif;?>
            <img src="<?php echo $value['images'] ? $value['images']: $config['url_to_module'].'img/hbanner.png';?>" alt="...">
          <?php if($value['url']): ?> </a> <?php endif;?>

          <div class="carousel-caption">
          </div>
        </div>
        <?php endforeach; ?>


    
      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic-<?php print $params['id'] ?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic-<?php print $params['id'] ?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

</section>    
<!--banner图结束-->
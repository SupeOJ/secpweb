<?php 
/*

type: layout

name: pro price

position: 11
*/

$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showBigTitle = get_option('showBigTitle', $params['id']); 
$showBigTitle = $showBigTitle === false ? 'y' : $showBigTitle;

//小标志是否显示
$showSign1 = get_option('showSign1', $params['id']); 
$showSign1 = $showSign1 === false ? 'y' : $showSign1;
$showSign2 = get_option('showSign2', $params['id']); 
$showSign2 = $showSign2 === false ? 'y' : $showSign2;
$showSign3 = get_option('showSign3', $params['id']); 
$showSign3 = $showSign3 === false ? 'y' : $showSign3;
$showSign4 = get_option('showSign4', $params['id']); 
$showSign4 = $showSign4 === false ? 'y' : $showSign4;

//小标志颜色显示
$signColor = get_option('signColor', $params['id']); 
$signColor = $signColor ?  $signColor : "#28262b";

//列数显示
$column = get_option('column', $params['id']); // 1|2|3|4|false
$column = $column ? $column : '4';

//背景颜色
$bgColor = get_option('bgColor', $params['id']); // color|false
$bgColor = $bgColor ? $bgColor : "rgb(48, 48, 48)";

//上显示框的颜色设置
$pricebgColor = get_option('pricebgColor', $params['id']); // color|false
$pricebgColor = $pricebgColor ? $pricebgColor : "#c0a375";

//下显示框的颜色设置
$pribgColor = get_option('pribgColor', $params['id']); // color|false
$pribgColor = $pribgColor ? $pribgColor : "#4c4c4c";

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound = $layoutBackgound == false ? 'rgb(48, 48, 48)' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity = $layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity; 

$background =  'background:'. ($layoutBackgound ?  $layoutBackgound : 'rgb(48, 48, 48)').';opacity:'.($layoutBackgoundOpacity ? $layoutBackgoundOpacity: 1);
//按钮颜色
$butColor = get_option('butColor', $params['id']); // color|false
$butColor = $butColor ? $butColor : "none";

if($signColor == 1){$signColor = "#4c4c4c";}
elseif($signColor == 2){$signColor = "#88ada6";}
elseif($signColor == 3){$signColor = "#896c39";}
elseif($signColor == 4){$signColor = "#a88462";}
elseif($signColor == 5){$signColor = "#312520";}
elseif($signColor == 6){$signColor = "#424c50";}
elseif($signColor == 7){$signColor = "#758a99";}
elseif($signColor == 8){$signColor = "#425066";}
elseif($signColor == 9){$signColor = "#065279";}
elseif($signColor == 10){$signColor = "#d3b17d";}
elseif($signColor == 11){$signColor = "rgb(48, 48, 48)";}
elseif($signColor == 12){$signColor = "#000";}
elseif($signColor == 13){$signColor = "#28262b";}

if($pricebgColor == 1){$pricebgColor = "#4c4c4c";}
elseif($pricebgColor == 2){$pricebgColor = "#88ada6  !important";}
elseif($pricebgColor == 3){$pricebgColor = "#896c39  !important";}
elseif($pricebgColor == 4){$pricebgColor = "#a88462  !important";}
elseif($pricebgColor == 5){$pricebgColor = "#312520  !important";}
elseif($pricebgColor == 6){$pricebgColor = "#424c50  !important";}
elseif($pricebgColor == 7){$pricebgColor = "#758a99  !important";}
elseif($pricebgColor == 8){$pricebgColor = "#425066  !important";}
elseif($pricebgColor == 9){$pricebgColor = "#065279  !important";}
elseif($pricebgColor == 10){$pricebgColor = "#d3b17d  !important";}
elseif($pricebgColor == 11){$pricebgColor = "rgb(48, 48, 48)  !important";}

if($pribgColor == 1){$pribgColor = "#4c4c4c";}
elseif($pribgColor == 2){$pribgColor = "#88ada6";}
elseif($pribgColor == 3){$pribgColor = "#896c39";}
elseif($pribgColor == 4){$pribgColor = "#a88462";}
elseif($pribgColor == 5){$pribgColor = "#312520";}
elseif($pribgColor == 6){$pribgColor = "#424c50";}
elseif($pribgColor == 7){$pribgColor = "#758a99";}
elseif($pribgColor == 8){$pribgColor = "#425066";}
elseif($pribgColor == 9){$pribgColor = "#065279";}
elseif($pribgColor == 10){$pribgColor = "#d3b17d";}
elseif($pribgColor == 11){$pribgColor = "rgb(48, 48, 48)";}

?>
<style>
.mbr-plan-btn .btn-white-outline{
  background-color:<?php if($butColor=='1'):?>rgba(255, 255, 255, 0.1);<?php endif;?>
                   <?php if($butColor=='2'):?>#88ada6;<?php endif;?>
                   <?php if($butColor=='3'):?>#896c39;<?php endif;?>
                   <?php if($butColor=='4'):?>#a88462;<?php endif;?>
                   <?php if($butColor=='5'):?>#312520;<?php endif;?>
                   <?php if($butColor=='6'):?>#424c50;<?php endif;?>
                   <?php if($butColor=='7'):?>#758a99;<?php endif;?>
                   <?php if($butColor=='8'):?>#425066;<?php endif;?>
                   <?php if($butColor=='9'):?>#065279;<?php endif;?>
                   <?php if($butColor=='10'):?>#d3b17d;<?php endif;?>
                   <?php if($butColor=='11'):?>rgb(48, 48, 48);<?php endif;?>
                   <?php if($butColor=='12'):?>#000;<?php endif;?>
                   <?php if($butColor=='13'):?>#28262b;<?php endif;?>}

</style>
<script>
 mw.moduleCSS("<?php print $config['url_to_module']; ?>css/bootstrap.min.css");
 mw.moduleCSS("<?php print $config['url_to_module']; ?>css/product-price.css"); 
mw.moduleCSS("<?php print $config['url_to_module']; ?>../../ca_res/mobirise/css/mobirise.css");

</script> 
<style type="text/css">
.pricing-table1-0 .content-2 {padding-top: 0;}
.pricing-table1-0 .content-2 .row > div {
      padding:0px <?php if($column=='3'){echo '45px';}elseif($column=='2'){echo '100px';}elseif($column=='4'){echo '15px';}?>;
}

</style>
<section class="mbr-section pricing-table1-0" style="padding-top: 70px; padding-bottom: 120px;<?php echo $background;?>;">
  
        <div class="container "> 
          <div class="edit tit" style="text-align: center;margin-bottom: 30px;margin-top: 40px;"
            data-field="<?php echo $params['id'];?>-text-header" 
            rel="<?php echo $params['id'];?>" 
            data-id="<?php echo $params['id'];?>">
            <?php if($showBigTitle=='y'):?>
              <h2 style="">价格表</h2>
            <?php endif;?>
            <?php if($showTitle=='y'):?>
            <span >具有四列和纯色背景的定价表。</span>
            <?php endif;?>
          </div> 
        </div> 

    <div class="mbr-section mbr-section-nopadding mbr-price-table content-2 col-<?php echo $column;?>">
      <div class="row edit"  field="layout-tradesys-<?php print $params['id'] ?>" rel="layout">
       <div>
        <?php if($column=='4'||$column=='3' || $column=='2'):?>
            <div class="col1 pla" >
                <div class="mbr-plan card text-xs-center">
                    <div class="mbr-plan-header card-block" style="background-color:<?php echo $pricebgColor;?>;">
                      <?php if($showSign1=='y'):?>
                        <div class="mbr-plan-label" style="background-color:<?php echo $signColor;?>;">热销!</div>
                      <?php endif;?>
                      <div class="card-title">
                        <h3 class="mbr-plan-title">标准</h3>
                        <small class="mbr-plan-subtitle">描述</small>
                      </div>
                      <div class="card-text">
                          <div class="mbr-price">
                            <span class="mbr-price-value">$</span>
                            <span class="mbr-price-figure">0</span><small class="mbr-price-term">mo.</small>
                          </div>
                          <small class="mbr-plan-price-desc">Secpweb 是完美的非技术人员谁不熟悉Web开发。</small>
                      </div>
                    </div>
                    <div class="mbr-plan-body card-block"  style="background-color:<?php echo $pribgColor;?>;">
                      <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">32 GB 存储</li><li class="list-group-item">无限的用户</li><li class="list-group-item">15 GB 宽带</li></ul></div>
                      <div class="mbr-plan-btn"><a href="https://mobirise.com" class="btn btn-white btn-white-outline">演示</a></div>
                    </div>
                </div>
            </div>
        <?php endif;?>
       </div>

       <div>
       <?php if($column=='4'||$column=='3' || $column=='2'):?>
            <div class="col2 pla">
                <div class="mbr-plan card text-xs-center">
                    <div class="mbr-plan-header card-block bg-primary" style="background-color:<?php echo $pricebgColor;?>;">
                      <?php if($showSign2=='y'):?>
                        <div class="mbr-plan-label"  style="background-color:<?php echo $signColor;?>;">热销!</div>
                      <?php endif;?>
                      <div class="card-title">
                        <h3 class="mbr-plan-title">业务</h3>
                        <small class="mbr-plan-subtitle">描述</small>
                      </div>
                      <div class="card-text">
                          <div class="mbr-price">
                            <span class="mbr-price-value">$</span>
                            <span class="mbr-price-figure">0</span><small class="mbr-price-term">mo.</small>
                          </div>
                          <small class="mbr-plan-price-desc">Secpweb 是完美的非技术人员谁不熟悉Web开发。</small>
                      </div>
                    </div>
                    <div class="mbr-plan-body card-block"   style="background-color:<?php echo $pribgColor;?>;">
                      <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">32 GB 存储</li><li class="list-group-item">无限的用户</li><li class="list-group-item">15 GB 宽带</li></ul></div>
                      <div class="mbr-plan-btn"><a href="https://mobirise.com" class="btn btn-white btn-white-outline">演示</a></div>
                    </div>
                </div>
            </div>
      <?php endif;?>
    </div>

    <div>
       <?php if($column=='4'||$column=='3'):?>
            <div class="col3 pla">
                <div class="mbr-plan card text-xs-center">
                    <div class="mbr-plan-header card-block" style="background-color:<?php echo $pricebgColor;?>;">
                      <?php if($showSign3=='y'):?>
                        <div class="mbr-plan-label"  style="background-color:<?php echo $signColor;?>;">热销!</div>
                      <?php endif;?>
                      <div class="card-title">
                        <h3 class="mbr-plan-title">溢价</h3>
                        <small class="mbr-plan-subtitle">描述</small>
                      </div>
                      <div class="card-text">
                          <div class="mbr-price">
                            <span class="mbr-price-value">$</span>
                            <span class="mbr-price-figure">0</span><small class="mbr-price-term">mo.</small>
                          </div>
                          <small class="mbr-plan-price-desc">Secpweb 是完美的非技术人员谁不熟悉Web开发。</small>
                      </div>
                    </div>
                    <div class="mbr-plan-body card-block"   style="background-color:<?php echo $pribgColor;?>;">
                      <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">32 GB 存储</li><li class="list-group-item">无限的用户</li><li class="list-group-item">15 GB 宽带</li></ul></div>
                      <div class="mbr-plan-btn"><a href="https://mobirise.com" class="btn btn-white btn-white-outline">演示</a></div>
                    </div>
                </div>
            </div>
       <?php endif;?>
     </div>

     <div>
       <?php if($column=='4'):?>
            <div class="col4 pla">
                <div class="mbr-plan card text-xs-center">
                    <div class="mbr-plan-header card-block" style="background-color:<?php echo $pricebgColor;?>;">
                      <?php if($showSign4=='y'):?>
                        <div class="mbr-plan-label"  style="background-color:<?php echo $signColor;?>;">热销!</div>
                      <?php endif;?>
                      <div class="card-title">
                        <h3 class="mbr-plan-title">极限</h3>
                        <small class="mbr-plan-subtitle">描述</small>
                      </div>
                      <div class="card-text">
                          <div class="mbr-price">
                            <span class="mbr-price-value">$</span>
                            <span class="mbr-price-figure">0</span><small class="mbr-price-term">mo.</small>
                          </div>
                          <small class="mbr-plan-price-desc">Secpweb 是完美的非技术人员谁不熟悉Web开发。</small>
                      </div>
                    </div>
                    <div class="mbr-plan-body card-block"   style="background-color:<?php echo $pribgColor;?>;">
                      <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">32 GB 存储</li><li class="list-group-item">无限的用户</li><li class="list-group-item">15 GB 宽带</li></ul></div>
                      <div class="mbr-plan-btn"><a href="https://mobirise.com" class="btn btn-white btn-white-outline">演示</a></div>
                    </div>
                </div>
            </div>
      <?php endif;?>
     </div>
    </div>

   </div>

</section>

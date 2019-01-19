<?php

/*

type: layout

name: footer-2

position: 19

*/

?>

<?php
$showName = get_option('showName', $params['id']); // y|NULL|false

$showPhone = get_option('showPhone', $params['id']); // y|NULL|false

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;  
$background =  'background:'. ($layoutBackgound == false ? '#31313b' : $layoutBackgound).';opacity:'.($layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity  );

?>

<script>
  mw.moduleCSS("<?php print $config['url_to_module']; ?>css/index.css");
</script>
<footer style='<?php echo $background;?>;color:#fff;'>
    <div class="container">
        <div class="row edit" field="layout-footer-2-<?php print $params['id']?>" rel="layout">
            <div class="row footer-top">
          <div class="row about etc-can-about">
            <div class="col-sm-4">
              <h4 class="can-index-h4">| 联系我们</h4>
              <ul class="list-unstyled etc-can-ul">
                <li>地址：深圳市沙井中亚硅谷海岸营销中心</li>
                <li>邮箱：etccbw@aliyun.com</li>
                <li>电话：0755-22220000</li>
                <li>网址：http://www.chinaasianet.com</li>
              </ul>
            </div>
            <div class="col-sm-4">
              <h4 class="can-index-h4">| 友情链接</h4>
              <ul class="list-unstyled etc-can-ul">
                <li><a href="http://www.zhongyajituan.com.cn" target="_Blank">中亚集团</a></li>
                <li><a href="http://www.casvm.com" target="_Blank">中亚交易网</a></li>
                <li><a href="http://www.chinaasiaetc.com/Activity/Expo" target="_Blank">中亚会展中心</a></li>
                <li><a href="http://www.chinaasiaetc.com" target="_Blank">中亚硅谷海岸</a></li>
              </ul>
            </div>
            <div class="col-sm-4">
              <h4 class="can-index-h4">| 关注我们</h4>
              <ul class="list-unstyled">
                <li><img class="etc-can-imgs" src="<?php print $config['url_to_module'];?>img/qrcode.png"></li>
              </ul>
            </div>
          </div>
  
       </div>
<!-- 

            <div class="col-xs-12 col-lg-4 allow-drop">
                <h3 class="footer__title">| 联系我们</h3>
                <ul class="footer__list">
                <li class="footer__list_item">地址：深圳市沙井中亚硅谷海岸营销中心</li>
                <li class="footer__list_item">邮箱：etccbw@aliyun.com</li>
                <li class="footer__list_item">电话：0755-22220000</li>
                <li class="footer__list_item">网址：http://www.chinaasianet.com</li>
                </ul>
            </div>
            <div class="col-xs-12 col-lg-4 allow-drop">
                <h3 class="footer__title">| 友情链接</h3>
                <ul class="footer__list">
                    <li class="footer__list_item"><a  style="color:#fff;" target="_blank" href="http://www.zhongyajituan.cn/">中亚集团</a></li>
                    <li class="footer__list_item"><a  style="color:#fff;" target="_blank" href="http://www.casvm.com/">中亚交易网</a></li>
                    <li class="footer__list_item"><a  style="color:#fff;" target="_blank" href="http://www.chinaasiaetc.com/Activity/Expo/">中亚会展中心</a></li>
                    <li class="footer__list_item"><a  style="color:#fff;" target="_blank" href="http://www.chinaasiaetc.com/">中亚硅谷海岸</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-lg-4 allow-drop">
                <h3 class="footer__title">| 关注我们</h3>
                                <img class="mbr-figure__img" src="">
               <!--  <ul class="footer__list">
                    <li><img class="etc-can-imgs" src="<?php echo $config['url_to_module'] . "img/qrcode.png";?>"></li>
                </ul> 
            </div> -->
        </div>
    </div>
</footer>

<?php

/*

  type: layout
  content_type: static
  name: Home
  position: 11
  description: Home layout

*/



 mw_var('photon_layout', 'photon-default');

?>
<?php include THIS_TEMPLATE_DIR. "header.php"; ?>
<style>
body.mw-live-edit .cd-nav-trigger{
  top:52px;
}
body.mw-live-edit .cd-nav-container{
  top:51px;
}
body.mw-live-edit #cubeTransition div{
  top:-4px;
}
em{font-style:normal}
</style>
<!-- 中间滚屏 -->
   <div id="cubeTransition">
    <div class="page1"  style="font-size:50px;text-align: center;font-family: Noto Sans S Chinese; font-weight:lighter;background: url(<?php print TEMPLATE_URL; ?>img/bg.jpg);background-size:100% 100%;">
      <iframe src="<?php print TEMPLATE_URL; ?>desktop/index.html" style="height: 860px;width: 1200px;border: none;padding-top: 5%"></iframe>
    </div>
    <div class="page2"  style="font-size:50px;text-align: center;font-family: Noto Sans S Chinese; font-weight:lighter;background: url(<?php print TEMPLATE_URL; ?>img/bg2.jpg);background-size:100% 100%;">
      <iframe src="<?php print TEMPLATE_URL; ?>OMO/index.html" scrolling="no" style="height: 860px;width: 1200px;border: none;"></iframe>
    </div>
    <div class="page3"  style="font-size:50px;text-align: center;font-family: Noto Sans S Chinese; font-weight:lighter;background: url(<?php print TEMPLATE_URL; ?>img/bg.jpg);background-size:100% 100%;">
      <iframe src="<?php print TEMPLATE_URL; ?>desktop-last/index.html" style="height: 860px;width: 1200px;border: none;padding-top: 5%"></iframe>
    </div>
    <div class="page4"  style="font-size:50px;text-align: center;font-family: Noto Sans S Chinese; font-weight:lighter;background: url(<?php print TEMPLATE_URL; ?>img/bg5.png);background-size:100% 100%;">
      <iframe src="<?php print TEMPLATE_URL; ?>desktop4/index.html" style="height: 860px;width: 1200px;border: none;padding-top: 5%"></iframe>
    </div>
   </div>
   <ul id="bullets"></ul>
<!-- 中间滚屏 -->
        <!--<div class="credit">a simple demo for cubeTransition.js</div>-->
<!-- 右侧 -->
  <div class="htmleaf-container">
    <a class="cd-nav-trigger" href="#cd-nav">
      Menu<span><!-- used to create the menu icon --></span>
    </a> <!-- .cd-nav-trigger -->
    
    <nav class="cd-nav-container" id="cd-nav">
      <header>
        <h3>导航</h3>
        <a class="cd-close-nav" href="#0">Close</a>
      </header>

      <ul class="cd-nav">
        <li data-menu="index">
          <a href="http://172.16.5.13:8553/userfiles/media/doc/OMO1.docx">
          <!-- <a href="http://172.16.5.200:8333/zhanmaowang/Survey/Survey/index.html"> -->
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="nc-icon outline" viewBox="0 0 64 64" x="0px" y="0px" width="64px" height="64px"><g transform="translate(0)"> <polyline fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="10,24.9 10,60 26,60 26,44 38,44 38,60 54,60 54,24.9" data-cap="butt" /> <polyline fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="4,30 32,6 60,30" data-color="color-2" /> <rect fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x="26" y="24" width="12" height="10" data-color="color-2" /> </g></svg>
            </span>

            <em>介绍</em>
          </a>
        </li>

        <li data-menu="projects">
          <a href="http://172.16.5.13:8553/userfiles/media/doc/简约小清新渐变背景PPT模板.pptx">
          <!-- <a href="http://172.16.5.200:8333/zhanmaowang/product/default.html"> -->
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="nc-icon outline" viewBox="0 0 64 64" x="0px" y="0px" width="64px" height="64px"> <g transform="translate(0)"> <polyline fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="22,12 22,4 42,4 42,12" data-color="color-2" /> <line fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="44" y1="44" x2="20" y2="44" /> <polyline fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="12,44 2,44 2,12 62,12 62,44 52,44" /> <polyline fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="58,44 58,60 6,60 6,44" /> <rect fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x="22" y="22" width="20" height="10" data-color="color-2" /> <rect fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x="12" y="40" width="8" height="8" data-color="color-2" /> <rect fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x="44" y="40" width="8" height="8" data-color="color-2" /> </g> </svg>
            </span>

            <em>项目</em>
          </a>
        </li>

        <li class="cd-selected" data-menu="about">
          <!-- <a href="http://www.zyetc.com/Contact/MsgOnline.aspx"> -->
          <a href="http://172.16.5.13:8553/userfiles/media/doc/l12.xls">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="nc-icon outline" viewBox="0 0 64 64" x="0px" y="0px" width="64px" height="64px"> <g transform="translate(0)"> <polyline fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="38,16 62,16 62,58 2,58 2,16 26,16" data-color="color-2" /> <path fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" d="M 38 20 H 26 V 8 c 0 -3.3 2.7 -6 6 -6 h 0 c 3.3 0 6 2.7 6 6 V 20 Z" /> <path fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" d="M 20 38 L 20 38 c -2.2 0 -4 -1.8 -4 -4 v -2 c 0 -2.2 1.8 -4 4 -4 h 0 c 2.2 0 4 1.8 4 4 v 2 C 24 36.2 22.2 38 20 38 Z" /> <line fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="38" y1="36" x2="54" y2="36" /> <line fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="38" y1="44" x2="48" y2="44" /> <path fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" d="M 30 48 H 10 v 0 c 0 -3.3 2.7 -6 6 -6 h 8 C 27.3 42 30 44.7 30 48 L 30 48 Z" /> <line fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="32" y1="12" x2="32" y2="10" /> </g> </svg>
            </span>

            <em>关于</em>
          </a>
        </li>

        <li data-menu="services">
          <a href="http://cab2b.com/">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="nc-icon outline" viewBox="0 0 64 64" x="0px" y="0px" width="64px" height="64px"><g transform="translate(0)"> <line fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="46" y1="56" x2="58" y2="44" data-cap="butt" data-color="color-2" /> <line fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="24" y1="10" x2="12" y2="22" data-cap="butt" data-color="color-2" /> <polyline fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="19,29 6,16 18,4 31,17" data-color="color-2" /> <polyline fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="45,31 58,44 60,58 46,56 33,43" data-color="color-2" /> <rect fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" transform="matrix(0.7071 0.7071 -0.7071 0.7071 31 -12.8406)" x="21.1" y="2.7" width="19.8" height="56.6" /> <line fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="24" y1="24" x2="30" y2="30" /> <line fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="18" y1="30" x2="22" y2="34" /> <line fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="36" y1="12" x2="42" y2="18" /> <line fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="30" y1="18" x2="34" y2="22" /> <line fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="12" y1="36" x2="18" y2="42" /> </g></svg>
            </span>

            <em>服务</em>
          </a>
        </li>

        <li data-menu="careers">
          <a href="http://zyetc.cn/Contact/HROnline.aspx">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="nc-icon outline" viewBox="0 0 64 64" x="0px" y="0px" width="64px" height="64px"> <g transform="translate(0)"> <polyline fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="24,40 28,48 36,48 40,40" data-cap="butt" data-color="color-2" /> <line fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="24" y1="62" x2="28" y2="48" data-cap="butt" data-color="color-2" /> <line fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="36" y1="48" x2="40" y2="62" data-cap="butt" data-color="color-2" /> <path fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" d="M 39.7 40 H 40 c 12.2 0 22 9.8 22 22 v 0 H 2 v 0 c 0 -12.2 9.8 -22 22 -22 h 0.3" data-cap="butt" /> <path fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" d="M 47.9 27.5 C 47.2 35.7 40.3 42 32 42 h 0 c -8.3 0 -15.2 -6.4 -15.9 -14.5" data-cap="butt" /> <path fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" d="M 16 18 c 0 -8.8 7.2 -16 16 -16 h 0 c 8.8 0 16 7.2 16 16" /> <path fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" d="M 12.1 18 c 0 0.3 -0.1 0.7 -0.1 1 c 0 6.1 4.9 11 11 11 c 3.7 0 7 -1.9 9 -4.7 c 2 2.8 5.3 4.7 9 4.7 c 6.1 0 11 -4.9 11 -11 c 0 -0.3 0 -0.7 -0.1 -1 H 12.1 Z" data-color="color-2" /> </g> </svg>
            </span>

            <em>招聘</em>
          </a>
        </li>
        <li data-menu="contact">
          <a href="http://172.16.5.200:8333/zhanmaowang/industry%20chain/default.html">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="nc-icon outline" viewBox="0 0 64 64" x="0px" y="0px" width="64px" height="64px"><g transform="translate(0)"> <polyline fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" points="10,18 32,36 54,18" data-cap="butt" data-color="color-2" /> <rect fill="none" stroke="#9e85d0" stroke-linecap="square" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x="2" y="10" width="60" height="44" /> <line fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="10" y1="44" x2="18" y2="34" data-cap="butt" data-color="color-2" /> <line fill="none" stroke="#9e85d0" stroke-linecap="butt" stroke-linejoin="square" stroke-miterlimit="10" stroke-width="2" x1="54" y1="44" x2="46" y2="34" data-cap="butt" data-color="color-2" /> </g></svg>
            </span>

            <em>联系</em>
          </a>
        </li>
      </ul> <!-- .cd-3d-nav -->
    </nav>

    <div class="cd-overlay"><!-- shadow layer visible when navigation is visible --></div>
    
  </div>        

  <script>
    function animationIn(i){
    console.log(i,'i\'m in')
    switch(i) {
        case 1:
            $('.page2 h2').fadeIn();
            break;
        case 2:
            $('.page3 h2').animate({top:'40%',left:'30%'},1000);
            break;
        case 3:
                   setTimeout(function(){
             $('.page4 h2').addClass('ani')
             console.log('hhh')
            },0)
            break;
        default:
            ;
    }
    }

  function animationOut(i){
    console.log(i,'i\'m out')
    switch(i) {
        case 1:
            $('.page2 h2').fadeOut();
            break;
        case 2:
            $('.page3 h2').animate({top:0,left:0},1000);
            break;
        case 3:
            $('.page4 h2').removeClass('ani')
            break;
        default:
            ;
    }
    }
    mw.require("<?php print TEMPLATE_URL; ?>js/mousewheel.js");     
    mw.require("<?php print TEMPLATE_URL; ?>js/jquery.touchSwipe.js");
    mw.require("<?php print TEMPLATE_URL; ?>js/cubeTransition.js");
    mw.require("<?php print TEMPLATE_URL; ?>js/main.js");         
  </script>        


<?php include THIS_TEMPLATE_DIR. "footer.php"; ?>

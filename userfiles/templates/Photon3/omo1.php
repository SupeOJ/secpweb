<?php

/*

  type: layout
  content_type: static
  name: omo
  position: 11
  description: omo layout

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
body{background: url(<?php print TEMPLATE_URL; ?>img/bg.jpg);background-size:100% 100%;}

.desktop{
    width: 100%;
    height: 600px;
    text-align: center;
    padding-top: 5%;
}
.containerbox{
    width: 1200px;
    height: 720px;
    margin: auto;
}
.div1,.div2,.div3,.div4,.div5,.div6,.div7,.div8,.div9,.div10,.div11,.div12,.div13,.div14,.div15{
    width: 240px;height: 240px;float: left;
    /*text-align: center;line-height: 220px;*/
}
.img1,.img2m,.img3,.img4,.img5,.img6,.img7,.img8{
    vertical-align:middle;
}
.div2{
    background: #a6a6a6;
}
.div4{
    background: #919191;
}
.div6{
    background: #666666; 
}
.div7{
    background: #756f6f;
}
.div8{
    background: #262626;
}
.div9{
    background: #454545;
}
.div10{
    background: #1d3c59;
}
.div13{
    background: #5a6e91;
}
.text{
    font-weight: 100;
    font-size: 16px;
    line-height: 16px;
    text-align: center;
    padding-top:10px;
    color: #fff;
}
a,a:link,a:visited,a:hover,a:active{
    text-decoration: none;
    color: #fff;
}

/*.desktop .container div:hover img{
    margin-top:-45px;
    margin-right: -45px;
    transition:0.5s all ease-in-out;
} 
.desktop .container div:hover .text{
    margin-top:-65px;
    margin-right: -55px;
    transition:0.5s all ease-in-out;
}*/

.static{
    padding-left: 0px;
    padding-top: 50px;
    transition:0.5s all ease-in-out;
}
.desktop .containerbox div:hover .static{
    padding-left:30px;
    padding-top:40px;
}
</style>
<!-- 中间滚屏 -->

    <div class="page1"  style="font-size:50px;text-align: center;font-family: Noto Sans S Chinese; font-weight:lighter;">
    
    <div class="desktop">
        <div class=containerbox>
            <div class="div1"></div>
            <div class="div2">
                <div class="static">
                    <a href="zypan://open">
                        <img class="img1" src="<?php print TEMPLATE_URL; ?>desktop/img/bgyy.png">
                        <p class="text">办公云</p>
                    </a>  
                </div>  
            </div>
            <div class="div3"></div>
            <div class="div4">
                <div class="static">
                    <a href="zypan://open">
                        <img class="img4" src="<?php print TEMPLATE_URL; ?>desktop/img/jxyy.png">
                        <p class="text">教学云</p>
                    </a>
                </div>
            </div>
            <div class="div5"></div>
            <div class="div6">
                <div class="static">
                    <a href="zypan://open">
                        <img class="img4" src="<?php print TEMPLATE_URL; ?>desktop/img/jyyy.png">
                        <p class="text">教育云</p>
                    </a>
                </div>
            </div>
            <div class="div7">
                <div class="static">
                    <a href="zypan://open">
                        <img class="img4" src="<?php print TEMPLATE_URL; ?>desktop/img/glyy.png">
                        <p class="text">管理云</p>
                    </a>
                </div>
            </div>
            <div class="div8">
                <div class="static">
                    <a href="zypan://open">
                        <img class="img4" src="<?php print TEMPLATE_URL; ?>desktop/img/yyyy.png">
                        <p class="text">应用云</p>
                    </a>
                </div>
            </div>
            <div class="div9">
                <div class="static">
                    <a href="zypan://open">
                        <img class="img4" src="<?php print TEMPLATE_URL; ?>desktop/img/sjyy.png">
                        <p class="text">数据云</p>
                    </a>
                </div>
            </div>
            <div class="div10">
                <div class="static">
                    <a href="zypan://open">
                        <img class="img4" src="<?php print TEMPLATE_URL; ?>desktop/img/hdyy.png">
                        <p class="text">互动云</p>
                    </a>
                </div>
            </div>
            <div class="div11"></div>
            <div class="div12"></div>
            <div class="div13">
                <div class="static">
                    <a href="zypan://open">
                        <img class="img4" src="<?php print TEMPLATE_URL; ?>desktop/img/zyyy.png">
                        <p class="text">资源云</p>
                    </a>
                </div>
            </div>
            <div class="div14"></div>
            <div class="div15"></div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
	/*
		var closeWin = function (){
			window.location.href="qiye://open";  
			setTimeout("closemywin()",5000);
		 
		}
        function closemywin(){
          window.opener = null;
          window.open('', '_self');
          window.close();            
        }  
			*/
    </script>



<?php include THIS_TEMPLATE_DIR. "footer.php"; ?>

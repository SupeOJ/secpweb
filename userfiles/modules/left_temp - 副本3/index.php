
<?php
$menuData = get_menu('one=1&limit=1&title=' . '左侧导航');

?>
<style type="text/css">
        <?php if(in_live_edit()):?>
        #PanelMenu1_panel {
            top: 52px !important;
        }
        #PanelMenu2_panel {
            top: 52px !important;
        }
	    .self_mode{margin-top: 52px;}
        body{
          padding-top:55px !important;
        }
		#PanelMenu2{margin-top: 52px;}
        .add_menu{
          font-size: 16px;
          font-weight: 800;
          padding: 10px 10px 10px 10px;
          color: #fff;
          text-align: center;
          cursor: pointer;
		  position: relative;
			top: 18px;
			left: 106px;}
        .add_menu:hover{
          font-weight: 800;
          color: rgba(0, 134, 219, 1);
        }
        <?php endif;?>
       
        #PanelMenu1_markup i,#PanelMenu1>i{
			    position: absolute;
                top: 13px;
                font-size: 20px;
                font-weight: 500;}
		#PanelMenu1_markup i{ right: 10px;}
		.ecp_web>li:hover{background:rgba(107,130,171,0.12);border-left: 3px solid #5874d8;}
		p{margin:0px;}
		
	.element-over:hover, .module-over:hover {
		outline: 1px solid rgba(0, 134, 219, 1) !important;
		outline-offset: -1px;
	}
	#mw_handle_element {
        z-index: 1097 !important;
    }
	.move_npdf{
		left:-1000px;
	}
	.is-active .bar:nth-child(2){
	  opacity: 0;
	}

	.is-active .bar:nth-child(1){
	  -webkit-transform: translateY(9px) rotate(45deg);
	  -ms-transform: translateY(9px) rotate(45deg);
	  -o-transform: translateY(9px) rotate(45deg);
	  transform: translateY(9px) rotate(45deg);
		-webkit-transition: 0.2s all linear;
		-moz-transition: 0.2s all linear;
		-o-transition: 0.2s all linear;
		transition: 0.2s all linear;
	}

	.is-active .bar:nth-child(3){
	  -webkit-transform: translateY(-3px) rotate(-45deg);
	  -ms-transform: translateY(-3px) rotate(-45deg);
	  -o-transform: translateY(-3px) rotate(-45deg);
	  transform: translateY(-3px) rotate(-45deg);
		-webkit-transition: 0.2s all linear;
		-moz-transition: 0.2s all linear;
		-o-transition: 0.2s all linear;
		transition: 0.2s all linear;
	}

   .right-nav-button .bar{
      height: 2px;
      width: 18px;
      display: block;
      margin: 4px auto;
      position: relative;
      background-color: #fff;  
		-webkit-transition: 0.2s all linear;
		-moz-transition: 0.2s all linear;
		-o-transition: 0.2s all linear;
		transition: 0.2s all linear;      
    }
   .left-nav-button .bar{
      height: 2px;
      width: 18px;
      display: block;
      margin: 4px auto;
      position: relative;
      background-color: #fff;        
    }
	.ecp_web img{    width: 30px;margin-right:5px;
	    margin-bottom: 2px;
    vertical-align: middle;}
	#mw_handle_module{width:1903px !important;}
	.drag_pdf{
			    position: fixed;
				    right: 87px;
				z-index: 999;
				top: 55px;
		}
	body{overflow-x: hidden;margin:0px;}
</style>

	<script>mw.require('https://fonts.googleapis.com/icon?family=Material+Icons&.css', 'material_icons');</script>
<script type="text/javascript">
    mw.moduleJS("<?php print $config['url_to_module']; ?>js/wb.panel.min.js");
    mw.moduleJS("<?php print $config['url_to_module']; ?>js/iconfont.css");
    mw.moduleCSS("<?php print $config['url_to_module']; ?>index.css");
   var times = 1;
    $(document).ready(function()
    {
       $("#PanelMenu1").panel({animate: true, animationDuration: 200, animationEasing: 'linear', dismissible: true, display: 'push', position: 'left', toggle: true});
      $("#PanelMenu1").click(function(){
		   times++;
		   if(times%2==0){
			   $(this).find('i').addClass('icon-leftarrow')
			   $(this).find('i').removeClass('icon-rightarrow')
		   }else{
			   $(this).find('i').addClass('icon-rightarrow')
			   $(this).find('i').removeClass('icon-leftarrow')
		   }
		   return false;
	   })
	  
//  侧边栏导航点击事件盒子动画
	    $('#PanelMenu1_markup').on('click','ul>li',function(e){
			e.stopPropagation();
			clearRightAnimate();
			var target = $(this);
			// 设置的动画时间
			var animateTime = 300;
			middleAnimate(target, animateTime);
			return false;
       })
    })
	
// 清除右边帮助中心，动画还原复位
var clearRightAnimate = function () {
    $(".assistContent1").animate({
        "margin-left": "0px"
    }, 100, "linear");
    $(".assistContent1").siblings().animate({
        "margin-left": "0px"
    }, 100, "linear");
    // 
    $("#rightBox").stop().animate({
        "margin-left": "0px"
    }, 100, "linear")

    $("#rightBtn").removeClass("is-active");
    $(" .rightBoxContent .content ul li ").removeClass("animate");
}
//  左侧边栏导航点击事件盒子动画
var condition = 0;
var middleAnimate = function (target, animateTime) {
    var index = target.index();

    if (condition == 0) {
        condition = 1;

        var $this = $(".leftIframe").children("iframe:eq(" + index + ")");
        $(target).siblings().removeClass("active");
		var Hf = $(target).children('a').attr('href');
		if(Hf){
			var src = $this.attr("src");
			if(Hf != src){
				$this.attr("src",Hf);
			}
		}
        if (!$(target).hasClass("active")) {

            // 动画元素
            $this.animate({
                "margin-left": "86vw"
            }, animateTime)

            $this.siblings().css({
                "margin-left": "0vw"
            });

            $(target).addClass("active");

            $("#PanelMenu2").css({
                "display": "none"
            });

            target.children(".cbp-hrsub").css({
                "display": "block"
            }).parent("li").siblings("li").children(".cbp-hrsub").css({
                "display": "none"
            });
			
        } else {

            // 动画元素位置还原
            $this.animate({
                "margin-left": "0vw"
            }, animateTime)
            $(target).removeClass("active");


            $("#rightBtn").css({
                "display": "block"
            });

            target.children(".liNav").css({
                "display": "none"
            })
        }
    }
    // 禁止事件多次触发
    setTimeout(function () {
        condition = 0
    }, animateTime)
}

</script>
<div id="mw-sliderbarMenu-module-<?php print $params['id']; ?>" style="height:0px;">
    <!--<头部>-->
   <iframe name="InlineFrame1" id="InlineFrame1" style="width:100%;height:0px;z-index:100;border: 0px;" src=''></iframe>
    <div id="wb_PanelMenu1" style="position:absolute;left:0px;top:0px;width:866px;height:0px;z-index:100;" >
    <a href="#PanelMenu1_markup" id="PanelMenu1" class="Panpic1"><i class="iconfont icon-rightarrow" style="font-size: 30px;"></i></a>
      <div id="PanelMenu1_markup">
	  <?php
                $menusa = mw()->menu_manager->get_dropdown_menus($menuData['id']);
                 if($menusa != false){
                    print ($menusa);
                  }else{
                    print lnotif("请添加菜单数据.");
                  }              
            ?>
		
      </div>
    </div>
	<div class="drag_pdf">
     <module type="right_pdf" />
	</div>
	
	<!-- 页面动画链接-->
	<div class="leftIframe">
		<iframe class="pageFrame" src=""></iframe>

		<iframe class="pageFrame" src=""></iframe>
		<iframe class="pageFrame"></iframe>
		<iframe class="pageFrame"></iframe>
	</div>
    
</div>

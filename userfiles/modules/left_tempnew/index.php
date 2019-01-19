
<?php
$menuData = get_menu('one=1&limit=1&title=' . '左侧导航');

?>
    <link rel="stylesheet" type="text/css" href="<?php print $config['url_to_module']; ?>js/iconfont.css">
    <link rel="stylesheet" type="text/css" href="<?php print $config['url_to_module']; ?>js/iconfont1.css">
    <link rel="stylesheet" type="text/css" href="<?php print $config['url_to_module']; ?>js/index.css">
<style>
        <?php if(in_live_edit()):?>
  #rightBtn{top:52px;}
  .exterior{top:52px;}
  #rightBox{top:52px;}
  #main-content-holder{top:52px;}
        <?php endif;?>
	.flotdiv{background: red;
	width:100%;
             height: 30px;
			 z-index: 1111;
			 position: fixed;
			left: 0px;
			top: 57px;}

</style>
    <!-- 最外层 
    <div class="exterior">-->
    
        <!-- 左边动画按钮 -->
        <!-- leftBox  leftContent  li  title liNav li元素外不能被包标签-->
        <div class="leftBox">
		
	        <?php
                $menusa = mw()->menu_manager->get_dropdown_menusarr($menuData['id']);
                 if($menusa != false){
                    print ($menusa);
                  }else{
                    print lnotif("请添加菜单数据.");
                  }              
            ?>
               

            <!-- 页面动画链接-->
            <div class="leftIframe">
                <div class="parentBox">
                    <div class="sonBox">
	        <?php
                $iframe = mw()->menu_manager->get_dropdown_iframe($menuData['id']);
				foreach($iframe as $k => $v){ ?>
                        <iframe class="pageFrame" data-id="<?php echo $k; ?>" src="<?php echo $v; ?>"></iframe>
			<?php	} ?>
                    </div>
                </div>
            </div>

          <!-- 中间按钮 -->
          <div id="btnLeft"><i class="iconfont icon-rightarrow"></i></div>
        </div>

        <!-- 中间内容 
        <div class="middleContentIframe">
            <iframe class="middleIframe" src="http://172.16.5.13:8557/" frameborder="0" style="border:0px;"></iframe>
        </div>-->


        <!-- 右边动画盒子 -->
        <div id="rightBox">
            
     <module type="right_pdf" />
        </div>
    <!--</div> -->

   
<script src="<?php print $config['url_to_module']; ?>js/index.js"></script>
<script type="text/javascript">
    $(function () {
        // 设置iframe的高度
        $("iframe").css({
            "height": $(document).height() + "px"
        })
	})
</script>

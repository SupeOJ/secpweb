
<?php
$menuData = get_menu('one=1&limit=1&title=' . '左侧导航');

?>

    <!-- 最外层 
    <div class="exterior">-->
    
        <!-- 左边动画按钮 -->
        <!-- leftBox  leftContent  li  title liNav li元素外不能被包标签-->
		
	        <?php
                $menusa = mw()->menu_manager->get_dropdown_menusarr($menuData['id']);
                 if($menusa != false){
                    print ($menusa);
                  }else{
                    print lnotif("请添加菜单数据.");
                  }              
            ?>


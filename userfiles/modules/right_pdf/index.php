
<?php
	$id = array();
	$parent_id = $params['parent-module-id'];
	$id['content_id'] = substr($parent_id,strripos($parent_id,"-")+1);
	$menus = get_pdfid($id);
?>
                <div class="rightBoxContent">
                <div class="content content1">
                    <div class="contentTitle">帮助中心</div>
                    <ul>
					<?php if(!empty($menus)){
						foreach ($menus as $k => $val){ ?>
                        <li etc-pdfid="<?php echo $val['id'] ?>" url="<?php echo $val['url'] ?>">
                            <div class="image">
                                <img src="<?php echo $val['icon'] ?>" alt="">
                            </div>
                            <div class="contentText">
                                <?php echo $val['title'] ?>
                            </div>
                        </li>
					<?php }
					}else{	?>
                        <li>
                            <i class="iconfont icon-jiahao"></i>
                        </li>
					<?php } ?>
                    </ul>
                </div>
            </div>
            <div class="assist">
                    <?php if(!empty($menus)){
						foreach ($menus as $k => $val){ ?>
                        <iframe  etc-iframeid="<?php echo $val['id'] ?>" class="assistContent1" src="<?php echo $val['url'] ?>"></iframe>
					<?php }} ?>
                       
                </div>
			 <!-- 右边按钮 -->
    <!-- icon-xiazai -->
    <div class="hamburger" id="rightBtn">
        <i class="iconfont icon-ziyuan" style="color:rgb(255,255,255);"></i>
    </div>

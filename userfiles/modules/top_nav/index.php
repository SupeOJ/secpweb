<?php

function sliderbar_tree2($menu_id,$data){
    $newData = [];
    if(!is_array($data)){return false;}
    foreach ( $data as $value ) {
        if( $value['parent_id'] == $menu_id ) {
            $value['sons'] = [];
            $value['sons'] = sliderbar_tree2($value['id'],$data);
            $newData[] = $value;
        }
    }
    return $newData;
}

$sliderbar = mw()->sliderbar_manager->get_sliderbar_items();
$slider = sliderbar_tree2(0,$sliderbar);

?>
<script type="text/javascript">
    mw.moduleCSS("<?php print $config['url_to_module']; ?>css/index.css");
    mw.moduleJS("<?php print $config['url_to_module']; ?>js/index.js");
</script>

<div id="mw-sliderbarMenu-module-<?php print $params['id']; ?>">
    <!--<头部>-->
    <div class="nav-top-menu">
        <!--左侧边栏-->
        <div class="left-nav " id="left-nav">
            <?php if($slider == false) :?>
            <?php else :?>                  
                <?php foreach($slider as $item): ?>
                    <div class="left-nav-sons" >
                        <a href="<?php print $item['url'];?>" >
                            <img class="Nav-left-img" src="<?php print $item['icon'];?>"  style="width:20px;height:20px;" target="right">
                            <span class="Nav-left-span"><?php print $item['title'];?></span>
                        </a>
                        

                        <div class="left-nav-sons-children" style="display: none;">
                            <p class="clear text_h3" >
                              <?php print $item['title'];?>
                            </p>
                            <?php if (count($item['sons'])) :?><!--是否存在二级菜单-->
                            <?php $count=0;?>
                            <?php foreach($item['sons'] as $arr) :?>

                                <?php if($arr['is_text']==1) : ?><!--文本-->

                                    <p class="clear Nav-left-P"><?php print $arr['title'];?></p>
                                    <?php foreach($arr['sons'] as $newarr) :?>
                                        <?php if( $newarr['url']):?>
                                            <a href="<?php print $newarr['url'];?>" target="right"><p class="Nav-left-P1 "><?php print $newarr['title']; ?></p></a>
                                        <?php else: ?>
                                            <p class="Nav-left-P1 "><?php print $newarr['title']; ?></p>
                                        <?php endif;?>
                                    <?php endforeach;?>

                                <?php else: ?><!--图文-->
                                    <p class="clear Nav-left-P"><?php print $arr['title'];?></p>
                                    <?php if (count($arr['sons'])) :?><!--是否存在三级菜单-->
                                        <ul class="boxx-img">
                                            <?php foreach($arr['sons'] as $newarr) :?>
                                                <li>
                                                    <a href="<?php print $newarr['url'];?>" target="right">
                                                        <img src="<?php print $newarr['icon']; ?>" alt="" style="width:20px;height:20px;">
                                                        <span><?php if(!$newarr['only_icon']){print $newarr['title'];} ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach;?>
                                        </ul>
                                    <?php endif;?>

                                <?php endif;?>
                                <?php $count++;?>
                            <?php endforeach;?>
                            <?php endif;?>
                        </div>
                    </div>

                <?php endforeach;?>
            <?php endif;?>
        </div>
        
        <!--左侧边栏按钮-->
        <button class="left-nav-button" id="left-nav-1"></button>
       
        <!-- 导航栏logo -->
        <div class="nav-module logo-module">
            <module type="logo" id="logo" />
        </div>

        <div class="md-dropdownmenu">               
            <module type="dropdown_menu" />
        </div>       
    </div>
</div>

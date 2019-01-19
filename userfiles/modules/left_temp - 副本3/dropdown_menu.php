<?php

$menuData = get_menu('one=1&limit=1&title=' . $params['menu-name']);

?>
<div class="container">
    <div class="main">
        <nav id="cbp-hrmenu" class="cbp-hrmenu">
            <?php
                $menusa = mw()->menu_manager->get_dropdown_menus($menuData['id']);
                 if($menusa != false){
                    print ($menusa);
                  }else{
                    print lnotif("请添加菜单数据.");
                  }

                            
            ?>
        </nav>
    </div>
</div>



<script type="text/javascript">
    $(function () {
        $("#cbp-hrmenu > ul > li.depth-0").mouseenter(function(){
            $(this).addClass("cbp-hropen");
        }).mouseleave(function(){
            $(this).removeClass("cbp-hropen");
        });
    });
</script>

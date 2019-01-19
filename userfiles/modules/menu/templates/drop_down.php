<?php
/**
type: layout

name:  DropDown

description: DropDown Navigation
 */


?>
<div style="background: #090723;">
<div class="container">
    <div class="main">
        <nav id="cbp-hrmenu" class="cbp-hrmenu">
            <?php
                $menusa = mw()->menu_manager->get_dropdown_menus(1);
                echo $menusa;
            ?>
        </nav>
    </div>
</div>
</div>

<script>mw.moduleCSS("<?php print $config['url_to_module']; ?>dropdown.css");</script>
<script type="text/javascript">
    $(function () {
        $("#cbp-hrmenu > ul > li.depth-0").mouseenter(function(){
            $(this).addClass("cbp-hropen");
        }).mouseleave(function(){
            $(this).removeClass("cbp-hropen");
        });
    });
</script>

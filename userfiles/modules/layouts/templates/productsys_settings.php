<?php 
only_admin_access();

$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showDes = get_option('showDes', $params['id']); // y|NULL|false
$showDes = $showDes === false ? 'y' : $showDes;

?>
<div class="moduleAdmin-caContent module-live-edit-settings">
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <input type="checkbox" name="showTitle" value="y" class="mw_option_field" <?php if($showTitle=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示标题</span>
                    </label>
                </div>
            </div>
        </div>
    
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <input type="checkbox" name="showDes" value="y" class="mw_option_field" <?php if($showDes=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示描述简介</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
	<module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />
</div>
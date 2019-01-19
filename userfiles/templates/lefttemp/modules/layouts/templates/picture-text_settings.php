<?php

$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showText = get_option('showText', $params['id']); // y|NULL|false
$showText = $showText === false ? 'y' : $showText;

?>
<div class="moduleAdmin-caMedia module-live-edit-settings">
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
                        <input type="checkbox" name="showText" value="y" class="mw_option_field" <?php if($showText=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示文本</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div id="moduleAdmin_caHeader_bgColor">
       <module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />
    </div>
</div>
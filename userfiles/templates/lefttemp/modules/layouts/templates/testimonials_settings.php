<?php
only_admin_access();

$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showAuthorName = get_option('showAuthorName', $params['id']); // y|NULL|false
$showAuthorName = $showAuthorName === false ? 'y' : $showAuthorName;

$showAuthorTitle = get_option('showAuthorTitle', $params['id']); // y|NULL|false

$column = get_option('column', $params['id']); // 2|3|6|false
$column = $column ? $column : '6';

//FGX20151127/////////////////////////////////////////////////
$anchor = get_option('anchor', $params['id']); // #...|NULL|false
$anchor = $anchor ? $anchor : "";
//FGX20151127/////////////////////////////////////////////////
?>
<div class="moduleAdmin-caTestimonials module-live-edit-settings">
    <div class="mw-ui-field-holder">
        <label class="mw-ui-check">
            <input type="checkbox" name="showTitle" value="y" class="mw_option_field" <?php if($showTitle=='y'){ print 'checked="checked"';} ?> />
            <span></span>
            <span> 显示标题</span>
        </label>
    </div>
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <input type="checkbox" name="showAuthorName" value="y" class="mw_option_field" <?php if($showAuthorName=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示用户名</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <input type="checkbox" name="showAuthorTitle" value="y" class="mw_option_field" <?php if($showAuthorTitle=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示用户签名</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- FGX20151127------------------------------------- -->
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">设置锚点</label>
        <input type="text" name="anchor" class="mw_option_field mw-ui-field w100" value="<?php print $anchor;?>" placeholder="请输入锚点名称" />
    </div>
    <!-- FGX20151127------------------------------------- -->
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">显示个数</label>
        <select class="mw-ui-field mw_option_field w100" name="column">
            <option <?php if($column=='2'){ print 'selected'; } ?> value="2">2</option>
            <option <?php if($column=='3'){ print 'selected'; } ?> value="3">3</option>
            <option <?php if($column=='6'){ print 'selected'; } ?> value="6">6</option>
        </select>
    </div>

</div>
<module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />

<?php only_admin_access(); ?>
<?php

$style = get_option('style', $params['id']); // btn-default|btn-primary|btn-success|btn-info|btn-warning|btn-danger|btn-link
$style = $style ? $style : (isset($params['style']) ? $params['style'] : 'btn-default');

$size = get_option('size', $params['id']); // btn-lg|btn-sm|btn-xs
$size = $size ? $size : (isset($params['size']) ? $params['size'] : 'btn-lg');

$action = get_option('button_action', $params['id']);
$url = get_option('url', $params['id']);
$popupcontent = get_option('popupcontent', $params['id']);
$text = get_option('text', $params['id']);
$url_blank = get_option('url_blank', $params['id']);
$icon = get_option('icon', $params['id']);
?>
<style>
    select {
        width: 390px;
    }

    #editor_holder {
        display: none;
    }

    .mw-iframe-editor {
        width: 100%;
        height: 300px;
    }

    #icon-picker ul {
        height: 220px;
    }

    #icon-picker li {
        margin: 5px 0;
        float: left;
        width: 33.333%;
        text-align: center;
    }

    #icon-picker input,
    #icon-picker {
        width: 250px;
    }

</style>
<script>
    mw.require('icon_selector.js')
    mw.require('wysiwyg.css')
</script>
<script>


    launchEditor = function () {
        if (!window.editorLaunched) {
            editorLaunched = true;
            PopUpEditor = mw.editor({
                element: document.getElementById('popupcontent'),
                hideControls: ['format', 'fontsize']
            });
        }

    }


    $(document).ready(function () {


        btn_action = function () {
            var el = mw.$("#action");
            if (el.val() == 'url') {
                $("#editor_holder").hide();
                mw.$("#btn_url_holder").show();
            }
            else if (el.val() == 'popup') {
                $("#editor_holder").show();
                mw.$("#btn_url_holder").hide();
                launchEditor();
            }
            else {
                $("#editor_holder").hide();
                mw.$("#btn_url_holder").hide();
            }
        }


        btn_action();
        mw.$("#action").change(function () {
            btn_action();
        });

    });

</script>

<div class="module-live-edit-settings">
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">
            <?php _e("Text"); ?>
        </label>
        <input type="text" name="text" class="mw_option_field mw-ui-field w100" value="<?php print $text; ?>" placeholder="<?php _e("Button"); ?>"/>
    </div>
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">
            <?php _e("Action"); ?>
        </label>
        <select class="mw-ui-field mw_option_field w100" id="action" name="button_action">
            <option <?php if ($action == '') {
                print 'selected';
            } ?> value="">
                <?php _e("None"); ?>
            </option>
            <option <?php if ($action == 'url') {
                print 'selected';
            } ?> value="url">
                <?php _e("Go to link"); ?>
            </option>
            <option <?php if ($action == 'popup') {
                print 'selected';
            } ?> value="popup">
                <?php _e("Open a pop-up window"); ?>
            </option>
        </select>
    </div>

    <div id="editor_holder">
        <label class="mw-ui-label">
            <?php _e("Popup content"); ?>
        </label>
        <textarea class="mw_option_field" name="popupcontent" id="popupcontent"><?php print $popupcontent; ?></textarea>
    </div>
    <div id="btn_url_holder">
        <div class="mw-ui-field-holder">
            <input type="text" name="url" id="btn btn-default_url" value="<?php print $url; ?>" placeholder="<?php _e("Enter URL"); ?>" class="mw_option_field mw-ui-field w100"/>
        </div>
        <div class="mw-ui-field-holder" style="padding-top: 0">
            <label class="mw-ui-check">
                <input type="checkbox"
                       name="url_blank"
                       value="y"
                       class="mw_option_field"
                    <?php if ($url_blank == 'y'): ?> checked="checked" <?php endif; ?>
                >
                <span></span> <span>
        <?php _e("Open in new window"); ?>
        </span> </label>
        </div>
    </div>
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">
            <?php _e("Icon"); ?>
        </label>
        <script>
            $(document).ready(function () {
                mw.iconSelector.iconDropdown("#icon-picker", {
                    onchange: function (iconClass) {
                      
                       $('[name="icon"]').val(iconClass).trigger('change')
                    },
                    mode: 'absolute',
                    value: '<?php print $icon; ?>'
                });
                $("#icon-picker input").val($('[name="icon"]').val())
            })
        </script>
        <textarea name="icon" class="mw_option_field" style="display: none"><?php print $icon; ?></textarea>
        <div id="icon-picker"></div>
    </div>
     <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <label class="mw-ui-label">颜色</label>
                <select class="mw-ui-field mw_option_field" name="style" style="width:390px;">
                    <option <?php if($style=='btn-default'){print 'selected';} ?> value="btn-default" style="background:transparent;">默认</option>
                    <option <?php if($style=='btn-primary'){print 'selected';} ?> value="btn-primary" style="background:#4c6972;">主要</option>
                    <option <?php if($style=='btn-success'){print 'selected';} ?> value="btn-success" style="background:#7ac673;">成功</option>
                    <option <?php if($style=='btn-info'   ){print 'selected';} ?> value="btn-info"    style="background:#27aae0;">信息</option>
                    <option <?php if($style=='btn-warning'){print 'selected';} ?> value="btn-warning" style="background:#faaf40;">警告</option>
                    <option <?php if($style=='btn-danger' ){print 'selected';} ?> value="btn-danger"  style="background:#f97352;">危险</option>
                    <option <?php if($style=='btn-link'   ){print 'selected';} ?> value="btn-link"    style="background:transparent;">链接(无边框)</option>
                </select>
            </div>
        </div>
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <label class="mw-ui-label">按钮大小</label>
                <select class="mw-ui-field mw_option_field" name="size" style="width:390px;">
                    <option <?php if($size=='btn-lg'){print 'selected';} ?> value="btn-lg">大</option>
                    <option <?php if($size=='btn-sm'){print 'selected';} ?> value="btn-sm">中</option>
                    <option <?php if($size=='btn-xs'){print 'selected';} ?> value="btn-xs">小</option>
                </select>
            </div>
        </div>
    </div>
</div>

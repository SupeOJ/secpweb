<?php
only_admin_access();

$style = get_option('style', $params['id']); // btn-default|btn-primary|btn-success|btn-info|btn-warning|btn-danger|btn-link
$style = $style ? $style : (isset($params['style']) ? $params['style'] : 'btn-default');

$size = get_option('size', $params['id']); // btn-lg|btn-sm|btn-xs
$size = $size ? $size : (isset($params['size']) ? $params['size'] : 'btn-lg');

$action = get_option('action', $params['id']); // url|popup
$action = $action ? $action : (isset($params['action']) ? $params['action'] : 'url');

$url = get_option('url', $params['id']);
$url = $url ? $url : (isset($params['url']) ? $params['url'] : '#');

$popup = get_option('popup', $params['id']);
$popup = $popup ? $popup : (isset($params['popup']) ? $params['popup'] : '');

$blank = get_option('blank', $params['id']); // y|n
$blank = $blank ? $blank : (isset($params['blank']) ? $params['blank'] : 'n');

$text = get_option('text', $params['id']);
$text = $text ? $text : (isset($params['text']) ? $params['text'] : '按钮');
?>

<style>.mw-iframe-editor{width:100%;height:300px;}</style>
<script>
    launchEditor = function() {
        if (!window.editorLaunched) {
            editorLaunched = true;
            PopUpEditor = mw.editor({
                element: document.getElementById('popup'),
                hideControls: ['format', 'fontsize']
            });
        }
    }
    $(document).ready(function() {
        action = function() {
            var el = mw.$("#action");
            if (el.val() == 'url') {
                $("#popup_holder").hide();
                mw.$("#url_holder").show();
            } else if (el.val() == 'popup') {
                $("#popup_holder").show();
                mw.$("#url_holder").hide();
                launchEditor();
            } else {
                $("#popup_holder").hide();
                mw.$("#url_holder").hide();
            }
        }
        action();
        mw.$("#action").change(function() {
            action();
        });
    });
</script>
<div class="moduleAdmin-caButton module-live-edit-settings">
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">按钮文字</label>
        <input type="text" name="text" class="mw_option_field mw-ui-field w100" value="<?php print $text; ?>" placeholder="请输入按钮文字" />
    </div>
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <label class="mw-ui-label">按钮样式及颜色</label>
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
    <div class="mw-ui-field-holder" style="padding-bottom:0px;">
        <label class="mw-ui-label">响应类型</label>
        <select class="mw-ui-field mw_option_field w100" id="action" name="action">
            <option <?php if($action=='url'){ print 'selected'; } ?> value="url">打开指定URL</option>
            <option <?php if($action=='popup'){ print 'selected'; } ?> value="popup">弹出框</option>
        </select>
    </div>
    <div id="popup_holder" style="display:none;margin-top:10px;">
        <label class="mw-ui-label">弹出框内容</label>
        <textarea class="mw_option_field" name="popup" id="popup"><?php print $popup;?></textarea>
    </div>
    <div id="url_holder">
        <div class="mw-ui-field-holder">
            <input type="text" name="url" id="url" value="<?php print $url; ?>" placeholder="URL" class="mw_option_field mw-ui-field w100" />
        </div>
        <div class="mw-ui-field-holder" style="padding-top:0;margin-left:3px;">
            <label class="mw-ui-check">
                <input type="checkbox" name="blank" value="y" class="mw_option_field" <?php if($blank=='y'){ print 'checked="checked"';} ?> />
                <span></span>
                <span> 从新窗口打开</span>
            </label>
        </div>
    </div>
</div>
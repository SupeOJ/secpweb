<?php
only_admin_access();

$showName = get_option('showName', $params['id']); // y|NULL|false

$showPhone = get_option('showPhone', $params['id']); // y|NULL|false

$background = get_option('background', $params['id']); // image|color|false
$background = $background ? $background : 'color';

$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/bg.jpg";

$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

$bgColor = get_option('bgColor', $params['id']); // color|false
$bgColor = $bgColor ? $bgColor : "#3C3C3C";

$overlay = get_option('overlay', $params['id']); // y|NULL|false
$overlay = $overlay === false ? 'y' : $overlay;

$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#3C3C3C";

$overlayOpacity = get_option('overlayOpacity', $params['id']); // 0.1-1.0|false
$overlayOpacity = $overlayOpacity ? $overlayOpacity : "0.8";

$btnText = get_option('btnText', $params['id']); // ...|false
$btnText = $btnText ? $btnText : "联系我们";

$btnColor = get_option('btnColor',$params['id']);
$btnColor = $btnColor ? $btnColor : 'btn-default';
?>

<div class="module-live-edit-settings">
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <input type="checkbox" name="showName" value="y" class="mw_option_field" <?php if($showName=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示“姓名”字段</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <input type="checkbox" name="showPhone" value="y" class="mw_option_field" <?php if($showPhone=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示“电话”字段</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="mw-ui-field-holder">
        <div class="mw-ui-row-nodrop">
            <div class="mw-ui-col">
                <div class="mw-ui-col-container">
                    <label class="mw-ui-label">按钮文字 </label>
                    <input type="text" name="btnText" class="mw_option_field mw-ui-field w100" value="<?php print $btnText; ?>" placeholder="请输入按钮文字" />
                </div>
            </div>
            <div class="mw-ui-col">
                <div class="mw-ui-col-container">
                    <label class="mw-ui-label">按钮颜色 </label>
                    <select class="mw-ui-field mw_option_field w100" name="btnColor">
                        <option <?php if($btnColor=='btn-default'){ print 'selected'; } ?> value="btn-default">默认 </option>
                        <option <?php if($btnColor=='btn-primary'){ print 'selected'; } ?> value="btn-primary">深蓝 </option>
                        <option <?php if($btnColor=='btn-success'){ print 'selected'; } ?> value="btn-success">绿色 </option>
                        <option <?php if($btnColor=='btn-info'){ print 'selected'; } ?> value="btn-info">蓝色 </option>
                        <option <?php if($btnColor=='btn-warning'){ print 'selected'; } ?> value="btn-warning">黄色</option>
                        <option <?php if($btnColor=='btn-danger'){ print 'selected'; } ?> value="btn-danger">红色 </option>
                    </select>
                </div>
            </div>
        </div>
    </div>


</div>

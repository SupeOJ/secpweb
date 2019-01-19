<?php
$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showSubtitle = get_option('showSubtitle', $params['id']); // y|NULL|false
$showSubtitle = $showSubtitle === false ? 'y' : $showSubtitle;

$showText = get_option('showText', $params['id']); // y|NULL|false
$showText = $showText === false ? 'y' : $showText;

$showBtn = get_option('showBtn', $params['id']); // y|NULL|false
$showBtn = $showBtn === false ? 'y' : $showBtn;

$textSide = get_option('textSide', $params['id']); // left|right|false
$textSide = $textSide ? $textSide : 'right';

$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "../../layouts/img/bg.jpg";

$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'color';

$overlay = get_option('overlay', $params['id']); // y|NULL|false

$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#222222";

$overlayOpacity = get_option('overlayOpacity', $params['id']); // 0.1-1.0|false
$overlayOpacity = $overlayOpacity ? $overlayOpacity : "0.5";

$videoUrl = get_option('videoUrl', $params['id']); // http://...|false
$videoUrl = $videoUrl ? $videoUrl : "http://player.youku.com/embed/XNDkwNjY0NzAw";
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
                        <input type="checkbox" name="showSubtitle" value="y" class="mw_option_field" <?php if($showSubtitle=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示副标题</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="mw-ui-row-nodrop">
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
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <input type="checkbox" name="showBtn" value="y" class="mw_option_field" <?php if($showBtn=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示按钮</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">视频链接</label>
        <input type="text" name="videoUrl" class="mw_option_field mw-ui-field w100" value="<?php print $videoUrl; ?>" placeholder="请输入视频链接" />
    </div>
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">文本的位置</label>
        <select class="mw-ui-field mw_option_field w100" name="textSide">
            <option <?php if($textSide=='left'){ print 'selected';}?> value="left">左侧</option>
            <option <?php if($textSide=='right'){ print 'selected';}?> value="right">右侧</option>
        </select>
    </div>
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">背景类型</label>
        <select class="mw-ui-field mw_option_field w100" id="bground" name="bground">
            <option <?php if($bground=='image'){ print 'selected'; } ?> value="image">图片</option>
            <option <?php if($bground=='color'){ print 'selected'; } ?> value="color">颜色</option>
        </select>
    </div>
    <div id="moduleAdmin_caHeader_bgImage" style="display:none;">
        <script>
           browse_images = function(){
                moduleAdmin_caHeader_browse_images_modal = window.top.mw.modalFrame({
                    url: '<?php print site_url() ?>module/?type=files/admin&live_edit=true&remeber_path=true&ui=basic&start_path=media_host_base&from_admin=true&file_types=images&id=moduleAdmin_caHeader_browse_images_modal<?php print $params['id'] ?>&from_url=<?php print site_url() ?>',
                    title: "浏览图片",
                    id: 'moduleAdmin_caHeader_browse_images_modal<?php print $params['id'] ?>',
                    onload: function(){
                        this.iframe.contentWindow.mw.on.hashParam('select-file', function(){
                            $("#moduleAdmin_caHeader_bgImage img").attr('src', this + '');
                            $("#moduleAdmin_caHeader_bgImage input").val(this + '').change();
                            moduleAdmin_caHeader_browse_images_modal.remove();
                        });
                    },
                    height: 400
                })
            }
        </script>

        <input type="hidden" class="mw_option_field" name="bgImage" value="<?php echo $bgImage; ?>">
        <img width="100%" height="150px" src="<?php echo $bgImage; ?>">
        <button class="mw-ui-btn" onclick="browse_images()">更换背景图片</button> 
        <label class="mw-ui-check" style="margin-left:10px;">
            <input type="checkbox" name="parallax" value="y" class="mw_option_field" <?php if($parallax=='y'){ print 'checked="checked"';} ?> />
            <span></span>
            <span> 背景视差</span>
        </label>
    </div>
    <div id="moduleAdmin_caHeader_bgColor" style="display:none;">
       <module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />
    </div>

    <div id="moduleAdmin_caHeader_overlay_control" class="mw-ui-field-holder" style="margin-top:10px;">
        <label class="mw-ui-check">
            <input type="checkbox" id="overlay" name="overlay" value="y" class="mw_option_field" <?php if($overlay=='y'){ print 'checked="checked"';} ?> />
            <span></span>
            <span>是否启用遮罩层</span>
        </label>
    </div>
      <div id="moduleAdmin_caHeader_overlay">
        <div class="mw-ui-row-nodrop">
            <div class="mw-ui-col">
                <div class="mw-ui-col-container">
                    <label class="mw-ui-label">遮罩透明度</label>
                     <select class="mw-ui-field mw_option_field" name="overlayOpacity" style="width:390px;">
                        <option <?php if($overlayOpacity=='0.1'){print 'selected';}?> value="0.1">0.1</option>
                        <option <?php if($overlayOpacity=='0.2'){print 'selected';}?> value="0.2">0.2</option>
                        <option <?php if($overlayOpacity=='0.3'){print 'selected';}?> value="0.3">0.3</option>
                        <option <?php if($overlayOpacity=='0.4'){print 'selected';}?> value="0.4">0.4</option>
                        <option <?php if($overlayOpacity=='0.5'){print 'selected';}?> value="0.5">0.5</option>
                        <option <?php if($overlayOpacity=='0.6'){print 'selected';}?> value="0.6">0.6</option>
                        <option <?php if($overlayOpacity=='0.7'){print 'selected';}?> value="0.7">0.7</option>
                        <option <?php if($overlayOpacity=='0.8'){print 'selected';}?> value="0.8">0.8</option>
                        <option <?php if($overlayOpacity=='0.9'){print 'selected';}?> value="0.9">0.9</option>
                        <option <?php if($overlayOpacity=='1.0'){print 'selected';}?> value="1.0">1.0</option>
                    </select>
                </div>
            </div>
            <div class="mw-ui-col">
                <div class="mw-ui-col-container">
                    <label class="mw-ui-label">遮罩层颜色</label>
                    <select class="mw-ui-field mw_option_field" name="overlayColor" style="width:390px;">
                        <option <?php if($overlayColor=='1'){ print 'selected'; } ?> value="1">灰色</option>
                        <option <?php if($overlayColor=='2'){ print 'selected'; } ?> value="2">水色</option>
                        <option <?php if($overlayColor=='3'){ print 'selected'; } ?> value="3">秋色</option>
                        <option <?php if($overlayColor=='4'){ print 'selected'; } ?> value="4">驼色</option>
                        <option <?php if($overlayColor=='10'){ print 'selected'; } ?> value="10">枯黄</option>
                        <option <?php if($overlayColor=='5'){ print 'selected'; } ?> value="5">碳黑</option>
                        <option <?php if($overlayColor=='11'){ print 'selected'; } ?> value="11">黝黑</option>
                        <option <?php if($overlayColor=='6'){ print 'selected'; } ?> value="6">鸦青</option>
                        <option <?php if($overlayColor=='7'){ print 'selected'; } ?> value="7">竹青</option>
                        <option <?php if($overlayColor=='8'){ print 'selected'; } ?> value="8">黛蓝</option>
                        <option <?php if($overlayColor=='9'){ print 'selected'; } ?> value="9">靛蓝</option>
                        <option <?php if($overlayColor=='13'){ print 'selected'; } ?> value="13">淡钢蓝</option>
                        <option <?php if($overlayColor=='14'){ print 'selected'; } ?> value="14">淡粉色</option>
                        <option <?php if($overlayColor=='12'){ print 'selected'; } ?> value="12">深藏青色</option>
                    </select>
                </div>
            </div>
    </div>
</div>
</div>
<script>
    // 显示遮罩层设置
        showOverlaySetting = function () {
        if ($("#overlay").is(':checked')) 
             $("#moduleAdmin_caHeader_overlay").show();
        else $("#moduleAdmin_caHeader_overlay").hide();
    }
    $("#overlay").click(function () {
        showOverlaySetting();
    });
    showOverlaySetting();

    // 显示对应的背景类型设置
    change_bground = function () {
        var bground = $("#bground").val();

        if (bground == 'image') 
             $("#moduleAdmin_caHeader_bgImage").show();
        else $("#moduleAdmin_caHeader_bgImage").hide();

        if (bground == 'color') {
            $("#moduleAdmin_caHeader_bgColor").show();
            $("#moduleAdmin_caHeader_overlay_control").hide();
            $("#moduleAdmin_caHeader_overlay").hide();
        } else {
            $("#moduleAdmin_caHeader_bgColor").hide();
            $("#moduleAdmin_caHeader_overlay_control").show();
            showOverlaySetting();
        }

        if (bground == 'video')
             $("#moduleAdmin_caHeader_bgVedio").show();
        else $("#moduleAdmin_caHeader_bgVedio").hide();
    }
    change_bground();
    $("#bground").change(change_bground);
</script>
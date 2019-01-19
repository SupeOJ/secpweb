<?php 
only_admin_access();

$showImg = get_option('showImg', $params['id']); // y|NULL|false
$showImg = $showImg === false ? 'y' : $showImg;

$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showCaption = get_option('showCaption', $params['id']); // y|NULL|false
$showCaption = $showCaption === false ? 'y' : $showCaption;

$showBigTitle = get_option('showBigTitle', $params['id']); 
$showBigTitle = $showBigTitle === false ? 'y' : $showBigTitle;

$column = get_option('column', $params['id']); // 1|2|3|4|false
$column = $column ? $column : '3';

$imgSize = get_option('imgSize', $params['id']); // 100%|90%|80%|70%|60%|50%|false
$imgSize = $imgSize ? $imgSize : "50%";

$row_num = get_option('row_num', $params['id']); // 1|2|3|4|false
$row_num = $row_num ? $row_num : '1';


$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/bg.jpg";

$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'color';

$overlay = get_option('overlay', $params['id']); // y|NULL|false

$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#222222";

$overlayOpacity = get_option('overlayOpacity', $params['id']); // 0.1-1.0|false
$overlayOpacity = $overlayOpacity ? $overlayOpacity : "0.5";

?>
<style type="text/css">.clear_color_img {background: url("<?php print $config['url_to_module']; ?>../../layouts/mg/ico.clearbg.png") no-repeat 1px 1px;}</style>
<div class="moduleAdmin-caContent module-live-edit-settings">
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <input type="checkbox" name="showImg" value="y" class="mw_option_field" <?php if($showImg=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示图片</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <input type="checkbox" name="showTitle" value="y" class="mw_option_field" <?php if($showTitle=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示小标题</span>
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
                        <input type="checkbox" name="showCaption" value="y" class="mw_option_field" <?php if($showCaption=='y'){ print 'checked="checked"';} ?> />
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
                        <input type="checkbox" name="showBigTitle" value="y" class="mw_option_field" <?php if($showBigTitle=='y'){ print 'checked="checked"';} ?> />
                        <span></span>
                        <span> 显示大标题</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">图片大小</label>
        <select class="mw-ui-field mw_option_field w100" name="imgSize">
            <option <?php if($imgSize=='50%'){ print 'selected';}?> value="50%">不超过容器大小的50%</option>
            <option <?php if($imgSize=='60%'){ print 'selected';}?> value="60%">不超过容器大小的60%</option>
            <option <?php if($imgSize=='70%'){ print 'selected';}?> value="70%">不超过容器大小的70%</option>
            <option <?php if($imgSize=='80%'){ print 'selected';}?> value="80%">不超过容器大小的80%</option>
            <option <?php if($imgSize=='90%'){ print 'selected';}?> value="90%">不超过容器大小的90%</option>
            <option <?php if($imgSize=='100%'){ print 'selected';}?> value="100%">不超过容器大小的100%</option>
        </select>
    </div>
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">显示列数</label>
        <select class="mw-ui-field mw_option_field w100" name="column">
            <option <?php if($column=='1'){ print 'selected'; } ?> value="1">1列</option>
            <option <?php if($column=='2'){ print 'selected'; } ?> value="2">2列</option>
            <option <?php if($column=='3'){ print 'selected'; } ?> value="3">3列</option>
            <option <?php if($column=='4'){ print 'selected'; } ?> value="4">4列</option>
        </select>
    </div>
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">显示行数</label>
        <select class="mw-ui-field mw_option_field w100" name="row_num">
            <option <?php if($row_num=='1'){ print 'selected'; } ?> value="1">1行</option>
            <option <?php if($row_num=='2'){ print 'selected'; } ?> value="2">2行</option>
            <option <?php if($row_num=='3'){ print 'selected'; } ?> value="3">3行</option>
            <option <?php if($row_num=='4'){ print 'selected'; } ?> value="4">4行</option>
        </select>
    </div>    
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">背景类型</label>
        <select class="mw-ui-field mw_option_field w100" id="bground" name="bground">
            <option <?php if($bground=='image'){ print 'selected'; } ?> value="image">图片</option>
            <option <?php if($bground=='color'){ print 'selected'; } ?> value="color">颜色</option>
        </select>
    </div>
     <div id="moduleAdmin_caContent_bgImage" style="display:none;">
        <script>
           browse_images = function(){
                moduleAdmin_caContent_browse_images_modal = window.top.mw.modalFrame({
                    url: '<?php print site_url() ?>module/?type=files/admin&live_edit=true&remeber_path=true&ui=basic&start_path=media_host_base&from_admin=true&file_types=images&id=moduleAdmin_caContent_browse_images_modal<?php print $params['id'] ?>&from_url=<?php print site_url() ?>',
                    title: "浏览图片",
                    id: 'moduleAdmin_caContent_browse_images_modal<?php print $params['id'] ?>',
                    onload: function(){
                        this.iframe.contentWindow.mw.on.hashParam('select-file', function(){
                            $("#moduleAdmin_caContent_bgImage img").attr('src', this + '');
                            $("#moduleAdmin_caContent_bgImage input").val(this + '').change();
                            moduleAdmin_caContent_browse_images_modal.remove();
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

    
    <div id="moduleAdmin_caContent_bgColor" style="display:none;">
       <module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />
    </div>

    <div id="moduleAdmin_caContent_overlay_control" class="mw-ui-field-holder" style="margin-top:10px;">
        <label class="mw-ui-check">
            <input type="checkbox" id="overlay" name="overlay" value="y" class="mw_option_field" <?php if($overlay=='y'){ print 'checked="checked"';} ?> />
            <span></span>
            <span>是否启用遮罩层 （启用后“背景视差”效果将无效）</span>
        </label>
    </div>
    <div id="moduleAdmin_caContent_overlay">
        <div class="mw-ui-row-nodrop">
            <div class="mw-ui-col">
                <div class="mw-ui-col-container">
                    <label class="mw-ui-label">遮罩层透明度</label>
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
             $("#moduleAdmin_caContent_overlay").show();
        else $("#moduleAdmin_caContent_overlay").hide();
    }
    $("#overlay").click(function () {
        showOverlaySetting();
    });
    showOverlaySetting();

    // 显示对应的背景类型设置
    change_bground = function () {
        var bground = $("#bground").val();

        if (bground == 'image') 
             $("#moduleAdmin_caContent_bgImage").show();
        else $("#moduleAdmin_caContent_bgImage").hide();

        if (bground == 'color') {
            $("#moduleAdmin_caContent_bgColor").show();
            $("#moduleAdmin_caContent_overlay_control").hide();
            $("#moduleAdmin_caContent_overlay").hide();
        } else {
            $("#moduleAdmin_caContent_bgColor").hide();
            $("#moduleAdmin_caContent_overlay_control").show();
            showOverlaySetting();
        }

        if (bground == 'video')
             $("#moduleAdmin_caContent_bgVedio").show();
        else $("#moduleAdmin_caContent_bgVedio").hide();
    }
    change_bground();
    $("#bground").change(change_bground);
</script>
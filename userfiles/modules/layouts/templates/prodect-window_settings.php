<?php


$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "../../layouts/img/content_img_bg.png";

$bground = get_option('bground', $params['id']); // image|color|video|false
$bground = $bground ? $bground : 'image';


?>


<div class="moduleAdmin-caMedia module-live-edit-settings">

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
       
    </div>
    <div id="moduleAdmin_caHeader_bgColor" style="display:none;">
       <module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />
    </div>



</div>
<script>
    // 显示遮罩层设置
 

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
           
        }
    }
    change_bground();
    $("#bground").change(change_bground);
</script>
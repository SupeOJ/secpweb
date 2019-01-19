<?php
$ifmUrl = get_option('ifmUrl', $params['id']); // http://...|false
$ifmUrl = $ifmUrl ? $ifmUrl : "";

$width = get_option('width', $params['id']); // http://...|false
$width = $width ? $width : "100";

$height = get_option('height', $params['id']); // http://...|false
$height = $height ? $height : "968";
?>
<div class="moduleAdmin-caMedia module-live-edit-settings">
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">iframe链接</label>
        <input type="text" name="ifmUrl" class="mw_option_field mw-ui-field w100" value="<?php print $ifmUrl; ?>" placeholder="请输入链接" />
    </div>
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">宽度</label>
            <input type="number" name="width" value="<?php print $width; ?>" class="mw_option_field mw-ui-field"/>&nbsp;%
    </div>
    <div class="mw-ui-field-holder">
        <label class="mw-ui-label">高度</label>
             <input type="number" name="height" value="<?php print $height; ?>" class="mw_option_field mw-ui-field" />&nbsp;px
    </div>
</div>
<script>

</script>
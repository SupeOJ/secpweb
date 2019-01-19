
<?php 

$iframe = get_option('iframe',$params['id']);
$iframe = $iframe == false ? 'n' : $iframe;
//var_dump($iframe);exit;
$is_default = get_option('is_default',$params['id']);
$is_default = $is_default == false ? 'false' : $is_default;

if($iframe != 'n'){

    $obj = json_decode($iframe)[0];
    if($obj){
        $arr = object_to_array($obj);
        if($is_default == 'false') {
            $index_html = isset($arr['index.html']) && $arr['index.html'] ? $arr['index.html'] : reset($arr);
        }else{
            $index_html = $is_default;
        }


    }else{
         $index_html = $iframe;
    }



}


/**
 * 对象 转 数组
 *
 * @param object $obj 对象
 * @return array
 */
function object_to_array($obj) {
    $obj = (array)$obj;
    foreach ($obj as $k => $v) {
        if (gettype($v) == 'resource') {
            return;
        }
        if (gettype($v) == 'object' || gettype($v) == 'array') {
            $obj[$k] = (array)object_to_array($v);
        }
    }
 
    return $obj;
}




//exit;

?>
<?php if($iframe !='n') :?>
<?php if($obj) :?>
<div class="module-upload-zip module-live-edit-settings">
     <div class="mw-ui-field-holder">
        <label class="mw-ui-label">默认显示页面</label>
        <select class="mw-ui-field mw_option_field w100" id="is_default" name="is_default">
        <?php if($iframe!='n') :?>
            
            <?php foreach($arr as $k=>$v) :?>
                <option <?php if($is_default==$v || $index_html ==$v){ print 'selected'; } ?> value="<?php print $v; ?>"><?php print $k; ?></option>
            <?php endforeach; ?>

        <?php endif; ?>    
        </select>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
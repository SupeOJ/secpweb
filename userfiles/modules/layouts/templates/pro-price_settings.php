<?php 
only_admin_access();
$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showBigTitle = get_option('showBigTitle', $params['id']); 
$showBigTitle = $showBigTitle === false ? 'y' : $showBigTitle;

$showSign1 = get_option('showSign1', $params['id']); 
$showSign1 = $showSign1 === false ? 'y' : $showSign1;
$showSign2 = get_option('showSign2', $params['id']); 
$showSign2 = $showSign2 === false ? 'y' : $showSign2;
$showSign3 = get_option('showSign3', $params['id']); 
$showSign3 = $showSign3 === false ? 'y' : $showSign3;
$showSign4 = get_option('showSign4', $params['id']); 
$showSign4 = $showSign4 === false ? 'y' : $showSign4;

$signColor = get_option('signColor', $params['id']); 
$signColor = $signColor ?  $signColor : "#28262b";

$column = get_option('column', $params['id']); // 1|2|3|4|false
$column = $column ? $column : '4';

$pricebgColor = get_option('pricebgColor', $params['id']); // color|false
$pricebgColor = $pricebgColor ? $pricebgColor : "#c0a375";

$pribgColor = get_option('pribgColor', $params['id']); // color|false
$pribgColor = $pribgColor ? $pribgColor : "#424c50";

$butColor = get_option('butColor', $params['id']); // color|false
$butColor = $butColor ? $butColor : "none";

?>
<div class="moduleAdmin-caContent module-live-edit-settings">
    <div class="mw-ui-row-nodrop">
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
        <div id="moduleAdmin_caHeader_bgColor">
          <module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />
        </div>

    </div>
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
                <div class="mw-ui-field-holder"><div style="float:left;width: 105px;line-height: 35px;">显示列数</div>
         <select class="mw-ui-field mw_option_field w100" name="column">
            <option <?php if($column=='2'){ print 'selected'; } ?> value="2">2列</option>
            <option <?php if($column=='3'){ print 'selected'; } ?> value="3">3列</option>
            <option <?php if($column=='4'){ print 'selected'; } ?> value="4">4列</option>
         </select>
        </div>
    </div>
    </div>

    <div class="mw-ui-row-nodrop"><span style="line-height: 3;">显示小标志</span>
        <div class="mw-ui-col">
                <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
      
                    <input type="checkbox" name="showSign1" value="y" class="mw_option_field" <?php if($showSign1=='y'){ print 'checked="checked"';} ?> />
                    <span></span>
                    <span> 第1列</span>
                    </label>
                </div>
            </div>
            </div>
     <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                    <input type="checkbox" name="showSign2" value="y" class="mw_option_field" <?php if($showSign2=='y'){ print 'checked="checked"';} ?> />
                    <span></span>
                    <span> 第2列</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                    <input type="checkbox" name="showSign3" value="y" class="mw_option_field" <?php if($showSign3=='y'){ print 'checked="checked"';} ?> />
                    <span></span>
                    <span> 第3列</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                    <input type="checkbox" name="showSign4" value="y" class="mw_option_field" <?php if($showSign4=='y'){ print 'checked="checked"';} ?> />
                    <span></span>
                    <span> 第4列</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="mw-ui-row-nodrop">
      <div class="mw-ui-col">
                <div class="mw-ui-field-holder"><div style="float:left;width: 105px;line-height: 35px;">小标志背景颜色</div>
        <select class="mw-ui-field mw_option_field w100" name="signColor">
            <option <?php if($signColor=='12'){ print 'selected'; } ?> value="12">黑色</option>
            <option <?php if($signColor=='1'){ print 'selected'; } ?> value="1">灰色</option>
            <option <?php if($signColor=='2'){ print 'selected'; } ?> value="2">水色</option>
            <option <?php if($signColor=='3'){ print 'selected'; } ?> value="3">秋色</option>
            <option <?php if($signColor=='4'){ print 'selected'; } ?> value="4">驼色</option>
            <option <?php if($signColor=='5'){ print 'selected'; } ?> value="5">碳黑</option>
            <option <?php if($signColor=='11'){ print 'selected'; } ?> value="11">黝黑</option>
            <option <?php if($signColor=='6'){ print 'selected'; } ?> value="6">鸦青</option>
            <option <?php if($signColor=='7'){ print 'selected'; } ?> value="7">竹青</option>
            <option <?php if($signColor=='8'){ print 'selected'; } ?> value="8">黛蓝</option>
            <option <?php if($signColor=='9'){ print 'selected'; } ?> value="9">靛蓝</option>
            <option <?php if($signColor=='10'){ print 'selected'; } ?> value="10">枯黄</option>
            <option <?php if($signColor=='13'){ print 'selected'; } ?> value="13">深藏青色</option>
        </select>
       </div>
       </div>
    </div>

    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
                <div class="mw-ui-field-holder"><div style="float:left;width: 105px;line-height: 35px;">上显示框颜色</div>
        <select class="mw-ui-field mw_option_field w100" name="pricebgColor">
            <option <?php if($pricebgColor=='1'){ print 'selected'; } ?> value="1">灰色</option>
            <option <?php if($pricebgColor=='2'){ print 'selected'; } ?> value="2">水色</option>
            <option <?php if($pricebgColor=='3'){ print 'selected'; } ?> value="3">秋色</option>
            <option <?php if($pricebgColor=='4'){ print 'selected'; } ?> value="4">驼色</option>
            <option <?php if($pricebgColor=='5'){ print 'selected'; } ?> value="5">碳黑</option>
            <option <?php if($pricebgColor=='11'){ print 'selected'; } ?> value="11">黝黑</option>
            <option <?php if($pricebgColor=='6'){ print 'selected'; } ?> value="6">鸦青</option>
            <option <?php if($pricebgColor=='7'){ print 'selected'; } ?> value="7">竹青</option>
            <option <?php if($pricebgColor=='8'){ print 'selected'; } ?> value="8">黛蓝</option>
            <option <?php if($pricebgColor=='9'){ print 'selected'; } ?> value="9">靛蓝</option>
            <option <?php if($pricebgColor=='10'){ print 'selected'; } ?> value="10">枯黄</option>
        </select>
        </div>
        </div>
    </div>

    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
                <div class="mw-ui-field-holder"><div style="float:left;width: 105px;line-height: 35px;">下显示框颜色</div>
        <select class="mw-ui-field mw_option_field w100" name="pribgColor">
            <option <?php if($pribgColor=='1'){ print 'selected'; } ?> value="1">灰色</option>
            <option <?php if($pribgColor=='2'){ print 'selected'; } ?> value="2">水色</option>
            <option <?php if($pribgColor=='3'){ print 'selected'; } ?> value="3">秋色</option>
            <option <?php if($pribgColor=='4'){ print 'selected'; } ?> value="4">驼色</option>
            <option <?php if($pribgColor=='5'){ print 'selected'; } ?> value="5">碳黑</option>
            <option <?php if($pribgColor=='11'){ print 'selected'; } ?> value="11">黝黑</option>
            <option <?php if($pribgColor=='6'){ print 'selected'; } ?> value="6">鸦青</option>
            <option <?php if($pribgColor=='7'){ print 'selected'; } ?> value="7">竹青</option>
            <option <?php if($pribgColor=='8'){ print 'selected'; } ?> value="8">黛蓝</option>
            <option <?php if($pribgColor=='9'){ print 'selected'; } ?> value="9">靛蓝</option>
            <option <?php if($pribgColor=='10'){ print 'selected'; } ?> value="10">枯黄</option>
        </select>
        </div>
        </div>
    </div>
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col">
        <div class="mw-ui-field-holder"><div style="float:left;width: 105px;line-height: 35px;">按钮颜色</div>
        <select class="mw-ui-field mw_option_field w100" name="butColor">
            <option <?php if($butColor=='14'){ print 'selected'; } ?> value="14">none</option>
            <option <?php if($butColor=='12'){ print 'selected'; } ?> value="12">黑色</option>
            <option <?php if($butColor=='1'){ print 'selected'; } ?> value="1">灰色</option>
            <option <?php if($butColor=='2'){ print 'selected'; } ?> value="2">水色</option>
            <option <?php if($butColor=='3'){ print 'selected'; } ?> value="3">秋色</option>
            <option <?php if($butColor=='4'){ print 'selected'; } ?> value="4">驼色</option>
            <option <?php if($butColor=='5'){ print 'selected'; } ?> value="5">碳黑</option>
            <option <?php if($butColor=='11'){ print 'selected'; } ?> value="11">黝黑</option>
            <option <?php if($butColor=='6'){ print 'selected'; } ?> value="6">鸦青</option>
            <option <?php if($butColor=='7'){ print 'selected'; } ?> value="7">竹青</option>
            <option <?php if($butColor=='8'){ print 'selected'; } ?> value="8">黛蓝</option>
            <option <?php if($butColor=='9'){ print 'selected'; } ?> value="9">靛蓝</option>
            <option <?php if($butColor=='10'){ print 'selected'; } ?> value="10">枯黄</option>
            <option <?php if($butColor=='13'){ print 'selected'; } ?> value="13">深藏青色</option>
        </select>
        </div> 
    </div> 
    </div>
</div>
<?php

$form_fields_from_template = template_dir() . 'modules/shop/payments/gateways/lib/omnipay/cc_form_fields.php';
//dd($form_fields_from_template);
if (is_file($form_fields_from_template)) {

    include($form_fields_from_template);
    return;
}

?>


<div class="form-group">
    <label class="control-label">
        <?php _e("First Name"); ?>
    </label>
    <input name="cc_first_name" type="text" class="form-control" value=""/>
</div>
<div class="form-group">
    <label class="control-label">
        <?php _e("Last Name"); ?>
    </label>
    <input name="cc_last_name" type="text" class="form-control" value=""/>
</div>
<div class="form-group">
    <label class="control-label">
        信用卡
    </label>
    <select name="cc_type" class="form-control">
        <option value="Visa" selected>
            <?php _e("Visa"); ?>
        </option>
        <option value="MasterCard">
            <?php _e("MasterCard"); ?>
        </option>
        <option value="Discover">
            <?php _e("Discover"); ?>
        </option>
        <option value="Amex">
            <?php _e("American Express"); ?>
        </option>
    </select>
</div>
<div class="form-group">
    <label class="control-label">
        信用卡账号
    </label>
    <input name="cc_number" type="text" value="" class="form-control"/>
</div>
<div class="form-group">
    <label class="control-label">
        截止日期
    </label>
    <div class="row m-t-0">
        <div class="col-xs-6">
            <input name="cc_month" class="form-control" placeholder="月份" type="text" value="" class="form-control"/>
        </div>
        <div class="col-xs-6">
            <input name="cc_year" class="form-control" placeholder="年份" type="text" value="" class="form-control"/>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label">
       验证码
    </label>
    <input name="cc_verification_value" type="text" value="" class="form-control"/>
    <div class="cc_process_error"></div>
</div>
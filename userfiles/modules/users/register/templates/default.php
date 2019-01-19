<?php

/*

type: layout

name: Default

description: Default register template

*/

?>
<script type="text/javascript">
    mw.moduleCSS("<?php print modules_url(); ?>users/users_modules.css");
    mw.require('forms.js', true);
    mw.require('url.js', true);
    $(document).ready(function () {
        mw.$('#user_registration_form_holder').submit(function () {
            mw.form.post(mw.$('#user_registration_form_holder'), '<?php print site_url('api') ?>/user_register', function () {
                mw.response('#register_form_holder', this);
                if (typeof this.success !== 'undefined') {
                    mw.form.post(mw.$('#user_registration_form_holder'), '<?php print site_url('api') ?>/user_login', function () {
                        mw.load_module('users/login', '#<?php print $params['id'] ?>');
                        window.location.href = window.location.href;
                    });
                }
            });
            return false;
        });
    });
</script>
<style>
 .form-control{
	 width:100%;
	 height:46px;
	 font-size: 16px;
	 border: 1px solid #e6e6e6;
	 border-radius: 3px;
    background-color: #fff;
    outline: 0;
    cursor: text;
	padding: 9px;
 }
 .form-control:focus {
    box-shadow: inset 0 0 2px -1px rgba(0,0,0,.5);
    -webkit-box-shadow: inset 0 0 3px -1px rgba(0,0,0,.5);
	}
	.form-control:focus, .form-control:hover {
		border-color: #cdcdcd;
	}
 .btn-default{
	display: inline-block;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 9px 12px;
    height: 46px;
    cursor: pointer;
    background-color: #FFF;
    border: 1px solid #e5e5e5;
    text-align: center;
    position: relative;
    border-radius: 3px;
    text-decoration: none;
    font-size: 16px;
    color: #212121;
    padding: 10px 20px;
    line-height: 23px;
 }
 .btn-default.active:hover, .btn-default:active {
    box-shadow: inset 0 0 3px rgba(0,0,0,.2);
    background-color: #fafafa;
}
 .pull-login{display:inline;}
 .pull-register{display:none;}
</style>
<div class="module-register well">
    <div class="box-head">
        <h2>
            注册
        </h2>
    </div>
    <div id="register_form_holder">
        <form id="user_registration_form_holder" method="post" class="reg-form-clearfix">

            <?php print csrf_form(); ?>


            <div class="control-group form-group">
                <div class="controls">
                    <input type="text" class="large-field form-control" name="email" placeholder="<?php _e("Email"); ?>">
                </div>
            </div>

            <?php if ($form_show_first_name): ?>
                <div class="control-group form-group">
                    <div class="controls">
                        <input type="text" class="large-field form-control" name="first_name" placeholder="<?php _e("First name"); ?>">
                    </div>
                </div>

            <?php endif; ?>

            <?php if ($form_show_last_name): ?>
                <div class="control-group form-group">
                    <div class="controls">
                        <input type="text" class="large-field form-control" name="last_name" placeholder="<?php _e("Last name"); ?>">
                    </div>
                </div>

            <?php endif; ?>

            <div class="control-group form-group">
                <div class="controls">
                    <input type="password" class="large-field form-control" name="password" placeholder="<?php _e("Password"); ?>">
                </div>
            </div>

            <?php if ($form_show_password_confirmation): ?>
                <div class="control-group form-group">
                    <div class="controls">
                        <input type="password" class="large-field form-control" name="password2" placeholder="<?php _e("Repeat password"); ?>">
                    </div>
                </div>
            <?php endif; ?>


            <div class="mw-ui-row vertical-middle captcha-row">
                <div class="mw-ui-col">
                    <module type="captcha"/>
                </div>
            </div>
            <button type="submit" class="btn btn-default pull-right"><?php print _e($form_btn_title); ?></button>
            <div style="clear: both"></div>
        </form>

    </div>
</div>

<div id="form-holder{rand}">
  <form id="user_forgot_password_form{rand}" method="post" class="clearfix">
    <div class="mw-ui-field-holder">
        <input type="text" class="mw-ui-field mw-ui-field-big"  name="username" placeholder="输入用户名或邮箱">
    </div>
    <div class="mw-ui-field-holder">
          <div class="mw-ui-field w100">
              <img class="mw-captcha-img" src="<?php print api_link('captcha') ?>" onclick="mw.tools.refresh_image(this);" />
              <input type="text" placeholder="验证码" class="mw-ui-invisible-field" name="captcha">
          </div>
    </div>
    <div class="mw-ui-field-holder">
        <button type="submit" id="submit" class="mw-ui-btn pull-right"><?php print $form_btn_title; ?></button>
    </div>
  </form>
  <div class="alert" style="margin: 0;display: none;"></div>
</div>
<?php

/*

type: layout

name: Login admin

description: Admin login style

*/

?>
<?php $user = user_id(); ?>
<?php

$selected_lang = 'en';

if (isset($_COOKIE['lang'])) {
    $selected_lang = $_COOKIE['lang'];


}

$current_lang = current_lang();



?>
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="http://172.16.5.16/secpcms/userfiles/modules/users/login/templates/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="http://172.16.5.16/secpcms/userfiles/modules/users/login/templates/css/index.css"/>
<div id="mw-login">
    <script>mw.require("tools.js");</script>
    <script>mw.require("session.js");</script>
    <script>

        mw.session.checkPauseExplicitly = true;

        $(document).ready(function () {
            mw.tools.dropdown();

            mw.session.checkPause = true;

            mw.$("#lang_selector").bind("change", function () {
                mw.cookie.set("lang", $(this).getDropdownValue());
            });

        });


    </script>
    <style type="text/css">
        body {
            background: #F4F4F4;
        }
        body {
		font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',微软雅黑,"Helvetica Neue",Helvetica,Arial,sans-serif;
		font-size: 14px;
		line-height: 1.42857143;
		color: #333;
		background-color: #fff;
	}

	input:-webkit-autofill {
	-webkit-box-shadow: 0 0 0px 1000px #fff inset !important;
	-webkit-text-fill-color: rgba(0,0,0,1)!important;
	/* background-color:#fff; */
	}


        .mw-ui-col.main-bar-column {
            display: none;
        }

        .main-admin-row {
            max-width: none;
        }


		/* .pull-reg{left:42px;} */
		/* .pull-register{display:inline;} */
        .pull-login{display:none;}



		#mw-login{
			width: 100%;
			padding-top:0px;	
		}
        .mw-ui-box-content{
         width:0px;height:0px;
        }





        .form-control:focus {
	border-color:rgba(0,164,255);

    outline: 0;
    -webkit-box-shadow: inset 0 0px 5px rgba(0,164,255,.35), 0 0 8px rgba(0,164,255,.35);
    box-shadow: inset 0 0px 5px rgba(0,164,255,.35), 0 0 8px rgba(0,164,255,.35);
}

#loginshow .container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}



#loginshow .etc-form-controls {
    margin-top: 80px;
    width: 84%;
    margin-left: 30px;
    margin-bottom: 26px;
}
#loginshow .etc-form-controlss {
    margin-top: 25px;
    width: 84%;
    margin-left: 30px;
}




#loginshow .mw-ui-field-holder {
    
    padding:0;
    position: relative;
    clear: both;
}

#loginshow .mw-ui-field-holder:nth-of-type(2) {
    margin-top:25px;
}

#loginshow .etc-label{
    float: right;
    font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',å¾®è½¯é›…é»‘,"Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    margin-top: 35px;
    color: #828384;
    margin-bottom:13px;
    text-align:right;
}

#loginshow .marginRight{
    margin-right: -46px;

}



#loginshow .btns {

    width: 100%;
    margin-left: 1px;
    height: 42px;
    font-size: 14px;
    border: none;
	display:inline-block;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    color: #fff;
	text-align:center;
	line-height:42px;
	background-color:#00A4FF;
}

#loginshow .btns:hover {
    width: 100%;
    margin-left: 1px;
    height: 42px;
    font-size: 14px;
    border: none;
	background-color:#00A4FF;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    color: #fff;
}



a:hover, a:focus {
    color: #00A4FF;
    font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',å¾®è½¯é›…é»‘,"Helvetica Neue",Helvetica,Arial,sans-serif;
    text-decoration: underline;
}




#loginshow .etc-active {
    color: #00A4FF;
    text-decoration: none !important;
}


.etc-bos {
    border-radius: 4px !important;
    background: none;
    padding-left: 33px;
    color: #323232;
}


#mw-login .mw-ui-box {
    box-shadow: none;
    -webkit-box-shadow: none;
    border:0px;
} 
#loginshow .mw-ui-box {
    border: 0px;

}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: #00A4FF;
    background-color: transparent;
}
    </style>
    <?php

    if (!isset(mw()->ui->admin_logo_login_link) or mw()->ui->admin_logo_login_link == false) {
		
        $link = "https://microweber.com";

    } else {
        $link = mw()->ui->admin_logo_login_link;
    }
    ?>
    <div class="mw-ui-box" >
    <div class="container">
    <div class="col-sm-6 col-md-4 col-lg-12 etc-col-lg-12"  id="loginshow" >
				<nav class="navbar navbar-default" style="margin-top: 48px;">
					<div class="container-fluid">
					    <div class="navbar-header">
					      <a class="navbar-brand etc-brand" href="#" style="padding: 15px 0px !important;"><img src="http://172.16.5.16/secpcms/userfiles/modules/users/login/templates//img/img_font.png"></a>
					      <ul class="nav navbar-nav navbar-right etc-b etcbb">
					        <li><a href="#">首页</a></li>
					        <li class="etc-li">|</li>
					        <li><a href="#">帮助</a></li>
					      </ul>
					    </div>
					
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					     
					      <ul class="nav navbar-nav navbar-right etc-b">
					        <li><a href="#">首页</a></li>
					        <li class="etc-li">|</li>
					        <li><a href="#">帮助</a></li>
					      </ul>
					    </div>
					</div>
				</nav>
				
				<div class="col-sm-6 col-md-4 col-lg-8 etc-col-lg-12">
					<img src="http://172.16.5.16/secpcms/userfiles/modules/users/login/templates/img/img_login.png" style="width: 100%;"/>
				</div>
			<div class="col-sm-6 col-md-4 col-lg-4 etc-col-lg-12" style="height: 495px;
    background: #fff;
    border: 1px solid #E5E5E5;
    box-shadow: 0px 0px 0px #000, 0px 0px 0px #000, 0px 0px 0px #000, 0px 5px 5px rgba(0,0,0,0.15);">
			 <form autocomplete="on" method="post" id="user_login_<?php print $params['id'] ?>" action="<?php print api_link('user_login') ?>" class="input-group etc-form-controls">
                <div class="mw-ui-field-holder" style="position:relative;">
                    <input class="mw-ui-field mw-ui-field-big form-control etc-bos" autofocus="" tabindex="1" required name="username" type="text" placeholder="<?php _e("Username or Email"); ?>" />
<!--                     <div class="input-group etc-form-controlss">
                            <input type="password" class="form-control etc-bo-5" id="repassword" placeholder="请输入确认密码">
                        </div>  -->
                        <img src="http://172.16.5.16/secpcms/userfiles/modules/users/login/templates/img/icon_user.png" alt="" style="position:absolute;top: 15px;
    left: 11px;z-index:9;" width="16" height="16">
                </div>
                <div class="mw-ui-field-holder">
                    <input class="form-control etc-bo-5 " name="password" tabindex="2" id="exampleInputAmount" required type="password" <?php if (isset($_REQUEST['password']) != false): ?> value="<?php print $_REQUEST['password'] ?>"  <?php endif; ?> placeholder="<?php _e("Password"); ?>"/>
                </div>
                <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						     
						        <label class="etc-label marginRight">
						          	还没有账号?&nbsp;<a href="javascript:mw.load_module('users/register', '#admin_login', false, {template:'admin'});" class="etc-active mw-ui-link pull-reg pull-register">免费注册</a>
						        </label>
						    
						    </div>
						  </div>
						  <div class="form-groups">
						   <input class="btns" type="submit" tabindex="4" value="<?php _e("Login"); ?>"/>
						  </div>

            </form>
            </div>


    </div>
        <div class="mw-ui-box-content" id="admin_login" >
		
            <?php if ($user != false):?>
                <div>
                    <?php _e("Welcome"); ?>
                    <?php print user_name(); ?> </div>
                <a href="<?php print site_url() ?>">
                    <?php _e("Go to"); ?>
                    <?php print site_url() ?></a> <a href="<?php print api_link('logout') ?>">
                    <?php _e("Log Out"); ?>
                </a>
            <?php else: ?>


            <?php if (get_option('enable_user_microweber_registration', 'users') == 'y' and get_option('microweber_app_id', 'users') != false and get_option('microweber_app_secret', 'users') != false): ?>
                <?php


                ?>
            <?php endif; ?>
            <?php event_trigger('mw.ui.admin.login.form.before');  ?>


            <?php event_trigger('mw.ui.admin.login.form.after');  ?>
        </div>
    </div>
<?php endif; ?>
</div>
		<div class="container-fluid">
			<div class="etc-ca"></div>
			<p class="etc-footer">&copy; 深圳市中亚网络技术开发有限公司 | 粤ICP备11051082号-3</p>
		</div>
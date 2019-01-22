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
      $('#loginshow').hide();
</script>
<style type="text/css">

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



	#admin_login{
		padding:0px;
		width:100%;
		height:100%;
	}
	.well{
		padding:0px;
		min-height:0px;
		border:0px;
		margin-bottom:0px;
		
	}
	
	/* .form-control:focus {
    border-color: rgba(217, 81, 79, .35);
    outline: 0;
    -webkit-box-shadow: inset 0 0px 5px rgba(217, 81, 79, .35), 0 0 8px rgba(217, 81, 79, .35);
    box-shadow: inset 0 0px 5px rgba(217, 81, 79, .35), 0 0 8px rgba(217, 81, 79, .35);
} */



.form-control:focus {
	border-color:rgba(0,164,255);
    /* border-color: rgba(217, 81, 79, .35); */
    outline: 0;
    -webkit-box-shadow: inset 0 0px 5px rgba(0,164,255,.35), 0 0 8px rgba(0,164,255,.35);
    box-shadow: inset 0 0px 5px rgba(0,164,255,.35), 0 0 8px rgba(0,164,255,.35);
}

.container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}


.btns {

    width: 84%;
    margin-left: 31px;
    height: 42px;
    font-size: 14px;
    border: none;
	display:inline-block;
    /* background: #d9514f; */
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    color: #fff;
	text-align:center;
	line-height:42px;
	background-color:#00A4FF;
	cursor:pointer;
}

.btns:hover {
    width: 84%;
    margin-left: 31px;
    height: 42px;
    font-size: 14px;
    border: none;
	background-color:#00A4FF;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    color: #fff;
}








.etc-active {
    color: #00A4FF;
    text-decoration: none !important;
}


.etc-bo-1 {
    border-radius: 4px !important;
    background: none;
    padding-left: 33px;
    color: #323232;
}



#mw-login .mw-ui-box {
    box-shadow: none;
    -webkit-box-shadow: none;
}
.mw-ui-box {
    border: 0px;

}

.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: #00A4FF;
    background-color: transparent;
}
</style>
<div class="module-register well">
    <div id="register_form_holder">
			<div class="col-sm-6 col-md-4 col-lg-12 etc-col-lg-12">
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
					<img src="http://172.16.5.16/secpcms/userfiles/modules/users/login/templates//img/img_login.png" style="width: 100%;"/>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-4 etc-col-lg-12" id="users_edit_{rand}">
					<form class="form-horizontal etc-form">
						<div class="input-group etc-form-controls bb" style="position:relative;">
							<input type="text" class="form-control etc-bo-1" id="username" placeholder="用户名由字母、数字、下划线组成">
							<img src="http://172.16.5.16/secpcms/userfiles/modules/users/login/templates/img/icon_user.png" alt="" style="position:absolute;top: 15px;
    left: 11px;z-index:9;" width="16" height="16">
							
						</div>
						<div class="input-group etc-form-controlss" style="position:relative;">
							<input type="email" class="form-control etc-bo-2" id="email" placeholder="请输入邮箱">
							<img src="http://172.16.5.16/secpcms/userfiles/modules/users/login/templates/img/icon_email.png" alt="" style="position:absolute;top: 15px;
    left: 11px;z-index:9;" width="16" height="16">
						</div>
						 <div class="input-group etc-form-controlss" style="position:relative;">
							<input type="email" class="form-control etc-bo-3" id="name" placeholder="请输入姓名">
							<img src="http://172.16.5.16/secpcms/userfiles/modules/users/login/templates/img/icon_name.png" alt="" style="position:absolute;top: 15px;
    left: 11px;z-index:9;" width="16" height="16">
						</div> 
						 <div class="input-group etc-form-controlss">
							<input type="password" class="form-control etc-bo-4" id="password" placeholder="请输入密码">
						</div> 
						<div class="input-group etc-form-controlss">
							<input type="password" class="form-control etc-bo-5" id="repassword" placeholder="请输入确认密码">
						</div> 
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						        <label class="etc-label">
						          	已有账号? <a href="javascript:void(0)" onclick="location.reload()" class="etc-active ">立即登录</a>
						        </label>
						    </div>
						  </div>
						  <div class="form-groups">
						      <span   class="btns" onclick="SaveAdminUserForm()">注册</span>
						  </div>
					</form>
				</div>
				
			</div>
		
		</div>
</div>
<script type="text/javascript">
SaveAdminUserForm = function(){
    mw.tools.loading('.mw-module-admin-wrap');
    if($('#username').val()){
    	username = $('#username').val();
    }else{
    	alert('用户名不能为空！');return ;
    }
    if($('#email').val()){
    	email = $('#email').val();
    }else{
    	alert('邮箱不能为空！');return ;
    }
    if($('#password').val()){
    	password = $('#password').val();
    }else{
    	alert('密码不能为空！');return ;
    }
    if($('#password').val() === $('#repassword').val()){
    	repassword = $('#password').val();
    }else{
    	alert('两次输入密码不一致！');return ;
    }
    username = $('#username').val();
    email = $('#email').val();
    name = $('#name').val();
    password = $('#password').val();
   	$.ajax(
        {
            url: '<?php print api_link('add_user') ?>',
            type: "POST",
            dataType: "json",
            data: { username: username, email:email, name:name, password:password },
            success: function (result) {
            	if(result===true){
            			alert('添加成功！');
            			location.reload();

            	}else{
					alert("添加失败！");
				}
              },
            error: function (xhr, status, p3, p4) {
            	alert("系统错误！");
            }
        });
}
</script>

<?php 
include_once('/cas/CAS.php');

phpCAS::client(CAS_VERSION_2_0, "172.16.5.16",8080, "cas");
phpCAS::setNoCasServerValidation();

phpCAS::handleLogoutRequests();



if(isset($_REQUEST['login'])) {
    phpCAS::forceAuthentication();
    $username = phpCAS::getUser();
    $img =getUserImg($username);
    header("Location: ./");
}
if (isset($_REQUEST['logout'])) {    
    
    phpCAS::logoutWithRedirectService("http://172.16.5.16/cae");
}
//var_dump(phpCAS::checkAuthentication());exit;
if(phpCAS::checkAuthentication()) {
    $username = phpCAS::getUser();
    $img = getUserImg($username);
}

function getUserImg($username) {
    $connect = mysqli_connect('172.16.5.16','root','123456','caecp');
    $sql = "select nickname,uid from dzz_user where nickname = '$username' limit 1";
    $result = mysqli_query($connect,$sql);

    while ( $row = mysqli_fetch_assoc($result)) {
        $uid = $row['uid'];
        $img = "http://172.16.5.16/caecp/avatar.php?uid=$uid&size=small";
    }
    mysqli_close($connect);
    return  $img;   
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>企业云平台</title>
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/stimenu.css"/>
		<link rel="stylesheet" type="text/css" href="css/index1.css"/>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
	</head>
	<body>
	<div class="container-fluid" style="padding-left: 0;padding-right: 0;">
	<nav class="navbar etc-navbar" style="height: 60px;position: fixed;z-index:9;width: 100%;background: #31313B;">
	  	<div class="container">
	  		
	  		
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand etc-can" href="#" ><img src="img/img_logo.png" class="etc-index-logo"></a>
		    </div>
	    <div class="collapse navbar-collapse etc-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav can-nav">
	        <li class="active"><a href="#">产品<span class="sr-only">(current)</span></a></li>
	        <li><a href="#">云服务</a></li>
	        <li><a href="#">解决方案</a></li>
	        <li><a href="#">服务支持</a></li>
	        <li><a href="#">新闻与活动</a></li>
	      </ul>
	      
	      <ul class="nav navbar-nav navbar-right can-nav">
	        <?php if(isset($username) && $username) { ?>
            <li >
                <a><img style="width:30px;height:30px;border-radius:15px;display:inline;" src="<?php echo $img;?>"  /></a>
                <div class="etc-nav-lists">
                    <a href="http://172.16.5.16/caecp/user.php?mod=profile" target="_blank" class="etc-index-navs">账号设置</a>
                    <a href="http://172.16.5.16/caecp" target="_blank" class="etc-index-navs">管理中心</a>
                    <a href="index.php?logout" class="etc-index-navs">注销登录</a>
                </div>
            </li>	      
	        	
	       
	        
	        <?php }else{ ?>
                <li ><a href="index.php?login" >登录</a>
                <!-- <li ><a href="dologin.php" data-toggle="modal" data-target="#exampleModalCenter">登录</a> -->
                <li><a href="http://172.16.5.16/cae/html/register.html">注册</a></li>
            <?php } ?>
	      </ul>
	    </div>
	  </div>
	</nav>
	
 <!--左侧边栏-->
    <header id="top" name="top">
        <div class="left-nav" id="left-nav">
            <div class="left-nav-sons2" id="left-nav-sons2">
                <img class="Nav-left-img" src="img/icon_svip.png" alt="">
                <!--<span class="Nav-left-span">SVIP门户</span>-->
                <div class="left-nav-sons1-2">
                	<p class="etc-left-fonts">SVIP平台</p>
                    <p class="Nav-left-P">六大平台</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-1" alt=""><p>产品体验中心</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href="http://www.cab2b.com/zhanmao/Six%20platforms/huizhan/index.html" target="_blank">
                               <span class="etc-can-content-img-vip-2" alt=""><p>会议展览中心</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-3" alt=""><p>创意展示中心</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-4" alt=""><p>商贸金融中心</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">                               
                                <span class="etc-can-content-img-vip-5" alt=""><p>硅谷开放平台</p></span>
                            </a>
                       	</li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>sv超融合平台</p></span>
                            </a>
                        </li>
                    </ul>
                    <p class="Nav-left-P">电商平台</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>OEM+B2B</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>ODM+B2B</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>ODM+B2B</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>ODM+B2B</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">                               
                                <span class="etc-can-content-img-vip-6" alt=""><p>ODM+B2B</p></span>
                            </a>
                       	</li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>ODM+B2B</p></span>
                            </a>
                        </li>
                    </ul>
                    <p class="Nav-left-P">管理中心</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>主题管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>页面管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>内容管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>社区管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">                               
                                <span class="etc-can-content-img-vip-6" alt=""><p>文章管理</p></span>
                            </a>
                       	</li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>组件管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>布局管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">                               
                                <span class="etc-can-content-img-vip-6" alt=""><p>用户管理</p></span>
                            </a>
                       	</li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>门户管理</p></span>
                            </a>
                        </li>						
                    </ul>					
                    <!--<span class="Nav-left-span1">业务中心</span>
                   <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img" alt=""><p>主题管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href="#" target="right">
                                <span class="etc-can-content-img" alt=""><p>页面管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img" alt=""><p>内容管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img" alt=""><p>社区管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img" alt=""><p>文章管理</p></span>
                            </a>
                       	</li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img" alt=""><p>组件管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img" alt=""><p>布局管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img" alt=""><p>用户及权限</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img" alt=""><p>门户管理</p></span>
                            </a>
                        </li>
                    </ul>-->

                </div>
            </div>
            <div class="left-nav-sons3">
                <img class="Nav-left-img" src="img/icon_secp.png" alt="">
                <!--<span class="Nav-left-span">SECP平台</span>-->
                <div class="left-nav-sons1-3">
                	<p class="etc-left-fonts">SECP平台</p>
                    <p class="Nav-left-P">企业管理</p>
                    <ul class="boxx-img">
                        <li>
                            <a href="http://www.szyetc.com:8012/" target="_blank">
                                <span class="etc-can-content-img-ecp" alt=""><p>协同办公</p></span>
                            </a>
                        </li>
                        <li>
                           <?php if(isset($username)&&$username ) {?>
                         	<a href="http://172.16.5.16/pmstrm/www/" target="_blank">
                               <span class="etc-can-content-img-2" alt=""><p>项目管理</p></span>
                            </a>
                            <?php }else{ ?>
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                               <span class="etc-can-content-img-2" alt=""><p>项目管理</p></span>
                            </a>
                            <?php } ?>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-ecp-5" alt=""><p>客户管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://sv.cam2m.com/accounts/login/?next=/" target="_blank">
                                <span class="etc-can-content-img-ecp-4" alt=""><p>硅谷云存储</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">                               
                                <span class="etc-can-content-img-ecp-6" alt=""><p>企业建站</p></span>
                            </a>
                       	</li>
                        <li>
                            <a href="http://172.16.5.13:8553/" target="_blank">
                                <span class="etc-can-content-img-ecp-11" alt=""><p>档案管理</p></span>
                            </a>
                        </li>
                    </ul>
                    <span class="Nav-left-span1">沟通交流</span>
                     <ul class="boxx-img">
                        <li>
                            <a href="https://mail.casvip.com/" target="_blank">
                                <span class="etc-can-content-img-ecp-7" alt=""><p>企业邮箱</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href="http://bbs.caecp.cn/" target="_blank">
                               <span class="etc-can-content-img-ecp-8" alt=""><p>硅谷之家</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="http://172.16.4.4:90/web/root" target="_blank">
	                            <span class="etc-can-content-img-ecp-9" alt=""><p>在线视频</p></span>
                            </a>
                        </li>
                        <!--<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img" alt=""><p>企业邮箱</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href="#" target="right">
                               <span class="etc-can-content-img-2" alt=""><p>硅谷之家</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-3" alt=""><p>在线视频</p></span>
                            </a>
                        </li>-->
                        
                    </ul>
                    
                     <p class="Nav-left-P">知识学习</p>
                     <ul class="boxx-img">
                        <li>
                            <a href="http://exam.caecp.cn/" target="_blank">
                                <span class="etc-can-content-img-ecp-10" alt=""><p>在线考试</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href="#" target="_blank">
                               <span class="etc-can-content-img-ecp-11" alt=""><p>在线学习</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>云笔记</p></span>
                            </a>
                        </li>						
                        <!--<li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-3" alt=""><p>在线视频</p></span>
                            </a>
                        </li>-->
                        
                    </ul>
                    
                </div>
            </div>
            <div class="left-nav-sons4">
                <img class="Nav-left-img" src="img/icon_sm2m.png" alt="">
                <!--<span class="Nav-left-span">SM2M终端</span>-->
                <div class="left-nav-sons1-4">
                	<p class="etc-left-fonts">SM2M终端</p>
                    <p class="Nav-left-P">终端管理</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>硅谷工业云</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>硅谷云电脑</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>硅谷云存储</p></span>
                            </a>
                        </li>						
                    </ul>
                    <p class="Nav-left-P">管理中心</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>用户管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>资源池管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>安全管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>策略配置</p></span>
                            </a>
                        </li>	
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>数据管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>快照管理</p></span>
                            </a>
                        </li>
     					
                    </ul>
					
                </div>
            </div>
            <div class="left-nav-sons5">
                <img src="img/icon_somo.png" alt="" class="etc-somo" style="padding-top: 16px;">
                <!--<span class="Nav-left-span">SOMO脑库</span>-->
                <div class="left-nav-sons1-5">
                	<p class="etc-left-fonts">SOMO脑库</p>
                    <p class="Nav-left-P">决策中心</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>硅谷数据中心</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>硅谷决策中心</p></span>
                            </a>
                        </li>
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>硅谷智慧园区</p></span>
                            </a>
                        </li>
					
                    </ul>					
                    <p class="Nav-left-P">应用中心</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>品牌识别</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>数字营销分析</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>云数据分析</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>用户数据分析</p></span>
                            </a>
                        </li>						
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>IT服务部署</p></span>
                            </a>
                        </li>	
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>社交数据分析</p></span>
                            </a>
                        </li>
						
                    </ul>

                </div>
            </div>
            <div class="left-nav-sons6">
                <img src="img/icon_merp.png" alt="" class="etc-somo" style="padding-top: 15px;">
                <!--<span class="Nav-left-span">资源中心</span>-->
                <div class="left-nav-sons1-6">
                	<p class="etc-left-fonts">MERP计划</p>
                     <p class="Nav-left-P">供应链管理</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>财务管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>客户管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>人事管理</p></span>
                            </a>
                        </li>
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>订单管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>资产管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>质量管理</p></span>
                            </a>
                        </li>	
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>供应链管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>物流管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>采购管理</p></span>
                            </a>
                        </li>						
                    </ul>
					
                     <p class="Nav-left-P">管理中心</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>产品研发</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>生产计划</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>仓库管理</p></span>
                            </a>
                        </li>
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>品牌管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>销售管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>交易管理</p></span>
                            </a>
                        </li>	
					
                    </ul>					
                </div>
            </div>
            
            <div class="left-nav-sons8">
                <img src="img/icon_marketing.png" alt="" class="etc-somo" style="padding-top: 15px;">
                <!--<span class="Nav-left-span">SCRM<br/>营销</span>-->
                <div class="left-nav-sons1-8">
                	<p class="etc-left-fonts">SCRM营销</p>
                     <p class="Nav-left-P">管理中心</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>产品管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>客户管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>业务管理</p></span>
                            </a>
                        </li>
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>支付管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>积分管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>营销管理</p></span>
                            </a>
                        </li>	
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>活动管理</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>交易管理</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>品牌管理</p></span>
                            </a>
                        </li>						
                    </ul>
                </div>
            </div>
            
              <div class="left-nav-sons9">
                <img src="img/icon_resource.png" alt="" class="etc-somo" style="padding-top: 15px;">
                <!--<span class="Nav-left-span">资源<br/>中心</span>-->
                <div class="left-nav-sons1-9">
                	<p class="etc-left-fonts">资源中心</p>
                    <p class="Nav-left-P">客户端下载</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>务联通</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>硅谷云存储</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>中亚语音</p></span>
                            </a>
                        </li>
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>SV云终端</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>中亚浏览器</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>办公大师</p></span>
                            </a>
                        </li>	
						
                    </ul>					

                    <p class="Nav-left-P">资源下载</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>PPT资源</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>图库资源</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>应用资源</p></span>
                            </a>
                        </li>
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>模板资源</p></span>
                            </a>
                        </li>

                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>视频资源</p></span>
                            </a>
                        </li>	
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>源代码资源</p></span>
                            </a>
                        </li>
                    </ul>						
                </div>
            </div>
            
            <div class="left-nav-sons10">
                <img src="img/icon_ sociality.png" alt="" class="etc-somo" style="padding-top: 15px;">
                <!--<span class="Nav-left-span" style="bottom:16px;">社交</span>-->
                <div class="left-nav-sons1-10">
                	<p class="etc-left-fonts">硅谷社交</p>
                    <p class="Nav-left-P">社交</p>
                    
                    <ul class="boxx-img">
                        <li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>硅谷社交</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>微信</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>微博</p></span>
                            </a>
                        </li>
						<li>
                            <a href="#" target="right">
                                <span class="etc-can-content-img-vip-6" alt=""><p>新闻资讯</p></span>
                            </a>
                        </li>
                        <li>
                         	<a href=#" target="_blank">
                               <span class="etc-can-content-img-vip-6" alt=""><p>营销活动</p></span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>合作伙伴</p></span>
                            </a>
                        </li>	
                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>商业计划</p></span>
                            </a>
                        </li>
						                        <li>
                            <a href="#" target="right">
	                            <span class="etc-can-content-img-vip-6" alt=""><p>关于我们</p></span>
                            </a>
                        </li>
                    </ul>
				</div>
            </div>
            
        </div>
         </div>

        <!--左侧边栏按钮-->
        <button class="left-nav-button" id="left-nav-1"></button>
    </header>
	

<!--登录弹框-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width:500px;">
      <div class="modal-header etc-can-modal-header">
        <p class="etc-can-modal-header-p"><img src="img/img_logo.png" /></p>
      </div>
      <div class="modal-body">
			<p style="text-align:center;padding:10px;">你还未登录，请先登录后重试！</p>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>

<!--banner图-->
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	  </ol>
	
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="img/banner.png" alt="...">
	      <div class="carousel-caption">
	       
	      </div>
	    </div>
	    <div class="item">
	      <img src="img/home_banner_2.png" alt="...">
	      <div class="carousel-caption">
	       
	      </div>
	    </div>
	 <div class="item">
	      <img src="img/home_banner_3.png" alt="...">
	      <div class="carousel-caption">
	       
	      </div>
	    </div>
	  </div>
	
	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
<!--banner图结束-->

<!--产品优势-->
 	<div class="container-fluid etc-can-prodect">
 		<div class="container">
 			<p class="can-proder-center">产品优势</p>
 		<div class="row">
	 		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail">
		          <div class="caption">
		            <h3>
		                <a href="#" class="etc-can-proderct-title">高速传输</a>
		            </h3>
		            <p class="etc-can-img"><img src="img/home_icon_transfer.png"></p>
		            <p class="etc-can-p">利用高速化的互联网传输能力，大数据垂直优化为软件开发商搭建一个高效、灵活、免费的访问体验</p>
		          </div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail">
		          <div class="caption">
		            <h3>
		                <a href="#" class="etc-can-proderct-title">持续稳定</a>
		            </h3>
		            <p class="etc-can-img"><img src="img/home_icon_safe.png"></p>
		            <p class="etc-can-p">通过多级可靠性架构，保障数据持久性达到行业前几，业务连续性高达99.99%</p>

		          </div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail">
		          <div class="caption">
		            <h3>
		                <a href="#" class="etc-can-proderct-title">智能计算</a>
		            </h3>
		            <p class="etc-can-img"><img src="img/home_icon_calculate.png"></p>
		            <p class="etc-can-p">智能分配计算资源，满足各种企业提供高效、安全、稳定的一站式专业级软件应用服务</p>
		          </div>
		        </div>
	      	</div>
 			</div>
 		</div>
 	</div>
<!--产品优势结束-->

<!--产品架构-->
 	<div class="container-fluid etc-can-prodects">
 		<div class="container etc-can-container">
 			<p class="can-proder-center">产品架构</p>
 			
 			<div class="etc-can-contant">
 				<p class="etc-p">以云桌面为标准平台、以云储存为安全空间、以应用工具为增值支撑</p>
 				<p class="etc-ps">以管理系统为价值核心、以行业解决方案为升华、以社交沟通全方位协同</p>
 			</div>
 			
 		<div class="row">
	 		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="img/icon_bi.png"></p>
		            <p class="etc-can-proderct-title">商业智慧BI</p>
		            <p class="etc-money"><span class="etc-gou">财务主题分析</span>|<span class="etc-gou">预算主题分析</span></p>
		            <p class="etc-money"><span class="etc-gou">成本主题分析</span>|<span class="etc-gou">生产主题分析</span>|<span class="etc-gou">销售主题分析</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">采购主题分析</span>|<span class="etc-gou">人力主题分析</span>|<span class="etc-gou">库存主题分析</span></p>
		          </div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="img/icon_erp.png"></p>
		            <p class="etc-can-proderct-title">企业资源计划ERP</p>
		            <p class="etc-money"><span class="etc-gou">全面质量管理</span>|<span class="etc-gou">全面成本管理</span></p>
		            <p class="etc-money"><span class="etc-gou">销售生产和采购</span>|<span class="etc-gou">全面预算管理</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">财务管理</span>|<span class="etc-gou">设备管理</span>|<span class="etc-gou">库存管理</span></p>
		          </div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="img/icon_pm.png"></p>
		            <p class="etc-can-proderct-title">项目管理PM</p>
		            <p class="etc-money"><span class="etc-gou">发布和执行控制</span>|<span class="etc-gou">沟通协作和信息共享</span></p>
		            <p class="etc-money"><span class="etc-gou">资源挑拨和冲突预警</span>|<span class="etc-gou">风险识别和问题跟踪</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">报告工时</span>|<span class="etc-gou">项目计划跟编制</span>|<span class="etc-gou">质量评审和问题跟踪</span></p>
		          </div>
		        </div>
	      	</div>
	      	<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="img/icon_spm.png"></p>
		            <p class="etc-can-proderct-title">战略绩效SPM</p>
		            <p class="etc-money"><span class="etc-gou">战略分析与制定</span>|<span class="etc-gou">战略执行与监控</span></p>
		            <p class="etc-money"><span class="etc-gou">战略回顾与评估</span>|<span class="etc-gou">绩效目标确定与分析</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">绩效实施与监控</span>|<span class="etc-gou">绩效考核</span>|<span class="etc-gou">绩效沟通与改进</span></p>
		          </div>
		        </div>
	      	</div>
	      	
	      	<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="img/icon_bc.png"></p>
		            <p class="etc-can-proderct-title">电子商务BC</p>
		            <p class="etc-money"><span class="etc-gou">网上商店</span>|<span class="etc-gou">移动商务</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">客户门户</span>|<span class="etc-gou">供应商门户</span></p>
		          </div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="img/icon_crm.png"></p>
		            <p class="etc-can-proderct-title">客户关系CRM</p>
		            <p class="etc-money"><span class="etc-gou">客户管理</span>|<span class="etc-gou">商机管理</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">市场管理</span>|<span class="etc-gou">服务管理</span></p>
		          </div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="img/icon_hrm.png">
		            	<!--<div class="etc-momney-img"></div>-->
		            </p>
		            <p class="etc-can-proderct-title">人力资源HRM</p>
		            <p class="etc-money"><span class="etc-gou">人事管理</span>|<span class="etc-gou">薪资管理</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">考勤管理</span>|<span class="etc-gou">绩效管理</span></p>
		          </div>
		        </div>
	      	</div>
	      	<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="img/icon_oa.png"></p>
		            <p class="etc-can-proderct-title">协同办公HRM</p>
		            <p class="etc-money"><span class="etc-gou">流程绩效</span>|<span class="etc-gou">公文管理</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">组织协同</span>|<span class="etc-gou">资源事批</span></p>
		          </div>
		        </div>
	      	</div>
	      	
	      	
 			</div>
 		</div>
 	</div>
<!--产品架构结束-->

<!--桌面-->
	<div class="container-fluid etc-can-prodect-window">
 		<div class="container">
 			<!--<p class="can-proder-center">产品优势</p>-->
 		<div class="row">
	 		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail-window">
		          	<div class="caption etc-caption">
		                <a href="#" class="etc-can-proderct-titles">企业门户Portal</a>
		          	</div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail-window">
		          	<div class="caption etc-caption">
		                <a href="#" class="etc-can-proderct-titles">云桌面Cloud Desktop</a>
		          	</div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail-window">
		          	<div class="caption etc-caption">
		                <a href="#" class="etc-can-proderct-titles">中亚云Chinaasia Cloud</a>
		          	</div>
		        </div>
	      	</div>
 			</div>
 		</div>
 	</div>
<!--桌面结束-->

<!--经营管理一体化-->
		<div class="container-fluid etc-can-prodects-messages">
 		<div class="container etc-can-container">
 			<p class="can-proder-center">经营管理一体化</p>
 			
 			<div class="etc-can-contant">
 				<p class="etc-p">我们从企业经营管理和战略相融合，深入分析企业业务运作与管理特性</p>
 				<p class="etc-ps">全面整理出信息化之经营管理模式，模式即可以独立应用也可以集成共存，让企业选择信息化更敏捷、更智慧、更幸福</p>
 			</div>
 			
 		<div class="row">
	 		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail">
		          <div class="caption">
		            <!--<h3>
		                <a href="#" class="etc-can-proderct-title">高速传输</a>
		            </h3>-->
		           
		            <p class="etc-can-p-mesage-1">以战略绩效为核心的经营管理一体化</p>
		            <p class="etc-can-p-mesage-2">以协同办公为核心的经营管理一体化</p>
		            <p class="etc-can-p-mesage-3">以项目为核心的研发生产经营管理一体化</p>
		            <p class="etc-can-p-mesage-4">以商品流通管控为核心的经营管理一体化</p>
		          </div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-6 ">
		        <div class="thumbnail etc-thumbnail-row">
		          
		          <img src="img/img_management.png" />
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail">
		          <div class="caption">
		            <p class="etc-can-p-mesage-5">以人力资源为核心的经营管理一体化</p>
		            <p class="etc-can-p-mesage-6">以协同办公为核心的经营管理一体化</p>
		            <p class="etc-can-p-mesage-7">以精细成本与利润为核心经营管理一体化</p>
		            <p class="etc-can-p-mesage-8">以电子商务为核心的经营管理一体化</p>
		          </div>
		        </div>
	      	</div>
	      	
 			</div>
 		</div>
 	</div>
<!--经营管理一体化结束-->

<!--集团化-->
<div class="container-fluid etc-can-prodects-zt">
 		<div class="container etc-can-container">
 			<p class="can-proder-center">全球首款集团化、一体化企业应用的虚拟云平台</p>
 			
 			<!--<div class="etc-can-contant">
 				<p class="etc-p">我们从企业经营管理和战略相融合，深入分析企业业务运作与管理特性</p>
 				<p class="etc-ps">全面整理出信息化之经营管理模式，模式即可以独立应用也可以集成共存，让企业选择信息化更敏捷、更智慧、更幸福</p>
 			</div>-->
 			
 		<div class="row">
	 		<div class="col-sm-6 col-md-4 col-lg-8 ">
		        <div class="thumbnail etc-thumbnails">
		          <!--<div class="caption">
		            <h3>
		                <a href="#" class="etc-can-proderct-title">高速传输</a>
		            </h3>
		            <p class="etc-can-img"><img src="img/home_icon_transfer.png"></p>
		            <p class="etc-can-p">利用高速化的互联网传输能力，大数据垂直优化为软件开发商搭建一个高效、灵活、免费的访问体验</p>
		          </div>-->
		          <img src="img/img_illustrate.png" />
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-4 ">
		        <div class="thumbnail etc-thumbnail-rows">
		          <p class="etc-can-zt-p-1">精细化管理</p>
		          <p class="etc-can-zt-p-2">产业链协同就是紧密连接客户和供应商彻底改变与客户、供应商的交易方式，从而获得更高效率、更低成本的运作与交易方式。</p>
				<div class="etc-border"></div>
		          <p class="etc-can-zt-p-3">产业链协同</p>
		          <p class="etc-can-zt-p-4">企业唯有精细化管理之后才有数据基础与产业链上下游进行基于互联网的管理、业务信息交换，才复合互联网时代所要求企业的开放性，否则就无法融入由互联网织成的业务产业链。</p>
		          <div class="etc-border"></div>
		          <p class="etc-can-zt-p-3">社会化商业</p>
		          <p class="etc-can-zt-p-4">当我们把互联网应用扩展到整个企业经营管理的方方面面，当我们把企业的数据资产从结构化的共享与处理扩展到对非结构化的共享与处理的时候；以人为中心，企业紧密连接所有员工、消费者，伙伴、聚合并有效使用产业链上下游、乃至全球互联网庞大多样的资源时、就能真正建立企业社会化的强大商业生态系统。</p>

		        </div>
	      	</div>
      		
	      	
 			</div>
 		</div>
 	</div>
<!--集团化结束-->


</div>

<footer class="footer" style="background: #31313b;">
    <div class="container">
      <div class="row footer-top">
          <div class="row about etc-can-about">
            <div class="col-sm-4">
              <h4 class="can-index-h4">| 联系我们</h4>
              <ul class="list-unstyled etc-can-ul">
                <li><a href="#">地址：深圳市沙井中亚硅谷海岸营销中心</a></li>
                <li><a href="#">邮箱：etccbw@aliyun.com</a></li>
                <li><a href="#">电话：0755-22220000</a></li>
                <li><a href="#">网址：http://www.chinaasianet.com</a></li>
              </ul>
            </div>
            <div class="col-sm-4">
              <h4 class="can-index-h4">| 友情链接</h4>
              <ul class="list-unstyled etc-can-ul">
                <li><a href="http://www.zhongyajituan.com.cn">中亚集团</a></li>
                <li><a href="http://www.casvm.com">中亚交易网</a></li>
                <li><a href="http://www.chinaasiaetc.com/Activity/Expo">中亚会展中心</a></li>
                <li><a href="http://www.chinaasiaetc.com">中亚硅谷海岸</a></li>
              </ul>
            </div>
            <div class="col-sm-4">
              <h4 class="can-index-h4">| 关注我们</h4>
              <ul class="list-unstyled">
                <li><img class="etc-can-imgs" src="img/qrcode.png"></li>
              </ul>
            </div>
          </div>
  
       </div>
    
      
    </div>
  </footer>
	<div class=" footer-bottom etc-can-footer">
        <ul class="list-inline text-center">
          <li><a href="#" class="eta-footer">&copy; 深圳市中亚网络技术开发有限公司</a></li>|<li>粤ICP备11051082号-3</li>
        </ul>
    </div>

	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
		
	<!--左侧边栏点击出现-->
<script>
    $(function () {
        $('.left-nav-button').hover(function () {
            if (!$('.left-nav').hasClass('left-nav-hidden')) {
                $('.left-nav').addClass('left-nav-hidden');
            } 
        },function(){
            $('.left-nav').removeClass('left-nav-hidden');
        })
    });

    $(function () {
        $('.left-nav').hover(function () {
            $('.left-nav').addClass('left-nav-hidden');
        },function(){
            $('.left-nav').removeClass('left-nav-hidden');
        })
    }); 

    $(function () {
        $('.left-nav-button').click(function () {
            if ($('.sons7-main').hasClass('bb')) {
                $('.sons7-main').removeClass('bb');
            }

        });

    });

</script>

<!--左侧边栏hover-->
<script>
        $(".left-nav-sons1").mouseenter(function(){
            $(".left-nav-sons1-1").css("display","block");
        });
        $(".left-nav-sons1").mouseleave(function(){
            $(".left-nav-sons1-1").css("display","none");
        });

        $(".left-nav-sons2").mouseenter(function(){
            $(".left-nav-sons1-2").css("display","block");
        });
        $(".left-nav-sons2").mouseleave(function(){
            $(".left-nav-sons1-2").css("display","none");
        });
        $(".left-nav-sons3").mouseenter(function(){
            $(".left-nav-sons1-3").css("display","block");
        });
        $(".left-nav-sons3").mouseleave(function(){
            $(".left-nav-sons1-3").css("display","none");
        });
        $(".left-nav-sons4").mouseenter(function(){
            $(".left-nav-sons1-4").css("display","block");
        });
        $(".left-nav-sons4").mouseleave(function(){
            $(".left-nav-sons1-4").css("display","none");
        });
        $(".left-nav-sons5").mouseenter(function(){
            $(".left-nav-sons1-5").css("display","block");
        });
        $(".left-nav-sons5").mouseleave(function(){
            $(".left-nav-sons1-5").css("display","none");
        });
        $(".left-nav-sons6").mouseenter(function(){
            $(".left-nav-sons1-6").css("display","block");
        });
        $(".left-nav-sons6").mouseleave(function(){
            $(".left-nav-sons1-6").css("display","none");
        });
        $(".left-nav-sons8").mouseenter(function(){
            $(".left-nav-sons1-8").css("display","block");
        });
        $(".left-nav-sons8").mouseleave(function(){
            $(".left-nav-sons1-8").css("display","none");
        });
		 $(".left-nav-sons9").mouseenter(function(){
            $(".left-nav-sons1-9").css("display","block");
        });
        $(".left-nav-sons9").mouseleave(function(){
            $(".left-nav-sons1-9").css("display","none");
        });
		$(".left-nav-sons10").mouseenter(function(){
            $(".left-nav-sons1-10").css("display","block");
        });
        $(".left-nav-sons10").mouseleave(function(){
            $(".left-nav-sons1-10").css("display","none");
        });

        $(function () {
            $('.left-nav-sons7').click(function () {
                if (!$('.sons7-main').hasClass('bb')) {
                    $('.sons7-main').addClass('bb');
                } else {
                    $('.sons7-main').removeClass('bb');
                };
                if ($('.bf1-div').hasClass('bb')) {
                    $('.bf1-div').removeClass('bb');
                }
                if ($('.bf2-div').hasClass('bb')) {
                    $('.bf2-div').removeClass('bb');
                }
                if ($('.bf3-div').hasClass('bb')) {
                    $('.bf3-div').removeClass('bb');
                }

            });

        });
        $(function () {
            $(".con").eq(0).show();
            $(".btn span").click(function(){
                var num =$(".btn span").index(this);
                $(".con").hide();
                $(".con").eq(num).show().slblings().hide();
            })
        })

        $(function () {
            $('.BF1').click(function () {
                if (!$('.bf1-div').hasClass('bb')) {
                    $('.bf1-div').addClass('bb');
                } else {
                    $('.bf1-div').removeClass('bb');
                };
                if ($('.sons7-main').hasClass('bb')) {
                    $('.sons7-main').removeClass('bb');
                }

            });
        });

        $(function () {
            $('.BF2').click(function () {
                if (!$('.bf2-div').hasClass('bb')) {
                    $('.bf2-div').addClass('bb');
                } else {
                    $('.bf2-div').removeClass('bb');
                };
                if ($('.sons7-main').hasClass('bb')) {
                    $('.sons7-main').removeClass('bb');
                }

            });

        });

        $(function () {
            $('.BF3').click(function () {
                if (!$('.bf3-div').hasClass('bb')) {
                    $('.bf3-div').addClass('bb');
                } else {
                    $('.bf3-div').removeClass('bb');
                };
                if ($('.sons7-main').hasClass('bb')) {
                    $('.sons7-main').removeClass('bb');
                }

            });

        });

        $(function () {
            $('.top-header-button').click(function () {
                if (!$('.top-header').hasClass('up')) {
                    $('.top-header').addClass('up');
                } else {
                    $('.top-header').removeClass('up');
                };

                if (!$('.under-header').hasClass('uup')) {
                    $('.under-header').addClass('uup');
                } else {
                    $('.under-header').removeClass('uup');
                };
            });
        });

        $(function () {
            $('.input-button').click(function () {
                if (!$('.input-left').hasClass('input-left-width')) {
                    $('.input-left').addClass('input-left-width');
                } else {
                    $('.input-left').removeClass('input-left-width');
                };
            });

        });


        $(".search-input-button").mouseenter(function(){
            $(".search-input").addClass("search-width");
        });
        $(".search-input-button").mouseleave(function(){
            $(".search-input").removeClass("search-width");
        });
</script>	
<script>
    window.onload = function(){
       	var current = 0;
            document.getElementById('left-nav-1').onmouseover = function(){
            current = (current+90)%360;
            this.style.transform = 'rotate('+current+'deg)';
            }
            document.getElementById('left-nav-1').onmouseout = function(){
            current = (current+90)%360;
            this.style.transform = 'rotate('+current+'deg)';
            }
            
        };
    </script>
		

		
	</body>
</html>

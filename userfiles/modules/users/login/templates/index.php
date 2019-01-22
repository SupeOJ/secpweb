<?php 
include_once('/cas/CAS.php');

phpCAS::client(CAS_VERSION_2_0, "172.16.5.16",8080, "cas");
phpCAS::setNoCasServerValidation();

phpCAS::handleLogoutRequests();



if(isset($_REQUEST['login'])) {
    phpCAS::forceAuthentication();
    $username = phpCAS::getUser();
    $uid = getUserImg($username)['uid'];
    $img = getUserImg($username)['img'];
    header("Location: ./");
}
if (isset($_REQUEST['logout'])) {    
    
    phpCAS::logoutWithRedirectService("http://172.16.5.16/cae");
}
//var_dump(phpCAS::checkAuthentication());exit;
if(phpCAS::checkAuthentication()) {
    $username = phpCAS::getUser();
    $uid = getUserImg($username)['uid'];
    $img = getUserImg($username)['img'];
}

function getUserImg($username) {
    $connect = mysqli_connect('172.16.5.16','root','123456','caecp');
    $sql = "select nickname,uid from dzz_user where nickname = '$username' limit 1";
    $result = mysqli_query($connect,$sql);

    while ( $row = mysqli_fetch_assoc($result)) {
        $uid = $row['uid'];
        $img = "http://172.16.5.16/caecp/avatar.php?uid=$uid&size=small";
    }
	$data =[
	'uid'=>$uid,
	'img'=>$img
	];
    mysqli_close($connect);
	return  $data;   
}
$uid = isset($uid) && $uid ? $uid : 0;
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
		<style>
		.left-nav-sons{
			width:50px;
			height: 50px;
			position: relative;
			cursor: pointer;    
		}
		.left-nav-sons:hover{
			background: #414148;
			transition: 0.5s all ease-in-out;
		}
		.left-nav-childs{
			position: fixed;
			height: 980px;
			width: 280px;
			background: #2b2b34;
			left: 50px;
			top: 0px;
			display: none;
		}
		.left-nav-sons:hover .left-nav-childs{
			display: block;
		}
		.left-nav-sons .left-nav-childs .boxx-img a{
			position: relative;
		}
		.left-nav-sons .left-nav-childs .boxx-img a:hover span{
			color: #f00;
		}

		.left-nav-sons .left-nav-childs .boxx-img a img {
			width: 20px;
			height: 20px;
			position: absolute;
			left:30px;
			top:15px;
		}
		.clear{
			clear:both;
		}
		ul.boxx-img {
			margin-bottom: 0px;
		}		
		</style>
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
        $.get('http://172.16.5.16/caecp/misc.php?mod=menulist&uid=<?php echo $uid;?>',{},function(data){
            if(data.code == 1){
               console.log(data.data);
                var menulist = data.data;
                var html = '';
                $.each(menulist,function(index,val){
                    // console.log(val);
                    html += '<div class="left-nav-sons" >';
                    html += '<img class="Nav-left-img" src="' +val.catico+ '" alt="">';
                    html += '<div class="left-nav-childs">';
                    html += '<p class="etc-left-fonts">' + val.categoryname+ '</p>';

                    if(val.childs) {
                        $.each(val.childs,function(index2,val2){
                            html += '<p class="clear Nav-left-P">' + val2.categoryname + '</p>';

                            if(val2.children){
                                html += '<ul class="boxx-img">';
                                $.each(val2.children,function(index3,val3){
                                    html += '<li>';
                                    var need = val3.group > 0 ? ' class="need" ' : '';
                                    html += '<a ' + need + ' href="' + val3.appurl+ '" target="_blank" >';
                                    html += '<span>';
                                    html += '<img src="' + val3.menunormalico+ '" alt="" >';
                                    html += '<img src="' + val3.menuhoverico+ '" alt=""  style="display: none;">'; 
                                    html += '<p>' + val3.appname+ '</p>';
                                    html += '</span>';   
                                    html += '</a>';
                                    html += '</li>'; 
                                });  
                                html += '</ul>';                      
                            }
                        });
                    }
                   

                    html += '</div>';
                    html += ' </div>';

                });

                $('#left-nav').empty().html(html);
            }
            $(".boxx-img a").mouseenter(function(){
                $(this).find('img').eq(1).css("display","block");
                $(this).find('img').eq(0).css("display","none");

            }).mouseleave(function(){
                $(this).find('img').eq(1).css("display","none");
                $(this).find('img').eq(0).css("display","block");
            });  

            <?php if(isset($username) && $username) { ?>


            <?php }else{ ?>
                $('.need').each(function(){
                    $(this).attr('data-toggle','modal');
                    $(this).attr('data-target','#exampleModalCenter');
                });
            <?php } ?>

        },'json');	
            
    };
	
    </script>
		

		
	</body>
</html>

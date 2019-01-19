<?php

/*

type: layout

name: productsys 

position: 7
*/
?>
<?php

$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$showDes = get_option('showDes', $params['id']); // y|NULL|false
$showDes = $showDes === false ? 'y' : $showDes;

  $layoutBackgound = get_option('layoutBackgound',$params['id']);
  $layoutBackgound = $layoutBackgound == false ? '#f0f0f0' : $layoutBackgound;
  $layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
  $layoutBackgoundOpacity = $layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   


?>
<style type="text/css">

/*产品架构*/
.etc-can-container {
    margin-bottom: 44px;
    }
.can-proder-center{
	text-align: center;
	font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',微软雅黑,"Helvetica Neue",Helvetica,Arial,sans-serif;
	font-size: 28px;
	color: #323232;
	margin-bottom: 18px;
	padding-top:40px;
	}
.etc-bors:hover{
	box-shadow: -5px 0px 5px rgba(243,74,64,0.20),5px 0px 5px rgba(243,74,64,0.20),5px 0px 5px rgba(243,74,64,0.20),0px 10px 10px #ccc;
	transition: 0.3s all ease-in-out;
	cursor: pointer;
	}
.etc-can-proderct-title{
	display: block;
    text-align:center;
    color: #323232 !important;
    font-size: 16px;
    font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',微软雅黑,"Helvetica Neue",Helvetica,Arial,sans-serif;
    text-decoration: none !important;
    /*cursor: none;*/
	}
.etc-can-img{
	text-align: center;
	margin-top: 12px;
	margin-bottom:14px;
	}
.etc-can-p{
	text-align: center;
	margin-bottom: 20px;
	color: #8C8C8C;
	font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',微软雅黑,"Helvetica Neue",Helvetica,Arial,sans-serif;
	}
.etc-can-prodects{
	height: 100%;
	}
.etc-can-contant{
	width: 100%;
	height: 100%;
	}
.etc-p{
	text-align: center;
	margin-top: 30px;
	font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',微软雅黑,"Helvetica Neue",Helvetica,Arial,sans-serif;
	font-size: 14px;
	color: #8C8C8C;
	}
.etc-ps{
	font-size: 14px;
	font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',微软雅黑,"Helvetica Neue",Helvetica,Arial,sans-serif;
	color: #8C8C8C;
	text-align: center;
	margin-bottom: 44px;
	}
.etc-money{
	text-align: center;
	font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',微软雅黑,"Helvetica Neue",Helvetica,Arial,sans-serif;
	font-size: 12px;
	color: #8C8C8C;
	cursor: pointer;
	}
.etc-momney-img{
	background:url(../img/icon_bc-1.png)no-repeat 50%;
	position: relative;
	height: 75px;
	width: 75px;
	/*background: no-repeat 50%;*/
	margin: 0 auto;
	background-size: 75px;
	background-position:0 0;
	-webkit-animation: slide-market20 1.5s cubic-bezier(.4,0,.2,1) 0s 1;
    animation: slide-market20 1.5s cubic-bezier(.4,0,.2,1) 0s 1;
	}
.etc-money-span{
	margin-bottom: 20px;
	}
.etc-gou{
	padding: 0 5px;
	}
#<?php echo $params['id'];?> .col-sm-6,.col-md-4,.col-lg-3{padding-left: 6px;padding-right: 6px;}
.etc-thumbnail{padding:4px 0px;}
.etc-thumbnail .caption{padding:0;height: 220px;}
#<?php echo $params['id'];?>{
	background: <?php echo $layoutBackgound;?>;
	opacity:<?php echo $layoutBackgoundOpacity;?>;
}
</style>
<!--产品架构-->
 	<div class="container-fluid etc-can-prodects edit" id="<?php echo $params['id'];?>"  field="layout-productsys-<?php print $params['id'] ?>" rel="layout" >
 		<div class="container" style="margin-bottom: 44px;">
 			<?php if($showTitle=='y'):?>
 			<p class="can-proder-center">产品架构</p>
 			<?php endif;?>

 			<?php if($showDes=='y'):?>
 			<div class="etc-can-contant">
 				<p class="etc-p">以云桌面为标准平台、以云储存为安全空间、以应用工具为增值支撑</p>
 				<p class="etc-ps">以管理系统为价值核心、以行业解决方案为升华、以社交沟通全方位协同</p>
 			</div>
 			<?php endif;?>
 			
 		<div class="row">
	 		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="<?php echo $config['url_to_module'] ?>img/icon_bi.png"></p>
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
		            <p class="etc-can-img"><img src="<?php echo $config['url_to_module'] ?>img/icon_erp.png"></p>
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
		            <p class="etc-can-img"><img src="<?php echo $config['url_to_module'] ?>img/icon_pm.png"></p>
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
		            <p class="etc-can-img"><img src="<?php echo $config['url_to_module'] ?>img/icon_spm.png"></p>
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
		            <p class="etc-can-img"><img src="<?php echo $config['url_to_module'] ?>img/icon_bc.png"></p>
		            <p class="etc-can-proderct-title">电子商务BC</p>
		            <p class="etc-money"><span class="etc-gou">网上商店</span>|<span class="etc-gou">移动商务</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">客户门户</span>|<span class="etc-gou">供应商门户</span></p>
		          </div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="<?php echo $config['url_to_module'] ?>img/icon_crm.png"></p>
		            <p class="etc-can-proderct-title">客户关系CRM</p>
		            <p class="etc-money"><span class="etc-gou">客户管理</span>|<span class="etc-gou">商机管理</span></p>
		            <p class="etc-money etc-money-span"><span class="etc-gou">市场管理</span>|<span class="etc-gou">服务管理</span></p>
		          </div>
		        </div>
	      	</div>
      		<div class="col-sm-6 col-md-4 col-lg-3 ">
		        <div class="thumbnail etc-thumbnail etc-bors">
		          <div class="caption">
		            <p class="etc-can-img"><img src="<?php echo $config['url_to_module'] ?>img/icon_hrm.png">
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
		            <p class="etc-can-img"><img src="<?php echo $config['url_to_module'] ?>img/icon_oa.png"></p>
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
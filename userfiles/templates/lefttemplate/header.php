<!DOCTYPE HTML>
<html prefix="og: http://ogp.me/ns#">
    <head>
        <title>{content_meta_title}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!--  Site Meta Data  -->
        <meta name="keywords" content="{content_meta_keywords}">
        <meta name="description" content="{content_meta_description}">

        <!--  Site Open Graph Meta Data  -->
        <meta property="og:title" content="{content_meta_title}">
        <meta property="og:type" content="{og_type}">
        <meta property="og:url" content="{content_url}">
        <meta property="og:image" content="{content_image}">
        <meta property="og:description" content="{og_description}">
        <meta property="og:site_name" content="{og_site_name}">

        <?php include 'header_scripts.php'; ?>

        <!-- 拖拽 -->
        <link href="{TEMPLATE_URL}drag/dist/gridstack.css" rel="stylesheet"/>
        <link href="{TEMPLATE_URL}drag/css/default.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            .grid-stack-item-content {color: #2c3e50;text-align: center;/* background-color: #18bc9c; */}
            .qricon-wrapper>img{border: 1px #5fabf3 solid;}
            .qrcard-block>p{font-size: 15px;color: #000;}
            .qrcard-block{margin-top: 10px;}
            .qrcards-layout-1>li{list-style: none;height: 260px;}
            .layout-qrcode{padding: 30px 0px 20px 0px;}

        </style>
        <script src="{TEMPLATE_URL}drag/js/lodash.min.js"></script>
        <script src="{TEMPLATE_URL}drag/dist/gridstack.js"></script>
        <script type="text/javascript">
            $(function () {
                var options = {
                    cell_height: 260,
                    animate: true
                };
                $('.grid-stack').gridstack(options);
            });
        </script>
       
    </head>
    <body class="<?php print mw_var('photon_layout'); ?>" <?php if(in_live_edit()):?> style="margin-top:0;padding-top: 2px;" <?php endif;?>>
    <div>        
        <div class="nav-top-fix"><module type="top_nav" /></div>
        <div id="main-content-holder">
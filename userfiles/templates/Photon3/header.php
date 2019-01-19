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
        <style>
        body{
            margin:0;
            padding:0;
            background:#2C88EE;
        }
        .page4 h2{
        margin:auto !important;
        position:absolute !important;
        top:0 !important;left:0;bottom:0;right:0;
        height:100px;
        transform:none;
        transition:all 3s;
        }
        .ani{
        transform:scale(3) rotate(360deg) !important;
        }</style>       
    </head>
    <body class="<?php print mw_var('photon_layout'); ?>" <?php if(in_live_edit()):?> style="margin-top:0;padding-top: 2px;" <?php endif;?>>
        <div class="nav-top-fix"><module type="leftslider" /></div>


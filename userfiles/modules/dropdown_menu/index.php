
<style>
.md-dropdownmenu .mw-notification>div{height: 50px;}
    .cbp-hrmenu {
        width: 100%;
        /*margin-top: 2em;*/
    }
  
@media screen and (min-width: 768px){


    /* general ul style */
    .cbp-hrmenu ul {
        margin: 0;
        padding: 0;
        list-style-type: none;

    }

    /* first level ul style */
    .cbp-hrmenu .cbp-hrsub-inner {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 1.875em;
    }

    .cbp-hrmenu > ul > li {
        display: inline-block;
    }

    .cbp-hrmenu > ul > li > a {
        /*font-weight: 700;*/
        padding: 0 2em;
        /*color: #eee;*/
        display: inline-block;
        height: 60px;
        line-height: 60px;
        color: #FFFFFF;
        font-size: 14px;
        font-family: 'Segoe UI',SegoeUI,'Microsoft YaHei',微软雅黑,"Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    .cbp-hrmenu > ul > li > a:hover{text-decoration: none;}
    .cbp-hrmenu > ul > li.cbp-hropen >a,
    .cbp-hrmenu > ul > li.cbp-hropen > a:hover {
        color: #2D95A2;
        background: #313131;
        /* border-bottom: 3px solid; 
        color: #f52c38; */
    }  


    /* sub-menu */
    .cbp-hrmenu .cbp-hrsub {
        display: none;
        position: absolute;
        background: #313131;
        width: 100%;
        left: 0;
        padding-bottom: 3em;
        padding-top:2em;
        z-index:1;
    }

    .cbp-hrmenu .cbp-hropen .cbp-hrsub {
        display: block;
    }

    .cbp-hrmenu .cbp-hrsub-inner > div > ul > li{
        width: 200px;
        float: left;
        padding: 0 1.5em 0;
    }
    .cbp-hrmenu .cbp-hrsub-inner > div > ul > li > a {
        font-size:14px;
        padding:0.175em 0;
        font-weight: bold;
        color: #eee;
    }
    .cbp-hrmenu .cbp-hrsub-inner > div > ul > li .depth-2 > a {font-size:13px;color: #999;}
    .cbp-hrmenu .cbp-hrsub-inner > div > ul > li .depth-2 > a:hover{color:#2D95A2;}
    .cbp-hrmenu .cbp-hrsub-inner:before,
    .cbp-hrmenu .cbp-hrsub-inner:after {
        content: " ";
        display: table;
    }

    .cbp-hrmenu .cbp-hrsub-inner:after {
        clear: both;
    }

    .cbp-hrmenu .cbp-hrsub-inner > div a {
        line-height: 2.35em;
    }

    .cbp-hrsub h4 {
        color: #afdefa;
        padding: 2em 0 0.6em;
        margin: 0;
        font-size: 160%;
        font-weight: 300;
    }    
}
@media screen and (max-width: 768px) {
    .cbp-hrmenu > ul > li {
        display: block;
    }  
    .cbp-hrmenu > ul > li ul{display: none;}
    .cbp-hrmenu > ul > li.cbp-hropen .cbp-hrsub-inner >div > ul{display: block;}
    .cbp-hrmenu > ul > li.cbp-hropen .cbp-hrsub-inner >div > ul >li >a {color:#47a3da;}
    .cbp-hrmenu > ul > li.cbp-hropen .cbp-hrsub-inner >div > ul > li:hover > ul {display: block;}
    .cbp-hrmenu > ul > li.cbp-hropen .cbp-hrsub-inner >div > ul > li:hover > ul > li > a {color:#47a3da;line-height: 20px;font-size:12px;}
    .cbp-hrmenu > ul > li  a {
        font-weight: 700;
        color: #eee;
        height: 30px;
        line-height: 30px;
    }    
    .cbp-hrmenu > ul > li  a:hover {
        color: #47a3da;
        text-decoration: none;
        border-bottom: 1px solid;
    }

    .cbp-hrmenu > ul > li.cbp-hropen a:hover {
        text-decoration: none;
        color: #2D95A2;
    }
    .cbp-hrmenu > ul > li.cbp-hropen >a,
    .cbp-hrmenu > ul > li.cbp-hropen > a:hover {
        color: #2D95A2;
        border-bottom: 1px solid;
    }      
}

</style>
<?php
if (isset($params['name'])) {
    $params['menu-name'] = $params['name'];
} elseif (isset($params['menu-name'])) {
    $params['menu-name'] = $params['menu-name'];
} else {
    $menuss = mw()->menu_manager->get_menu();
    //var_dump($menuss);exit;
    $params['menu-name'] = $menuss['title'];
}
$menu_name = get_option('menu_name', $params['id']);
if ($menu_name != false) {
    $params['menu-name'] = $menu_name;
}


if (isset($params['menu-name'])) {
    $menu = get_menus('make_on_not_found=1&one=1&limit=1&title=' . $params['menu-name']);

    if (is_array($menu)) {
        $menu_filter = $params;
        if (!isset($params['ul_class'])) {
            $menu_filter['ul_class'] = 'nav';
        }
        $menu_filter['menu_id'] = intval($menu['id']);
            include("dropdown_menu.php");

    } else {
        print lnotif("点击编辑菜单");
    }

} else {
    print lnotif("点击编辑菜单");
}




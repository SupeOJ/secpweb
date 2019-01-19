<?php

/*

type: layout

name: sixflatform

position: 17

 
*/

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound = $layoutBackgound == false ? 'transparent' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity = $layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;  

$background =  'background:'. $layoutBackgound.';opacity:'.$layoutBackgoundOpacity ;

?>

<style type="text/css">
.blocks12{background: #ABABAB;}
.blocks14{background: #919191;}
.blocks21{background: #6B6B6B;}
.blocks22{background: #74706F;}
.blocks23{background: #2B2B2B;}
.blocks24{background: #454545;}
.blocks25{background: #1E2B3B;}
.blocks33{background: #5B6E8F;}
.blocks-row div{width:150px;height: 150px;float: left;}
.blocks {width:750px;height: 450px;margin:auto auto;padding:0;}
.blocks .blocks-img {width: 100%;height:60%;text-align: center;line-height:120px;}
.blocks .blocks-row >div >div:hover{        
    margin-top: -3%;
    margin-left: 3%;
    transition: 0.5s all ease-in-out;
}
.blocks .blocks-row >div >div{        
    margin-top: 0%;
    margin-left: 0%;
    transition: 0.5s all ease-in-out;
}
.blocks-text{width: 100%;height: 40%;text-align: center;color: #ffffff;}
.blocks-text p {margin:0;}
</style>
<div clas="mw-blocks" style="padding:80px 0;<?php echo $background?>;" >
    <div class="blocks">

        <div class="blocks-row">
            <div class="blocks11"></div>
            <div class="blocks12  edit" field="mw-blocks1-<?php print $params['id'] ?>" rel="layout">
                <div>
                    <div class="blocks-img">
                        <img  src="<?php print $config['url_to_module']; ?>img/wu.png" />
                    </div>
                    <div class="blocks-text">
                        <p>物流中心</p>
                    </div>
                </div>
            </div>
            <div class="blocks13"></div>
            <div class="blocks14  edit"  field="mw-blocks2-<?php print $params['id'] ?>" rel="layout">
                <div>
                    <div class="blocks-img">
                        <img  src="<?php print $config['url_to_module']; ?>img/ying.png" />
                    </div>
                    <div class="blocks-text">
                        <p>营销中心</p>
                    </div>
                </div>
            </div>
            <div class="blocks15"></div>
        </div>
        <div class="blocks-row">
            <div class="blocks21  edit"  field="mw-blocks3-<?php print $params['id'] ?>" rel="layout">
                <div>
                    <div class="blocks-img">
                        <img  src="<?php print $config['url_to_module']; ?>img/jiao.png" />
                    </div>
                    <div class="blocks-text">
                        <p>交易中心</p>
                    </div>
                </div>
            </div>
            <div class="blocks22  edit"  field="mw-blocks4-<?php print $params['id'] ?>" rel="layout">
                <div>
                    <div class="blocks-img">
                        <img  src="<?php print $config['url_to_module']; ?>img/fu.png" />
                    </div>
                    <div class="blocks-text">
                        <p>孵化基地</p>
                    </div>
                </div>
            </div>
            <div class="blocks23  edit"  field="mw-blocks5-<?php print $params['id'] ?>" rel="layout">
                <div>
                    <div class="blocks-img">
                        <img  src="<?php print $config['url_to_module']; ?>img/shang.png" />
                    </div>
                    <div class="blocks-text">
                        <p>商务配套区</p>
                    </div>
                </div>
            </div>
            <div class="blocks24  edit"  field="mw-blocks6-<?php print $params['id'] ?>" rel="layout">
                <div>
                    <div class="blocks-img">
                        <img  src="<?php print $config['url_to_module']; ?>img/hui.png" />
                    </div>
                    <div class="blocks-text">
                        <p>会议中心</p>
                    </div>
                </div>
            </div>
            <div class="blocks25  edit"  field="mw-blocks7-<?php print $params['id'] ?>" rel="layout">
                <div>
                    <div class="blocks-img">
                        <img  src="<?php print $config['url_to_module']; ?>img/jian.png" />
                    </div>
                    <div class="blocks-text">
                        <p>城市形象馆</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="blocks-row">
            <div class="blocks31"></div>
            <div class="blocks32"></div>
            <div class="blocks33  edit"  field="mw-blocks8-<?php print $params['id'] ?>" rel="layout">
                <div>
                    <div class="blocks-img">
                        <img  src="<?php print $config['url_to_module']; ?>img/chan.png" />
                    </div>
                    <div class="blocks-text">
                        <p>产学研基地</p>
                    </div>
                </div>
            </div>
            <div class="blocks34"></div>
            <div class="blocks35"></div>
        </div>       


    </div><!-- <div class="blocks edit"> -->
</div><!-- <div clas="mw-blocks"> -->
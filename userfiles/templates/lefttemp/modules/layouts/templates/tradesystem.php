<?php

/*

type: layout

name: trade system

position: 18

 
 
*/
?>

<style>

    .example {
        width: 100%;
        height: 980px;
        text-align: center;
    }
    .example a,a:hover{color: #000;}
    .carousel-item{
        color: #fff;
    }
    .OMOD0{
        width: 100%;height: 80px;float: left;
    }           
    .OMOD1{
        width: 100%;height: 200px;margin-top: 5%;float: left;
    }
    .OMODD1{
        width: 210px;height: 210px;float: left;transform: rotate(45deg);margin-left: 28%;
        border:1px solid #9f9f9f;
    }
    .OMODD0{
        width: 100%;float: left;transform: rotate(0deg);
    }    
    .OMOD1-1{
        background: #cbcbcb;
    }
    .OMOD1-in{
        width:60%;height:60%;margin:20% 0 0 20%;transform: rotate(-45deg);
    }
    .OMODD2{
        width: 210px;height: 210px;float: left;transform: rotate(45deg);margin-left:8%;
        border:1px solid #9f9f9f;
    }
    .OMOD1-2{
        background: #717171;
    }
    .OMOD2{
        width: 100%;height: 200px;margin-top: -3.5%;float: left;
    }
    .OMODD3{
        width: 210px;height: 210px;float: left;transform: rotate(45deg);margin-left:15%;
        border:1px solid #9f9f9f;
    }
    .OMOD2-1{
        background: #ffffff;
    }
    .OMOD2-in{
        width:60%;height:60%;margin:20% 0 0 20%;transform: rotate(-45deg);
    }
    .OMODD4{
        width: 210px;height: 210px;float: left;transform: rotate(45deg);margin-left:8.1%;
        border:1px solid #9f9f9f;
    }
    .OMOD2-2{
        background: #eeeeee;
    }
    .OMODD5{
        width: 210px;height: 210px;float: left;transform: rotate(45deg);margin-left:8.1%;
        border:1px solid #9f9f9f;
    }
    .OMOD2-3{
        background: #a6a6a6;
    }
    .OMOD3{
        width: 100%;height: 200px;margin-top: -3.5%;float: left;
    }
    .OMODD6{
        width: 210px;height: 210px;float: left;transform: rotate(45deg);margin-left:28%;
        border:1px solid #9f9f9f;
    }
    .OMOD3-1{
        background: #838383;
    }
    .OMOD3-in{
        width:60%;height:60%;margin:20% 0 0 20%;transform: rotate(-45deg);
    }
    .OMODD7{
        width: 210px;height: 210px;float: left;transform: rotate(45deg);margin-left:8%;
        border:1px solid #9f9f9f;
    }
    .OMOD3-2{
        background: #ffffff;
    }
    .OMO-T1{
        text-align: center;font-size: 16px;color: #000;margin:0;
    }
    .OMO-T2{
        text-align: center;height: 0;font-size: 16px;color: #000;
    }   .OMOD1-1:hover,.OMOD1-2:hover,.OMOD2-1:hover,.OMOD2-2:hover,.OMOD2-3:hover,.OMOD3-1:hover,.OMOD3-2:hover{
        margin-top: -1%;
        margin-left: -1%;
        transition: 0.5s all ease-in-out;
    }
    .OMOD1-1,.OMOD1-2,.OMOD2-1,.OMOD2-2,.OMOD2-3,.OMOD3-1,.OMOD3-2{
        transition: 0.5s all ease-in-out;
        width: 200px;height: 200px;float: left;
        margin-left: 5px;margin-top: 5px;
    }
    .sixflatform-bg{position:absolute;width: 100%;height: 100%;}
    /*.carousel-btn.carousel-prev-btn{background: url(<?php print $config['url_to_module']; ?>img/prev.png);}*/
    .ft-carousel .carousel-btn {
	position: absolute;
	top: 40%;
	width: 250px;
	height: 250px;
	cursor: pointer;
	}

	.ft-carousel .carousel-prev-btn {
		left: 12%;
		background: url(<?php print $config['url_to_module']; ?>img/prev.png) no-repeat;
	}

	.ft-carousel .carousel-next-btn {
		right: 12%;
		background: url(<?php print $config['url_to_module']; ?>img/next.png) no-repeat;
	}
	.example a:hover{text-decoration: none;}
    @media(max-width: 1600px){.ft-carousel .carousel-prev-btn,.carousel-next-btn{display: none;}}
</style>

<div class="example edit"  field="layout-tradesys-<?php print $params['id'] ?>" rel="layout">
    <div class="background-image-holder sixflatform-bg " style="background: url(<?php print $config['url_to_module']; ?>img/sixflatform-bg.jpg) no-repeat;background-size:100% 100%;"></div>
    <div class="ft-carousel "  >
            
            <div class="carousel-item">
                <div style="width: 1200px;height: 100%;margin: auto auto;padding-top: 110px;">
                    <div class="OMOD0">
	                    <div class="OMODD0  edit" field="layout-OMOD0-<?php print $params['id'] ?>" rel="layout">
	                        <h1 style="font-size: 30px;padding-top:1%;font-weight: 100,"><a style="color: #ffffff;">OMO平台价值链交易四大体系</a>
	                        </h1>
                        </div>
                    </div>  

                    <div class="OMOD1">
                        <div class="OMODD1">
                            <div class="OMOD1-1">
                                <div class="OMOD1-in">  
                                    <p class="OMO-T1"><br>OBM<br/>原始品牌生产商</p>
                                </div>
                            </div>
                        </div>
                        <div class="OMODD2">
                            <div class="OMOD1-2">
                                <div class="OMOD1-in">
                                    <p class="OMO-T1"><br/>O2M2C<br/>在线，移动 <br/>线下体验展厅</p>
                                </div>
                            </div>
                        </div>
                    </div>                  
                    <div class="OMOD2">
                        <div class="OMODD3">
                            <div class="OMOD2-1">
                                <div class="OMOD2-in">
                                    <p class="OMO-T1"><br/>ODM<br/>原始设计制造商</p>
                                </div>
                            </div>
                        </div>
                        <div class="OMODD4">
                            <div class="OMOD2-2">
                                <div class="OMOD2-in">
                                    <p class="OMO-T1">OMO运营主体 <br/>市场交易体系 <br/>监管体系 <br/>后台支持体系</p>
                                </div>
                            </div>
                        </div>
                        <div class="OMODD5">
                            <div class="OMOD2-3">
                                <div class="OMOD2-in">
                                    <p class="OMO-T1"><br/>M2C<br/>生产商直销平台</p>
                                </div>
                            </div>
                        </div>
                    </div>      

                    <div class="OMOD3">
                        <div class="OMODD6">
                            <div class="OMOD3-1">
                                <div class="OMOD3-in">
                                    <p class="OMO-T1"><br/>OEM<br/>定牌生产合作商</p>
                                </div>
                            </div>
                        </div>
                        <div class="OMODD7">
                            <div class="OMOD3-2">
                                <div class="OMOD3-in">
                                    <p class="OMO-T1"><br/>O2B<br/>跨境电商采购平台</p>
                                </div>
                            </div>
                        </div>
                    </div>  

                </div>

            </div>  <!-- <div class="carousel-item"> -->
            <span class="carousel-btn carousel-prev-btn"></span>
            <span class="carousel-btn carousel-next-btn"></span>    
    </div><!-- <div class="ft-carousel " id="carousel_3"  > -->
</div><!-- <div class="example edit"> -->


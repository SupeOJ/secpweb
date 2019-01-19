
<?php
    function sliderbar_tree2($menu_id,$data){
        $newData = [];
        if(!is_array($data)){return false;}
        foreach ( $data as $value ) {
            if( $value['parent_id'] == $menu_id ) {
                $value['sons'] = [];
                $value['sons'] = sliderbar_tree2($value['id'],$data);
                $newData[] = $value;
            }
        }
        return $newData;
    }

$sliderbar = mw()->sliderbar_manager->get_sliderbar_items();
$slider = sliderbar_tree2(0,$sliderbar);


?>
<style type="text/css">
    .clear{clear:both;}
    .boxx-img{float: left;display:block;}
    ul.boxx-img li{float: left;padding: 1px 1px 0 0;}
    ul.boxx-img li a{width:80px;height:80px;display:block;background: #2C2C2C;text-decoration: none;padding-top: 15px;}
    ul.boxx-img li a:hover{background: #404040;}
    .left-nav-sons-children a{text-decoration: none;}
    ul.boxx-img {margin-bottom: 20px;}
    ul.boxx-img li a span{display:block;text-align:center;color:#fff;font-size: 12px;padding:1px;}

    /*左侧边栏*/

    .left-nav{
        height: 100%;
        width: 159px;
        position: fixed;
        background: #464547;
        margin-left: -169px;
        padding-top: 60px;
        box-shadow: 1px 1px 5px #313131;
        z-index: 999;
        top:0;
    }
	.right-nav {
		height: 100%;
		width: 280px;
		position: fixed;
		background: #464547;
		box-shadow: 1px 1px 5px #313131;
		z-index: 999;
		top: 0;
		right: -280px;
		-webkit-transition: 0.2s all linear;
		-moz-transition: 0.2s all linear;
		-o-transition: 0.2s all linear;
		transition: 0.2s all linear;
    }
    /*左侧边栏按钮*/
    .left-nav-button{
        position: absolute;/*fix -20180228*/
        top:0;
        cursor: pointer;
        width: 60px;
        height: 60px;
        z-index: 999;
		/*background: #464547;*/
    }
	.right-nav-button {
		position: absolute;
		top: 0;
		right: 0px;
		cursor: pointer;
		width: 60px;
		height: 60px;
		z-index: 999;
   } 
   
	.is-active .bar:nth-child(2){
	  opacity: 0;
	}

	.is-active .bar:nth-child(1){
	  -webkit-transform: translateY(13px) rotate(45deg);
	  -ms-transform: translateY(13px) rotate(45deg);
	  -o-transform: translateY(13px) rotate(45deg);
	  transform: translateY(13px) rotate(45deg);
		-webkit-transition: 0.2s all linear;
		-moz-transition: 0.2s all linear;
		-o-transition: 0.2s all linear;
		transition: 0.2s all linear;
	}

	.is-active .bar:nth-child(3){
	  -webkit-transform: translateY(-3px) rotate(-45deg);
	  -ms-transform: translateY(-3px) rotate(-45deg);
	  -o-transform: translateY(-3px) rotate(-45deg);
	  transform: translateY(-3px) rotate(-45deg);
		-webkit-transition: 0.2s all linear;
		-moz-transition: 0.2s all linear;
		-o-transition: 0.2s all linear;
		transition: 0.2s all linear;
	}

   .right-nav-button .bar{
      height: 2px;
      width: 20px;
      display: block;
      margin: 6px auto;
      position: relative;
      background-color: #fff;  
		-webkit-transition: 0.2s all linear;
		-moz-transition: 0.2s all linear;
		-o-transition: 0.2s all linear;
		transition: 0.2s all linear;      
    }
   .left-nav-button .bar{
      height: 2px;
      width: 20px;
      display: block;
      margin: 6px auto;
      position: relative;
      background-color: #fff;        
    }
    /*左侧边栏隐藏class*/
    .left-nav-hidden{
        margin-left: 0px;
    }
    .right-nav-hidden{
        right: 0px;
		-webkit-transition: 0.2s all linear;
		-moz-transition: 0.2s all linear;
		-o-transition: 0.2s all linear;
		transition: 0.2s all linear;
    }
    .right-nav ul{color:#e2e9f3;text-align:center;}
    .right-nav li{float:left;    
		padding: 27px 6px 0px 30px;
		color: rgb(255, 255, 255);}
    .left-nav-sons-children .text_h3{
        text-align: left;
        padding: 0px 20px;
        font-weight:500;
        color:#fff;
        font-size: 18px;
        margin:0 -20px;
        background: #666;
        line-height: 60px;
        height:60px;
    }
    body.mw-live-edit .mode_close{display:none;}
    body.mw-live-edit .left-nav-sons-children,
    body.mw-live-edit .right-nav,
    body.mw-live-edit .left-nav{top:52px;}
    .nav-top-menu{background: #464547;width:100%;position: fixed;top:0px;z-index: 999;}
    body.mw-live-edit .nav-top-menu{top:52px;}
    .md-dropdownmenu{margin:0 20%}
    .ecp_pdf{    
		height: 95px;
		width: 95px;
		border:1px solid rgba(255,255,255,0.3);
		    position: relative;
			cursor:pointer;
		}
    .fa-etc{padding: 12px;font-size: 25px;}
	.right-move{right:280px;
		-webkit-transition: 0.2s all linear;
		-moz-transition: 0.2s all linear;
		-o-transition: 0.2s all linear;
		transition: 0.2s all linear;}
	.add_sig{float: left;   
		padding: 27px 6px 0px 30px;
		color: rgb(255, 255, 255);}
	.add_sig .fa-etc{padding:28px 33px;}
	.self_mode{    height: 60px;
		line-height: 60px;
		text-align: center;
		color: rgb(255, 255, 255);
		background:rgb(102, 102, 102);
		font-family: '微软雅黑';
        font-size: 16px;}
	.move_pdf{
		position: absolute;
		top: 0px;
		left: 0px;
		width: 800px;
		height: 1200px;
		background: #464547;
		z-index: -100;
		-webkit-transition: 0.4s all linear;
		-moz-transition: 0.4s all linear;
		-o-transition: 0.4s all linear;
		transition: 0.4s all linear; 
	}
	.ppdf{
		position: absolute;
		top: 0px;
		left: 0px;
		width: 800px;
		height: 1200px;
		background: #464547;
		z-index: -10;
	}
	.move_npdf{
		left:-800px;
	}
	a{color:rgb(255, 255, 255);}
	a:focus, a:hover {
		color:rgb(255, 255, 255);
		text-decoration: none;
    }
	.menuecp li{    
		padding: 3px 10px 15px 37px;
		color: #91a0b5;
		font-size: 16px;}
    .menuecp i{display: none;}
	#InlineFrame1{display:none;}
</style>
<script type="text/javascript">
    mw.moduleCSS("<?php print $config['url_to_module']; ?>top-nav.css");
    function showClick(){
		if($('#right-nav').hasClass('right-nav-hidden')){
			$('#right-nav').removeClass('right-nav-hidden');
			$('.right-nav-button').removeClass('is-active');
				$('.move_pdf').removeClass('move_npdf');
			
		}else{
			$('#right-nav').addClass('right-nav-hidden');
			$('.right-nav-button').addClass('is-active');
		}
	}
	$(document).ready(function()
    {
		$('.menuli').on('click','li',function(){
	     var Hf = $(this).find('a').attr('href');
		if(Hf){
			if($(this).hasClass('del_pdf')){
				
			}else{
				if($('.move_pdf').hasClass('move_npdf')){
					$('.move_pdf>iframe').attr('src',Hf);
					$('.menuli li').removeClass('del_pdf');
					$(this).addClass('del_pdf');
					return;
				}
			}
			 if($('.move_pdf>iframe').attr('src')!=Hf){
				$('.move_pdf>iframe').attr('src',Hf);
			 }
				if($('.move_pdf').hasClass('move_npdf')){
					$('.move_pdf').removeClass('move_npdf');
				}else{
					$('.move_pdf').addClass('move_npdf');
				}
				return false;		
			 }
		}) 
		$('.menuli').on('click','.ecp_pdf>.mode_close',function(e){
			e.stopPropagation();
			$(this).parents('li').remove();
			return false;
		}) 
		$('.boxx-img').on('click','li>a',function(e){
			e.stopPropagation();
			var id = $(this).parent('li').attr('nid');
			var Hrf = $(this).attr('href');
			var This = $(this);
        <?php if(in_live_edit()){?>
			if(!Hrf){
				var text = "";
					  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
					 
					  for( var i=0; i < 5; i++ ){
						text += possible.charAt(Math.floor(Math.random() * possible.length));
					  }
					var Arr = {};
					Arr.id='0';
					Arr.subtype='static';
					Arr.content_type='page';
					Arr.layout_file='index.php';
					Arr.active_site_template='empty';
					Arr.title = text;
					Arr.is_active='1';
					Arr.preview_layout_file='index.php';
					Arr.original_link='';
					var str = '<?php print $params['id']; ?>';
					var index = str .lastIndexOf("-");  
					str  = str .substring(index + 1, str .length);
					Arr.parent=str;
					var S_url = '<?php print site_url(); ?>';
				$.ajax({
				  type: 'POST',
				  url: S_url+'api/save_content_admin',
				  data: Arr,
				  datatype: "json",
				  async: true,
				  success: function(data) {
					if(data){
					 $.get('<?php print site_url('api_html/content_link/?id=') ?>' + data, function (fUrl) {
						if(fUrl){
							var data_to_save={
								id :id,
								code :'1',
								url:fUrl
						    }
							$.post("<?php print api_link('sliderbar_item_create') ?>",  data_to_save, function(data){
								This.attr('href',fUrl);
						        window.open(fUrl);
								return false;
							});
						}
						});
					}
				  },
				  error:function(data){
					alert('新建页面失败，请重新点击！');
					return false;
				  }
			    });
				
					return false;
			}
        <?php }else{ ?>
		    if(Hrf){
				  $('#content').css('display','none');
				  $('#InlineFrame1').css('display','block');
				  $('#InlineFrame1').attr('src',Hrf);
				 $("#InlineFrame1").height($(document).height());
				  return false;
			}
        <?php } ?>
			}) 
	
       $('.menuli').on('mouseover','li',function(){
          $(this).find('i').css("display","block");
      });
      $('.menuli').on('mouseout','li',function(){
          $(this).find('i').css("display","none");
      });
	}) 
	$("#InlineFrame1").css({
            "height": $(document).height() + "px"
        })
	 function addmodeClick(){
		  var url = "<?php print $config['url_to_module']; ?>";
		  var ecp_html = '<li><div class="ecp_pdf">';
  		      ecp_html += '<div class="fa-etc icon-wrapper"><img src='+url+'img\/5.png><\/div>';
			  ecp_html += '<span>更多模板<\/span>';
              ecp_html += '<i class="mode_close"><\/i><\/div><\/li>';        
		  $('.menuli').append(ecp_html);
	  }
	   
</script>

<div id="mw-sliderbarMenu-module-<?php print $params['id']; ?>">
    <!--<头部>-->
   <iframe name="InlineFrame1" id="InlineFrame1" style="width:100%;height:100%;z-index:100;" src=''></iframe>
    <div class="nav-top-menu">
        <!--左侧边栏-->
        <div class="left-nav " id="left-nav">
		   <ul class="menuecp ecp_web edit" data-field="<?php echo $params['id'];?>-menu1" rel="<?php echo $params['id'];?>">
			 <li>企业云平台 <i></i></li>
			 <li>硅谷云建站 <i></i></li>
			 <li>ca-office  <i></i> </li>
			 <li>务联网桌面 <i></i> </li>
			 <li>在线考试 <i></i></li>
		  </ul>
			  <?php if(in_live_edit()):?>
				<div class="add_menu"></div>
			  <?php endif;?>
        </div>
        
            <!--左侧边栏按钮-->
            <div class="left-nav-button">
                <div style="margin:20px 0;">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div><!-- <div class="left-nav-button"> -->
       
   
        <div class="right-nav " id="right-nav"> 
	         <div class="self_mode edit" data-field="<?php echo $params['id'];?>-modename" rel="<?php echo $params['id'];?>">帮助中心</div>
				<ul class="menuli edit" data-field="<?php echo $params['id'];?>-imgg" data-id="<?php echo $params['id'];?>" rel="<?php echo $params['id'];?>">
				 <li><div class="ecp_pdf">
					  <div class="fa-etc icon-wrapper"><img src="<?php print $config['url_to_module']; ?>./img/1.png"></div>
					  <span>会员中心</span>
					  <i class="mode_close"></i>          
					</div>
				 </li>
				 <li><div class="ecp_pdf">
					  <div class="fa-etc icon-wrapper"><img src="<?php print $config['url_to_module']; ?>./img/2.png"></div>
					  <span>问题咨询</span>
					  <i class="mode_close"></i>          
					</div>
				 </li>
				 <li><div class="ecp_pdf">
					  <div class="fa-etc icon-wrapper"><img src="<?php print $config['url_to_module']; ?>./img/3.png"></div>
					  <span>用户手册</span>
					  <i class="mode_close"></i>          
					</div>
				 </li>
				 <li><div class="ecp_pdf">
					  <div class="fa-etc icon-wrapper"><img src="<?php print $config['url_to_module']; ?>./img/4.png"></span></div>
					  <span>用户须知</span>
					  <i class="mode_close"></i>          
					</div>
				 </li>
				 <li><div class="ecp_pdf">
					  <div class="fa-etc icon-wrapper"><img src="<?php print $config['url_to_module']; ?>./img/5.png"></div>
					  <span>更多模板</span>
					  <i class="mode_close"></i>          
					</div>
				 </li>
			   </ul>
			  <?php if(in_live_edit()):?>
			 <div class="add_sig"><div class="ecp_pdf">
					  <div class="fa-etc icon-wrapper"  onclick="addmodeClick()"><span class="mw-icon-web-add"></span></div>
				</div>
			 </div>
			  <?php endif;?>
			 <div class="ppdf"></div>
			   <div class="move_pdf">
			      <iframe src="" style="height:1000px;width:800px;border:0px;"></iframe>
			   </div>
			 
	    </div>
            <!--右侧边栏按钮-->
            <div class="right-nav-button" onclick="showClick()">
                <div style="margin:20px 0;">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div><!-- <div class="left-nav-button"> -->
	
	</div>
    
<!--<div style="width: 100%;height: 58px;"></div> -->
</div>

<script type="text/javascript">


    $(function () {
        $('.left-nav-button').click(function () {
            if (!$('.left-nav').hasClass('left-nav-hidden')) {
                $('.left-nav').addClass('left-nav-hidden');
            } else {
                $('.left-nav').removeClass('left-nav-hidden');
            };
        })
    });


    $(function () {
        $(".left-nav-sons").mouseenter(function(){
            $(this).children('.left-nav-sons-children').css('display','block');
        }).mouseleave(function(){
            $(this).children('.left-nav-sons-children').css('display','none');
        });
    });



    


</script>
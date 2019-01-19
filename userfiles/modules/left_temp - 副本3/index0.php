
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

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity; 
 
$background =  'background:'. ($layoutBackgound == false ? '#262d3a' : $layoutBackgound).';opacity:'.($layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity  );

?>
<style type="text/css">
        <?php if(in_live_edit()):?>
        #PanelMenu1_panel {
            top: 52px !important;
        }
        #PanelMenu2_panel {
            top: 52px !important;
        }
	    .self_mode{margin-top: 52px;}
        body{
          padding-top:55px !important;
        }
		#PanelMenu2{margin-top: 52px;}
        .add_menu{
          font-size: 16px;
          font-weight: 800;
          padding: 10px 10px 10px 10px;
          color: #fff;
          text-align: center;
          cursor: pointer;
		  position: relative;
			top: 18px;
			left: 75px;}
        .add_menu:hover{
          font-weight: 800;
          color: rgba(0, 134, 219, 1);
        }
        <?php endif;?>
        #PanelMenu1_panel,#PanelMenu2_panel{
          <?php echo $background;?>;
        }
        #PanelMenu1_markup i,#PanelMenu1>i{
			    position: absolute;
                top: 19px;
                font-size: 20px;
                font-weight: 500;}
		#PanelMenu1_markup i{ right: 10px;}
		.ecp_web>li:hover{background:rgba(107,130,171,0.12);border-left: 3px solid #5874d8;}
		p{margin:0px;}
		
	.element-over:hover, .module-over:hover {
		outline: 1px solid rgba(0, 134, 219, 1) !important;
		outline-offset: -1px;
	}
	#mw_handle_element {
        z-index: 1097 !important;
    }
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
		left:-1000px;
	}
</style>

	<script>mw.require('https://fonts.googleapis.com/icon?family=Material+Icons&.css', 'material_icons');</script>
<script type="text/javascript">
    mw.moduleJS("<?php print $config['url_to_module']; ?>js/wb.panel.min.js");
    mw.moduleCSS("<?php print $config['url_to_module']; ?>index.css");
   var times = 1;
    $(document).ready(function()
    {
       $("#PanelMenu1").panel({animate: true, animationDuration: 200, animationEasing: 'linear', dismissible: true, display: 'push', position: 'left', toggle: true});
      $("#PanelMenu1").click(function(){
		   times++;
		   if(times%2==0){
			   $(this).removeClass('Panpic1');
			   $(this).addClass('Panpicck');
		   }else{
			   $(this).removeClass('Panpicck');
			   $(this).addClass('Panpic1');
		   }
		   return false;
	   })
   var times_s = 1;
	   $("#PanelMenu2").click(function(){
		   times_s++;
		   if(times_s%2==0){
			   $(this).removeClass('Panpic2');
			   $(this).addClass('Panclose');
			   $('#wb_PanelMenu2').animate({'right':'0px'},200,"linear");
		   }else{
			   $(this).removeClass('Panclose');
			   $(this).addClass('Panpic2');
			   $('#wb_PanelMenu2').animate({'right':'-279px'},200,"linear");
		   }
		   return false;
	   })
	   $("body").on('click',function(){
			   $('#wb_PanelMenu1').animate({'left':'0px'},200,"linear");
		  if($("#PanelMenu1").hasClass('Panpicck')){
			   times = 1;
			  $("#PanelMenu1").removeClass('Panpicck');
			  $("#PanelMenu1").addClass('Panpic1');
		  } 
		  if($("#PanelMenu2").hasClass('Panclose')){
              times_s = 1;
			  $("#PanelMenu2").removeClass('Panclose');
			  $("#PanelMenu2").addClass('Panpic2');
		  } 
	   })
	   $('.add_menu').click(function(){
          var ahtml = "<li>菜单名称<i></i></li>";
          $(this).siblings('ul').append(ahtml);
       })
	    $('.ecp_web i').click(function(){
        $(this).parent('li').remove();
		return false;
       })
	    $('.ecp_menu').on('click','.ecp_pdf>.mode_close',function(){
        $(this).parents('li').remove();
       })
        <?php if(in_live_edit()):?>
       $('.menuli').on('mouseover','li',function(){
          $(this).find('i').css("display","block");
      });
      $('.menuli').on('mouseout','li',function(){
          $(this).find('i').css("display","none");
      });
		$('.ecp_menu').on('click','li',function(){
	     var Hf = $(this).find('a').attr('href');
		 Hf = 'http://caoffice.caecp.cn/index.php?mod=onlyoffice&path=eGlQdXU5U0FKcXR2VkFlQlBoMTUtd0FONlc5WnY2aGtsN0NWZzQ5bVh6ZGJVSTFlYVdTUlUxeTJMaWVYMm52SkhmWkdqVk9pc2VoVTBR';
		if(Hf){
			if($(this).hasClass('del_pdf')){
				
			}else{
				if($('.move_pdf').hasClass('move_npdf')){
					$('.move_pdf>iframe').attr('src',Hf);
					$('.menuli li').removeClass('del_pdf');
					$(this).addClass('del_pdf');
					return;
				}else{
					$('.move_pdf>iframe').attr('src','');
					
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
	  $('.add_sig').on('click','.ecp_pdf>.add_pdf',function(){
		  var ecp_html = '<li><div class="ecp_pdf">';
  		      ecp_html += '<div class="fa-etc icon-wrapper"><span class="fa fa-refresh"><\/span><\/div>';
			  ecp_html += '<span>更多模板<\/span>';
              ecp_html += '<i class="mode_close"><\/i><\/div><\/li>';        
		  $(this).parents('.add_sig').siblings('ul').append(ecp_html);
	  })
        <?php endif;?>
	    var hfhtml = '';
	    $('.ecp_web').on('click','li',function(){
			var Hf = $(this).find('a').attr('href');
			var tag = $(this).find('a').attr('target');
			var This = $(this);
        <?php if(in_live_edit()){?>
			if(!Hf){
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
				       var xhref = {};
                       var char=This.text(); 
					   var ahtml = '<a href="'+fUrl+'">'+char+'<\/a><i><\/i>';
					   This.html(ahtml);		   
					   var hfhtml = This.parent('ul').html();
					   console.log(hfhtml);
					   xhref = {
								"field_data_0": {
								   'attributes':{
								     'class':'menuli edit',
								     'data-field':This.parent('ul').attr('data-field'),
								     'rel':This.parent('ul').attr('rel'),
								     },
								    'html':hfhtml
								},
								 "is_draft":"true"
                            }
						var xhr = $.ajax({
							type: 'POST',
							url: mw.settings.site_url + 'api/save_edit',
							data: xhref,
							datatype: "json"
						});
						window.open(fUrl + '?editmode=y');
						});
					}
				  },
				  error:function(data){
					alert('新建页面失败，请重新点击！');
				
				  }
			    });
			}else{
						window.open(Hf);
			}
        <?php }else{ ?>
		    if(Hf){
				  $('#content').css('display','none');
				  $('#InlineFrame1').attr('src',Hf);
				  $('#InlineFrame1').css('height','1918px');
				  return false;
			}
        <?php } ?>
		
       })
    });
	
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
</script>
<div id="mw-sliderbarMenu-module-<?php print $params['id']; ?>" style="<?php echo $background;?>;height:0px;">
    <!--<头部>-->
   <iframe name="InlineFrame1" id="InlineFrame1" style="width:1740px;height:0px;z-index:100;" src=''></iframe>
    <div id="wb_PanelMenu1" style="position:absolute;left:0px;top:0px;width:866px;height:0px;z-index:100;" >
    <a href="#PanelMenu1_markup" id="PanelMenu1" class="Panpic1"></a>
      <div id="PanelMenu1_markup">
      <ul class="menuli ecp_web edit" data-field="<?php echo $params['id'];?>-menu1" rel="<?php echo $params['id'];?>">
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
    </div>
    <div id="wb_PanelMenu2" style="position:fixed;right:-279px;top:0px;width:279px;height:100%;z-index:100;    background: #262626;" >
      <a href="#PanelMenu2_markup" id="PanelMenu2" class="Panpic2">
            <div class="right-nav-button" onclick="showClick()">
                <div style="margin:20px 0;">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div><!-- <div class="left-nav-button"> --></a>
      <div id="PanelMenu2_markup">
	  <div class="self_mode edit" data-field="<?php echo $params['id'];?>-modename" rel="<?php echo $params['id'];?>">自定义模块</div>
      <ul class="menuli ecp_menu edit" data-field="<?php echo $params['id'];?>-imgg" data-id="<?php echo $params['id'];?>" rel="<?php echo $params['id'];?>">
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
  		      <div class="fa-etc icon-wrapper"><img src="<?php print $config['url_to_module']; ?>./img/4.png"></div>
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
  		     <div class="add_pdf"></div>
			</div>
		 </div>
          <?php endif;?>
			 <div class="ppdf"></div>
	   <div class="move_pdf">
		  <iframe src="" style="height:1000px;width:1000px;border:0px;"></iframe>
	   </div>
      </div>
    </div>
    
</div>

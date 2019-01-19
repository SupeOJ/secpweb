
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
 
$background =  'background:'. ($layoutBackgound == false ? '#3E3E3E' : $layoutBackgound).';opacity:'.($layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity  );

?>
<style type="text/css">
         #main-content-holder{margin-top: 4px;}
        <?php if(in_live_edit()):?>
        #PanelMenu1_panel {
            top: 52px !important;
        }
        #PanelMenu2_panel {
            top: 52px !important;
        }
        body{
          padding-top:55px !important;
        }
        .add_menu{
          font-size: 16px;
          font-weight: 800;
          padding: 10px 10px 10px 10px;
          color: #fff;
          text-align: center;
          border: 1px #2E2E2E solid;
          cursor: pointer;}
        .add_menu:hover{
          font-weight: 800;
          color: rgba(0, 134, 219, 1);
        }
        <?php endif;?>
       .menuli i{display: none;}
        .menuli li{
          text-align: center;
            padding: 10px 10px 10px 10px;
            color: #F7F7F7;
            border: 1px #2E2E2E solid;
            font-family: Arial;
            font-weight: normal;
            font-size: 13px;
            font-style: normal;
            text-decoration: none;
                position: relative;
                cursor: pointer;
        }
        #wb_PanelMenu1,#wb_PanelMenu2,#PanelMenu1_panel,#PanelMenu2_panel{
          <?php echo $background;?>;
        }
        #PanelMenu1_markup i,#PanelMenu2_markup i,#PanelMenu1>i,#PanelMenu2>i{
			    position: absolute;
                top: -2px;
                font-size: 20px;
font-weight: 500;}
		#PanelMenu1_markup i{ right: 10px;}
		#PanelMenu2_markup i{ left: 10px;}
</style>

<script type="text/javascript">
    mw.moduleJS("<?php print $config['url_to_module']; ?>js/wb.panel.min.js");
    mw.moduleCSS("<?php print $config['url_to_module']; ?>index.css");

    $(document).ready(function()
    {
       $("#PanelMenu1").panel({animate: true, animationDuration: 200, animationEasing: 'linear', dismissible: true, display: 'push', position: 'left', toggle: true});
       $("#PanelMenu2").panel({animate: true, animationDuration: 200, animationEasing: 'linear', dismissible: true, display: 'push', position: 'right', toggle: true});
       $('.add_menu').click(function(){
          var ahtml = "<li>New Menu <i>&times;</i></li>";
          $(this).siblings('ul').append(ahtml);
       })
	    $('.menuli').on('click','li>i',function(){
        $(this).parent('li').remove();
       })
        <?php if(in_live_edit()):?>
       $('.menuli').on('mouseover','li',function(){
          $(this).find('i').css("display","block");
      });
      $('.menuli').on('mouseout','li',function(){
          $(this).find('i').css("display","none");
      });
        <?php endif;?>
	    var hfhtml = '';
	    $('.menuli li').on('click',function(){
			var This = $(this);
		/* 	$('#content>.edit').css('display','none');
			$('#content>div').removeClass('edit');
			var inx = $(this).index();
			var cla = 'etc-add'+inx;
			if($('#content>div').hasClass(cla)){
			  $('.etc-add'+inx).addClass('edit');
			  $('.etc-add'+inx).css('display','block');
			}else{
				var ahtml = '<div class="edit etc-add'+inx+'" field="content'+inx+'" rel="content'+inx+'"><!--123--></div>';
				$('#content').append(ahtml);
			} */
			var Hf = $(this).find('a').attr('href');
			var tag = $(this).find('a').attr('target');
        <?php if(in_live_edit()){?>
			if(!Hf){
				/* if(Hf.indexOf('172.16.5.17') != -1){
					window.open(Hf);
				}
			}else{ */
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
				Arr.parent='0';
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
                       var char=This.find('a').text(); 
					   var ahtml = '<a href="'+fUrl+'">'+char+'<\/a><i>&times;<\/i>';
					   console.log(d);
					   console.log(ahtml);
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
				  $('#InlineFrame1').attr('src',Hf);
				  $('#InlineFrame1').css('height','1918px');
				  return false;
			}
        <?php } ?>
		
       })
    });
</script>
<div id="mw-sliderbarMenu-module-<?php print $params['id']; ?>" style="<?php echo $background;?>;">
    <!--<头部>-->
   <iframe name="InlineFrame1" id="InlineFrame1" style="width:1918px;height:33px;z-index:0;" src=''></iframe>
    <div id="wb_PanelMenu1" style="position:absolute;left:0px;top:0px;width:866px;height:38px;z-index:1;" >
    <a href="#PanelMenu1_markup" id="PanelMenu1"></a>
      <div id="PanelMenu1_markup">
      <ul class="menuli edit" data-field="<?php echo $params['id'];?>-menu1" rel="<?php echo $params['id'];?>">
         <li>About Me <i>&times;</i></li>
         <li>Gallery  <i>&times;</i></li>
         <li>Blog     <i>&times;</i></li>
         <li>Links    <i>&times;</i></li>
      </ul>
          <?php if(in_live_edit()):?>
            <div class="add_menu">+</div>
          <?php endif;?>
      </div>
    </div>
    <div id="wb_PanelMenu2" style="position:absolute;left:868px;top:0px;width:1032px;height:38px;z-index:2;" >
      <a href="#PanelMenu2_markup" id="PanelMenu2"></a>
      <div id="PanelMenu2_markup">
      <ul class="menuli edit" data-field="<?php echo $params['id'];?>-menu2" rel="<?php echo $params['id'];?>">
         <li>Home     <i>&times;</i></li>
         <li>About Me <i>&times;</i></li>
         <li>Gallery  <i>&times;</i></li>
         <li>Blog     <i>&times;</i></li>
         <li>Links    <i>&times;</i></li>
      </ul>
          <?php if(in_live_edit()):?>
            <div class="add_menu">+</div>
          <?php endif;?>
      </div>
    </div>
    
</div>

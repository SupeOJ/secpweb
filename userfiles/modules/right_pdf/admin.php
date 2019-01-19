

<?php

?>
<style>
#mw-siderbar-content{border: 1px solid #e5e5e5;}
img#upload_icon{border: 1px solid #ccc;}
.table_tree{padding: 5px;}
      body {
        font-family: arial;
        background: rgb(242, 244, 246);
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      h3 {
        color: rgb(199, 204, 209);
        font-size: 28px;
        text-align: center;
      }

      #elements-container {
        text-align: center;
      }

      .draggable-element {
        display: inline-block;
        width: 200px;
        height: 200px;
        background: white;
        border: 1px solid rgb(196, 196, 196);
        line-height: 200px;
        text-align: center;
        margin: 10px;
        color: rgb(51, 51, 51);
        font-size: 30px;
        cursor: move;
      }

      .drag-list {
        width: 400px;
        margin: 25px auto;
		margin-bottom: 40px;
      }

      .drag-list > li {
        list-style: none;
        background: #F2F2F2;
        border: 1px solid #D4D4D4;
        margin: 5px 0;
        font-size: 18px;
		border-radius: 3px;
		font-family: 'Open Sans', sans-serif;
      }

      .drag-list .title {
        display: inline-block;
        width: 130px;
        padding: 6px 6px 6px 12px;
        vertical-align: top;
      }

      .drag-list .drag-area {
        display: inline-block;
        background: rgb(158, 211, 179);
        width: 40px;
        height: 35px;
        vertical-align: top;
        float: left;
        cursor: move;
		font-size: 28px;
		line-height: 33px;
        text-align: center;
		color:#999;
      }
    .mw-icon-drag{}
      .code {
        background: rgb(255, 255, 255);
        border: 1px solid rgb(196, 196, 196);
        width: 600px;
        margin: 22px auto;
        position: relative;
      }

      .code::before {
        content: 'Code';
        background: rgb(80, 80, 80);
        width: 96%;
        position: absolute;
        padding: 8px 2%;
        color: rgb(255, 255, 255);
      }
      
      .code pre {
        margin-top: 50px;
        padding: 0 13px;
        font-size: 1em;
      }
      .drag-list .mw-ui-btn-small{
		  height:35px;
		  line-height:30px;
		border-radius: 3px;
	  }
	  .mw-ui-row-nodrop{margin-bottom:15px;}
</style>
<script type="text/javascript">mw.require("files.js");</script>

<div  class="module-live-edit-settings" id="mw-siderbar-content">	
  <a href="javascript:void(0);" class="mw-ui-btn mw-ui-btn-medium" id="add_sliderbar"><span class="mw-icon-plus"></span><span>
  添加显示框  </span></a>

    <section class="showcase showcase-2">
      <?php 
		  $pam['userid'] = user_id();
		  $pam['contentid'] = trim(substr($params['id'],17,-10));
		  $menus = get_pdf('',$pam);
	  if(!empty($menus)){ ?>
      <ul class="drag-list">
      <?php foreach($menus as $item ) :?>
	  
        <li pdfid="<?php echo $item['id']; ?>"><span class="title"><?php echo $item['title']; ?></span><span class="drag-area"></span>
                        <span class="mw-ui-btn mw-ui-btn-small  pull-right" onclick="menu_item_delete(<?php print $item['id'];?>);">删除</span>
                        <span class="mw-ui-btn mw-ui-btn-small  pull-right" onclick="edtpdf_Click(<?php print $item['id'];?>)">编辑</span>
		</li>
      <?php endforeach;?>
      </ul>
      <?php }else{ ?>
	   <h4 style="text-align:center;">你还没有侧边显示内容请添加</h4>
      <?php } ?>
    </section>
</div>

    <script type="text/javascript" src="<?php print $config['url_to_module']; ?>js/drag-arrange.js"></script>

    <script type="text/javascript">
      $(function() {
          $('.draggable-element').arrangeable();
          $('li').arrangeable({dragSelector: '.drag-area'});
      });
	  
       $('.drag-list').on('mouseover','li',function(){
          $(this).find('.drag-area').addClass('mw-icon-drag');
      });
      $('.drag-list').on('mouseout','li',function(){
          $(this).find('.drag-area').removeClass('mw-icon-drag');
      });
	$(document).ready(function(){

	 var uploader = mw.uploader({
		filetypes:"images",
		multiple:false,
		element:"#mw_uploader_icon"
		  });
	  $(uploader).bind("FileUploaded", function(event, data){
			  mw.$("#mw_uploader_loading").hide();
			  mw.$("#mw_uploader_icon").show();
			  mw.$("#upload_info_icon").html("");
			  $('.sliderbar_icon').val(data.src);
			  $('#upload_icon').attr('src',data.src).show();
		  });

		$(uploader).bind('progress', function(up, file) {
			mw.$("#mw_uploader_loading").show();
			mw.$("#upload_info_icon").html(file.percent + "%");
		 });

		$(uploader).bind('error', function(up, file) {
			mw.notification.error("The file is not uploaded.");
		});

	 });
//编辑页信息
function edtpdf_Click($id){
    $.get("<?php print api_link('get_pdfid'); ?>/?id="+$id, function(obj){
		obj = obj[0];
        var frame = $("#add_sliderbar_content");
        frame.find(".sliderbar_id").val(obj.id);
        frame.find(".sliderbar_title").val(obj.title);
        frame.find(".sliderbar_url").val(obj.url);
        frame.find(".sliderbar_icon").val(obj.icon);
        if(obj.icon){frame.find(".sliderbar_icon").val(obj.icon);$('#upload_icon').attr('src',obj.icon).show();}
        // if(obj.is_blank) $('input[name="is_blank"][value="'+obj.is_blank+'"]').attr('checked','checked');
        frame.find(".sliderbar_is_text").find('option[value="'+obj.is_text+'"]').attr('selected','selected');
        frame.find(".sliderbar_parent_id").find('option[value="'+obj.parent_id+'"]').attr('selected','selected');
        if(obj.only_icon) {frame.find('input[name="only_icon"][value="'+obj.only_icon+'"]').attr('checked','checked');}
        //frame.find('input[name="is_text"][value="'+dataobj.data.info.is_show+'"]').attr('check',true);
        $('#add_sliderbar_content').slideToggle(100);
        $('#sliderbarList').slideToggle(100);

    });
}

//删除数据
function menu_item_delete($id){
   var msg = "确定删除该条数据？";  
	if (confirm(msg)==true){  
         $.get("<?php print api_link('content/menu_item_delete'); ?>/?id="+$id, function(){
                window.location.href = window.location.href;
                mw.reload_module_parent("top_nav");
          });
		return true;  
	}else{  
		return false;  
	}  
	
}
			
//菜单提交事件
var edit_sliderbar=function(){
    var frame = $("#add_sliderbar_content");
    var data_to_save={
        id : frame.find(".sliderbar_id").val(),
        title :  frame.find(".sliderbar_title").val(),
        url :  frame.find(".sliderbar_url").val(),
        icon : frame.find(".sliderbar_icon").val(),
		userid : '<?php echo user_id();?>',
		content_id:'<?php echo trim(substr($params['id'],17,-10));?>',
		item_type:"pdf"
    }
	console.log(data_to_save);
    $.post("<?php print api_link('content/menu_item_save') ?>",  data_to_save, function(data){
        window.location.href = window.location.href;
        mw.reload_module('top_nav');
        mw.reload_module_parent("top_nav");
		 if(mw.notification != undefined){
                mw.notification.success('<?php _e('Menu changes are saved'); ?>');
            }
    });

}
    </script>
<div id="add_sliderbar_content" style="padding:20px;display: none;">
    <form id='form'>
     <label class="mw-ui-label" style="text-align: center;">
        <span> 显示框内容</span>
     </label>
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col" style="width: 15%">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <span> 名称：</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col" style="width: 70%">
            <input type="hidden" name="text"  value="" class="mw-ui-field w100 sliderbar_id"/>
            <input type="text" name="text" class="mw-ui-field w100 sliderbar_title" value="" placeholder="" />
        </div>
    </div>
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col" style="width: 15%">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <span> URL地址：</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col" style="width: 70%">
            <input type="text" name="text" class="mw-ui-field w100 sliderbar_url" value="" placeholder="" />
        </div>
    </div>
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col" style="width: 20%">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <!-- <span> 上传图片：</span>    -->
            <span id="mw_uploader_icon" class="mw-ui-btn">
                <span class="ico iupload"></span>
                <span>上传图片<span id="upload_info_icon"></span>
                </span>
            </span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col" style="width: 80%">

            <img id="upload_icon" src="" style="width:54px;height:54px;display: none;" />
            <input type="hidden" name="text" class="mw-ui-field w100 sliderbar_icon" value="" placeholder="" />
        </div>
    </div>
    </form>
        <div class="mw-ui-row-nodrop">
            <div class="mw-ui-col" style="width:20%"></div>
            <div class="mw-ui-col">
                <button class="mw-ui-btn" id="" style="width:100px;" onclick="edit_sliderbar()">确定</button>
                <button class="mw-ui-btn" id="" style="width:100px;" onclick="cancel_sliderbar()">取消</button>
            </div>

        </div>

    </div>
	<script type="text/javascript">
//打开添加菜单页
$('#add_sliderbar').click(function(){
    $('#add_sliderbar_content').slideToggle(100);
    $('#sliderbarList').slideToggle(100);
});



var cancel_sliderbar = function(){
        $("#form")[0].reset();
        $('#add_sliderbar_content').slideToggle(100);
        $('#sliderbarList').slideToggle(100);
}
</script>
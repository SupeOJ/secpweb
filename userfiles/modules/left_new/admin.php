

<?php


$items = mw()->sliderbar_manager->getTreeList();

?>
<style>
#mw-siderbar-content{border: 1px solid #e5e5e5;}
img#upload_icon{border: 1px solid #ccc;}
.table_tree{padding: 5px;}
</style>
<script type="text/javascript">mw.require("files.js");</script>
<div class="mw-sliderbar">




<div class="menu-module-wrapper" id="mw-siderbar-content">
<div id="sliderbarList">
<a href="javascript:void(0);" class="mw-ui-btn mw-ui-btn-medium" id="add_sliderbar"><span class="mw-icon-plus"></span><span>
  添加菜单  </span></a>
    <table class="table_tree">
        <thead>
            <tr><th style="width:80%">菜单名称</th><th style="width:20%">操作</th></tr>

        </thead>
        <tbody>
            <?php foreach($items as $item ) :?>

                <tr>
                    <td><?php echo $item['fullname'];?></td>
                    <td>
                        <span class="mw-ui-btn mw-ui-btn-small  pull-right" onclick="mw.sliderbar_item_delete(<?php print $item['id'];?>);">删除</span>
                        <span class="mw-ui-btn mw-ui-btn-small  pull-right" onclick="mw.sliderbar_item_edit(<?php print $item['id'];?>);">编辑</span>
                    </td>
                </tr>

            <?php endforeach;?>
        </tbody>
    </table>
</div>



<?php $sliderbarTime = time();?>
<div id="add_sliderbar_content" style="padding:20px;display: none;">
    <form id='form'>
     <label class="mw-ui-label" style="text-align: center;">
        <span> 菜单项</span>
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
                        <span> 父级菜单：</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col" style="width: 70%">
            <select class="mw-ui-field sliderbar_parent_id w100">
                <option  value="0">无上级菜单</option>
                <?php foreach ($items as $value): ?>
                    <option  value="<?php print $value['id'];?>"><?php print $value['fullname'];?></option>
                <?php endforeach ?>
            </select>
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
        <div class="mw-ui-col" style="width: 15%">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <span> 排序：</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col" style="width: 70%">
            <input type="text" name="text" class="mw-ui-field w100 sliderbar_position" value="" placeholder="" />
        </div>
    </div>
    <div class="mw-ui-row-nodrop">
        <div class="mw-ui-col" style="width: 15%">
            <div class="mw-ui-col-container">
                <div class="mw-ui-field-holder">
                    <label class="mw-ui-check">
                        <span> 显示方式</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mw-ui-col" style="width: 70%">
            <select class="mw-ui-field sliderbar_is_text">
                <option  value="0">图文显示</option>
                <option  value="1">文本显示</option>
            </select>
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

<script type="text/javascript">

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
</script>

    <div class="mw-ui-row-nodrop">
            <div class="mw-ui-col">
                <div class="mw-ui-col-container">
                    <div class="mw-ui-field-holder">
                        <label class="mw-ui-check">
                            <span> 只显示图片</span>
                            <input type="checkbox" class="sliderbar_only_icon" name="only_icon" value='1' />
                            <span></span>
                        </label>
                    </div>
                </div>
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


</div>
<script  type="text/javascript">
    mw.require('forms.js', true);
</script>
<script type="text/javascript">



//打开添加菜单页
$('#add_sliderbar').click(function(){
    $('#add_sliderbar_content').slideToggle(100);
    $('#sliderbarList').slideToggle(100);
});

//菜单提交事件
var edit_sliderbar=function(){
    var frame = $("#add_sliderbar_content");
    var data_to_save={
        id : frame.find(".sliderbar_id").val(),
        parent_id :  frame.find(".sliderbar_parent_id").val(),
        title :  frame.find(".sliderbar_title").val(),
        url :  frame.find(".sliderbar_url").val(),
        position :  frame.find(".sliderbar_position").val(),
        is_text :  frame.find(".sliderbar_is_text").val(),
        icon : frame.find(".sliderbar_icon").val(),
        only_icon :  frame.find(".sliderbar_only_icon").is(':checked')  ? 1 : 0,
        pa_web :  'newtemp'
    }
    $.post("<?php print api_link('sliderbar_item_create') ?>",  data_to_save, function(data){
        window.location.href = window.location.href;
        mw.reload_module('top_nav');
        mw.reload_module_parent("top_nav");
    });

}

//删除数据
mw.sliderbar_item_delete = function($id){
    mw.tools.confirm(mw.msg.del, function(){
         $.get("<?php print api_link('sliderbar_item_delete'); ?>/?id="+$id, function(){
                window.location.href = window.location.href;
                mw.reload_module_parent("top_nav");
          });
    });

}

//编辑页信息
mw.sliderbar_item_edit = function($id){
    $.get("<?php print api_link('sliderbar_item_get'); ?>/?id="+$id, function(obj){
        var frame = $("#add_sliderbar_content");
        frame.find(".sliderbar_id").val(obj.id);
        frame.find(".sliderbar_title").val(obj.title);
        frame.find(".sliderbar_url").val(obj.url);
        frame.find(".sliderbar_position").val(obj.position);
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

var cancel_sliderbar = function(){
        $("#form")[0].reset();
        $('#add_sliderbar_content').slideToggle(100);
        $('#sliderbarList').slideToggle(100);
}
</script>
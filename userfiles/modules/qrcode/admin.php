<?php 
only_admin_access();

$database = '[{"link":"http://www.zhongyajituan.cn/","name":"中亚集团","logo":"http://172.16.5.17:8553/userfiles/cache/thumbnails/qrcode/154546149445184.png","length":"6"},{"link":"http://www.baidu.com","name":"百度","logo":"http://172.16.5.17:8553/userfiles/cache/thumbnails/qrcode/15454614185205.png","length":"6"}]';
$qrcode_settings = get_option('qrcode_settings', $params['id']);
$qrcode_settings = $qrcode_settings ? $qrcode_settings : $database;
?>
<style type="text/css">
    .add-code{
        height: 33px;
        background: #fff;
        border: 1px #ccc solid;
        width: 87px;
        border-radius: 4px;
    }
     table.gridtable {
      font-family: verdana,arial,sans-serif;
      font-size:11px;
      color:#333333;
      border-width: 1px;
      border-color: #ccc;
      border-collapse: collapse;
      margin-top: 10px;
      table-layout:fixed;
     }
     table.gridtable th {
         border-width: 1px;
         padding: 8px;
         border-style: solid;
         border-color: #ccc;
         background-color: #fff;
         width: 91px;
     }
     table.gridtable td {
         border-width: 1px;
         padding: 8px;
         border-style: solid;
         border-color: #ccc;
         background-color: #ffffff;
         width: 91px;
         text-align: center;
      table-layout:fixed;
         word-wrap:break-word;
         word-break:break-all
     }
     table.gridtable td>span {cursor: pointer;}
     table.gridtable img {width: 50px;}
     .qrcode-img{    
        width: 120px;
        height: 120px;
        margin-top: 10px;
        float: left;
     }
     .qrcode-img>div{
      height: 120px;
      width: 120px;
      border: 1px #ccc solid; 
     }
     .qrcode-img img{
          min-height: 118px;
          width: 118px;
     }
     .qrcode-form{
        line-height: 50px;
        margin-left: 120px;
     }
     .sing-info>label{
        width: 75px;
        display: inline-block;
        text-align: right;
     }
     .sing-info>input{        width: 163px;height: 30px;}
     .qrcode-img>input{
          height: 30px;
          margin-top: 6px;
          width: 124px;
     }
     .etc-qrcode>span {
        height: 31px;
        width: 51px;
        background: #fff;
        border: 1px #ccc solid;
        border-radius: 3px;
        margin-right: 100px;
        margin-top: 53px;
        display: inline-block;
        text-align: center;
        line-height: 30px;
        cursor: pointer;
     }
     .edit-link,.edit-code{
        margin-left: 8px;
        background: #fff;
        border: 1px #999 solid;
        height: 23px;
        width: 61px;
        cursor: pointer;
    }
    #upload_codeicon{
          height: 51px;
          position: absolute;
          right: 100px;
    }
</style>
<div class="moduleAdmin-caContent module-live-edit-settings" style="margin-top: 10px;">
<input type="hidden" class="mw_option_field mw-ui-field qrcode_settings" name="qrcode_settings" value="<?php echo $qrcode_settings;?>" />
   <div class="code-info" style="min-height: 200px;">
       <button class="add-code">添加</button>
       <table class="gridtable">
           
            <?php 
          if(!empty($qrcode_settings)){
            $qrarr = json_decode($qrcode_settings,true);
            if(!empty($qrarr)){ ?>
        <tr>
           <th style="width: 15%;">
               名称
           </th>
           <th style="width: 20%;">
               图标
           </th>
           <th style="width: 25%;">
               网址链接
           </th>
           <th style="width: 10%;">
               尺寸
           </th>
           <th style="width: 25%;">
               操作
           </th>
        </tr>
              <?php foreach ($qrarr as $key => $value) { 
               ?>
              <tr>
                <td style="width: 15%;"> <?php echo $value['name'] ?> </td>
                <td style="width: 20%;"> <img src="<?php echo $value['logo'] ?>"> </td>
                <td style="width: 25%;"> <?php echo $value['link'] ?> </td>
                <td style="width: 10%;"> <?php echo $value['length'] ?> </td>
                <td style="width: 25%;"> <span class="edit-qrinfo" qrid="<?php echo $key+1; ?>">编辑 </span>| 
                  <span class="del-qrinfo" qrid="<?php echo $key+1; ?>">删除 </span></td>
              </tr>
              <?php 
                } ?>
            <?php }else{
              echo '<br><h3>请添加内容！</h3>';
              }
              } ?>
       </table>
   </div> 
   <div class="add-codeinfo" style="display:none">
      <div class="qrcode-img">
            <div><img src=""></div>
            <input type="hidden" name="qrcode" value="">
            <input type="hidden" name="qrid" value="">
            <input type="text" name="qrinfo" value="">
      </div>
      <div class="qrcode-form">
          <form>
            <div class="sing-info">
                <label>网址链接：</label>
                <input type="text" name="qrlink" value=""> 
                <span class="edit-link">设置链接</span>
            </div>
            <div class="sing-info">
                <label>尺寸：</label>
              <input type="number" name="qrlength" value="">&nbsp;( 1-10 )
            </div>
            <div class="sing-info">
                <label>图标：</label>

            <span id="mw_uploader_qricon" class="mw-ui-btn">
                <span class="ico iupload"></span>
                <span>修改图标<span id="upload_info_qricon"></span>
                </span>
            </span>
            <img id="upload_codeicon"  src="">
            <input type="hidden" name="qrico" value="">
            </div>
            <div class="etc-qrcode" style="text-align: center;">
                <span class="save-code">保存</span>
                <span class="consle-code">取消</span>
            </div>
          </form>
      </div>
   </div>

</div>
<script type="text/javascript">mw.require("files.js");</script>
<script type="text/javascript">
    $('.add-code').click(function(){
        $(this).parent().css('display','none');
      $('.add-codeinfo').css('display','block');
    })
    var Link = 0;
$(document).ready(function(){
    $('.consle-code').click(function(){
    setTimeout(function(){window.location.reload();},800);
      $('.code-info').css('display','block');
      $('.add-codeinfo').css('display','none');
    })
   
    $('.edit-link').click(function(){
     if($('[name=qrlink]').val()){
      Link = 1;
       var qrlink  =  $('[name=qrlink]').val();
       var qrlength = $('[name=qrlength]').val();
       var qrico = $('[name= qrico]').val();
        $.post("<?php print site_url(); ?>api/newpic",{qrlink:qrlink,qrlength:qrlength,qrico:qrico},function(result){
          console.log(result);
          $(".qrcode-img img").attr('src',result);
          $("[name=qrcode]").val(result);
          return;
        });
     }else{
          Link = 0;
          alert('请填写链接地址！');
          return false;
     }
    })
   var quploader = mw.uploader({
      filetypes:"images",
      multiple:false,
      element:"#mw_uploader_qricon"
    });

  $(quploader).bind("FileUploaded", function(event, data){
           mw.$("#mw_uploader_loading").hide();
           $('#upload_codeicon').attr('src',data.src).show();
           if(Link == 1){
               if($('[name=qrlink]').val()){
                Link = 1;
                 var qrlink  =  $('[name=qrlink]').val();
                 var qrlength = $('[name=qrlength]').val();
                 var qrico = data.src;
                  $.post("<?php print site_url(); ?>api/newpic",{qrlink:qrlink,qrlength:qrlength,qrico:qrico},function(result){
                    $(".qrcode-img img").attr('src',result);
                    $("[name=qrcode]").attr('src',result);
                    return;
                  });
               }else{
                    $('[name=qrcode]').val(data.src);
                    $('[name=qrico]').val(data.src);
                    return;
               }
           }else{
             $('[name=qrico]').val(data.src);
             $('[name=qrcode]').val(data.src);
             $('.qrcode-img img').attr('src',data.src);
           }
          
      });

    $(quploader).bind('progress', function(up, file) {
        mw.$("#mw_uploader_loading").show();
        mw.$("#upload_codeinfo_icon").html(file.percent + "%");
     });

    $(quploader).bind('error', function(up, file) {
        mw.notification.error("The file is not uploaded.");
    });

    $('.save-code').click(function(){
       var qrcode = $('[name= qrcode]').val();
       if(!qrcode){
          alert('请填写内容！');
          return false;
       }
      var json = '<?php echo $qrcode_settings;?>';//qrcode_settings
      var qrarr = new Array();
      var singarr = {};
      if(json){
        qrarr = JSON.parse(json); //json转数组  数组转json: JSON.stringify(arr);
      }
      singarr['link'] = $('[name=qrlink]').val();
      singarr['name'] = $('[name=qrinfo]').val();
      singarr['logo'] = $('[name=qrcode]').val();
      singarr['length'] = $('[name=qrlength]').val();
      if($('[name=qrid]').val()){
        var qrid = $('[name=qrid]').val()-1;
        qrarr.splice(qrid,1,singarr);
      }else{
        if(qrarr.length >=4){
          alert('最多只能添加四条数据！');
          return false;
        }
         qrarr.push(singarr);
      }
       //console.log(singarr);
       //console.log(JSON.stringify(qrarr));
       $('[name=qrcode_settings]').val(JSON.stringify(qrarr));
       $('.qrcode_settings').change();  
    setTimeout(function(){window.location.reload();},800);
    })

    $('.del-qrinfo').click(function(){
          var json = '<?php echo $qrcode_settings;?>';//qrcode_settings
          var qrid = $(this).attr('qrid')-1;
          if(json){
            var qrarr = JSON.parse(json); //json转数组  数组转json: JSON.stringify(arr);
           qrarr.splice(qrid,1);
           //delete qrarr[qrid];
          console.log(qrarr);
           $('[name=qrcode_settings]').val(JSON.stringify(qrarr));
        setTimeout(function(){window.location.reload();},800);
           $('.qrcode_settings').change();  
          }
    })
    $('.edit-qrinfo').click(function(){
          var json = '<?php echo $qrcode_settings;?>';//qrcode_settings
          var qrid = $(this).attr('qrid')-1;
          if(json){
            var qrarr = JSON.parse(json); //json转数组  数组转json: JSON.stringify(arr);
          $('[name=qrlink]').val(qrarr[qrid]['link']);
          $('[name=qrinfo]').val(qrarr[qrid]['name']);
          $('[name=qrlength]').val(qrarr[qrid]['length']);
          $('[name=qrcode]').val(qrarr[qrid]['logo']);
          $('.qrcode-img img').attr('src',qrarr[qrid]['logo']);
          $('[name=qrid]').val($(this).attr('qrid'));
          $('.code-info').css('display','none');
          $('.add-codeinfo').css('display','block');
          }
    })
 });
</script>

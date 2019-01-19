<?php

/*

type: layout

name: upload zip html

position: 14

*/

?>

<?php 

$iframe = get_option('iframe',$params['id']);
$iframe = $iframe == false ? 'n' : $iframe;

$is_default = get_option('is_default',$params['id']);
$is_default = $is_default == false ? 'false' : $is_default;

if($iframe != 'n'){

    $obj = json_decode($iframe)[0];
    if($obj){
        $arr = object_to_array($obj);
        if($is_default == 'false') {
            $index_html = isset($arr['index.html']) && $arr['index.html'] ? $arr['index.html'] : reset($arr);
        }else{
            $index_html = $is_default;
        }


    }else{
         $index_html = $iframe;
    }



}



/**
 * 对象 转 数组
 *
 * @param object $obj 对象
 * @return array
 */
function object_to_array($obj) {
    $obj = (array)$obj;
    foreach ($obj as $k => $v) {
        if (gettype($v) == 'resource') {
            return;
        }
        if (gettype($v) == 'object' || gettype($v) == 'array') {
            $obj[$k] = (array)object_to_array($v);
        }
    }
 
    return $obj;
}




//exit;

?>

<style type="text/css">


.etc-zip{ text-align: center;}
body.dragStart #frame-<?php print $params['id'] ?>{z-index: -1000!important;}
.zip-module-default-view {
    cursor: pointer;
    text-align: center;
}

</style>


<div id="<?php print $params['id'] ?>"  field="layout-skin-69-<?php print $params['id'] ?>" rel="module">
 <?php if($iframe == 'n'): ?>
  
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="mw-row" style="margin:50px 0;" >
                <div class="etc-zip" >   
                    <span id="mw_uploader-<?php print $params['id'] ?>" class="up-zip">
                        <img src="<?php echo $config['url_to_module'];?>img/zip.png">
                    </span>
                </div>       

                
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    
     <iframe class="edit" src="<?php echo $index_html;?>" frameborder="0" allowfullscreen width="100%" height="100%" id="frame-<?php print $params['id'] ?>" onload="setIframeHeight(this)"></iframe>

<?php endif; ?>
</div>


<script type="text/javascript">

$(document).ready(function(){
    if (!mw.settings.liveEdit) {
        $("#<?php print $params['id'] ?> container").css("display", "none");
    };

//上传文件
 var uploader = mw.uploader({
        filetypes:"files",
        multiple:true,
        unzip:'unzip',
        element:"#mw_uploader-<?php print $params['id'] ?>"
  });

  $(uploader).bind("FileUploaded", function(event, data){
        mw.$("#mw_uploader<?php print $params['id'] ?>").show();

        var opdata = {};
        opdata.option_group = "<?php print $params['id'] ?>";
        opdata.option_key = "iframe";
        opdata.option_value  = '['+ JSON.stringify(data.uploaded_templates) + ']';
        if(data.uploaded_templates =='' || data.uploaded_templates ==null ) {
            opdata.option_value = data.src;
        }
         console.log(data);
        $.post("<?php print api_url('save_option') ?>", opdata, function (resp) {
           mw.reload_module('#<?php print $params['id'] ?>');
        });
   
    });

    $(uploader).bind('progress', function(up, file) {  
        mw.$("#mw_uploader-<?php print $params['id'] ?>").hide();
     });

    $(uploader).bind('error', function(up, file) {
        mw.notification.error("文件没有上传成功.");   
    });




    //iframe页面hover 触发module事件onModuleOver
    $('#frame-<?php print $params['id'] ?>').hover(function(){
         $(window).trigger("onModuleOver", $('#<?php print $params['id'] ?>'));
    });


 });


 <?php if($iframe != 'n'): ?>
    //iframe 页面自适应宽高
    function setIframeHeight(iframe) {
        if (iframe) {
            var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
            if (iframeWin.document.body) {
                iframe.height = iframeWin.document.body.scrollHeight ||iframeWin.document.documentElement.scrollHeight;
                console.log(iframe.height);
            }
        }
    };

    window.onload = function () {
        setIframeHeight(document.getElementById('frame-<?php print $params["id"]; ?>'));
    };

// 冒泡方式给 iframe 添加 onclick 事件
function setEvent() {
    try {
        for(var i = 0; i<window.frames.length; i++) {
            window.frames[i].document.onclick = function() {           
               //console.log(window.frames[0].window.location.href);
              setIframeHeight(document.getElementById('frame-<?php print $params["id"]; ?>'));
               
            }
        }
    } catch(e) {}
    timeHandle = setTimeout(setEvent,50);
}
setEvent();


<?php endif; ?>

</script> 
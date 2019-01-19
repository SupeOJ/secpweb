<?php 
$orgchart_settings = get_option('orgchart_settings',$params['id']);
$datascource = '{"id":"1","name":"中心主题","children":[{"id":"2", "name":"分支主题一","children":[{"id":"5","name":"子主题一"},{"id":"6","name":"子主题二"},{"id":"7","name":"子主题三"}]},{"id":"3","name":"分支主题二"},{"id":"4", "name":"分支主题三"}]}';

$orgchart_settings = $orgchart_settings == false ? $datascource : $orgchart_settings;


$direction = get_option('direction',$params['id']);
$direction = $direction ? $direction :'t2b';
 
$orgchart_width = get_option('orgchart_width', $params['id']);
$orgchart_width = $orgchart_width == false ? 160 : $orgchart_width;

$orgchart_height = get_option('orgchart_height', $params['id']);
$orgchart_height = $orgchart_height == false ? 50 : $orgchart_height;


$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? 'transparent' : $layoutBackgound;
$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;  
?>
<style>
.createChart{border: 1px solid #999;padding: 10px 0 14px 0;border-radius: 3px;}
.orgchart_width,.orgchart_height{width:50px;}
.orgchart_lists{padding-top: 20px;}
.orgchart-settings .orgchart-set-field tr{height:30px; }
.showCreate {border: 1px solid #999;padding: 5px 15px;background: #eee;cursor:pointer; }
.createChart tr td {padding:10px 10px 0px 0px;}
.createChart tr td:nth-child(3){padding:10px 0px 0px 10px;}
.createChart tr td input{width: 100px;}
.createChart .create-btn{padding: 2px 10px;background: #eee;border: 1px solid #999;border-radius: 5px;}
.datalists tr td {padding:10px 10px 0px 0px;width:30%;}
.datalists tr td input,.datalists tr td select{padding:2px 0;width:100%;text-align: center;}
.datalists tr td:nth-child(3){padding:10px 0px 0px 10px;}
.datalists tr td a {padding: 2px 18px;border: 1px solid #999;border-radius: 5px;}
</style>
<script>
    mw.moduleCSS('<?php print module_url(); ?>../../layouts/css/jquery.range.css');
    mw.moduleJS('<?php print module_url(); ?>../../layouts/js/jquery.range.js');
</script>
<input type="hidden" class="mw_option_field orgchart_settings" name="orgchart_settings" value="<?php print $orgchart_settings;?>" />
<div class="orgchart-settings">
  <table class="orgchart-set-field">
    <tr>
      <td style="width:90px;">尺寸大小设置</td>
      <td>

      <input class="orgchart_width mw_option_field" type="number" name="orgchart_width" min="0" max=""  value="<?php print $orgchart_width ?>" /> 
      &nbsp;&nbsp;宽&nbsp;&nbsp;&nbsp;&nbsp;
      <input class="orgchart_height mw_option_field" type="number" name="orgchart_height" min="0" max="" value="<?php print $orgchart_height?$orgchart_height:10 ?>"  /> &nbsp;&nbsp;高
      </td>
    </tr>
    <tr>
      <td>背景色设置</td>
      <td>
        <span id="bg-color-pick" style="display:inline-block;padding:10px 20px;background: <?php print $layoutBackgound ? $layoutBackgound : '#666';?>;"></span>
        <input type="hidden" name="layoutBackgound"  class="layoutBackgound mw_option_field" value="<?php print $layoutBackgound;?>" />
      </td>
    </tr>
    <tr>
      <td>透明度设置</td>
      <td>
        <input type="hidden" class="range-slider-opacity " value="<?php print $layoutBackgoundOpacity ? $layoutBackgoundOpacity: 1;?>" />
        <input name="layoutBackgoundOpacity" type="hidden" class="mw-ui-btn mw_option_field layout_backgound_opacity" value="<?php print $layoutBackgoundOpacity;?>" />
      </td>
    </tr>
    <tr>
      <td>层级图设置</td>
      <td>
        <select class="direction mw_option_field" name="direction" style="padding:4px;">
            <option <?php if($direction=='t2b'){ print 'selected';}?> value="t2b">图级层向下</option>
            <option <?php if($direction=='b2t'){ print 'selected';}?> value="b2t">图级层向上</option>
            <option <?php if($direction=='r2l'){ print 'selected';}?> value="r2l">图级层向左</option>
            <option <?php if($direction=='l2r'){ print 'selected';}?> value="l2r">图级层向右</option>            
        </select>
      </td>
    </tr>
  </table>

  </hr>
  <a class="showCreate">添加数据</a>

  <div class="createChart" style="display: none;">
    <table>
      <tr>
        <td>输入名称&nbsp;&nbsp;<input type="text" class="chart-name" value=""></td>
        <td>选择上级&nbsp;&nbsp;<select class="chart-parent_id "></select></td>
        <td><a class="create-btn"  href="javascript:chart.create()">添加</a></td>
      </tr>
    </table>
  </div>
<div>

</div>

<div class="orgchart_lists">
  <table>
  <thead>
    <tr align="center" >
      <td>名称</td>
      <td>上级</td>
      <td>操作</td>
    </tr>
  </thead>
  <thead class="datalists"></thead>
  </table>
</div>
<div >


<script type="text/javascript">
var json = <?php echo $orgchart_settings;?>;


///架构的增删改
var chart = {
  create : function(){
    var data = {};
    data.id = new Date().getTime();
    data.parent_id = $('.chart-parent_id').val();
    data.name = $('.chart-name').val();
    if(data.name=="" || data.name==null) {return false;}
    outputData.push(data);//console.log(outputData);
    chart.save();
  },
  delete : function(index) {  
    // delete outputData[index];删除后empty,
    outputData.splice(index,1);//console.log(outputData);
    chart.save();

  },
  edit : function(index) {
    var data = {}; 
    data.name = $('.item-list-' + index + '  .item-name').val();
    data.parent_id = $('.item-list-' + index + '  .item-parent_id').change().val();
    data.id = $('.item-list-' + index + '  .item-id').val();
    // console.log(data);
    outputData[index] = data;//console.log(outputData);
    chart.save();

  },
  save : function() {
    var dataList = transData(outputData, 'id', 'parent_id', 'children');
    $('.orgchart_settings').val(JSON.stringify(dataList[0]));
    $('.orgchart_settings').change();  
    setTimeout(function(){window.location.reload();},800);
 
  }

}


/////////son树状结构转一维
var jsonData = [JSON.parse(<?php echo "'".$orgchart_settings."'";?>)];
  outputData = [],
  parentId = 0;
function convert( data, parentId ,level = 0){
  $.each( data, function(index, item) {
    outputData.push({
      id: item.id,
      parent_id: parentId,name:item.name,
      level : level
    });

    if(item.hasOwnProperty('children')){
      level++;
      convert(item.children, item.id,level );
      level--;
    }
  });
}  

convert( jsonData, 0 );
  


$('.showCreate').click(function() {
    $('.createChart').slideToggle(100);
});
$('.chart-parent_id').empty().html(selectList(0,0));
showList();

function showList(){
  var listStr = '';
  $.each(outputData,function(index,item) {
    if(item.id == 1) {
      listStr += '<tr class="item-list-' + index + '">';
      listStr += '<td><input class="item-name"  value="' + item.name+ '" />';
      listStr += '<input type="hidden" class="item-id"  value="' + item.id+ '" /></td>';      
      listStr += '<td><select class="item-parent_id" disabled="disabled" ><option selected value="0">无</option>' + selectList(item.parent_id,item.id) + '</select></td>';
      listStr += "<td><a class='' href='javascript:chart.edit(" + index + ")'>确定</a></td>" ;  
      listStr += '</tr>' ;     
    }else {
      listStr += '<tr class="item-list-' + index + '">';
      listStr += '<td><input class="item-name w100"  value="' + item.name+ '" />';
      listStr += '<input type="hidden" class="item-id"  value="' + item.id+ '" /></td>';      
      listStr += '<td><select class="item-parent_id">' + selectList(item.parent_id,item.id) + '</select></td>';
      listStr += "<td><a class='' href='javascript:chart.edit(" + index + ")'>确定</a>" ;  
      listStr += "<a class='' href='javascript:chart.delete(" + index + ")'>删除</a></td>" ;
      listStr += '</span><tr>';      
    }

  });
  $('.datalists').empty().html(listStr);
}

//选择父级
function selectList(pid,id){
  var optionStr = '';
  $.each(outputData,function(index,item) {
    var optionHtml = '';
    if(id == item.id) optionHtml += 'disabled';
    if(pid == item.id)  optionHtml += 'selected';
    optionStr += '<option ' + optionHtml + ' value="' + item.id + '">' + '&nbsp;&nbsp;&nbsp;&nbsp;'.repeat(item.level) + item.name + '</option>';
  });
  return optionStr;
}



/**   
 * json格式转树状结构   
 * @param   {json}      json数据   
 * @param   {String}    id的字符串   
 * @param   {String}    父id的字符串   
 * @param   {String}    children的字符串   
 * @return  {Array}     数组   
 */    
function transData(a, idStr, pidStr, chindrenStr){    
    var r = [], hash = {}, id = idStr, pid = pidStr, children = chindrenStr, i = 0, j = 0, len = a.length;    
    for(; i < len; i++){    
        hash[a[i][id]] = a[i];    
    }    
    for(; j < len; j++){    
        var aVal = a[j], hashVP = hash[aVal[pid]];    
        if(hashVP){    
            !hashVP[children] && (hashVP[children] = []);    
            hashVP[children].push(aVal);    
        }else{    
            r.push(aVal);    
        }    
    }    
    return r;    
} 
/*var outputData = eval(JSON.stringify(outputData));
var dataList = transData(outputData, 'id', 'parent_id', 'children'); console.log(dataList);*/

</script>
<script>
$(window).load(function(){
   mw.colorPicker({
    element:'#bg-color-pick',
    position:'bottom-left',
    onchange:function(color){
      if(color == '#transparent') color = 'transparent';
      $('#bg-color-pick').css('background',color);
      $('.layoutBackgound').val(color);
      $(".layoutBackgound").change();
    }
  });
    $('.range-slider-opacity').jRange({
        theme:'theme-blue',
        from: 0,
        to: 1,
        step: 0.01,
        format: '%s',
        width: 200,
        showLabels: true,
        isRange : false,
        showScale:false,
        onstatechange:function(o){
          $('.layout_backgound_opacity').val(o);
          $('.layout_backgound_opacity').change();
        }
    });

});

</script>
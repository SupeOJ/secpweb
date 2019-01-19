

<?php


$items = mw()->sliderbar_manager->getTreeList();

?>
<style>
#mw-siderbar-content{border: 1px solid #e5e5e5;}
img#upload_icon{border: 1px solid #ccc;}
.table_tree{padding: 5px;}
</style>
<script type="text/javascript">mw.require("files.js");</script>

<div id="moduleAdmin_caHeader_bgColor">
   <module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />
</div>
<?php
only_admin_access();

$showName = get_option('showName', $params['id']); // y|NULL|false

$showPhone = get_option('showPhone', $params['id']); // y|NULL|false
?>
<div id="moduleAdmin_caHeader_bgColor">
       <module type="layouts/templates/bgcolor_setting" id=<?php print $params['id'];?> />
    </div>



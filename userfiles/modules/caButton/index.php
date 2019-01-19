<?php
$style = get_option('style', $params['id']); // btn-default|btn-primary|btn-success|btn-info|btn-warning|btn-danger|btn-link
$style = $style ? $style : (isset($params['style']) ? $params['style'] : 'btn-default');

$size = get_option('size', $params['id']); // btn-lg|btn-sm|btn-xs
$size = $size ? $size : (isset($params['size']) ? $params['size'] : 'btn-lg');

$action = get_option('action', $params['id']); // url|popup
$action = $action ? $action : (isset($params['action']) ? $params['action'] : 'url');

$url = get_option('url', $params['id']);
$url = $url ? $url : (isset($params['url']) ? $params['url'] : '#');

$popup = get_option('popup', $params['id']);
$popup = $popup ? $popup : (isset($params['popup']) ? $params['popup'] : '');

$blank = get_option('blank', $params['id']); // y|n
$blank = $blank ? $blank : (isset($params['blank']) ? $params['blank'] : 'n');

$text = get_option('text', $params['id']);
$text = $text ? $text : (isset($params['text']) ? $params['text'] : '按钮');

$uniqid = uniqid();
?>

<?php if ($action == 'url'): ?>
    <a href="<?php print $url; ?>" 
       <?php if($blank=='y'){print ' target="_blank" ';}?> 
       class="module-caButton btn <?php print $style.' '.$size; ?>">
       <?php print $text; ?>
    </a>
<?php elseif ($action == 'popup'): ?>
    <script>
        mw.require('tools.js', true);
        mw.require('ui.css', true);
    </script> 
    <a href="javascript:;" 
       id="module_caButton_<?php print $uniqid; ?>" 
       class="module-caButton btn <?php print $style.' '.$size; ?>">
       <?php print $text; ?>
    </a>
    <textarea id="module_caButton_area_<?php print $uniqid; ?>" class="hide"><?php print $popup; ?></textarea>
    <script>
        $(document).ready(function(){
            mw.$("#module_caButton_<?php print $uniqid; ?>").click(function(){
                mw.modal({
                    name: 'module_caButton_frame_<?php print $uniqid; ?>',
                    html: mwd.getElementById('module_caButton_area_<?php print $uniqid; ?>').value,
                    template: 'basic',
                    title: "<?php print $text; ?>"
                });
            })
        });
    </script>
<?php endif; ?>
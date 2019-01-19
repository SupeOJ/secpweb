<?php

/*

  type: layout
  content_type: static
  name: Home
  position: 11
  description: Home layout

*/



 mw_var('photon_layout', 'photon-default');

?>
<?php include THIS_TEMPLATE_DIR. "header.php"; ?>
    <style type="text/css">
        #main-content-holder{
          max-width: none;
        }
      body.mw-live-edit #content >.edit:empty {min-height: 1200px;}
    </style>

    <section id="content">
        <div class="edit" field="content" rel="content">
		   <module type="layouts" template="iframe.php"/></div>
    </section>

<?php include THIS_TEMPLATE_DIR. "footer.php"; ?>

<?php

/*

type: layout

name: Photon

description: Photon Menu skin

*/

?>




<div class="module-navigation module-navigation-photon">
      <?php
      $mt =  menu_tree($menu_filter);
      if($mt != false){
        print ($mt);
      }
      else {
        print lnotif("There are no items in the menu <b>".$params['menu-name']. '</b>');
      }
      ?>
</div>

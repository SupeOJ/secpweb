<?php

 mw_var('photon_layout', 'photon-inner');

include THIS_TEMPLATE_DIR. "header.php"; ?>

<div class="container">
  <div  class="edit" field="content" rel="content">
    <h2 class="main-title">Complete your order</h2>
    <div  class="edit" field="checkout_page" rel="content">
      <module type="shop/checkout" id="cart_checkout" />
    </div>
  </div>
</div>
<?php include THIS_TEMPLATE_DIR.  "footer.php"; ?>

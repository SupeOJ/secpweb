<div style="padding: 20px;"><h2>配色方案</h2>

<?php

   $colorscheme = get_option('colorscheme', 'mw-template-photon');
    if($colorscheme == false){
        $colorscheme = 'dark';
    }


?>

<style>

    .photon-color{
      display: inline-block;
      width: 42px;
      height: 42px;
      border: 1px solid #111;
      box-shadow: 0 0 3px -1px #000;
      margin: 5px;
      opacity: 0.5;
      border: 2px solid transparent;
      cursor: pointer;
      border-radius: 2px;
    }

    .photon-color:hover{
      opacity: 1;
    }
    .photon-color.active{
      border-color:#3F86CC;
      opacity: 1;
    }

</style>

<script>

   ActiveScheme = "<?php print $colorscheme; ?>";

  savePhotonScheme = function(scheme){
    var item = mw.$("[data-scheme='"+scheme+"']");
    if(!item.hasClass("active")){
        var data = {
          option_key:'colorscheme',
          option_value:scheme,
          option_group:'mw-template-photon'
        }
        $.post("<?php print api_url('save_option'); ?>", data, function(){
            mw.notification.success('Changes saved');
            parent.document.getElementById('colorScheme').href = "<?php print TEMPLATE_URL; ?>colors/"+scheme+".css";
            mw.$(".photon-color.active").removeClass("active");
            item.addClass("active");
        });
    }
  }
  $(document).ready(function(){
        mw.$("[data-scheme='"+ActiveScheme+"']").addClass("active");
        mw.$(".photon-color").bind("click", function(){
             savePhotonScheme($(this).dataset("scheme"));
        });
  });

</script>


<span class="photon-color" style="background-color: #222;" data-scheme="dark" ></span>
<span class="photon-color" style="background-color: #fff;" data-scheme="white" ></span>
<span class="photon-color" style="background-color: #f20c00;" data-scheme="red" ></span>
<span class="photon-color" style="background-color: #065279;" data-scheme="blue" ></span>
<span class="photon-color" style="background-color: #eaff56;" data-scheme="yellow" ></span>
<span class="photon-color" style="background-color: #0aa344;" data-scheme="green" ></span>
</div>
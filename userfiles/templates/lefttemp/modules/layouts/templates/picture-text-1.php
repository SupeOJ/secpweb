<?php

/*

type: layout

name: picture-text-1

position: 6

*/

?>
<?php
$showTitle = get_option('showTitle', $params['id']); // y|NULL|false
$showTitle = $showTitle === false ? 'y' : $showTitle;

$layoutBackgound = get_option('layoutBackgound',$params['id']);
$layoutBackgound == false ? '#fff' : $layoutBackgound;

$layoutBackgoundOpacity = get_option('layoutBackgoundOpacity',$params['id']);
$layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity;   

$background =  'background:'. ($layoutBackgound == false ? '#F0F0F0' : $layoutBackgound).';opacity:'.($layoutBackgoundOpacity == false ? 1 : $layoutBackgoundOpacity  );
?>

<script>
  mw.moduleCSS("<?php print $config['url_to_module']; ?>css/bootstrap.min.css");
  mw.moduleCSS("<?php print $config['url_to_module']; ?>css/index.css");
</script>
<div class="edit" field="layout-skin-2-<?php print $params['id'] ?>" rel="layout"  style='<?php echo $background;?>;'>
    <div class="head-image-layout-1">
            <div class="container-fluid etc-can-prodects-zt">
                    <div class="container etc-can-container">
                        <?php if($showTitle=='y'):?> <p class="can-proder-center">全球首款集团化、一体化企业应用的虚拟云平台</p><?php endif;?>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-8 ">
                            <div class="etc-thumbnails">
                              <img src="<?php print $config['url_to_module'];?>img/img_illustrate.png" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 ">
                            <div class="etc-thumbnail-rows">
                              <p class="etc-can-zt-p-1">精细化管理</p>
                              <p class="etc-can-zt-p-2">产业链协同就是紧密连接客户和供应商彻底改变与客户、供应商的交易方式，从而获得更高效率、更低成本的运作与交易方式。</p>
                            <div class="etc-border"></div>
                              <p class="etc-can-zt-p-3">产业链协同</p>
                              <p class="etc-can-zt-p-4">企业唯有精细化管理之后才有数据基础与产业链上下游进行基于互联网的管理、业务信息交换，才复合互联网时代所要求企业的开放性，否则就无法融入由互联网织成的业务产业链。</p>
                              <div class="etc-border"></div>
                              <p class="etc-can-zt-p-3">社会化商业</p>
                              <p class="etc-can-zt-p-4">当我们把互联网应用扩展到整个企业经营管理的方方面面，当我们把企业的数据资产从结构化的共享与处理扩展到对非结构化的共享与处理的时候；以人为中心，企业紧密连接所有员工、消费者，伙伴、聚合并有效使用产业链上下游、乃至全球互联网庞大多样的资源时、就能真正建立企业社会化的强大商业生态系统。</p>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
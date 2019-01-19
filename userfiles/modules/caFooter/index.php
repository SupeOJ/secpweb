<?php
$showName = get_option('showName', $params['id']); // y|NULL|false

$showPhone = get_option('showPhone', $params['id']); // y|NULL|false

$background = get_option('background', $params['id']); // image|color|false
$background = $background ? $background : 'color';

$bgImage = get_option('bgImage', $params['id']); // http://...|false
$bgImage = $bgImage ? $bgImage : $config['url_to_module'] . "img/bg.jpg";

$parallax = get_option('parallax', $params['id']); // y|NULL|false
$parallax = $parallax === false ? 'y' : $parallax;

$bgColor = get_option('bgColor', $params['id']); // color|false
$bgColor = $bgColor ? $bgColor : "#3C3C3C";

$overlay = get_option('overlay', $params['id']); // y|NULL|false
$overlay = $overlay === false ? 'y' : $overlay;

$overlayColor = get_option('overlayColor', $params['id']); // color|false
$overlayColor = $overlayColor ? $overlayColor : "#3C3C3C";

$overlayOpacity = get_option('overlayOpacity', $params['id']); // 0.1-1.0|false
$overlayOpacity = $overlayOpacity ? $overlayOpacity : "0.8";

$btnText = get_option('btnText', $params['id']); // ...|false
$btnText = $btnText ? $btnText : "联系我们";

$btnColor = get_option('btnColor',$params['id']);
$btnColor = $btnColor ? $btnColor : 'btn-default';
?>
<style>
    footer{
        padding-top: 6.5em;
        padding-bottom:8.125em;
        color: #bdc9d0;
    }
    .footer__title {
        color: #ccc;
        font-size: 22px;
        margin-bottom: 30px;
    }
    .footer__list_item{
        list-style-type: none;
        line-height: 2;
    }
</style>

<footer >
    <?php if($overlay=='y' && $background!='color'):?>
        <div class="mbr-overlay" style="opacity:<?php echo $overlayOpacity;?>;background-color:<?php echo $overlayColor;?>;"></div>
    <?php endif;?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-4 allow-drop edit">
                <h3 class="footer__title">地址</h3>
                <p>深圳市沙井中亚硅谷海岸营销中心</p>

                <h3 class="footer__title">联系方式</h3>
                <p>电话：400-888-3333 或 0755-2222-0000</p>
                <p>传真：0755-27261800</p>
                <p>邮箱：zyetc@chinaasiaetc.com</p>
                <p>网址：www.chinaasiaetc.com</p>

            </div>
            <div class="col-xs-12 col-lg-4 allow-drop edit">
                <h3 class="footer__title">相关链接</h3>
                <ul class="footer__list">
                    <li class="footer__list_item"><a  style="color:#bdc9d0;" target="_blank" href="http://www.zhongyajituan.cn/">中亚集团</a></li>
                    <li class="footer__list_item"><a  style="color:#bdc9d0;" target="_blank" href="http://www.casvm.com/">中亚交易网</a></li>
                    <li class="footer__list_item"><a  style="color:#bdc9d0;" target="_blank" href="http://www.chinaasiaetc.com/Activity/Expo/">中亚会展中心</a></li>
                    <li class="footer__list_item"><a  style="color:#bdc9d0;" target="_blank" href="http://www.chinaasiaetc.com/">中亚硅谷海岸</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-lg-4 allow-drop">
                <!--FGX20151125---------------------------------------------------------------->
                <?php $form_id="module_caFooter_form_".$params['id'];?>
                <!-- 
                <form action="#" method="post"> -->
                <form action="#" method="post" id="<?php echo $form_id;?>">
                    <input type="hidden" name="module_name" value="<?php print $params['module'];?>">
                    <input type="hidden" name="for_id" value="<?php print $params['id'];?>">
                <!--FGX20151125---------------------------------------------------------------->
                    <?php if($showName=='y'):?>
                        <div class="form-group"><input type="text" class="form-control input-sm input-inverse" name="name" required="" placeholder="姓名*"></div>
                    <?php endif;?>
                    <div class="form-group"><input type="email" class="form-control input-sm input-inverse" name="email" required="" placeholder="邮箱*"></div>
                    <?php if($showPhone=='y'):?>
                        <!--FGX20151125---------------------------------------------------------------->
                        <!-- 
                        <div class="form-group"><input type="tel" class="form-control input-sm input-inverse" name="phone" placeholder="电话"></div> -->
                        <div class="form-group"><input type="tel" class="form-control input-sm input-inverse" name="phone" placeholder="电话*" required=""></div>
                        <!--FGX20151125---------------------------------------------------------------->
                    <?php endif;?>
                    <!--FGX20151125---------------------------------------------------------------->
                    <!-- 
                    <div class="form-group"><textarea class="form-control input-sm input-inverse" name="message" placeholder="内容" rows="4"></textarea></div> -->
                    <div class="form-group"><textarea class="form-control input-sm input-inverse" name="message" placeholder="内容*" rows="4" required=""></textarea></div>
                    <!--FGX20151125---------------------------------------------------------------->
                    <div class="btn-inverse"><button type="submit" class="btn <?php echo $btnColor;?>"><?php echo $btnText;?></button></div>
                </form>
            </div>
        </div>
    </div>
</footer>

<!--FGX20151125---------------------------------------------------------------->
<script>
    window.module_caFooter_submit_doing = false;
    if (!window.module_caFooter_submit) {
        window.module_caFooter_submit = function() {
            if (window.module_caFooter_submit_doing != false) return;
            window.module_caFooter_submit_doing = true;
            mw.form.post($(this), undefined, function(form) {
                $("#<?php echo $form_id;?> input").val("");
                $("#<?php echo $form_id;?> textarea").val("");
                if (typeof this.error !== 'string') alert("提交成功！");
                window.module_caFooter_submit_doing = false;
            }, true);
            return false;
        }
    }
    $("#<?php echo $form_id;?>").submit(window.module_caFooter_submit);
</script>
<!--FGX20151125---------------------------------------------------------------->
<div class="module-live-edit-settings">
    <span class="mw-ui-btn mw-ui-btn-invert pull-right" onclick="Bxslider.create();">添加数据</span>

    <h2>轮播图设置</h2>
    <module type="admin/modules/templates" simple="true"/>

    <div id="bxslider-settings">

      <script>mw.require('icon_selector.js')</script>
      <script>mw.require('ui.css')</script>
      <script>mw.require('wysiwyg.css')</script>



        <style>

        .item-icon ul {
          height: 220px;
          padding: 12px;
          background: white;
          box-shadow: 0 0 6p -3px rgba(0,0,0.5);
          min-width: 300px;
        }

        .item-icon li {
          margin: 5px 0;
          float: left;
          width: 33.333%;
          text-align: center;
          list-style: none;
          font-size: 33px;
          cursor: pointer;
          color: #777
        }

          .item-icon{
            position: relative;
            display: block;
            z-index: 10;
          }

            .bxslider-skinselector {
                width: 150px;
            }

            .bxslider-images-holder .bgimg {
                width: 120px;
                height: 120px;
                border: 1px solid #eee;
                box-shadow: 0 2px 2px -2px #000;
                background-size: contain;
            }

            .bxslider-setting-item {
                margin: 15px 0;
            }

            .bxslider-images-holder .mw-icon-close {
                position: absolute;
                top: 1px;
                right: 1px;
                cursor: pointer;
                z-index: 2;
                display: block;
                width: 20px;
                height: 20px;
                text-align: center;
                padding: 4px;
                background-color: white;
            }

            .bxslider-images-holder .mw-icon-close:hover {
                background-color: black;
                color: white;
            }

            .bxslider-images-holder {
                overflow: auto;
            }

            .bxslider-images-holder li {
                list-style: none;
                float: left;
                width: 120px;
                margin: 0 12px 12px 0;
                cursor: -moz-grab;
                cursor: -webkit-grab;
                cursor: grab;
                background: white;
                position: relative;
            }

            .bxslider-setting-item > .mw-ui-box-header {
                cursor: pointer;
            }

            .mw-icon-drag {
                cursor: -moz-grab;
                cursor: -webkit-grab;
                cursor: grab;
            }

            .mw-ui-box-header .mw-icon-close {
                margin-right: 12px;
                font-size: 14px !important;
            }

            .item-icon input{
              position: absolute;
              opacity: 0;
              left: 0;
              top: 0;
            }
            .item-icon .mw-ui-field-holder{
              padding: 0;
            }

        </style>

        <?php
$defaults = '{"0":{"url":"","images":"{SITE_URL}userfiles/media/uploaded/banner.png"},
"1":{"url":"","images":"{SITE_URL}userfiles/media/uploaded/banner_2.png"},
"2":{"url":"","images":"{SITE_URL}userfiles/media/uploaded/banner_3.png"}}';

        $settings = get_option('settings', $params['id']);
        $settings = $settings ? $settings : $defaults;
        $json = json_decode($settings, true);

//var_dump($json);exit;

        $count = 0;

        foreach ($json as $slide) {
            $count++;

            ?>


            <div class="mw-ui-box  bxslider-setting-item" data-skin="">
                <div class="mw-ui-box-header" onclick="mw.accordion(this.parentNode);">
                    <span class="mw-icon-drag pull-right show-on-hover"></span>
                    <span class="mw-icon-close show-on-hover pull-right" onclick="deletebxsliderslide(event);"></span>
                    <span class="mw-icon-gear"></span> 轮播—<?php print $count; ?>
                </div>

                <div class="mw-ui-box-content mw-accordion-content" style="display: none;">
                    <div class="mw-ui-row-nodrop">


                        <div class="mw-ui-col">
                            <div class="mw-ui-col-container">
                                <label class="mw-ui-label">跳转链接</label>
                                <input type="text" class="mw-ui-field bxslider-url w100" value="<?php print $slide['url']; ?>">
                            </div>
                        </div>

                    </div>

                    <div class="bxslider-images" style="margin:20px 0">
                        <ul class="bxslider-images-holder">
                            <?php
                            if (isset($slide['images'])) {
                                $image = $slide['images'];

                                    if ($image != '') {
                                            ?>
                                        <li style="width: 100%">
                                            <span class="bgimg" data-image="<?php print $image; ?>" style="width:100%;background-image:url(<?php print $image; ?>);background-size:100% 100%;"></span>
                                            <span class="mw-icon-close" onclick="deletebxsliderimage(event);"></span>
                                        </li>
                                    <?php }

                            } ?>
                        </ul>

                        <span class="mw-ui-btn mw-ui-btn-invert bxslider-uploader"><span class="mw-icon-upload"></span>添加图片</span>
                    </div>
                </div>
            </div>
        <?php } ?>

        <script>


            deletebxsliderimage = function (e) {
                $(mw.tools.firstParentWithTag(e.target, 'li')).remove();
                Bxslider.save();
            };

            deletebxsliderslide = function (e) {
                if (confirm('Are you sure you want to delete this slide')) {
                    $(mw.tools.firstParentWithClass(e.target, 'bxslider-setting-item')).remove();
                    Bxslider.save();
                }
            };

            Bxslider = {
                collect: function () {
                    var data = {}, all = mwd.querySelectorAll('#bxslider-settings .bxslider-setting-item'), l = all.length, i = 0;

                    for (; i < l; i++) {
                        var item = all[i];
                        data[i] = {};
                        data[i]['url'] = item.querySelector('.bxslider-url').value ? item.querySelector('.bxslider-url').value : '';
                        data[i]['images'] = '';

                        if (item.querySelector('.bxslider-images-holder .bgimg') !== null) {
                            var imgs = item.querySelectorAll('.bxslider-images-holder .bgimg'), imgslen = imgs.length, ii = 0;

                            for (; ii < imgslen; ii++) {
                                if ((ii + 1) !== imgslen) {
                                    data[i]['images'] += $(imgs[ii]).dataset('image') + ',';
                                }

                                else {
                                    data[i]['images'] += $(imgs[ii]).dataset('image');
                                }
                            }
                        }
                       
                    }
                        
                    return data;
                },

                save: function () {
                    mw.$('#settingsfield').val(JSON.stringify(Bxslider.collect())).trigger('change');
                },

                initItem: function (item) {
                    $(item.querySelectorAll('input')).on('input change', function () {
                        mw.on.stopWriting(this, function () {
                            Bxslider.save();
                        });
                    });

                    // var skin = $(item).dataset('skin');
                    // $('.bxslider-skinselector', item).val(skin);
                    $(item.querySelectorAll('select')).bind('change', function () {
                        Bxslider.save();
                    });

                    var up = mw.uploader({
                        filetypes: 'images',
                        element: item.querySelector('.bxslider-uploader')
                    });

                    $(up).bind('FileUploaded', function (a, b) {
                        //console.log(b);
                        $(item.querySelector('.bxslider-images-holder')).empty().append('<li  style="width: 100%"><span class="bgimg" data-image="' + b.src + '"  style="width: 100%;background-image:url(' + b.src + ');background-size:100% 100%;"></span><span class="mw-icon-close" onclick="deletebxsliderimage(event);"></span></li>');
                        Bxslider.save();
                    });

                    $(item.querySelector('.bxslider-images-holder')).sortable({
                        stop: function () {
                            Bxslider.save();
                        }
                    });
                },

                initSlideSettings: function () {
                    var all = mwd.querySelectorAll('#bxslider-settings .bxslider-setting-item'), l = all.length, i = 0;
                    for (; i < l; i++) {
                        if (!!all[i].prepared) continue;
                        var item = all[i];
                        item.prepared = true;
                        Bxslider.initItem(item);
                    }
                },

                create: function () {
                    var last = $('.bxslider-setting-item:last');
                    var html = last.html();
                    var item = mwd.createElement('div');
                    item.className = last.attr("class");
                    item.innerHTML = html;
                    $(item.querySelectorAll('input')).val('');
                    $(item.querySelectorAll('.bxslider-images-holder .bgimg')).remove();
                    $(item.querySelectorAll('.mw-uploader')).remove();
                    last.after(item);
                    Bxslider.initItem(item);
                }
            }

                $(window).bind('load', function () {
                  if(thismodal.resize){
                    thismodal.resize(800);
                  }

                    Bxslider.initSlideSettings();
                    mw.$("#bxslider-settings").sortable({
                        items: "> .bxslider-setting-item",
                        handle: "> .mw-ui-box-header .mw-icon-drag",
                        axis: 'y',
                        stop: function () {
                            Bxslider.save();
                        }
                    });
                });
        </script>
    </div>
</div>

<input type="hidden" name="settings" id="settingsfield" value="" class="mw_option_field"/>
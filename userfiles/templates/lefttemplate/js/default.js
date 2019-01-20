


documentSize = function(){
    if(self !== top) return false;
    var windowheight = $(window).height();
    if(mw.tools.hasClass(mwd.body, 'mw-live-edit')){
        var windowheight = windowheight - mw.$('#live_edit_toolbar').height();
    }
    mw.$("#side-nav-content, #portfolio-inner-content, #product-inner-gallery").each(function(){
        this.style.height = windowheight + 'px';
    });
    if($(window).width() < 769){
        mw.$("#sidenav").removeClass('active');
    }

}

mw.photonModal = function(options){
    options.template = 'simple';
    var modal = mw.modal(options);
    modal.hide();
    $(modal.main).addClass('scale-out');
    modal.show();
    setTimeout(function(){
        $(modal.main).addClass('scale-in').removeClass('scale-out');
    }, 12)
    return modal;
}


$(document).ready(function(){

    mw.$("#main-content").bind("click", function(){
        if($(window).width() < 769){
            mw.$('#sidenav').removeClass('active')
        }
    });
    mw.$("#mobile-menu").bind("click", function(){
        var nav = mw.$("#sidenav").toggleClass("active");
        if(!nav.hasClass('active')){
          nav[0].style.width = '45px';
          setTimeout(function(){
              nav[0].style.width = '';
          }, 301);
        }
    });

    $(window).bind('mw.cart.add', function(event, data){
        if(document.getElementById('addtocartmodal') === null){
          addtocartmodal = mw.photonModal({
            content:AddToCartModalContent(data.product.title, data.product.image),
            width:320,
            height:250,
            name:'addtocartmodal'
          });
        }
        else{
            $(addtocartmodal.container).html(AddToCartModalContent(data.product.title, data.product.image))
        }

    });


});



$(window).bind('load resize', function(){


    documentSize();

mw.$("#copyright").show();
});



 $(window).bind('beforeunload', function(){
    if(!mw.tools.hasClass(mwd.body, 'mw-live-edit')){ mw.$("#main-content").removeClass('active'); }
 });

 $(window).load(function(){
   mw.$("#main-content").addClass('active');
   if('placeholder' in document.createElement('input') === false){
       mw.$("[placeholder]").each(function(){
          var el = $(this), p = el.attr("placeholder");
          el.val() == '' ? el.val(p) : '' ;
          el.bind('focus', function(e){ el.val() == p ? el.val('') : ''; });
          el.bind('blur', function(e){ el.val() == '' ? el.val(p) : ''; });
       });
   }
 });
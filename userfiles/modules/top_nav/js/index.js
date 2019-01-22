//侧边栏hover
$(function () {
    $('.left-nav-button').hover(function () {
        if (!$('.left-nav').hasClass('left-nav-hidden')) {
            $('.left-nav').addClass('left-nav-hidden');
        } 
    },function(){
        $('.left-nav').removeClass('left-nav-hidden');
    })
});

$(function () {
    $('.left-nav').hover(function () {
        $('.left-nav').addClass('left-nav-hidden');
    },function(){
        $('.left-nav').removeClass('left-nav-hidden');
    })
});
   
$(function () {
    $(".left-nav-sons").mouseenter(function(){
        $(this).children('.left-nav-sons-children').css('display','block');
    }).mouseleave(function(){
        $(this).children('.left-nav-sons-children').css('display','none');
    });
});

$(function () {
    window.onload = function(){
        var current = 0;
        document.getElementById('left-nav-1').onmouseover = function(){
            current = (current+90)%360;
            this.style.transform = 'rotate('+current+'deg)';
        }
        document.getElementById('left-nav-1').onmouseout = function(){
            current = (current+90)%360;
            this.style.transform = 'rotate('+current+'deg)';
        }
        
    };
});
    



    



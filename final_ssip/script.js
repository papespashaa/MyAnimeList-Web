$('.btn').click(function(){
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");
});
$('.boku-btn').click(function(){
    $('nav ul .boku-show').toggleClass("show")
    $('nav ul .first').toggleClass("rotate")
});
$('nav ul li').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
});
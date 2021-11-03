$('.sub_name1').click(function(){
    $('.sub1').toggle();
    $(".sub_name1 span  .fa-sort-down").toggleClass("rotate");

})
$('.dropdown_admin_name').click(function(){
    $('.dropdown_manu').toggle();
    $(".dropdown_admin_name i").toggleClass("rotate");
})

$('.admin-menu').click(function () { 
    $('.nav').toggle().css({
        'position':'fixed',
        'width':'220px',
        'z-index':'20000',
        'left':'0',
    });
    $(".admin-menu i").toggleClass(' fa-times')
    
});
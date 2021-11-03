$(".add_card").click(function(e){
    var id= e.currentTarget.querySelector('input').value;
    console.log('mo');
    console.log(id);
    $.ajax({
        url:'includes/cart.php',
        method:'POST',
        data:{id:id},
        success:function(response){
            $(".show_cart").text(response);
            if(response===""){
                alert('login to enable add products to your cart');
            }else{
            alert("the product added successfully");

            }
        }
    });
});
$(".add_wish").click(function(e){
    var id= e.currentTarget.querySelector('input').value;
    console.log('mo');
    console.log(id);
    $.ajax({
        url:'includes/wish.php',
        method:'POST',
        data:{id:id},
        success:function(response){
            $(".show_wish").text(response);
            if(response===""){
                alert('login to enable add products to your cart');
            }else{
            alert("the product added successfully");

            }
        }
    });
});




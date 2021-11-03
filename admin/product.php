<?php include "includes/header.php"; ?>
<?php
if(isset($_GET['bdgs'])){
    $source = $_GET['bdgs'];
}else{
    $source = '';
}
switch($source){
    case 'edit_product';
    include "includes/edit_product.php";
    break;

    case 'add_product';
    include "includes/add_product.php";
    break;

    case 'view_comp';
    include "includes/view_all_comp.php";
    break;

    default;
    include "includes/view_all_product.php";
    break;
}
include "includes/footer.php";

?>

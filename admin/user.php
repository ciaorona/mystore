<?php include "includes/header.php"; ?>
<?php
if(isset($_GET['bdgs'])){
    $source = $_GET['bdgs'];
}else{
    $source = '';
}
switch($source){
    case 'edit_user';
    include "includes/edit_user.php";
    break;

    case 'view_admin';
    include "includes/view_all_admin.php";
    break;

    case 'add_person';
    include "includes/add_user_admin.php";
    break;

    default;
    include "includes/view_all_users.php";
    break;
}
include "includes/footer.php";
<?php 
session_start();
include ("database.inc.php");
include ("function.php");
include ("constrant.php");


$attr=get_safe_value($_POST['attr']);
$qty=get_safe_value($_POST['qty']);
$type=get_safe_value($_POST['type']);
pr($_POST);


if($type=='add'){
    if(isset($_SESSION['FOOD_USER_ID'])){
        $id=$_SESSION['FOOD_USER_ID'];
        $res=mysqli_query($con,"select * from dish_cart where user_id='$id' and dish_dtl_id='$attr'");
        
        if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            $cid=$row['id'];
            mysqli_query($con,"update dish_cart set qty='$qty' where id='$cid'");
        
        }
        else{
        $added_on=date('Y-m-d h:i:s');
        mysqli_query($con,"insert into dish_cart(user_id,dish_dtl_id,qty,added_on) values('$id','$attr','$qty','$added_on')");
        }
    }
    else{
        
        $_SESSION['cart'][$attr] ['qty']=$qty;
    }
}
?>
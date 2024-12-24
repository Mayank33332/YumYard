<?php
session_start();
include ("database.inc.php");
include ("function.php");
include ("constrant.php");



$type=get_safe_value($_POST['type']);

// --------------------------register logic---------------

if($type=='register'){

$name=get_safe_value($_POST['username']);
$email=get_safe_value($_POST['email']);
$mobile=get_safe_value($_POST['mobile']);
$password=get_safe_value($_POST['password']);

$added_on=date('Y-m-d h:f:s');
    $check=mysqli_num_rows(mysqli_query($con,"select * from user where email='$email'"));
    if($check>0){
        $arr=array('status'=>'error','msg'=>'*email already registerd','field'=>'email_err');
       
    }

else{
    mysqli_query($con,"insert into user(name,email,mobile,password,status,added_on)values('$name','$email','$mobile','$password','1','$added_on')");
    $arr=array('status'=>'success','msg'=>'*now you are registered','field'=>'email_sucs');
}
echo json_encode($arr);    
} 





// --------------------------login logic-----------------

if($type=='login'){
    
    $email=get_safe_value($_POST['user_email']);
    $password=get_safe_value($_POST['user_password']);
    $res=mysqli_query($con,"select * from user where email='$email' and password='$password'");
    $check=mysqli_num_rows($res);
    if($check>0){ 
      $row=mysqli_fetch_assoc($res);
      $status=$row['status'];
        if($status==1){
                $_SESSION['FOOD_USER_ID']=$row['id'];
                $_SESSION['FOOD_USER_NAME']=$row['name'];
                $arr=array('status'=>'success','msg'=>'');
        }
        else{
            $arr=array('status'=>'error','msg'=>'*your account has been deactiveted !!');
        }
 
    }

else{
    $arr=array('status'=>'error','msg'=>'*enter valid email id and password !!');
   
}
echo json_encode($arr);    
} 
?>

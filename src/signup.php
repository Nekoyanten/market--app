<?php
//Step 1. Get database access
require("../config/database.php");

//step2. get form-data 

$f_name =$_POST['fname'];
$l_name =$_POST['lname'];
$m_number =$_POST['mnumber'];
$id_number =$_POST['idnumber'];
$e_mail =$_POST['email'];
$p_wd =$_POST['passwo'];

$enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
//step 3 query to inset  into 
$check_email= "
        SELECT 
            u.email
        from
            users u
        where
            email ='$e_mail' or id_numbe='idnumber'
            LIMIT 1
        ";

$res_check=pg_querry($conn,$check_email);
if(pg_num_rows($res_check)>0){
    echo "<script>alert('User already exists!!')</script>";
    header('refresh:0;url=signup.html')

} else {
    $query="
    INSERT INTO users(
        firstname,
        lastname ,
        mobile_number ,
        ide_number ,
        email ,
        password
    ) VALUES(
        '$f_name',
        '$l_name',
        '$m_number',
        '$id_number',
        '$e_mail',
        '$enc_pass'
        ) "
;

//setp 4 excute query 

$res=pg_query($conn,$query);

//step 5  validate result 

if ($res){
        //echo "User has  been create successfully !!!";
        echo "<script>alert('Success !!! Go to login')</script>";+
        header('refresh:0;url=signin.html');
    } else {
            echo "Something wrong!";
        };
}

?>
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

//step 3 query to inset  into 

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
        '$p_wd'
        ) "
;

//setp 4 excute query 

$res=pg_query($conn,$query);

//step 5  validate result 

if ($res){
        echo "User has  been create successfully !!!";
    } else {
            echo "Something wrong!";
        };


?>
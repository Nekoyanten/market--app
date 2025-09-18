<?php

  //step1. get database access
  require ('../config/database.php');

  //step2. get from data
  $f_name = $_POST['fname'];
  $l_name = $_POST['lname'];
  $m_number = $_POST['mnumber'];
  $id_number = $_POST['idnumber'];
  $e_mail = $_POST['email'];
  $p_wd = $_POST['passwd'];

  $enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
  
  $check_email = "
     SELECT
        u.email
     FROM
        users u
     WHERE
        email = '$e_mail' or ide_number = '$id_number'
    LIMIT 1
  ";
  $res_check = pg_query ($conn, $check_email);
  if(pg_num_rows($res_check) > 0){
     echo "<script>alert('User already exists !!')</script>";
     header('refresh:0;url=signup.html');
  } else {
//step3.create query to insert into
  $query =
    "
    INSERT INTO users (
    firstname, 
    lastname, 
    mobile_number, 
    ide_number, 
    email, 
    password
  ) VALUES (
   '$f_name',
   '$l_name',
   '$m_number',
   '$id_number',
   '$e_mail',
   '$p_wd'
  )
  ";
   //step4.execute query
   $res = pg_query ($conn, $query);

   //step5. validate result
   if($res){
    //echo "User has been created succesfully !!!";
    echo "<script>alert('Success !!! Go to login')</script>";+
    header('refresh:0;url=signin.html');
   } else {
    echo "Something wrong!";
   }
  }
  

   ?>
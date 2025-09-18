<?php

  //step1. get database access
  require ('../config/database.php');

  //step2. get from data
  $e_mail = $_POST['email'];
  $p_wd = $_POST['passwd'];

  //Step 3 : query  to Validate data 
 $Sql_check_user = "
    select 
	u.email,
	u.password
    from 
        users u
    where
    u.email ='$e_mail' and 
    u.password ='$p_wd'
    limit 1
 
 ";

 #Step 4 Execute query
 $res_check = pg_query($conn,$Sql_check_user);
 if(pg_num_rows($res_check) > 0){
     echo "User exists. GO to main page !!!";
  } else {
     echo "Verify data";
  }



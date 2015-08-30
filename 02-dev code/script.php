<?php
session_start();
include('define.php');
include('class/db_connect.php');
include('class/db_class.php');

$db = new db_class();

$action=$_POST['act'];
$error=""; //no-error

if ($action=="login") {
				
			$user=$db->clean_input($_POST['user']);
			$pass=$db->clean_input($_POST['pass']);		
			
			//Check login			
			$sql="SELECT id, f_name, l_name FROM 	"._TB_MEMBER." 
					 WHERE 
						username='$user' 
						AND password = '$pass' 		
						AND is_active='1' 
						AND publish='1'				
					LIMIT 1; ";
						
			$db->query($sql);
			$n=$db->num_rows();
			if ($n>0) { 
			
						$db->movenext();		
						$id=$db->getfield("id");
						$f_name=stripslashes($db->getfield("f_name"));
						$l_Name=stripslashes($db->getfield("l_name"));
												
						$_SESSION['ss_login']='1';	
						$_SESSION['ss_member_id']=$id;						
						$_SESSION['ss_username']=$user;
						$_SESSION['ss_member_name']="$f_name $l_name";
							
			} else { //wrong user or pass
				$error='101';	
			}			
			
			echo $error;	
}

if ($action=='logout') {

		unset(
			$_SESSION['ss_login'],
			$_SESSION['ss_member_id'],
			$_SESSION['ss_username']	,
			$_SESSION['ss_member_name']
		);	

}

$db->close();
?>
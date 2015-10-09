<?php
class db_class extends database {
	
	function get_image_profile($id) {
		$re=mysql_query("SELECT image_profile FROM "._TB_MEMBER." WHERE id='$id' LIMIT 1; ");
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);
			$image_profile=$rs['image_profile'];
			$img =_IMG_PROFILE_PATH."/".$image_profile;
			
				if (file_exists($img)) {
					$image=  '<img src="'.$img.'" class="img-circle" width="32" >';
				} else {
					$image= '<img src="libs/img/image-profile.png" class="img-circle" width="32">';						
				}
		}
		return $image;
	}
	//แผนก ----------------
	function department_listbox($select_id) {
		$department='';
		$sql="SELECT id, title FROM "._TB_DEPARTMENT." WHERE publish='1' ORDER BY title  ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			while ($rs=mysql_fetch_array($re)) {
				$id=$rs["id"];
				$title=stripslashes($rs["title"]);	
				$select=($id==$select_id ? ' selected ' : '');
				$department.='<option value="'.$id.'" '.$select.'>'.$title.'</option>';
			}
		}
		return $department;		
	}
	
	function get_department_title($id) {
		$sql="SELECT id, title  FROM "._TB_DEPARTMENT." WHERE id='$id' LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);	
			$title=stripslashes($rs['title']);
		}
		return $title;
	}
	
	//ตำแหน่ง ----------------
	function position_listbox($select_id) {
		$position='';
		$sql="SELECT id, title FROM "._TB_POSITION." WHERE publish='1' ORDER BY title  ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			while ($rs=mysql_fetch_array($re)) {
				$id=$rs["id"];
				$title=stripslashes($rs["title"]);	
				$select=($id==$select_id ? ' selected ' : '');
				$position.='<option value="'.$id.'" '.$select.'>'.$title.'</option>';
			}
		}
		return $position;		
	}
	
	function get_position_title($id) {
		$sql="SELECT id, title  FROM "._TB_POSITION." WHERE id='$id' LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);	
			$title=stripslashes($rs['title']);
		}
		return $title;
	}
	
	//permission ----------------
	function permission_listbox($select_id) {
		$permission='';
		$sql="SELECT id, title FROM "._TB_PERMISSION." WHERE publish='1' ORDER BY id  ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			while ($rs=mysql_fetch_array($re)) {
				$id=$rs["id"];
				$title=stripslashes($rs["title"]);	
				$select=($id==$select_id ? ' selected ' : '');
				$permission.='<option value="'.$id.'" '.$select.'>'.$title.'</option>';
			}
		}
		return $permission;		
	}
	
	function get_permission_title($id) {
		$sql="SELECT id, title  FROM "._TB_PERMISSION." WHERE id='$id' LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);	
			$title=stripslashes($rs['title']);
		}
		return $title;
	}
	
	//Other ---------------------------
	
			
	function check_exist_data($field_name, $table, $condition) {
		if ($condition && $condition!="") {
			$condition=" WHERE ".$condition;	
		}

		$sql="SELECT $field_name FROM ".$table.$condition." LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) { return true; } else { return false; }			
	}

	
	
	//สำหรับ clean url  paramiter
	function clean_input($input) {
		if(get_magic_quotes_gpc()) {
			$input = stripslashes($input);
		}
					
		$input = strip_tags($input);
		return mysql_real_escape_string($input);	
	}
	
	
} //end db_class
?>

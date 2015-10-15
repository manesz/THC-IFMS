<?php
class db_class extends database {
	
	function item_accessories_list($n, $parent_id) {
			
			$sub_item='';
			$SQL="SELECT id, title, parent_id,  update_dttm FROM "._TB_ITEM_ACCESSORIES." WHERE publish='1' AND parent_id='$parent_id' ORDER BY id ";
			$re=mysql_query($SQL);
			$num=mysql_num_rows($re);
			
			if ($num>0) {
			
				$m=1;	
				while ($rs=mysql_fetch_array($re)) {
					$id=$rs['id'];
					$title=stripslashes($rs['title']);
					
					$parent_id=$rs['parent_id'];
					$latest_update=$rs['update_dttm'];
					
					
					$sub_item.='
										  <tr>
											<td align="right">'.$n.'.'.$m.'</td>
											<td>'.$title.'</td>
											<td>'.$latest_update.'</td>
											<td>
												<div class="dropdown">
													<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
														<i class="fa fa-cog"> จัดการ</i>
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
														<li><a href="item-accessories-edit.php?id='.$id.'"><i class="fa fa-pencil-square-o"> แก้ไข</i></a></li>
														<li><a href="#" onclick="delete_item(\''.$id.'\',\''.htmlspecialchars($title).'\');return false;"><i class="fa fa-times" style="color: red;"> ลบ</i></a></li>
													</ul>
												</div>
											</td>
										</tr>
								';
								
					$m++;
								
					
				} //end whiel
			}
		mysql_free_result($re);
		return $sub_item;
	}
	
	
	function item_accessories_listbox($id, $get_parent_id) {
		$item_list='';
		$sql1="SELECT id, title, parent_id FROM "._TB_ITEM_ACCESSORIES." WHERE parent_id='$id' ORDER BY id ";
		$re1=mysql_query($sql1);
		if (mysql_num_rows($re1)>0) {
			while ($rs1=mysql_fetch_array($re1)) {
				
				$id=$rs1['id'];
				$title=stripslashes($rs1['title']);				
				$parent_id=$rs1['parent_id'];
						
				$select=($id==$get_parent_id ? ' selected ' : '');
				$item_list.='<option value="'.$id.'" '.$select.'>'.$id.'. '.$title.'</option>';
			}
		}	
		return $item_list;
	}
	function auto_new_item_code($prefix, $postfix) {
		//ตรวจสอบค่ามากสุด
		$sql="	SELECT MAX(item_code) AS max_code FROM "._TB_ITEM." 
					WHERE item_code_prefix='$prefix' 
					AND item_code_postfix='$postfix' 
				";
		$re=mysql_query($sql);
		$max_item_code =mysql_result($re,0);
		$auto_item_code=($max_item_code+1);
		return $auto_item_code;
	}
	
		
	function customer_name($id) {
		$sql="SELECT id, company_name  FROM "._TB_CUSTOMER." WHERE publish='1' AND  id='$id' LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);	
			$title=stripslashes($rs['company_name']);
		}
		return $title;
	}
	
	
	function customer_listbox($select_id) {
		$customer='';
		$sql="SELECT id, company_name FROM "._TB_CUSTOMER." WHERE publish='1' ORDER BY company_name  ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			while ($rs=mysql_fetch_array($re)) {
				$id=$rs["id"];
				$company_name=stripslashes($rs["company_name"]);	
				$select=($id==$select_id ? ' selected ' : '');
				$customer.='<option value="'.$id.'" '.$select.'>'.$company_name.'</option>';
			}
		}
		return $customer;		
	}
	
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
	
	function department_inout_lab_listbox($select_id) {
		$department='';
		
		$sql="SELECT id, title FROM "._TB_DEPARTMENT." WHERE publish='1' AND (is_in_lab='1' OR is_on_site='1') ORDER BY title  ";
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

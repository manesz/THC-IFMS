<?php
class db_class extends database {
	
	//CSR 
	function csr_no_format($code_no,$code_year) {
		$csr_no="$code_no/$code_year";
		return $csr_no;			
	}
	
	
	//Quotation ----------------------------------------
	function quotation_format_from_id($id) {
		$quotaton_no='';
		 $sql="SELECT id, code_sale, code_year, code_month, code_no, code_revise FROM "._TB_QUOTATION."  WHERE  id='$id'  LIMIT 1; ";
		$re=mysql_query($sql);
		
		if (mysql_num_rows($re)>0) {
				$rs=mysql_fetch_array($re);
					$id=$rs['id'];
					$code_sale=$rs['code_sale'];
					$code_year=$rs['code_year'];
					$code_month=$rs['code_month'];
					$code_no=$rs['code_no'];
					$code_revise=$rs['code_revise'];
					
					$quotaton_no=$this->quotation_no_format($code_sale,$code_year,$code_month,$code_no,$code_revise);
					
		}
		return $quotaton_no;
	}
	
	function quotation_no_format($code_sale,$code_year,$code_month,$code_no,$code_revise) {
		$quotaton_no="$code_sale-$code_year$code_month$code_no $code_revise";
		return $quotaton_no;			
	}
	
	
	
	function quotation_listbox($select_id) {
		$quotation='';
		$sql="SELECT id, code_sale, code_year, code_month, code_no, code_revise FROM "._TB_QUOTATION." WHERE publish='1' ORDER BY create_dttm DESC ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			
			while ($rs=mysql_fetch_array($re)) {
				$id=$rs['id'];
				$code_sale=$rs['code_sale'];
				$code_year=$rs['code_year'];
				$code_month=$rs['code_month'];
				$code_no=$rs['code_no'];
				$code_revise=$rs['code_revise'];


				$quotaton_code="$code_sale-$code_year$code_month$code_no $code_revise";
				
				$select=($id==$select_id ? ' selected ' : '');
				$quotation.='<option value="'.$id.'" '.$select.'>'.$quotaton_code.'</option>';
			}
		}
		return $quotation;		
	}
	
	//Item
	
	function item_no_format($item_code_prefix,$item_code_day,$item_code_month,$item_code,$item_code_year) {
		$item_no= "$item_code_prefix-$item_code_day$item_code_month$item_code/$item_code_year";
		return $item_no;
	}
	
	function item_accessories_list($n, $parent_id) {
			
			$sub_item='';
			$SQL="SELECT id, title, parent_id,  update_dttm,require_data FROM "._TB_ITEM_ACCESSORIES." WHERE publish='1' AND parent_id='$parent_id' ORDER BY id ";
			$re=mysql_query($SQL);
			$num=mysql_num_rows($re);
			
			if ($num>0) {
			
				$m=1;	
				while ($rs=mysql_fetch_array($re)) {
					$id=$rs['id'];
					$title=stripslashes($rs['title']);
					$parent_id=$rs['parent_id'];
					$require_data=$rs['require_data'];
					$latest_update=$rs['update_dttm'];
					
					
					$require=($require_data=='1' ? ' <span style="color:#f00;">(ต้องกรอกข้อมูลเพิ่มเติม)</span> ' : '');
					$sub_item.='
										  <tr>
											<td align="right">'.$n.'.'.$m.'</td>
											<td>'.$title.$require.'</td>
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
	
	
	function auto_new_item_code($prefix, $year, $month, $day, $department_id) {
		
				//ตรวจสอบค่ามากสุด
				$sql="	SELECT MAX(CONVERT(item_code,UNSIGNED INTEGER)) AS max_code FROM "._TB_ITEM." 
							WHERE  item_code_year='$year' 
							AND item_code_month='$month' 
							AND item_code_day='$day'
							AND department_id='$department_id'
						";
						
				$re=mysql_query($sql);
				$max_item_code =mysql_result($re,0);
				$auto_item_code=($max_item_code+1);
				
				return $auto_item_code;
		
	}
	
	/*
	function auto_new_item_code($prefix, $year, $month, $day) {
		
		//ตรวจสอบค่ามากสุด
		$sql="	SELECT MAX(item_code) AS max_code FROM "._TB_ITEM." 
					WHERE  item_code_year='$year' 
					AND item_code_month='$month' 
					AND item_code_day='$day' 
				";
		$re=mysql_query($sql);
		$max_item_code =mysql_result($re,0);
		$auto_item_code=($max_item_code+1);
		return $auto_item_code;		
	}
	*/
	
	
	
		
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
	
	
	function create_item_code_prefix($department_id) {
		$prefix='';
		$sql="SELECT code, is_in_lab, is_on_site  FROM "._TB_DEPARTMENT." WHERE publish='1' AND  id='$department_id' LIMIT 1; ";
		$re=mysql_query($sql);
		
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);
			
			$code=stripslashes($rs['code']);
			$is_in_lab=$rs['is_in_lab'];
			$is_on_site=$rs['is_on_site'];
			
			if ($is_in_lab=='1' && $is_on_site=="") {
				$lab="00";	
			} elseif ($is_in_lab=="" && $is_on_site=='1') {
				$lab='01';	
			} else {
				$lab='02';
			}
			
			
			$prefix="$code-$lab";
		}
		return $prefix;
	}
	
	
	//แผนก ----------------
	
	function department_code($id) {
		$code='';
		$sql="SELECT code  FROM "._TB_DEPARTMENT." WHERE publish='1' AND  id='$id' LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);	
			$code=stripslashes($rs['code']);
		}
		mysql_free_result($re);
		return $code;
	}
	
	function department_id_from_code($code) {
		$id='';
		$sql="SELECT id  FROM "._TB_DEPARTMENT." WHERE publish='1' AND  code='$code' LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);	
			$id=$rs['id'];
		}
		mysql_free_result($re);
		return $id;
	}
	
	function department_name($id) {
		$sql="SELECT title  FROM "._TB_DEPARTMENT." WHERE publish='1' AND  id='$id' LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);	
			$title=stripslashes($rs['title']);
		}
		return $title;
	}
	
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
	function position_name($id) {
		$sql="SELECT title  FROM "._TB_POSITION." WHERE publish='1' AND  id='$id' LIMIT 1; ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);	
			$title=stripslashes($rs['title']);
		}
		return $title;
	}
	
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
	
	
	//Member / Sale ----------------------------
	function member_name($id) {

		$sql="SELECT id, f_name, l_name FROM "._TB_MEMBER." WHERE id='$id' LIMIT 1 ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			$rs=mysql_fetch_array($re);	
				$f_name=stripslashes($rs["f_name"]);	
				$l_name=stripslashes($rs["l_name"]);	
				$Name="$f_name $l_name";
		}
		return $Name;
	}
	
						
	function member_listbox($select_id,$department_id=NULL) {
		$condition='';
		if ($department_id!="") {
			$condition=" AND department_id='$department_id' ";
		}
		$listbox='';
		$sql="SELECT id, f_name, l_name FROM "._TB_MEMBER." WHERE publish='1' $condition ORDER BY f_name, l_name  ";
		$re=mysql_query($sql);
		if (mysql_num_rows($re)>0) {
			while ($rs=mysql_fetch_array($re)) {
				$id=$rs["id"];
				$f_name=stripslashes($rs["f_name"]);	
				$l_name=stripslashes($rs["l_name"]);	
				$Name="$f_name $l_name";
				
				$select=($id==$select_id ? ' selected ' : '');
				$listbox.='<option value="'.$id.'" '.$select.'>'.$Name.'</option>';
			}
		}
		mysql_free_result($re);
		return $listbox;		
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

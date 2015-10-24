<?php
/**
 * Created by PhpStorm.
 * User: Manesz
 * Date: 12/9/2558
 * Time: 10:44 น.
 */
include("check-permission.php"); 


$customer_listbox=$db->customer_listbox('');


$department_id=$db->department_id_from_code('MKT');
$member_listbox=$db->member_listbox($_SESSION['ss_member_id'],$department_id);

//clear session เลือก item ทั้งหมด
unset($_SESSION['ss_select_item_id']);
 
include_once("header.php");
?>
<section id="container" >
<!-- **********************************************************************************************************************************************************
TOP BAR CONTENT & NOTIFICATIONS
*********************************************************************************************************************************************************** -->
<?php
include_once("top-nav-bar.php");
include_once("sidebar-menu.php");
?>
<section id="main-content">
<section class="wrapper" style="">
<div class="row" style="">
    <div class="col-lg-12">
        <div class="content-panel col-lg-12">
            <h3><i class="fa fa-angle-right"></i> <a href="request-quotation-list.php">รายการใบขอทราบราคาสอบเทียบ</a> <i class="fa fa-angle-right"></i> สร้างใบขอทราบราคาสอบเทียบ</h3>
        </div>
    </div>
</div><!-- /.row title -->

  <div class="alert alert-success" style="display:none;"><b>บันทึกข้อมูลสำเร็จ</b> You successfully read this important alert message.</div>
<div class="alert alert-warning" style="display:none;"><b>กรุณากรอกข้อมูลให้ครบถ้วน</b> Better check yourself, you're not looking too good.</div>
<div class="alert alert-danger" style="display:none;"><b>ไม่สามารถสร้างผู้ใช้งานได้</b> Change a few things up and try submitting again.</div>

 <form class="form-horizontal" action="quotation-script.php" id="frm_quotation" name="frm_quotation" method="post">

<div class="row" style="">
    <div class="col-lg-12">
        <div class="content-panel col-lg-12">
        
              <div class="row">
                <label class="col-sm-12 col-md-4 control-label">ชื่อพนักงานขาย</label>
                <div class="col-lg-8">
                   <select name="sale_code" id="sale_code" class="form-control">
                  			<?php echo $member_listbox; ?>
                   </select>
                </div>
            </div>
            
            <div class="row">
                <label class="col-sm-12 col-md-4 control-label">ชื่อผู้ติดต่อ</label>
                <div class="col-lg-8">
                   <input type="text" name="contact_name" id="contact_name" class="form-control">
                </div>
            </div>
            
            <div class="row">
                <label class="col-sm-12 col-md-4 control-label">แผนก</label>
                <div class="col-lg-8">
                		<input type="text" name="department_name" id="department_name" class="form-control">
                </div>
            </div>
            
            <div class="row">
                <label class="col-sm-12 col-md-4 control-label">ตำแหน่ง </label>
                <div class="col-lg-8">
                	<input type="text" name="position_name" id="position_name" class="form-control">
                </div>
            </div>
            
            <div class="row">
                <label class="col-sm-12 col-md-4 control-label">ชื่อบริษัท</label>
                <div class="col-lg-8">
                   <select class="selectBox js-states form-control" id="customer_id" name="customer_id">
                       <option value="">-- โปรดเลือก --</option>
                        <?php echo $customer_listbox; ?>
                    </select>
                </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row" style="margin-top:10px;">
                <div class="col-md-12" id="box_comapny_info"></div>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="col-lg-12" style="text-align: left; margin-top:10px;">
                <button class="btn btn-danger" type="submit" id="btn_delete_item" name="btn_delete_item">ลบอุปกรณ์</button>
            </div>
            
            
            <div class="col-lg-12" style="">
               
                 	<div id="box_select_item_list"></div>
                
            </div>
            
            
            <div class="row" style="">
                <div class="col-lg-12">
                    <div class="content-panel col-lg-12">
                        <div class="form-group" style="padding: 0; margin: 0;">
                        	<input type="hidden" name="act" id="act" value="" />
                            <button type="submit" id="btn_add_quotation" name="btn_add_qoutation" class="btn btn-success btn-lg col-md-6" style="float: right; margin: 0 5px 0 5px;">บันทึกข้อมูล</button>
                            <button type="button" class="btn btn-default btn-lg col-md-3" style="float: right; margin: 0 5px 0 5px;" onclick="window.location.href=window.location.href">เคลียร์ข้อมูล</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.row title -->
            
            </form><!-- /form -->
            
             <form class="form-horizontal style-form" action="quotation-script.php" id="frm_add_item" name="frm_add_item" method="post">

            <div class="clearfix form-group col-sm-12 col-md-12" style="float: right; text-align: right;">
                <button class="btn btn-primary col-lg-4" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="float: right; text-align: center;">
                    เพิ่มอุปกรณ์
                </button>
            </div><!-- /hidden button -->
            <div class="collapse" id="itemDescription" style="margin-top: 20px;"><!-- itemDescription tab -->
    				<div id="box_all_item_list"></div>
                  
                <!-- <button type="button" class="btn btn-success col-lg-12" role="button" data-toggle="collapse" href="#itemDescription" aria-expanded="false" aria-controls="itemDescription" style="margin: 0 0 20px 0;" id="add_item"> บันทึกข้อมูลจำนวนอุปกรณ์</button> -->
                  <input type="hidden" name="act" id="act" value="add_item">
                  <button type="submit" id="btn_add_item"  class="btn btn-success col-lg-4"  style="float: right; margin: 0 5px 0 5px;">บันทึกข้อมูลจำนวนอุปกรณ์</button>
            </div>

        </div><!-- /content-panel col-lg-12 -->
    </div><!-- /col-lg-12 -->
</div><!-- /.row -->

		</form>
        
        

</section><!-- /.wrapper -->
</section><!-- /#main-content -->
</section><!-- /#container -->

<?php include_once("footer.php"); ?>
<!--script for this page-->
<script src="libs/js/jquery.dataTables.min.js"></script>
<script src="libs/js/dataTables.bootstrap.min.js"></script>

<script src="libs/js/jquery.form.js"></script>

<script>
$(document).ready(function() {
		
        $('#requestList').DataTable();
        $('#itemList').DataTable();
//        $("#departmentList_filter").add

		

		$(".alert").hide();	
		$("#btn_delete_item").hide();
		
		var get_result="<?php echo $get_result; ?>";
		if (get_result=="true") {
			$(".alert-success").fadeIn();	
		}

		$("#customer_id").change(function() {
				var id=$(this).val();
						if (id!="") {
							$.post("item-script.php", {'act':'get_customer_info','id':id},function(data) {
								$("#box_comapny_info").html(data);
							});
						} else {
							$("#box_comapny_info").html('')	;
						}
		});
		
		//load default item
		load_all_item_list();
		load_selected_item();	
		
		
		//add item 
		$('#frm_add_item').ajaxForm( 
		{ 
				beforeSubmit: validate,
				complete: function(xhr) {
						var result=xhr.responseText;
						
							if (result=='') {							
						    		load_selected_item();		
									load_all_item_list();	
												
							}					
				}
		}); 
		
		//Remove item
		$("#btn_delete_item").click(function() {
					$("#act").val("delete_item_list");
					
					$('#frm_quotation').ajaxForm( 
					{ 
							beforeSubmit: validate,
							complete: function(xhr) {
									var result=xhr.responseText;
									load_selected_item();		
									load_all_item_list();	
							}
					}); 
				//	return false;
		});
		
		
		//Add Qoutation
		$("#btn_add_quotation").click(function() {
					$("#act").val("add_new_quotation");
					
					$('#frm_quotation').ajaxForm( 
					{ 
							beforeSubmit: validate_add_quotation,
							complete: function(xhr) {
									var result=xhr.responseText;
									if (result=="") {
										window.location.href="request-quotation-list.php";
									} else {
										alert("เกิดข้อผิดพลาด!\n"	+result);
									}
									
							}
					}); 
				//	return false;
		});
});
	
	
function validate(formData, jqForm, options) {		
	  if ($('input[name^=item_chk]:checked').length <= 0) {
		alert("โปรดเลือก Item ที่ต้องการ");
		return false;	
	 } 
};

function validate_add_quotation(formData, jqForm, options) {		
	  if ($('#contact_name').val() == "") {
		alert("กรุณาใส่ชื่อผู้ติดต่อ");
		$("#contact_name").focus();
		return false;	
	  } else if ($('#department_name').val() == "") {
			alert("กรุณาใส่ชื่อแผนก");
			$("#department_name").focus();
			return false;	
	  } else if ($('#position_name').val() == "") {
			alert("กรุณาใส่ชื่อตำแหน่ง");
			$("#position_name").focus();
			return false;	
	} else if ($('#customer_id').val() == "") {
			alert("กรุณาเลือกบริษัท");
			$("#customer_id").focus();
			return false;		
	} else if ($("#box_select_item_list").html()=="") {
			alert("กรุณาเลือกอุปกรณ์ที่ต้องการขอทราบราคาอย่างน้อย 1 รายการ");	
			return false;	
	} else if ($("#box_select_item_list").html()!="") {
			var flag=true;
			$('input[name^="item_qty"]').each(function() {
					if ($(this).val()=="") {
						flag=false;						
					}
			});	
			
			if (!flag) {
				alert("กรุณาระบุจำนวนให้ครบถ้วนทุกอุปกรณ์");
				return false;	
			}
	}
	 
	 
};

function load_all_item_list() { //item ทั้งหมด ยกเว้นที่เลือก
	$.post("quotation-script.php",{'act':'load_all_item_list'},function(data) {
			$("#box_all_item_list").html(data);
			select_all();
	});
}

function load_selected_item() { //item ที่เลือก
	$.post("quotation-script.php",{'act':'display_select_item'},function(data) {
			$("#box_select_item_list").html(data);	
			
			if (data!="") { 
				$("#btn_delete_item").show();	 //show delete button
				select_all();
			} else {
				$("#btn_delete_item").hide();	 //hide delete button
			}
	});
}
function select_all() {
		$('#select_all_1,#select_all_2').change(function() {
			var checkboxes = $(this).closest('form').find(':checkbox');
			if($(this).is(':checked')) {
				checkboxes.prop('checked', true);
			} else {
				checkboxes.prop('checked', false);
			}
		});	
}
</script>

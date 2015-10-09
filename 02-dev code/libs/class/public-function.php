<?php
$LongMonth=array("January","February","March","April","May","June","July","August","September","October","November","December");
$ShortMonth=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");	
$ShortDay=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");

$LongMonthTh=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$ShortMonthTh=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
$LongDayThai=array('อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์');



function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, count($alphabet)-1);
        $pass[$i] = $alphabet[$n];
    }
    return $pass;
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

function url_img_validate($img_url)
{
	$headers = @get_headers($img_url);
	if (preg_match("|200|", $headers[0])) {
		return true;
	}else {
		return false;
	}
}


function is_decimal($number) {
	
	if ( strpos( $number, "." ) !== false ) {
		return number_format($number,2);
	} else {
		return number_format($number);	
	}
}


function DateNumberTH2EN($datethai) {
	//thai format dd-mm-yyyy
	//chang to eng format yyyy-mm-dd
	//input 25-02-2555
	$arr=explode("-",$datethai);
	$y=($arr[2]-543);
	return $y.'-'.$arr[1].'-'.$arr[0];
}

function DateNumberEN2TH($date_eng) {
	
	//eng format yyyy-mm-dd
	//change to thai format dd-mm-yyyy
	
	//date thai format = 2011-12-01 to  01-12-2554
	$dd=date("d",strtotime($date_eng));
	$mm=date("m",strtotime($date_eng));
	$yy=date("Y",strtotime($date_eng));
	//$yy=(int)(substr($date_eng,0,4))+543;
	$th_date=$dd.'-'.$mm.'-'.($yy+543);			
	return $th_date;
}


function ShortDateTimeThai($timestamp, $ShowTime=NULL) { //date is timestamp
global $ShortMonthTh;
	$dd=date('j',$timestamp);
	$mm=date('n',$timestamp);
	$yy=date('Y',$timestamp);
	if ($ShowTime=='no') {
		$time='';
	} else {
		$time=' - '.date('H:i:s',$timestamp);
	}
	$ThaiDateTime=$dd.' '.$ShortMonthTh[$mm-1].' '.substr(($yy+543),2,2).$time;
	return $ThaiDateTime;	
}

function ShortDateTimeThai2($timestamp, $ShowTime=NULL) { //date is timestamp
global $ShortMonthTh;
	$dd=date('j',$timestamp);
	$mm=date('n',$timestamp);
	$yy=date('Y',$timestamp);
	if ($ShowTime=='no') {
		$time='';
	} else {
		$time=' - '.date('H:i',$timestamp)." น.";
	}
	$ThaiDateTime=$dd.' '.$ShortMonthTh[$mm-1].' '.substr(($yy+543),2,2).$time;
	return $ThaiDateTime;	
}

function datetime2short($fulldatetime) { //date is timestamp
	$date=date("Y-m-d H:i",strtotime($fulldatetime));
	return $date;	
}

function LongDateTimeThai($timestamp, $ShowTime=NULL) { //date is timestamp
global $LongMonthTh;
	$dd=date('j',$timestamp);
	$mm=date('n',$timestamp);
	$yy=date('Y',$timestamp);
	if ($ShowTime=='no') {
		$time='';
	} else {
		$time=' - '.date('H:i:s',$timestamp);
	}
	$ThaiDateTime=$dd.' '.$LongMonthTh[$mm-1].' '.($yy+543).$time;
	return $ThaiDateTime;	
}

function LongDateTimeThai2($timestamp, $ShowTime=NULL) { //date is timestamp
	global $LongMonthTh;
	$dd=date('j',$timestamp);
	$mm=date('n',$timestamp);
	$yy=date('Y',$timestamp);
	
	if ($ShowTime=='no') {
		$time='';
	} else {
		$time=date('H:i:s',$timestamp);
	}
	$ThaiDateTime=$dd.' '.$LongMonthTh[$mm-1].' '.($yy+543).' เวลา '.$time.' น.';
	return $ThaiDateTime;	
}

function LongDateTimeThai3($timestamp, $ShowTime=NULL) { //date is timestamp
	global $LongMonthTh;
	$dd=date('j',$timestamp);
	$mm=date('n',$timestamp);
	$yy=date('Y',$timestamp);
	
	if ($ShowTime=='no') {
		$time='';
	} else {
		$time=date('H:i',$timestamp);
	}
	$ThaiDateTime=$dd.' '.$LongMonthTh[$mm-1].' '.($yy+543).' เวลา '.$time.' น.';
	return $ThaiDateTime;	
}

//Download File for Save as to client computer
//@param: $file = Path of file to download in server
//Example: DownloadFile("/download/example.pdf");
function DownloadFile($file){

	//First, see if the file exists
	if (!is_file($file)) { die("<b>404 File not found!</b>"); }

	//Gather relevent info about file
	$len = filesize($file);
	$filename = basename($file);
	$file_extension = strtolower(substr(strrchr($filename,"."),1));

	//This will set the Content-Type to the appropriate setting for the file
	switch( $file_extension ) {
	  case "pdf": $ctype="application/pdf"; break;
	  case "exe": $ctype="application/octet-stream"; break;
	  case "zip": $ctype="application/zip"; break;
	  case "doc": $ctype="application/msword"; break;
	  case "xls": $ctype="application/vnd.ms-excel"; break;
	  case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
	  case "gif": $ctype="image/gif"; break;
	  case "png": $ctype="image/png"; break;
	  case "jpeg":
	  case "jpg": $ctype="image/jpg"; break;
	  case "mp3": $ctype="audio/mpeg"; break;
	  case "wav": $ctype="audio/x-wav"; break;
	  case "mpeg":
	  case "mpg":
	  case "mpe": $ctype="video/mpeg"; break;
	  case "mov": $ctype="video/quicktime"; break;
	  case "avi": $ctype="video/x-msvideo"; break;
	  case "mp4": $ctype="video/mp4"; break;

	  //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
	  case "php":
	  case "htm":
	  case "html":
	  case "txt": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;

	  default: $ctype="application/force-download";
	}

	//Begin writing headers
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
   
	//Use the switch-generated Content-Type
	header("Content-Type: $ctype");

	//Force the download
	$header="Content-Disposition: attachment; filename=".$filename.";";
	header($header );
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".$len);
	@readfile($file);
	exit;
}


function get_ip_address()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


//DiffDate
function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
	/*
	$interval can be:
	yyyy - Number of full years
	q - Number of full quarters
	m - Number of full months
	y - Difference between day numbers
	(eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
	d - Number of full days
	w - Number of full weekdays
	ww - Number of full weeks
	h - Number of full hours
	n - Number of full minutes
	s - Number of full seconds (default)
	*/
	#
	if (!$using_timestamps) {
	$datefrom = strtotime($datefrom, 0);
	$dateto = strtotime($dateto, 0);
	}
	$difference = $dateto - $datefrom; // Difference in seconds
	#
	switch($interval) {
	#
	case 'yyyy': // Number of full years
	 
	$years_difference = floor($difference / 31536000);
	if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
	$years_difference--;
	}
	if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
	$years_difference++;
	}
	$datediff = $years_difference;
	break;
	 
	case "q": // Number of full quarters
	 
	$quarters_difference = floor($difference / 8035200);
	while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
	$months_difference++;
	}
	$quarters_difference--;
	$datediff = $quarters_difference;
	break;
	 
	case "m": // Number of full months
	 
	$months_difference = floor($difference / 2678400);
	while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
	$months_difference++;
	}
	$months_difference--;
	$datediff = $months_difference;
	break;
	 
	case 'y': // Difference between day numbers
	 
	$datediff = date("z", $dateto) - date("z", $datefrom);
	break;
	 
	case "d": // Number of full days
	 
	$datediff = floor($difference / 86400);
	break;
	 
	case "w": // Number of full weekdays
	 
	$days_difference = floor($difference / 86400);
	$weeks_difference = floor($days_difference / 7); // Complete weeks
	$first_day = date("w", $datefrom);
	$days_remainder = floor($days_difference % 7);
	$odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
	if ($odd_days > 7) { // Sunday
	$days_remainder--;
	}
	if ($odd_days > 6) { // Saturday
	$days_remainder--;
	}
	$datediff = ($weeks_difference * 5) + $days_remainder;
	break;
	 
	case "ww": // Number of full weeks
	 
	$datediff = floor($difference / 604800);
	break;
	 
	case "h": // Number of full hours
	 
	$datediff = floor($difference / 3600);
	break;
	 
	case "n": // Number of full minutes
	 
	$datediff = floor($difference / 60);
	break;
	 
	default: // Number of full seconds (default)
	 
	$datediff = $difference;
	break;
	}
	 
	return $datediff;		 
} //end function datediff



//Image ----------------
function isImage($file_obj){
	$IMG_TYPE = array('image/pjpeg', 'image/jpeg', 'image/gif', 'image/png', 
	'image/x-png');
	$file_type = $file_obj['type'];
	return(in_array($file_type, $IMG_TYPE));
}


/**
* ฟั่งชั่น resize รูปภาพโดยกำหนด ความกว้าง,สูง สูงสุด
* $save_filename ชื่อไฟล์ไม่ต้องมีนามสกุล
* $ww ความกว้าง สูงสุด
* $hh ความสูง สูงสุด
* return เป็นชื่อไฟล์ที่ถูกเก็บ
* string uploadResizeTo(resource $file_obj,string $save_path,string 
$save_filename[,int $ww,int $hh])
*/
function uploadResizeTo($file_obj, $save_path, $save_filename, $ww=200, $hh=200) {
		$file_name = $file_obj['name'];
		$file_type = $file_obj['type'];
		$tmp_name = $file_obj['tmp_name'];
		
		switch($file_type){
			case "image/pjpeg" :
			case "image/jpeg" :
					$images_orig = ImageCreateFromJPEG($tmp_name);
					break;
			case "image/gif":
					$images_orig = ImageCreateFromGIF($tmp_name);
					break;
			case "image/png":
			case "image/x-png":
					$images_orig = ImageCreateFromPNG($tmp_name);
					break;
			case "image/bmp":
				$images_orig = ImageCreateFromWBMP($tmp_name);
				break;
			default:
			return(false);
		}
		
		$orig_width = ImagesX($images_orig);
		$orig_height = ImagesY($images_orig);
		
		if($orig_width > $ww || $orig_height>$hh){
				if($orig_width > $orig_height){
					$hh = ($ww/$orig_width)*$orig_height;
				}else{
					$ww = ($hh/$orig_height)*$orig_width;
				}
		}else{
			$hh = $orig_height;
			$ww = $orig_width;
		}
		
		$images_fin = ImageCreateTrueColor($ww, $hh);
		@imagecopyresized($images_fin, $images_orig, 0, 0, 0, 0, $ww, $hh, 
		$orig_width, $orig_height);$ext = end(explode(".", $file_name));
		$newfilename = $save_filename.".".$ext;
		$save = $save_path.$newfilename;
		switch($file_type){
			case "image/pjpeg" :
			case "image/jpeg" :
			case "image/jpg" :
					imagejpeg($images_fin, $save ,100); // image quality = 90
					break;
			case "image/gif":
					imagegif($images_fin,$save);
					break;
			case "image/png":
			case "image/x-png":
					imagepng($images_fin,$save); 
					break;
			case "image/bmp":
					imagewbmp($images_fin,$save);
			default:
			return(false);
		}
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);
		return($newfilename);
}

/*end of resize image */


?>
<?php

function get_random_string($type = '', $len = 8) {
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numeric = '0123456789';
    $special = '`~!@#$%^&*()-_=+\\|[{]};:\'",<.>/?';
    $key = '';
    $token = '';
    if ($type == '') {
        $key = $lowercase.$uppercase.$numeric;
    } else {
        if (strpos($type,'09') > -1) $key .= $numeric;
        if (strpos($type,'az') > -1) $key .= $lowercase;
        if (strpos($type,'AZ') > -1) $key .= $uppercase;
        if (strpos($type,'$') > -1) $key .= $special;
    }
    for ($i = 0; $i < $len; $i++) {
        $token .= $key[mt_rand(0, strlen($key) - 1)];
    }
    return $token;
}
	 require("covacDB.php");
	 if(!preg_match("/".$_SERVER['HTTP_HOST']."/i",$_SERVER['HTTP_REFERER'])) {
		exit("잘못된 접근입니다."); } else if(!(isset($_FILES["upload"]["error"]) && $_FILES["upload"]["error"] == UPLOAD_ERR_OK)) {
		 $errMsg = "파일 업로드 중 오류가 발생했습니다.";
		 echo $errMsg;
	 }	else {
		 
		 $temp_name = $_FILES["upload"]["tmp_name"];
		 $file_name = $_FILES["upload"]["name"];
		 $file_size = $_FILES["upload"]["size"];
		 $file_type = $_FILES["upload"]["type"];
		
		 $save_name = iconv("utf-8", "cp949", $file_name);
		 
		 if (file_exists("files/$save_name")) {
			 $errMsg = "이미 업로드된 파일입니다!";
			 echo $errMsg;
		 } else if (!move_uploaded_file($temp_name, "files/$save_name")) {
			 $errMsg = "지정된 폴더로 저장 중에 오류가 발생했습니다";
			 echo $errMsg;
		 } else {
			 try {
				 $title			= isset($_REQUEST["title" ]) ? $_REQUEST["title" ] : "";
				 $content		= isset($_REQUEST["content" ]) ? $_REQUEST["content" ] : "";
				 $path = "files/$save_name";
				 $link = "http://www.covac.news/webhard/";
				 $now = date("Y-m-d H:i:s");
				 $code = get_random_string('azAZ09');
				 $db->exec("insert into webhard (fname, ftime, fsize, path, up, code)
				 values ('$file_name', '$now', $file_size, '$link$path', 'true', '$code')");
				 setcookie("title", "$title", time() + 60 * 1);
				 setcookie("content", "$content", time() + 60 * 1);
	?>
			<script>
				 alert("업로드 완료!");
				 opener.parent.location.reload();
				 window.close();
			</script>
	<?php
			 } catch (PODException $e) {
				 exit($e->getMessage());
			 }
	 }
	}
	

?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>파일 업로드</title>
</head>
<body>

</body>
</html>
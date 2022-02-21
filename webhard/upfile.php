<?php
if(!preg_match("/".$_SERVER['HTTP_HOST']."/i",$_SERVER['HTTP_REFERER'])) {
		exit("잘못된 접근입니다."); }
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>파일 업로드</title>
</head>
<body>
<form action="http://www.covac.news/webhard/upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="upload"><br>
	<input type="submit" value="전송">
</form>	
</body>
</html>
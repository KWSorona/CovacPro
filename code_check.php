<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<?php
	$email		= isset($_REQUEST["email" ]) ? $_REQUEST["email" ] : "";
	$code		= isset($_REQUEST["code" ]) ? $_REQUEST["code" ] : "";
	try {
		if (!($_COOKIE["code"])) {
			setcookie("email", "", time() - 3600);
			setcookie("name", "", time() - 3600);
			setcookie("pw", "", time() - 3600);
			setcookie("pw_check", "", time() - 3600);
?>
			<script>
				alert('인증번호를 받지 않았거나 만료되었습니다');
				history.back();
			</script>
<?php
		} else if($code == $_COOKIE["code"]) {
			require("covacDB.php");
			$db->exec("insert into User_info (email) values ('$email')");
			setcookie("checkfin", "1", time() + 60 * 10); 
?>
			<script>
				alert('성공!');
				history.back();
			</script>
<?php
		} else {
			
?>
			<script>
				alert('인증번호가 틀립니다');
				history.back();
			</script>
<?php
			
		}
		
		
	}
	
	catch (PDOException $e) {
		exit($e->getMessage());
	}
	
?>

		
</body>
</html>
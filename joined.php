<!doctype html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<?php
	$id		= isset($_REQUEST["id" ]) ? $_REQUEST["id" ] : "";
	$pw		= isset($_REQUEST["pw" ]) ? $_REQUEST["pw" ] : "";
	$name	= isset($_REQUEST["name" ]) ? $_REQUEST["name" ] : "";
	$adress	= isset($_REQUEST["adress" ]) ? $_REQUEST["adress" ] : "";
	$gender	= isset($_REQUEST["gender" ]) ? $_REQUEST["gender" ] : "";
	$email	= isset($_REQUEST["email" ]) ? $_REQUEST["email" ] : "";
	
	try {
		require("db.php");
		
		if(!($id && $pw && $name && $adress && $gender && $email)) {
?>
			
			<script>
				alert('빈칸없이 입력해야 합니다.');
				history.back();
			</script>
<?php	
		} else if ($db->query("SELECT COUNT(*) FROM member WHERE id='$id'")->fetchColumn() > 0) {
?>
		<script>
				alert('이미 존재하는 아이디 입니다.');
				history.back();
		</script>
<?php
		} else {
			$db->exec("insert into member values ('$id', '$pw', '$name', '$adress', '$gender', '$email')");
?>
		<script>
				alert('가입 완료!');
				document.location.href="login_page.php";
		</script>
<?php
		}
	}	catch (PDOException $e) {
		exit($e->getMessage());
	}
?>
			

</body>
</html>
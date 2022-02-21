<?php
	require("covacDB.php");
	$email		= isset($_REQUEST["email" ]) ? $_REQUEST["email" ] : "";
	$name		= isset($_REQUEST["name" ]) ? $_REQUEST["name" ] : "";
	$title 		= isset($_REQUEST["title" ]) ? $_REQUEST["title" ] : "";
	$content 	= isset($_REQUEST["content" ]) ? $_REQUEST["content" ] : "";
	$timestamp 	= strtotime("+1 days");
	$done		= $db->query("select done from User_info where email='$email'");
	$update		= "yes";
	
	if(strlen($title)>40)
		{
?>
			<script>
				alert('제목은 40글자 이내로 지정해야합니다');
				history.back();
			</script>
<?php
		} else if (!($title && $content)) {
			
?>
			<script>
				alert('모든 항목이 빈칸 없이 입력되어야 합니다.');
				history.back();
			</script>
<?php
		} else {
		
		try {
			
			$day = date("Y-m-d H:i:s", $timestamp);
			
			$db->exec("insert into Epilogue (name, title, content, day, view)
						values ('$name', '$title', '$content', '$day', 0)");
			$done = $db->exec("update User_info set done='$update' where email='$email'");
		setcookie("email", "", time() - 3600);
		setcookie("name", "", time() - 3600);
		setcookie("pw", "", time() - 3600);
		setcookie("pw_check", "", time() - 3600);
		setcookie("code", "", time() - 3600); 
		setcookie("checkfin", "", time() -3600);
		}	catch (PDOException $e) {
			exit($e->getMessage());
		}
		
		header("Location:board.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

</body>
</html>
<?php
	require("covacDB.php");
	$email = isset($_REQUEST["email" ]) ? $_REQUEST["email" ] : "";
?>

<!DOCTYPE html>
<html lang="ko">
	<head>

		<title>COVAC</title>

	</head>

	<body>
	<?php
		if(!($_COOKIE["email"]) || $_COOKIE["email"] != $_REQUEST["email"]) {
		} else{
		$db->exec("delete from User_info where email='$email'");
		}
		setcookie("email", "", time() - 3600);
		setcookie("name", "", time() - 3600);
		setcookie("pw", "", time() - 3600);
		setcookie("pw_check", "", time() - 3600);
		setcookie("code", "", time() - 3600); 
		setcookie("checkfin", "", time() -3600);
	?>
	
	<script>
		history.back();
	</script>
	</body>
</html>

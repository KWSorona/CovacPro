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


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require("covacDB.php");
require '/home/ubuntu/PHPMailer/src/Exception.php';
require '/home/ubuntu/PHPMailer/src/PHPMailer.php';
require '/home/ubuntu/PHPMailer/src/SMTP.php';

$name		= isset($_REQUEST["name" ]) ? $_REQUEST["name" ] : "";
$pw			= isset($_REQUEST["pw" ]) ? $_REQUEST["pw" ] : "";
$pw_check	= isset($_REQUEST["pw_check" ]) ? $_REQUEST["pw_check" ] : "";
$email		= isset($_REQUEST["email" ]) ? $_REQUEST["email" ] : "";
$yyyy		= isset($_REQUEST["yyyy" ]) ? $_REQUEST["yyyy" ] : "";
$mm			= isset($_REQUEST["mm" ]) ? $_REQUEST["mm" ] : "";
$dd			= isset($_REQUEST["dd" ]) ? $_REQUEST["dd" ] : "";
$done		= $db->query("select done from User_info where email='$email'");


//인증코드 생성
$code = get_random_string('azAZ09');


$message = '메일 인증에 성공하셨습니다! 
인증 코드는 5분뒤 만료됩니다.
메일 인증 코드 : '.$code;
	setcookie("email", "$email", time() + 60 * 10);
	setcookie("name", "$name", time() + 60 * 10);
	setcookie("pw", "$pw", time() + 60 * 10);
	setcookie("pw_check", "$pw_check", time() + 60 * 10);
	setcookie("code", "$code", time() + 60 * 5); 


try {

if(!preg_match("/".$_SERVER['HTTP_HOST']."/i",$_SERVER['HTTP_REFERER'])) {
		exit("잘못된 접근입니다."); } else if(!($email)) {
?>

<script>
	alert('메일 주소를 입력해 주세요!');
	history.back();
</script>
	
<?php
} else if ($done->fetchColumn() == 'yes') {
		setcookie("email", "", time() - 3600);
		setcookie("name", "", time() - 3600);
		setcookie("pw", "", time() - 3600);
		setcookie("pw_check", "", time() - 3600);
		setcookie("code", "", time() - 3600); 
?>
	<script>
		alert('이미 작성한 글이 있습니다!');
		history.back();
	</script>
<?php
} else if ($db->query("SELECT COUNT(*) FROM User_info WHERE email='$email'")->fetchColumn() > 0) {
  setcookie("checkfin", "1", time() + 60 * 10); 

?>
<script>
	alert('메일 인증이 이미 완료된 상태입니다. 계속 진행해주세요');
	history.back();
</script>
<?php	
	
} 	else {
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch $mail->IsSMTP(); // telling the class to use SMTP
$mail->IsSMTP(); // telling the class to use SMTP
$mail->CharSet = "utf-8";   //한글이 안깨지게 CharSet 설정
$mail->Encoding = "base64";
$mail->Host = "smtp.gmail.com"; // email 보낼때 사용할 서버를 지정
$mail->SMTPAuth = true; // SMTP 인증을 사용함
$mail->Port = 465; // email 보낼때 사용할 포트를 지정
$mail->SMTPSecure = "ssl"; // SSL을 사용함
$mail->Username = "covacsys@gmail.com"; // Gmail 계정
$mail->Password = "0hishokunosora!"; // 패스워드
$mail->SetFrom('covacsys@gmail.com', 'Covac'); // 보내는 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
$mail->AddAddress($email); // 받을 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
$mail->Subject = 'Covac 메일 인증 확인'; // 메일 제목
$mail->Body = $message; // 내용
$mail->Send(); // 발송


//$db->exec("insert into User_info (email, code) values ('$email', '$code')");
?>
<script>
	alert('인증 번호가 전송되었습니다. 메일에서 확인하세요!');
	history.back();
</script>
<?php
}
	}	catch (phpmailerException $e) {
                        echo $e->errorMessage(); //Pretty error messages from PHPMailer
	} 	catch (Exception $e) {
                        echo $e->getMessage(); //Boring error messages from anything else!

	}
?>

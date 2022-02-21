<!doctype html>
<html lang="ko">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Script-Type" content="text/javascript" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1, minimum-scale=1" />

  <title>COVAC</title>
  <link rel="icon" href="./img/favicon.jpg">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css" />
  <link rel="stylesheet" type="text/css" href="./style.css" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
</head>
</head>
<body>

<?php
	require("covacDB.php");
	$name		= isset($_REQUEST["name" ]) ? $_REQUEST["name" ] : "";
	$pw			= isset($_REQUEST["pw" ]) ? $_REQUEST["pw" ] : "";
	$pw_check	= isset($_REQUEST["pw_check" ]) ? $_REQUEST["pw_check" ] : "";
	$email		= isset($_REQUEST["email" ]) ? $_REQUEST["email" ] : "";
	$yyyy		= isset($_REQUEST["yyyy" ]) ? $_REQUEST["yyyy" ] : "";
	$mm			= isset($_REQUEST["mm" ]) ? $_REQUEST["mm" ] : "";
	$dd			= isset($_REQUEST["dd" ]) ? $_REQUEST["dd" ] : "";
	$gender		= isset($_REQUEST["gender" ]) ? $_REQUEST["gender" ] : "";
	$admin		= 1;
	$birth		= "$yyyy" . "-" . "$mm" . "-" . "$dd";
	$done		= $db->query("select done from User_info where email='$email'");
	
	setcookie("email", "$email", time() + 60 * 10);
	setcookie("name", "$name", time() + 60 * 10);
	setcookie("pw", "$pw", time() + 60 * 10);
	setcookie("pw_check", "$pw_check", time() + 60 * 10);
	
	try {
		
		if(!preg_match("/".$_SERVER['HTTP_HOST']."/i",$_SERVER['HTTP_REFERER'])) {
		exit("잘못된 접근입니다."); } else if(!($email && $name && $pw && $pw_check && $gender && $yyyy && $mm && $dd) || $dd == "day" || $dd == "") {
?>
			
			<script>
				alert('빈칸없이 입력해야 합니다.');
				history.back();
			</script>
<?php	
		} else if ($pw != $pw_check) {
?>
		<script>
				alert('비밀번호가 일치하지 않습니다. 다시 확인해주세요!');
				history.back();
		</script>
<?php		
			
		}	else if ($db->query("SELECT COUNT(*) FROM User_info WHERE email='$email'")->fetchColumn() == 0) {
?>
		<script>
				alert('메일 인증이 완료되지 않았습니다. 다시 확인해주세요!');
				history.back();
		</script>
<?php
		}	else if ($done->fetchColumn() == 'yes') {
		
?>
		<script>
				alert('이미 글을 작성하였습니다!');
				history.back();
		</script>
<?php	
		
		}	else {
			$pw = md5($pw);
			$db->exec("update User_info set name='$name', pw='$pw', birth='$birth', gender='$gender', admin='$admin' where email = '$email' LIMIT 1");
		}
	}	catch (PDOException $e) {
		exit($e->getMessage());
	}
?>
			<div id="body_container">

    <header id="header" class="display_flex_center">
      <a href="http://www.covac.news">
        <img src="./src/assets/logo.png" alt="covac_logo" />
      </a>
    </header>

    <main id="main" class="display_flex_center">
      <div class="main_content_wrapper">

        <nav id="nav">
          <ul class="nav_ul">
            <li><a href="http://www.covac.news" class="none_low_depth">백신</a></li>
            <li>
              <div class="has_low_depth">기사</div>
              <ul class="low_depth">
                <li><a href="arti_press.php">언론사별</a></li>
                <li><a href="arti_vac.php">백신별</a></li>
              </ul>
            </li>
            <li><a href="board.php" class="none_low_depth selected">접종후기</a></li>
            <li>
              <div class="has_low_depth">공지</div>
              <ul class="low_depth">
                <li><a href="announce_1.php">공지사항</a></li>
                <li><a href="announce_2.php">문의 및 제보</a></li>
                <li><a href="announce_3.php">후원정보</a></li>
              </ul>
            </li>
            <li>
              <div class="has_low_depth">바로알기</div>
              <ul class="low_depth">
                <li><a href="check_vac.php">백신 종류별 특성</a></li>
                <li><a href="check_place.php">백신 접종 기관</a></li>
                <li><a href="check_vid.php">백신 동영상</a></li>
              </ul>
            </li>
          </ul>
        </nav>

        <form method="post" name="form">
        <article>
          <section id="section_container" class="section_write_review">
            <div class="board_header">
              <h1>코로나 접종 후기 게시판</h1>
              <p>
                코로나 백신 접종하신 분들의 후기를 작성하는 게시판입니다.<br />
                여러분들의 정보가 대한민국의 백신입니다.
              </p>
              <h3>허위 사실을 유포하시면 법적 처벌을 받을 수 있습니다.</h3>
            </div>
            <div class="write_review_container">
				<table class="tbl_write">
					<caption>글쓰기 폼</caption>
					<colgroup>
						<col width="20%" />
						<col width="*" />
					</colgroup>
					<tbody>
						<tr>
							<th>글 제목</th>
							<td><input class="input_review_title" type="text" name="title" placeholder="제목을 입력해 주세요(40글자 이내)" /></td>
						</tr>
						<tr>
							<th>파일 첨부</th>
							<td> <form name="upload" id="upload" method="post" 
							onclick="javascript: form.action='http://www.covac.news/upimg.php';" enctype="multipart/form-data" 
							onsubmit="return formSubmit(this);">
							<input class="input_upload_file" type="file" id="img"/></form></td>
						</tr>
						<tr>
							<td colspan="2">
								<textarea name="content" id="" cols="30" rows="10" placeholder="내용을 입력해 주세요"></textarea>
							</td>
						</tr>
					</tbody>
				</table>
				<input type="hidden" name="name" value=<?=$name?>>
				<input type="hidden" name="email" value=<?=$email?>>
             <!--  <div class="review_item">
                <span>글 제목</span>
                <input class="input_review_title" type="text" placeholder="제목을 입력해 주세요" />
              </div>
              <div class="review_item">
                <span>파일 첨부</span>
                <input class="input_upload_file" type="file" />
              </div>
              <div class="review_item">
                <textarea rows="30" placeholder="내용을 입력해 주세요"></textarea>
              </div> -->
            </div>
            <div class="footer_wrapper">
              <input type="submit" class="btn_register" onclick="javascript: form.action='http://www.covac.news/apply.php';" value="등록">
            </div>
          </section>
          <div id="footer_section_container">
            <section>
              <div class="ad_wrapper_mainpage">
                <img src="./src/assets/ad.png" width="650"alt="ad" />
              </div>
            </section>
          </div>
        </article>
      </form>

      </div>
    </main>

    <footer id="footer">
      Copyright 2021. 1조 All pictures cannot be copied without permission.
      <br />
      yghasd@g.shingu.ac.kr
    </footer>

  </div>

  <!--
script
각 큰 메뉴 class :
백신, 접종후기 : none_low_depth
기사, 공지, 바로알기 : has_low_depth
그 아래 : low_depth
선택됨 : selected
-->

  <script type="text/javascript">
    $(document).ready(function() {
      const handleCommonNavFunction = () => {
        //첫 페이지 로딩시, 보이는 메뉴 모두 최소화
        $("#nav ul li div").removeClass("selected")
        $("#nav ul li a").removeClass("selected")
        $("#nav ul.low_depth").hide()
      }
      //백신, 접종후기 선택시 selected로 변경
      $("#nav ul li a.none_low_depth").click(function() {
        handleCommonNavFunction()
        $(this).addClass("selected")
      })
      //기사, 공지, 바로알기 선택시 selected로 변경, 누르면 아래 메뉴 펼쳐짐
      $("#nav ul li .has_low_depth").click(function() {
        handleCommonNavFunction()
        $(this).addClass("selected")
        $(this).next().slideToggle("slow")
      })
      //기사, 공지, 바로알기 하단 메뉴 선택시, 선택한 상위메뉴를 선택해제하고
      //하단 메뉴 선택으로 변경
      $("#nav ul.low_depth li a").click(function() {
        $("#nav ul.low_depth li a").removeClass("selected")
        $(this).addClass("selected")
        $(this).next().slideToggle("slow")
      })
    })
  </script>
</body>
</html>
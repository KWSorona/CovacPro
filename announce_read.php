<?php
	require("covacDB.php");
?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1, minimum-scale=1"
		/>

		<title>COVAC</title>
		<link rel="icon" href="./img/favicon.jpg">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css"/>
		<link rel="stylesheet" type="text/css" href="./style.css" />
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
		<script type="text/javascript" src="init.js"></script>
	</head>
	<body onload = "showImage()">
		<div id="body_container">
			<header id="header" class="display_flex_center">
				<a href="http://www.covac.news">
					<img src="./src/assets/logo.png" alt="covac_logo" />
				</a>
			</header>
			<div id="main" class="display_flex_center">
				<div class="main_content_wrapper">
					<nav id="nav">
						<ul class="nav_ul">
							<li><a href="http://www.covac.news/" class="none_low_depth">백신</a></li>
							<li>
								<div class="has_low_depth">기사</div>
								<ul class="low_depth">
									<li><a href="arti_press.php">언론사별</a></li>
									<li><a href="arti_vac.php">백신별</a></li>
								</ul>
							</li>
							<li><a href="board.php" class="none_low_depth">접종후기</a></li>
							<li>
								<div class="has_low_depth selected">공지</div>
								<ul class="low_depth show2">
									<li><a href="announce_1.php" class="selected">공지사항</a></li>
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
					<article>
		<?php
			$num = $_REQUEST["num"];
			$query = $db->query("select * from Notice where num = '$num'");
			$row = $query->fetch();
			$view = $db->query("update Notice set view=view+1 where num= '$num'");
		?>
			<input type="hidden" value=<?=$row["view"]?>>
          <section id="section_container" class="section_write_review">
            <div class="board_header">
              <h1>코로나 접종 공지 게시판</h1>
              <p>
                코로나 백신 접종관련하여 공지하는 게시판입니다.<br />
                여러분들의 정보가 대한민국의 백신입니다.
              </p>
            </div>
			
            <div class="write_review_container">
              <div class="review_item">
                <p style="font-size: 24px; font-weight:400;"><?=$row["title"]?></p>
              </div>
              <div class="my_post">

                <p style="color: #606060;
                background-color: #cccccc;

				padding-left: 1px;
				padding-right:5px;
				padding-top: 5px;
				padding-bottom: 5px;
                margin-right: 520px;
                text-align: left;
                border-radius: 15px;
                font-size: 15px;">작성자&nbsp;&nbsp;<?=$row["name"]?></p>

              </div>
              <div class="review_item">
                <div contentEditable="true" readonly> <?=$row["content"]?>
                 <img src="<?=$row["img"]?>" width=550px;></div>
              </div>
            </div>
            <div class="footer_wrapper">
              <button type="button" class="btn_register"><a href="javascript:history.back();">뒤로</a></button>
            </div>
          </section>
          <script language = "javascript">
							var imgArray = new Array();
								imgArray[0] = "./src/assets/ad_1.png";
								imgArray[1] = "./src/assets/ad_2.png";
								imgArray[2] = "./src/assets/ad_3.png";
								imgArray[3] = "./src/assets/ad_4.png";
							function showImage(){
							var imgNum = Math.round(Math.random()*3);
							var objImg = document.getElementById("adb");
							objImg.src = imgArray[imgNum];
							}
						</script>
						<div id="footer_section_container">
							<section>
								<div class="ad_wrapper_mainpage">
									<img id="adb" width="650" alt="ad" />
								</div>
							</section>
						</div>
        </article>

      </div>
    </main>

    <footer id="footer">
      Copyright 2021. 1조 All pictures cannot be copied without permission.
      <br />
      yghasd@g.shingu.ac.kr
    </footer>

  </div>

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

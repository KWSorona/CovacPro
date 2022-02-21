<!--기존 0530 파일과 동일-->

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
							<li><a href="http://www.covac.news" class="none_low_depth">백신</a></li>
							<li>
								<div class="has_low_depth">기사</div>
								<ul class="low_depth">
									<li><a href="arti_press.php">언론사별</a></li>
									<li><a href="arti_vac.php">백신별</a></li>
								</ul>
							</li>
							<li><a href="board.php" class="none_low_depth">접종후기</a></li>
							<li>
								<div class="has_low_depth">공지</div>
								<ul class="low_depth">
									<li><a href="announce_1.php">공지사항</a></li>
									<li><a href="announce_2.php">문의 및 제보</a></li>
									<li><a href="announce_3.php">후원정보</a></li>
								</ul>
							</li>
							<li>
								<div class="has_low_depth selected">바로알기</div>
								<ul class="low_depth show3">
									<li><a href="check_vac.php">백신 종류별 특성</a></li>
									<li><a href="check_place.php" class="selected">백신 접종 기관</a></li>
									<li><a href="check_vid.php">백신 동영상</a></li>
								</ul>
							</li>
						</ul>
					</nav>
					<article>
						<section id="section_container" class="section_review_posts">
							<div class="board_header_ann">
								<h1>백신 접종 기관</h1>
							</div>

							<div class="content_container">
								<div class="ann_arti">
									<p style="line-height:1.5; font-weight: 400; font-size:20px;">
										백신을 접종할 수 있는 기관들을 알려 드립니다.<br>
										아래 사항들을 잘 확인하시고 전국민분들께서는<br>
										반드시 백신을 접종하시길 바랍니다.
									</p>
								</div>

							</div>
							<div class="check_place_1">
								의료위탁기관
							</div>
							<div class="check_place_inside_container">
								<div class="paragraph">
									<div class="para_title">
										<h1>※위탁의료기관이 무엇인가요?</h1>
									</div>
									<div style="line-height:1.5; font-weight: 400;">
										코로나19 예방접종 위탁의료기관은 코로나바이러스감염증-19 예방을 위해<br>
										코로나19 백신 예방접종 비용을 지원받을 수 있는 의료기관입니다.
									</div>

								</div>
								<div class="paragraph">
									<div class="para_title">
										<h1>※위탁의료기관에서는 어떻게 예방접종 하나요?</h1>
									</div>
									<div style="line-height:1.5">
										위탁의료기관에서는 코로나19 예방접종을 무료로 받으실 수 있으며,<br>
										접종대상 및 시기는 백신 공급 일정에 따라 향후 안내할 예정입니다.<br>
										접종 완료 후 예방접종증명서(국문·영문 2종)를 온라인으로 발급받으실 수 있습니다.
									</div>

								</div>
							</div>

							<div class="check_place_2">
								요양병원·요양시설
							</div>
							<div class="check_place_inside_container">
								<div class="paragraph">
									<div class="para_title">
										<h1>※요양병원·정신병원은 어떻게 접종하나요?</h1>
									</div>
									<div style="line-height:1.5">
										요양병원 등은 자체 코로나19 예방접종 계획을 수립하여 예방접종을 실시합니다.
									</div>

								</div>
								<div class="paragraph">
									<div class="para_title">
										<h1>※요양시설은 어떻게 접종하나요?</h1>
									</div>
									<div style="line-height:1.5">
										의사가 근무하지 않은 요양시설 등은 시설별 계약된 위탁의료기관, 보건소 방문접종팀,
										시설별 계약된 의사가 시설을 방문하여 접종하거나,
										지역 상황 등에 따라 보건소 내소 접종을 시행 합니다.
									</div>

								</div>
							</div>

							<div class="check_place_1">예방접종센터</div>
							<div class="check_place_inside_container">
								<div class="paragraph">
									<div class="para_title">
										<h1>※예방접종센터는 무엇인가요?</h1>
									</div>
									<div style="line-height:1.5">
										예방접종센터는 안전하고 신속한 예방접종을 통해 빠른 시간 내 전 국민 집단면역 확보와
										숙련된 기술이 필요한 코로나19 핵산백신(mRNA) 접종을 위해 설치된 대규모 접종기관입니다.
									</div>
								</div>
								<div class="paragraph">
									<div class="para_title">
										<h1>※예방접종센터는 운영시간과 접종시간은 어떻게 되나요?</h1>
									</div>
									<div style="line-height:1.5">
										예방접종센터의 운영시간은 08:00~17:00이며, 접종시간은 08:30~16:00으로 계획하고 있습니다.<br>
										백신 접종대상 및 공급량 등을 고려하여 주말운영 여부는 검토할 예정이며,
										이상반응 발현 등 응급상황 발생시 신속한 대응을 위해 야간운영은 고려하고 있지 않습니다.
									</div>
								</div>
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
			</div>
			<footer id="footer">
				Copyright 2021. 1조 All pictures cannot be copied without permission.
				<br />
				yghasd@g.shingu.ac.kr
			</footer>
		</div>
	</body>
</html>

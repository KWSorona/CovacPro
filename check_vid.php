<!--기존 0530 파일과 동일
페이지 넘어가는 부분도 추가..?
-->

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
									<li><a href="announce_3.php" >후원정보</a></li>
								</ul>
							</li>
							<li>
								<div class="has_low_depth selected">바로알기</div>
								<ul class="low_depth show3">
									<li><a href="check_vac.php">백신 종류별 특성</a></li>
									<li><a href="check_place.php">백신 접종 기관</a></li>
									<li><a href="check_vid.php" class="selected">백신 동영상</a></li>
								</ul>
							</li>
						</ul>
					</nav>
					<article>
						<section id="section_container" class="section_review_posts">
							<div class="board_header_ann" style="text-align:center">
								<h1>동영상으로 바로알기</h1>
							</div>

							<div class="check_vid_container">
								<div class="main_video">
									<iframe width="780" height="315" src="https://www.youtube.com/embed/7A6GEWvWRz4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
								<div class="sub_videos">
									<div class="responsive">
										<div class="gallery">
												<iframe  height="315" src="https://www.youtube.com/embed/4XALB-jBKG4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											<div class="desc">
												일부 보류되었던 아스트라제네카 백신 접종을 4월 12일부터 다시 시작합니다!(백신 브리핑, 4.11.)
											</div>
										</div>
									</div>
									<div class="responsive">
										<div class="gallery">
											<iframe height="315" src="https://www.youtube.com/embed/Dd4mtHxGyIk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											<div class="desc">
												4월 1일부터 75세 이상 어르신 예방접종 시작!
											</div>
										</div>
									</div>
									<div class="responsive">
										<div class="gallery">
											<iframe  height="315" src="https://www.youtube.com/embed/tUrKGB_i_UE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											<div class="desc">
												AZ 공개 접종한 정은경 질병청장 '접종 순서 오면 꼭 응해주세요'
											</div>
										</div>
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
		<!-- <script type="text/javascript">
			$(document).ready(function () {
				const handleCommonNavFunction = () => {
					$("#nav ul li div").removeClass("selected")
					$("#nav ul li a").removeClass("selected")
					$("#nav ul.low_depth").hide()
				}

				$("#nav ul li a.none_low_depth").click(function () {
					handleCommonNavFunction()
					$(this).addClass("selected")
				})
				$("#nav ul li .has_low_depth").click(function () {
					handleCommonNavFunction()
					$(this).addClass("selected")
					$(this).next().slideToggle("slow")
				})
				$("#nav ul.low_depth li a").click(function () {
					$("#nav ul.low_depth li a").removeClass("selected")
					$(this).addClass("selected")
					$(this).next().slideToggle("slow")
				})
			})
		</script> -->
	</body>
</html>

<?php
	require("db.php");
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

		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css"
		/>
		<link rel="stylesheet" type="text/css" href="./style.css" />
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.12.1/css/all.css"
			crossorigin="anonymous"
		/>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
	</head>
	<body>
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
								<ul class="low_depth" style="display:block !important">
									<li><a href="check_vac.php" class="selected">백신 종류별 특성</a></li>
									<li><a href="check_place.php">백신 접종 기관</a></li>
									<li><a href="check_vid.php">백신 동영상</a></li>
								</ul>
							</li>
						</ul>
					</nav>
					<!--메인 구성-->
					<article>
						<section id="section_container" class="section_arti_vac">
							<div class="news_vac">
								<!--뉴스 필터 부분-->
								<div class="news_filter_container">
									<form action="" class="check_news">
										<label
											><input type="checkbox" name="check" value="JTBC" onclick="oneCheckbox(this)"/>
											JTBC</label
										>
										<label
											><input type="checkbox" name="check" value="MBC" onclick="oneCheckbox(this)"/>
											MBC</label
										>
										<label
											><input type="checkbox" name="check" value="YTN" onclick="oneCheckbox(this)"/>
											YTN</label
										>
										<label
											><input type="checkbox" name="check" value="동아일보" onclick="oneCheckbox(this)"/>
											동아일보</label
										>
										<label
											><input type="checkbox" name="check" value="조선일보" onclick="oneCheckbox(this)"/>
											조선일보</label
										>
										<label
											><input
												type="checkbox"
												name="check"
												value="selectall"
												onclick="oneCheckbox(this)"
												checked="checked"
											/>
											모든기사</label
										>
									</form>

									<div class="search_wrapper display_flex_center">
										<input
											placeholder="검색하기"
											type="search"
											class="search"
										/>
										<span><img src="./src/assets/glasses.png" alt="" /></span>
									</div>
								</div>
								<!--기사 구성 부분-->
								<div class="news_container">
									<div class="responsive">
										<div class="gallery">
											<a target="_self" href="#">
											<img
												 class="cover"
												 src="./src/assets/pic_arti_1.jpg"
												 alt="기사1"
												 width="600"
												 height="400"/>
												 <div class="desc">
												 <div class="news1">
											<?php
												$query = $db->query("select * from News_Cl order by num desc limit 0,9");
												while ($row = $query->fetch()) {
											?>
											<div class="news_title"><?=$row["title"]?></div></div>
											</div>
											<?php
												}
											?>
											</a>
											</div>
											<!--</div>-->
											<!-- 여기서부터 기사부분-->
									<div class="responsive">
										<!--<div class="gallery">
											<a target="_self" href="#">
												<img
													class="cover"
													src="./src/assets/pic_arti_2.jpg"
													alt="기사2"
													width="600"
													height="400"/>
											<div class="desc">
												코로나19 예방접종 후 이상반응 국가보상제도(예방접종피해
												국가보상제도)
												</a>
											</div>
											</div>-->
											</div>

									<div class="responsive">
										<!--<div class="gallery">
											<a target="_self" href="#">
												<img
													class="cover"
													src="./src/assets/pic_arti_3.jpg"
													alt="기사3"
													width="600"
													height="400"
												/>
												</a>
											<div class="desc">
												안전한 코로나19 예방접종을 위해 예방접종 후 이상반응에
												대한 안내사항 꼭 기억해주세요!(4.2.VER)
											</div>
										</div>-->
									</div>
									<div class="responsive">
										<!--<div class="gallery">
											<a target="_self" href="#">
												<img
													class="cover"
													src="./src/assets/pic_arti_4.jpg"
													alt="기사4"
													width="600"
													height="400"
												/>
												</a>
											<div class="desc">
												코로나19, 다중이용시설 생활방역수칙 카드뉴스,「기본을
												지키면 안전하게 이용할 수 있어요! <2편>」식당&amp; 카페,
												실내체육시설, 어린이집, 사우나&amp; 목욕탕
											</div>
										</div>-->
									</div>
									<div class="responsive">
										<!--<div class="gallery">
											<a target="_self" href="#">
												<img
													class="cover"
													src="./src/assets/pic_arti_5.jpg"
													alt="기사5"
													width="600"
													height="400"
												/>
											</a>
											<div class="desc">
												코로나19, 다중이용시설 생활방역수칙 카드뉴스,「기본을
												지키면 안전하게 이용할 수 있어요! <1편>」
											</div>
										</div>-->
									</div>
									<div class="responsive">
										<!--<div class="gallery">
											<a target="_self" href="#">
												<img
													class="cover"
													src="./src/assets/pic_arti_6.jpg"
													alt="기사6"
													width="600"
													height="400"
												/>
											</a>
											<div class="desc">
												코로나19 예방접종 후 증상이 나타나면 이렇게 하세요!
											</div>
										</div>-->
									</div>
									<div class="responsive">
										<!--<div class="gallery">
											<a target="_self" href="#">
												<img
													class="cover"
													src="./src/assets/pic_arti_7.jpg"
													alt="기사7"
													width="600"
													height="400"
												/>
											</a>
											<div class="desc">
												만 65세 이상 연령층 아스트라제네카 백신 예방접종을
												시행합니다!
											</div>
										</div>-->
									</div>
									<div class="responsive">
										<!--<div class="gallery">
											<a target="_self" href="#">
												<img
													class="cover"
													src="./src/assets/pic_arti_8.jpg"
													alt="기사8"
													width="600"
													height="400"
												/>
											</a>
											<div class="desc">
												코로나19 예방접종증명서 발급되나요?
											</div>
										</div>-->
									</div>
									<div class="responsive">
										<!--<div class="gallery">
											<a target="_self" href="#">
												<img
													class="cover"
													src="./src/assets/pic_arti_9.jpg"
													alt="기사9"
													width="600"
													height="400"
												/>
												<div class="desc">
													<!--끝을 위한 시작, 일상회복을 위한 코로나19 예방접종이
													시작됩니다-->
												</div>
											</a>
										</div>
									</div>
								</div>

									<div class="clearfix">
										<button type="button" name="button"></button>
									</div>
								</div>
								<!--하단 페이지 넘기는 부분-->
								<div class="pages_turner">
									<a class="bold_arrow" href="#"><<</a>
									<a href="#"><</a>
									<span>
										<a href="#">1</a>
										<a href="#">2</a>
										<a href="#">3</a>
										<a href="#">4</a>
										<a href="#">5</a>
										<a href="#">6</a>
									</span>
									<a href="#">></a>
									<a class="bold_arrow" href="#">>></a>
								</div>
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
				</div>
			</main>

			<footer id="footer">
				Copyright 2021. 1조 All pictures cannot be copied without permission.
				<br />
				yghasd@g.shingu.ac.kr
			</footer>
		</div>
		<!--메뉴바 js-->
		<script type="text/javascript">
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
		</script>
		<!--기사 선택 js-->
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript">
			function selectAll(selectAll) {
				const checkboxes = document.getElementsByName("check")

				checkboxes.forEach((checkbox) => {
					checkbox.checked = selectAll.checked
				})
			}
			function oneCheckbox(a){
				var obj = document.getElementsByName("check");
				for(var i=0; i<obj.length; i++){
						if(obj[i] != a){
								obj[i].checked = false;
						}
				}
			}
		</script>

	</body>
</html>

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

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css"
  />
  <link rel="stylesheet" type="text/css" href="./style.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
</head>
  <body>
    <div id="body_container">
			<header id="header" class="display_flex_center">
        <a href="index.html">
					<img src="./src/assets/logo.png" alt="covac_logo" />
				</a>
			</header>
			<main id="main" class="display_flex_center">
				<div class="main_content_wrapper">
					<nav id="nav">
						<ul class="nav_ul">
							<li><a href="index.html" class="none_low_depth">백신</a></li>
							<li>
								<div class="has_low_depth selected">기사</div>
								<ul class="low_depth" style="display: block !important">
									<li><a href="arti_press.html">언론사별</a></li>
									<li><a class="selected" href="arti_vac.html">백신별</a></li>
								</ul>
							</li>
							<li><a href="4.html" class="none_low_depth">접종후기</a></li>
							<li>
								<div class="has_low_depth">공지</div>
								<ul class="low_depth">
									<li><a href="announce_1.html">공지사항</a></li>
									<li><a href="announce_2.html">문의 및 제보</a></li>
									<li><a href="announce_3.html">후원정보</a></li>
								</ul>
							</li>
							<li>
								<div class="has_low_depth">바로알기</div>
								<ul class="low_depth">
									<li><a href="check_vac.html">백신 종류별 특성</a></li>
									<li><a href="check_place.html">백신 접종 기관</a></li>
									<li><a href="check_vid.html">백신 동영상</a></li>
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
          <label><input type='checkbox' name='check' value='화이자'/>화이자</label>
          <label><input type='checkbox' name='check' value='아스트라제네카'/> 아스트라제네카</label>
        </form>
        <div class="search_wrapper display_flex_center">
          <input placeholder="검색하기" type="search" class="search" />
          <span><img src="./src/assets/glasses.png" alt="" /></span>
        </div>
      </div>

      <!--기사 구성 부분-->
      <div class="news_container">
	  <?php
			$query = $db->query("select * from Vac_Cl");
			$i=1;
			while ($row = $query->fetch()) {
	  ?>
			<div class="responsive">
				<div class="gallery">
					<a target="_self" href="<?=$row["url"]?>">
						<img
							src="<?=$row["img"]?>"
							alt="<?=$row["alt"]?>"
							width="600"
							height="400"
						/>
					</a>
					<div class="desc">
						<?=$row["title"]?>
					</div>
				</div>
			</div>
		<?php
				if($i==3) {echo '<br>'; $i=1;}
				else $i++;
				}
		?>

        <!--잠깐 보류-->
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
  </script>
  <!--기사 선택 js-->
  <script src="http://code.jquery.com/jquery-latest.min.js">

  </script>
  <script type="text/javascript">
  function selectAll(selectAll)  {
const checkboxes
   = document.getElementsByName('check');

checkboxes.forEach((checkbox) => {
checkbox.checked = selectAll.checked;
})
}
  </script>
  </body>
</html>

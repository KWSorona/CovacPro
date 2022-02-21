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
		<link rel="stylesheet" href="./style.css" />
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
		<script type="text/javascript" src="init.js"></script>
	</head>

	<body onload = "showImage()">
	<script>
		if (self.name != 'reload') {
			self.name = 'reload';
			self.location.reload(true);
		}
		else self.name = ''; 
	</script>
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
					<article>
						<section id="section_container" class="section_review_posts">
							<div class="board_header">
								<h1>코로나 접종 후기 게시판</h1>
								<p>
									코로나 백신 접종하신 분들의 후기를 작성하는 게시판입니다.<br />
									여러분들의 정보가 대한민국의 백신입니다.
								</p>
								<h3>허위 사실을 유포하시면 법적 처벌을 받을 수 있습니다.</h3>
							</div>

							<div class="posts_container">
								<table>
									<colgroup>
										<col style="width: 100px"/>
										<col style="width: 210px"/>
										<col style="width: 100px" />
										<col style="width: 100px" />
										<col style="width: 100px" />

									</colgroup>
									<thead>
										<tr>
											<th scope="col">게시물 번호</th>
											<th scope="col">제목</th>
											<th scope="col">작성자</th>
											<th scope="col">등록일</th>
											<th scope="col">조회수</th>
										</tr>
									</thead>
									<?php
		
		
											$listSize = 10;
											$page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
											$search = $_GET['search'];
											
											try {
											
											$paginationS = 5;
											
											$first = floor(($page - 1) / $paginationS) * $paginationS + 1;
											$last = $first + $paginationS - 1;
											
											$numRecords = $db->query("select count(*) from Epilogue where title like '%{$search}%'")->fetchColumn();
											$numPages = ceil($numRecords / $listSize);
											if ($last > $numPages) {
												$last = $numPages;
											}
											
											$start = ($page - 1) * $listSize;
											$query = $db->query("select * from Epilogue where title like '%{$search}%' order by num desc limit $start,$listSize");
											while ($row = $query->fetch()) {
												$title=$row["title"];
											if(strlen($title)>10)
											{
												//title이 10을 넘어서면 ...표시
												$title=str_replace($row["title"],mb_substr($row["title"],0,10,"utf-8")."...",$row["title"]);
											}
										?>
									<tbody>
										<!-- 공지
										<tr class="post_notice">
											<td>
												<span class="label_notice">공지</span>
											</td>
											<td>[이벤트] 후기</td>
											<td>COVAC</td>
											<td>2021.03.23</td>
											<td>23</td>
										</tr>
										-->
										<!-- 리스트 -->
										<tr>
											<td><?=$row["num"]?></td>
											<td><a href="http://www.covac.news/board_read.php?num=<?=$row["num"]?>"><?php echo $title;?></a></td>
											<td><?=$row["name"]?></td>
											<td><?=$row["day"]?></td>
											<td><?=$row["view"]?></td>

										</tr>
									</tbody>
									<?php
										}
									} catch (PDOException $e) {
									exit($e->getMessage());
									}

									?>
								</table>
							</div>
							<div class="footer_wrapper">
								<form action="http://www.covac.news/board_result.php" method="get">
								<div class="search_wrapper display_flex_center">
									<input placeholder="검색하기" type="search" class="search" name="search" required="required" />
									<span><img src="./src/assets/glasses.png" alt="" /></span>
								</div>
								</form>
								<button type="button" class="btn_write"><a href="certification.php">글쓰기</a></button>
							</div>
							<div class="pages_wrapper">
								<a class="bold_arrow" href="http://www.covac.news/board.php"><<<</a>

								<?php

									if ($first > 1) {
								?>
									<a href="http://www.covac.news/board.php?page=<?=($first - 1)?>">&lt;</a>
								<?php
									}

									for($i = $first; $i <= $last; $i++) {
								?>
									<a href="http://www.covac.news/board.php?page=<?=$i?>"><?=$i?></a>
								<?php
									}

									if ($last < $numPages) {
								?>
									<a href="http://www.covac.news/board.php?page=<?=($last + 1)?>">&gt;</a>
								<?php
									}
								?>

								<a class="bold_arrow" href="http://www.covac.news/board.php?page=<?=$numPages?>">>>></a>
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
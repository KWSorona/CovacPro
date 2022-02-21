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
			content="width=device-width, initial-scale=1, maximum-scale:1, minimum-scale:1 ,user-scalable=no"
		/>

		<title>COVAC</title>
		<link rel="icon" href="./img/favicon.jpg">
		<link rel="stylesheet" href="./css/btnn.css"/>
		<link rel="stylesheet" href="./css/table.css"/>
		<link rel="stylesheet" href="./css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="./style.css" />
		<!--세로그래프 script-->
		<script src="./css/Chart.min.js"></script>
		<script src="./css/bootstrap.min.js"></script>
		<script src="./css/poppers.min.js"></script>
	  <script src="./css/jquery.min.js"></script>
		<script src="./css/bootstrap.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.0/moment.min.js"></script>
		<script type="text/javascript" src="init.js"></script>


		<script language="javascript">
			window.onload = function(){
				for (i=1; i<17; i++) {
					if ('<%=request("req")%>'==exx[i]) {
						cMuName = 'mus'+i;
						document [cMuName].src = eval(cMuName + 'on.src');
						onclick=smenu_click(cMuName);
					}
				}
			}
		</script>
	</head>

	<body onload = "showImage()">

		<div class="body_container">
			<header id="header" class="display_flex_center">
				<a href="http://www.covac.news/">
					<img src="./src/assets/logo.png" alt="covac_logo" />
				</a>
			</header>
			<div id="main" class="display_flex_center">

				<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

				<div class="main_content_wrapper">

					<nav id="nav" >
						<ul class="nav_ul" >
							<li><a href="http://www.covac.news/" class="none_low_depth selected" style="text-decoration:none">백신</a></li>
							<li>
								<div class="has_low_depth">기사</div>
								<ul class="low_depth">
									<li><a href="arti_press.php">언론사별</a></li>
									<li><a href="arti_vac.php">백신별</a></li>
								</ul>
							</li>
							<li><a href="board.php" class="none_low_depth" style="text-decoration:none">접종후기</a></li>
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
					<article >
							<!--지도 html-->
						<section id="section_container" class="board_header_box2">
					  	<div style="clear:both; position: relative; z-index: 1; top: -40px; left: 90px; zoom:1.5;">
	              <a   onfocus='this.blur()' onmouseover=mus_on('mus1') onmouseout=mus_off('mus1') onclick="javascript:void(0)">
								<img src='./map/m061.gif' alt='' border='0' name='mus1' class='list1'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus2') onmouseout=mus_off('mus2') onclick="javascript:void(0)">
								<img src='./map/m063.gif' alt='' border='0' name='mus2' class='list2'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus3') onmouseout=mus_off('mus3') onclick="javascript:void(0)">
								<img src='./map/m055.gif' alt='' border='0' name='mus3' class='list3'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus4') onmouseout=mus_off('mus4') onclick="javascript:void(0)">
								<img src='./map/m033.gif' alt='' border='0' name='mus4' class='list4'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus5') onmouseout=mus_off('mus5') onclick="javascript:void(0)">
								<img src='./map/m041.gif' alt='' border='0' name='mus5' class='list5'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus6') onmouseout=mus_off('mus6') onclick="javascript:void(0)">
								<img src='./map/m031.gif' alt='' border='0' name='mus6' class='list6'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus7') onmouseout=mus_off('mus7') onclick="javascript:void(0)">
								<img src='./map/m043.gif' alt='' border='0' name='mus7' class='list7'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus8') onmouseout=mus_off('mus8') onclick="javascript:void(0)">
								<img src='./map/m054.gif' alt='' border='0' name='mus8' class='list8'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus9') onmouseout=mus_off('mus9') onclick="javascript:void(0)">
								<img src='./map/m064.gif' alt='' border='0' name='mus9' class='list9'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus10') onmouseout=mus_off('mus10') onclick="javascript:void(0)">
								<img src='./map/m02.gif' alt='' border='0' name='mus10' class='list10'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus11') onmouseout=mus_off('mus11') onclick="javascript:void(0)">
								<img src='./map/m032.gif' alt='' border='0' name='mus11' class='list11'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus12') onmouseout=mus_off('mus12') onclick="javascript:void(0)">
								<img src='./map/m042.gif' alt='' border='0' name='mus12' class='list12'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus13') onmouseout=mus_off('mus13') onclick="javascript:void(0)">
								<img src='./map/m062.gif' alt='' border='0' name='mus13' class='list13'></a>
								<a onfocus='this.blur()' onmouseover=mus_on('mus14') onmouseout=mus_off('mus14') onclick="javascript:void(0)">
								<img src='./map/m053.gif' alt='' border='0' name='mus14' class='list14'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus15') onmouseout=mus_off('mus15') onclick="javascript:void(0)">
								<img src='./map/m052.gif' alt='' border='0' name='mus15' class='list15'></a>
								<a   onfocus='this.blur()' onmouseover=mus_on('mus16') onmouseout=mus_off('mus16') onclick="javascript:void(0)">
								<img src='./map/m051.gif' alt='' border='0' name='mus16' class='list16'></a>
	            </div>

							<?php
								$query = $db->query("select * from Covac_status");
								$seoul = $db->query("select human from Covac_status where mus not in ('mus10')");
								while ($row = $query->fetch()) {
							?>
									<div class="maps_all">
									
									<div class=<?=$row["class"]?> onmouseover=mus_on(<?=$row["mus"]?>) onmouseout=mus_off(<?=$row["mus"]?>)>
									<div class="local_name_map"><?=$row["region"]?></div><div class="local_values_map"><?=$row["human"]?></div>
									</div>

									</div>
							<?php
							}
							?>
									<div id = "9" class="m02" onclick="downFunction()" onmouseover=mus_on('mus10') 
									onmouseout=mus_off('mus10')>
									<div class="local_name_map">서울</div>
									<div class="local_values_map"></div>
									</div>
									
									<div class="measurement">
										<div class="measurement_wrap">
											<p style="font-size:14px; font-weight:200;">서울을 클릭 시 아래 그래프와 연동</p>
										</div>
									</div>
									
					 	</section>
						<section id="section_container" class="board_header_box">
							<!--백신접종현황 그래프-->
							<div class="tables_name">
								<h3>백신 접종 현황</h3>
							</div>

							<!--첫번째 버튼 전체 -->
							<!-- id값 : 버튼
								전체
								0 : 일별
								1 : 주별
								2 : 누적
								백신
								3 : 종합
								4 : 화이자
								5 : AZ
							-->
							<div class="dropdown_grid" justified>
								<div class="dropdown">
							  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    일별
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							    <li><a id="0" href="javascript:void(0)" class="dropdown-item" data-value="action">일별</a></li>
									<li><a id="1" href="javascript:void(0)" class="dropdown-item" data-value="another action">월별</a></li>
							    <li><a id="2" href="javascript:void(0)" class="dropdown-item" data-value="something else here">누적</a></li>
							  </ul>
								</div>
							<!--두번째 버튼 백신 -->
							<div class="dropdown">
							<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								종합
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a id="3" href="javascript:void(0)" class="dropdown-item" data-value="something else here">종합</a></li>
								<li><a id="4" href="javascript:void(0)" class="dropdown-item" data-value="action">화이자</a></li>
								<li><a id="5" href="javascript:void(0)" class="dropdown-item" data-value="another action">AZ</a></li>
							</ul>
							</div>
							<!--세번째 버튼 백신 -->
							<div class="dropdown">
							<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								지역
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a id="6" href="javascript:void(0)" class="dropdown-item" data-value="something else here">지역 - 일별</a></li>
								<li><a id="7" href="javascript:void(0)" class="dropdown-item" data-value="action">지역 - 월별</a></li>
								<li><a id="8" href="javascript:void(0)" class="dropdown-item" data-value="another action">지역 - 누적</a></li>
							</ul>
							</div>
							</div>

							<br>
							<body>
								<script src="canvasjs.min.js"></script>
								<!--Ref
							http://stackoverflow.com/questions/40061862/chart-js-update-bars-of-a-bar-chart
							-->
							  <br/>
							  <div class="row">
							    <div class="col-md-1"></div>
							    <div class="col-md-10" >
							      <!--Chart.js Canvas Tag -->
							      <div id="newMainGraph" style="height: 350px; width: 600px;"></div>
							    </div>
							    <div class="col-md-1"></div>
							  </div>
							  <br />
							  <div class="row">
							    <div class="col-md-1"></div>
							    <div class="col-md-10"></div>
							<!--<button type="button" class="btn btn-success btn-md" onclick="addData();">Add Data </button><button type="button" class="btn btn-success btn-md" onclick="adjust2016();">Adjust 2016 </button></div> -->
							    <div class="col-md-1"></div>
							</div>
							<!--백신그래프 데이터 모음  php-->
							<?php
							/*Seoul 서울 일별 최근 5일*/
							$query = $db->query("select * from (select * from Seoul order by date desc limit 5) as a order by date asc");
							$vacDaily= array();
							$dates = array();


							$dataPoints2 = array();

							while ($row = $query->fetch()) {

								$vacDaily = $row["human"];
								$dates = $row["date"];
								array_push($dataPoints2, array( "label"=>$dates, "y"=>$vacDaily));
							}
							?>
							<?php
							/*Seoul 서울 누적 $dataPoints3*/
							$query = $db->query("select * from Seoul");
							$vacDaily= array();
							$dates = array();

							$dataPoints3 = array();

							while ($row = $query->fetch()) {

								$vacDaily = $row["human"];
								$dates = $row["date"];
								array_push($dataPoints3, array( "label"=>$dates, "y"=>$vacDaily));
							}
							 ?>
							 <?php
							 /*Seoul_sum 서울 월별 $dataPoints4*/
							 $query = $db->query("select * from Seoul_sum");
							 $vacDaily= array();
							 $dates = array();

							 $dataPoints4 = array();

							 while ($row = $query->fetch()) {

							 	$vacDaily = $row["sum"];
							 	$dates = $row["date"];
							 	array_push($dataPoints4, array( "label"=>$dates, "y"=>$vacDaily));
							 }
							  ?>
								<?php
 							 /*Korea_sum 전국 월별 $dataPoints5*/

 							 $query = $db->query("select * from Korea_sum");
 							 $vacDaily= array();
 							 $dates = array();

 							 $dataPoints5 = array();

 							 while ($row = $query->fetch()) {

 							 	$vacDaily = $row["sum"];
 							 	$dates = $row["date"];
 							 	array_push($dataPoints5, array( "label"=>$dates, "y"=>$vacDaily));
 							 }
 							  ?>

								<?php
 							 /*Korea 전국 일별 $dataPoints6*/

 							 $query = $db->query("select * from (select * from Korea order by date desc limit 5) as a order by date asc");
 							 $vacDaily= array();
 							 $dates = array();

 							 $dataPoints6 = array();

 							 while ($row = $query->fetch()) {

 							 	$vacDaily = $row["human"];
 							 	$dates = $row["date"];
 							 	array_push($dataPoints6, array( "label"=>$dates, "y"=>$vacDaily));
 							 }
 							  ?>
								<?php
								/*Korea 전국 누적 $dataPoints7*/

								$query = $db->query("select * from Korea order by date");
								$vacDaily= array();
								$dates = array();

								$dataPoints7 = array();

								while ($row = $query->fetch()) {

								$vacDaily = $row["human"];

								$dates = $row["date"];

								array_push($dataPoints7, array( "label"=>$dates, "y"=>$vacDaily));
								}
								?>

					</body>

			</section>

						<!--원형 그래프 넣는 곳-->
 						<section id="section_container" class="board_header_box1">
						 	<!--원형 그래프-->
							<div class="tables_name">
								<h3>나라별 백신 접종 현황</h3>
								<h6 style="font-size:10px; text-align:right; margin-top:10px;">※나라별 100명당 접종 회분의 퍼센티지 화 그래프입니다.</h6>


							</div>

						    <div id="chartContainer" style="padding-left: 60px;height: 400px; max-width: 500px;"></div>
					 	</section>
							<div id="accrue" class="table_back">
								<body>
								<?php
								$query = $db->query("select * from Vac_com limit 0, 1");
								while ($row = $query->fetch()) {
								?>
									<div class="tables_name">
										<div class="table_p"><h3>&nbsp;접종 실적 총괄&nbsp;<small ><?=$row["standard"]?></small></h3></div>
									</div>
								  <div class="container">
										<table class="table table-bordered">
						          <thead>
						            <tr>
						              <th>구분</th>
						              <th class="num1">1회차 접종</th>
						              <th class="num2">2회차 접종</th>
						            </tr>
						          </thead>
									    <tbody>
									      <tr class="table-success">
									     <td>당일 누적&nbsp;<div class="circle">A</div>&nbsp;+&nbsp;<div class="circle2">B</div></td>
									        <td id="num1" style="padding-top:18px;"><?=$row["f1"]?></td>
									        <td id="num2" style="padding-top:18px;"><?=$row["f2"]?></td>
									      </tr>
									      <tr>
									        <td>당일 실적&nbsp;<div class="circle">A</div></td>
									        <td id="num3" style="padding-top:18px;"><?=$row["f3"]?></td>
									        <td id="num4" style="padding-top:18px;"><?=$row["f4"]?></td>
									      </tr>
									      <tr>
									        <td>전일 누적&nbsp;<div class="circle2">B</div></td>
									        <td id="num5" style="padding-top:18px;"><?=$row["f5"]?></td>
									        <td id="num6" style="padding-top:18px;"><?=$row["f6"]?></td>
									      </tr>
									    </tbody>
								  	</table>
								  </div>
								  <?php
									}
								  ?>
								</body>
							</div>

							<!--서울 버튼 누르면..-->
							<script type="text/javascript">
							$(".m10").click(function(){
								alert("hello");
								downFunction();

							});
							</script>
						<div id="footer_section_container">
							<section>
								<div class="ad_wrapper_mainpage">
									<img src="./src/assets/ad_1.png" width="650"alt="ad" />
								</div>
							</section>
						</div>
					</article>
			</div>
			<footer id="footer">
				Copyright 2021. 1조 All pictures cannot be copied without permission.
				<br />
				yghasd@g.shingu.ac.kr
			</footer>
		</div>

</div>
<!--원형 그래프 chartContainer-->
<?php
	$query = $db->query("select * from National");
	$arrayNationals = array();
	$arrayCounts = array();
	$dataPoints = array();

	while ($row = $query->fetch()) {
		$arrayNationals = $row["national"];
		$arrayCounts = $row["count"];
		array_push($dataPoints, array("label"=>$arrayNationals, "y"=>$arrayCounts));
	}

?>

<script>
window.onload = function() {

var chart= new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,

	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.0'%'",
		indexLabel: "{label} {y}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart2 = new CanvasJS.Chart("newMainGraph", {
	animationEnabled: true,
	colorSet: "colorSet1",

	title:{
		text: "일별 접종 현황",
		fontSize : 15,
		fontWeight: "normal",
		fontFamily:"sans-serif"
	},
	axisX:{
			 labelFontSize: 13,
			 labelFontWeight: "normal",
			 fontFamily:"sans-serif"
		 },
	axisY: {

		includeZero : true
	},
	dataPointMaxWidth: 70,
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## 명",
		dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
	}]
});

chart2.render();
}
/*전국 일별*/
$("#0").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "일별 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif"
		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif"
			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
		}]
	});

	chart2.render();
});
/*전국 월별*/
$("#1").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "월별 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif"
		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif"
			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
		}]
	});

	chart2.render();
});

/*전국 누적*/
$("#2").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "누적 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif"
		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif"
			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints: <?php echo json_encode($dataPoints7, JSON_NUMERIC_CHECK); ?>
		}]
	});

	chart2.render();
});

/*백신 종합*/
$("#3").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "일별 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif"
		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif",

			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
		}]
	});

	chart2.render();
});
var myCurrentDate=new Date();
var myPastDate=new Date(myCurrentDate);
myPastDate.setDate(myPastDate.getDate() - 1);
var myPastDate1=new Date(myCurrentDate);
myPastDate1.setDate(myPastDate1.getDate() - 2);
var myPastDate2=new Date(myCurrentDate);
myPastDate2.setDate(myPastDate2.getDate() - 3);
var myPastDate3=new Date(myCurrentDate);
myPastDate3.setDate(myPastDate3.getDate() - 4);
var myPastDate4=new Date(myCurrentDate);
myPastDate4.setDate(myPastDate4.getDate() - 5);
/*백신 화이자*/
$("#4").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "화이자 백신 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif"
		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif",

				 labelFormatter: function (e) {
				return CanvasJS.formatDate( e.value, "YYYY.MM.DD");
			}
			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints:[
				{ x: myPastDate4, y: 20301 },
        { x: myPastDate3, y: 40562},
        { x: myPastDate2, y: 54803 },
        { x: myPastDate1, y: 140500 },
        { x: myPastDate, y: 6503 },
			]
		}]
	});

	chart2.render();
});

/*백신 AZ*/
$("#5").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "AZ 백신 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif",

		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif",
				 labelFormatter: function (e) {
	 		 return CanvasJS.formatDate( e.value, "YYYY.MM.DD");
	 	 }
			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints: [{ x: myPastDate4, y: 17063 },
			{ x: myPastDate3, y: 37420},
			{ x: myPastDate2, y: 56080 },
			{ x: myPastDate1, y: 150500 },
			{ x: myPastDate, y: 1534 },]
		}]
	});

	chart2.render();
});

/*서울 - 일별*/
$("#6").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "서울 일별 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif"
		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif"
			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		}]
	});

	chart2.render();
});
$("#9").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "서울 일별 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif"
		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif"
			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		}]
	});

	chart2.render();
});
/*지역 - 서울 - 월별*/
$("#7").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "서울 월별 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif"
		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif"
			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
		}]
	});

	chart2.render();
});

/*서울 지역 누적*/
$("#8").click(function() {
	var chart2 = new CanvasJS.Chart("newMainGraph", {
		animationEnabled: true,
		colorSet: "colorSet1",

		title:{
			text: "서울 누적 접종 현황",
			fontSize : 15,
			fontWeight: "normal",
			fontFamily:"sans-serif"
		},
		axisX:{
				 labelFontSize: 13,
				 labelFontWeight: "normal",
				 fontFamily:"sans-serif"
			 },
		axisY: {

			includeZero : true
		},
		dataPointMaxWidth: 70,
		data: [{
			type: "column",
			yValueFormatString: "#,##0.## 명",
			dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
		}]
	});

	chart2.render();
});
</script>

  <!--*****************지도 script*****************-->
<script>
//-----------------------------------------------------------------------------------------
/* 메뉴를 늘이거나 줄일때 추가~삭제하세요. 쌍으로 구성되어있습니다. */
		mus1on  = new Image( );
		mus1off = new Image( );
		mus2on  = new Image( );
		mus2off = new Image( );
		mus3on  = new Image( );
		mus3off = new Image( );
		mus4on  = new Image( );
		mus4off = new Image( );
		mus5on  = new Image( );
		mus5off = new Image( );
		mus6on  = new Image( );
		mus6off = new Image( );
		mus7on  = new Image( );
		mus7off = new Image( );
		mus8on  = new Image( );
		mus8off = new Image( );
		mus9on  = new Image( );
		mus9off = new Image( );
		mus10on  = new Image( );
		mus10off = new Image( );
		mus11on  = new Image( );
		mus11off = new Image( );
		mus12on  = new Image( );
		mus12off = new Image( );
		mus13on  = new Image( );
		mus13off = new Image( );
		mus14on  = new Image( );
		mus14off = new Image( );
		mus15on  = new Image( );
		mus15off = new Image( );
		mus16on  = new Image( );
		mus16off = new Image( );
		/* 메뉴를 늘이거나 줄일때 추가~삭제하세요. 쌍으로 구성되어있습니다. */
		mus1off.src = './map/m061.gif';
		mus2off.src = './map/m063.gif';
		mus3off.src = './map/m055.gif';
		mus4off.src = './map/m033.gif';
		mus5off.src = './map/m041.gif';
		mus6off.src = './map/m031.gif';
		mus7off.src = './map/m043.gif';
		mus8off.src = './map/m054.gif';
		mus9off.src = './map/m064.gif';
		mus10off.src = './map/m02.gif';
		mus11off.src = './map/m032.gif';
		mus12off.src = './map/m042.gif';
		mus13off.src = './map/m062.gif';
		mus14off.src = './map/m053.gif';
		mus15off.src = './map/m052.gif';
		mus16off.src = './map/m051.gif';
		mus1on.src  = './map/m061o.gif';
		mus2on.src  = './map/m063o.gif';
		mus3on.src  = './map/m055o.gif';
		mus4on.src  = './map/m033o.gif';
		mus5on.src  = './map/m041o.gif';
		mus6on.src  = './map/m031o.gif';
		mus7on.src  = './map/m043o.gif';
		mus8on.src  = './map/m054o.gif';
		mus9on.src  = './map/m064o.gif';
		mus10on.src  = './map/m02o.gif';
		mus11on.src  = './map/m032o.gif';
		mus12on.src  = './map/m042o.gif';
		mus13on.src  = './map/m062o.gif';
		mus14on.src  = './map/m053o.gif';
		mus15on.src  = './map/m052o.gif';
		mus16on.src  = './map/m051o.gif';
		/* ----------------------------------------------------------------- */
		var cMuName="";
		/* ----------------아래내용 순서 변경 불가-------------------------------- */
		var exx = new Array("","전남","전북","경남","강원","충남","경기","충북","경북","제주","서울","인천","대전","광주","대구","울산","부산");
		function mus_on(musName) {
		  if(cMuName!=musName) {
		     document [musName].src = eval(musName + 'on.src');
		  }
		}

		function mus_off(musName) {
		  if(cMuName!=musName)
		     document [musName].src = eval(musName + 'off.src');
		}

		function smenu_click(musName){
		     cMuName=musName;
		     document [musName].src = eval(musName + 'on.src');
		}

		//-----------------------------------------------------------------------------------------
		</script>
		<!--원형그래프-->
		<script src="canvasjs.min.js"></script>
		<script>
			//Get the button
			var mybutton = document.getElementById("myBtn");

			// When the user scrolls down 100px from the top of the document, show the button
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
			  if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
			    mybutton.style.display = "block";
			  } else {
			    mybutton.style.display = "none";
			  }
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
			  document.body.scrollTop = 0;
			  document.documentElement.scrollTop = 0;
			}
			function downFunction() {
				document.body.scrollTop = 0;
 			 document.documentElement.scrollTop = 550;
	 		}
			</script>

			<script type="text/javascript">
				function changeBtnName()  {
				const btnElement
					= document.getElementById('btn');

				btnElement.value = "새이름!";
				}
			</script>
			<!--드롭다운버튼-->
			<script type="text/javascript">
			$(".dropdown-menu li a").click(function(){
			$(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
			$(this).parents(".dropdown").find('.btn').val($(this).data('value'));
			});
			</script>

			<script type="text/javascript">
				n =  new Date();
				y = n.getFullYear();
				m = n.getMonth() + 1;
				d = n.getDate();
				var day = new Date();
				var weekday = new Array(7);
				weekday[0] = "일요일";
				weekday[1] = "월요일";
				weekday[2] = "화요일";
				weekday[3] = "수요일";
				weekday[4] = "목요일";
				weekday[5] = "금요일";
				weekday[6] = "토요일";
				var j = weekday[day.getDay()];
				document.getElementById("date").innerHTML = "(" + m + "." + d + "." +" 12시 기준"+")";
			</script>

	</body>
</html>

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
      <link rel="stylesheet" type="text/css" href="./style.css"/>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
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
               <article>
                  <section id="section_container" class="section_review_posts">
                     <div class="board_header">
                        <h1 style="margin-top:10px;">코로나 접종 후기 게시판</h1>
                        <p>
                           허위 사실 유포를 방지하기 위하여 간단한 정보만을 전달받고
                           있습니다
                        </p>
                     </div>

                     <form method="post" name="form">
                     <div class="submit_info_container">
                        <?php
                           if (($_COOKIE["email"] || $_COOKIE["name"] || $_COOKIE["pw"] || $_COOKIE["pw_check"])) {
                        ?>
                        <div class="info_item">
                           <div>이름</div>
                           <input type="text" name="name" value="<?=$_COOKIE["name"]?>" />
                        </div>
                        <div class="info_item">
                           <div>비밀번호</div>
                           <input type="password"  name="pw" value="<?=$_COOKIE["pw"]?>" />
                        </div>
                        <div class="info_item">
                           <div>비밀번호 확인</div>
                           <input type="password" name="pw_check" value="<?=$_COOKIE["pw_check"]?>" />
                        </div>
                        <div class="info_item">
                           <div>이메일</div>
                           <input type="email" name="email" value="<?=$_COOKIE["email"]?>" readonly />
                           <!--새로추가-->
                              <button type="submit" onclick="javascript: form.action='http://www.covac.news/sendmail.php';"
                              class="btn_write_4_1">확인</button>
                           <!--여기까지-->
                        </div>

                        <?php
                           } else {
                        ?>
                        <div class="info_item">
                           <div>이름</div>
                           <input type="text" name="name" />
                        </div>
                        <div class="info_item">
                           <div>비밀번호</div>
                           <input type="password"  name="pw" />
                        </div>
                        <div class="info_item">
                           <div>비밀번호 확인</div>
                           <input type="password" name="pw_check" />
                        </div>
                        <div class="info_item">
                           <div>이메일</div>
                           <input type="email" name="email" />
                           <!--새로추가-->
                              <button type="submit" onclick="javascript: form.action='http://www.covac.news/sendmail.php';"
                              class="btn_write_4_1">확인</button>
                        </div>
                        <?php
                           } if($_COOKIE["checkfin"] == "1") {
                           } else {
                        ?>
                        <div class="info_item">
                           <div>인증번호</div>
                           <input type="text" name="code" style=width:200px; />

                              <button type="submit" onclick="javascript: form.action='http://www.covac.news/code_check.php';"
                              class="btn_write_4_1">인증</button>
                        </div>
                        <?php
                           }
                        ?>
                        <div class="info_item birthday_wrapper">
                           <div style="margin-top:10px;">생년월일</div>
                           <select id="year" name="yyyy"></select>
                           <select id="month" name="mm"></select>
                           <select id="day" name="dd"></select>
                        </div>
                        <div class="info_item">
                           <div style="margin-bottom:10px; margin-top:10px;">성별</div>
                           <input type="radio" id="man" name="gender" value="남" onclick="checkOnlyOne(this)" />
                           <label for="man">남</label>
                           <input type="radio" id="woman" name="gender" value="여" onclick="checkOnlyOne(this)"/>
                           <label for="woman">여</label>
                        </div>
                     </div>
                     
                     <div class="btn_area right">
						<button type="submit" onclick="javascript: form.action='http://www.covac.news/delco.php';"
						class="btn_write_4_1">초기화</button>
                        <button type="submit" onclick="javascript: form.action='http://www.covac.news/board_write.php';"
                        class="btn_write_4_1">다음</button>
                     </div>
					 
                     </form>
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

      function checkOnlyOne(element) {

  const checkboxes
      = document.getElementsByName("gender");

  checkboxes.forEach((cb) => {
    cb.checked = false;
  })

  element.checked = true;
}
         $(document).ready(function () {
            /****************** set Navigation ******************/

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

            /****************** select birthday ******************/

            const Days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31] // index => month [0-11]

            function setDate() {
               let optionDay = '<option value="day">일</option>'
               let selectedDay = "day"
               for (var i = 1; i <= Days[0]; i++) {
                  optionDay += '<option value="' + i + '">' + i + "</option>"
               }
               $("#day").append(optionDay)
               $("#day").val(selectedDay)

               let optionMonth = '<option value="month">월</option>'
               let selectedMon = "month"
               for (let i = 1; i <= 12; i++) {
                  optionMonth += '<option value="' + i + '">' + i + "</option>"
               }
               $("#month").append(optionMonth)
               $("#month").val(selectedMon)

               const d = new Date()
               let optionYear = '<option value="year">생년</option>'
               selectedYear = "year"
               for (let i = 1930; i <= d.getFullYear(); i++) {
                  optionYear += '<option value="' + i + '">' + i + "</option>"
               }
               $("#year").append(optionYear)
               $("#year").val(selectedYear)
            }
            setDate()

            function isLeapYear(year) {
               year = parseInt(year)
               if (year % 4 != 0) {
                  return false
               } else if (year % 400 == 0) {
                  return true
               } else if (year % 100 == 0) {
                  return false
               } else {
                  return true
               }
            }

            function change_year() {
               if (isLeapYear($(this).val())) {
                  Days[1] = 29
               } else {
                  Days[1] = 28
               }
               if ($("#month").val() == 2) {
                  let day = $("#day")
                  let val = $(day).val()
                  $(day).empty()
                  let option = '<option value="day">day</option>'
                  for (let i = 1; i <= Days[1]; i++) {
                     option += '<option value="' + i + '">' + i + "</option>"
                  }
                  $(day).append(option)
                  if (val > Days[month]) {
                     val = 1
                  }
                  $(day).val(val)
               }
            }
            $("#year").change(change_year)

            function change_month() {
               let day = $("#day")
               let val = $(day).val()
               $(day).empty()
               let option = '<option value="day">day</option>'
               let month = parseInt($(this).val()) - 1
               for (let i = 1; i <= Days[month]; i++) {
                  option += '<option value="' + i + '">' + i + "</option>"
               }
               $(day).append(option)
               if (val > Days[month]) {
                  val = 1
               }
               $(day).val(val)
            }
            $("#month").change(change_month)
         })
      </script>
   </body>
</html>
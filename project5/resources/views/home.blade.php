@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid px-4">
          <h1 class="mt-4">코로나 19 종합 상황판</h1><br>
          <div class="card mb-4">
            <div class="card-body">
            2021 Covid 19 영남대병원의 현황을 안내 드립니다.
            </div>
          </div>
          <div class="row">  <!-- row 1 -->
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-primary text-white mb-4">
                      <div class="card-body">정부</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                          <a class="txt_link" href="../home">정부 홈페이지</a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-warning text-white mb-4">
                      <div class="card-body">병원 정보</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                          <a href="../knu" class="txt_link">경대병원</a>
                          <div class="small text-blue"><i class="fas fa-angle-right"></i></div>
                          <a href="../yu" class="txt_link">영대병원</a>
                          <div class="small text-blue"><i class="fas fa-angle-right"></i></div>
                          <a href="../daegu" class="txt_link">대구병원</a>
                          <div class="small text-blue"><i class="fas fa-angle-right"></i></div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-success text-white mb-4">
                      <div class="card-body">제약사 정보</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                          <a href="../moderna" class="txt_link">모더나</a>

                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                          <a href="../pfizer"  class="txt_link">화이자</a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                      </div>
                  </div>
              </div>
              
              <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">이상증상 비교</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="../SE" class="txt_link">이동</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
              </div>

          </div>  <!-- /row 1 -->
          <div style="text-align:center";>
          </div>

          <div class="row"> <!-- row 2 -->
              <div class="col-xl-6">
                  <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            나이대별 확진자 현황
                        </div>
                        <div class="card-body">
                            <canvas id="home_graph1" width="100%" height="40"></canvas>
                        </div>
                  </div>
              </div>
              <div class="col-xl-6">
                  <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            확진자 성별 현황
                        </div>
                        <div class="card-body">
                            <canvas id="home_graph2" width="100%" height="40"></canvas>
                        </div>
                  </div>
              </div>
          </div>  <!-- /row 2 -->
        <div class="row"> <!-- row 3 --> 
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    지역별 누적 확진자 현황
                </div>
                <div class="card-body">
                    <canvas id="home_graph3" width="100%" height="20"></canvas>
                </div>
            </div>
        </div>  <!-- /row 3 -->

        <div class="row"> <!-- row 4 --> 
          <div class="card mb-4">
              <div class="card-header">
                  <i class="fas fa-table me-1"></i>
                  날짜별 확진자 분류 테이블
              </div>
              <div class="card-body">
                <?php 
                $con = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
                $sql ="
                    SELECT *FROM  g_confirmed ORDER BY Date DESC
                "; # 테이블 이름
                $ret = mysqli_query($con, $sql);
                if($ret) { 
                  #echo mysqli_num_rows($ret), "건이 조회됨.<br><br>"; # 요건 없애도됨
                }  
                else {
                  echo "데이터 조회실패!!"."<br>";
                  echo "실패원인 : ".mysqli_error($con);
                  exit();
                }
          
                $arr_0s = 0; # 0~9세
                $arr_10s = 0; 
                $arr_20s = 0; 
                $arr_30s = 0; 
                $arr_40s = 0; 
                $arr_50s = 0; 
                $arr_60s = 0; 
                $arr_70s = 0; 
                $arr_80s_up = 0; 

                $arr_region = array();
                $arr_region = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

                $male = 0;
                $female = 0;
                
                echo "<table id='home_table1'>
                <thead>
                    <tr>
                        <th>날짜</th>
                        <th>국내발생</th>
                        <th>해외유입</th>
                        <th>사망</th>
                        <th>0~9세</th>
                        <th>10대</th>
                        <th>20대</th>
                        <th>30대</th>
                        <th>40대</th>
                        <th>50대</th>
                        <th>60대</th>
                        <th>70대</th>
                        <th>80대 이상</th>
                        <th>남성</th>
                        <th>여성</th>
                        <th>서울</th>
                        <th>부산</th>
                        <th>대구</th>
                        <th>인천</th>
                        <th>광주</th>
                        <th>대전</th>
                        <th>울산</th>
                        <th>세종</th>
                        <th>경기</th>
                        <th>강원</th>
                        <th>충북</th>
                        <th>충남</th>
                        <th>전북</th>
                        <th>전남</th>
                        <th>경북</th>
                        <th>경남</th>
                        <th>제주</th>";
                echo "</tr></thead><tbody>";
                while($row = mysqli_fetch_array($ret)) {
                  echo "<tr><td>", $row['Date'], 
                    "</td><td>", $row['Domestic_occurrence'], 
                    "</td><td>", $row['Overseas_inflow'], 
                    "</td><td>", $row['Death'], 
                    "</td><td>", $row['0_9'], 
                    "</td><td>", $row['10s'], 
                    "</td><td>", $row['20s'], 
                    "</td><td>", $row['30s'],
                    "</td><td>", $row['40s'], 
                    "</td><td>", $row['50s'],
                    "</td><td>", $row['60s'], 
                    "</td><td>", $row['70s'], 
                    "</td><td>", $row['80s_or_older'], 
                    "</td><td>", $row['Male'], 
                    "</td><td>", $row['Female'], 
                    "</td><td>", $row['Seoul'],
                    "</td><td>", $row['Busan'], 
                    "</td><td>", $row['Daegu'], 
                    "</td><td>", $row['Incheon'], 
                    "</td><td>", $row['Gwangju'], 
                    "</td><td>", $row['Daejeon'], 
                    "</td><td>", $row['Ulsan'], 
                    "</td><td>", $row['Sejong'], 
                    "</td><td>", $row['Gyeonggi'], 
                    "</td><td>", $row['Gangwon'], 
                    "</td><td>", $row['Chungbuk'], 
                    "</td><td>", $row['Chungnam'], 
                    "</td><td>", $row['Jeonbuk'], 
                    "</td><td>", $row['Jeonnam'], 
                    "</td><td>", $row['Gyeongbuk'], 
                    "</td><td>", $row['Gyeongnam'], 
                    "</td><td>", $row['Jeju'], "</td></tr>";
                  $arr_0s = $arr_0s + (int)$row['0_9'];
                  $arr_10s = $arr_10s + (int)$row['10s'];
                  $arr_20s = $arr_20s + (int)$row['20s'];
                  $arr_30s = $arr_30s + (int)$row['30s'];
                  $arr_40s = $arr_40s + (int)$row['40s'];
                  $arr_50s = $arr_50s + (int)$row['50s'];
                  $arr_60s = $arr_60s + (int)$row['60s'];
                  $arr_70s = $arr_70s + (int)$row['70s']; 
                  $arr_80s_up = $arr_80s_up + (int)$row['80s_or_older'];
                  $arr_region[0] = $arr_region[0] + (int)$row['Seoul'];
                  $arr_region[1] = $arr_region[1] + (int)$row['Busan'];
                  $arr_region[2] = $arr_region[2] + (int)$row['Daegu'];
                  $arr_region[3] = $arr_region[3] + (int)$row['Incheon'];
                  $arr_region[4] = $arr_region[4] + (int)$row['Gwangju'];
                  $arr_region[5] = $arr_region[5] + (int)$row['Daejeon'];
                  $arr_region[6] = $arr_region[6] + (int)$row['Ulsan'];
                  $arr_region[7] = $arr_region[7] + (int)$row['Sejong'];
                  $arr_region[8] = $arr_region[8] + (int)$row['Gyeonggi'];
                  $arr_region[9] = $arr_region[9] + (int)$row['Gangwon'];
                  $arr_region[10] = $arr_region[10] + (int)$row['Chungbuk'];
                  $arr_region[11] = $arr_region[11] + (int)$row['Chungnam'];
                  $arr_region[12] = $arr_region[12] + (int)$row['Jeonbuk'];
                  $arr_region[13] = $arr_region[13] + (int)$row['Jeonnam'];
                  $arr_region[14] = $arr_region[14] + (int)$row['Gyeongbuk'];
                  $arr_region[15] = $arr_region[15] + (int)$row['Gyeongnam'];
                  $arr_region[16] = $arr_region[16] + (int)$row['Jeju'];
                
                  $male = $male + (int)$row['Male'];
                  $female = $female + (int)$row['Female'];
                }
                
                echo "</tbody></table>";

                # 지역별 확진자 수가 담긴 배열로 도시를 내림차순으로 나열
                $sorted_arr_region = array(); 
                $sorted_arr_region = $arr_region;
                rsort($sorted_arr_region); # 내림차순으로 정렬된 배열
                # 이름 참조를 위한 배열
                $region_name_list = array('서울','부산','대구','인천','광주','대전','울산','세종','경기','강원','충북','충남','전북','전남','경북','경남','제주'); 
                $top_6_region = array(); # 자바스크립트로 넘겨줄 배열
                $top_6_region = [];
                
                # 반복문의 원인 모를 오류로 이렇게 대체
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[0],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[1],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[2],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[3],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[4],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[5],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[6],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[7],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[8],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[9],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[10],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[11],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[12],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[13],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[14],$arr_region)]);
                array_push($top_6_region, $region_name_list[array_search($sorted_arr_region[15],$arr_region)]);

                #for($i=0; $i<=5; $i++) {
                #    $index = array_search($sorted_arr_region['i'],$arr_region); # 정렬된 배열의 가장 큰 값으로 원본 배열의 인덱스를 찾음
                #    array_push($top_6_region,$region_name_list['index']);
                #}
                mysqli_close($con);
                ?>
                
              
              </div>
          </div>
        </div> <!-- ~row 4 --> 

        <div class="row"> <!-- row 5 -->
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                      <i class="fas fa-chart-area me-1"></i>
                      국내 백신 잔여량 (단위 : 도즈)
                    </div>
                  <div class="card-body">

                    <?php 
                $con = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
                $sql ="
                    SELECT *FROM  g_holding_vaccine ORDER BY Date DESC
                "; # 테이블 이름
                $ret = mysqli_query($con, $sql);
                if($ret) { 
                }  
                else {
                  echo "데이터 조회실패!!"."<br>";
                  echo "실패원인 : ".mysqli_error($con);
                  exit();
                }
                echo "<table id='home_table2'>
                <thead>
                    <tr>
                        <th>날짜</th>
                        <th>잔여 화이자 백신</th>
                        <th>잔여 모더나 백신</th>";
                echo "</tr></thead><tbody>";
                
                $arr_date_remining = array();
                $arr_date_remining = [];
                $arr_remining_P = array();
                $arr_remining_P = [];
                $arr_remining_M = array();
                $arr_remining_M = [];
                $i = 0;
                while($row = mysqli_fetch_array($ret)) {
                  echo "<tr><td>", $row['Date'], 
                    "</td><td>", $row['remaining_amount_P'],
                    "</td><td>", $row['remaining_amount_M'],     
                    "</td></tr>";
                    if ($i < 14) {
                    array_push($arr_date_remining, $row['Date']);
                    array_push($arr_remining_P, $row['remaining_amount_P']);
                    array_push($arr_remining_M, $row['remaining_amount_M']);
                    $i++;
                    }
                }
                echo "</tbody></table>";
                mysqli_close($con);
                ?>

                  </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                      백신접종 누적현황 (단위 : 명)
                      </div>
                <div class="card-body">
                    <?php 
                    $con = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
                    $sql ="
                        SELECT *FROM  g_vaccinated ORDER BY Date DESC 
                    "; # 테이블 이름
                    $ret = mysqli_query($con, $sql);
                    if($ret) { 
                    }  
                    else {
                      echo "데이터 조회실패!!"."<br>";
                      echo "실패원인 : ".mysqli_error($con);
                      exit();
                    }
                    echo "<table id='home_table3'>
                    <thead>
                        <tr>
                            <th>날짜</th>
                            <th>화이자 1차 접종</th>
                            <th>화이자 2차 접종</th>
                            <th>모더나 1차 접종</th>
                            <th>모더나 2차 접종</th>";
                    echo "</tr></thead><tbody>";
                        
                $arr_date_vac = array();
                $arr_date_vac = [];
                $arr_vac_p1 = array();
                $arr_vac_p1 = [];
                $arr_vac_p2 = array();
                $arr_vac_p2 = [];
                $arr_vac_m1 = array();
                $arr_vac_m1 = [];
                $arr_vac_m2 = array();
                $arr_vac_m2 = [];
                $arr_vac_total = array();
                $arr_vac_total = [];
                $i = 0;
                    while($row = mysqli_fetch_array($ret)) {
                      echo "<tr><td>", $row['Date'], 
                        "</td><td>", $row['1st_inoculation_P'],
                        "</td><td>", $row['2nd_inoculation_P'],   
                        "</td><td>", $row['1st_inoculation_M'], 
                        "</td><td>", $row['2nd_inoculation_M'],
                        "</td></tr>";
                    if ($i < 30) {
                        array_push($arr_date_vac, $row['Date']);
                        array_push($arr_vac_p1, $row['1st_inoculation_P']);
                        array_push($arr_vac_p2, $row['2nd_inoculation_P']);
                        array_push($arr_vac_m1, $row['1st_inoculation_M']);
                        array_push($arr_vac_m2, $row['2nd_inoculation_M']);
                        array_push($arr_vac_total, (int)$row['2nd_inoculation_M'] + (int)$row['2nd_inoculation_P']);
                        $i++;
                        }
                    }
                    echo "</tbody></table>";
                    mysqli_close($con);
                    ?>
                
                </div>
              </div>
          </div>
        </div> <!-- ~row5 -->
  
        <div class="row"> <!-- row 6 -->
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                      <i class="fas fa-chart-area me-1"></i>
                      국내 백신 잔여량 그래프 (단위 : 도즈)
                    </div>
                    <div class="card-body">
                        <canvas id="home_graph4" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                      <i class="fas fa-chart-area me-1"></i>
                      백신접종 누적현황 그래프 (단위 : 명)
                    </div>
                    <div class="card-body">
                        <canvas id="home_graph5" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div> <!-- ~row6 -->
    </div>
  </main>

<!-- @@@@@@@@@@@@@@@@@@@  테이블  @@@@@@@@@@@@@@@@@@@@@ -->

<script>
window.addEventListener('DOMContentLoaded', event => {
    const home_table1 = document.getElementById('home_table1');
    if (home_table1) {
        new simpleDatatables.DataTable(home_table1);
    }
});
</script>

<script>
window.addEventListener('DOMContentLoaded', event => {
    const home_table2 = document.getElementById('home_table2');
    if (home_table2) {
        new simpleDatatables.DataTable(home_table2);
    }
});
</script>

<script>
window.addEventListener('DOMContentLoaded', event => {
    const home_table3 = document.getElementById('home_table3');
    if (home_table3) {
        new simpleDatatables.DataTable(home_table3);
    }
});
</script>




<!-- @@@@@@@@@@@@@@@@@@@  그래프  @@@@@@@@@@@@@@@@@@@@@ -->
<script>
  // alert(<?php echo $arr_0s ?>);
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  
  ///////////////// 나이대별 확진자 현황 //////////////////
  var home_graph1 = document.getElementById("home_graph1");
  var myPieChart1 = new Chart(home_graph1, {
      type: 'pie',
      data: {
          labels: ["0~9세", "10대", "20대", "30대", "40대", "50대", "60대", "70대", "80대 이상"],
          datasets: [{
              data: [<?php echo $arr_0s ?>, <?php echo $arr_10s ?>, <?php echo $arr_20s ?>, <?php echo $arr_30s ?>, <?php echo $arr_40s ?>,
              <?php echo $arr_50s ?>, <?php echo $arr_60s ?>, <?php echo $arr_70s ?>, <?php echo $arr_80s_up ?>],
              backgroundColor: ['#ff0000', '#e80074', '#4d019a', '#0611f2', '#006666', '#009900', '#7dcd00', '#ffff00', '#fc6600'],
          }],
      },
  });
</script>

<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  
  ///////////////// 나이대별 확진자 현황 //////////////////
  var home_graph2 = document.getElementById("home_graph2");
  var myPieChart2 = new Chart(home_graph2, {
      type: 'pie',
      data: {
          labels: ["남성","여성"],
          datasets: [{
              data: [<?php echo $male ?>, <?php echo $female ?>],
              backgroundColor: ['#0611f2','#ff0000'],
          }],
      },
  });
</script>

<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    var lables_list = <?= json_encode($top_6_region) ?>;
    var values_list = <?= json_encode($sorted_arr_region) ?>;
    var home_graph3 = document.getElementById("home_graph3");
    var myLineChart3 = new Chart(home_graph3, {
    type: 'bar',
    data: {
    labels: lables_list,
    datasets: [{
    label: "누적 확진자",
    backgroundColor: "rgba(2,117,216,1)",
    borderColor: "rgba(2,117,216,1)",
    data: values_list,
    }],
    },
    options: {
    scales: {
    xAxes: [{
    time: {
    unit: 'month'
    },
    gridLines: {
    display: false
    },
    ticks: {
    maxTicksLimit: 100
    }
    }],
    yAxes: [{
    ticks: {
    min: 0,
    max: 200000,
    maxTicksLimit: 2
    },
    gridLines: {
    display: true
    }
    }],
    },
    legend: {
    display: false
    }
    }
    });
</script>

<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

var arr_date_remining = <?= json_encode($arr_date_remining) ?>;
var arr_date_remining = arr_date_remining.reverse();
var arr_remining_P = <?= json_encode($arr_remining_P) ?>;
var arr_remining_P = arr_remining_P.reverse();
var arr_remining_M = <?= json_encode($arr_remining_M) ?>;
var arr_remining_M = arr_remining_M.reverse();

var home_graph4 = document.getElementById("home_graph4");
var myLineChart4 = new Chart(home_graph4, {
    type: 'line',
    data: {
        labels: arr_date_remining,
        datasets: [{
            label: "화이자 잔여 백신",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.1)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: arr_remining_P,
        },{
            label: "모더나 잔여 백신",
            lineTension: 0.3,
            backgroundColor: "rgba(0, 194, 31, 0.1)",
            borderColor: "rgba(0, 194, 31, 1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(0, 194, 31, 1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: arr_remining_M,
        },]
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 10000,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: false
        }
    }
});
</script>

<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
var arr_date_vac = <?= json_encode($arr_date_vac) ?>;
var arr_date_vac = arr_date_vac.reverse();
var arr_vac_p1 = <?= json_encode($arr_vac_p1) ?>;
var arr_vac_p1 = arr_vac_p1.reverse();
var arr_vac_p2 = <?= json_encode($arr_vac_p2) ?>;
var arr_vac_p2 = arr_vac_p2.reverse();
var arr_vac_m1 = <?= json_encode($arr_vac_m1) ?>;
var arr_vac_m1 = arr_vac_m1.reverse();
var arr_vac_m2 = <?= json_encode($arr_vac_m2) ?>;
var arr_vac_m2 = arr_vac_m2.reverse();
var arr_vac_total = <?= json_encode($arr_vac_total) ?>;
var arr_vac_total = arr_vac_total.reverse();

var home_graph5 = document.getElementById("home_graph5");
var myLineChart5 = new Chart(home_graph5, {
    type: 'line',
    data: {
        labels: arr_date_vac,
        datasets: [{
            label: "화이자 1차 접종",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0)",
            borderColor: "rgba(255, 0, 0, 0.31)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,0)",
            pointBorderColor: "rgba(255, 0, 0, 0.31)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: arr_vac_p1,
        },
        {
            label: "화이자 2차 접종",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0)",
            borderColor: "rgba(255, 0, 0, 0.79)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,0)",
            pointBorderColor: "rgba(255, 0, 0, 0.79)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: arr_vac_p2,
        },
        {
            label: "모더나 1차 접종",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0)",
            borderColor: "rgba(71, 238, 111, 0.54)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,0)",
            pointBorderColor: "rgba(71, 238, 111, 0.54)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: arr_vac_m1,
        },
        {
            label: "모더나 2차 접종",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0)",
            borderColor: "rgba(71, 238, 111, 0.85)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,0)",
            pointBorderColor: "rgba(71, 238, 111, 0.85)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: arr_vac_m2,
        },
        {
            label: "백신 접종 완료자",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0)",
            borderColor: "rgba(66, 181, 255, 1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,0)",
            pointBorderColor: "rgba(66, 181, 255, 1)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data:  arr_vac_total,
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 35000000,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: false
        }
    }
});
</script>






</div>


@endsection
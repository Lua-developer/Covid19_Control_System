@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid px-4">
          <h1 class="mt-4">백신 부작용 비교분석</h1><br>
          <div class="card mb-4">
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
            </div>
            <div class="row"> 
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        이상증세 확인
                    </div>
                    <div class="card-body">
                        접종한 백신 : 
                        <form method="post" action="se_check.php">
                            <input type="radio" name="vac_name" id ="vac_type" value="M" checked="checked">모더나
                            <input type="radio" name="vac_name" id=" vac_type" value="P">화이자<br>
                        <br>증상 선택 : 
                        <select name="se_select">
                            <optgroup label="조회할 증상 목록">
                            <option id = "se_case" value = "headache">두통</option>
                            <option id = "se_case" value = "sickness">몸살</option>
                            <option id = "se_case" value = "stomachache">복통</option>
                            </optgroup>
                        </select>
                        <button id = "insert" button type ="submit"> 조회 </button>
                    </form>
                    
                </div>
              </div>
            </div>
            <!-- -------------------증상별 데이터 총 정리---------------- --> 
            <?php
            $connection = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
            $sql = "SELECT * FROM h_confirmed_case WHERE (Type_of_getting_vaccine = 'Moderna1' OR Type_of_getting_vaccine = 'Moderna2') AND Side_effects ='stomachache'";
            $ret = mysqli_query($connection, $sql);

            if($ret) { 
                  echo mysqli_num_rows($ret), "건이 조회됨.  "; # 요건 없애도됨
                }  
                else {
                  echo "데이터 조회실패!!"."<br>";
                  echo "실패원인 : ".mysqli_error($connection);
                  exit();
                }
            
            $korean_male = 0;
            $korean_female = 0;
            $korean_0s = 0;
            $korean_10s = 0;
            $korean_20s = 0;
            $korean_30s = 0;
            $korean_40s = 0;
            $korean_50s = 0;
            $korean_60s = 0;
            $korean_70s = 0;
            $korean_80s_up = 0;
            $korean_under_d = array();
            $korean_under_d = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

            while($row = mysqli_fetch_array($ret)) {
                if((int)$row['Age'] < 10) {$korean_0s = $korean_0s + (int)$row['Age'];}
                if((int)$row['Age'] < 20) {$korean_10s = $korean_10s + (int)$row['Age'];}
                if((int)$row['Age'] < 30) {$korean_20s = $korean_20s + (int)$row['Age'];}
                if((int)$row['Age'] < 40) {$korean_30s = $korean_30s + (int)$row['Age'];}
                if((int)$row['Age'] < 50) {$korean_40s = $korean_40s + (int)$row['Age'];}
                if((int)$row['Age'] < 60) {$korean_50s = $korean_50s + (int)$row['Age'];}
                if((int)$row['Age'] < 70) {$korean_60s = $korean_60s + (int)$row['Age'];}
                if((int)$row['Age'] < 80) {$korean_70s = $korean_70s + (int)$row['Age'];}
                if((int)$row['Age'] >= 80) {$korean_80s_up = $korean_80s_up + (int)$row['Age'];}

                if($row['Gender'] == 'M') {$korean_male = $korean_male + 1;}
                if($row['Gender'] == 'W') {$korean_female = $korean_female + 1;}
                
                if((int)$row['Underlying_disease'] < 30) {
                $korean_under_d[(int)$row['Underlying_disease']] = $korean_under_d[(int)$row['Underlying_disease']] + 1; }
            }
            mysqli_close($connection);
        ?>

        <?php
        $connection = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
        $sql = "SELECT * FROM p_clinical_trial WHERE (Type = 'Moderna') AND Side_effects ='stomachache'";
        $ret = mysqli_query($connection, $sql);

        if($ret) { 
            echo mysqli_num_rows($ret), "건이 조회됨.<br>"; # 요건 없애도됨
            }  
            else {
            echo "데이터 조회실패!!"."<br>";
            echo "실패원인 : ".mysqli_error($connection);
            exit();
            }

        $ab_male = 0;
        $ab_female = 0;
        $ab_0s = 0;
        $ab_10s = 0;
        $ab_20s = 0;
        $ab_30s = 0;
        $ab_40s = 0;
        $ab_50s = 0;
        $ab_60s = 0;
        $ab_70s = 0;
        $ab_80s_up = 0;
        $ab_under_d = array();
        $ab_under_d = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];

        while($row = mysqli_fetch_array($ret)) {
            if((int)$row['Age'] < 10) {$ab_0s = $ab_0s + (int)$row['Age'];}
            if((int)$row['Age'] < 20) {$ab_10s = $ab_10s + (int)$row['Age'];}
            if((int)$row['Age'] < 30) {$ab_20s = $ab_20s + (int)$row['Age'];}
            if((int)$row['Age'] < 40) {$ab_30s = $ab_30s + (int)$row['Age'];}
            if((int)$row['Age'] < 50) {$ab_40s = $ab_40s + (int)$row['Age'];}
            if((int)$row['Age'] < 60) {$ab_50s = $ab_50s + (int)$row['Age'];}
            if((int)$row['Age'] < 70) {$ab_60s = $ab_60s + (int)$row['Age'];}
            if((int)$row['Age'] < 80) {$ab_70s = $ab_70s + (int)$row['Age'];}
            if((int)$row['Age'] >= 80) {$ab_80s_up = $ab_80s_up + (int)$row['Age'];}

            if($row['Gender'] == 'M') {$ab_male = $ab_male + 1;}
            if($row['Gender'] == 'W') {$ab_female = $ab_female + 1;}
            if((int)$row['Underlying_disease'] < 30) {
            $ab_under_d[(int)$row['Underlying_disease']] = $ab_under_d[(int)$row['Underlying_disease']] + 1; }
        }
        mysqli_close($connection);
        ?>
            <!-- ------------------------------------------------------- --> 


            <div class="row"> <!-- 성별 row --> 
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            성별에 따른 분포 (한국인) 
                        </div>
                        <div class="card-body">
                            <canvas id="graph1" width="100%" height="40"></canvas>
                
                        
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            성별에 따른 분포 (해당 제약사 임상실험) 
                        </div>
                        <div class="card-body">
                            <canvas id="graph2" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"> <!-- 나이 row --> 
                
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            나이에 따른 분포 (한국인) 
                        </div>
                        <div class="card-body">
                            <canvas id="graph3" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            나이에 따른 분포 (해당 제약사 임상실험) 
                        </div>
                        <div class="card-body">
                            <canvas id="graph4" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"> <!-- 기저질환 row --> 
                
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            기저질환자 분석 (한국인) 
                        </div>
                        <div class="card-body">
                            <canvas id="graph5" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            기저질환자 분석 (해당 제약사 임상실험) 
                        </div>
                        <div class="card-body">
                            <canvas id="graph6" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </main>
</div>

<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    
    ///////////////// 나이대별 확진자 현황 //////////////////
    var graph1 = document.getElementById("graph1");
    var myPieChart1 = new Chart(graph1, {
        type: 'pie',
        data: {
            labels: ["남성","여성"],
            datasets: [{
                data: [<?php echo $korean_male ?>, <?php echo $korean_female ?>],
                backgroundColor: ['#0611f2','#ff0000'],
            }],
        },
    });
  </script>

  <script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  
  ///////////////// 나이대별 확진자 현황 //////////////////
  var graph2 = document.getElementById("graph2");
  var myPieChart2 = new Chart(graph2, {
      type: 'pie',
      data: {
          labels: ["남성","여성"],
          datasets: [{
              data: [<?php echo $ab_male ?>, <?php echo $ab_female ?>],
              backgroundColor: ['#0611f2','#ff0000'],
          }],
      },
  });
</script>

<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  
  ///////////////// 나이대별 확진자 현황 //////////////////
  var graph3 = document.getElementById("graph3");
  var myPieChart3 = new Chart(graph3, {
      type: 'pie',
      data: {
          labels: ["0~9세", "10대", "20대", "30대", "40대", "50대", "60대", "70대", "80대 이상"],
          datasets: [{
              data: [<?php echo $korean_0s ?>, <?php echo $korean_10s ?>, <?php echo $korean_20s ?>, <?php echo $korean_30s ?>, <?php echo $korean_40s ?>,
              <?php echo $korean_50s ?>, <?php echo $korean_60s ?>, <?php echo $korean_70s ?>, <?php echo $korean_80s_up ?>],
              backgroundColor: ['#ff0000', '#e80074', '#4d019a', '#0611f2', '#006666', '#009900', '#7dcd00', '#ffff00', '#fc6600'],
          }],
      },
  });
</script>

<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  
  ///////////////// 나이대별 확진자 현황 //////////////////
  var graph4 = document.getElementById("graph4");
  var myPieChart4 = new Chart(graph4, {
      type: 'pie',
      data: {
          labels: ["0~9세", "10대", "20대", "30대", "40대", "50대", "60대", "70대", "80대 이상"],
          datasets: [{
              data: [<?php echo $ab_0s ?>, <?php echo $ab_10s ?>, <?php echo $ab_20s ?>, <?php echo $ab_30s ?>, <?php echo $ab_40s ?>,
              <?php echo $ab_50s ?>, <?php echo $ab_60s ?>, <?php echo $ab_70s ?>, <?php echo $ab_80s_up ?>],
              backgroundColor: ['#ff0000', '#e80074', '#4d019a', '#0611f2', '#006666', '#009900', '#7dcd00', '#ffff00', '#fc6600'],
          }],
      },
  });
</script>

<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    var value_list = <?= json_encode($korean_under_d) ?>;

    var graph5 = document.getElementById("graph5");
    var myLineChart5 = new Chart(graph5, {
    type: 'bar',
    data: {
    labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29],
    datasets: [{
    label: "기저 질환자 통계",
    backgroundColor: "rgba(2,117,216,1)",
    borderColor: "rgba(2,117,216,1)",
    data: value_list,
    }],
    },
    options: {
    scales: {
    xAxes: [{
    time: {
    unit: 'disease_Code'
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
    max: 50,
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

    var ab_value_list = <?= json_encode($ab_under_d) ?>;

    var graph6 = document.getElementById("graph6");
    var myLineChart6 = new Chart(graph6, {
    type: 'bar',
    data: {
    labels: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29],
    datasets: [{
    label: "기저 질환자 통계",
    backgroundColor: "rgba(2,117,216,1)",
    borderColor: "rgba(2,117,216,1)",
    data: ab_value_list,
    }],
    },
    options: {
    scales: {
    xAxes: [{
    time: {
    unit: 'disease_Code'
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
    max: 50,
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
</div>
@endsection
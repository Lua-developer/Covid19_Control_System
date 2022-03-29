@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">대구병원 상황판</h1><br>
                <div class="card mb-4">
                    <div class="card-body">
                        2021 Covid 19 대구병원의 현황을 안내 드립니다.
                    </div>
                </div>
                <div class="row">
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
                                <a href="./knu" class="txt_link">경대병원</a>
                                <div class="small text-blue"><i class="fas fa-angle-right"></i></div>
                                <a href="./yu" class="txt_link">영대병원</a>
                                <div class="small text-blue"><i class="fas fa-angle-right"></i></div>
                                <a href="./daegu" class="txt_link">대구병원</a>
                                <div class="small text-blue"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">제약사 정보</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="./moderna" class="txt_link">모더나</a>

                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                <a href="./pfizer" class="txt_link">화이자</a>
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
                <div class="row">    <!-- row2 -->
                    <div class="card mb-4">
                        <div class="card-header">
                            확진자 종합 상태 그래프
                        </div>
                        <div class="card-body">
                            <canvas id="daegu_graph1" width="100%" height="20"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                <!-- 컨텐츠 내용-->
                    <div class="card mb-4">
                        <div class="card-header">
                            확진자 관리 차트
                        </div>
                        <div class="card-body">
                            <?php
                            echo "<table id='daegu1'>";
                            $connection = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
                            $sql = "SELECT * FROM h_hospitalization HS, h_patient P WHERE (HS.ID = P.ID) AND HS.hopital='DH'";
                            $ret = mysqli_query($connection, $sql);

                            $arr_condition = array();
                            $arr_condition = [0,0,0,0,0]; # 완치, C , R,  HR, Dead
                                    
                            echo "<thead>
                                <tr>
                                    <th>주민등록번호</th>
                                    <th>성별</th>
                                    <th>나이</th>
                                    <th>보호자 휴대폰 번호</th>
                                    <th>주소</th>
                                    <th>입원 번호</th>
                                    <th>입원일</th>
                                    <th>상태</th>
                                    <th>병실위치</th>
                                    <th>병실(호)</th>
                                    <th>담당의사</th>
                                    <th>1차 접종</th>
                                    <th>2차 접종</th>
                                </tr></thead><tbody>";
                            while($row = mysqli_fetch_array($ret)) {
                                echo "<tr>
                                    <td>", $row['ID'], 
                                    "</td><td>", $row['Gender'],
                                    "</td><td>", $row['Age'], 
                                    "</td><td>", $row['Phone_num'],
                                    "</td><td>", $row['Address'],
                                    "</td><td>", $row['Admission_num'],
                                    "</td><td>", $row['Admission_date'],
                                    "</td><td>", $row['Conditions'],
                                    "</td><td>", $row['Inpatient_room'],
                                    "</td><td>", $row['Ward'],
                                    "</td><td>", $row['Medical_attendant'],
                                    "</td><td>", $row['1st_inoculation'],
                                    "</td><td>", $row['2nd_inoculation'],
                                    "</td></tr>";
                                    if($row['Conditions'] == 'Y') {
                                        $arr_condition[0] = $arr_condition[0] + 1;
                                    }
                                    if($row['Conditions'] == 'C') {
                                        $arr_condition[1] = $arr_condition[1] + 1;
                                    }
                                    if($row['Conditions'] == 'R') {
                                        $arr_condition[2] = $arr_condition[2] + 1; 
                                    }
                                    if($row['Conditions'] == 'HR') {
                                        $arr_condition[3] = $arr_condition[3] + 1;
                                    }
                                    if($row['Conditions'] == 'Dead') {
                                        $arr_condition[4] = $arr_condition[4] + 1;
                                    }
                            }
                            echo "</tbody></table>";
                            mysqli_close($connection);
                        ?>
                        </div>
                    </div>
                </div>
                <div class="row">     <!-- row ? -->
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                환자 정보 입력란
                            </div>
                            <div class="card-body">
                                <div id="insert">
                                <form method="post" action="insert.php">
                                    주민등록번호 : <input type="text" name = "ID" maxlength="6">-
                                    <input type="text" name = "ID2" maxlength="7"><br>
                                    <input type="radio" name="sex" value="M" checked="checked">남자
                                    <input type="radio" name="sex" value="W">여자<br>
                                    <input type="radio" name="univ" value="YH" checked="checked">영남대
                                    <input type="radio" name="univ" value="KH">경북대
                                    <input type="radio" name="univ" value="DH">대구<br>
                                    나이 : <input type="text" name= "age" maxlength="2"><br>
                                    휴대폰 번호 <input type="text" name = "Phone_num" maxlength="13" value = "010-" >
                                    보호자 휴대폰 번호 <input type="text" name = "Guatdian_tel" maxlength ="13" value = "010-"><br>
                                    발생지역 : <input type="radio" name="dome" value="Y" checked="checked">국내발생
                                    <input type="radio" name="dome" value="N">해외발생<br>
                                    1차 접종 여부 : <input type="radio" name="vac1" value="NONE" checked="checked">미접종
                                    <input type="radio" name="vac1" value="Pfizer">화이자
                                    <input type="radio" name="vac1" value="Moderna">모더나<br>
                                    2차 접종 여부 : <input type="radio" name="vac2" value="NONE"  checked="checked" >미접종
                                    <input type="radio" name="vac2" value="Pfizer">화이자
                                    <input type="radio" name="vac2" value="Moderna">모더나<br>
                                    부스터샷 접종 : <input type="radio" name="boost" value="NONE" checked="checked">미접종
                                    <input type="radio" name="boost" value="Pfizer">화이자
                                    <input type="radio" name="boost" value="Moderna">모더나
                                    <br>주소 : 
                                    <select name="subject">
                                    <optgroup label="광역시">
                                    <option value = "Seoul">서울특별시</option>
                                    <option value = "Daegu">대구광역시</option>
                                    <option value = "Busan">부산광역시</option>
                                    <option value = "Ulsan">울산광역시</option>
                                    <option value = "Daejeon">대전광역시</option>
                                    <option value = "Incheon">인천광역시</option>
                                    <option value = "Gwangju">광주광역시</option>
                                    </optgroup>
                                    <optgroup label="도, 세종시">
                                    <option value = "Gyeongbuk">경상북도</option>
                                    <option value = "Gyeongnam">경상남도</option>
                                    <option value = "Jeonbuk">전라북도</option>
                                    <option value = "Jeonnam">전라남도</option>
                                    <option value = "Gyeonggi">경기도</option>
                                    <option value = "Gangwon">강원도</option>
                                    <option value = "Jeju">제주도</option>
                                    <option value = "Sejong">세종시</option>
                                    </optgroup>
                                    </select>
                                    <div id="btn_insert">
                                    <button id = "insert" button type ="submit"> 삽입 </button>
                                    </div>
                                </form>
                                </div> <!-- insert -->
                            </div> <!-- card-body -->
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                확진자 상태 수정
                            </div>
                            <div class="card-body">
                            <div class="card-body"><h3>상태를 변경하실 환자의 주민등록번호를 기입해 주세요</h3><br>
                        <form method="post" action="update.php">
                            주민등록번호 : <input type="text" name = "ID" maxlength="6">-
                            <input type="text" name = "ID2" maxlength="7"><br>
                            <h4>변화 된 환자의 상태를 골라 주세요.</h4>
                            <input type="radio" name="Cond" value="Y" checked="checked">완치
                            <input type="radio" name="Cond" value="R">R
                            <input type="radio" name="Cond" value="C">C
                            <input type="radio" name="Cond" value="HR">HR
                            <input type="radio" name="Cond" value="Dead">Dead<br>
                            <div id="btn_update">
                            <button id = "update" button type ="submit"> 수정 </button>
                            </div>
                        </form>
                        </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                환자 정보 삭제
                            </div>
                            <div class="card-body"><h3>주민등록번호를 이용하여 삭제가 가능합니다</h3><br>
                            <form method="post" action="delete.php">
                                주민등록번호 : <input type="text" name = "ID" maxlength="6">-
                                <input type="text" name = "ID2" maxlength="7"><br>
                                <div id="btn_delete">
                                <button id = "delete" button type ="submit"> 삭제 </button>
                                </div>
                            </form>
                            </div>
                    </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                환자 정보 삭제
                            </div>
                            <div class="card-body">
                                <button type="button" onclick="location.href='temp3'">백신 이상증상 환자관리</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>  <!-- /container-fluid px-4-->
    </main>
</div> <!-- /layoutSidenav_content-->

<script>
    window.addEventListener('DOMContentLoaded', event => {
    const daegu1 = document.getElementById('daegu1');
    if (daegu1) {
        new simpleDatatables.DataTable(daegu1);
    }
    });
</script>

<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    
    var values_list1 = <?= json_encode($arr_condition) ?>;
    ///////////////// 나이대별 확진자 현황 //////////////////
    var daegu_graph1 = document.getElementById("daegu_graph1");
    var myPieChart1 = new Chart(daegu_graph1, {
        type: 'pie',
        data: {
            labels: ["완치","C","R","HR","Dead"],
            datasets: [{
                data: values_list1,
                backgroundColor: ['#0611f2','#daa520', '#f4a460', '#ff6347','#ff0000'],
            }],
        },
    });
  </script>

@endsection
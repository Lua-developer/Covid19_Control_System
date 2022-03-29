@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">영남대병원 확진자 부작용 신고</h2><br>
                <div class="card mb-4">
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
                
                <div class="row">
                <!-- 컨텐츠 내용-->
                    <div class="card mb-4">
                        <div class="card-header">
                            영남대병원 백신 부작용 증상자 통계
                        </div>
                        <div class="card-body">
                            <?php
                            echo "<table id='temp'>";
                            $connection = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
                            $sql = "SELECT * FROM h_confirmed_case WHERE Hopital = 'YH'";
                            $ret = mysqli_query($connection, $sql);
                            echo "<thead>
                                <tr>
                                    <th>주민등록번호</th>
                                    <th>성별</th>
                                    <th>나이</th>
                                    <th>신고 병원</th>
                                    <th>기저질환 코드</th>
                                    <th>부작용</th>
                                    <th>사망여부</th>
                                    <th>접종백신</th>
                                </tr></thead><tbody>";
                            while($row = mysqli_fetch_array($ret)) {
                                echo "<tr>
                                    <td>", $row['ID'], 
                                    "</td><td>", $row['Gender'],
                                    "</td><td>", $row['Age'], 
                                    "</td><td>", $row['Hopital'], 
                                    "</td><td>", $row['Underlying_disease'],
                                    "</td><td>", $row['Side_effects'],
                                    "</td><td>", $row['Death'],
                                    "</td><td>", $row['Type_of_getting_vaccine'],
                                    "</td></tr>";
                            }
                            echo "</tbody></table>";
                            mysqli_close($connection);
                        ?>
                        </div>
                    </div>
                </div> <!-- row ? -->
                <div class="row">     <!-- row ? -->
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                영남대병원 부작용 신고
                            </div>
                            <div class="card-body">
                                <div id="insert">
                                <form method="post" action="in.php">
                                    주민등록번호 : <input type="text" name = "ID" maxlength="6">-
                                    <input type="text" name = "ID2" maxlength="7"><br>
                                    <input type="radio" name="univ" value="YH" checked="checked">영남대
                                    <input type="radio" name="univ" value="KH">경북대
                                    <input type="radio" name="univ" value="DH">대구<br>
                                    나이 : <input type="text" name= "age" maxlength="2"><br>
                                    <input type="radio" name="sex" value="M" checked="checked">남자
                                    <input type="radio" name="sex" value="W">여자<br>
                                    기저질환 : <input type="text" name= "under" maxlength="2"><br>
                                    사망여부 : <input type="radio" name="dead" value="" checked="checked">생존
                                    <input type="radio" name="dead" value="Y">사망<br>
                                    부작용 내역 : <select name="subject">
                                    <optgroup label="부작용 목록">
                                    <option value = "stomachache">복통</option>
                                    <option value = "headache">두통</option>
                                    <option value = "Sickness">감기</option>
                                    </select><br>
                                    백신 접종 여부 : <select name = vac>
                                    <optgroup label="접종여부">
                                    <option value = "None">미접종</option>
                                    <option value = "Pfizer1">화이자1차</option>
                                    <option value = "Pfizer2">화이자2차</option>
                                    <option value = "Moderna1">모더나1차</option>
                                    <option value = "Moderna2">모더나2차</option>
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
                                사망자 추가
                            </div>
                            <div class="card-body"><h3>사망한 환자의 주민등록번호를 입력하십시요</h3><br>
                        <form method="post" action="up.php">
                            주민등록번호 : <input type="text" name = "ID" maxlength="6">-
                            <input type="text" name = "ID2" maxlength="7"><br>
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
                    <div class="card mb-4">
                        <div class="card-header">
                            부작용자 정보 삭제
                        </div>
                        <div class="card-body"><h3>주민등록번호를 이용하여 삭제가 가능합니다</h3><br>
                        <form method="post" action="de.php">
                            주민등록번호 : <input type="text" name = "ID" maxlength="6">-
                            <input type="text" name = "ID2" maxlength="7"><br>
                            <div id="btn_delete">
                            <button id = "delete" button type ="submit"> 삭제 </button>
                            </div>
                        </form>
                        </div>
                    </div>
        </div>  <!-- /container-fluid px-4-->
        
    </main>
</div> <!-- /layoutSidenav_content-->

<script>
    window.addEventListener('DOMContentLoaded', event => {
    const temp = document.getElementById('temp');
    if (temp) {
        new simpleDatatables.DataTable(temp);
    }
    });
</script>
@endsection
@extends('layouts.master')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">화이자 백신 상황판</h1><br>
            <div class="card mb-4">
                <div class="card-body">
                    국내 화이자 백신 관리 현황을 알려 드립니다.
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
                            <a href="../pfizer" class="txt_link">화이자</a>
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
            <div class="card mb-4">
                <div class="card-header">
                    화이자 국내 백신 현황
                </div>
                <div class="card-body">
                    <?php
                        echo "<table id='p_table1'>";
                        $connection = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
                        $sql = "SELECT * FROM p_supply_vaccine WHERE Vaccine_type ='Pfizer'";
                        $ret = mysqli_query($connection, $sql);
                                
                        echo "<thead>
                            <tr>
                                <th>일자</th>
                                <th>승인일</th>
                                <th>선적량</th>
                                <th>유통기한</th>
                            </tr></thead><tbody>";
                        while($row = mysqli_fetch_array($ret)) {
                            echo "<tr>
                                <td>", $row['Date'], 
                                "</td><td>", $row['Approval_date'],
                                "</td><td>", $row['Shipment'], 
                                "</td><td>", $row['Expiration_date'],
                                "</td></tr>";
                        }
                        echo "</tbody></table>";
                        mysqli_close($connection);
                        ?>
                </div>
            </div>     
    </main>

<script>
window.addEventListener('DOMContentLoaded', event => {
const p_table1 = document.getElementById('p_table1');
if (p_table1) {
new simpleDatatables.DataTable(p_table1);
}
});
</script>
</div>

@endsection


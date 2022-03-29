@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
<script>
var case_vac =  '';
var case_se = '';
</script>
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
            
      </div>
    </main>
</div>





</div>
@endsection
<?php 
// YeungNam University DataBase Project



$connection = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
// 아이디, 패스워드 받아오는 SQL 구문입니다.
if(empty($_POST['ID'] OR $_POST['ID2'])) {
    echo "<script>alert(\"주민등록번호가 입력되지 않았습니다.\"); location.href='../home';</script>";
}
$delete = mysqli_query($connection, "
DELETE FROM h_patient WHERE ID = '{$_POST["ID"]}-{$_POST["ID2"]}'");
if($delete == false) {
    echo "<script>alert(\"부작용자 명단에 없습니다!\"); location.href='../home';</script>";
} else {
echo "<script>alert(\"부작용자 명부를 삭제했습니다!\"); location.href='../home';</script>";
}
// MySQL 로그인 성공 후 연결 해제
mysqli_close($connection);
?>

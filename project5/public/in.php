<?php 
// YeungNam University DataBase Project



$connection = mysqli_connect("localhost", "root", "admin", "covid19") or die("MySQL 접속 실패!!"); # 연결
// 아이디, 패스워드 받아오는 SQL 구문입니다.
$in = mysqli_query($connection, "
INSERT INTO h_confirmed_case VALUES (
    '{$_POST["ID"]}-{$_POST["ID2"]}',
    '{$_POST["univ"]}',
    '{$_POST["age"]}',
    '{$_POST["sex"]}',
    '{$_POST["under"]}',
    '{$_POST["subject"]}',  
    '{$_POST["dead"]}',
    ' ')
    ");
    if($in == false) {
        echo "<script>alert(\"주민등록번호가 중복되었습니다!\"); location.href='../home;</script>";
    } else {
        echo "<script>alert(\"입력에 성공했습니다!\"); location.href='../home';</script>";
    }

// MySQL 로그인 성공 후 연결 해제
mysqli_close($connection);
?>

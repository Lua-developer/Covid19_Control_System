<?php 
// YeungNam University DataBase Project
// Developed By 정진영, 지준영
// login.php 로그인시 인증하는 페이지입니다.


// 데이터베이스 커넥션 설정입니다. 인클루드 시켜 놓으면 바로 db 연동 되용



include'/xampp/htdocs/project/config/connect.php';
// 아이디 패스워드 받아 오는 변수
$userID = $_POST["userID"];
$userPS = $_POST["userPS"];

// 아이디, 패스워드 받아오는 SQL 구문입니다.
$login_set = mysqli_query($connection, "SELECT * FROM account where id='$userID' && pass ='$userPS'");
// 로그인 실패시 원래 페이지로 돌아갑니다.
// 로그인 성공시 메세지 박스 출력 후 관리자 메뉴로 이동

if(mysqli_fetch_array($login_set)) {
    // 임시로 링크 다른곳으로 달았습니다.
    // 관리자 페이지 구현되면 바꾸어 주세요.
    echo "<script>alert(\"관리자님! 환영합니다.\"); location.href='admin.html';</script>";
} else {
    echo "<script>alert(\"로그인 실패! 다시 시도하십시요.\"); location.href='login.html';</script>";
}

// MySQL 로그인 성공 후 연결 해제
mysqli_close($connection);
?>
<?php
include("constants.php");

$email = $_GET['email'];
$code = $_GET['code'];

$sql = "SELECT * FROM users WHERE email = '$email' and code = '$code'";
$res1 = mysqli_query($conn, $sql);


if (mysqli_num_rows($res1)) {
    // thay doi status
    $sql = "UPDATE users SET status = 1 WHERE email = '$email'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        // đã kích hoạt
        echo "Tài khoản của bạn đã được kích hoạt";
        header("location:" . $SITEURL . 'login.php');
    }
} else {
    echo "Lỗi khi kích hoạt tài khoản. Hãy thử lại.</p>";
    header("location:" . $SITEURL . 'register.php');
}

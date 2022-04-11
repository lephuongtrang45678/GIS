<?php
session_start();
include('./constants.php')
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5 text-danger fw-bold fs-3">ĐĂNG NHẬP</h5>
                    <?php
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                    if (isset($_SESSION['no-login'])) {
                        echo $_SESSION['no-login'];
                        unset($_SESSION['no-login']);
                    }
                    ?>
                    <form method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                            <label for="floatingInput">Địa chỉ Email </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <label for="floatingPassword">Mật khẩu</label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                            <label class="form-check-label" for="rememberPasswordCheck">
                                Nhớ mật khẩu
                            </label>
                        </div>
                        <div class="d-grid">
                            <input class="btn btn-outline-danger btn-login text-uppercase fw-bold" name="submit" type="submit" value="Đăng Nhập">
                        </div>
                        <hr class="my-4">
                        <div class="d-grid mb-2">
                            <button class="btn btn-google btn-login text-uppercase fw-bold" type="">
                                <i class="fab fa-google me-2"></i> Đăng Nhập với Google
                            </button>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-facebook btn-login text-uppercase fw-bold" type="">
                                <i class="fab fa-facebook-f me-2"></i> Đăng Nhập với Facebook
                            </button>
                        </div>
                        <div class="row mb-1 px-3 mt-3">
                            <div class="col">
                                <small class="font-weight-bold">bạn chưa có tài khoản? </small>
                            </div>
                            <div class="col">
                                <a href="register.php" class="text-danger fw-bolder ">ĐĂNG KÝ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];



    $sql = "SELECT * FROM users WHERE email='$email' and status = '1'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $pass_save = $row['password'];
        if (password_verify($pass, $pass_save)) {
            $_SESSION['login'] = "<div class='danger'>Đăng nhập thành công.</div>";
            $_SESSION['user'] = $email;
            $_SESSION['userid'] = $row['userid'];



            header("Location:index.php");
        } else {
            $response = 'Mật khẩu sai';
            header("Location:" . SITEURL . "login.php?response=$response");
        }
    } else {
        $response = "email sai";
        header("Location:" . SITEURL . "login.php?response=$response");
    }
}




include('footer.php');
?>
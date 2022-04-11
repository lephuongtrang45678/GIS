<?php
include('constants.php');
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="./main.css" rel="stylesheet" type="text/css">
    <title>Cafe Ha Noi</title>
    <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css" />
    <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>

    <link rel="stylesheet" href="http://localhost:8081/libs/openlayers/css/ol.css" type="text/css" />
    <script src="http://localhost:8081/libs/openlayers/build/ol.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>

    <script src="http://localhost:8081/libs/jquery/jquery-3.4.1.min.js" type="text/javascript"></script>
</head>

<body>
    <div class="container-fluid d-flex justify-content-end bg-light">

        <ul class="nav ">


            <?php
            if (isset($_SESSION['user'])) { ?>
                <li class="nav-item">
                    <a href="./logout.php" class="nav-link text-decoration-none text-muted text-center "><i class="fas fa-sign-in-alt"></i> Đăng Xuất </a>
                    <div class="text-muted"><?php echo $_SESSION['user'] ?></div>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a href="./register.php" class="nav-link text-decoration-none text-muted"><i class="fas fa-user-plus"></i> Đăng Ký</a>
                </li>
                <li class="nav-item">
                    <a href="./login.php" class="nav-link text-decoration-none text-muted "><i class="fas fa-sign-in-alt"></i> Đăng nhập </a>
                </li>
            <?php }
            ?>
        </ul>
    </div>
    <div class="container-fluid mt-4 mb-4">
        <div class="row">
            <div class="col-3">
                <a href="index.php"><img class="scontent" src="https://scontent.fhan14-2.fna.fbcdn.net/v/t1.15752-9/277468787_832303157624809_4008409525918875447_n.png?_nc_cat=106&ccb=1-5&_nc_sid=ae9488&_nc_ohc=AMz-3dta9lcAX9cGUq8&tn=n8cQR19rlYicuKoc&_nc_ht=scontent.fhan14-2.fna&oh=03_AVIuKYka10kfHUGyI6PAx-nxjay_a_64yjgUgHfyNgSlvA&oe=6279F104" alt=""></a>
            </div>
            <div class="col-5 "></div>
            <div class="col-4 ">
                <form action="search.php" method="POST" class="d-flex boder">
                    <select class="form-select w-50 me-2" aria-label="" name="book_isbn">
                        <?php
                        $sql = "SELECT distinct book_Category FROM books";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value ="' . $row['book_isbn'] . '" selected>' . $row['book_Category'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <input type="search" name="search" class="form-control" placeholder="Tìm kiếm cafe Hà Nội .." required>
                    <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-outline-danger">
                </form>
            </div>


        </div>
    </div>
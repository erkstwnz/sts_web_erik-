<?php
// include_once("database.php");
// session_start();
// if (isset($_POST["login"])) {
//     $username = $_POST["usernames"];
//     // $password = $_POST["passwords"];
//     if (cek_login($username, $password)) {
//         $_SESSION['username'] = $username;
//         $_SESSION['status'] = "login";
//         $_SESSION['role'] = "admin";
//         if ($_SESSION['role'] == "admin") {
//             header("location:admin.php");
//         } else {
//             header("location:user.php");
//         }
//     } else {
//         header("location:login.php?login=gagal");
//     }
// }

include_once("database.php");
session_start();
if (isset($_POST["login"])) {
    $username = $_POST["usernames"];
    if (cek_login($_POST['usernames'], $_POST['passwords'])) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        if ($_SESSION['role'] == "admin") {
            header("location:admin.php");
        } else {
            header("location:user.php");
        }
    } else {
        header("location:login.php?msg=gagal");
    }
}
?>
<!DOCTYPE html>
<!-- ... rest of your HTML code ... -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login Dulu Ya!</title>
</head>

<body>

    <div class="container mt-5"><br><br>
        <div class="row justify-content-center">
            <div class="col-md-6">




                <div class="card">
                    <div class="card-header text-center">
                       <STrong>LOGIN </STrong> 
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="Username" class="form-label">Username</label>
                            <div class="">
                                <span class=""
                                        width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg></span>
                                <input type="text" class="form-control" id="Username" name="usernames" Required
                                    placeholder="Masukan Username" aria-describedby="basic-addon3">
                            </div>
                            <label for="password" class="form-label">Password</label>
                            <div class="">
                                <span class="">
                                    
                                     
                                        <path
                                            d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2" />
                                    </svg>
                                </span>
                                <input type="password" class="form-control" id="password" name="passwords" Required
                                    placeholder="Masukan Password" aria-describedby="basic-addon3">
                            </div>
                            <div class=row mb-3>
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>

                            <div class="text-center">
                                <br>Belum Punya Akun? Silahkan <a href="daftar.php">Daftar</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
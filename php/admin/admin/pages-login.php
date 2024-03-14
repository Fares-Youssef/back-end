<?php


//app 
include "../app/conn.php";
include "../app/function.php";

// shared
include '../shared/head.php';



//login code
if(isset($_POST["send"])){
    $name = $_POST["username"];
    $password = $_POST["password"];
    $select = "SELECT * FROM admins WHERE username = '$name' and password = '$password'";
    $s = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($s);
    $numRow = mysqli_num_rows($s);
    if($numRow == 1 ){
        $_SESSION["id"] = $data["id"];
        $_SESSION["userName"] = $name;
        $_SESSION["name"] = $data["name"];
        $_SESSION["image"] = $data["image"];
        $_SESSION["rule"] = $data["rule"];
        path("index.php");
    }else{
        path("admin/pages-login.php");
    }
}

?>
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>
                                <form class="row g-3 needs-validation" novalidate method="post">
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="username" class="form-control" id="yourUsername"
                                                required>
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                            required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-12">
                                        <button name="send" class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->


<?php
include '../shared/footer.php';
include '../shared/script.php';
?>
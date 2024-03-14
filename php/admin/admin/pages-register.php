<?php
//app 
include "../app/conn.php";
include "../app/function.php";

// shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
session();
auth();


$name = "";
$email = "";
$username = "";
$password = "";
// select updated data
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $selectRowEdit = "SELECT * FROM `admins` WHERE id = $id";
    $ss = mysqli_query($conn, $selectRowEdit);
    $edit = mysqli_fetch_assoc($ss);
    $name = $edit["name"];
    $email = $edit["email"];
    $username = $edit["username"];
    $password = $edit["password"];
    // save updated data
    if (isset($_POST["edit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $update = "UPDATE admins SET name = '$name', email = '$email' , username = '$username', password = '$password' WHERE id = $id ";
        mysqli_query($conn, $update);
        path("admin/list.php");
    }
}

// save data in db
if(isset($_POST["name"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $rule = $_POST["rule"];
  $insert = "INSERT INTO admins VALUES(null ,'$name', '$email', '$username', '$password', default, $rule )";
    mysqli_query($conn, $insert);
    path("admin/pages-register.php");
}


?>


<main id="main" class="main">
    <div class="container">

        <section class="section register  d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter personal details to create account</p>
                                </div>

                                <form method="post" class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Your Name</label>
                                        <input type="text" name="name" class="form-control" id="yourName" required
                                            value="<?= $name ?>">
                                        <div class="invalid-feedback">Please, enter your name!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required
                                            value="<?= $email ?>">
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="username" class="form-control" id="yourUsername"
                                                required value="<?= $username ?>">
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                            required value="<?= $password ?>">
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Department</label>
                                        <select name="rule" class="form-control">
                                            <option value="1">super admin</option>
                                            <option value="2">department & employees</option>
                                            <option value="3">employees only</option>
                                        </select>
                                    </div>
                                    <?php if(isset($_GET["id"])): ?>
                                    <div class="col-12">
                                        <button name="edit" class="btn btn-warning w-100" type="submit">update
                                            Account</button>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>
                                    <?php endif; ?>
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
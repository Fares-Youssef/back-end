<?php
//app 
include "../app/conn.php";
include "../app/function.php";

// shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';

session();
auth(2);

$name = "";
// save data in db
if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $insert = "INSERT INTO departments VALUES(null , '" . $name . "')";
    mysqli_query($conn, $insert);
    path("department/add.php");
}
// select updated data
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $selectRowEdit = "SELECT * FROM departments WHERE id = $id";
    $ss = mysqli_query($conn, $selectRowEdit);
    $edit = mysqli_fetch_assoc($ss);
    $name = $edit["name"];
    if (isset($_POST["edit"])) {
        $name = $_POST["name"];
        $update = "UPDATE departments SET name = '$name' WHERE id = $id ";
        mysqli_query($conn, $update);
        path("department/list.php");
    }
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
                                    <h5 class="card-title text-center pb-0 fs-4">Create Department</h5>
                                    <p class="text-center small">Enter Department details to create</p>
                                </div>

                                <form method="post" class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Department Name</label>
                                        <input type="text" name="name" class="form-control" id="yourName" required
                                            value="<?= $name ?>">
                                        <div class="invalid-feedback">Please, enter your name!</div>
                                    </div>

                                    <?php if(isset($_GET["id"])): ?>
                                    <div class="col-12">
                                        <button name="edit" class="btn btn-warning w-100" type="submit">update
                                            Account</button>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-12">
                                        <button name="send" class="btn btn-primary w-100" type="submit">Create Account</button>
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
include '../shared/script.php';
?>
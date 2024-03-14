<?php
//app 
include "../app/conn.php";
include "../app/function.php";

// shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
session();
auth(2,3);

$name = "";
$email = "";
$salary = "";
$department = "";
$departmentId = "";

//select data from department
$select = "SELECT * FROM departments";
$s = mysqli_query($conn, $select);


// select updated data
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $selectRowEdit = "SELECT * FROM employeesjoindepartment WHERE empID = $id";
    $ss = mysqli_query($conn, $selectRowEdit);
    $edit = mysqli_fetch_assoc($ss);
    $name = $edit["empName"];
    $email = $edit["email"];
    $salary = $edit["salary"];
    $department = $edit["depName"];
    $departmentId = $edit["depID"];
    // save new data
    if (isset($_POST["edit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $salary = $_POST["salary"];
        $department = $_POST["department"];
        $update = "UPDATE employees SET name = '$name', email = '$email', departmentId = $department, salary = $salary WHERE id = $id ";
        mysqli_query($conn, $update);
        path("employees/list.php");
    }
}


//save employees data in db
if (isset($_POST["send"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $salary = $_POST["salary"];
    $department = $_POST["department"];
    //quary code
    $save = "INSERT INTO employees VALUES (null,'$name', '$email', '$salary', '$department')";
    mysqli_query($conn, $save);
    path("employees/add.php");
}
// select updated data
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $selectRowEdit = "SELECT * FROM employeesjoindepartment WHERE empID = $id";
    $ss = mysqli_query($conn, $selectRowEdit);
    $edit = mysqli_fetch_assoc($ss);
    $name = $edit["empName"];
    $salary = $edit["salary"];
    $department = $edit["depName"];
    $departmentId = $edit["depID"];
    // save new data
    if (isset($_POST["edit"])) {
        $name = $_POST["name"];
        $salary = $_POST["salary"];
        $department = $_POST["department"];
        $update = "UPDATE employees SET name = '$name', salary = $salary, departmentId = $department, WHERE id = $id ";
        mysqli_query($conn, $update);
        path("employees/list.php");
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
                                    <h5 class="card-title text-center pb-0 fs-4">Add Employee</h5>
                                    <p class="text-center small">Enter personal details to Add Employee</p>
                                </div>

                                <form method="post" class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label"> Name</label>
                                        <input type="text" name="name" class="form-control" id="yourName" required
                                            value="<?= $name ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label"> Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required
                                            value="<?= $email ?>">
                                    </div>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">salary</label>
                                        <input type="number" name="salary" class="form-control" id="yourUsername"
                                            required value="<?= $salary ?>">
                                        <!-- <div class="invalid-feedback">Please choose a username.</div> -->
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Department</label>
                                        <select name="department" class="form-control">
                                            <?php if (isset($_GET["id"])): ?>
                                            <option selected value="<?= $departmentId?>"><?=$department?></option>
                                            <?php else: ?>
                                            <option selected disabled>department...</option>
                                            <?php endif;?>
                                            <?php foreach ($s as $data): ?>
                                            <option value="<?=$data["id"]?>"><?=$data["name"]?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <?php if(isset($_GET["id"])): ?>
                                    <div class="col-12">
                                        <button name="edit" class="btn btn-warning w-100" type="submit">update
                                            Account</button>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-12">
                                        <button name="send" class="btn btn-primary w-100" type="submit">Create</button>
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
<?php

//app 
include "../app/conn.php";
include "../app/function.php";


include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
session();
auth(2,3);




// delete row
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $deleteRow = "DELETE FROM `employees` WHERE id = $id";
    $d = mysqli_query($conn, $deleteRow);
    path("employees/list.php");
}


//select data from department
$select = "SELECT * FROM `employeesjoindepartment`";
$s = mysqli_query($conn, $select);


?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>List Employees</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">List Employees</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>department</th>
                            <th>salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($s as $data): ?>
                        <tr>
                            <td><?= $data["empID"]?></td>
                            <td><?= $data["empName"]?></td>
                            <td><?= $data["email"]?></td>
                            <td><?= $data["depName"]?></td>
                            <td><?= $data["salary"]?></td>
                            <td>
                                <a href="http://localhost/admin/employees/Add.php?id=<?=$data["empID"]?>" class="settings"
                                    title="edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a onclick="return confirm('are you sure!')"
                                    href="http://localhost/admin/employees/list.php?id=<?=$data["empID"]?>" class="delete"
                                    title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
<?php  
include '../shared/script.php';
?>
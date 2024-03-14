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

// delete row 
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $deleteRow = "DELETE FROM `admins` WHERE id = $id";
    $d = mysqli_query($conn, $deleteRow);
    path("admin/list.php");
}

//select data from db
$select = "SELECT * FROM admins";
$s = mysqli_query($conn , $select);

?>



<main id="main" class="main">

    <div class="pagetitle">
        <h1>Admin List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
                <li class="breadcrumb-item active">admin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                </div>
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach($s as $data): ?>
                        <tr>
                            <td> <?= $data["id"] ?></td>
                            <td><a href="/admin/admin/upload/<?= $data["image"] ?>"><img width="50" src="/admin/admin/upload/<?= $data["image"] ?>" class="avatar" alt="Avatar"></a></td>
                            <td><?= $data["name"] ?></td>
                            <td><?= $data["email"] ?></td>
                            <td><?= $data["username"] ?></td>
                            <td><?= $data["password"] ?></td>
                            <td>
                                <a href="http://localhost/admin/admin/pages-register.php?id=<?=$data["id"]?>" class="settings"
                                    title="edit" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a onclick="return confirm('are you sure!')"
                                    href="http://localhost/admin/admin/list.php?id=<?=$data["id"]?>" class="delete"
                                    title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main><!-- End #main -->



<?php  
include '../shared/script.php';
?>
<?php 

//app
include "../app/conn.php";
include "../app/function.php";

// shared
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
$imageName="";
$tmpName = "";
// delete row 
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $deleteRow = "UPDATE admins SET image = '' WHERE id = $id";
    $d = mysqli_query($conn, $deleteRow);
    path("admin/users-profile.php");
}
//save new image
if (isset($_POST["send"])) { 
    $id =  $_SESSION["id"];      
    // //upload image
    $imageName = rand(0, 1000) . rand(0, 1000) . $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $location = "upload/" . $imageName;
    move_uploaded_file($tmpName, $location);
    //quary code
    $save = "UPDATE admins set image = '$imageName' where id = $id";
    mysqli_query($conn, $save);
}

//select data from db
$id = $_SESSION["id"];
$select = "SELECT * FROM adminalldata where id = $id";
$s = mysqli_query($conn , $select);
$data = mysqli_fetch_assoc($s);

//change password 
if(isset($_POST["pass"])){
  $oldPass = $_POST["password"];
  $newPass = $_POST["newpassword"];
  if($oldPass == $data["password"]){
    $uploadNewPass = "UPDATE admins set password = '$newPass' where id = $id";
    mysqli_query($conn, $uploadNewPass);
  path("admin/users-profile.php");
  }
}
//change profile data 
if(isset($_POST["editPro"])){
  $name = $_POST["name"];
  $company = $_POST["company"];
  $country = $_POST["country"];
  $address = $_POST["address"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $uploadNewdata = "UPDATE admins set name = '$name', company = '$company', country = '$country', address = '$address', phone = '$phone', email = '$email'  where id = $id";
  mysqli_query($conn, $uploadNewdata);
  path("admin/users-profile.php");
}

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/index.php">Home </a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <!-- left card -->
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="/admin/admin/upload/<?= $data["image"];?>" alt="Profile" class="rounded-circle">
                        <h2><?= $data["username"];?></h2>
                        <h3><?=  $data["ruleName"];?></h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- right card -->
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>


                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?= $data["name"];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Company</div>
                                    <div class="col-lg-9 col-md-8"><?= $data["Company"];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8"><?= $data["Country"];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Address</div>
                                    <div class="col-lg-9 col-md-8"><?= $data["Address"];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?= $data["Phone"];?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $data["email"];?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="post">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="/admin/admin/upload/<?= $data["image"];?>" alt="Profile">
                                            <div class="pt-2">

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    uplaod
                                                </button>
                                                <a href="http://localhost/admin/admin/users-profile.php?id=<?=$data["id"]?>"
                                                    onclick="return confirm('are you sure!')"
                                                    class="btn btn-danger btn-sm"
                                                    title="Remove my profile image">delete<i
                                                        class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="fullName"
                                                value="<?= $data["name"];?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company"
                                                value="<?= $data["Company"];?>">
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country"
                                                value="<?= $data["Country"];?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address"
                                                value="<?= $data["Address"];?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone"
                                                value="<?= $data["Phone"];?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email"
                                                value="<?= $data["email"];?>">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button name="editPro" type="submit" class="btn btn-primary">Save
                                            Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>


                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="post">

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button name="pass" type="submit" class="btn btn-primary">Change
                                            Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">
                                new image</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="image" type="file" class="form-control" id="currentPassword">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button name="send" type="supmit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main><!-- End #main -->



<?php
include '../shared/footer.php';
include '../shared/script.php';
?>
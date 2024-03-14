<?php
include "../app/function.php";
session_start();
session_unset();
session_destroy();
path("admin/pages-login.php");
?>
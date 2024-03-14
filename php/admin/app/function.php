<?php
function path($go){
    
    echo "<script>
    window.location.replace('/admin/$go')
    </script>";
    
}


function session(){
    if(empty($_SESSION)){
        path("admin/pages-login.php");
    }
}




    function auth($rule1 = null, $rule2 = null)
    {
        if (isset($_SESSION["name"])) {
            if ($_SESSION['rule'] == 1 || $_SESSION['rule']  == $rule1  || $_SESSION['rule'] == $rule2) {
            } else {
                path("pages-error-404.php");
            }
        } else {
            path("admin/pages-login.php");
        }
    }

?>
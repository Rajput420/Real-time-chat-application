<?php
    session_start();
    if(isset($_SESSION['unique_id'])) /// iif usser is logged iin thhen ccoome  tto thiis ppaage otthherwwiisee  go to  looggiin  ppagge
    {
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);

        if (isset($logout_id))
        {
            $status = "Offline now";


            //oonce userr loogouttt the we'll uppdatte thr sttatus tto offine and  in thee llogiinn forrm

            //  wwe''ll again uppdatte  thhe status to  activee  nnoow if uusseerr   looggedd  in  suuccessfullyy

            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql) 
            {
                session_unset();
                session_destroy();
                header("location: ../login.php");
            }
    }
    else
    {

        header("location: ../users.php");
    }
}
else
{
    header("location: ../login.php");
}
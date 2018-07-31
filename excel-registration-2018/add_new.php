<?php
/**
 * Created by PhpStorm.
 * User: Mohosin
 * Date: 3/16/2018
 * Time: 7:54 PM
 */

include_once 'dbconfig.php';

if(isset($_POST['btn-save']))
{
    // die();
    // variables for input data
    $first_name = $_POST['firstName'];
    $uni_id =$_POST['ID'];
    $phone = $_POST['phone'];
    $day1 = $_POST['day1'];
    $day2 = $_POST['day2'];
    $time = date("Y-m-d H:i:s");
    // variables for input data

    // sql query for inserting data into database
    $sql_query = "INSERT INTO tbl_participants(p_name,uni_id, phone,day1,day2,update_time) VALUES('$first_name','$uni_id','$phone','$day1','$day2','$time')";


    $update_query = "UPDATE tbl_seat SET sold = sold+1 WHERE slot='$day1'";
    mysqli_query($con,$update_query);
    $update_query = "UPDATE tbl_seat SET sold = sold+1 WHERE slot='$day2'";
    mysqli_query($con,$update_query);
    // sql query for inserting data into database

// sql query execution function
    if(mysqli_query($con, $sql_query))
    {
        ?>
        <script type="text/javascript">
            alert('Your registration has been successfully completed');
            //    window.location.href='index.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert('Error occured while inserting your data');
        </script>
        <?php
    }
    // sql query execution function
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>East West University Business Club Basic Excel 2018</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-1.12.4.js"></script>
</head>
<body>

        <div class="body_logo">
            <img src="assets/logo.png" height="300px" alt="">
            <img class="logo_image" src="assets/excel.jpg" height="265px" alt="">
        </div>
        <div class="body_login">
            <div class="header" ><h1 class="header_h1">Registration form</h1></div>
            <div class="container-fluid login">
                <form action="" method="post" onsubmit="return confirm('Are you sure?');" class="register-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="firstName">Name</label>
                            <input name="firstName" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="ID">ID</label>
                            <input name="ID" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="phone">Phone</label>
                            <input name="phone" class="form-control" type="number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="day1">Select slot for Day 1</label>
                                <select class="form-control" name="day1" id="day1">
                                    <?php
                                    $result = mysqli_query($con,"SELECT * FROM tbl_seat WHERE sday='day1'");
                                    $storeArray = Array();
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $storeArray[] =  $row;
                                    }
                                    foreach ($storeArray as $slot){
                                        if($slot['seat'] > $slot['sold']){
                                            echo '<option value="'.$slot['slot'].'">'.$slot['slot'].'</option>';
                                        }

                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="day2">Select slot for Day 2</label>
                                <select class="form-control" name="day2" id="day2">
                                    <?php
                                    $result = mysqli_query($con,"SELECT * FROM tbl_seat WHERE sday='day2'");
                                    $storeArray = Array();
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $storeArray[] =  $row;
                                    }
                                    foreach ($storeArray as $slot){
                                        if($slot['seat'] > $slot['sold']){
                                            echo '<option value="'.$slot['slot'].'">'.$slot['slot'].'</option>';
                                        }

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                            <input type="submit" name="btn-save" value="Register" class="btn btn-default btn-lg regbutton" />

                        </div>

                    </div>
                </form>
            </div>
        </div>

            <script type="text/javascript">
               /* function idleLogout() {
                    var t;
                    window.onload = resetTimer;
                    window.onmousemove = resetTimer;
                    window.onmousedown = resetTimer; // catches touchscreen presses
                    window.onclick = resetTimer;     // catches touchpad clicks
                    window.onscroll = resetTimer;    // catches scrolling with arrow keys
                    window.onkeypress = resetTimer;

                    function logout() {
                        window.location.href = 'add_new.php';
                       // alert('redirect');
                    }

                    function resetTimer() {
                        clearTimeout(t);
                        t = setTimeout(logout, 30000);  // time is in milliseconds
                    }
                }
                idleLogout();*/
        </script>

</body>
</html>
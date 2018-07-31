<?php
include_once 'dbconfig.php';

if(isset($_POST['btn-save']))
{
    // die();
    // variables for input data
    $first_name = $_POST['first_name'];
    $uni_id =$_POST['uni_id'];
    $phone = $_POST['phone'];
    $day1 = $_POST['day1'];
    $day2 = $_POST['day2'];
    $time = date("Y-m-d H:i:s");
    // variables for input data

    // sql query for inserting data into database
    $sql_query = "INSERT INTO tbl_participants(p_name,uni_id, phone,day1,day2,update_time) VALUES('$first_name','$uni_id','$phone','$company','$status','$time')";


    $update_query = "UPDATE tbl_company SET seats_filled = seats_filled+1 WHERE c_name='$company'";
    mysqli_query($con,$update_query);
    // sql query for inserting data into database

// sql query execution function
    if(mysqli_query($con, $sql_query))
    {
        ?>
        <script type="text/javascript">
            alert('Data Are Inserted Successfully ');
        //    window.location.href='index.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert('error occured while inserting your data');
        </script>
        <?php
    }
    // sql query execution function
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>East west university business club</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

    <div id="header">
        <div id="content"  class="">
           <!--<img class="title_image" src="assets/Career-Clinic-2018.png" alt="">-->
            <label class="header_lebel">Basic Excel Training Workshop 2018</label>
        </div>
    </div>
    <div id="body"  class="container">
        <div id="content">
            <form method="post" onsubmit="return confirm('Are you sure you want to submit the form?');" action="add.php" style="margin-top: -42px">
                <table align="center">
                    <tr>
<!--                        <td align="center"><a href="index.php">Homepage</a></td>-->
                    </tr>
                    <tr>
                        <td><input type="text" name="first_name" placeholder="Name" required /></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="uni_id" placeholder="University ID" required  /></td>
                    </tr>

                    <tr>
                        <td><input type="number" name="phone" placeholder="Contact number" required /></td>
                    </tr>
                    <tr>
                        <td>

                            <div class="form-group">
                                <label for="day1">Select slot for Day 1</label>
                                <select class="form-control" name="day1" id="day1">
                                    <option value="a1">A1 (10.10-11.40)</option>
                                    <option value="a2">A2 (11.50-1.20)</option>
                                    <option value="a3">A3 (3.00-4.30)</option>
                                    <option value="a4">A4 (4.40-6.10)</option>
                                </select>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="day1">Select slot for Day 1</label>
                                <select class="form-control" name="day1" id="day1">
                                    <option value="b1">B1 (10.10-11.40)</option>
                                    <option value="b2">B2 (11.50-1.20)</option>
                                    <option value="b3">B3 (3.00-4.30)</option>
                                    <option value="b4">B4 (4.40-6.10)</option>
                                </select>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</center>
<br>
<br>
<br>
<br>
<br>
<footer  class="container">
    <p align="right"><font size="2" color="#00A2D1" align="right"><?php echo base64_decode('RGV2ZWxvcGVkIGJ5IDogU2hhbWVtIEFobWFk')?></font></p>
    <p align="right"><font size="2" color="#00A2D1" align="right">East West University Business Club</font></p>
</footer>
</body>
</html>
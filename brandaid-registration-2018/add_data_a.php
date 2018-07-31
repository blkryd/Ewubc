<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{

    // die();
    // variables for input data
    $first_name = $_POST['first_name'];
    $uni_id =$_POST['uni_id'];
    $phone = $_POST['phone'];
    $team_name = $_POST['team_name'];
    $email = $_POST['email'];
    $ref = $_POST['ref'];
    $company = $_POST['company'];
    $time = date("Y-m-d H:i:s");
    // variables for input data

    // sql query for inserting data into database
    $sql_query = "INSERT INTO tbl_participants(p_name,uni_id, phone,team_email,team_name,ref,update_time) VALUES('$first_name','$uni_id','$phone','$email','$team_name','$ref','$time')";

    // sql query for inserting data into database

// sql query execution function
    if(mysqli_query($con, $sql_query)) {?>
        <script type="text/javascript">
            alert('Data Are Inserted Successfully ');
            window.location.href='index.php';
        </script>
        <?php } else{?>
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
    <title>Brand Aid 2018</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="style.css" type="text/css" />
    <!-- Favicons
=================================================== -->
    <link rel="shortcut icon" href="favicon.png" >
</head>
<body>
<center>

    <div id="header">
        <div id="content"  class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img class="title_image" src="assets/logo.png" alt="">
                </div>
                <div class="col-sm-6">
                    <label for="" class="header_lebel">An Intra EWU Business</label><br>
                    <label for="" class="header_lebel">Strategy Competition</label>
                </div>
            </div>
        </div>
    </div>
    <div id="body"  class="container">
        <div id="content">
            <form method="post" onsubmit="return confirm('Are you sure you want to submit the form?');" action="add_data_a.php" style="margin-top: -14px">
                <table align="center">
                    <tr>
<!--                        <td align="center"><a href="index.php">Homepage</a></td>-->
                    </tr>
                    <tr>
                        <td><input type="text" name="first_name" placeholder="Name"  /></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="team_name" placeholder="Team name"  /></td>
                    </tr>
                    <tr>
                        <td><input type="number" name="phone" placeholder="Contact number"  /></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" placeholder="Email"  /></td>
                    </tr>

                    <tr>
                        <td><input type="text" name="uni_id" placeholder="University ID"  /></td>
                    </tr>
                    <tr>
                        <td><label for="ref">Reference</label><br><textarea name="ref" id="Reference" cols="60" rows="5" required></textarea></td>
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
    <p align="right"><font size="2" color="#00A2D1" style="color: #2e2e2e;font-family: fantasy" align="right"><?php echo 'Developed by : Shamem Ahmad'?></font></p>
    <p align="right"><font size="2" color="#00A2D1" style="color: #2e2e2e;font-family: fantasy" align="right">East West University Business Club</font></p>
</footer>
</body>
</html>
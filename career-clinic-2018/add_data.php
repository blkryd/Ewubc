<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{

    // die();
    // variables for input data
    $first_name = $_POST['first_name'];
    $uni_id =$_POST['uni_id'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $time = date("Y-m-d H:i:s");
    $status = 'Pending';
    // variables for input data

    // sql query for inserting data into database
    $sql_query = "INSERT INTO tbl_participants(p_name,uni_id, phone,company,status,update_time) VALUES('$first_name','$uni_id','$phone','$company','$status','$time')";


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
            <img class="title_image" src="assets/Career-Clinic-2018.png" alt="">
            <label class="header_lebel">Career Clinic 2018</label>
        </div>
    </div>
    <div id="body"  class="container">
        <div id="content">
            <form method="post" onsubmit="return confirm('Are you sure you want to submit the form?');" action="add_data.php" style="margin-top: -42px">
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
                                <label for="company">Select company</label>
                                <select name="company"  class="form-control edit" id="company">
                                    <?php
                                    $result = mysqli_query($con,"SELECT c_name FROM tbl_company");
                                    $storeArray = Array();
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $storeArray[] =  $row['c_name'];
                                    }
                                    foreach ($storeArray as $name){
                                      echo '<option value="'.$name.'">'.$name.'</option>';
                                    }
                                    ?>
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
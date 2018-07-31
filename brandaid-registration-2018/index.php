<?php
include_once 'dbconfig.php';
if(isset($_GET['delete']))
{
	$sql_query="DELETE FROM tbl_participants WHERE uni_id=".$_GET['delete'];
	mysqli_query($con,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}

if(isset($_GET['verify_payment']))
{
	$sql_query="UPDATE tbl_participants SET payment_status='Verified' WHERE id=".$_GET['verify_payment'];
	mysqli_query($con,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}

if(isset($_GET['cancel_payment']))
{
	$sql_query="UPDATE tbl_participants SET payment_status='none' WHERE id=".$_GET['cancel_payment'];
	mysqli_query($con,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}
if(isset($_GET['verify_submission']))
{
	$sql_query="UPDATE tbl_participants SET form_status='Verified' WHERE id=".$_GET['verify_submission'];
	mysqli_query($con,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}

if(isset($_GET['cancel_submission']))
{
	$sql_query="UPDATE tbl_participants SET form_status='none' WHERE id=".$_GET['cancel_submission'];
	mysqli_query($con,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}

if(isset($_GET['verify_both']))
{
	$sql_query="UPDATE tbl_participants SET form_status='Verified', payment_status='Verified' WHERE id=".$_GET['verify_both'];
	mysqli_query($con,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}
if(isset($_REQUEST['export'])){
    $query = "SELECT * FROM tbl_participants";
    $result = mysqli_query($con,$query);
    $user_arr = array();
    $serial =0;
    while($row = mysqli_fetch_array($result)) {
        $db_id = $row['id'];
        $id = $row['uni_id'];
        $fname = $row['p_name'];
        $email = $row['team_email'];
        $phone = $row['phone'];
        $payment_status = $row['payment_status'];
        $form_status = $row['form_status'];
        $team_name = $row['team_name'];
        $time = $row['update_time'];
        $serial++;
        $user_arr[] = array($serial,$db_id,$team_name,$phone,$email,$fname, $id,$payment_status,$form_status,$time);
    }
    $serailze_user_arr = base64_encode(serialize($user_arr));
    date_default_timezone_set('Asia/Dhaka');
    $name =  date("Y-m-d H");
    download($serailze_user_arr,$name.'.csv');
    unlink(dirname(__FILE__).$name);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--    <meta http-equiv="refresh" content="20">-->
<title>Brand Aid 2018</title>
    <link rel="canonical" href="www.brandaidofficial.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="brandaid,ewubc,ewu,business club,brand aid official" >
    <meta name="description" content="Brand Aid, an intra EWU business strategy competition designed by East West University Business Club, will help students construct and assemble their ideas while making a strategy. It is fashioned in such a way so that students can be perceptive of their own aptitude.">
    <!--FACEBOOK-->
    <meta property="og:title" content="Brand Aid 2018 || East West University Business Club Presents" >
    <meta property="og:site_name" content="Brand Aid Officcial">
    <meta property="og:url" content="www.brandaidofficial.com" >
    <meta property="og:description" content="Brand Aid, an intra EWU business strategy competition designed by East West University Business Club, will help students construct and assemble their ideas while making a strategy. It is fashioned in such a way so that students can be perceptive of their own aptitude." >

    <link href="assets/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="style.css" type="text/css" />
    <!-- Favicons
=================================================== -->
    <link rel="shortcut icon" href="favicon.png" >
</head>
<body class="container">
    <div class="row">

                    <div class="col-sm-6">
                        <img class="title_image" src="assets/logo.png" alt="">
                    </div>
                    <div class="col-sm-6">
                        <label for="" class="header_lebel">An Intra EWU Business</label><br>
                        <label for="" class="header_lebel">Strategy Competition</label>
                    </div>

            <div class="container">
                <div class="row menu">
                    <ul >
                        <li><a href="add_data_a.php" class="btn btn-warning float-left">New registration (admin)</a></li>
                        <li><a href="add_data.php" class="btn btn-warning float-left">New registration</a></li>
                        <li><a href="?export" class="btn btn-warning float-left">Export</a></li>
                    </ul>
                </div>
            </div>

            <div id="content" class="container">
                    <table align="center" id="reg" class="table table-bordered nowrap">
                        <thead>
                            <tr>
                                <th class="table_td" >Form: </th>
                                <th class="table_td" >Team name</th>
                                <th class="table_td" >Phone</th>
                                <th class="table_td" >Email</th>
                                <th>Form status</th>
                                <th>Ref</th>
                                <th class="text-center">Operations</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $sql_query="SELECT * FROM tbl_participants WHERE form_status='Verified'";
                        $result_set=mysqli_query($con,$sql_query);
                        if(mysqli_num_rows($result_set)>0)
                        {
                            $coun = 1 ;
                            while($row=mysqli_fetch_row($result_set))

                            {
                                ?>
                                <tr>
                                    <td class="table_td"><?php echo $row[0]; ?></td>
                                    <td class="table_td" ><?php echo strtoupper($row[5]); ?></td>
                                    <td class="table_td" ><?php echo $row[3]; ?></td>
                                    <td><?php echo $row[4]; ?></td>
                                    <td><?php echo $row[8]; ?></td>
                                    <td><?php echo $row[6]; ?></td>

                                    <td align="center">
                                       <?php

                                       if ($row[7] == 'none'){
                                           echo '<a class="btn btn-success btn-custom" href="javascript:verify_payment('.$row[0].')">Verify Payment</a>';
                                       }else{
                                           echo '<a class="btn btn-danger btn-custom" href="javascript:cancel_payment('.$row[0].')">Cancel Payment</a>';
                                       }

                                       if ($row[8] == 'none'){
                                           echo '<a class="btn btn-success btn-custom" href="javascript:verify_submission('.$row[0].')">Verify Submission</a>';
                                       }else{
                                           echo '<a class="btn btn-danger btn-custom" href="javascript:cancel_submission('.$row[0].')">Cancel Submission</a>';
                                       }

                                       if ($row[7] == 'none' && $row[8] == 'none'){
                                           echo '<a class="btn btn-warning-custom " href="javascript:verify_both('.$row[0].')">Verify Both</a>';
                                       }
                                       ?>

                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="8">No Data Found !</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
            </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<footer>
    <p align="right"><font size="2" color="#00A2D1" style="color: #2e2e2e;font-family: fantasy" align="right"><?php echo 'Developed by : Shamem Ahmad'?></font></p>
    <p align="right"><font size="2" color="#00A2D1" style="color: #2e2e2e;font-family: fantasy" align="right">East West University Business Club</font></p>
</footer>
<script type="text/javascript"  src="assets/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"> </script>
<script type="text/javascript">
    function edt_id(id)
    {
        if(confirm('Sure to edit ?'))
        {
            window.location.href='edit_data.php?edit_id='+id;
        }
    }
    function delete_id(id,company)
    {
        if(confirm('Sure to Delete ?'))
        {
            window.location.href="index.php?delete_id="+id+"&amp;c="+company;
        }
    }
    function verify_payment(id)
    {
        if(confirm('Sure to Verify?'))
        {
            window.location.href='index.php?verify_payment='+id;
        }
    }
    function cancel_payment(id)
    {
        if(confirm('Sure to cancel?'))
        {
            window.location.href='index.php?cancel_payment='+id;
        }
    }
    function verify_submission(id)
    {
        if(confirm('Sure to submission?'))
        {
            window.location.href='index.php?verify_submission='+id;
        }
    }
    function cancel_submission(id)
    {
        if(confirm('Sure to cancel?'))
        {
            window.location.href='index.php?cancel_submission='+id;
        }
    }
    function verify_both(id)
    {
        if(confirm('Sure to verify both?'))
        {
            window.location.href='index.php?verify_both='+id;
        }
    }
</script>
<script type="application/javascript">
    $(document).ready(function() {
        $('#reg').DataTable({
                "paging": true,
                "lengthChange": false

            }
        );

    } );
</script>
</body>
</html>

<?php
function download($data,$name){
    date_default_timezone_set('Asia/Dhaka');
    $filename = $name;
    $export_data = unserialize(base64_decode($data));
    $file = fopen($filename,"w");
    foreach ($export_data as $line){
        fputcsv($file,$line);
    }
    fclose($file);
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename");
    header("Content-Type: application/csv; ");
    header("Cache-Control: no-store, no-cache");
    readfile($filename);
    unlink(basename($filename));
    exit();

}
?>
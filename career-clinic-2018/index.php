<?php
include_once 'dbconfig.php';
if(isset($_GET['delete_id']))
{
    $company = $_GET['c'];
	$sql_query="DELETE FROM tbl_participants WHERE id=".$_GET['delete_id'];
	mysqli_query($con,$sql_query);
    $update_query = "UPDATE tbl_company SET seats_filled = seats_filled-1 WHERE c_name='$company'";
    mysqli_query($con,$update_query);
	header("Location: $_SERVER[PHP_SELF]");
}
if(isset($_GET['verify_id']))
{
	$sql_query="UPDATE tbl_participants SET status='Verified' WHERE id=".$_GET['verify_id'];
	mysqli_query($con,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}
if(isset($_GET['disprove_id']))
{
	$sql_query="UPDATE tbl_participants SET status='Pending' WHERE id=".$_GET['disprove_id'];
	mysqli_query($con,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}
if(isset($_REQUEST['export'])){
    $query = "SELECT * FROM tbl_participants";
    $result = mysqli_query($con,$query);
    $user_arr = array();
    $serial =0;
    while($row = mysqli_fetch_array($result)) {
        $id = $row['uni_id'];
        $fname = $row['p_name'];
        $email = $row['email'];
        $number = $row['phone'];
        $ref = $row['ref'];
        $company = $row['company'];
        $status = $row['status'];
        $time = $row['update_time'];
        $serial++;
        $user_arr[] = array($serial,$fname, $id,  $email,$number,$ref,$company,$time,$status);
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
<title>East west university business club</title>
 <link href="assets/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript"  src="assets/js/jquery-1.12.4.js">
    </script>
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
function verify_id(id)
{
	if(confirm('Sure to Verify?'))
	{
		window.location.href='index.php?verify_id='+id;
	}
}
function disprove_id(id)
{
	if(confirm('Sure to disprove?'))
	{
		window.location.href='index.php?disprove_id='+id;
	}
}
</script>
</head>
<body class="container">
    <div class="row">
            <div id="header" class="container">
                <div id="content">
                    <img class="title_image" src="assets/Career-Clinic-2018.png" alt="">
                    <label class="header_lebel">Career Clinic 2018</label>
                </div>
            </div>

            <div id="body" class="container">
                <table id="main_reg" class="container">
                    <tr>
                        <th colspan="6" width="10px">
                            <a href="add_data_a.php" class="btn btn-warning btn-lg btn-block reg_button">Registration (admin)</a>
                            <a href="add_data.php" class="btn btn-success btn-lg reg_button reg_button_new">New registration</a>
                        </th>
                        <th colspan="1"><a href="status.php" class="btn btn-success btn-lg btn-block">Check seat status</a></th>
                        <th colspan="1"><a href="<?php echo $_SERVER[PHP_SELF];?>?export" class="btn btn-success btn-lg btn-block">Export</a></th>
                    </tr>
                </table>

            </div>

            <div id="content" class="container">
                    <table align="center" id="reg" class="table table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>SL: </th>
                                <th>Name</th>
                                <th>ID</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Form status</th>
                                <th>Ref</th>
                                <th>Operations</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $sql_query="SELECT * FROM tbl_participants ORDER BY id DESC";
                        $result_set=mysqli_query($con,$sql_query);
                        if(mysqli_num_rows($result_set)>0)
                        {
                            $coun = 1 ;
                            while($row=mysqli_fetch_row($result_set))

                            {
                                ?>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                    <td><?php echo $row[2]; ?></td>
                                    <td><?php echo $row[3]; ?></td>
                                    <td><?php echo $row[5]; ?></td>
                                    <td><?php echo $row[6]; ?></td>
                                    <td><?php echo $row[4]; ?></td>

                                    <td align="center">
<!--                                        <a class="btn btn-primary" href="javascript:edt_id('--><?php //echo $row[0]; ?><!--')">Edit</a>-->
<!--                                        <a class="btn btn-danger" href="?delete_id=--><?php //echo $row[0].'&c='.$row['5']; ?><!--">Delete</a>-->
                                        <a class="btn btn-danger" href="javascript:delete_id('<?php echo $row[0].'\',\''.$row['5']; ?>')">Delete</a>
                                       <?php
                                       $status="SELECT status FROM tbl_participants WHERE id=".$row[0];
                                       $result_set1 =mysqli_query($con,$status);
                                       if(mysqli_num_rows($result_set1) >0 ){
                                           $status = mysqli_fetch_assoc($result_set1);
                                       }

                                    //   echo print_r($status[status],true);

                                       if ($status[status] == 'Pending'){
                                           echo '<a class="btn btn-success" href="javascript:verify_id('.$row[0].')">Verify</a>';
                                       } else{
                                           echo '<a class="btn btn-warning" href="javascript:disprove_id('.$row[0].')">Disprove</a>';
                                       }?>
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
    <p align="right"><font size="2" color="#00A2D1" align="right"><?php echo base64_decode('RGV2ZWxvcGVkIGJ5IDogU2hhbWVtIEFobWFk')?></font></p>
    <p align="right"><font size="2" color="#00A2D1" align="right">East West University Business Club</font></p>
</footer>

<script type="application/javascript">
    $(document).ready(function() {
        $('#reg').DataTable({
                "paging": true,
                "lengthChange":false,
                "order": [[ 0, 'desc' ]]
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
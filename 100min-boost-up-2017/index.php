<?php
include_once 'dbconfig.php';
if(isset($_GET['delete_id']))
{
	$sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
	mysqli_query($con,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}
if(isset($_REQUEST['export'])){
    $query = "SELECT * FROM users";
    $result = mysqli_query($con,$query);
    $user_arr = array();
    while($row = mysqli_fetch_array($result)) {
        $id = $row['uni_id'];
        $fname = $row['first_name'];
        $email = $row['email'];
        $number = $row['number'];
        $user_arr[] = array($fname, $id,  $email,$number);
        $serailze_user_arr = base64_encode(serialize($user_arr));
    }
    $name =  date("Y-m-d H:i");
    download($serailze_user_arr,$name.'.csv');
    unlink(dirname(__FILE__).$name);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>100 Minutes Boost Up Participants Registration</title>
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
function delete_id(id)
{
	if(confirm('Sure to Delete ?'))
	{
		window.location.href='index.php?delete_id='+id;
	}
}
</script>
</head>
<body class="container">
<center>

<div id="header" class="container">
	<div id="content">
    <label>100 minute Boost Up Participants Registration</label>
    </div>
</div>

<div id="body" class="container">
    <table id="main_reg" class="container">
        <tr>
            <th colspan="7"><a href="add_data.php" class="btn btn-success btn-lg btn-block">New registration</a></th>
            <th colspan="1"><a href="<?php echo $_SERVER[PHP_SELF];?>?export" class="btn btn-success btn-lg btn-block">Export</a></th>
        </tr>
    </table>
	<div id="content" class="container">
<table align="center" id="reg" class="table table-bordered nowrap">
      <thead>
          <tr>
              <th>SL: </th>
              <th>Name</th>
              <th>University ID</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Operations</th>
          </tr>
      </thead>
       <tbody>
            <?php
            $sql_query="SELECT * FROM users ORDER BY user_id DESC";
            $result_set=mysqli_query($con,$sql_query);
            if(mysqli_num_rows($result_set)>0)
            {
                $coun = 1 ;
                while($row=mysqli_fetch_row($result_set))

                {
                    ?>
                    <tr>
                        <td><?php echo $coun++; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[3]; ?></td>

                        <td align="center"><a class="btn btn-primary" href="javascript:edt_id('<?php echo $row[0]; ?>')">Edit</a> <a class="btn btn-danger" href="javascript:delete_id('<?php echo $row[0]; ?>')">Delete</a></td>


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

</center>
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
                "lengthChange":false
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
    readfile($filename);
    unlink(basename($filename));
    exit();

}
?>
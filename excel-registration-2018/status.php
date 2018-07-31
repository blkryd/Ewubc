<?php
include_once 'dbconfig.php';
function remaining($sold,$total){
    $remaining = ($total - $sold);
    if($remaining  <= 0){
       return $remaining.'" class="dial" style="background-color:red"';
    } else{
        return $remaining.'" class="dial"';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="5">
    <title>East west university business club</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css" type="text/css" />

    <script type="text/javascript"  src="assets/js/jquery-1.12.4.js"></script>
    <script type="text/javascript"  src="assets/js/jquery.knob.min.js"></script>
    <script type="text/javascript"  src="assets/js/jquery.dataTables.min.js"> </script>
</head>
<body>
<div class="container">
    <div class="col-sm-12"><a class="btn btn-primary" href="index.php">Homepage</a></div>
    <h1 class="status_h1">Live status of remaining seats</h1>
    <div class="row">

        <?php
        $result = mysqli_query($con,"SELECT * FROM tbl_seat");
        $storeArray = Array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $storeArray[] =  $row;
        }
        //echo print_r($storeArray,true);
        foreach ($storeArray as $name){
            echo '<div class="col-md-3"><p class="status_p">'.strtoupper($name['slot']).'</p><input type="text" readonly data-width="130" value="'.remaining($name['sold'],$name['seat']).'"></div>';
        }
        ?>

    </div>
</div>

<script>

</script>
</body>
</html>

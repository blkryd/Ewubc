<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 20-Jan-18
 * Time: 1:26 PM
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="20">
    <title>East west university business club</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript"  src="assets/js/jquery-1.12.4.js">
    </script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"> </script>
</head>
<body>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
        <table class="table table-striped custab">
            <thead>
            <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Parent ID</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tr>
                <td>1</td>
                <td>News</td>
                <td>News Cate</td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Products</td>
                <td>Main Products</td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Blogs</td>
                <td>Parent Blogs</td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>

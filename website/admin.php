<?php include "conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="#additem" data-toggle="modal" data-target="#additem">Add Item</a>
  <a href="#contact">Stock</a>
  <a href="#about">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="container-fluid">
<table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>price</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $stmt = $conn->query('SELECT * FROM sales');
    $stmt->execute();
    while($row = $stmt->fetch()){
    ?>
      <tr>
        <td><?php echo $row ['item']; ?></td>
        <td><?php echo $row ['quantity']; ?></td>
        <td>Ksh<?php echo $row ['price']; ?></td>
      </tr>  
      <?php }?>     
    </tbody>
</table>

<br>
<div class="modal fade" id="additem" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h3>Add New Item</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlInput1">Item Name</label>
                <input type="text" class="form-control" id="item" name="item" placeholder="Enter item name" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Category</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="item category" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Item Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="item description" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Item Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="price" required>
                <input type="file" name="pic">
            </div>
            <button type="submit" name="submit" class="btn btn-primary" value="additem"> Add</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>
<?php include "footer.php"; ?> 
<?php
include "conn.php";
$action = $_POST['submit'];


switch ($action) {
  case "additem":
    $item = $_POST['item'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $pic = $_FILES["pic"]["tmp_name"];
    $pic_name = $_FILES["pic"]["name"];
    $sql = $conn->query("INSERT INTO stock (item, category, description, price, pic) VALUES ('$item', '$category', '$description', '$price', '$pic_name')");
    move_uploaded_file($pic, __DIR__."/image/".basename($_FILES["pic"]["name"]));
    $conn = null;
    echo "
    <script>alert('Item has been successfully added')</script>
    <script>window.location = 'admin.php'</script>
    ";
    break;
  case "buy":
    $item = $_POST['item'];
    $item_id = $_POST['item_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $price = $price*$quantity;
    $sql = $conn->query("INSERT INTO sales (item, item_id, price, quantity) VALUES ('$item', '$item_id', '$price', '$quantity')");
    $conn = null;
    echo "
    <script>alert('Item has been successfully added')</script>
    <script>window.location = 'admin.php'</script>
    ";
    break;
  default:
    echo "invalid operation";
}

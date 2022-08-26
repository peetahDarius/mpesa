<?php include "header.php"; ?> 
<div class="container-fluid">
  <br>
  <?php
    $stmt = $conn->query('SELECT * FROM stock');
    $stmt->execute();
    while($row = $stmt->fetch()){
    ?>
    <form action="action.php" method="POST">
    <div class="card">
    <div class="card-body"text-align="center">
    <img class="card-img-bottom" src="./image/<?php echo $row ['pic'];?>" alt="Card image" style="width:100%">
      <h4 class="card-title"><b><?php echo $row ['item'];?></h4>
      <p class="card-text">Ksh :<?php echo $row ['price']; ?>/=</b>
      <br>
      <?php echo $row ['description'];?></p>
      <input type="number" name="quantity" placeholder="Enter quantity" required>
      <input type="hidden" name="item" value="<?php echo $row ['item']; ?>">
      <input type="hidden" name="item_id" value="<?php echo $row ['id']; ?>">
      <input type="hidden" name="price" value="<?php echo $row ['price']; ?>">
      <br>
      <button type="submit" name="submit" value="buy" class="btn btn-primary">Buy Now</button>
    </div>
  </div>
  </form>
  <?php } ?>
</div>
<?php include "footer.php"; ?> 
<?php 
include_once('./config.php'); 

// Get food ID from URL
$id = $_GET['proID'];

// Fetch food details
$query = "SELECT * FROM `tbl_menu` WHERE `food_id` = '$id'" ;
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Order Food</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <img class="img-fluid shadow rounded" src="images/<?php echo $row['f_img']; ?>" alt="Food Image">
      </div>
      <div class="col-md-6">
        <h2><?php echo $row['f_name']; ?></h2>
        <p><?php echo $row['f_des']; ?></p>
        <h4 class="text-primary">$<?php echo $row['f_price']; ?></h4>
        <form action="./admin/process_order.php" method="POST">
          <input type="hidden" name="food_id" value="<?php echo $row['food_id']; ?>">
          <input type="hidden" name="price" value="<?php echo $row['f_price']; ?>">
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Your Name:</label>
            <input type="text" name="customer_name" id="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="customer_phone" id="phone" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Delivery Address:</label>
            <textarea name="customer_address" id="address" class="form-control" required></textarea>
          </div>
          <!-- Hidden field for payment_status -->
          <input type="hidden" name="payment_status" value="Pending">
          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-outline-primary">Order</button>
            <!-- Cancel button redirects user to the home page -->
            <a href="/index.php" class="btn btn-danger">Cancel Order</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

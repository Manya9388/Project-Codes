
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>
  
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-info p-2">Complete your order!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
         <!-- <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>-->
         <!-- <h6 class="lead"><b>Delivery Charge : </b>Free</h6>-->
          <!--<h5><b>Total Amount Payable : <?php echo $grand_total ?>/-</h5>-->
        </div>
        <form action="checkout2.php" method="post" id="placeOrder">
          <input type="hidden" name="products" value="<?= $allItems; ?>">
          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" required>
          </div>
          <h5><label  class="fa fa-map-marker" > Address</label></h5>
          <div class="form-group">
            <input name="house" class="form-control" placeholder="House no / Building Name" required>
          </div>
          <div class="form-group">
            <input name="road" class="form-control" placeholder="Road Name / Area / Colony" required>
          </div>
          <div class="form-group">
            <input name="pincode" class="form-control" placeholder="Pincode" required>
          </div>
          <div class="form-group">
            <input name="city" class="form-control" placeholder="City" required>
          </div>
          <div class="form-group">
            <input name="state" class="form-control" placeholder="State" required>
          </div>
          <div class="form-group">
            <input name="location" class="form-control" placeholder="Near by location" required>
          </div>
          <div class="form-group">
            <input type="tel" name="phone" class="form-control"  pattern="[0-9]{10}" required placeholder="Phone Number ">
          </div>
         <div class="form-group">
            <input type="submit" name="submit" value="Place Order"onClick="document.location.href='checkout2.php';" class="btn btn-danger btn-block">
            
          </div>
          <div><input type="submit" name="cancel" value="Cancel" onClick="document.location.href='my-cart.php';"class="btn btn-danger btn-block" />
</div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#placeOrder").submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
 <div class="container-fluid">
        <!-- Introduction section -->
        <div class="intro py-1">
            <div>
                <div  class="col-sm-12 col-md text-center" >
                    <h1>Welcome to Basic Banking System</h1>
                </div>
            </div>
            <div class="col-sm-12 col-md img text-center">
                <img src="images/banklogo.png" class="img-fluid">
            </div>
        </div>
        <!-- Activity section -->
        <div class="row activity text-center">

            <div class="col-md act">
                <br><br>
                <img src="images/users.png" class="img-fluid icon">
                <br><br>
                <a href="money_transfer.php"><button>Users Details</button></a>
            </div>
            <div class="col-md act">
                <br><br>
                <img src="images/transfer_money.png" class="img-fluid icon">
                <br><br>
                <a href="money_transfer.php"><button>Transfer Money</button></a>
            </div>
            <div class="col-md act">
                <br><br>
                <img src="images/history.png" class="img-fluid icon">
                <br><br>
                <a href="transaction_history.php"><button >Transfer History</button></a>
            </div>
        </div>
    </div>
    
    
    <div class="footer">
        <div class="jumbotron">
            <p>&copy 2021.</p>
          <h1 class="display-4">Made by <b>Riya Bansal</b></h1>
          <br>
          <p class="lead">For the Project of The Sparks Foundations</p>
        </div>
      </div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>
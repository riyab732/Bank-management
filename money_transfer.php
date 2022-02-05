<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Transfer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
?>

<?php
  include 'navbar.php';
?>

<div class="container">
    <h2 class="text-center pt-4">Money Transfer</h2>
    <br>
    <br>
    <div class="row">
        <div class="col">
            <div class="table-responsive-sm">
                <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                    <thead>
                         <tr>
                         <th scope="col" class="text-center py-2">Id</th>
                         <th scope="col" class="text-center py-2">Name</th>
                         <th scope="col" class="text-center py-2">E-Mail</th>
                         <th scope="col" class="text-center py-2">Balance</th>
                         <th scope="col" class="text-center py-2">Operation</th>
                         </tr>
                    </thead>
                    <tbody>
                        <?php 
                             while($rows=mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                           <td class="py-2"><?php echo $rows['id'] ?></td>
                           <td class="py-2"><?php echo $rows['name']?></td>
                           <td class="py-2"><?php echo $rows['email']?></td>
                           <td class="py-2"><?php echo $rows['balance']?></td>
                           <td><a href="select_user.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Transact</button></a></td> 
                        </tr>
                        <?php
                           }
                        ?>
                     </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
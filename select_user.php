<?php

include 'config.php'; 

   if(isset($_POST['submit']))
   {
       $from = $_GET['id'];
       $to = $_POST['to'];
       $amount = $_POST['amount'];

       $sql1 = "SELECT * FROM users WHERE id=$from";
       $query1 = mysqli_query($conn,$sql1);
       $row1 = mysqli_fetch_array($query1);

       $sql2 = "SELECT * FROM users WHERE id=$to";
       $query2 = mysqli_query($conn,$sql2);
       $row2 = mysqli_fetch_array($query2);
    
       if($amount<0)
       {
           echo '<script type="text/javascript">';
           echo 'alert("Sorry, Negative values cannot be valid for transfer")';
           echo '</script>';
       }
       else if($amount> $row1['balance'])
       {
           echo '<script type="text/javascript">';
           echo ' alert(" Insufficient Balance")'; 
           echo '</script>';
       }
       else if($amount==0)
       {
        echo '<script type="text/javascript">';
        echo ' alert("Sorry, Zero amount cannot be transferred")';  
        echo '</script>';
       }
       else{
        $newbalance1 = $row1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance1 where id=$from";
        mysqli_query($conn,$sql);
     

        // adding amount to reciever's account
        $newbalance2 = $row2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance2 where id=$to";
        mysqli_query($conn,$sql);
        
        $sender = $row1['name'];
        $receiver = $row2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query){
             echo "<script> alert('Transaction Successful');
                             window.location='transaction_history.php';
                   </script>";
            
        }

        $newbalance1= 0;
        $newbalance2= 0;
        $amount =0;
       }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
  
<div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  users where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br>
        <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
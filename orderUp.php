<!DOCTYPE html>
<html>
<head>
<title>Order Form</title>
</head>
<body>
<?php

        if($_SERVER['REQUEST_METHOD']== 'GET')
{

        ?>

<form method = "POST"  action= "orderUp.php">

<label>  Name: <input type= "text" name="Name"></label><br>
<label>  Address: <input type= "text" name="Address"></label><br>
<label> Food Items:<br>
<label>  Qty <input type= "number" name = "coldPhp" min= "0"></label> Cold PHP Sandwich- 4.99<br>
<label>  Qty <input type= "number" name= "hotPhp" min= "0"></label> Hot PHP Sandwich- 5.99<br>
<label>  Qty <input type= "number" name= "phpServer" min= "0"></label> PHP with a Side of Server- 6.99 <br>
<button type= "submit">Submit</button>
</form>
<?php
}
else {

if(isset($_POST['Name']) && isset($_POST['Address']))
        {
                $Name = "N/A";
                $Address = "N/A"; 

                if($_POST['Name'] !='')
                {
                        $Name = $_POST['Name'];
                }

                if($_POST['Address'] !='')
                {
                        $Address= $_POST['Address'];
                }

                if($_POST['coldPhp'] !='')
                {
                        $coldPhp=$_POST['coldPhp'];
                }

                if($_POST['hotPhp'] !='')
                {
                        $hotPhp=$_POST['hotPhp'];
                }
                
                if($_POST['phpServer'] !='')
                {
                        $phpServer=$_POST['phpServer'];
                }

        echo "Receipt for $Name <br>\n ";
        echo "$Address <br>\n ";
        echo " <br>";
        $coldPrice = 4.99;
        $hotPrice= 5.99;
        $serverPrice = 6.99;

        $scTax= 1.1382;
        $yorkTax= 0.1897;
        $rockhillTax= 0.3794;
        $allTax= $scTax + $yorkTax + $rockhillTax;

        $coldTotal=0;
        $hotTotal=0;
        $serverTotal=0;
        $subTotal= $coldTotal + $hotTotal +$serverTotal;
        $total=0;

 if($coldPhp>0)
{
        $coldTotal= $coldPhp * $coldPrice;
        echo "$coldPhp x Cold PHP Sandwich $coldTotal <br>";
        $subTotal= $coldTotal + $hotTotal + $serverTotal;
}

if($hotPhp>0)
{
        $hotTotal= $hotPhp * $hotPrice;
        echo "$hotPhp x Hot PHP Sandwich $hotTotal <br>";
        $subTotal= $coldTotal + $hotTotal + $serverTotal;
}

if($phpServer>0)
{
        $serverTotal= $phpServer * $serverPrice;
        echo "$phpServer x PHP with a side of Server $serverTotal <br>";
        $subTotal= $coldTotal + $hotTotal + $serverTotal;
}

        echo "Subtotal: $subTotal <br>";
        echo "SC tax: $scTax <br>";
        echo "York Tax: $yorkTax <br>";
        echo "Rock Hill Tax: $rockhillTax <br>";
        $total= ($subTotal + $allTax);
        echo "Total: $total <br>";
}
        else
        {
                echo "Sorry you must access this page by filling out the form...";
        }
}
?>


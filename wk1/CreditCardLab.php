<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Week1 Lab</title>
    </head>
    <body style="text-align: center;">
        <h1>Calculate Months of Credit Card Interest</h1>
        <form name="test" method="post" action="CreditCardLab.php">
            Amount Owed:<br> 
            <input type="text" value="1000" name="amtOwed"><br><br>
            
            Interest Rate: <br>
            <input type="text" value="15.99" name="intRate"><br><br>
            
            Monthly Payment: <br>
            <input type="text" value="200" name="monthPay"><br><br>
            
            <input type="submit" value="Show me the damage" name="clickMe">
        </form>
        <?php
            if (isset ($_POST['clickMe'])) 
            {
                
                $owed = $_POST['amtOwed'];
                $interest = $_POST['intRate'];
                $payment = $_POST['monthPay'];
                echo "<br>";
                echo "<table align='center' border ='1'>";
                echo "<th> Month </th>";
                echo "<th> Interest Paid </th>";
                echo "<th> Owed </th>";

                $bill = $owed;//Your beginning balance

                for ($i = 0; $owed > 0; $i++)
                {
                    $intPaid = $owed * $interest / 100 / 12;//Formula for Interest Paid

                    $bill2 = $owed + $intPaid;//The sum of Interest Paid

                    $balance = $owed - $payment + $intPaid;//The remaining balance                 

                    if ($intPaid > $balance)
                    {
                        $balance ="";
                    }

                    echo "<tr>";
                    $monthRow = $i+1; //Month colomn starts at 1

                    $intRow = '$' .number_format((float)$intPaid, 2); //Interest Paid colomn will be rounded and set 2 decimal spaces

                    $oweRow = '$' .number_format((float)$balance, 2);//Owed colomn set 2 decimal spaces

                    echo "<td> $monthRow </td>";

                    echo "<td> $intRow </td>";

                    echo "<td> $oweRow </td>";

                    echo "</tr>";

                    $owed = $balance;

                } //for loop close

                echo "</table>";

                $total = $bill + $bill2;//The total amount spent over the life of the balance
                echo "<br>","The total amount spent over ".$monthRow, " months is $".number_format((float)$total, 2); //Final Message
                                       
                    
            }//clickMe close

                    else {

                    echo "<br>", "Welcome! Lets calculate your credit interest."; //First visit message

                    }
        ?>

    </body>

</html>
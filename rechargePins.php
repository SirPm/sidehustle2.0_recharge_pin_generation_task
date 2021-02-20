<?php

    function generateRechargePin($numOfDigits) {
        $rechargePin = "";
        if($numOfDigits < 12) {
            echo "
                <script>
                    alert('Please Make Sure That The Number of Digits You Selected Is Greater Than 11');
                    window.location = '/sidehustle2.0/recharge_card_generation/';
                </script>
            ";
        } else {
            for ($x = 1; $x <= $numOfDigits; $x++) {
                $rechargePin = rand(0, 9).$rechargePin;        
            }
            // echo $rechargePin."<br><br>"; 
        }
        return $rechargePin;
    }
    
    $rechargeCardsArr = array();

    function generateMultipleRechargePin($numOfRechargePin) {
        global $rechargeCardsArr;

        $submittedNumOfDigits = $_POST["no_of_digits"];
        if($numOfRechargePin < 200) {
            echo "
                <script>
                    alert('The Least Number of Recharge Card You Can Generate Is 200');
                    window.location = '/sidehustle2.0/recharge_card_generation/';
                </script>
            ";
        } else {
            for ($i = 1; $i <= $numOfRechargePin; $i++) {
                $rechargeCard = generateRechargePin($submittedNumOfDigits);
                array_push($rechargeCardsArr, $rechargeCard);
            }
        }        
    }

    $submittedNumOfRechargePins = $_POST["no_of_recharge_pins"];
    generateMultipleRechargePin($submittedNumOfRechargePins);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recharge Pins</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">Go Home</a></li>
        </ul>
    </header>
    <h1>The List Below Contains All The Recharge Pins Generated</h1>
    <ol>
        <?php 
            $rechargeCardsArrLength = count($rechargeCardsArr);
            for ($i = 0; $i < $rechargeCardsArrLength; $i++) {
        ?>
            <li><?php echo $rechargeCardsArr[$i]; ?></li>
        <?php } ?>        
    </ol>  
</body>
</html>
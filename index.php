<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recharge Card Generation</title>

    <style type="text/css">
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .input-div {
            display: flex;
            flex-direction: column;
            margin-bottom: 2%;
        }
        .digit-error, .number-error {
            display: none;
            font-weight: 600;
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <form name="generateRechargePinForm" id="generateRechargePinForm" method="POST" action="rechargePins.php">
        <h4>This Form Will Generate Recharge Card Pins For You</h4>
        <div class="input-div">
            <label for="noOfDigits">Type In How Many Digits You Want Each Recharge Pin To Have</label>
            <input type="number" id="noOfDigits" required name="no_of_digits" placeholder="number of digits">
            <span class="digit-error">Please Make Sure That The Number of Digits You Selected Is Greater Than 11</span>
        </div>
        <div class="input-div">
            <label for="noOfRechargePins">Type In How Many Recharge Pins You Want To Generate</label>
            <input type="number" id="noOfRechargePins" required name="no_of_recharge_pins" placeholder="number of recharge pins">
            <span class="number-error">The Least Number of Recharge Card You Can Generate Is 200</span>
        </div>
        <input type="submit" value="Generate Recharge Card Pins">
    </form>

    <script type="text/javascript">
        const noOfDigits = document.getElementById('noOfDigits');
        const noOfRechargePins = document.getElementById('noOfRechargePins');
        const generateRechargePinForm = document.getElementById('generateRechargePinForm');
        const digitError = document.querySelector('.digit-error');
        const numberError = document.querySelector('.number-error');

        generateRechargePinForm.addEventListener('submit', (e) => {
            if(noOfDigits.value < 12 && noOfRechargePins.value < 200) {
                e.preventDefault();
                noOfDigits.style.border = '1px solid red';
                digitError.style.display = 'block';
                numberError.style.display = 'block';
            } else if(noOfDigits.value < 12){
                e.preventDefault();
                digitError.style.display = 'block';
                numberError.style.display = 'none';
            } else if(noOfRechargePins.value < 200) {
                e.preventDefault();
                numberError.style.display = 'block';
                digitError.style.display = 'none';
            } else {
                digitError.style.display = 'none';
                numberError.style.display = 'none';
            }
        });
    </script>
</body>
</html>
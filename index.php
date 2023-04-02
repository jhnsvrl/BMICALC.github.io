<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="bmistyle.css">
</head>

<body>
    <section class="wrapper">

<?php 
    $errh = $errw = $errg = "";
    $height = $weight = "";
    $bmipass = "";
    // Kalau Ada Yang Kosong Kotaknya 
    // Buat Height
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['height'])) {
            $errh = "<span style='color:#ed4337; font-size:17px; display:block'>Height is requried</span>";
        } else {
            $height = validate($_POST['height']);
        }
    // Buat Weight
        if (empty($_POST['weight'])) {
            $errw = "<span style='color:#ed4337; font-size:17px; display:block'>Weight is requried</span>";
        } else {
            $weight = validate($_POST['weight']);
        }
    // Kalo Kosong Maka Post Ini
        if (empty($_POST['height'] && $_POST['weight'])) {
            echo "";
    // Kalo Ada Isinya Post Perhitungan ini
        } else {
            $bmi = ($weight / ($height * $height));
            $bmipass = $bmi;
        }
    }
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<h2>Check Your BMI</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="section1">
        <span>Enter Your Height : </span>
        <input type="text" name="height" autocomplete="off" placeholder="Meter"><?php echo $errh; ?>
    </div>
    
    <div class="section2">
        <span>Enter Your weight : </span>
        <input type="text" name="weight" autocomplete="off" placeholder="Kilograms"><?php echo $errw; ?>
    </div>    
    <div class="submit">
        <input type="submit" name="submit" value="Check BMI">
        <input type="reset" value="Clear">
        <a href="https://www.google.com">
            <input type="button" value="Survey">
        </a>
    </div>
</form>

<?php
    error_reporting(0);
        echo "<span class='pass'>Your BMI is : ". number_format($bmipass , 2) ."</span>";
    if (isset($_POST['submit'])){
        if ($bmipass >= 13.6 && $bmipass <= 18.5) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px ;margin-right:50px'> Low body weight. You Can Gain Weight By Adding Calories Into Your Diet !.</span>";?>
            <img src="assets/underweight.png" class="one"><?php
        } elseif ($bmipass > 18.5 && $bmipass < 24.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> You Have The Standard of Good Health 😃.</span>";?>
            <img src="assets/normal.png" class="two"><?php
        } elseif ($bmipass > 25 && $bmipass < 29.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> Excess body weight. You Need Exercise to Reduce Your Excess Weight !.</span>";?>
            <img src="assets/fat3.png" class="three"><?php
        } elseif ($bmipass > 30 && $bmipass < 34.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The First Stage of Obesity!. You Need to Start Eating Healthy and Exercise !.</span>";?>
            <img src="assets/fat2.png" class="four"><?php
        } elseif ($bmipass > 35 && $bmipass < 39.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The Second Stage of Obesity!. Moderate Diet and Exercise Are Needed !.</span>";?>
            <img src="assets/fat.png" class="five"><?php
        } elseif ($bmipass >= 40) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> Excess fat.<b style='color:#ed4337'> Fear of death</b>. Need a doctor advice.</span>";?>
            <img src="assets/fat.png" class="six"><?php
        }
    } else {
        echo "";
    }
?>

    </section>
</body>
</html>
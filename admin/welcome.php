<?php
require_once 'scripts\load.php';
    session_start();
    $user_row = $_SESSION['user'];
//get current_time trim down to just time
    $name=($user_row[4]);
    $last_date=substr($user_row[7],0,10);
    $last_time=substr($user_row[7],11,5);
//remove ":" so it's just a number
    $this_time = substr($user_row[8],11);
    $thiss = str_replace(':', '', $this_time);
//call function
    $time = calculateTOD($thiss);

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <title>Welcome Page</title>
</head>
<body>
    <main>
    <div class="text">
        <h1>Hope Your Having A Great <?php echo !empty($time)?$time:''; ?> <?php echo !empty($name)?$name:' '; ?>!</h1>
        <h2>Your last login was <?php echo !empty($last_date)?$last_date:' '; ?> at <?php echo !empty($last_time)?$last_time:' '; ?> </h2>
        
    </div>
    <div class="image">
        <h3>Happy to see you!</h3>
        <img src="../images/<?php echo !empty($time)?$time:''; ?>chibli.jpg" alt="chibli character">
        <a href="../index.php">Home</a>
    </div>

</main>
</body>
</html>
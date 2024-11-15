<?php
    require_once('functions.php');

    session_start();

    if(isset($_SESSION['accountId'])){
        $accountId = $_SESSION['accountId'];
        $user = getUserByAccountId($accountId);
        $games = $user->trophyTitles();
    }
    else{
        header('Location: index.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayStation Trophies | <?php echo $user->onlineId() ?>'s games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        foreach($games as $game){
            echo $game->name() . '<br>';
        }
    ?>
</body>
</html>
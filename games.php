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
        ?>
        <div class="row">
            <div class="col-4" style="height: 250px;">
                <img src="<?php echo $game->iconUrl() ?>" style="width: 250px; height: 250px ;">
            </div>

            <div class="col-8">
                <h5><?php echo $game->name(); ?></h5>
            <div style="height: 50%; padding: 10px;">
            </div>
            <div style="height: 50%; padding: 10px;">
                <div class="progress" role="progressbar">
                    <div class="progress-bar" style="width: <?php echo $game->progress() ?>%">
                        <?php echo $game->progress() . '%' ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    <?php } ?>

</body>
</html>
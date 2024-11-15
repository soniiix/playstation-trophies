<?php
    require_once('functions.php');

    session_start();

    if(isset($_POST['btn-search'], $_POST['input-search'])){
        $user_search = $_POST['input-search'];

        $user = getUserByOnlineId($user_search);

        if ($user != ""){
            $_SESSION['accountId'] = $user->accountId();
            $summary = $user->trophySummary();
        }
        else{
            $not_find = true;
        }
      
    }
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayStation Trophies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-sm text-center">
        <form action="index.php" method="POST" class="mb-4 mt-4">
            <div class="input-group">
                <input type="text" class="form-control" name="input-search" placeholder="Search user...">
                <button type="submit" class="btn btn-primary" name="btn-search">Search</button>
            </div>
        </form>
        <main>
            <?php 
            if(isset($not_find)){
                ?>
                <div class="card shadow">
                    <h5 class="my-4">Aucun utilisateur trouvé...</h5>
                </div>
                <?php
            }
            if(isset($user)){ ?>
            <div class="card shadow mb-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php echo $user->avatarUrl() ?>" class="img-fluid rounded-start" alt="User's avatar">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $user->onlineId(); ?></h5>
                            <p class="card-text">
                                Level : <?php echo $summary->level(); ?>
                                <br><br>
                                Trophy Summary :
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Platinum : <?php echo $summary->platinum(); ?>
                                    </li>
                                    <li class="list-group-item">
                                        Gold : <?php echo $summary->gold(); ?>
                                    </li>
                                    <li class="list-group-item">
                                        Silver : <?php echo $summary->silver(); ?>
                                    </li>
                                    <li class="list-group-item">
                                        Bronze : <?php echo $summary->bronze(); ?>
                                    </li>
                                </ul>
                            </p>
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    <?php
                                        $status = $user->isOnline() ? 'Online' : 'Offline';
                                        echo $status;
                                    ?>
                                </small>
                            </p>
                            <a href="games.php" class="btn btn-primary">View games</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </main>
    </div>
</body>
</html>
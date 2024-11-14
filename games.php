<?php
    if(isset($_POST['btn-search'], $_POST['input-search'])){
        $user_search = $_POST['input-search'];
    }
    else{
        header('Location: index.php');
    }
    

    $games = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayStation Trophies | [username]'s games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>
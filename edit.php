<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Personnes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <style>
        body {
            margin-top: 4%;
            margin-left: 6%;
            margin-right: 6%;
        }
    </style>
    <?php
        include 'DB.php';
        $db = new DB();
        $userData = $db->getRows('persons',array('where'=>array('ID'=>$_GET['ID']),'return_type'=>'single'));
        if(!empty($userData)){
    ?>
    <div class="row">
        <div class="panel panel-default user-add-edit">
            <div class="panel-heading">Edit User <a href="index.php" class="glyphicon glyphicon-arrow-left"></a></div>
            <div class="panel-body">
                <form method="post" action="action.php" class="form" id="userForm">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $userData['first_name']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Prénom</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $userData['last_name']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Sexe</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $userData['sex']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $userData['age']; ?>"/>
                    </div>
                    <input type="hidden" name="ID" value="<?php echo $userData['ID']; ?>"/>
                    <input type="hidden" name="action_type" value="edit"/>
                    <input type="submit" class="form-control btn-default" name="submit" value="Update User"/>
                </form>
            </div>
        </div>
    </div>
    <?php } ?>
</body>
</html
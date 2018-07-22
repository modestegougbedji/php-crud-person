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
    session_start();
    if(!empty($_SESSION['statusMsg'])){
        echo '<p>'.$_SESSION['statusMsg'].'</p>';
        unset($_SESSION['statusMsg']);
    }
    ?>
    <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading">Personnes <a href="add.php" class="glyphicon glyphicon-plus"></a></div>
            <table class="table">
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Nom</th>
                    <th width="30%">Prenom</th>
                    <th width="20%">Sexe</th>
                    <th width="12%">Age</th>
                    <th width="13%"></th>
                </tr>
                <?php
                    include 'db.php';
                    $db = new DB();
                    $users = $db->getRows('persons',array('order_by'=>'ID DESC'));
                    if(!empty($users)){ $count = 0; foreach($users as $user){ $count++;?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $user['first_name']; ?></td>
                        <td><?php echo $user['last_name']; ?></td>
                        <td><?php echo $user['sex']; ?></td>
                        <td><?php echo $user['age']; ?></td>
                        <td>
                            <a href="edit.php?ID=<?php echo $user['ID']; ?>" class="glyphicon glyphicon-edit"></a>
                            <a href="action.php?action_type=delete&ID=<?php echo $user['ID']; ?> class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure?');?>"></a>
                        </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="4">Aucune personne trouvée......</td>
                <?php } ?>
            </table>
        </div>
    </div>
</body>
</html>
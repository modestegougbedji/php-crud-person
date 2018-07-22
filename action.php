<?php
session_start();
include 'db.php';
$db = new DB();
$tblName = 'persons';
if(isset($_REQUEST['action_type']) && !empty($_REQUEST['action_type'])){
    if($_REQUEST['action_type'] == 'add'){
        $userData = array(
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'sex' => $_POST['sex'],
            'age' => $_POST['age']
        );
        $insert = $db->insert($tblName, $userData);
        $statusMsg = $insert?"Les données de l'utilisateur ont été insérées avec succès.":"Un problème est survenu, veuillez réessayer.";
        $_SESSION['statusMsg'] = $statusMsg;
        header("Location:index.php");
    }elseif($_REQUEST['action_type'] == 'edit'){
        if(!empty($_POST['ID'])){
            $userData = array(
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'sex' => $_POST['sex'],
                'age' => $_POST['age']
            );
            $condition = array('ID' => $_POST['ID']);
            $update = $db->update($tblName,$userData,$condition);
            $statusMsg = $update?"Les données de l'utilisateur ont été mises à jour avec succès.":"Un problème est survenu, veuillez réessayer.";
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:index.php");
        }
    }elseif($_REQUEST['action_type'] == 'delete'){
        if(!empty($_GET['ID'])){
            $condition = array('ID' => $_GET['ID']);
            $delete = $db->delete($tblName,$condition);
            $statusMsg = $delete?"Les données de l'utilisateur ont été supprimées avec succès.":"Un problème est survenu, veuillez réessayer.";
            $_SESSION['statusMsg'] = $statusMsg;
            header("Location:index.php");
        }
    }
}
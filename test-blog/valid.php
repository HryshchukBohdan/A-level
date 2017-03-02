<?php
require_once "db.php";
$link = db_connect();
//$valid = $link->query("SELECT * FROM admin_ka");
    $query = "SELECT * FROM admin_ka" ;
    $result = mysqli_query($link, $query);

//$res = $valid ->fetchAll();
    $n_rows = mysqli_num_rows($result);
    
    $articles = array();
    
    for ($i=0; $i < $n_rows; $i++)
    {
    $row = mysqli_fetch_assoc($result);
        
        print_r($row);
//for($i=0;$i<count($res);$i++){
    $true_login = $row['login_a'];
    $true_password = $row['parol_a'];
        print_r($row);
}
if(!empty($_POST['sub'])) {
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        if (($_POST['name'] == $true_login) and ($_POST['password'] == $true_password)) {
            $_SESSION['logined'] = true;
            $_SESSION['user'] = $true_login;
        } else $error_login = "Не верный логин или пароль";
    } else $error_login = "Поля не могут быть пустыми";
}
if(isset($_GET['exit'])) {
    session_destroy();
    #redirect
    header('Location: index.php');
    exit;
}
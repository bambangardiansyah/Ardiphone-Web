<?php
require_once 'koneksi.php';

function register($data)
{
    global $koneksi_db;

    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
  
   

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO tb_user (username, password, email, level) VALUES (
        '$username', '$passwordHash','$email', 'user')";

    return mysqli_query($koneksi_db, $query);
}  

function login($data)
{
    global $koneksi_db;

    $username = $data['username'];
    $password = $data['password'];


    $querySelect = "SELECT * FROM tb_user WHERE username = '$username'";

    $rawSelectResult = mysqli_query($koneksi_db, $querySelect);
    $selectResult = mysqli_fetch_assoc($rawSelectResult);
    if (is_null($selectResult)) {
        return null;
    }

    $passwordHash = $selectResult['password'];

    if (password_verify($password, $passwordHash)) {
        return true;
    } else {
        return false;
    }
}
function getUserData($username = null, $id = null)
{
    global $koneksi_db;

    $query = is_null($username) ? "SELECT * FROM tb_user WHERE id_user = $id" : "SELECT * FROM tb_user WHERE username = '$username'";
    $rawResult = mysqli_query($koneksi_db, $query);
    $result = mysqli_fetch_assoc($rawResult);
    return $result;

    // $userLevel = ['level'];
}
<?php
$connect = mysqli_connect('localhost','root','','rest');

if(isset($_GET['username']) && isset($_GET['password'])){
    $username = $_GET['username'];
    $password = $_GET['password'];

    $query = mysqli_query($connect,"SELECT * FROM rest WHERE username='$username' AND password='$password'");

    $view = mysqli_fetch_assoc($query);

    if($query->num_rows > 0){
        $resp['No_ktp'] = $view['no_ktp'];
        $resp['id'] = $view['id'];
        $resp['username'] = $view['username'];
        $resp['message'] = "sukses di kembalikan";
    }else{
        $resp['no_ktp'] ="0";
        $resp['message'] = "Data Tidak Ada";
    }


}else{
    $resp['no_ktp'] ="0";
    $resp['message'] = "Username atau Pass tidak sesuai";
}
    header('conten-type: application/json');
    $response['response'] = $resp;

    echo json_encode($response);
    mysqli_close($connect)
?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>
<body>
    <h1 align = "center">Webboard Kakkak</h1>
    <hr>
    <div align ="center">
     <!--   เข้าสู่ระบบด้วย<br>
        Login = <?php //echo $_POST["login"];?><br>
        Password = <?php// echo $_POST["pwd"];?> -->
        <?php
       // echo "Login = ".$_POST["login"]."<br>";
        //echo "Password = ".$_POST["pwd"];
        ?>
        <?php 
            if($_POST["login"]=="admin" && $_POST["pwd"]=="ad1234"){
                echo "ยินดีต้อนรับคุณ ADMIN";
                $_SESSION['username']='admin';
                $_SESSION['role']='a';
                $_SESSION['id']=session_id();
            }
            else if($_POST["login"]=="member" && $_POST["pwd"]=="mem1234"){
                echo "ยินดีต้อนรับคุณ MEMBER";
                $_SESSION['username']='member';
                $_SESSION['role']='m';
                $_SESSION['id']=session_id();
            }else{
                echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
            }
        ?>
    </div>
    <div align="center">
        <a href="index.php">กลับสู่หน้าหลัก</a>
    </div>
</body>
</html>
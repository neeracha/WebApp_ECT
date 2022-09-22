<?php 
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1 style="text-align: center;">Webborad KakKak</h1>
    <hr>
    <table style="border: 2px solid black; width:40%" align="center">
    <tr><td colspan="2" style="background-color: #6CD2FE;">สมัครสมาชิก</td></tr>
    <tr><td>ชื่อบัญชี :</td><td><input type="text" name="login"></td></tr>
    <tr><td>รหัสผ่าน : </td><td><input type="password" name="Password"></td></tr>
    <tr><td>ชื่อ-นามสกุล : </td><td><input type="text" name="ืname"></td></tr>
    <tr><td rowspan="3">เพศ :</td>
        <td><input type="radio" name="gender" value="male">ชาย</td></tr>
        <tr><td><input type="radio" name="gender" value="female">หญิง</td></tr>
        <tr><td><input type="radio" name="gender" value="other">อื่น ๆ</td></tr>
    </tr>
    <tr><td>อีเมล : </td><td><input type="text" name="email"></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" value="สมัครสมาชิก"></td></tr>
    </table>
    <br>
    <div align="center">
        <a href="index.php">กลับไปหน้าหลัก</a>
    </div>
</body>
</html>
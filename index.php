<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webborad KakKak</title>
</head>
<body>
    <!--<h1><center>Webborad KakKak</center></h1> -->
    <h1 style="text-align: center;">Webborad KakKak</h1>   <!--inline-->
    <hr>
    หมวดหมู่: 
    <select name="category">
        <option value="all">--ทั้งหมด--</option>
        <option value="general">--เรื่องทั่วไป--</option>
        <option value="student">--เรื่องเรียน--</option>
    </select>
    <a href="login.html" style="float: right;">เข้าสู่ระบบ</a>
    <ul>
        <?php
        for($i=1;$i<=10;$i++){
            echo "<li><a href=post.php?id=$i>กระทู้ที่ $i</a></li>";
        }
        ?>
        <!--ส่งแแบบ get
        <li><a href="post.php?id=1">กระทู้ที่ 1</a></li>
        <li><a href="post.php?id=2">กระทู้ที่ 2</a></li>
        <li><a href="post.php?id=3">กระทู้ที่ 3</a></li>
        <li><a href="post.php?id=4">กระทู้ที่ 4</a></li>
        <li><a href="post.php?id=5">กระทู้ที่ 5</a></li>-->
    </ul>

</body>
</html>
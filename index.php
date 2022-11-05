<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Webboard ANYA</title>
    <script>
        function myFunction() {
            let r = confirm("ต้องการจะลบจริงหรือไม่");
            return r;

        }
    </script>
</head>
<?php
if (!isset($_SESSION['id'])) {
?>

    <body>
        <!--ไม่ได้ log in-->
        <div>
            <div class="container">
                <h1 style="text-align:center;">
                    <center>Webboard ANYA</center>
                </h1>
                <?php include "nav.php"; ?>
                <br>
                <div>
                    <div class="d-flex justify-content-start">
                        <label class="from-group me-2 mt-1">หมวดหมู่</label>
                        <span>
                            <select name="category" class="form-select form-select-sm">
                                <?php
                                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                                $sql = "SELECT * FROM category";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                }
                                $conn = null;
                                ?>
                            </select>
                        </span>
                    </div>
                </div>
                <br>
                <table class="table table-striped">
                    <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                    $sql = "SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date FROM post as t1
                INNER JOIN user as t2 ON (t1.user_id=t2.id) INNER JOIN category as t3 ON (t1.cat_id=t3.id)
                ORDER BY t1.post_date DESC";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch()) {
                        echo "<tr><td>[ $row[0] ]<a style=text-decoration:none 
                href=post.php?id=$row[1]>$row[2]</a><br>
                $row[3] : $row[4] </td></tr>";
                    }
                    $conn = null;
                    ?>
                </table>
            </div>
    </body>
<?php } else { ?>

    <body>
        <div class="container">
            <h1>
                <center>Webboard ANYA</center>
            </h1>
            <?php include "nav.php"; ?>

            <div class="d-flex justify-content-between mt-3">
                <div>
                    <div class="d-flex justify-content-start">
                        <label class="from-group me-2 mt-1">หมวดหมู่</label>
                        <span>
                            <select name="category" class="form-select form-select-sm">
                                <?php
                                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                                $sql = "SELECT * FROM category";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                }
                                $conn = null;
                                ?>
                            </select>
                        </span>
                    </div>
                </div>
                <div>
                    <a href="newpost.php" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> สร้างกระทู้ใหม่</a>
                </div>
            </div>
            <br>
            <table class="table table-striped">
                <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                $sql = "SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date FROM post as t1 
            INNER JOIN user as t2 ON (t1.user_id=t2.id) INNER JOIN category as t3 ON 
            (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
                $result = $conn->query($sql);
                while ($row = $result->fetch()) {
                    echo "<tr><td>[$row[0]]<a style=text-decoration:none 
                href=post.php?id=$row[1]> $row[2]</a><br>
                $row[3] - $row[4]</td>";
                    if ($_SESSION['role'] == 'a') {
                        echo "<td><a href=delete.php?id=$row[1]
                class='btn btn-danger btn-sm'
                onclick='return myFunction();'>
                <i class='bi bi-trash'></i></a></td></tr>";
                    }
                }
                ?>
            </table>
        </div>
    </body>
<?php } ?>

</html>
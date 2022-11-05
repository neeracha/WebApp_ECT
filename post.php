<?php
session_start();
/*if (isset($_SESSION['id'])) {
    header("location:index.php");
    die();
}*/
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
    <title>POST</title>
</head>

<body>
    <div class="container">
        <br>
        <h1 align="center">Webboard ANYA</h1>
        <?php include "nav.php"; ?>
        <br>


        <?php
        //  $id = $_GET['id']; //'".$_POST['selected']."'
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "SELECT t1.content,t1.title,t2.login,t1.post_date,t1.id FROM post as t1 
               INNER JOIN user as t2 ON (t1.user_id=t2.id) WHERE t1.id='" . $_GET['id'] . "' "; // DESC
        $result = $conn->query($sql);
        while ($row = $result->fetch()) {
            echo
            '<div class="card text-dark bg-white border-primary">
                    <div class="card-header bg-primary text-white">' . $row[0] . '</div>
                    <div class="card-body">
                           <div class="row mb-3 justify-content-center">
                           <div class="col-lg-12">
                           ' . $row[1] .
                '<br><br>'
                . $row[2] . " - " . $row[3] .
                ' </div>
                           </div>
                    </div>
                </div>
                <br> ';
        }
        ?>


        <?php
        $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
        $sql = "SELECT t1.content,t1.id,t2.login,t1.post_date,t1.post_id FROM comment as t1 
                INNER JOIN user as t2 ON (t1.user_id=t2.id) ORDER BY t1.post_date ASC /*WHERE t1.post_id ='". $_GET['id'] . "'*/";
        $result = $conn->query($sql);
        while ($row = $result->fetch()) {
            echo '<div class="card text-dark bg-white border-info">
                         <div class="card-header bg-info text-white">ความคิดเห็นที่ ' . $row[1] . '</div>
                         <div class="card-body">
                           <div class="row justify-content-center">
                            <div class="col-lg-12">
                               ' . $row[0] .
                '<br><br>'
                . $row[2] . " - " . $row[3] .
                ' </div>
                        </div>
                    </div>
                </div>
                <br> ';
        }
        ?>



        <div class="card text-dark bg-white border-success">
            <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
            <div class="card-body">
                <form action="post_save.php" method="post">
                    <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-12">
                            <center>
                                <textarea name="comment" class="form-control" rows="8"></textarea>
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-success btn-sm text-white">
                                    <i class="bi bi-box-arrow-up-right me-1"></i>ส่งข้อความ
                                </button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br> <br>
    </div>


</body>

</html>
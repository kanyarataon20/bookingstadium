<?php
require('./utility.php');

$sql2 = "SELECT * FROM member";
$rs2 = mysqli_query($condb, $sql2);
$data2 =  mysqli_fetch_assoc($rs2);


$err = '';
if (isset($_POST['btn1'])) {
    $sql = 'SELECT * FROM stadium WHERE staId="' . $_POST['staId'] . '" ';
    $rs = mysqli_query($condb, $sql);

    if (mysqli_num_rows($rs) == 0) {
        $sql = 'INSERT INTO stadium (staId,staName,staType)
            VALUES ("' . $_POST['staId'] . '","' . $_POST['staName'] . '","' . $_POST['staType'] . '") ';
        mysqli_query($condb, $sql);
        header("Location:stadium.php");
    } else {
        $err = '<div class="alert alert-danger">มีหมายเลขสนามนี้แล้ว เพิ่มข้อมูลไม่ได้</div>';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สนามเสือ</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./ycss.css">
<style>
    #hTop {
        background-image: url("img/bg.jpg");
        height: 450px;
    }
</style>


<body>
<div class="nav">
        <div class="col-md ">
            <?php require('./navbar.php') ?>
        </div>
    </div>
<br><br><br><br>
    <div class="container-flui">
       
        <center>
            <div class="row">


                <div class="col">
                    <div class="col-6 border rounded mt-2 p-2 ">
                        <h1>เพิ่มสนาม..</h1>
                        <form method="post">
                            <input type="text" name="staId" placeholder="หมายเลขสนาม *สนามใหญ่ b0+ สนามเล็ก sm0+*" class="form-control w-100 my-2" required>
                            <select class="form-select form-select-sm mt-3" name="staType"  required>
                            <option>เลือกประเภท</option>
                                <option>สนามหญ้าเทียมใหญ่</option>
                                <option>สนามหญ้าเทียมเล็ก</option>
                            </select>
                            <input type="text" name="staName" placeholder="ชื่อสนาม" class="form-control w-100 my-2" required>
                            


                            <button name="btn1" class="btn btn-outline-success text-end" type="submit">บันทึกข้อมูล</button>

                        </form>
                        <?php echo $err; ?>
                        <br>
                        <a href="stadium.php"><button class="btn btn-outline-info" type="submit">ย้อนกลับ</button></a>


                    </div>
                </div>



            </div>

        </center>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
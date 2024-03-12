<?php
require('./utility.php');

$sql2 = "SELECT * FROM member";
$rs2 = mysqli_query($condb, $sql2);
$data2 =  mysqli_fetch_assoc($rs2);


if (isset($_GET['memtel']) && isset($_GET['status'])) {
  $sql = 'UPDATE member SET memstatus = ' . $_GET['status'] . ' WHERE memtel = "' . $_GET['memtel'] . '"';
  mysqli_query($condb, $sql);
}

$cond = '';
if (isset($_POST['btnS'])) {
  $cond = ' WHERE memtel LIKE "%' . $_POST['txtSearch'] . '%" 
        OR memname LIKE "%' . $_POST['txtSearch'] . '%" ';
}

if (isset($_GET['Del_id'])) {
  $sql = 'DELETE FROM member WHERE memtel="' . $_GET['Del_id'] . '"';
  mysqli_query($condb, $sql);
}


$sql = 'SELECT * FROM member  ' . $cond;
$rs = mysqli_query($condb, $sql);


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

<body>


  <br><br><br>

  <div class="nav">
    <div class="col-md ">
      <?php require('./navbar.php') ?>
    </div>
  </div>
<br>
      <center>
        <h1>จัดการข้อมูลผู้ใช้งาน</h1>
        <form method="post" id="form0" class="d-flex">
          <input type="text" class="form-control" placeholder="เบอร์/ชื่อ-นามสกุล" name="txtSearch">
          <button name="btnS" class="btn btn-outline-info" type="submit"><i class="bi bi-search"></i>ค้นหา</button>
        </form>


        <div class="container mt-3">

          <table class="table">
            <thead>
              <tr>
                <th>E-mail</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เบอร์โทร</th>
                <th>จัดการข้อมูล</th>

              </tr>
            </thead>
            <?php

            while ($data =  mysqli_fetch_assoc($rs)) {


            ?>

              <tbody>
                <tr class="table-into">
                  <td><?php echo $data['mememail']; ?></td>
                  <td><?php echo $data['memfirst']; ?></td>
                  <td><?php echo $data['memlast']; ?></td>
                  <td><?php echo $data['memtel']; ?></td>


                  <td>


                    <?php if ($data['memstatus'] == 0) { ?>

                      <a href="member.php?memtel=<?php echo $data['memtel'] ?> &status=1" class="btn btn-success"><i class="bi bi-person-fill-check"></i> member</a>

                    <?php } else if ($data['memstatus'] == 1) { ?>

                      <a href="member.php?memtel=<?php echo $data['memtel'] ?> &status=0" class="btn btn-outline-success"><i class="bi bi-person-fill"></i> admin</a>

                    <?php } ?>


                    <a href="member.php?Del_id=<?php echo $data['memtel'] ?>" class="btn btn-danger"><i class="bi bi-person-fill-dash"></i> ลบ</a>

                  </td>
                </tr>
              <?php } ?>
          </table>
          <?php echo '<h6 class="text-dark">ข้อมูลจำนวน' . mysqli_num_rows($rs) . 'รายการ </h6>' ?>
        </div>



      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
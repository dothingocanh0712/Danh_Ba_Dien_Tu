<?php
include('templates-admin/header.php');
?>  

<?php
   //lấy id là manv
    $id = $_GET['madv'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM db_donvi WHERE madv=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {           
        $_SESSION['delete']="<div class='text-success'>Xóa đơn vị thanh công.</div>";
        header('location:' .SITEURL. 'admin/qldv.php');

    }
    else
    {
        $_SESSION['delete']="<div class='text-danger'>Xóa đơn vị thất bại.</div>";
        header('location:' .SITEURL. 'admin/qldv.php');
    
    }
?>

<?php 
    include('templates-admin/footer.php');
?>
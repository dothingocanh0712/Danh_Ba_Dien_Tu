<?php
include('templates-admin/header.php');
?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-success text-center" role="alert">
            <h2>Thêm</h2>
        </div>

  <!-- sửa -->
        <div class="container col-md-12 mx-auto">
            <form action="" METHOD="POST">
                <div class="col-md-6 mx-auto">
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3">Tên đơn vị</span>
                        <input type="text" class="form-control" name= "txtdonvi" placeholder="Nhập tên đơn vị">
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Địa chỉ</span>
                        <input type="text" class="form-control" name= "txtdiachi" placeholder="Nhập địa chỉ">
                    </div>
                    
                    <div class="input-group mb-2">
                        <span class="input-group-text col-3" >Điện thoại</span>
                        <input type="text" class="form-control" name= "sodienthoai" placeholder="Nhập số sđt">
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Email</span>
                        <input type="email" class="form-control" name="txtemail" placeholder="Nhập email" >      
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-3" >Website</span>
                        <input type="tel" class="form-control" name="txtwebsite" placeholder="Nhập website">             
                    </div>

                    <div class="input-group mb-2 "> 
                        <label class="input-group-text col-3" for="inputGroupSelect01">Tên Đơn Vị cha</label>
                        <select class="form-select form-select-sm" name="dvcha" id="dvcha">
                            <option value=null>Trống</option>
                        <?php

                            //truy ván đữ liệu
                            $sql = "SELECT * FROM db_donvi";
                            $result = mysqli_query($conn,$sql);

                            //xử lý kết quả
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<option value = "'.$row['madv'].'">'.$row['tendv'].'</option>';
                                }
                            }

                            //đóng kết nối
                            mysqli_close($conn);
                        ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info" name="add">Thêm</button>
     
                </div>
            </form>     
                      
        </div>        
    </div>
</div>
<?php
    include('templates-admin/footer.php');
?>

<?php
    if(isset($_POST['add'])){
        $tendonvi = $_POST['txtdonvi'];
        $diachi = $_POST['txtdiachi'];
        $sdt = $_POST['sodienthoai'];
        $email = $_POST['txtemail'];
        $website = $_POST['txtwebsite'];
        $madvCha = $_POST['dvcha'];

        //lệnh sql
        $sql="INSERT INTO db_donvi SET 
        tendv = '$tendonvi',
        diachi = '$diachi',
        dienthoai = '$sdt',
        email = '$email',
        website = '$website',
        madv_cha = $madvCha ";

        $query = mysqli_query($conn,$sql);

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($query==TRUE )
        {
            $_SESSION['add-qldv']="<div class='text-success'>Thêm đơn vị thành công.</div>";

            header('location:' .SITEURL. 'admin/index.php');
        }
        else
        {
            $_SESSION['add-qldv']="<div class='text-danger'>Thêm đơn vị thất bại.</div>";
            header('location:' .SITEURL. 'admin/index.php');

        }
   
    }

?>
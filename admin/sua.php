<?php
include('templates-admin/header.php');

?>



<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-success text-center" role="alert">
            <h2>Sửa</h2>
        </div>

  <!-- sửa -->
        <div class="container">
            
            <form action="process-update.php" method = "GET">
                <div class="col-md-5 mx-auto">
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1">Họ và tên</span>
                        <input type="text" class="form-control" name= "txthoten" placeholder="Username"
                            value="<?php echo $row['tennv']; ?>">
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1">Chức Vụ</span>
                        <input type="text" class="form-control" name= "txtchucvu" placeholder="Username"
                            value="<?php echo $row['chucvu']; ?>">
                    </div>
                    
                    <div class="input-group mb-2"> 
                        <span class="input-group-text" id="basic-addon2">Máy bàn</span>
                        <input type="tel" class="form-control" name="mayban" placeholder="Enter Telephone" 
                            value="<?php echo $row['mayban']; ?>">              
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text" id="basic-addon2">Email</span>
                        <input type="email" class="form-control" name="txtemail" placeholder="Enter Email" 
                            value="<?php echo $row['email']; ?>">          
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text" id="basic-addon2">Số điện thoại</span>
                        <input type="tel" class="form-control" name="sodidong" placeholder="Enter Telephone" 
                            value="<?php echo $row['sodidong']; ?>">              
                    </div>

                    <div class="input-group mb-2">
                        <label class="input-group-text" for="inputGroupSelect01">Tên Đơn Vị</label>
                        <select class="form-select form-select-sm" name="sltMaDV" id="sltMaDV">
                        <?php
                                //kết nối server
                                require('../config/constants.php');

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
                    <button type="submit" class="btn btn-info" name="update">Update</button>
                </div>
            </form>
           
        </div>        
    </div>
</div>



<?php
    include('templates-admin/footer.php');
?>


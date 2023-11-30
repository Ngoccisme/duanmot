<div class="container mt-4 warper" style="height: 550px ;">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Quản lý hóa đơn</h3>
    </div>
    <table class="table mt-3">
        <thead class="table-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col text-center" width="100px">Chi tiết</th>
                <th scope="col text-center" width="100px">Xoá</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $index = 1; foreach( $order as $item){  ?>
            <tr>
                <td><?= $index++?></td>
                <td><?=$item['kh_name']?></td>
                <td><?=$item['kh_email']?></td>
                <td><?=$item['kh_address']?></td>
                <td><?=$item['kh_phone']?></td>
                <td>
                    <a
                        href="index.php?url=order-detail&id=<?=$item['hd_id']?>" class="btn btn-success">Chi tiết</a>
                </td>
                <td>
                    <a onclick="return confirm('Bạn có muốn xoá danh mục này ?')"
                        href="index.php?url=order-delete-save&id=<?=$item['hd_id']?>" class="btn btn-danger">Xóa</a>
                </td>
                <td>
                <td>
                <td>
                    <select id="newStatus<?=$item['hd_id']?>" class="form-control">
                        <option value="pending" <?=($item['status'] == 'pending') ? 'selected' : ''?>>Chờ xác nhận</option>
                        <option value="processing" <?=($item['status'] == 'processing') ? 'selected' : ''?>>Đang giao</option>
                        <option value="completed" <?=($item['status'] == 'completed') ? 'selected' : ''?>>Hoàn thành</option>
                        <option value="cancelled" <?=($item['status'] == 'cancelled') ? 'selected' : ''?>>Đã hủy</option>
                    </select>
                </td>
                <td>
                    
                    <form action="update_order_status.php" method="POST">
            <!-- Thêm input ẩn để truyền orderId -->
                        <input type="hidden" name="orderId" value="<?=$item['hd_id']?>">
                        <button class="btn btn-primary">Cập nhật</button>
                    </form>
                </td>
            </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
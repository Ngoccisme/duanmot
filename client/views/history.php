<div class="container mt-4 warper" style="height: 550px ;">
    <div class="d-flex justify-content-between align-items-center">
        <h3>Lịch sử đơn hàng</h3>
    </div>
    <table class="table mt-3">
        <thead class="table-light">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col text-center" width="100px">Trạng Thái</th>
                <th scope="col text-center" width="100px">Chi tiết</th>
                <th scope="col">Huỷ Đơn Hàng</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $index = 1;
        if (!empty($matchedOrders) && is_array($matchedOrders)) {
            foreach ($matchedOrders as $order) {
                ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><?= $order['kh_name'] ?></td>
                    <td><?= $order['order_date'] ?></td>
                    <td><?= getStatusText($order['order_status']) ?></td>
                    <td>
                    <a href="index.php?url=order-detail&id=<?=$order['hd_id']?>" class="btn btn-success">Chi tiết</a>
                    </td>
                    <td>
                        <?php if (!in_array($order['order_status'], [3, 4, 5, 6])) { ?>
                            <form action="index.php?url=update_order" method="POST" onsubmit="return confirmCancellation()">
                                <input type="hidden" name="newStatus[<?= $order['hd_id'] ?>]" value="5">
                                <button type="submit" class="btn btn-danger">Huỷ</button>
                            </form>

                            <script>
                                function confirmCancellation() {
                                    var confirmation = confirm("Bạn có chắc chắn muốn huỷ đơn hàng?");
                                    if (confirmation) {
                                        var reason = prompt("Vui lòng nhập lý do hủy:");
                                        if (reason) {
                                            document.getElementById("reason").value = reason;
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    } else {
                                        return false;
                                    }
                                }
                            </script>
                        <?php } else { ?>
                            
                        <?php } ?>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='6'>Không có đơn hàng</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

 
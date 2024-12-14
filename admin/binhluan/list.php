<div class="content">
    <div class="content__title">Danh sách bình luận</div>
    <div class="sub__content" id="binhluan">
        <div class="sub__content__table">
            <table class="sanpham__table">
                <tr>
                    <th>ID</th>
                    <th>Nội dung</th>
                    <th>ID User</th>
                    <th>ID Sản phẩm</th>
                    <th>Ngày bình luận</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                <?php
                foreach ($listbinhluan as $binhluan) {
                    extract($binhluan);
                    $status_text = ($status == 1) ? "Hiện" : "Ẩn";
                    $new_status = ($status == 1) ? 0 : 1;
                    $suabl = "index.php?act=suabl&id=" . $id . "&status=" . $new_status;
                    $xoabl = "index.php?act=xoabl&id=" . $id;

                    echo '<tr>
                            <td>' . $id . '</td>
                            <td>' . $noidung . '</td>
                            <td>' . $iduser . '</td>
                            <td>' . $idpro . '</td>
                            <td>' . $ngaybinhluan . '</td>
                            <td>' . $status_text . '</td>
                            <td>
                                <a href="' . $suabl . '"><input class="button--edit" type="button" value="' . $status_text . '"></a>
                                <a href="' . $xoabl . '" " onclick="return confirmDelete(' . $id . ');"><input class="button--delete" type="button" value="Xóa"></a>
                            </td>
                        </tr>';
                }
                ?>
            </table>
        </div>
    </div
<div class="content">
    <div class="content__title">Danh sách sản phẩm</div>
    <div class="sub__content" id="sanpham">
        <div class="sub__content__table">
            <table class="sanpham__table">
                <tr>
                    <th>Mã</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Lượt xem</th>
                    <th>Số lượng</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                <?php
                    if (isset($listsanpham_admin) && is_array($listsanpham_admin)) {
                        foreach ($listsanpham_admin as $sanpham) {
                            extract($sanpham);
                            $hien_thi = $hien_thi == 1 ? "Hiển thị" : "Ẩn";
                            $soluong = $soluong == 1 ? "Còn hàng" : "Hết hàng";
                            $suasp = "index.php?act=suasp&id=" . $id;
                            $xoasp = "index.php?act=xoasp&id=" . $id;
                            $hinhpath = "../public/img/sp/" . $img;
                            if (is_file($hinhpath)) {
                                $img = "<img src='" . $hinhpath . "' height='80' alt='sunao'>";
                            } else {
                                $img = "no photo";
                            }
                            echo '<tr>
                                    <td>' . $id . '</td>
                                    <td>' . $name . '</td>
                                    <td>' . $img . '</td>
                                    <td>$ ' . $price . '</td>
                                    <td>' . $luotxem . '</td>
                                    <td>' . $soluong . '</td>
                                    <td>' . $hien_thi . '</td>
                                    <td>
                                        <div class="action">
                                            <a href="' . $suasp . '"><input class="button--edit" type="button" value="Sửa"></a>
                                            <a href="' . $xoasp . '" onclick="return confirmDelete(' . $id . ');"><input class="button--delete" type="button" value="Xóa"></a>
                                        </div>    
                                    </td>
                                </tr>';
                        }
                    }
                ?>

            </table>
        </div>
    </div>
</div>
</div>
<div class="content">
    <div class="content__title">Danh sách bình luận</div>
    <div class="sub__content" id="binhluan">
        <div class="sub__content__table">
            <table class="sanpham__table">
                <tr>
                    <th>ID</th>
                    <th>Nội dung</th>
                    <th>Mô tả</th>
                    <th>Ảnh banner</th>
                    <th>Đường link</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
                <?php
                foreach ($listbanners as $banners) {
                    extract($banners);
                    $status = ($status == 1) ? "Hiện" : "Ẩn";
                    $suabanners = "index.php?act=suabanners&id=" . $id;
                    $xoabanners = "index.php?act=xoabanners&id=" . $id;
                    $hinhpath = "../public/img/banner/" . $image;
                    if (is_file($hinhpath)) {
                        $image = "<img  src='" . $hinhpath . "' height='80' alt='sunao'>";
                    } else {
                        $image = "no photo";
                    }
                    echo '<tr>
                                <td>' . $id . '</td>
                                <td>' . $title . '</td>
                                <td>' . $description . '</td>
                                <td>' . $image . '</td>
                                <td>' . $link . '</td>
                                <td>' . $status . '</td>
                                <td>
                                    <a href="' . $suabanners . '"><input class="button--edit" type="button" value="Sửa"></a>
                                    <a href="' . $xoabanners . '" onclick="return confirmDelete(' . $id . ');"><input class="button--delete" type="button" value="Xóa"></a>
                                </td>
                                </tr>';
                }
                ?>
            </table>
        </div>
    </div
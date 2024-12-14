<?php
if (isset($banners) && is_array($banners)) {
    extract($banners);
}

$hinhpath = "../public/img/banner/" . $image;
if (is_file($hinhpath)) {
    $image = "<img  src='" . $hinhpath . "' height='80' alt='sunao'>";
} else {
    $image = "no photo";
}
?>

<div class="content">
    <div class="content__title">Cập nhật banner</div>
    <div class="sub__content">
    <form class="sub__content__table" action="index.php?act=updatebanners" method="post" enctype="multipart/form-data">
            <div class="sub__content__title">
                <p>Tên</p>
                <input class="input-field" type="text" name="title" value="<?php echo $title; ?>">
            </div>

            <div class="sub__content__title">
                <p>Mô tả</p>
                <input class="input-field" type="text" name="description" value="<?php echo $description; ?>">
            </div>

            <div class="sub__content__title">
                <p>Ảnh</p>
                <div class="input-container">
                    <?php echo $image; ?>
                    <input class="input-field" type="file" name="image" value="">
                    <span class="input-highlight"></span>
                </div>
            </div>

            <div class="sub__content__title">
                <p>Link</p>
                <input class="input-field" type="text" name="link" value="<?php echo $link; ?>">
            </div>

            <div class="sub__content__title">
                <p>Trạng thái</p>
                <select name="status" id="">
                    <option value="1" <?= isset($status) && $status == 1 ? 'selected' : '' ?>>Hiện</option>
                    <option value="0" <?= isset($status) && $status == 0 ? 'selected' : '' ?>>Ẩn</option>
                </select>
            </div>

            <div class="sub__content__button">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input class="button--add" type="submit" name="capnhat" value="Cập nhật">
                <a href="index.php?act=listbanners"><input class="button--list" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ""))
                echo '<div class="thongbao">' . $thongbao . '</div>';
            ?>
        </form>
    </div>
</div>
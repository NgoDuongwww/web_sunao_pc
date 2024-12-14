<div class="content">
  <div class="content__title">Thêm banner</div>
  <div class="sub__content">
    <form class="sub__content__table" action="index.php?act=addbanners" method="post" enctype="multipart/form-data">
      <div class="sub__content__title">
        <p>Tên</p>
        <input oninvalid="this.setCustomValidity('Vui bạn điền tên banner.')" oninput="this.setCustomValidity('')" autofocus class="input-field" placeholder="Nhập tên banner..." type="text" name="title" id="title">
        <span class="input-highlight"></span>
      </div>
      <div class="sub__content__title">
        <p>Mô tả</p>
        <input oninvalid="this.setCustomValidity('Vui điền mô tả banner.')" oninput="this.setCustomValidity('')" autofocus class="input-field" placeholder="Nhập mô tả banner..." type="text" name="description" id="description">
        <span class="input-highlight"></span>
      </div>
      <div class="sub__content__title">
        <p>Ảnh</p>
        <label for="file-upload" class="custom-file-upload">
          Chọn file từ máy tính
        </label>
        <input required oninvalid="this.setCustomValidity('Vui thêm ảnh banner.')" oninput="this.setCustomValidity('')" id="file-upload" type="file" name="image" id="image">
      </div>
      <div class="sub__content__title">
        <p>Đường link</p>
        <input oninvalid="this.setCustomValidity('Vui điền đường link.')" oninput="this.setCustomValidity('')" autofocus class="input-field" placeholder="Nhập đường link..." type="text" name="link" id="link">
        <span class="input-highlight"></span>
      </div>
      <div class="sub__content__title">
        <p>Trảng thái</p>
        <select required oninvalid="this.setCustomValidity('Vui điền trảng thái.')" oninput="this.setCustomValidity('')" name="status" id="status">
          <option value="1">Hiện</option>
          <option value="0">Ẩn</option>
        </select>
      </div>
      <div class="sub__content__button">
        <input class="button--add" type="submit" name="themmoi" value="THÊM MỚI">
        <input class="button--reset" type="reset" value="NHẬP LẠI">
      </div>
      <?php
      if (isset($thongbao) && ($thongbao != ""))
        echo '<div class="thongbao">' . $thongbao . '</div>';
      ?>
    </form>
  </div>
</div>
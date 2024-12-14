<div class="container">
    <div class="content">
        <div class="detail">
            <div class="detail__box">
                <div class="detail__name">ĐĂNG NHẬP ADMIN</div>
                <div class="cart">
                    <form action="" method="post">
                        <p class="acc__title">Tên đăng nhập</p>
                        <div class="input-container">
                            <input required oninvalid="this.setCustomValidity('Vui lòng nhập tên đăng nhập.')" oninput="this.setCustomValidity('')" class="input-field" type="text" name="user">
                            <span class="input-highlight"></span>
                        </div>
                        <p class="acc__title">Mật khẩu</p>
                        <div class="input-container">
                            <input required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu.')" oninput="this.setCustomValidity('')" class="input-field" type="password" name="pass">
                            <span class="input-highlight"></span>
                        </div>
                        <div class="acc__button">
                            <input class="button--add" type="submit" value="Đăng nhập" name="dangnhap">
                            <input class="button--reset" type="reset" value="Nhập lại">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
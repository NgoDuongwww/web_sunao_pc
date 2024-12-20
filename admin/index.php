<?php
include '../model/pdo.php';
include '../model/danhmuc.php';
include '../model/sanpham.php';
include '../model/taikhoan.php';
include '../model/binhluan.php';
include '../model/cart.php';
include '../model/banners.php';
include 'header.php';



if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công!";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $sql = "SELECT * FROM danhmuc order by id desc";
            $listdanhmuc =  loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $sql = "SELECT * FROM danhmuc order by id desc";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone($_GET['id']);
            }
            include "danhmuc/update.php";
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhật thành công";
            }
            $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;

        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }


                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thongbao = "Thêm thành công!";
            }
            $listdanhmuc =  loadall_danhmuc();
            include "sanpham/add.php";
            break;

        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $sql = "SELECT * FROM sanpham order by id desc";
            $listdanhmuc =  loadall_danhmuc();
            $listsanpham_admin =  loadall_sanpham_admin($kyw = "", $iddm = 0);
            include "sanpham/list.php";
            break;

        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham_admin = loadall_sanpham_admin($kyw = "", $iddm = 0);
            $sql = "SELECT * FROM sanpham order by id desc";
            $listsanpham = pdo_query($sql);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc =  loadall_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $soluong = $_POST['soluong'];
                $hien_thi = $_POST['hien_thi'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh, $hien_thi, $soluong);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc =  loadall_danhmuc();
            $listsanpham_admin =  loadall_sanpham_admin($kyw = "", $iddm = 0);
            include "sanpham/list.php";
            break;

        case 'dskh':
            $listtaikhoan =  loadall_taikhoan();
            include "taikhoan/list.php";
            break;

        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $sql = "SELECT * FROM taikhoan order by id desc";
            $listtaikhoan = pdo_query($sql);
            include "taikhoan/list.php";
            break;

        case 'dsbl':
            $listbinhluan =  loadall_binhluan_admin(0);
            include "binhluan/list.php";
            break;

        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sql = "delete from binhluan where id=" . $_GET['id'];
                pdo_execute($sql);
            }
            $sql = "SELECT * FROM binhluan order by id desc";
            $listbinhluan = pdo_query($sql);
            include "binhluan/list.php";
            break;

        case 'suabl':
            if (isset($_GET['id']) && isset($_GET['status'])) {
                $id = $_GET['id'];
                $status = $_GET['status'];
                    
                update_binhluan($id, $status);
            }
                
                $listbinhluan = loadall_binhluan_admin(0);
                include "binhluan/list.php";
                break;

        case 'listbill':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = '';
            }
            $listbill =  loadall_bill($kyw, 0);
            include "bill/listbill.php";
            break;

        case 'xoabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // Xóa các dòng liên quan trong bảng 'cart' trước
                $sql = "DELETE FROM cart WHERE idbill=" . $_GET['id'];
                pdo_execute($sql);

                // Sau đó mới xóa dòng trong bảng 'bill'
                $sql = "DELETE FROM bill WHERE id=" . $_GET['id'];
                pdo_execute($sql);
            }
            $sql = "SELECT * FROM bill order by id desc";
            $listbill = pdo_query($sql);
            include "bill/listbill.php";
            break;

        case 'suabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // Load thông tin của đơn hàng cần sửa từ cơ sở dữ liệu
                $bill = loadone_bill($_GET['id']);
                include "bill/editbill.php"; // File biểu mẫu để sửa đơn hàng
            }
            break;

        case 'updatebill':
            if (isset($_POST['update_bill']) && ($_POST['update_bill'])) {
                $id = $_POST['bill_id'];
                $name = $_POST['bill_user'];
                $ngaydathang = $_POST['ngaydathang'];
                $total = $_POST['total'];
                $status = $_POST['bill_status'];

                // Gọi hàm update_bill để cập nhật thông tin đơn hàng
                update_bill($id, $name, $ngaydathang, $total, $status);

                // Sau khi cập nhật, điều hướng về trang danh sách đơn hàng
                $sql = "SELECT * FROM bill order by id desc";
                $listbill = pdo_query($sql);
                // header('Location: index.php?act=listbill');
                include "bill/listbill.php";
                exit();
            }
            break;

        case 'thongke':
            $listthongke =  loadall_thongke();
            include "thongke/list.php";
            break;

        case 'bieudo':
            $listthongke =  loadall_thongke();
            $listcart =  loadall_cart_thongke();
            $luotxemsp = loadall_sanpham_xemnhieunhat();
            include "thongke/bieudo.php";
            break;
        
        case 'listbanners':
            $listbanners = loadall_banners_admin();
            include "banners/list.php";
            break;

        case 'addbanners':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $image = $_FILES['image']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $link = $_POST['link'];
                $status = $_POST['status'];
                if (move_uploaded_file($_FILES["image"]["name"], $target_file)) {
                    // echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                insert_banners($title, $description, $image, $link, $status);
                $thongbao = "Thêm thành công";
            }
            include "banners/add.php";
            break;
        
        case 'xoabanners':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_banners($_GET['id']);
            }
            $listbanners = loadall_banners_admin();
            $sql = "SELECT * FROM banners order by id desc";
            $listbanners = pdo_query($sql);
            include "banners/list.php";
            break;
        
        case 'suabanners':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $banners = loadone_banners($_GET['id']);
            }
            include "banners/update.php";
            break;

        case 'updatebanners':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $image = $_FILES['image']['name'];
                $target_dir = "../public/img/banner/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $link = $_POST['link'];
                $status = $_POST['status'];
                if (move_uploaded_file($_FILES["image"]["name"], $target_file)) {
                    // echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_banners($id, $title, $description, $image, $link, $status);
            }
            $listbanners = loadall_banners_admin();
            include "banners/list.php";
            break;

        default:
            include "home.php";
            break;
    }
} else {
    include 'home.php';
}

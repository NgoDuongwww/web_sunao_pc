document.addEventListener("DOMContentLoaded", (event) => {
  const menuItems = document.querySelectorAll(".menu__sub1 > li");

  menuItems.forEach((item) => {
    item.addEventListener("click", (e) => {
      // Ngăn chặn sự kiện click lan truyền lên các phần tử cha
      e.stopPropagation();

      // Đóng tất cả các menu con khác
      menuItems.forEach((i) => {
        if (i !== item) {
          i.classList.remove("active");
        }
      });

      // Bật hoặc tắt lớp active cho mục được click
      item.classList.toggle("active");
    });
  });

  // Đóng menu con khi click bên ngoài menu
  document.addEventListener("click", () => {
    menuItems.forEach((item) => {
      item.classList.remove("active");
    });
  });
});
document.addEventListener("keydown", function (event) {
  if (event.ctrlKey) {
    event.preventDefault();
  }

  if (event.keyCode == 123) {
    event.preventDefault();
  }
});
document.addEventListener(
  "contextmenu",

  (event) => event.preventDefault()
);

// Ẩn hiện sản phẩm
document.querySelectorAll('.toggle-status').forEach(function(checkbox) {
  checkbox.addEventListener('change', function() {
      var productId = this.getAttribute('data-id');
      var status = this.checked ? 1 : 0;
      
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'index.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
          if (xhr.status === 200) {
              var response = JSON.parse(xhr.responseText);
              if (response.success) {
                  console.log("Trạng thái sản phẩm đã được cập nhật.");
              } else {
                  console.error("Lỗi khi cập nhật trạng thái.");
              }
          }
      };
      xhr.send('product_id=' + productId + '&status=' + status);
  });
});

//Xác nhận xoá trong admin
function confirmDelete(id) {
  return confirm("Bạn có chắc chắn muốn xóa mục này không?");
}
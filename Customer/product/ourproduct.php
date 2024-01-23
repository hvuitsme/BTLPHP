<div class="row">
  <h1 class="text-center text-white">
    <img data-src="" src="https://demo.try-builder.commt-content/uploads/2018/04/mt-1422_header_logo1.png" class="" data-id="1120" title="" alt="" />
  </h1>

  <h1 class="text-center text-white mb-4">OUR PRODUCTS</h1>
  <?php
  include "../db/dbconnect.php";

  // Sửa câu truy vấn SQL để lấy ngẫu nhiên 8 dòng
  $sql = "SELECT `image_sp`, `name_sp`, `code_sp`, `price` FROM `tb_product` WHERE `code_sp` LIKE '%BM%' OR `code_sp` LIKE '%DC%' ORDER BY RAND() LIMIT 8;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Duyệt qua từng dòng dữ liệu
    while ($row = $result->fetch_assoc()) {
  ?>
      <div class="col-sm-3">
        <div class="card sp" style="width: 100%" onmouseover="addHoverEffect(this)" onmouseout="removeHoverEffect(this)" onclick="redirectToProductDetails('<?= $row['code_sp'] ?>')">
          <img class="h-100" src="data:image/jpeg;base64,<?= base64_encode($row['image_sp']) ?>" alt="" />
          <a href="#" class="eye-link">
            <i class="fa-regular fa-eye"></i>
          </a>
        </div>

        <div class="d-flex justify-content-center pt-3">
          <p class="m-0 text-center">
            <?= $row['name_sp'] ?><br>
            <!-- <?= $row['code_sp'] ?><br> -->
            <?= '<span style="color: #dc3545;">' . number_format($row['price']) . '&#8363;</span>' ?>
          </p>
        </div>

        <div class="d-flex justify-content-center pt-3">
          <form method="post" action="add2cart.php">
            <input type="hidden" name="product_image" value="<?= base64_encode($row['image_sp']) ?>">
            <input type="hidden" name="product_name" value="<?= $row['name_sp'] ?>">
            <input type="hidden" name="product_code" value="<?= $row['code_sp'] ?>">
            <input type="hidden" name="product_price" value="<?= $row['price'] ?>">

            <button type="submit" name="add_to_cart" class="btn btn-danger">
              Thêm vào giỏ hàng
            </button>
          </form>
        </div>
      </div>
  <?php
    }
  } else {
    echo "Không có dữ liệu";
  }

  // Đóng kết nối
  $conn->close();
  ?>
</div>
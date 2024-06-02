<?php
session_start();
if ($_SESSION['username'] == null) {
    header('location:../login.php');
}

// Koneksi ke basis data
include '../koneksi.php';

// Ambil jumlah transaksi
$sql = "SELECT COUNT(*) as total_transactions FROM tb_transaction";
$result = mysqli_query($koneksi, $sql);
$total_transactions = mysqli_fetch_assoc($result)['total_transactions'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="../css/admin.css" />
   <!-- Boxicons CDN Link -->
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Ryujin Admin | Transaction</title>
</head>

<body>
   <div class="sidebar">
      <div class="logo-details">
         <i class="bx bx-store"></i>
         <span class="logo_name">Ryujin</span>
      </div>
      <ul class="nav-links">
         <li>
            <a href="../admin.php" class="active">
               <i class="bx bx-right-indent"></i>
               <span class="links_name">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="../categories/categories.php">
               <i class="bx bx-store"></i>
               <span class="links_name">Categories</span>
            </a>
         </li>
         <li>
            <a href="../transaction/transaction.php">
               <i class="bx bx-basket"></i>
               <span class="links_name">Transaction</span>
            </a>
         </li>
         <li>
            <a href="../logout.php">
               <i class="bx bx-log-out-circle"></i>
               <span class="links_name">Log out</span>
            </a>
         </li>
      </ul>
   </div>
   <section class="home-section">
      <nav>
         <div class="sidebar-button">
            <i class="bx bx-menu sidebarBtn"></i>
         </div>
         <div class="profile-details">
            <span class="admin_name">Ryujin Admin</span>
         </div>
      </nav>
      <div class="home-content">
         <h3>Transaction</h3>
         <div class="widget">
             <h3>Total Transactions: <?php echo $total_transactions; ?></h3>
         </div>
         <button><a href="transaction-cetak.php">CETAK</a></button>
         <table class="table-data">
            <thead>
               <tr>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $sql = "SELECT * FROM tb_transaction";
               $result = mysqli_query($koneksi, $sql);
               if (mysqli_num_rows($result) == 0) {
                  echo "
                  <h3 style='text-align: center; color: red;'>Data Kosong</h3>
               ";
               } else {
                  while ($data = mysqli_fetch_assoc($result)) {
                     echo "
                     <tr>
                         <td>$data[tanggal]</td>
                         <td>$data[nama]</td>
                         <td>$data[jenis]</td>
                         <td>$data[harga]</td>
                         <td><p class='success'>$data[status]</p></td>
                         <td style='display: none;'>$data[nomorhp]</td>
                         <td>
                         <button class='btn_detail' data-nomorhp='$data[nomorhp]' onclick='showDetails(\"$data[tanggal]\", \"$data[nama]\", \"$data[jenis]\", \"$data[harga]\", \"$data[status]\")'>Detail</button>
                         </td>
                     </tr>
                     ";
                  }
               }
               ?>
            </tbody>
         </table>
      </div>
   </section>
   <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function() {
         sidebar.classList.toggle("active");
         if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
         } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };

      function showDetails(tanggal, nama, kategori, harga, status) {
         let nomorhp = event.target.getAttribute('data-nomorhp');
         alert(`Tanggal: ${tanggal}\nNama: ${nama}\nKategori: ${kategori}\nHarga: ${harga}\nNomor HP: ${nomorhp}\nStatus: ${status}`);
      }
   </script>
</body>

</html>

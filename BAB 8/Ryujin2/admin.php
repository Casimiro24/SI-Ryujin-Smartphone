<?php 
	session_start();
	if($_SESSION['username'] == null) {
		header('location:login.php');
	}

	// Koneksi ke basis data
	include 'koneksi.php';

	// Ambil jumlah kategori
	$sql_categories = "SELECT COUNT(*) as total_categories FROM tb_categories";
	$result_categories = mysqli_query($koneksi, $sql_categories);
	$total_categories = mysqli_fetch_assoc($result_categories)['total_categories'];

	// Ambil jumlah transaksi
	$sql_transactions = "SELECT COUNT(*) as total_transactions FROM tb_transaction";
	$result_transactions = mysqli_query($koneksi, $sql_transactions);
	$total_transactions = mysqli_fetch_assoc($result_transactions)['total_transactions'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="assets/icon.png" />
	<link rel="stylesheet" href="css/admin.css" />
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Ryujin Admin</title>
	<style>
        body {
            background-image: url('assets/b1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .home-section {
            background: rgba(255, 255, 255, 0.8); /* Warna putih dengan sedikit transparansi */
            padding: 20px;
            border-radius: 10px;
        }

        .widget {
			margin: 10px 0;
			padding: 20px;
			background: #58e697;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			display: flex;
			align-items: center;
			justify-content: space-between;
			transition: transform 0.3s ease-in-out;
		}

		.widget:hover {
			transform: translateY(-5px);
		}

		.widget-icon {
			font-size: 2.5rem;
			color: #007BFF;
		}

		.widget-content {
			text-align: right;
		}

		.widget-content h3 {
			margin: 0;
			font-size: 1.5rem;
			color: #333;
		}

		.widget-content p {
			margin: 0;
			font-size: 1rem;
			color: #666;
		}
    </style>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
			<i class="bx bx-store"></i>
			<span class="logo_name">Ryujin</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="#" class="active">
					<i class="bx bx-right-indent"></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="categories/categories.php">
					<i class="bx bx-store"></i>
					<span class="links_name">Categories</span>
				</a>
			</li>
			<li>
				<a href="transaction/transaction.php">
					<i class="bx bx-basket"></i>
					<span class="links_name">Transaction</span>
				</a>
			</li>
			<li>
				<a href="logout.php">
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
			<h2 id="text">
				<?php 
					echo $_SESSION['username'];
				?>
			</h2>
			<h3 id="date"></h3>
			<div class="widget">
				<div class="widget-icon">
					<i class="bx bx-category"></i>
				</div>
				<div class="widget-content">
					<h3><?php echo $total_categories; ?></h3>
					<p>Total Categories</p>
				</div>
			</div>
			<div class="widget">
				<div class="widget-icon">
					<i class="bx bx-dollar-circle"></i>
				</div>
				<div class="widget-content">
					<h3><?php echo $total_transactions; ?></h3>
					<p>Total Transactions</p>
				</div>
			</div>
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

		function myFunction() {
			const months = ["Januari", "Februari", "Maret", "April", "Mei",
				"Juni", "Juli", "Agustus", "September",
				"Oktober", "November", "Desember"
			];
			const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis",
				"Jumat", "Sabtu"
			];
			let date = new Date();
			jam = date.getHours();
			tanggal = date.getDate();
			hari = days[date.getDay()];
			bulan = months[date.getMonth()];
			tahun = date.getFullYear();
			let m = date.getMinutes();
			let s = date.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
			requestAnimationFrame(myFunction);
		}

		function checkTime(i) {
			if (i < 10) {
				i = "0" + i;
			}
			return i;
		}
		window.onload = function() {
			let date = new Date();
			jam = date.getHours();
			if (jam >= 4 && jam <= 10) {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Pagi Dan Selamat Datang,");
			} else if (jam >= 11 && jam <= 14) {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Siang Dan Selamat Datang,");
			} else if (jam >= 15 && jam <= 18) {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Sore Dan Selamat Datang,");
			} else {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Malam Dan Selamat Datang,");
			}
			myFunction();
		};
	</script>
</body>

</html>

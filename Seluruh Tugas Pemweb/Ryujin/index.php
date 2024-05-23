<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="assets/icon.png" />
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .carousel {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scroll-behavior: smooth;
            width: 100%;
            height: 300px;
        }

        .carousel-item {
            scroll-snap-align: center;
            flex-shrink: 0;
            width: 75%;
            height: 75%;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div class="Logo">
                    <img src="assets/Logo.png" alt="" width="150" Weight="75" />
                </div>
                <input type="checkbox" id="click" />
                <label for="click" class="menu-btn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="login.php" class="btn_login">Login</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="Bahan">
                <div class="Bahan-text">
                    <h1>Ambilah Samartphomu Dan Nikmati Firutnya</h1>
                    <p> Lewati Hari-Harimu Dengan Smartphone Moderen
                    </p>
                    <button type="button" class="btn_getStarted">Get Started</button>
                </div>
                <div class="Bahan-img">
                    <img src="assets/Bahan.jpg" alt="" />
                </div>
            </div>
            <div class="carousel">
                <div class="carousel-item">
                    <img src="assets/S24.PNG" alt="gambar tidak ditemukan" />
                </div>
                <div class="carousel-item">
                    <img src="assets/Oppo.jpg" alt="gambar tidak ditemukan" />
                </div>
                <div class="carousel-item">
                    <img src="assets/Iphone.jpg" alt="gambar tidak ditemukan" />
                </div>
            </div>
            <div class="cards-categories">
                <h2>Kategori Smartphone</h2>
                <div class="card-categories">
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/S24.PNG" alt="gambar tidak ditemukan" />
                        </div>
                        <div class="card-content">
                            <h5>Samsung</h5>
                            <p class="description">Smartphone Samsung S24 dengan fitur canggih dan kamera yang
                                berkualitas.
                                Jalani Harimu bersama samsung.
                            </p>
                            <p class="price"><span>Rp.</span>5.000.000</p>
                            <button class="btn_belanja" type="submit">Beli</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/Oppo.jpg" alt="gambar tidak ditemukan" />
                        </div>
                        <div class="card-content">
                            <h5>Oppo A79</h5>
                            <p class="description">Smartphone OPPO A79 5G dengan konektivitas 5G dan desain yang
                                stylish.</p>
                            <p class="price"><span>Rp.</span>3.000.000</p>
                            <button class="btn_belanja" type="submit">Beli</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image">
                            <img src="assets/Iphone.jpg" alt="gambar tidak ditemukan" />
                        </div>
                        <div class="card-content">
                            <h5>Iphone 13</h5>
                            <p class="description">Smartphone iPhone 13 dengan performa tinggi dan sistem operasi iOS
                                terbaru.</p>
                            <p class="price"><span>Rp.</span>12.000.000</p>
                            <button class="btn_belanja" type="submit">Beli</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <h4>&copy; Ryujin SmartPhone 2024</h4>
        </footer>
    </div>

    <script>

        var carousel = document.querySelector('.carousel');

        var items = document.querySelectorAll('.carousel-item');

        var currentIndex = 0;

        var nextButton = document.createElement('button');
        nextButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
        nextButton.classList.add('carousel-button', 'next');
        nextButton.addEventListener('click', function () {
            currentIndex = (currentIndex + 1) % items.length;
            updateCarousel();
        });
        carousel.appendChild(nextButton);

        var prevButton = document.createElement('button');
        prevButton.innerHTML = '<i class="fas fa-chevron-left"></i>';
        prevButton.classList.add('carousel-button', 'prev');
        prevButton.addEventListener('click', function () {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            updateCarousel();
        });
        carousel.appendChild(prevButton);

        function updateCarousel() {
            carousel.style.transform = 'translateX(-' + (currentIndex * items[0].offsetWidth) + 'px)';
        }

        window.addEventListener('resize', function () {
            updateCarousel();
        });

        updateCarousel();
    </script>
</body>

</html>

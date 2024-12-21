<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batik Gems</title>

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png">
    <link rel="stylesheet" href="public/css/about.css">
</head>
<body>
    
    <!-- HEADER -->
    <header>
        <!-- NAV -->
        <nav class="sticky">
            <div class="container navbar">
                <div class="navbar-left">
                    <div class="navbar-logo">
                        <a href="index.php"><img src="public/images/logo/logo-arvene-ver.png" alt="logo"></a>
                    </div>
                    <div class="overlay">
                        <ul class="menu">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="online/index.php">shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">about</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="customerservice.php">customer service</a>
                            </li>
                            <div class="sign-in">
                                <button class="btn-signIn"><a href="sign-up.php">sign in</a></button>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="navbar-right">
                    <div class="navbar-button icon1">
                        <a href="online/keranjang.php"></a>
                    </div>
                    <div class="navbar-button icon2">
                        <a href="online/masuk.php"></a>
                    </div>
                    <div class="navbar-button hamburger">
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- ABOUT -->
    <section class="about">
        <div class="container">
            <div class="hero reverse">
                <div class="intro">
                    <div class="heading">
                        <h2>Sejarah Batik Di Indonesia</h2>
                    </div>
                    <div class="bottom">
                        <p>Batik adalah seni tradisional Indonesia yang telah diakui sebagai Warisan Budaya Takbenda Dunia oleh UNESCO sejak tahun 2009.
                            Batik merupakan teknik pewarnaan kain dengan pola-pola indah yang dibuat melalui proses canting (menulis dengan lilin panas) atau cap (stempel).
                            Batik Indonesia memiliki kekayaan motif, warna, dan makna simbolis yang mendalam.</p>
                        <br>
                        <p>Sejarah Batik Indonesia dapat ditelusuri kembali hingga ribuan tahun yang lalu. Catatan tertua tentang adanya batik di Indonesia berasal dari
                            prasasti yang ditemukan di Candi Borobudur, yang diperkirakan berasal dari abad ke-8.
                            Batik awalnya merupakan simbol status sosial dan keagungan, serta digunakan untuk pakaian kerajaan dan upacara keagamaan.</p>
                        <br>
                        <p>Setiap daerah di Indonesia memiliki keunikan dalam batiknya sendiri. </p>
                    </div>
                </div>
                <div class="pic pic1"></div>
            </div>
            <div class="hero row">
                <div class="intro">
                    <p>Batik Jawa: Batik Jawa memiliki berbagai macam corak dan motif seperti Parang, Kawung, Truntum, dan Mega Mendung. Setiap motif memiliki makna dan filosofi tersendiri.<br><br>
Batik Solo: Batik Solo dikenal dengan motif-motif yang lebih halus dan beragam seperti Sidomukti, Sekar Jagad, dan Sido Luhur. Batik Solo juga terkenal dengan teknik batik tulis yang rumit.</p>
                    <br>
                    <p>Batik Yogyakarta: Batik Yogyakarta memiliki kekhasan dengan motif-motif seperti Sogan, Tambal, dan Grompol. Batik Yogyakarta juga terkenal dengan teknik pembuatan batik menggunakan canting yang halus.<br><br>
Batik Pekalongan: Batik Pekalongan dikenal dengan warna-warna yang cerah dan motif yang beragam, seperti motif tumbuh-tumbuhan, hewan, dan geometris. Batik Pekalongan juga sering dijadikan sebagai inspirasi dalam desain batik modern.<br><br>
Batik Madura: Batik Madura memiliki ciri khas dengan warna yang tajam dan kontras serta motif-motif yang kuat seperti Ceplok, Gilikan, dan Lingko Madu.</p>
                    
                </div>
                <div class="pic pic2"></div>
            </div>
            <div class="youth-den">
                <img class="yd-pic" src="public/images/pics/3.jpg" alt="">
                <img class="yd-pic" src="public/images/pics/7.jpg" alt="">
                <img class="yd-pic" src="public/images/pics/5.jpg" alt="">
                <div class="youth-den-p">
                    
                    <div class="bottom">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

    <script src="public/js/hamburger.js"></script>
    <script src="public/js/span-youthden.js"></script>
</body>
</html>
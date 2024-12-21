<?php 

    include 'includes/connection.php'; 

    $con = openCon(); // open connection
    $dbSelected = $con->select_db('batik'); // harus disesuaikan ?
    if (!$dbSelected) {
        die("Can\'t use test_db : " . mysqli_error($con));
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png">
    <link rel="stylesheet" href="public/css/main.css">

    <title>Batik Gems</title>
</head>
<body>

    <!-- HEADER -->
    <header>
        <!-- NAV -->
        <nav>
            <div class="container navbar">
                <div class="navbar-left">
                    <div class="navbar-logo">
                        <a href="#"><img src="public/images/logo/logo-arvene-ver.png" alt="logo"></a>
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
                                <button class="btn-signIn"><a href="online/masuk.php">sign in</a></button>
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

        <!-- HERO SECTION -->
        <section class="hero">
            <div class="container">
                <div class="heading">
                    <h1>Batik GEMS Est.2024 </h1>
                </div>
                <div class="bottom">
                    <h2>Gems Indonesia 2024</h2>
                    <p>Indonesia yang telah diakui sebagai Warisan Budaya Takbenda Dunia oleh UNESCO sejak tahun 2009.</p>
                    <div class="explore">
                        <button class="btn-explore"><a class="nav-link" href="online/index.php">Jelajahi</a></button>
                    </div>
                </div>
            </div>
        </section>
    </header>

    <!-- COLLECTION -->
    <section class="collection">
        <div class="container">
            <div class="heading">
                <h2>Macam Batik</h2>
                <button class="btn-explore2"><a class="nav-link" href="online/index.php">Jelajahi & Belanja</a></button>
            </div>
            <div class="carousel">
               <?php
                    $count_query = "SELECT count(*) FROM produk";
                    $count_result = $con->query($count_query);
                    $count_fetch = mysqli_fetch_array($count_result);
                    $postCount = $count_fetch;
                    $limit = 8;

                    $query = "SELECT * FROM `produk` ORDER BY `produk_id` ASC LIMIT 0, " . $limit;  
                    $result = $con->query($query);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_array()){ 
                            echo "<div class=\"slides item1\">";
                                $img = "online/gambar/produk/" . $row['produk_foto1'];
                                echo "<img src='$img' alt=\"\" class=\"card__image\" />";
                                echo "<div class=\"details\">";
                                    echo "<p class=\"item-title\">" . $row['produk_nama'] . "</p>";
                                    echo "<p class=\"price\">Rp. " . $row['produk_harga'] . "</p>";
                                echo "</div>";
                               

                            echo "</div>";
                        }
                    }
                    ?>

                
                <div class="next-prev">
                    <a class="prev" onclick="plusSlides(-1)">
                        <img src="public/images/icons/prev.png" alt="">
                    </a>
                    <a class="next" onclick="plusSlides(1)">
                        <img src="public/images/icons/next.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT US -->
    <section class="about-us">
        <h2 class="heading">about us</h2>
        <div class="container">
            <div class="left">
                <h2>BATIK GEMS.</h2>
                <p>Sejarah Batik Indonesia dapat ditelusuri kembali hingga ribuan tahun yang lalu. Catatan tertua tentang adanya batik di Indonesia berasal dari prasasti yang ditemukan di Candi Borobudur, yang diperkirakan berasal dari abad ke-8.
                    Batik awalnya merupakan simbol status sosial dan keagungan, serta digunakan untuk pakaian kerajaan dan upacara keagamaan.</p>
                <img src="public/images/pics/a3.jpg" alt="">
            </div>
            <div class="right">
                <img src="public/images/pics/a4.jpg" alt="">
                <div class="read">
                    <h2>YOUTH DEN.</h2>
                    <p>Youth Den is an independent, street fashion brand founded in 2021, inspired by urban space. We create simple and clear things, 
                    paying close attention to details and using innovative materials, combining modern and traditional styles.</p>
                </div>
                <button class="btn-read"><a href="about.php">read</button>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <section class="gallery">
        <div class="container">
            <div class="pic">
                <img src="public/images/pics/1.jpg" alt="">
            </div>
            <div class="pic">
                <img src="public/images/pics/12.jpg" alt="">
            </div>
            <div class="pic">
                <img src="public/images/pics/13.jpg" alt="">
            </div>
            <div class="span2">
                <p>"Batik merupakan teknik pewarnaan kain dengan pola-pola indah yang dibuat melalui proses canting (menulis dengan lilin panas) atau cap (stempel). "</p>
            </div>
            <div class="pic">
                <img src="public/images/pics/14.jpg" alt="">
            </div>
            <div class="pic">
                <img src="public/images/pics/15.jpg" alt="">
            </div>
            <div class="span2"></div>
            <div class="pic">
                <img src="public/images/pics/16.jpg" alt="">
            </div>
            <div class="pic">
                <img src="public/images/pics/17.jpg" alt="">
            </div>
            <div class="pic"></div>
            <div class="pic"></div>
            <div class="pic">
                <img src="public/images/pics/8.jpg" alt="">
            </div>
            <div class="pic"></div>
            <div class="pic">
                <img src="public/images/pics/18.jpg" alt="">
            </div>
            <div class="pic"></div>
            <div class="pic">
                <img src="public/images/pics/19.jpg" alt="">
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

    <?php
        closeCon($con); // close connection
    ?>

    <script src="public/js/app.js"></script>
    <script src="public/js/hamburger.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batik Gems</title>

    <link rel="icon" type="image/png" href="public/images/logo/logo-arvene-ver.png">
    <link rel="stylesheet" href="public/css/customerservice.css">
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
    </header>

    <!-- CUSTOMER SERVICE -->
    <section class="customerservice">
        <div class="container">

            <div class="hero row">
                <div class="intro">

                    <div class="heading">
                        <h2>Customer Service</h2>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">BAGAIMANA CARA SAYA MELAKUKAN PEMESANAN?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" stroke-width="7" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                Pergi ke bagian SHOP dan jelajahi pilihan produk yang tersedia.
                                Tambahkan dan kelola item yang diinginkan ke dalam keranjang Anda.
                                Lanjutkan ke checkout dan isi formulir yang muncul di layar Anda.
                                Tunggu email konfirmasi dari perwakilan penjualan online kami dan pesanan Anda akan
                                dipersiapkan dan segera dikirim.
                            </p>
                        </div>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">SAYA SUDAH MELAKUKAN PEMESANAN, APA SELANJUTNYA?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" stroke-width="7" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                Setelah Anda melakukan pemesanan, Anda akan menerima email dengan detail pesanan Anda.
                                Email tersebut akan menjelaskan kapan pesanan Anda akan dikirim, serta detail seperti
                                pakaian yang dipesan, ukuran, dan alamat pengiriman.
                            </p>
                        </div>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">BERAPA LAMA PESANAN SAYA AKAN SAMPAI?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" stroke-width="7" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                Lama pengiriman pesanan Anda dapat bervariasi tergantung pada layanan kurir yang Anda
                                pilih.
                                Setiap layanan kurir memiliki estimasi waktu pengiriman yang berbeda-beda.
                                Pastikan untuk memilih layanan kurir yang sesuai dengan kebutuhan dan preferensi Anda.
                                Informasi tentang estimasi waktu pengiriman akan tersedia saat Anda memilih layanan
                                pengiriman
                                selama proses pembelian.
                            </p>
                        </div>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">BAGAIMANA PROSES PENGEMBALIAN DANA?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" stroke-width="7" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                Proses pengembalian dana kami sangat mudah. Setelah kami menerima barang yang Anda
                                kembalikan dan
                                memverifikasi bahwa barang tersebut dalam kondisi yang sesuai, kami akan menginisiasi
                                proses
                                pengembalian dana Anda. Dana akan dikembalikan menggunakan metode pembayaran yang Anda
                                gunakan
                                saat pembelian.
                            </p>
                        </div>
                    </div>

                    <div class="faq">
                        <div class="question">
                            <h3 class="ques">ADA PERTANYAAN LAIN?</h3>
                            <svg width="15" height="10" viewBox="0 0 42 25">
                                <path d="M3 3L21 21L39 3" stroke="black" stroke-width="7" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="answer">
                            <p>
                                Jika Anda memiliki pertanyaan lain, silakan hubungi kami melalui tautan WhatsApp <a href="https://wa.me/6281233668242">di sini</a>.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>

    <script src="public/js/hamburger.js"></script>
    <script src="public/js/span-youthden.js"></script>
    <script src="public/js/faq.js"></script>
</body>

</html>
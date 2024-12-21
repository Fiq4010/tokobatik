<?php include 'header.php'; ?>
<?php
$koefisien = array(array());
function kesimpulan($jumlah_persamaan)
{
  global $koefisien;
  echo 'Sehingga: ';
  for ($i = 0; $i < $jumlah_persamaan; $i++) {
    echo '<br>X<sub>' . $i . '</sub>: ';
    for ($j = 0; $j < $jumlah_persamaan + 1; $j++) {
      if ($j == $jumlah_persamaan) {
        echo $koefisien[$i][$j];
      }
    }
  }
}

function buatArray($jumlah_persamaan)
{
  global $koefisien;
  for ($i = 0; $i < $jumlah_persamaan; $i++) {
    for ($j = 0; $j < $jumlah_persamaan + 1; $j++) {
      if (isset($_GET['var' . $i . $j])) {
        $koefisien[$i][$j] = $_GET['var' . $i . $j];
      }
    }
  }
}

function tampilkanMatrik($koefisien)
{
  echo '<table id="hasil">';
  $rows = count($koefisien);

  for ($i = 0; $i < $rows; $i++) {
    $cols = count($koefisien[$i]);
    echo '<tr>';
    for ($j = 0; $j < $cols; $j++) {
      echo '<td>';
      echo str_replace('-0', '0', $koefisien[$i][$j]);

      echo '</td>';
    }
    echo '</tr>
';
  }
  echo '</table>
';
  echo '<hr>
';
}

function ubah($persamaan)
{
  global $koefisien;
  for ($i = 0; $i < $persamaan; $i++) {
    $persamaan_pivot = $i + 1;
    echo 'Persamaan ' . $persamaan_pivot . ' menjadi pivot dan ';
    $pivot = $koefisien[$i][$i];
    for ($j = 0; $j < $persamaan + 1; $j++) {
      $koefisien[$i][$j] = $koefisien[$i][$j] / $pivot;
    }

    for ($k = 0; $k < $persamaan; $k++) {
      if ($k != $i) {
        $pivot = $koefisien[$k][$i];
        for ($l = 0; $l < $persamaan + 1; $l++) {
          $koefisien[$k][$l] = $koefisien[$k][$l] - $pivot * $koefisien[$i][$l];
        }
      }
      $persamaan_ubah = $k + 1;
      echo 'Persamaan ' . $persamaan_ubah . ' telah dirubah';
      tampilkanMatrik($koefisien);
    }
  }
}
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
     Perhitungan
      <small>Control panel</small>
    </h1>
  </section>


  <section class="content">

    <div class="row">
      <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="row justify-content-between gy-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
              <h2>Perhitungan Gauss Jordan</h2>
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                <ul>
                  Persamaan 1:
                  <input type="text" name="var00" size="1" value="15" readonly> Keramik +
                  <input type="text" name="var01" size="1" value="10" readonly> Besi +
                  <input type="text" name="var02" size="1" value="6" readonly> Bahan cor =
                  <input type="text" name="var03" size="1" required>
                </ul>
                <ul>
                  Persamaan 2:
                  <input type="text" name="var10" size="1" value="12" readonly> Keramik +
                  <input type="text" name="var11" size="1" value="6" readonly> Besi +
                  <input type="text" name="var12" size="1" value="2" readonly> Bahan cor =
                  <input type="text" name="var13" size="1" required>
                </ul>
                <ul>
                  Persamaan 3:
                  <input type="text" name="var20" size="1" value="12" readonly> Keramik +
                  <input type="text" name="var21" size="1" value="6" readonly> Besi +
                  <input type="text" name="var22" size="1" value="3" readonly> Bahan cor =
                  <input type="text" name="var23" size="1" required>
                </ul>
                <input type="submit" value="Submit" name="submit" class="btn btn-success">
                <hr> 
              </form>
              </form>

              <?php
              if (isset($_GET['submit'])) {
                echo '<h1>Hasil dalam bentuk matriks</h1>';
                setcookie('jumlah_persamaan', 3);

                if (isset($_COOKIE['jumlah_persamaan'])) {
                  $jumlah_persamaan = $_COOKIE['jumlah_persamaan'];
                  buatArray($jumlah_persamaan);
                  echo '<h3>Tampilan Matrik Pertama</h3>';
                  tampilkanMatrik($koefisien);
                  ubah($jumlah_persamaan);
                  kesimpulan($jumlah_persamaan);
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>

   <script>

  $(document).ready(function(){

    function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $('.jumlah').on("keyup",function(){
      var nomor = $(this).attr('nomor');

      var jumlah = $(this).val();

      var harga = $("#harga_"+nomor).val();

      var total = jumlah*harga;

      var t = numberWithCommas(total);

      $("#total_"+nomor).text("Rp. "+t+" ,-");
    });
  });








  $(document).ready(function(){
    $('#provinsi').change(function(){
      var prov = $('#provinsi').val();


      var provinsi = $("#provinsi :selected").text();

      $.ajax({
        type : 'GET',
        url : 'rajaongkir/cek_kabupaten.php',
        data :  'prov_id=' + prov,
        success: function (data) {
          $("#kabupaten").html(data);
          $("#provinsi2").val(provinsi);
        }
      });
    });

    $(document).on("change","#kabupaten",function(){

      var asal = 152;
      var kab = $('#kabupaten').val();
      var kurir = "a";
      var berat = $('#berat2').val();

      var kabupaten = $("#kabupaten :selected").text();

      $.ajax({
        type : 'POST',
        url : 'rajaongkir/cek_ongkir.php',
        data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
        success: function (data) {
          $("#ongkir").html(data);
          // alert(data);

          // $("#provinsi").val(prov);
          $("#kabupaten2").val(kabupaten);

        }
      });
    });

    function format_angka(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $(document).on("change", '.pilih-kurir', function(event) { 
      // alert("new link clicked!");
      var kurir = $(this).attr("kurir");
      var service = $(this).attr("service");
      var ongkir = $(this).attr("harga");
      var total_bayar = $("#total_bayar").val();

      $("#kurir").val(kurir);
      $("#service").val(service);
      $("#ongkir2").val(ongkir);
      var total = parseInt(total_bayar) + parseInt(ongkir);
      $("#tampil_ongkir").text("Rp. "+ format_angka(ongkir) +" ,-");
      $("#tampil_total").text("Rp. "+ format_angka(total) +" ,-");
    });
  });
</script>

<?php include 'footer.php'; ?>
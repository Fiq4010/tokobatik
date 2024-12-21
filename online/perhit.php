<?php include 'header.php'; ?>

<style>

* {
  box-sizing: border-box;
}

.wrapper {
  margin: 5em auto;
  max-width: 1000px;

  background-color: #fff;
}

.header {
  padding: 30px 30px 0;
  text-align: center;

  &__title {
    margin: 0;
    text-transform: uppercase;
    font-size: 2.5em;
    font-weight: 500;
    line-height: 1.1;
  }
  &__subtitle {
    margin: 0;
    font-size: 1.5em;
    color: $gray;
    font-family: 'Yesteryear', cursive;
    font-weight: 500;
    line-height: 1.1;
  }
}


.tiga {
   font-size: 25px;

   }

</style>
<?php
$koefisien = array(array());
function kesimpulan($jumlah_persamaan)
{
  global $koefisien;
  $bahan = ['Bucket Tipe 1 sebanyak ','Bucket Tipe 2 sebanyak ', 'Bucket Tipe 3 sebanyak '];
  for ($i = 0; $i < $jumlah_persamaan; $i++) {
    echo $bahan[$i];
    for ($j = 0; $j < $jumlah_persamaan + 1; $j++) {
      if ($j == $jumlah_persamaan) {
        echo $koefisien[$i][$j].' buah'.'<br>';
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
  $rows = count($koefisien);

  for ($i = 0; $i < $rows; $i++) {
    $cols = count($koefisien[$i]);
    for ($j = 0; $j < $cols; $j++) {
    }
  }
}

function ubah($persamaan)
{
  global $koefisien;
  for ($i = 0; $i < $persamaan; $i++) {
    $persamaan_pivot = $i + 1;
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
      tampilkanMatrik($koefisien);
    }
  }
}
?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Perkiraan</a></li>
		</ul>
	</div>
</div>
<div class="wrapper">

  <div class="header">
    <h1 class="header__title">Perkiraan</h1>
    <h2 class="header__subtitle">Pembuatan Bucket</h2>
  </div>
  <div>
        
    <p class="tiga" align="pull-left">
     1. Untuk membuat sebuah bucket Tipe 1 atau bucket ulang tahun memerlukan 6 bunga 2 kertas samson 2 pita<br>
     2. Untuk membuat sebuah bucket Tipe 2 atau bucket wisuda memerlukan 6 bunga 3 kertas samson 1 pita<br>
     3. Untuk membuat sebuah bucket Tipe 3 atau bucket pernikahan memerlukan 10 bunga 5 pita<br>
    </p>
    <div class="tiga" align="center">
      <b>Masukan Jumlah Persediaan Bahan Baku</b>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET" class="">
                <ul>
                  <tr>
                    Bahan 1 (Bunga) :
                  </tr>
                  <tr>
                    <td><input type="text" name="var00" size="1" value="6" readonly hidden></td>
                    <td><input type="text" name="var01" size="1" value="2" readonly hidden></td>
                    <td><input type="text" name="var02" size="1" value="2" readonly hidden></td>
                    <td><input type="text" name="var03" size="1" required></td>
                  </tr>              
                </ul><br>
                <ul>
                   <tr>
                    Bahan 2 (Kertas):
                  </tr>
                  <tr>
                    <td><input type="text" name="var10" size="1" value="6" readonly hidden></td>
                    <td><input type="text" name="var11" size="1" value="3" readonly hidden></td>
                    <td><input type="text" name="var12" size="1" value="1" readonly hidden></td>
                    <td><input type="text" name="var13" size="1" required></td>
                  </tr>
                  
                </ul><br>
                <ul>
                   <tr>
                    Bahan 3 (Pita) &nbsp&nbsp&nbsp: 
                  </tr>
                  <tr>
                    <td><input type="text" name="var20" size="1" value="10" readonly hidden></td>
                    <td><input type="text" name="var21" size="1" value="0" readonly hidden></td>
                    <td><input type="text" name="var22" size="1" value="5" readonly hidden></td> 
                    <td><input type="text" name="var23" size="1" required></td>
                  </tr>
                </ul><br>
                <input type="submit" value="Submit" name="submit" class="btn btn-success">
                <hr> 
              </form>
              </form>

              <?php
              if (isset($_GET['submit'])) {
                setcookie('jumlah_persamaan', 3);

                if (isset($_COOKIE['jumlah_persamaan'])) {
                  $jumlah_persamaan = $_COOKIE['jumlah_persamaan'];
                  buatArray($jumlah_persamaan);
                  echo '<h3>Hasil Dari Bahan Diatas Bisa Membuat </h3>';
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
<?php 
$page = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simpanse";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name = $_SESSION['name'];
$bulan_ini = date('F Y');
$bulan_tahun = date('Y-m');
///////////////////////////ADMIN///////////////////////////////////

$sql = "SELECT count(id_atm) as jumlah_list_atm FROM list_atm";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_atm =  $row["jumlah_list_atm"];
}

$sql = "SELECT count(id) AS TOTAL, merk_mesin from list_atm group by merk_mesin";
$result = mysqli_query($conn, $sql);
$jumlah_list_atm_merk = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT count(id_atm) as jumlah_list_laporan FROM list_laporan ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan =  $row["jumlah_list_laporan"];
}

$sql = "SELECT count(id_atm) as jumlah_list_laporan_cm_on_proses FROM list_laporan_cm where status ='ON PROSES' ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan_cm_on_proses =  $row["jumlah_list_laporan_cm_on_proses"];
}
$sql = "SELECT count(id_atm) as jumlah_list_laporan_cm_done FROM list_laporan_cm where status ='DONE' ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan_cm_done =  $row["jumlah_list_laporan_cm_done"];
}

$sql = "SELECT count(userId) as jumlah_user FROM tbl_users";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_user =  $row["jumlah_user"];
}

$sql = "SELECT count(id) as jumlah_list_atm_history FROM list_atm_history where status_selesai = 'APPROVED BY ATR'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_atm_history =  $row["jumlah_list_atm_history"];
}


////////////////////////////flm//////////////////////////////////////////

$sql = "SELECT count(id_atm) as jumlah_list_atm_flm FROM list_atm where pengelola = '" . $name . "'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_atm_flm =  $row["jumlah_list_atm_flm"];
}

$sql = "SELECT count(id) AS TOTAL, merk_mesin from list_atm where pengelola = '" . $name . "' group by merk_mesin" ;
$result = mysqli_query($conn, $sql);
$jumlah_list_atm_merk_flm = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT count(id_atm) as jumlah_list_laporan_flm FROM list_laporan where substr(tgl_kunjungan,1,7) = '" .$bulan_tahun."' and pihak_yang_melakukan_kunjungan = '" .$name . "'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan_flm =  $row["jumlah_list_laporan_flm"];
}

$sql = "SELECT count(id_atm) as jumlah_list_laporan_cm_flm_on_proses FROM list_laporan_cm where flm = '" . $name . "' AND (status ='ON PROSES')" ;
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan_cm_flm_on_proses =  $row["jumlah_list_laporan_cm_flm_on_proses"];
}

$sql = "SELECT count(id_atm) as jumlah_list_laporan_cm_flm_done FROM list_laporan_cm where flm = '" . $name . "' AND (status ='DONE')" ;
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan_cm_flm_done =  $row["jumlah_list_laporan_cm_flm_done"];
}

$sql = "SELECT count(id) as jumlah_list_atm_history_flm FROM list_atm_history where  (status_selesai = 'APPROVED BY ATR' OR status_selesai = 'ON PROSES' ) and name_yang_edit = '" . $name . "'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_atm_history_flm =  $row["jumlah_list_atm_history_flm"];
}

////////////////////////////SLM//////////////////////////////////////////

$sql = "SELECT count(id_atm) as jumlah_list_atm_slm FROM list_atm where nama_pt_slm = '" . $name . "'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_atm_slm =  $row["jumlah_list_atm_slm"];
}

$sql = "SELECT count(id) AS TOTAL, merk_mesin from list_atm where nama_pt_slm = '" . $name . "' group by merk_mesin" ;
$result = mysqli_query($conn, $sql);
$jumlah_list_atm_merk_slm = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT count(id_atm) as jumlah_list_laporan_cm_slm_on_proses FROM list_laporan_cm where nama_pt_slm = '" . $name . "'AND status ='ON PROSES'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan_cm_slm_on_proses =  $row["jumlah_list_laporan_cm_slm_on_proses"];
}

$sql = "SELECT count(id_atm) as jumlah_list_laporan_cm_slm_done FROM list_laporan_cm where nama_pt_slm = '" . $name . "'AND status ='DONE'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan_cm_slm_done =  $row["jumlah_list_laporan_cm_slm_done"];
}

$sql = "SELECT count(id) as jumlah_list_atm_history_slm FROM list_atm_history where  (status_selesai = 'APPROVED BY ATR' OR status_selesai = 'ON PROSES' ) and name_yang_edit = '" . $name . "'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_atm_history_slm =  $row["jumlah_list_atm_history_slm"];
}


////////////////////////////ATR//////////////////////////////////////////
$sql = "SELECT count(id_atm) as jumlah_list_atm_atr FROM list_atm where wilayah = '" . $name . "'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_atm_atr =  $row["jumlah_list_atm_atr"];
}

$sql = "SELECT count(id) AS TOTAL, merk_mesin from list_atm where wilayah = '" . $name . "' group by merk_mesin" ;
$result = mysqli_query($conn, $sql);
$jumlah_list_atm_merk_atr = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT count(id_atm) as jumlah_list_laporan_atr FROM list_laporan where substr(tgl_kunjungan,1,7) = '" .$bulan_tahun."' and wilayah = '" .$name . "'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan_atr =  $row["jumlah_list_laporan_atr"];
}

$sql = "SELECT count(id_atm) as jumlah_list_laporan_cm_atr_on_proses FROM list_laporan_cm where wilayah = '" . $name . "'AND status ='ON PROSES'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_laporan_cm_atr_on_proses =  $row["jumlah_list_laporan_cm_atr_on_proses"];
}

$sql = "SELECT count(id) as jumlah_list_atm_history_atr FROM list_atm_history where  (status_selesai = 'APPROVED BY ATR' OR status_selesai = 'ON PROSES' ) and wilayah_asli = '" . $name . "'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
  $jumlah_list_atm_history_atr =  $row["jumlah_list_atm_history_atr"];
}

/////////////////////////////////////grafik///////////////////////////////////////////////
$sql = "SELECT count(id) as jumlah, tgl_kunjungan as tgl_kunjungan from list_laporan group by tgl_kunjungan order by tgl_kunjungan desc limit 7";
$result = mysqli_query($conn, $sql);

$count=$result->num_rows;
if(empty($count)){

}
else{
while($row = mysqli_fetch_assoc($result))
{
  $tgl_kunjungan[] =  $row["tgl_kunjungan"];
  $jumlah[] =  $row["jumlah"];
}

$count  = count($tgl_kunjungan);
$dataPoints_tgl_kunjungan = array();
for($i = 0; $i < $count; $i++){
  array_push($dataPoints_tgl_kunjungan, array("label" => $tgl_kunjungan[$i], "y" => $jumlah[$i]));
}
$dataPoints_tgl_kunjungan = array_reverse($dataPoints_tgl_kunjungan);
} 



$sql = "SELECT count(id) as jumlah, tgl_kunjungan as tgl_kunjungan_flm from list_laporan where pihak_yang_melakukan_kunjungan = '" . $name . "' group by tgl_kunjungan order by tgl_kunjungan desc limit 7";
$result = mysqli_query($conn, $sql);

$count=$result->num_rows;
if(empty($count)){

}
else{
while($row = mysqli_fetch_assoc($result))
{
  $tgl_kunjungan_flm[] =  $row["tgl_kunjungan_flm"];
  $jumlah[] =  $row["jumlah"];
}

$count  = count($tgl_kunjungan_flm);
$dataPoints_tgl_kunjungan_flm = array();
for($i = 0; $i < $count; $i++){
  array_push($dataPoints_tgl_kunjungan_flm, array("label" => $tgl_kunjungan_flm[$i], "y" => $jumlah[$i]));
}
$dataPoints_tgl_kunjungan_flm = array_reverse($dataPoints_tgl_kunjungan_flm);
} 


$sql = "SELECT count(id) as jumlah, tgl_kunjungan as tgl_kunjungan_atr from list_laporan where wilayah = '" . $name . "' group by tgl_kunjungan order by tgl_kunjungan desc limit 7";
$result = mysqli_query($conn, $sql);

$count=$result->num_rows;
if(empty($count)){

}
else{
while($row = mysqli_fetch_assoc($result))
{
  $tgl_kunjungan_atr[] =  $row["tgl_kunjungan_atr"];
  $jumlah[] =  $row["jumlah"];
}

$count  = count($tgl_kunjungan_atr);
$dataPoints_tgl_kunjungan_atr = array();
for($i = 0; $i < $count; $i++){
  array_push($dataPoints_tgl_kunjungan_atr, array("label" => $tgl_kunjungan_atr[$i], "y" => $jumlah[$i]));
}
$dataPoints_tgl_kunjungan_atr = array_reverse($dataPoints_tgl_kunjungan_atr);
} 
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/smoothness/jquery-ui.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style-responsive.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<script src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
                     

<?php
            
if($role == ROLE_ADMIN)
{
?>                                 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="row">
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>userListing">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-person"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number"><?php echo number_format($jumlah_user); ?></span>
              </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_atmListing">
                    <span class="info-box-icon bg-green"><i class="ion ion-stats-bars"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">ATM</span>
                <span class="info-box-number"><?php echo  number_format($jumlah_list_atm);  ?></span>
              </div>
            <!-- /.info-box-content -->

          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_laporanListing">
                    <span class="info-box-icon bg-red"><i class="ion ion-checkmark-round"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Cek Keamanan & Kebersihan</span>
                <span class="info-box-number"><?php echo number_format($jumlah_list_laporan); ?></span>
              </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_laporan_cmListing">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-document"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Laporan CM</span>
                <br>
                <span class="info-box-text">ON PROSES : <?php echo number_format($jumlah_list_laporan_cm_on_proses); ?></span>
                <span class="info-box-text">DONE : <?php echo number_format($jumlah_list_laporan_cm_done); ?></span>
              </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>           
  </div>
     <div class="box">
            <div class="box-header bg-yellow">
              <h3 class="box-title">ATM PER MERK</h3>
            </div>
            <!-- /.box-header -->
            <!-- /.box-body -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-condesed">
                    <tr >
                      <th style="text-align:left">Merk EDC</th>
                      <th style="text-align:left">Total</th>
                    </tr>
                    <?php
                    $total=0;
                    if(!empty($jumlah_list_atm_merk))
                    {

                        foreach($jumlah_list_atm_merk as $jumlah_list_atm_merk)
                        {
                                                $total+=$jumlah_list_atm_merk['TOTAL'];
                    ?>
                    <tr>
                      <td ><?php echo  $jumlah_list_atm_merk['merk_mesin'];?></td>
                      <td ><?php echo  number_format($jumlah_list_atm_merk['TOTAL']);?></td>
                    </tr>

                        <?php
                        }
                    }
                    ?>
                      <td style="background-color:#f15a23;color:#fafafa" >Total</td> 
                      <td style="background-color:#f15a23;color:#fafafa"><?php echo  number_format($total);?></td> 
                  </table>
                </div><!-- /.box-body -->
  </div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Grafik Cek Keamanan & Kebersihan per Minggu"
  },
  axisY:{
    includeZero: true
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints: <?php echo json_encode($dataPoints_tgl_kunjungan, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</section>
</div>
<?php } ?>


<?php
            
if($role == ROLE_FLM)
{
?>                                 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_atmListing">
                    <span class="info-box-icon bg-green"><i class="ion ion-stats-bars"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">ATM</span>
                <span class="info-box-number"><?php echo  number_format($jumlah_list_atm_flm);  ?></span>
              </div>
            <!-- /.info-box-content -->

          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_laporanListing">
                    <span class="info-box-icon bg-red"><i class="ion ion-checkmark-round"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Cek Keamanan & Kebersihan</span>
                <span class="info-box-number"><?php echo number_format($jumlah_list_laporan_flm); ?></span>
              </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_laporan_cmListing">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-document"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Laporan CM</span>
                <br>
                <span class="info-box-text"><?php echo number_format($jumlah_list_laporan_cm_flm_on_proses); ?></span>
              </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>           
  </div>
     <div class="box">
            <div class="box-header bg-yellow">
              <h3 class="box-title">ATM PER MERK</h3>
            </div>
            <!-- /.box-header -->
            <!-- /.box-body -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-condesed">
                    <tr >
                      <th style="text-align:left">Merk EDC</th>
                      <th style="text-align:left">Total</th>
                    </tr>
                    <?php
                    $total=0;
                    if(!empty($jumlah_list_atm_merk_flm))
                    {

                        foreach($jumlah_list_atm_merk_flm as $jumlah_list_atm_merk_flm)
                        {
                                                $total+=$jumlah_list_atm_merk_flm['TOTAL'];
                    ?>
                    <tr>
                      <td ><?php echo  $jumlah_list_atm_merk_flm['merk_mesin'];?></td>
                      <td ><?php echo  number_format($jumlah_list_atm_merk_flm['TOTAL']);?></td>
                    </tr>

                        <?php
                        }
                    }
                    ?>
                      <td style="background-color:#f15a23;color:#fafafa" >Total</td> 
                      <td style="background-color:#f15a23;color:#fafafa"><?php echo  number_format($total);?></td> 
                  </table>
                </div><!-- /.box-body -->
  </div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Grafik Cek Keamanan & Kebersihan per Minggu"
  },
  axisY:{
    includeZero: true
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints: <?php echo json_encode($dataPoints_tgl_kunjungan_flm, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</section>
</div>
<?php } ?>


<?php
            
if($role == ROLE_SLM)
{
?>                                 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_atmListing">
                    <span class="info-box-icon bg-green"><i class="ion ion-stats-bars"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">ATM</span>
                <span class="info-box-number"><?php echo  number_format($jumlah_list_atm_slm);  ?></span>
              </div>
            <!-- /.info-box-content -->

          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_laporan_cmListing">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-document"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Laporan CM</span>
                <h5> On Proses : <?php echo number_format($jumlah_list_laporan_cm_slm_on_proses); ?></h5>
                <h5> Done : <?php echo number_format($jumlah_list_laporan_cm_slm_done); ?></h5>
              </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>           
  </div>
     <div class="box">
            <div class="box-header bg-yellow">
              <h3 class="box-title">ATM PER MERK</h3>
            </div>
            <!-- /.box-header -->
            <!-- /.box-body -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-condesed">
                    <tr >
                      <th style="text-align:left">Merk EDC</th>
                      <th style="text-align:left">Total</th>
                    </tr>
                    <?php
                    $total=0;
                    if(!empty($jumlah_list_atm_merk_slm))
                    {

                        foreach($jumlah_list_atm_merk_slm as $jumlah_list_atm_merk_slm)
                        {
                                                $total+=$jumlah_list_atm_merk_slm['TOTAL'];
                    ?>
                    <tr>
                      <td ><?php echo  $jumlah_list_atm_merk_slm['merk_mesin'];?></td>
                      <td ><?php echo  number_format($jumlah_list_atm_merk_slm['TOTAL']);?></td>
                    </tr>

                        <?php
                        }
                    }
                    ?>
                      <td style="background-color:#f15a23;color:#fafafa" >Total</td> 
                      <td style="background-color:#f15a23;color:#fafafa"><?php echo  number_format($total);?></td> 
                  </table>
                </div><!-- /.box-body -->
  </div>
</section>
</div>
<?php } ?>

<?php
            
if($role == ROLE_ATR)
{
?>                                 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_atmListing">
                    <span class="info-box-icon bg-green"><i class="ion ion-stats-bars"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">ATM</span>
                <span class="info-box-number"><?php echo  number_format($jumlah_list_atm_atr);  ?></span>
              </div>
            <!-- /.info-box-content -->

          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_laporanListing">
                    <span class="info-box-icon bg-red"><i class="ion ion-checkmark-round"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Cek Keamanan & Kebersihan</span>
                <span class="info-box-number"><?php echo number_format($jumlah_list_laporan_atr); ?></span>
              </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="<?php echo base_url(); ?>list_laporan_cmListing">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-document"></i></span>
              </a>
              <div class="info-box-content">
                <span class="info-box-text">Laporan CM</span>
                <br>
                <span class="info-box-text"><?php echo number_format($jumlah_list_laporan_cm_atr_on_proses); ?></span>
              </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>           
  </div>
     <div class="box">
            <div class="box-header bg-yellow">
              <h3 class="box-title">ATM PER MERK</h3>
            </div>
            <!-- /.box-header -->
            <!-- /.box-body -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-condesed">
                    <tr >
                      <th style="text-align:left">Merk EDC</th>
                      <th style="text-align:left">Total</th>
                    </tr>
                    <?php
                    $total=0;
                    if(!empty($jumlah_list_atm_merk_atr))
                    {

                        foreach($jumlah_list_atm_merk_atr as $jumlah_list_atm_merk_atr)
                        {
                                                $total+=$jumlah_list_atm_merk_atr['TOTAL'];
                    ?>
                    <tr>
                      <td ><?php echo  $jumlah_list_atm_merk_atr['merk_mesin'];?></td>
                      <td ><?php echo  number_format($jumlah_list_atm_merk_atr['TOTAL']);?></td>
                    </tr>

                        <?php
                        }
                    }
                    ?>
                      <td style="background-color:#f15a23;color:#fafafa" >Total</td> 
                      <td style="background-color:#f15a23;color:#fafafa"><?php echo  number_format($total);?></td> 
                  </table>
                </div><!-- /.box-body -->
  </div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  exportEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Grafik Cek Keamanan & Kebersihan per Minggu"
  },
  axisY:{
    includeZero: true
  },
  data: [{
    type: "column", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints: <?php echo json_encode($dataPoints_tgl_kunjungan_atr, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</section>
</div>
<?php } ?>
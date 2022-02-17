<?php
session_start();
include('controller.php');
$data = new cHms();
if (!isset($_SESSION['user'])) {
 header('Location:login.php');
 exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HSMS</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/css/style.css" rel="stylesheet">
  <link href="vendor/DataTables/datatables.min.css" rel="stylesheet" type="text/css" />
  <link href="vendor/DataTables/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" type="image/jpg" href="vendor/img/icon.jpg"/>
</head>
<style type="text/css">
  .bg-change {
    background-image: url("vendor/img/bg.png");
    height: 100vh;
    background-repeat: no-repeat;
    background-size:auto;
  }
</style>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <img src= "vendor/img/icon.jpg" class="rounded"  style="width: 30px; margin-right: 10px;">

      <a class="navbar-brand" href="#">You Are Creating The world</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
                    
    </div>
  </nav>

  <!-- Page Content -->
  <div class="alert alert-primary" role = "alert" style="margin-bottom: 0px;padding-top:0.5rem;padding-bottom:0.5rem;padding-left:10rem;padding-right:9.5rem;">
     <input class="form-control-sm" type="text" id="idsm" autofocus placeholder="ID Smart Here . Please Enter !!!">
    Xin Chào ! <span style="color:#e8740c; font-style: italic;"><?php echo $_SESSION['user']; ?> </span>.Chúc Bạn một ngày làm việc vui vẻ..
      <span style="float:right;padding-right:10px;padding-left: 10px; border-right: 1px solid white" onclick="logout()" ><a href="#">Logout</a></span>
      <span style="float:right;padding-right:10px;padding-left: 10px; border-right: 1px solid white;border-left: 1px solid white" onclick="edit()" ><a href="#">Change Pass</a></span>
  </div>
  <section>
    <div class="container-fluid bg-change">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="mt-5" style="color:#1f796f">HSMS Smart System Manager</h2>
  			     <div class="panel panel-default">
  	            <div class="panel-body">
                    <div class="card-header" style="font-size:18px; color:#307384">
                      Select System Here !!! 
                    </div>
                    <div class="card-header" style="font-size:18px;">
                      <select style="width:100%;" id="sm">
                          <option value=""></option>
                          <option value="kitting">Kitting</option>
                          <option value="stock">Stock MM</option>
                          <option value="stockLine">Stock Line</option>
                          <option value="feeder">Stock Feeder</option>
                          <option value="couting">Stock Counting</option>
                          <option value="return">Stock Return</option>
                          <option value="total">Stock Total</option>
                          <option value="loss">Shortage</option>
                          <option value="SMS1">CallTab SMD1</option>
                          <option value="SMS">CallTab SMD2</option>
                          <option value="Ex">CallTab Expensive - View Order</option>
                          <option value="check">SMD Inventory</option>
                          <option value="standard">SMD Standard</option>
                          <option value="mapping">SMD Mapping</option>
                          <option value="member">Member MM-SMD</option>
                          <option value="jig">Jig-SMD</option>
                          <option value="cmd">ChangeModel</option>
                          <option value="subPlan">Support Plan</option>
                        </select>
                        <button class="btn btn-success form-control" style="margin-top: 10px;" id="go" >Đến >></button>
                    </div>
  	            </div>
  	          </div>
  	          <div id="listData" style="padding-top: 20px;">
                <h3 class="text-danger">Note!</h3>
                <p><i>Để hệ thống hoạt động tốt nhất, các option được hiển thị đầy đủ. Tránh các sai sót. Vui lòng Sử dụng trình duyệt sau.
                Cảm ơn !</i></p> 
                <a href="vendor/brower/Firefox.exe" download>     >> Download Firefox</a>
                
                 <h3 class="text-danger" style="margin-top: 10px;">SMS CallTab</h3>
                <a href="vendor/brower/SMS CallTab.apk" download>     >> SMS CallTab SMD1</a>
                 <br>
                <a href="vendor/brower/SMS CallTab_1_1.0.apk" download>     >> SMS CallTab SMD2</a>
                <h3 class="text-danger" style="margin-top: 10px;">Manual HSMS</h3>
                <a href="vendor/brower/ManualHSMS.pptx" download>     >> Click here download Manual</a>
              </div>
          </div>
          <div class="col-lg-6" style="padding-top: 14px;">
                    
                     <div class="card-body" style="font-size:13px; color:#dc3545;font-style: italic;">
                       <ul class="list-group">
                        <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="kitting">001: Kitting</a></li>
                        <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" href="#filter"  aria-controls="collapseExample">SMD Stock</a></li>
                        <div id="filter" class="collapse">
                          <ul>
                          <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="stock">002: Stock MM</a></li>
                          <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="stockline">003: Stock Line</a></li>
                          <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="feeder">004: Stock Feeder</a></li>
                          <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="couting">005: Stock Counting</a></li>
                          <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="return">006: Stock Return</a></li>
                          <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="total">007: Stock Total</a></li>
                          </ul>
                      </div>
                       <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info"  href="loss">008: SMD Shortage</a></li>
                       <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" href="#filter1"  aria-controls="collapseExample">Call Tab</a></li>
                       <div id="filter1" class="collapse">
                        <ul>
                           <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="http://172.18.11.221/sms">009: CallTab SMD1</a></li>
                           <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="../sms">010: CallTab SMD2</a></li>
                           <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="../sms/order/lkdt.php">011: CallTab Expensive - View Order</a></li>
                         </ul>
                        </div>
                       <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="check">012: SMD Inventory</a></li>
                       <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" href="#filter2"  aria-controls="collapseExample">SMD Standard</a></li>
                       <div id="filter2" class="collapse">
                          <ul>
                             <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="standard">013: Model Standard</a></li>
                             <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="#">014: Line Standard</a></li>
                             <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="mapping">015: SMD Mapping</a></li>
                             <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="jig">017:Jig SMD</a></li>
                          </ul>
                       </div>
                       <li class="list-group-item" ><a class="list-group-item list-group-item-action list-group-item-info" href="member">016: Member MM-SMD</a></li>
                       <li class="list-group-item" ><a class="list-group-item list-group-item-action list-group-item-info" href="cmd">018: ChangeModel</a></li>
                       <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-light" data-toggle="collapse" href="#filter3"  aria-controls="collapseExample">Plan</a></li>
                       <div id="filter3" class="collapse">
                          <ul>
                             <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="capa">019: Support Plan</a></li>
                             <li class="list-group-item"><a class="list-group-item list-group-item-action list-group-item-info" href="#">020: Creat Plan</a></li>
                          </ul>
                        </div>
                       </ul>
                       
                       
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<script src="vendor/jquery/myJquery.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/DataTables/datatables.min.js"></script>
<script src="vendor/DataTables/dataTables.buttons.min.js"></script>
<script src="vendor/DataTables/jszip.min.js"></script>
<script src="vendor/DataTables/buttons.html5.min.js"></script>
		<script type="text/javascript">
      $("#go").click(function() {

            openSm();
            $("#sm").val('');
             });
              $("#idsm").keyup(function(event){
                if(event.keyCode===13){
                  openSm();
                  $("#idsm").val('');
                  };
          })
      var modal = document.getElementById('id01');

      function baotri(){
        alert("Hệ thống tạm dừng để bảo trì. Vui lòng quay lại sau ");
      }
		</script>
</body>
</html>

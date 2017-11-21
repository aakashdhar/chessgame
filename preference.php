<?php include 'includes/header.php'; ?>
<?php
  $sql_get = mysqli_query($con,"SELECT * FROM `tbl_users` WHERE `id` = '".$_SESSION['playerid']."'");
  $row_get = mysqli_fetch_assoc($sql_get);

  if (isset($_POST['submit'])) {
    $permovetime = $_POST['inlineRadioOptions'][0];
    $totalplaytime = $_POST['inlineRadioOption'][0];
    if (mysqli_num_rows($sql_get) > 0) {
      $sql_update = mysqli_query($con,"UPDATE `tbl_users` SET `per_move_time`='$permovetime',
        `total_play_time`='$totalplaytime' WHERE `id` = '".$_SESSION['playerid']."'");

        if ($sql_update) {
          echo "<script>alert('SUCCESS')</script>";
          echo "<script>window.location.href = 'profile.php'</script>";
        }else {
          echo "<script>alert('Fail')</script>";
        }
    }
  }
 ?>
 <style media="screen">
 
 .radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
   position: absolute;
   margin-top: 4px \9;
   margin-left: -20px;
   margin-top: .6em;
 }
 </style>
 <script type="text/javascript">
 function validateForm(){

    var checked=false;
    var checked1=false;
    var elements = document.getElementsByName("inlineRadioOptions[]");
    var oelements = document.getElementsByName("inlineRadioOption[]");

    for(var i=0; i < elements.length; i++){
     if(elements[i].checked) {
       checked = true;
     }
    }
    for(var j=0; j < oelements.length; j++){
     if(oelements[j].checked) {
       checked1 = true;
     }
    }

    if (checked==false || checked1==false) {
     alert('Please select your time preference');
     return false;
    }
    return true;
    }
</script>

<div class="container">
    
  <div class="row" style="padding-bottom:30px;">
    <h3 class="text-center header-title">Game Preferences</h3>
  </div>
    <div class="col-md-3">
            
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-format="fluid"
     data-ad-layout="in-article"
     data-ad-client="ca-pub-6964407832457862"
     data-ad-slot="2705479961"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
      
        </div>
  
  <div class="col-md-6 ">
      
    <form class="" action="" method="post" name="myForm" onsubmit="return validateForm()">
      <?php if (mysqli_num_rows($sql_get) > 0): ?>
        <div class="form-group col-md-6" >
          <label for="" class="label-top">Per Move time</label> <br>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio1" value="30" <?=(($row_get['per_move_time'] == '30')? ' checked':'')?>> 30sec
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio2" value="60" <?=(($row_get['per_move_time'] == '60')? ' checked':'')?>> 1 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="120" <?=(($row_get['per_move_time'] == '120')? ' checked':'')?>> 2min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="300" <?=(($row_get['per_move_time'] == '300')? ' checked':'')?>> 5min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="600" <?=(($row_get['per_move_time'] == '600')? ' checked':'')?>> 10min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="900" <?=(($row_get['per_move_time'] == '900')? ' checked':'')?>> 15min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="1200" <?=(($row_get['per_move_time'] == '1200')? ' checked':'')?>> 20min
          </label>
        </div>
        
        <div class="form-group col-md-6">
          <label for="" class="label-top">Per Game time</label> <br>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio1" value="300" <?=(($row_get['total_play_time'] == '300')? ' checked':'')?>> 5 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio2" value="600" <?=(($row_get['total_play_time'] == '600')? ' checked':'')?>> 10 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="900" <?=(($row_get['total_play_time'] == '900')? ' checked':'')?>> 15 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="1200" <?=(($row_get['total_play_time'] == '1200')? ' checked':'')?>> 20 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="1800" <?=(($row_get['total_play_time'] == '1800')? ' checked':'')?>> 30 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="2700" <?=(($row_get['total_play_time'] == '2700')? ' checked':'')?>> 45 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="3600" <?=(($row_get['total_play_time'] == '3600')? ' checked':'')?>> 60 min
          </label>
          <label class="radio" style="margin-left: 0px;">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="5400" <?=(($row_get['total_play_time'] == '5400')? ' checked':'')?>> 90 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="7200" <?=(($row_get['total_play_time'] == '7200')? ' checked':'')?>> 120 min
          </label>
        </div>
      <?php else: ?>
        <div class="form-group col-md-6" >
          <label for="" class="label-top">Per Move time</label> <br>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio1" value="30"> 30sec
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio2" value="60"> 1 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="120"> 2min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="300"> 5min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="600"> 10min
          </label>
          <label class="radio" >
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="900"> 15min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOptions[]" id="inlineRadio3" value="1200"> 20min
          </label>
        </div>
        <div class="form-group col-md-6" >
          <label for="" class="label-top">Per Game time</label> <br>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio1" value="300"> 5 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio2" value="600"> 10 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="900"> 15 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="1200" > 20 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="1800" > 30 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="2700" > 45 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="3600" > 60 min
          </label>
          <label class="radio" style="margin-left: 0px;">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="5400" > 90 min
          </label>
          <label class="radio">
            <input type="radio" name="inlineRadioOption[]" id="inlineRadio3" value="7200"> 120 min
          </label>
        </div>
      <?php endif; ?>
      <input type="submit" name="submit" value="SAVE PREFERENCE" class="btn btn-block btn-orange">
    </form>
  </div>
  <div class="col-md-3">
            
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-format="fluid"
     data-ad-layout="in-article"
     data-ad-client="ca-pub-6964407832457862"
     data-ad-slot="2705479961"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
      
        </div>
</div>
<?php include 'includes/footer.php'; ?>

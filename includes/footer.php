
<!-- jQuery 2.2.3 -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/rotator.js"></script>
<script type="text/javascript" src="game/js/sweetalert.min.js"></script>
<!-- iCheck -->
<script src="js/jquery.backstretch.js"></script>
<script>
$(window).load(function () {
  var myArray = ['1', '2', '3', '4','5','6','7','8','9',
  '10','11','12','13','14','15','16','17','18','19','20'];
  var rand = myArray[Math.floor(Math.random() * myArray.length)];

  $("#rotator").rotator({
  starting: 0,
  ending: rand,
  percentage: false,
  color: 'green',
  lineWidth: 7,
  timer: 50,
  radius: 40,
  fontStyle: 'Calibri',
  fontSize: '20pt',
  fontColor: 'darkblue',
  backgroundColor: 'lightgray',
  callback: function () {
  }
  });
});
</script>
</body>
</html>

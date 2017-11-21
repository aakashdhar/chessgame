<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/offline-js/0.7.19/offline.js" charset="utf-8"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/offline-js/0.7.19/themes/offline-theme-chrome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/offline-js/0.7.19/themes/offline-language-english.css">
  <title>Document</title>
  <script type="text/javascript">
  var run = function(){
    Offline.options = {checks: {xhr: {url: 'http://playearn.in/index.php'}}};
    if (Offline.state === 'up'){
        Offline.check();
    }
    if (Offline.state === 'down'){
        var startTime = new Date().getTime();
        var interval = setInterval(function(){
            if(new Date().getTime() - startTime > 60000){
                alert('Time over');
            }else{
                Offline.check();
            }
        }, 2000);  
    }
  }
  setInterval(run, 5000);
  </script>
</head>
<body>

</body>
</html>

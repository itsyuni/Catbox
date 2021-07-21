<?php

$type = $_GET['name'];
if (!$type) {
    header('Location: /app/menu');
}

include($_SERVER['DOCUMENT_ROOT']."/classes/ValidAuth_logged.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/css/fonts.css">
    <link rel="stylesheet" href="/static/fonts/sf/stylesheet.css">
    <title>CatboxGames | игра</title>
    <style>

        body {
          margin: 0;
          font-family: SF UI Text;
        }
      
        .wrapper {
        position: absolute;
        min-width: 100%;
        min-height: 100%;
      }
      
      .frame {
        position: absolute;
        width: 1px;
        min-width: 100%;
        height: 1px;
        min-height: 100%;
        border: 0;
      }
      
    </style>
</head>
<body>
    <script src="/classes/queryloader2.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function() {
            QueryLoader2(document.querySelector("body"), {
                barColor: "#efefef",
                backgroundColor: "#141c2b",
                percentage: true,
                barHeight: 1,
                minimumTime: 400,
                fadeOutTime: 1000
            });
        });
    </script>
    <div class="wrapper"></div>
  <script src="/classes/games_host.js"></script>
  <script>
    host.init('https://catbox-gr.ru/app/frames_games/<?php echo $type ?>/', {"request_token":"2350547518_ff4abd3ddc2a2699cc","iframeScrollAllowed":true,"allowInnerPath":true,"hostPath":"\/2020"});
  </script>
  <script type="text/javascript">
;(function (d, w) {
if (w.__dev) {
  return
}
var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true;
ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//catbox-gr.ru";
var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window);;(function (d, w) {
if (w.__dev) {
  return;
}
if(!w._tns){w._tns = {}};
w._tns.tnsPixelSocdem = "71"
w._tns.tnsPixelType = ""
})(document, window);</script><noscript><div style="position:absolute;left:-10000px;">
</div></noscript>
</body>
</html>
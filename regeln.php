<?php
include "config.php";
include "lib/meldung.php";
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Pegelcraft</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/sticky-footer.css">
</head>
<body>
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Pegelcraft</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="regeln.php">Regeln</a></li>
            <li><a href="map.php">Map</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://pegelf.de">pegelf.de</a></li>
            <li class="active"><a href="#">pegelcraft.de</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container">
<?php echo meldung("Diese Regeln sind veraltet und werden bald ersetzt", "danger"); ?>
<?php echo meldung("Diese Regeln wurden zuletzt am TODO aktualisiert", "info"); ?>
<?php foreach( $regeln as $Regeln_1 ): ?>
<div class="panel panel-default">
  <div class="panel-heading"><?php echo $Regeln_1['headline']; ?></div>
  <div class="panel-body">
    <ul>
    <?php foreach ($Regeln_1['content'] as $Regeln_2): ?>
      <li><?php echo $Regeln_2; ?></li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php endforeach; ?>
  </div>


    </div>
    <div id="footer">
      <div class="container">
        <p class="text-muted">This page uses <a href="https://github.com/xPaw/PHP-Minecraft-Query">PHP Minecraft Query</a> Licensed under <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/">CC BY-NC-SA 3.0</a> by <a href="http://xpaw.ru/">xPaw</a>. Main part of this site is written by <a href="http://xpaw.ru/">xPaw</a>.</p>
      </div>
    </div>
<!-- Javascript -->
<script href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- End Javascript -->
</body>
</html>

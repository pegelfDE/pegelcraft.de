<?php
include "config.php";
include "lib/meldung.php";
include "lib/fetch_all_assoc.php";

// MySQL
$mysqli = new mysqli($mysql_info['hostname'], $mysql_info['username'], $mysql_info['password'], $mysql_info['database']);
$mysqli->set_charset("utf8");
$parents = $mysqli->query("SELECT * FROM regeln WHERE parent = 0");
$parent_row = fetch_all_assoc($parents, array('id'));
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Pegelcraft</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/sticky-footer.css">
        <link rel="stylesheet" href="css/main.css">
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
<?php foreach( $parent_row as $Parent ): ?>
<div class="panel panel-default">
  <div class="panel-heading"><?php echo $Parent['content']; ?></div>
  <div class="panel-body">
    <ul>
    <?php
    $mysqli = new mysqli($mysql_info['hostname'], $mysql_info['username'], $mysql_info['password'], $mysql_info['database']);
    $mysqli->set_charset("utf8");
    $points = $mysqli->query("SELECT * FROM regeln WHERE parent = " . $Parent['id']);
    $points_row = fetch_all_assoc($points, array('id'));
    $mysqli->close();
    ?>
    <?php foreach( $points_row as $Point ): ?>
    <li><?php echo $Point['content']; ?></li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php endforeach; ?>
  </div>


    </div>
    <div id="footer">
      <div class="container">
        <p class="text-muted"></p>
      </div>
    </div>
<!-- Javascript -->
<script href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- End Javascript -->
</body>
</html>

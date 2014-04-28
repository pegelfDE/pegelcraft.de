<?php
include "config.php";
include "lib/meldung.php";
include "lib/fetch_all_assoc.php";

$page['navbarid'] = 2;

// MySQL
$mysqli = new mysqli($mysql_info['hostname'], $mysql_info['username'], $mysql_info['password'], $mysql_info['database']);
$mysqli->set_charset("utf8");
$parents = $mysqli->query("SELECT * FROM regeln WHERE parent = 0");
$parent_row = fetch_all_assoc($parents, array('id'));
$mysqli->close();

include "templates/navbar.php";
?>
    <div class="container">
<?php echo meldung("Diese Regeln sind nicht Rechtsgültig", "danger"); ?>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- End Javascript -->
</body>
</html>

<?php
$mysqli = new mysqli($mysql_info['hostname'], $mysql_info['username'], $mysql_info['password'], $mysql_info['database']);
$mysqli->set_charset("utf8");
$nav_parents = $mysqli->query("SELECT * FROM navbar WHERE parent = 0 AND visible = 1");
$nav_parent_row = fetch_all_assoc($nav_parents, array('id'));
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
<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#pegelcraft-navbar-collapse1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Pegelcraft</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="pegelcraft-navbar-collapse1">
      <ul class="nav navbar-nav">
<?php foreach ( $nav_parent_row as $nav_Parent ): ?>
<?php if ( $nav_Parent['has_children'] == 1 ): ?>
<?php
$mysqli = new mysqli($mysql_info['hostname'], $mysql_info['username'], $mysql_info['password'], $mysql_info['database']);
$mysqli->set_charset("utf8");
$nav_children = $mysqli->query("SELECT * FROM navbar WHERE parent = " . $nav_Parent['id'] . " AND visible = 1");
$nav_children_row = fetch_all_assoc($nav_children, array('id'));
$mysqli->close();
?>
        <li class="dropdown">
          <a href="<?php echo $nav_Parent['link']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $nav_Parent['title']; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
          <?php foreach ( $nav_children_row as $nav_Child ): ?>
            <li><a href="<?php echo $nav_Child['link']; ?>"><?php echo $nav_Child['title']; ?></a></li>
          <?php endforeach; ?>
          </ul>
        </li>
<?php else: ?>
        <li><a href="<?php echo $nav_Parent['link']; ?>"><?php echo $nav_Parent['title']; ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="//pegelf.de/">pegelf.de</a></li>
        <li class="active"><a href="#">pegelcraft.de</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>


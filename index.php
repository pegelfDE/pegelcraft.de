<?php
	define( 'MQ_SERVER_ADDR', '46.4.149.14' );
	define( 'MQ_SERVER_PORT', 25565 );
	define( 'MQ_TIMEOUT', 1 );
	
	// Display everything in browser, because some people can't look in logs for errors
	Error_Reporting( E_ALL | E_STRICT );
	Ini_Set( 'display_errors', true );
	
	require __DIR__ . 'PHP-Minecraft-Query/MinecraftQuery.class.php';
	
	$Timer = MicroTime( true );
	
	$Query = new MinecraftQuery( );
	
	try
	{
		$Query->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT );
	}
	catch( MinecraftQueryException $e )
	{
		$Exception = $e;
	}
	
	$Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8">
	<title>Pegelcraft</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/sticky-footer.css">
	<style type="text/css">
		.table thead th {
			background-color: #428BCA;
			border-color: #428BCA !important;
			color: #FFF;
		}
	</style>
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
            <li class="active"><a href="#">Home</a></li>
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

<?php if( isset( $Exception ) ): ?>
		<div class="panel panel-primary">
			<div class="panel-heading"><?php echo htmlspecialchars( $Exception->getMessage( ) ); ?></div>
			<p><?php echo nl2br( $e->getTraceAsString(), false ); ?></p>
		</div>
<?php else: ?>
		<div class="row">
			<div class="col-sm-6">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th colspan="2">Server Info <em>(queried in <?php echo $Timer; ?>s)</em></th>
						</tr>
					</thead>
					<tbody>
<?php if( ( $Info = $Query->GetInfo( ) ) !== false ): ?>
<?php $Info["HostName"] = "pegelcraft"; ?>
<?php foreach( $Info as $InfoKey => $InfoValue ): ?>
						<tr>
							<td><?php echo htmlspecialchars( $InfoKey ); ?></td>
							<td><?php
	if( Is_Array( $InfoValue ) )
	{
		echo "<pre>";
		print_r( $InfoValue );
		echo "</pre>";
	}
	else
	{
		echo htmlspecialchars( $InfoValue );
	}
?></td>
						</tr>
<?php endforeach; ?>
<?php else: ?>
						<tr>
							<td colspan="2">No information received</td>
						</tr>
<?php endif; ?>
					</tbody>
				</table>
			</div>
			<div class="col-sm-6">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Players</th>
						</tr>
					</thead>
					<tbody>
<?php if( ( $Players = $Query->GetPlayers( ) ) !== false ): ?>
<?php foreach( $Players as $Player ): ?>
						<tr>
							<td><?php echo htmlspecialchars( $Player ); ?></td>
						</tr>
<?php endforeach; ?>
<?php else: ?>
						<tr>
							<td>No players in da house</td>
						</tr>
<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
<?php endif; ?>
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

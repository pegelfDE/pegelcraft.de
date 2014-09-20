<?php
	define( 'MQ_SERVER_ADDR', '5.9.218.100' );
	define( 'MQ_SERVER_PORT', 25565 );
	define( 'MQ_TIMEOUT', 1 );
	
	// Display everything in browser, because some people can't look in logs for errors
	Error_Reporting( E_ALL | E_STRICT );
	Ini_Set( 'display_errors', true );
	
	require __DIR__ . '/PHP-Minecraft-Query/MinecraftQuery.class.php';
	
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

// Check if we have information
if (($Info = $Query->GetInfo()) == false) {
	$nodatareceived = true;
}

// Decide about Playerpanels color
if (isset($Exception) OR isset($nodatareceived)) {
	$player_panel_class = "panel-danger";
} elseif ($Info['Players'] < 1) {
	$player_panel_class = "panel-warning";
} else {
	$player_panel_class = "panel-success";
}

$page['navbarid'] = 1;
include "config.php";
include "lib/fetch_all_assoc.php";
include "lib/bbcodes.php";
include "templates/navbar.php";
?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default"> <!-- Short description of pegelcraft -->
				Pegelcraft ist der Minecraft-Server von der <a href="//pegelf.de">Pegelf.de</a> Community.
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel <?php echo $player_panel_class; ?>">
				<div class="panel-heading">Momentan online:</div>
				<table class="table table-hover">
<?php if(($Players = $Query->GetPlayers()) !== false): ?>
<?php foreach($Players as $Player): ?>
					<tr><td><?php echo $Player; ?></td></tr>
<?php endforeach; ?>
<?php else: ?>
					<tr><td>Niemand da :(</td></tr>
<?php endif; ?>
				</table>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					News
				</div>
<?php
/*
$mysqli = new mysqli($mysql_info['hostname'], $mysql_info['username'], $mysql_info['password'], "1_forum");
$mysqli->set_charset("utf8");
$threads = $mysqli->query("SELECT threadID FROM wbb1_1_thread WHERE boardID = 105")->fetch_all();
// Extreme dirty PHP Code
$query = "SELECT postID,threadID,userID,username,subject,message,time,isDeleted,isDisabled FROM `wbb1_1_post` WHERE";
foreach ($threads as $Thread) {
	$query = $query . " threadID = " . $Thread['0'] . " OR";
}
$query = $query . "DER BY time DESC";
// Until here
$news = $mysqli->query($query);
$news_row = fetch_all_assoc($news, array('postID'));
$mysqli->close();
*/
?>
				<div class="panel-body">
<?php // foreach($news_row as $News): ?>
<?php // if($News['subject'] == '' OR $News['threadID'] == '1523') { continue; } ?>
<?php // $News['message'] = str_replace("\n", "<br>", $News['message']); ?>
<?php /*					<a href="//pegelf.de/index.php?page=Thread&postID=<?php echo $News['postID']; ?>" id="<?php echo $News['postID']; ?>"><?php echo $News['subject']; ?></a>
					<hr>
					<?php echo bbcode_parse($BBHandler, $News['message']) ?>
					<hr> */ ?>
<?php // endforeach; ?>
					Für die aktuellen News rund um Pegelcraft besuche die <a href="//pegelf.de/board88-minecraft/board104-pegelcraft-unser-minecraft-server">Foren</a> (Dies wird irgendwann(tm) auch mal hier erscheinen).
				</div>
			</div>
		</div>
	</div>
</div>
<div id="footer">
	<div class="container">
		<p class="text-muted">This page uses <a href="https://github.com/xPaw/PHP-Minecraft-Query">PHP Minecraft Query</a> Licensed under <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/">CC BY-NC-SA 3.0</a> by <a href="http://xpaw.ru/">xPaw</a>. Main part of this site is written by <a href="http://xpaw.ru/">xPaw</a>.</p>
	</div>
</div>
<!-- Javascript -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- End Javascript -->
</body>
</html>

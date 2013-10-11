<?php

if($_SERVER['argv'][1] == 'help' || $_SERVER['argc'] != 3)
{
	echo "Usage: php kill.php (application) (minutes) \n";
	die();
}else{

	$application = $_SERVER['argv'][1];
	$kill = exec('pidof '.$application);
	$minutes = $_SERVER['argv'][2];

	array_map(create_function('$a', 'print chr($a);'), array(27, 91, 72, 27, 91, 50, 74));

	echo "All set ready to go! \n Going to quit ". $application ." in ". $minutes ." minutes...\n";
	while($minutes != 0)
	{
		$minutes = $minutes - 1;
		sleep(60);
		echo $minutes." minutes left \n";
	}

	exec('kill '.$kill);
}
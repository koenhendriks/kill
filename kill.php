<?php
// Show help if asked or if their aren't enough arguments given
if($_SERVER['argv'][1] == 'help' || $_SERVER['argc'] != 3)
{
	echo "Usage: php kill.php (application) (minutes) \n";
	die();
}else{
	//Get the values I need
	$application = $_SERVER['argv'][1];
	$kill = exec('pidof '.$application);

	//Dont try to kill a process that doesn't exists
	if($kill == '' || $kill == null){
		echo "Could not find the proces ". $application."\n";
		die();
	}

	
	$minutes = $_SERVER['argv'][2];
	
	//dirty hack to clean the terminal window
	array_map(create_function('$a', 'print chr($a);'), array(27, 91, 72, 27, 91, 50, 74));

	echo "All set ready to go! \n Going to quit ". $application ." in ". $minutes ." minutes...\n";
	//Loading Pistol...
	while($minutes != 0)
	{
		$minutes = $minutes - 1;
		sleep(60);
		echo $minutes." minutes left \n";
	}
	//...pull the trigger!
	exec('kill '.$kill);
}

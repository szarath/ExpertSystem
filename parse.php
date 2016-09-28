#!/usr/bin/php
<?PHP
if ($argc == 2)
{
	if ($argv[1] == NULL | !file_exists($argv[1]))
	{
		echo "Error: File does not exist\n";
		exit(0);
	}
	$file = file_get_contents($argv[1]);
	preg_match_all('/(.+?)[#$]/', $file, $info);
	$values = implode(" ", $info[1]);;
	preg_match_all("/[A-Z]/", $values, $newvalues);
	$test = implode(" ", $newvalues[0]);
	$test = count_chars( $test, 3);
	preg_match_all("/[A-Z]/", $test, $newtest);
	

	$newarray = array_map('trim', $info[1]);
	$newarray = array_filter($newarray);
	$loop = TRUE;
	while ($loop == TRUE) {
		foreach ($newarray as $line) {
			$i = 0;
			if ($line[$i] === '?') {
				$query = str_split($line, 1);
			}
			else if ($line[$i] === '=') {
				$initial_facts = str_split($line, 1);
			}
		}
		if ($query != null && $initial_facts != null) {
			$loop = FALSE;
		}
	}
	array_shift($query);
	array_shift($initial_facts);
	print_r($newtest); //debug: shows each unique value
	print_r($newarray); //debug to shows rules
	print_r($query); //debug to shows the ?query
	print_r($initial_facts); //debug to shows given true values
}
?>
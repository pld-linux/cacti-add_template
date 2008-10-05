#!/usr/bin/php
<?php
/*
+---------------------------------------------------------------------------+
| This script import cacti xml template files by command line		    |
| Author : Jean Francois Masure <jean-francois.masure@arche.fr>		    |
| Version : 0.1 8 Aug 2005						    |
+---------------------------------------------------------------------------+
*/
include_once("/usr/share/cacti/include/global.php");
include_once("/usr/share/cacti/lib/import.php"); 

// check if we have good number of argument
if ($argc < 2 || in_array($argv[1], array('--help', '-help', '-h', '-?'))) {
	echo "Usage: $argv[0] FILE.xml [FILE.xml]\n";
	echo "This script will import FILE.xml template into cacti\n";
	exit(0);
}
array_shift($argv);

foreach ($argv as $xml_file) {
	$xml_data = file_get_contents($xml_file);
	if ($xml_data === false) {
		echo "ERROR: cannot open $xml_file, exiting\n";
		exit(1);
	}

	// import data into cacti. $info_array will contain debugging info.
	echo "cacti-add_template: importing $xml_file\n";
	$info_array = import_xml_data($xml_data, false);
}

exit(0);

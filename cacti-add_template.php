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
if ($argc != 2 || in_array($argv[1], array('--help', '-help', '-h', '-?')))
{
  echo "usage : $argv[0] file.xml\n";
  echo "this script will import file.xml template into cacti\n";
  return 0;
}

// open the .xml file
$xml_file = $argv[1];
$fp = fopen($xml_file, "r");
if ($fp == FALSE) 
{
  echo "cannot open $xml_file, exiting\n";
  return -1;
}
$xml_data = fread($fp,filesize($xml_file));

// import data into cacti. $info_array will contain debugging info.
$info_array = import_xml_data($xml_data,false);

return 0;
?>

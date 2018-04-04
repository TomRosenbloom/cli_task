<?php
// get config
include  '../config/config.php';

// instantiate Composer autoloader
// if I didn't store the autoload path in config then I wouldn't need to include config...
// swings and roundabouts...
$autoloadPath = Config::AUTOLOAD_PATH;
require_once($autoloadPath);

//  path where the markdown file will be found
$sourceDataPath = Config::LOCAL_DATA_PATH;

// path where convereted html will be put
$destinationPath = Config::LOCAL_DATA_PATH;

// options for the markdown converter
$mdOptions = MarkdownOptions::getOptions();


// instantiate logger
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
$log = new Logger('mdConversion');
$log->pushHandler(new StreamHandler(__DIR__.'../../logs/app.log'));


// get/validate the file path
if(isset($argv[1])){
    $filename = $argv[1];
    $log->info('Submitted file name: ' . $filename);
    $filepath = $sourceDataPath . $filename;
    if(file_exists($filepath)){
        $mdFile = $filepath;
        $log->info('File found at: ' . $filepath);
    } else {
        throw new Exception('File not found at: ' . $filepath);
        $log->error();
    }
} else {
    throw new Exception('No filename specified');
    $log->error();
}


// read from markdown file and do the conversion
$markdown = file_get_contents($mdFile);
$converter = new \League\CommonMark\CommonMarkConverter($mdOptions);
$converted = $converter->convertToHtml($markdown);


// write converted file to storage using the specified method/strategy
if(isset($argv[2])) {
    $storageMethod = $argv[2];
    $storageStrategy = new StorageStrategy($storageMethod);
    $storageStrategy->store($converted);
}

?>

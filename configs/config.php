<?php                                                                                                                                                                                        
// configuration parameters                                                                                                                                                                  
                                                                                                                                                                                             
// for snoopy client                                                                                                                                                                         
@define('HTTP_USER_AGENT', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; pl; rv:1.9) Gecko/2008052906 Firefox/3.0', true);                                                                       
@define('HTTP_TIME_OUT', 30, true); // in seconds                                                                                                                                            
@define('HTTP_USE_GZIP', true, true);                                                                                                                                                        
$httpIP = null; // IP string. Or null for any.                                                                                                                                               
                                                                                                                                                                                             
@define('RPC_TIME_OUT', 5, true); // in seconds                                                                                                                                              
                                                                                                                                                                                             
@define('LOG_RPC_CALLS', false, true);                                                                                                                                                       
@define('LOG_RPC_FAULTS', true, true);                                                                                                                                                       
                                                                                                                                                                                             
// for php                                                                                                                                                                                   
@define('PHP_USE_GZIP', false, true);                                                                                                                                                        
@define('PHP_GZIP_LEVEL', 2, true);                                                                                                                                                          
                                                                                                                                                                                             
$do_diagnostic = true;                                                                                                                                                                       
$log_file = '/tmp/rutorrent_errors.log'; // path to log file (comment or leave blank to disable logging)                                                                                     
                                                                                                                                                                                             
$saveUploadedTorrents = true; // Save uploaded torrents to profile/torrents directory or not                                                                                                 
$overwriteUploadedTorrents = false; // Overwrite existing uploaded torrents in profile/torrents directory or make unique name                                                                
                                                                                                                                                                                             
// $topDirectory = '/home'; // Upper available directory. Absolute path with trail slash.
$forbidUserSettings = false;

$scgi_port = 5000;
$scgi_host = "127.0.0.1";

// For web->rtorrent link through unix domain socket
// (scgi_local in rtorrent conf file), change variables
// above to something like this:
//
//$scgi_port = 0;
//$scgi_host = "unix:///tmp/rtorrent.sock";

//$XMLRPCMountPoint = "/RPC2"; // DO NOT DELETE THIS LINE!!! DO NOT COMMENT THIS LINE!!!

$pathToExternals = array(
"php" => '/usr/bin/php', // Something like /usr/bin/php. If empty, will be found in PATH.
"curl" => '/usr/bin/curl', // Something like /usr/bin/curl. If empty, will be found in PATH.
"gzip" => '/bin/gzip', // Something like /usr/bin/gzip. If empty, will be found in PATH.
"id" => '/usr/bin/id', // Something like /usr/bin/id. If empty, will be found in PATH.
"stat" => '/usr/bin/stat', // Something like /usr/bin/stat. If empty, will be found in PATH.
);

$localhosts = array( // list of local interfaces
"127.0.0.1",
"localhost",
);

$profilePath = '../share'; // Path to user profiles
$profileMask = 0777; // Mask for files and directory creation in user profiles.
// Both Webserver and rtorrent users must have read-write access to it.
// For example, if Webserver and rtorrent users are in the same group then the value may be 0770.

?>

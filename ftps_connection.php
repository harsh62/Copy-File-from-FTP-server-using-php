<?php
//The server from where the file needs to be copies
$server = "209.222.222.55";
//file name to copy
$filename = "folder_name/file_to_be_copied.html";
//path on your server where you want to srore the copied file
$path = "/path/to/copy/file.html";
//user name of the server from where the file needs to be copied
$user = "username";
//password of the server from where the file needs to be copied
$pass = "pass";
    
$fp=fopen($path,'w');
//990 is the port number here from which the request will be made// change the port number as per your need
$ftp_server='ftps://'.$server.':990/'.$filename;
    
    
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$ftp_server);
curl_setopt($ch,CURLOPT_USERPWD,$user.':'.$pass);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
curl_setopt($ch,CURLOPT_FTP_SSL,CURLFTPSSL_TRY);
curl_setopt($ch,CURLOPT_FTPSSLAUTH,CURLFTPAUTH_TLS);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FILE,$fp);

$output=curl_exec($ch);
//echo $output;
$error_no=curl_errno($ch);
var_dump(curl_error($ch));
curl_close($ch);

?>

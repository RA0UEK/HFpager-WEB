<?php

$id = $_GET['id'];
$message = $_GET['message'];

If ($id=="") {
$id = 0;
}


If ($message<>'') {
$command = 'am start --user 0 -n ru.radial.nogg.hfpager/ru.radial.full.hfpager.MainActivity -a "android.intent.action.SEND" --es "android.intent.extra.TEXT" "'.$message.'" -t "text/plain" --ei "android.intent.extra.INDEX" "'.$id.'" --es "android.intent.extra.SUBJECT" "Flags:1,0"';
$output = shell_exec($command);
header('Location: showbar.php');
	}  else {
header('Location: index.php');
	}

exit();
?>

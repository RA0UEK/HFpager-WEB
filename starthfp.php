<?php
$command = 'am start --user 0 -n ru.radial.nogg.hfpager/ru.radial.full.hfpager.MainActivity -a "android.intent.action.SEND" --es "android.intent.extra.TEXT" "notext" -t "text/plain" --ei "android.intent.extra.INDEX" "99999" --es "android.intent.extra.SUBJECT" "Flags:1,0"';
shell_exec($command);
exit();
?>

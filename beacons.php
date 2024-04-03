<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML lang="RU">
<HEAD>
    <TITLE>HFpager WEB | Beacons</TITLE>
    <META http-equiv=Content-Type content="text/html; charset=windows-1251">
    <META name="viewport" content="width=width-device, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style type="text/css">
        .main {
            padding: 8px 8px;
            background: #000000;
            word-wrap: break-word;
            word-break: break-all; /* более приоритетно */
        }

        @media (min-width: 1000px) {
            input[type=text] {
                width: 100px;
                padding: 8px 8px;
                margin: 2px 0;
                box-sizing: border-box;
            }

            textarea {
                max-width: 400px;
                max-height: 100px;
                padding: 8px 8px;
                margin: 2px 0;
                box-sizing: border-box;
            }
        }

        @media (max-width: 500px) {
            input[type=text] {
                width: 90%;
                padding: 8px 8px;
                margin: 2px 0;
                box-sizing: border-box;
            }

            textarea {
                max-width: 90%;
                max-height: 100px;
                padding: 8px 8px;
                margin: 2px 0;
                box-sizing: border-box;

                ..
            }
        }

        h1 {
            font-family: "Verdana", "Arial", serif;
            font-size: 28px;
            color: #FFFFFF;
            text-align: center;
            font-weight: normal;
        }

        h2 {
            font-family: "Verdana", "Arial", serif;
            font-size: 14px;
            color: #FFFFFF;
            text-align: center;
            font-weight: normal;
        }

        h3 {
            font-family: "Verdana", "Arial", serif;
            font-size: 14px;
            color: #FFFF00;
            text-align: center;
            font-weight: normal;
        }

        h4 {
            font-family: "Verdana", "Arial", serif;
            font-size: 14px;
            color: #FFFFFF;
            text-align: left;
            font-weight: normal;
        }

        h5 {
            font-family: "Verdana", "Arial", serif;
            font-size: 14px;
            color: #00FF00;
            text-align: left;
            font-weight: normal;
        }


    </style>
</HEAD>
<BODY bottomMargin="0" vLink="#99ccff" aLink="#ff0000" link="#99ccff" bgColor="#000000" leftMargin="0" topMargin="0" rightMargin="0" marginwidth="0" marginheight="0">


<h1><br>HFpager WEB</h1>
<h2><a href="index.php">Сообщения</a> | Маяки</h2>

<div class="main">

    <?php

    const COUNT_LIMIT = 10;
    $dir = '/data/data/com.termux/files/home/storage/shared/Documents/HFpager';
    $arrayDir = scandir($dir);
    $countDir = count($arrayDir) - 1;
    $countLimit = 0;

    foreach ($arrayDir as $rowDir) {
        if ($countLimit >= COUNT_LIMIT) {
            break;
        }

        $rowDir = $arrayDir[$countDir];
        $countDir = $countDir - 1;

        $rowDirLength = strlen($rowDir);
        if (substr($rowDir, $rowDirLength - 3, 4) == "BEA") {
            $rowDate = substr($rowDir, 0, 10);
            print_r('<h3>');
            print_r("<b>" . $rowDate . "</b><br>");
            print_r('</h3>');
            $countLimit = $countLimit + 1;

// Вывод маяков из папки за указанную дату

            $dir = '/data/data/com.termux/files/home/storage/shared/Documents/HFpager/' . $rowDir;
            $array = scandir($dir);
            $count = array_key_last($array);

            foreach ($array as $row) {
                $row = $array[$count];
                $count = $count - 1;

                if (strlen($row) > 34) {
                    print_r('<h4>');

                    $time = substr($row, 0, 6);
                    $hour = substr($time, 0, 2);
                    $minute = substr($time, 2, 2);
                    $second = substr($time, 4, 2);
                    print_r($hour . ":" . $minute . ":" . $second . "<br>");

                    $fd = fopen($dir . '/' . $row, 'r') or die("ERR_OPEN_FILE");

                    while (!feof($fd)) {
                        $str = fgets($fd, 4096);

                        $str = iconv('Windows-1251', 'utf-8', $str);
                        print_r($str);
                    }

                    fclose($fd);
                    print_r("<br><br>\r\n");
                }
            }

// Вывод маяков из папки за указанную дату	

        }
    }

    ?>

</div>

<h2>zabtech.ru</h2>

</BODY>
</HTML>
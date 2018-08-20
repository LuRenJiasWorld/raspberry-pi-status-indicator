<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>树莓派又挂了吗</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            html, body {
                font-family: Helvetica, Tahoma, Arial, "PingFang SC", "Hiragino Sans GB", "Heiti SC", STXihei, "Microsoft YaHei", SimHei, "WenQuanYi Micro Hei";
            }
        </style>
    </head>
    
    <body>
        <?php
            if ($_GET["action"] == "update") {
                $local_timestamp = time();
                $file = fopen("status.txt", "w");
                fwrite($file, $local_timestamp);
                fclose($file);
                echo "success!";
            } else {
                $file = fopen("status.txt", "r");
                $stored_timestamp = fgets($file);
                fclose($file);
                $local_timestamp = time();
                $diff = timediff($stored_timestamp, $local_timestamp);
                echo "<img src=\"Raspberry-Pi-Logo.png\" style=\"clear:both; display: block; margin:auto; width:300px; margin-top:80px;\"></img>";
                echo "<h1 style=\"text-align:center; font-weight:200; margin-top:50px;\">上一次更新时间：" . date("Y-m-d h:i:sa", $stored_timestamp) . "</h1>";
                echo "<h2 style=\"text-align:center; font-weight:400; color:blue;\">时间差：" . $diff["day"] . "天" . $diff["hour"] . "小时" . $diff["min"] . "分钟" . $diff["sec"] . "秒</h2>";
                echo "<h6 style=\"font-size:13px; color:#666666; text-align:center; border-bottom: #6099de 1px dashed; width:120px; margin:auto;\">每分钟刷新一次状态</h6>"; 
            } 
        
        
            function timediff($begin_time,$end_time) {
                if($begin_time < $end_time) {
                    $starttime = $begin_time;
                    $endtime = $end_time;
                } else {
                    $starttime = $end_time;
                    $endtime = $begin_time;
                }
            
                //计算天数
                $timediff = $endtime - $starttime;
                $days = intval($timediff / 86400);
        
                //计算小时数
                $remain = $timediff % 86400;
                $hours = intval($remain / 3600);
        
                //计算分钟数
                $remain = $remain % 3600;
                $mins = intval($remain / 60);
        
                //计算秒数
                $secs = $timediff % 60;
                $res = array("day" => $days, "hour" => $hours, "min" => $mins, "sec" => $secs);
        
                return $res;
            }
        ?>
    </body>
</html>

<?php

//tomorrow I today+1
$tomorrow = mktime(0, 0, 0, date('m') , date('d')+1, date('Y'));

//yesterday is today-1
$yesterday = mktime(0, 0, 0, date('m') , date('d')-1, date('Y'));

//lastmonth is (this month - 1)
$lastmonth = mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));

//next month is (this month+1)
$nextmonth = mktime(0, 0, 0, date('m')+1, date('d'), date('Y'));

//last year is (this year + 1)
$lastyear = mktime(0, 0, 0, date('m') , date('d'), date('Y')-1);

//nextyear is (this year + 1)
$nextyear = mktime(0, 0, 0, date('m') , date('d'), date('Y')+1);

//show the results
echo "Tomorrow is: ".date('M-d-Y',$tomorrow)."<br>";
echo "Yesterday was: ".date('M-d-Y',$yesterday)."<br>";
echo "Lastmonth was: ".date('M-Y',$lastmonth)."<br>";
echo "Next month is: ".date('M-Y',$nextmonth)."<br>";
echo "Last year was: ".date('Y',$lastyear)."<br>";
echo "Next year is: ".date('Y',$nextyear)."<br>";

?>

<html>
    <head>
        <title>Example Calendar</title>
        <style type="text/css">
            td {font-family: verdana; font-size: 12px}
            tr.title {background-color: black; color: white; }
            tr td a {color: white;}
            .day-heading {font-weight: bold; background-color: yellow}
            .current-day {font-weight: bold; color: red}
            
        </style>
    </head>
    <body>
        <h2>Example Calendar</h2>
        <?php
        $thismonth = date("n");
        $thisyear = date("y");
        $todaysdate = date("j");

        /* Check to see if the month and year are set, if not default to the current month & year */

        if (isset($_REQUEST['month'])) {
            $month = $_REQUEST['month'];
        }

        if (!isset($month)) {
            $month = date("n");
        }

        if (isset($_REQUEST['year'])) {
            $year = $_REQUEST['year'];
        }

        if (!isset($year)) {
            $year = date("y");
        }

        $nextmonth = $month + 1;
        $lastmonth = $month - 1;
        $nextyear = $year + 1;
        $lastyear = $year - 1;


        /* find out how many days are in the current month and what day starts out the month */

        $days_in_month = date("t", mktime(0, 0, 0, $month, 1, $year));

        $first_day_is = date("w", mktime(0, 0, 0, $month, 1, $year));

        $monthheader = date("F", mktime(0, 0, 0, $month, 1, $year));

        $yearheader = date("Y", mktime(0, 0, 0, $month, 1, $year));


        /* Find out how many rows are needed to display without extra rows */

        if ($days_in_month == "28" && $first_day_is == "0") {
            $rows = 4;
        } elseif ($days_in_month == "31" && $first_day_is >= "5") {
            $rows = 6;
        } elseif ($days_in_month == "30" && $first_day_is == "6") {
            $rows = 6;
        } else {
            $rows = 5;
        }
        
        //let's generate links to last and next months/years
        $lastmonth_link = "$_SERVER[PHP_SELF]?month=$lastmonth&year=$year";

        $nextmonth_link= "$_SERVER[PHP_SELF]?month=$nextmonth&year=$year";
        $lastyear_link = "$_SERVER[PHP_SELF]?year=$lastyear&month=$month";
        $nextyear_link = "$_SERVER[PHP_SELF]?year=$nextyear&month=$month";
        
        ?>

        <table border="1" cellpadding="1" cellspacing="0">
            <tr class="title">
                <td colspan="4" >
                    <a href="<?php echo $lastmonth_link;  ?>">&laquo;</a> 
                    <?php echo $monthheader; ?>
                    <a href="<?php echo $nextmonth_link;  ?>">&raquo;</a><br>
                </td>
                <td colspan="3">
                    <a href="<?php echo $lastyear_link; ?>">&laquo;&nbsp;</a> 
                    <?php echo $yearheader; ?>
                    <a href="<?php echo $nextyear_link; ?>"> &raquo;&nbsp;</a>

                </td>
            </tr>
            <tr class="day-heading">
                <td>S</td>
                <td>M</td>
                <td>T</td>
                <td>W</td>
                <td>T</td>
                <td>F</td>
                <td>S</td>
            </tr>

<?php
/* Display the days */

$i = 0;

$day = 1;

while ($i < $rows) {

    echo "<tr>";

    $weekday = 0;

    while ($weekday < 7) {

        if ($day > $days_in_month) {

            $contents = "&nbsp;";
        } elseif ($i == "0" && $weekday < $first_day_is) {

            $contents = "&nbsp;";
        } else {

            /* See if it's today */

            if ($month == "$thismonth" && $year == "$thisyear" && $day == "$todaysdate") {

                $contents = "<span class='current-day'>$day</span>";
            } else {

                $contents = $day;
            }

            $day++;
        }

        echo "<td>$contents</td>";

        $weekday++;
    }

    echo "</tr>";

    $i++;
}
?>
        </table>
    </body>
</html>

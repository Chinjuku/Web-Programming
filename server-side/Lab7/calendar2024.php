<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar 2024 Generator</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Calendar 2024</h1>
    <?php
        // Loop through each month
        for ($month = 1; $month <= 12; $month++) {
            // Get the number of days in the month
            $num_days = cal_days_in_month(CAL_GREGORIAN, $month, 2024);
            // Get the name of the month
            $month_name = date("F", mktime(0, 0, 0, $month, 1, 2024));

            // Display the month and year
            echo "<h2>$month_name 2024</h2>";

            // Create the table for the month
            echo "<table>";
            echo "<tr>";
            echo "<th>Mon</th>";
            echo "<th>Tue</th>";
            echo "<th>Wed</th>";
            echo "<th>Thu</th>";
            echo "<th>Fri</th>";
            echo "<th>Sat</th>";
            echo "<th>Sun</th>";
            echo "</tr>";

            // Initialize the day of the week for the first day of the month
            $first_day_of_month = date("N", mktime(0, 0, 0, $month, 1, 2024));

            // Start a new row in the table
            echo "<tr>";

            // Output empty cells for the days before the first day of the month
            for ($i = 1; $i < $first_day_of_month; $i++) {
                echo "<td></td>";
            }

            // Loop through each day of the month
            for ($day = 1; $day <= $num_days; $day++) {
                // Output the day of the month in the table cell
                echo "<td>$day</td>";

                // If the end of the week is reached, start a new row
                if (($first_day_of_month + $day - 1) % 7 == 0) {
                    echo "</tr><tr>";
                }
            }

            // Output empty cells for the remaining days of the week
            for ($i = ($first_day_of_month + $num_days - 1) % 7 + 1; $i <= 7; $i++) {
                echo "<td></td>";
            }

            // Close the table
            echo "</tr>";
            echo "</table>";
        }
    ?>
</body>
</html>

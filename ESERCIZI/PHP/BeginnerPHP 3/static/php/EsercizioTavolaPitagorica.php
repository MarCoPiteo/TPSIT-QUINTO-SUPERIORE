<!DOCTYPE html>
<html>
<head>
    <title>Tavola Pitagorica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 10px 10px 10px rgb(0, 0, 0);
        }

        table th, table td {
            padding: 10px 20px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #333;
            color: #fff;
            font-weight: bold;
        }

        table td {
            text-align: center;
        }

        table td:first-child {
            background-color: #333;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Tavola Pitagorica dei Numeri fino a 10</h1>
    <table>
        <tr>
            <th>1</th>
            <?php
            for ($i = 2; $i <= 10; $i++) {
                echo "<th>$i</th>";
            }
            ?>
        </tr>
        <?php
        for ($i = 2; $i <= 10; $i++) {
            echo "<tr>";
            //echo "<td>$i</td>";
            for ($j = 1; $j <= 10; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

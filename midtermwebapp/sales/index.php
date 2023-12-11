<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="index.css">
    <title>Sales Report</title>

</head>
<body>
    <div class="container">
        <h3>Sales Report</h3>
        <h4> We keep track of all sales we made.</h4> </br>
        <p> Select a date. </p>

        <form name="formDates" action="report.php" method="POST">
            <label for="from">From date:</label>
            <input type="date" name="fromDate" required>
            <br/>
            <label for="to">To Date:</label>
            <input type="date" name="toDate" required>
            <br/>
            <br/>
            <button type="submit" name="submit">Generate Report</button>
        </form>
        
        <hr/>
        <nav>
                <ul>
                    <li><a href="../intro.php">Back to Home</a></li>
                    <li><a href="add_sales.php">Add sales</a></li>
                </ul>
        </nav>  
    </div>
</body>
</html>

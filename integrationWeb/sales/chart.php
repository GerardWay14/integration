<?php
    session_start();

     // get session variables
    $items = $_SESSION["item"];
    $price = $_SESSION["price"];
    $bgColor = $_SESSION["bgColor"];
    $borderColor = $_SESSION["borderColor"];

     // remove and destory all session variables
     session_unset(); 
     session_destroy(); 
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="chart.css">
    <title>Sample Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="myChart"></canvas>

    <br />
    <a href="index.php">Back to Main</a>
</body>
</html>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
                labels: <?php echo json_encode($items) ?>,
                datasets: [{
                        label: 'Price of Item Sold',
                        data: <?php echo json_encode($price) ?>,
                        backgroundColor: <?php echo json_encode($bgColor) ?>,
                        borderColor: <?php echo json_encode($borderColor) ?>,
                        borderWidth: 2
                }] 
        },
        options: {
            indexAxis: 'y',
            plugins: {
                title: {
                    display: true,
                    text: 'Sample Chart of Sales'
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        color: 'rgb(255, 99, 132)'
                }
            }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                x: {
                    grid: {
                        display: true
                    }
                },
                y: {
                    grid: {
                    display: false
                    }
                }
            }
        }
    });
</script>
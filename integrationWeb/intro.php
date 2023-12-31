<?php
require 'conn.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="intro2.css">

    <script>
        function fetchWikipediaArticle() {
            fetch('https://en.wikipedia.org/w/api.php?action=query&format=json&origin=*&generator=random&grnnamespace=0&prop=extracts&exintro=true')
                .then(response => response.json())
                .then(data => {
                    const wikipediaArticleInfo = document.getElementById('wikipediaArticleInfo');

                    // Check if there are articles in the response
                    if (data.query.pages) {
                        const pages = Object.values(data.query.pages);
                        const article = pages[0];

                        wikipediaArticleInfo.innerHTML = `
                            <p>Article Title: ${article.title}</p>
                            <p>Extract: ${article.extract || 'Not available'}</p>
                        `;
                    } else {
                        wikipediaArticleInfo.innerHTML = 'No articles found.';
                    }
                })
                .catch(error => console.error('Error fetching Wikipedia article:', error));
        }

        document.addEventListener('DOMContentLoaded', function() {
            const wikipediaLink = document.getElementById('wikipediaLink');
            const wikipediaButton = document.getElementById('wikipediaButton');

            wikipediaButton.addEventListener('click', function() {
                fetchWikipediaArticle();
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="navbar">

            <div class="user-info">
                <span class="profile-name">Welcome! </span>
                <div class="username">
                    <?php
                    $id = $_SESSION['user'];
                    $sql = $conn->prepare("SELECT * FROM `member` WHERE `mem_id`='$id'");
                    $sql->execute();
                    $fetch = $sql->fetch();
                    echo $fetch['username']
                    ?>
                </div>
            </div>

            <nav>
                <ul>
                    <li><a href="intro.php">Home</a></li>
                    <li><a href="product/index.php">Products</a></li>
                    <li><a href="customer/index.php">Orders</a></li>
                    <li><a href="sales/index.php">Sales</a></li>
                    <li><a href="esports.php">Cat Info</a></li>
                    <li><a href="article.php?">Cats!</a></li>
                    <li><a href="youtube.php">YouTube</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <img src="menu.png" class="menu-icon">
        </div>
        <div class="row">
            <div class="col-1">
                <h2>Best Seller!<br>Intel i5-13400</h2>
                <h3>With Nvision N190HD 
                    V2 Desktop Package
                    LGA 1700 Socket
                </h3>
                <p>With 10 (6P + 4E)/16 Cores/Threads<br>
                    2.5 Base Frequency<br>
                    4.6 Top Boost Frequency<br>
                    And PCIe 5.0 and DDR5 Memory <br>
                </p>
                <h4>for Php 15,874.99</h4>
            </div>
            <div class="col-2">
                <img src="comp.png" class="pellet">
                <div class="color-box"></div>
            </div>
        </div>
    </div>
</body>

</html>
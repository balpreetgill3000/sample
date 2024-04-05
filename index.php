<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Page</title>
    <style>
        /* CSS for styling */
        .article {
            margin-bottom: 20px;
        }
        .article img {
            width: 100%;
            max-width: 300px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Articles</h1>
    <div class="articles-container">
        <?php
            // Database credentials
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "sample";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch articles from the database
            $sql = "SELECT * FROM articles";
            $result = $conn->query($sql);

            // Display articles
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="article">';
                    echo '<h2>' . $row['title'] . '</h2>';
                    echo '<img src="' . $row['image_url'] . '" alt="' . $row['title'] . '">';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "No articles found.";
            }

            // Close connection
            $conn->close();
        ?>
    </div>
</body>
</html>
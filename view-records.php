<?php

// no need for an if statement here as page should load entries from the database automatically

try {

        require_once "includes/dbh.inc.php"; // establishes connection from the dbh file

        $stmt = $pdo->prepare("SELECT * FROM matches;"); // prepared statement - gets all matches

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch all match entries as an associative array

        $pdo = null; // ends connection

        $stmt = null; // ends statement

} catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoD Zombies Stat Tracker - Home</title>
    <link rel="stylesheet" href="CSS/main.css">
</head>

<body>

    <header>
        <a id="header-link" href="index.php"><h1>CoD Zombies - Local Stat Tracker</h1></a>
    </header>

    <nav>
        <div id="nav-menu">
            <a href="add-record.php">Add Match</a>
            <a href="view-records.php">View All Match Records</a>
            <a href="search-records.php">Search Matches</a>
            <a href="delete-record.php">Delete Matches</a>
        </div>
    </nav>

    <main>

    <h2>VIEW RECORDS</h2>

    <?php 
    if (empty($results)) { // if no data inside array (due to no comments present, invalid username etc)
        echo "<div>";
        echo "<p>There were no results - no matches recorded!</p>";
        echo "</div>";
    } else { // if matches ARE inside array (what we want)
        foreach($results as $result) { // breaks each match entry in the array into something we can work with
            echo "<br>";
            echo "<div class='current_entry'>";
            echo "<div class='entry_header'>";
            echo "<h4>Match Date: " . htmlspecialchars($result["created_at"]) . "</h4>";
            echo "<h4>Game: " . htmlspecialchars($result["game"]) . "</h4>";
            echo "<h4>Map: " . htmlspecialchars($result["maps"]) . "</h4>";
            echo "</div>";
            echo "<div class='entry_content'>";
            echo "<p>Points: " . htmlspecialchars($result["points"]) . "</p>";
            echo "<p>Kills: " . htmlspecialchars($result["kills"]) . "</p>";
            echo "<p>Headshots: " . htmlspecialchars($result["headshots"]) . "</p>";
            echo "<p>Round Reached: " . htmlspecialchars($result["round_reached"]) . "</p>";
            echo "<p>Extra Comments: " . htmlspecialchars($result["comments"]) . "</p>";
            echo "</div>";
            echo "</div>";
        }
    }
    ?>

    </main>

    <footer>
        <?php
        echo "<h3>Created by Lee Gallagher DDCC &copy; " . date("Y") . "</h3>"
        ?>
    </footer>

</body>
</html>
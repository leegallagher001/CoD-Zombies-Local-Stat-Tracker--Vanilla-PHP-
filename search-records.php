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
    <title>CoD Zombies Stat Tracker - Search Records</title>
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

    <h2>TOP MATCH STATS</h2>

    <?php 
    if (empty($results)) { // if no data inside array (due to no comments present, invalid username etc)
        echo "<div>";
        echo "<p>There were no results - no matches recorded!</p>";
        echo "</div>";
    } else { // if matches ARE inside array (what we want)
        static $topScore = 0;
        static $topKills = 0;
        static $highestRound = 0;

        /* First for-each loop is for calculating the numbers for the dashboard - this
        allows us to create the dashboard at the top of the page */

        foreach($results as $result) { 

            // Calculate match with highest score
            if (htmlspecialchars($result["points"]) > $topScore) {
                $topScore = htmlspecialchars($result["points"]);
            }

            // Calculate match with most kills
            if (htmlspecialchars($result["kills"]) > $topKills) {
                $topKills = htmlspecialchars($result["kills"]);
            }

            // calculate match with highest round reached
            if (htmlspecialchars($result["round_reached"]) > $highestRound) {
                $highestRound = htmlspecialchars($result["round_reached"]);
            }
        }
    }

        echo "<div class='dashboard'>";
        echo "<div class='dashboard_element'>";
        echo "<p>Highest Match Score</p>";
        echo "<h1>" . $topScore . "</h1>";
        echo "</div>";
        echo "<div class='dashboard_element'>";
        echo "<p>Highest Match Kills</p>";
        echo "<h1>" . $topKills . "</h1>";
        echo "</div>";
        echo "<div class='dashboard_element'>";
        echo "<p>Highest Round Reached</p>";
        echo "<h1>" . $highestRound . "</h1>";
        echo "</div>";
        echo "</div>";

    ?>

    <h2>SEARCH RECORDS</h2>

    <div id="search-form-container">
        <p>Search for specific parts of the CoD Zombies record database below.</p>
        <p>At the moment, users can search either by map or by game, but as with the records system overall I'm looking to update over time as I improve my skills and knowledge of PHP & MySQL.</p>

        <form action="search-records-show-results.php" method="post">
            <input type="text" id="search" name="search" placeholder="Enter Game or Map">
            <button>Search</button>
        </form>
    </div>

    </main>

    <footer>
        <?php
        echo "<h3>Created by Lee Gallagher DDCC &copy; " . date("Y") . "</h3>"
        ?>
    </footer>

</body>
</html>
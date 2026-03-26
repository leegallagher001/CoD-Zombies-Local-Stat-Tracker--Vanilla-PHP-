<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $game = $_POST["game"]; // when submitting data to database, not as much need to sanitise data
    $maps = $_POST["maps"];
    $noOfPlayers = $_POST["no_of_players"];
    $points = $_POST["points"];
    $kills = $_POST["kills"];
    $downs = $_POST["downs"];
    $revives = $_POST["revives"];
    $headshots = $_POST["headshots"];
    $roundReached = $_POST["round_reached"];
    $comments = $_POST["comments"];

    try {

        require_once "dbh.inc.php"; // establishes connection from the dbh file

        $stmt = $pdo->prepare("INSERT INTO matches (game, maps, no_of_players, points, kills, downs, revives, headshots, round_reached, comments) VALUES (:game, :maps, :no_of_players, :points, :kills, :downs, :revives, :headshots, :round_reached, :comments);"); // prepared statement

        $stmt->bindParam(':game', $game); // bind data to prepared statement - keeps data in a single, safe submission format
        $stmt->bindParam(':maps', $maps);
        $stmt->bindParam(':no_of_players', $noOfPlayers);
        $stmt->bindParam(':points', $points);
        $stmt->bindParam(':kills', $kills);
        $stmt->bindParam(':downs', $downs);
        $stmt->bindParam(':revives', $revives);
        $stmt->bindParam(':headshots', $headshots);
        $stmt->bindParam(':round_reached', $roundReached);
        $stmt->bindParam('comments', $comments);

        $stmt->execute(); // execute SQL query on MySQL database

        $pdo = null; // ends connection

        $stmt = null; // ends statement

        header("Location: ../add-record.php");

        echo "<br>";
        echo "<h3>Form & Match Data Submitted Successfully!</h3>"; // success statement

        die(); // closes off after connection ended

    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../index.php"); // redirects user back to index.php page
}
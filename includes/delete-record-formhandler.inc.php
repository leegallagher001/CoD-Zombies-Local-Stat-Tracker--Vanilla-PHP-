<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $createdAt = $_POST["created_at"];

    try {

        require_once "dbh.inc.php"; // establishes connection from the dbh file

        $stmt = $pdo->prepare("DELETE FROM matches WHERE created_at = :created_at;"); // prepared statement

        $stmt->bindParam(':created_at', $createdAt); // bind data to prepared statement - keeps data in a single, safe submission format

        $stmt->execute(); // execute SQL query on MySQL database

        $pdo = null; // ends connection

        $stmt = null; // ends statement

        header("Location: ../delete-record.php");

        die(); // closes off after connection ended

        echo "<br>";
        echo "<h3>Form & Match Data Deleted Successfully!</h3>";

    } catch(PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../index.php"); // redirects user back to index.php page
}
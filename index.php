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
        
        <div id="intro">
            <h2>Home</h2>
            <p>Hello, and welcome to the Call of Duty Zombies local stat tracker!</p>
            <p>This project aims to build a local stat tracker for anyone who plays a lot of the old Call of Duty zombies games in offline single-player or split-screen modes.</p>
        </div>

        <a id="new" href="add-record.php">
            <div class="home-page-link">
                <h2>"The Mystery Box" - ADD RECORD</h2>
                <p>Add a record of a recent single-player or split-screen zombies match.</p>
            </div>
        </a>

        <a id="view-all" href="view-records.php">
            <div class="home-page-link">
                <h2>"Fetch Me Their Souls" - VIEW MATCH RECORDS</h2>
                <p>View all records of all matches recorded so far.</p>
            </div>
        </a>

        <a id="search" href="search-records.php">
            <div class="home-page-link">
                <h2>"Easter Egg Hunt" - SEARCH RECORDS</h2>
                <p>Look here to search for specifics, such as specific map stats, round records or specific player stats.</p>
            </div>
        </a>

        <a id="delete" href="delete-record.php">
            <div class="home-page-link">
                <h2>"Bye Bye" - DELETE RECORD</h2>
                <p>Mainly for the purposes of setting a record straight in the event of a mistake made in entry, records can be deleted here.</p>
            </div>
        </a>

    </main>

    <footer>
        <?php
        echo "<h3>Created by Lee Gallagher DDCC &copy; " . date("Y") . "</h3>"
        ?>
    </footer>

</body>
</html>
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

    <h2>ADD NEW RECORD</h2>

    <div id="add-new-form">
        <form action="includes/add-record-formhandler" method="post">
            <label for="game">Game</label>
            <input type="text" id="game" name="game" placeholder="Enter Game (Black Ops 1, World at War etc.)">
            <br>

            <label for="map">Map</label>
            <input type="text" id="map" name="map" placeholder="Enter Map Name">
            <br>

            <label for="no_of_players"># of Players</label>
            <input type="number" id="no_of_players" name="no_of_players" placeholder="0">
            <br>

            <label for="points">Points</label>
            <input type="number" id="points" name="points" placeholder="00">
            <br>

            <label for="kills">Kills</label>
            <input type="number" id="kills" name="kills" placeholder="00">
            <br>

            <label for="downs">Downs</label>
            <input type="number" id="downs" name="downs" placeholder="00">
            <br>

            <label for="revives">Revives</label>
            <input type="number" id="revives" name="revives" placeholder="00">
            <br>

            <label for="headshots">Headshots</label>
            <input type="number" id="headshots" name="headshots" placeholder="00">
            <br>

            <label for="round_reached">Round Reached</label>
            <input type="number" id="round_reached" name="round_reached" placeholder="00">
            <br>

            <label for="comments">Comments</label>
            <input type="text" id="comments" name="comments" placeholder="Additional comments...">
            <br>

            <button>Submit New Match</button>
            <br>
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
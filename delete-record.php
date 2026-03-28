<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoD Zombies Stat Tracker - Delete Record</title>
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

    <h2>DELETE RECORD</h2>

    <div id="delete-form-container">
        <p>Please copy the date & time of the record you wish to delete on the "View Records" page into the form below</p>
        <p>This should be in the exact format shown in the record ("0000-00-00 00:00:00").</p>
        <form id="delete-match" action="includes/delete-record-formhandler.inc.php" method="post">
            <input type="text" id="created_at" name="created_at" placeholder="Enter Date/Time To Be Deleted">
            <button>Delete Record</button>
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
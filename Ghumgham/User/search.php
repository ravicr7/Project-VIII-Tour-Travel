<?php
session_start();

// Include database connection and other necessary files
$dsn = 'mysql:dbname=ghumgham;host=localhost';
$user = 'root';
$password = 'mysql';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$searchResultsHTML = '';

if(isset($_GET['destination'])) {
    $searchQuery = $_GET['destination'];

    // TODO: Perform the database query to retrieve search results based on the search query
    // For example:
    // $searchResults = performDatabaseSearch($searchQuery);

    // For testing purposes, let's assume some sample search results:
    $searchResults = array(
        array('title' => 'Package 1', 'description' => 'Description of Package 1'),
        array('title' => 'Package 2', 'description' => 'Description of Package 2'),
        // Add more search results as needed
    );

    // Generate HTML content for displaying the search results
    foreach ($searchResults as $result) {
        $title = $result['title'];
        $description = $result['description'];

        // $searchResultsHTML .= "<div class='search-result'>';
        // $searchResultsHTML .= "<h3>$title</h3>";
        // $searchResultsHTML .= "<p>$description</p>";
        // $searchResultsHTML .= "</div>";
        ?>
        <?php
             $searchResultsHTML .="<div class='card mb-2' style='width: 18rem;'>

    <div class='card-body'>
        
       <h5 class='card-title'>$title</h5>
       <p class='card-text'>$description</p>

    </div>
    "
    ?>
</div>
        <?php
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Include necessary CSS or stylesheets -->
    <?php include_once './includes.html'; ?>
</head>
<body id="toppage">
    <!-- The rest of your HTML code -->



    <!-- Search Bar -->
    <div class="search-bar">
        <form id="search-form" class="form-inline" action="index.php" method="get">
            <div class="input-group">
                <input type="text" class="form-control" id="search-input" name="destination" placeholder="Search...">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Display the search results -->
    <div class="search-results">
        <?php echo $searchResultsHTML; ?>
    </div>

    <!-- The rest of your HTML code -->
</body>
</html>

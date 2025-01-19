<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection file (MySQLi version)
include_once("create_database.php");

// Get the search query from the AJAX request
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

try {
    // Prepare the SQL query to search users
    $sql = "SELECT user_name, user_email FROM users 
            WHERE (user_name LIKE ? OR user_email LIKE ?)
            LIMIT 10";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($conn));
    }
    
    // Bind the parameters
    $searchTerm = "%" . $query . "%";
    mysqli_stmt_bind_param($stmt, "ss", $searchTerm, $searchTerm);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch the matching users
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Return the results
    echo json_encode($users);
    
    // Close the statement
    mysqli_stmt_close($stmt);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Error searching users: " . $e->getMessage()]);
}
?>

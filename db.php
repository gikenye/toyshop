<?php
require_once __DIR__ . '/vendor/autoload.php'; // Include Composer's autoloader

// Start the session if it hasn't already been started
if (!isset($_SESSION)) {
    session_start();
}

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database connection parameters
$db_user = $_ENV['POSTGRES_USER'];
$db_password = $_ENV['POSTGRES_PASSWORD'];
$db_host = $_ENV['POSTGRES_HOST'];
$db_name = $_ENV['POSTGRES_DATABASE'];
$sslmode = 'require'; // Default SSL mode

// Check for SSL mode variations
if (isset($_ENV['POSTGRES_URL_NO_SSL'])) {
    $dsn = $_ENV['POSTGRES_URL_NO_SSL'];
} elseif (isset($_ENV['POSTGRES_URL_NON_POOLING'])) {
    $dsn = $_ENV['POSTGRES_URL_NON_POOLING'];
} elseif (isset($_ENV['POSTGRES_PRISMA_URL'])) {
    $dsn = $_ENV['POSTGRES_PRISMA_URL'];
}

// Options for PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $db_user, $db_password, $options);
    echo "Connected successfully!";
} catch (\PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}


// Check whether the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect user to login page
    header('Location: /login.php');
    exit();
}

// Your additional code here, e.g., fetching user data, handling forms, etc.
?>
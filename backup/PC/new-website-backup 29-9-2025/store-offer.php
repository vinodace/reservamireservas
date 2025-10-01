<?php
session_start();

// Ensure flights session exists
if (!isset($_SESSION['flights'])) {
    $_SESSION['flights'] = [];
}

// Get offerId from URL
if (!isset($_GET['offerId'])) {
    die("❌ No offer selected.");
}
$offerId = $_GET['offerId'];

// Load offers from API cache (if you saved them in session earlier)
if (isset($_SESSION['offers'][$offerId])) {
    $_SESSION['flights'][$offerId] = $_SESSION['offers'][$offerId];
    $_SESSION['dictionaries'] = $_SESSION['offers']['dictionaries'] ?? [];
} else {
    die("❌ Flight offer not found. Please search again.");
}

// Redirect to booking page
header("Location: flight-search/booking.php?offerId=" . urlencode($offerId) . "&source=" . ($_GET['source'] ?? 'search'));
exit;

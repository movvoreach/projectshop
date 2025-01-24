<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Clear the cookie
echo "Logout successful";
?>

<?php
    // Initialize the session
    session_start();
    
    // Unset all of the session variables
    $_SESSION = array();
    
    // Destroy the session.
    session_destroy();
    
    // Redirect to back to login page
    header('Refresh:2; url=..\login.php');
    exit;
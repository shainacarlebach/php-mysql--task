<?php
//calls a session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

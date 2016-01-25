<script>
abortTimer();
</script>

<?php

if(!isset($_SESSION)){
    session_start();
}

unset($_SESSION["login"]);			// Logout
unset($_SESSION["role"]);

header("Location: index.php");

?>

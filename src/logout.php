<script>
abortTimer();
</script>

<?php

unset($_SESSION["login"]);			// Logout
unset($_SESSION["role"]);

header("Location: index.php");

?>

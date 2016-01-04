<script>
abortTimer();
</script>

<?php

unset($_SESSION["login"]);
unset($_SESSION["role"]);

header("Location: index.php");

?>

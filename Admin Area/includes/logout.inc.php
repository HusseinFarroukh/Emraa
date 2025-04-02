<?php
session_start();
session_unset();
session_destroy();

 header("Location: ../index.php?logout=success");

 /*<form action="includes/logout.inc.php" method="post">
 <input type="submit" name="logout-submit" value="logout">
 </form>*/

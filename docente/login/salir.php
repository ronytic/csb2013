<?php
session_start();
session_unregister("login");
session_unregister("CodUsuarioLog");
session_destroy();
header("Location:index.php");
?>
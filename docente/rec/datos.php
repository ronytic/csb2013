<?php
if (!isset($_GET['dt'])) {
    include("paginas/docentes.php");
} else {
    include("paginas/".$_GET['dt'].".php");
}
?>
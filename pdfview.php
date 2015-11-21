<?php
header("Content-Type: " . $_GET["mime"]);
echo base64_decode(unserialize($_GET["str"]));
?>
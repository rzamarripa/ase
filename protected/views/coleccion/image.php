<?php
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Content-Transfer-Encoding: binary');
//header('Content-length: 2000000000000000000000000');
header('Content-Type: image/jpeg');
header('Content-Disposition: attachment; filename='.$model->NombreArchivo);
print $model->imagen; 
exit(); 
?>
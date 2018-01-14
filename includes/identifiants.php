<?php
try
{
$pdo = new PDO('sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web', 'ETD', 'ETD');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>

<?php
session_start();
header('Content-Type: application/json');

echo json_encode([
    'varTeste' => $_SESSION['varFinal']['valor'],
    'varHorarioTeste' => $_SESSION['varFinal']['varHorario']
]);

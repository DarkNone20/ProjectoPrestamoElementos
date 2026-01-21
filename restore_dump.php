<?php
// Restaurar dumps en el orden correcto
$connection = new PDO('mysql:host=127.0.0.1', 'root', '');
$connection->exec('CREATE DATABASE IF NOT EXISTS insumos');
$connection->exec('USE insumos');

// Archivos a restaurar en orden
$files = [
    'DUMP/insumos_migrations.sql',
    'DUMP/insumos_user.sql',
    'DUMP/insumos_usuarios.sql',
    'DUMP/insumos_insumos.sql',
    'DUMP/insumos_usuarioadmin.sql',
    'DUMP/insumos_prestamos.sql',
    'DUMP/insumos_entregas.sql',
    'DUMP/insumos_entregas_discos.sql',
    'DUMP/insumos_entregas_equipos.sql',
    'DUMP/insumos_personal_access_tokens.sql',
];

foreach ($files as $file) {
    if (file_exists($file)) {
        echo "Restaurando $file...\n";
        $sql = file_get_contents($file);
        
        try {
            // Reemplazar collation incompatible
            $sql = str_replace('utf8mb4_0900_ai_ci', 'utf8mb4_unicode_ci', $sql);
            $connection->exec($sql);
            echo "✓ $file restaurado\n";
        } catch (Exception $e) {
            echo "✗ Error en $file: " . $e->getMessage() . "\n";
        }
    } else {
        echo "⚠ No encontrado: $file\n";
    }
}

echo "\n✓ Restauración completada\n";

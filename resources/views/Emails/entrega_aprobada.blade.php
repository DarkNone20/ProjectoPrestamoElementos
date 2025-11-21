<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; color: #333; }
        .box { border: 1px solid #ddd; padding: 20px; max-width: 600px; margin: auto; }
        .header { background: #007bff; color: #fff; padding: 10px; text-align: center; }
        ul { list-style: none; padding: 0; }
        li { padding: 5px 0; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="box">
        <div class="header">
            <h2>Entrega Aprobada</h2>
        </div>
        <p>Hola,</p>
        <p>Se ha aprobado una entrega de equipo con la siguiente información:</p>
        
        <ul>
            <li><strong>Equipo:</strong> {{ $entrega->nombre_equipo }}</li>
            <li><strong>Usuario Responsable:</strong> {{ $entrega->usuario }}</li>
            <li><strong>Auxiliar que Entregó:</strong> {{ $entrega->auxiliar_entrega }}</li>
            <li><strong>Auxiliar que Recibió:</strong> {{ $entrega->auxiliar_recibe }}</li>
            <li><strong>Fecha Aprobación:</strong> {{ date('Y-m-d H:i') }}</li>
        </ul>

        <p style="font-size: 12px; color: #777; margin-top: 20px;">
            Este correo fue enviado automáticamente por el Sistema de Entregas.
        </p>
    </div>
</body>
</html>
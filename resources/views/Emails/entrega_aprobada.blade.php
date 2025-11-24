<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrega Aprobada</title>
    <style>
        /* Estilos generales para clientes que soportan CSS en head */
        body { margin: 0; padding: 0; background-color: #f4f6f9; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; }
        table { border-collapse: collapse; }
        
        /* Media Queries para móviles */
        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; padding: 10px !important; }
            .content { padding: 20px !important; }
            .data-row td { display: block !important; width: 100% !important; padding-left: 0 !important; padding-right: 0 !important; margin-bottom: 10px; }
        }
    </style>
</head>
<body style="background-color: #f4f6f9; margin: 0; padding: 0;">

    <!-- CONTENEDOR PRINCIPAL (Fondo Gris) -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f4f6f9; padding: 40px 0;">
        <tr>
            <td align="center">
                
                <!-- TARJETA BLANCA -->
                <table class="container" width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                    
                    <!-- ENCABEZADO (Azul Bootstrap) -->
                    <tr>
                        <td style="background-color: #0d6efd; padding: 30px; text-align: center;">
                            <!-- Icono opcional (puedes poner una imagen aquí) -->
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: bold;">✅ Entrega Aprobada</h1>
                        </td>
                    </tr>

                    <!-- CONTENIDO -->
                    <tr>
                        <td class="content" style="padding: 40px;">
                            
                            <p style="color: #333333; font-size: 16px; line-height: 1.6; margin-top: 0;">
                                Hola,
                            </p>
                            <p style="color: #555555; font-size: 16px; line-height: 1.6; margin-bottom: 25px;">
                                Se ha registrado y aprobado exitosamente una entrega de equipo en el sistema. A continuación, los detalles:
                            </p>

                            <!-- TABLA DE DATOS -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #f8f9fa; border-radius: 6px; border: 1px solid #e9ecef;">
                                
                                <!-- Fila 1 -->
                                <tr>
                                    <td style="padding: 15px; border-bottom: 1px solid #e9ecef; width: 40%; vertical-align: top;">
                                        <strong style="color: #6c757d; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Equipo</strong>
                                    </td>
                                    <td style="padding: 15px; border-bottom: 1px solid #e9ecef; color: #333333; font-weight: 600;">
                                        {{ $entrega->nombre_equipo }}
                                    </td>
                                </tr>

                                <!-- Fila 2 -->
                                <tr>
                                    <td style="padding: 15px; border-bottom: 1px solid #e9ecef; width: 40%; vertical-align: top;">
                                        <strong style="color: #6c757d; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Usuario Responsable</strong>
                                    </td>
                                    <td style="padding: 15px; border-bottom: 1px solid #e9ecef; color: #333333;">
                                        {{ $entrega->usuario }}
                                    </td>
                                </tr>

                                <!-- Fila 3 -->
                                <tr>
                                    <td style="padding: 15px; border-bottom: 1px solid #e9ecef; width: 40%; vertical-align: top;">
                                        <strong style="color: #6c757d; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Auxiliar que Entregó</strong>
                                    </td>
                                    <td style="padding: 15px; border-bottom: 1px solid #e9ecef; color: #333333;">
                                        {{ $entrega->auxiliar_entrega }}
                                    </td>
                                </tr>

                                <!-- Fila 4 -->
                                <tr>
                                    <td style="padding: 15px; border-bottom: 1px solid #e9ecef; width: 40%; vertical-align: top;">
                                        <strong style="color: #6c757d; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Auxiliar que Recibió</strong>
                                    </td>
                                    <td style="padding: 15px; border-bottom: 1px solid #e9ecef; color: #333333;">
                                        {{ $entrega->auxiliar_recibe }}
                                    </td>
                                </tr>

                                <!-- Fila 5 -->
                                <tr>
                                    <td style="padding: 15px; width: 40%; vertical-align: top;">
                                        <strong style="color: #6c757d; text-transform: uppercase; font-size: 12px; letter-spacing: 1px;">Fecha Aprobación</strong>
                                    </td>
                                    <td style="padding: 15px; color: #333333;">
                                        {{ date('d/m/Y h:i A') }}
                                    </td>
                                </tr>

                            </table>
                            <!-- FIN TABLA DATOS -->

                            <!-- BOTÓN (Opcional) -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 30px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ url('/') }}" style="background-color: #0d6efd; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 5px; font-weight: bold; display: inline-block;">Ingresar al Sistema</a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background-color: #f1f3f5; padding: 20px; text-align: center; border-top: 1px solid #e9ecef;">
                            <p style="color: #868e96; font-size: 12px; margin: 0;">
                                © {{ date('Y') }} Sistema de Gestión de Entregas.
                                <br>Este es un mensaje automático, por favor no responder.
                            </p>
                        </td>
                    </tr>

                </table>
                <!-- FIN TARJETA -->
                
                <p style="text-align: center; color: #adb5bd; font-size: 11px; margin-top: 20px;">
                    Si no reconoces esta actividad, contacta al administrador.
                </p>

            </td>
        </tr>
    </table>

</body>
</html>
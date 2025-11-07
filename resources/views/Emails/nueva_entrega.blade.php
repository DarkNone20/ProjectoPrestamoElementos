<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>Nueva Entrega Registrada</title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        table, td, div, h1, p {font-family: 'Segoe UI', Arial, sans-serif;}
    </style>
</head>
<body style="margin:0;padding:0;word-spacing:normal;background-color:#f3f4f6;">
    <div role="article" aria-roledescription="email" lang="es" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#f3f4f6;">
        <table role="presentation" style="width:100%;border:none;border-spacing:0;">
            <tr>
                <td align="center" style="padding:20px;">
                   
                    <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:'Segoe UI', Arial, sans-serif;font-size:16px;line-height:22px;color:#333333;">
                       
                        <tr>
                            <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                                <img src="https://cdn-icons-png.flaticon.com/512/2991/2991175.png" width="50" alt="Logo" style="width:50px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff; margin-bottom: 10px;">
                            </td>
                        </tr>
                   
                        <tr>
                            <td style="padding:40px 30px;background-color:#ffffff;border-radius:12px;box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                                <h1 style="margin-top:0;margin-bottom:16px;font-size:22px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;color:#111827;">
                                    Nueva Entrega Registrada
                                </h1>
                                <p style="margin:0 0 24px;font-size:16px;line-height:26px;color:#4b5563;">
                                    Hola, se ha registrado una nueva entrega en el sistema con éxito. A continuación encontrarás los detalles del registro.
                                </p>

                             
                                <table role="presentation" style="width:100%;border:none;border-collapse:separate;border-spacing:0;background-color:#f9fafb;border-radius:8px;border:1px solid #e5e7eb; overflow:hidden;">
                                    <tr>
                                        <td style="padding:16px 24px;border-bottom:1px solid #e5e7eb;">
                                            <p style="margin:0;font-size:12px;text-transform:uppercase;letter-spacing:1px;font-weight:600;color:#6b7280;margin-bottom:4px;">Solicitante</p>
                                            <p style="margin:0;font-size:16px;font-weight:500;color:#1f2937;">{{ $entrega->Nombre }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:16px 24px;border-bottom:1px solid #e5e7eb;background-color:#ffffff;">
                                            <p style="margin:0;font-size:12px;text-transform:uppercase;letter-spacing:1px;font-weight:600;color:#6b7280;margin-bottom:4px;">Artículo</p>
                                            <p style="margin:0;font-size:16px;font-weight:500;color:#1f2937;">{{ $entrega->Articulo }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:16px 24px;border-bottom:1px solid #e5e7eb;">
                                            <p style="margin:0;font-size:12px;text-transform:uppercase;letter-spacing:1px;font-weight:600;color:#6b7280;margin-bottom:4px;">Caso</p>
                                            <p style="margin:0;font-size:16px;font-weight:500;color:#1f2937;">{{ $entrega->Caso }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:16px 24px;background-color:#ffffff;">
                                            <p style="margin:0;font-size:12px;text-transform:uppercase;letter-spacing:1px;font-weight:600;color:#6b7280;margin-bottom:4px;">Fecha de registro</p>
                                            <p style="margin:0;font-size:16px;font-weight:500;color:#1f2937;">{{ $entrega->Fecha }}</p>
                                        </td>
                                    </tr>
                                </table>

                               
                                <table role="presentation" style="width:100%;border:none;border-spacing:0;margin-top:32px;">
                                    <tr>
                                        <td align="center">
                                            <a href="http://192.168.230.158:8000/entregas/tablas" style="display:inline-block;border-radius:25%;padding:14px 32px;background-color:#2563eb;color:#ffffff;text-decoration:none;font-weight:600;font-size:16px;border-radius:6px;mso-padding-alt:0;text-underline-color:#2563eb">
                                               
                                                <span style="mso-text-raise:19pt">Ver en el sistema</span>
                                              
                                            </a>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <!-- Footer -->
                        <tr>
                            <td style="padding:30px;text-align:center;font-size:12px;background-color:#f3f4f6;color:#6b7280;">
                                <p style="margin:0 0 8px 0;">Este es un mensaje automático, por favor no responder a este correo.</p>
                                <p style="margin:0;">
                                    &copy; 2025 Tu Empresa. Todos los derechos reservados.
                                </p>
                            </td>
                        </tr>
                    </table>
                  
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
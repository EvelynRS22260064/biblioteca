<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Biblioteca del Bosque</title>
    <style>
        /* Estilos básicos para el correo */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', 'Georgia', 'Times New Roman', serif;
            background-color: #e8f2e0;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .card {
            background: #fafff2;
            border: 2px solid #8bb682;
            border-radius: 40px 12px 40px 12px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        
        .header {
            text-align: center;
            border-bottom: 2px solid #c3dfb5;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        
        .title {
            font-family: 'Georgia', 'Times New Roman', serif;
            font-size: 28px;
            color: #1f4a2a;
            margin: 10px 0;
        }
        
        .icon {
            font-size: 48px;
        }
        
        .message {
            color: #2d5a36;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #c3dfb5;
            font-size: 12px;
            color: #8bb682;
        }
        
        .leaf-decoration {
            font-size: 20px;
            letter-spacing: 8px;
            text-align: center;
            color: #8bb682;
            margin: 15px 0;
        }
        
        .btn {
            display: inline-block;
            background: #3f7847;
            color: white;
            text-decoration: none;
            padding: 10px 25px;
            border-radius: 30px 6px 30px 6px;
            font-family: 'Georgia', serif;
            font-size: 14px;
            margin-top: 10px;
        }
        
        .btn:hover {
            background: #4c8f55;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <div class="icon">📚🌿</div>
                <h1 class="title">¡Bienvenido al Bosque Encantado!</h1>
                <div class="leaf-decoration">
                    🍃 • 🍂 • 🍃 • 🍂 • 🍃
                </div>
            </div>
            
            <div class="message">
                <p>Hola <strong>{{ $usuario->name }}</strong>,</p>
                
                <p>🎉 <strong>¡Ya eres parte de la Biblioteca del Bosque Encantado!</strong> 🎉</p>
                
                <p>Esperamos que disfrutes explorando los senderos de historias que tenemos para ti. Cada libro es una puerta a un mundo nuevo, y aquí encontrarás desde antiguos pergaminos hasta las aventuras más recientes.</p>
                
                <p style="text-align: center;">✨📖✨</p>
                
                <p>Si te surge alguna pregunta o necesitas ayuda, no dudes en contactarnos. Los guardianes del bosque siempre estarán para guiarte.</p>
                
                <p>¡Que las hojas del conocimiento te acompañen!</p>
            </div>
            
            <div style="text-align: center;">
                <a href="#" class="btn">📖 Explorar el Catálogo</a>
            </div>
            
            <div class="footer">
                <div class="leaf-decoration">🌲 • 🌿 • 📚 • 🍂 • 🌳</div>
                <p>Biblioteca del Bosque Encantado<br>
                Un lugar donde las historias cobran vida</p>
                <p>Si no deseas recibir estos correos, <a href="#" style="color: #8bb682;">canjea tu suscripción aquí</a>.</p>
            </div>
        </div>
    </div>
</body>
</html>
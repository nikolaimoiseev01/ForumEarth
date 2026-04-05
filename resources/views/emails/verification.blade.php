<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтверждение email - ForumEarth</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #374151;
            background-color: #f9fafb;
            margin: 0;
            padding: 20px;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #006699 0%, #004466 100%);
            padding: 40px 30px;
            text-align: center;
        }
        
        .logo {
            width: 180px;
            height: auto;
            margin-bottom: 10px;
        }
        
        .header h1 {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .welcome-text {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 20px;
        }
        
        .message {
            color: #6b7280;
            margin-bottom: 30px;
            line-height: 1.7;
        }
        
        .verify-button {
            display: inline-block;
            background: linear-gradient(135deg, #006699 0%, #005588 100%);
            color: white;
            text-decoration: none;
            padding: 16px 32px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 102, 153, 0.3);
        }
        
        .verify-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px -3px rgba(0, 102, 153, 0.4);
        }
        
        .security-info {
            background: #f0f9ff;
            border-left: 4px solid #006699;
            padding: 20px;
            margin: 30px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .security-info h3 {
            color: #006699;
            margin: 0 0 10px 0;
            font-size: 16px;
            font-weight: 600;
        }
        
        .security-info p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }
        
        .footer {
            background: #f9fafb;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
        
        .footer p {
            margin: 5px 0;
            color: #9ca3af;
            font-size: 14px;
        }
        
        .footer a {
            color: #006699;
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }
            
            .header, .content, .footer {
                padding: 25px 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .welcome-text {
                font-size: 18px;
            }
            
            .verify-button {
                display: block;
                width: 100%;
                padding: 14px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>ForumEarth</h1>
        </div>
        
        <!-- Content -->
        <div class="content">
            <h2 class="welcome-text">Добро пожаловать, {{ $user->name }}!</h2>
            
            <p class="message">
                Благодарим вас за регистрацию на платформе ForumEarth. Чтобы получить доступ ко всем возможностям личного кабинета, пожалуйста, подтвердите ваш email адрес.
            </p>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ $verificationUrl }}" class="verify-button">
                    Подтвердить email адрес
                </a>
            </div>
            
            <div class="security-info">
                <h3>🔒 Информация о безопасности</h3>
                <p>
                    Эта ссылка действительна в течение 60 минут. Если вы не создавали аккаунт на ForumEarth, просто проигнорируйте это письмо.
                </p>
            </div>
            
            <p class="message">
                Если кнопка выше не работает, скопируйте и вставьте следующую ссылку в адресную строку вашего браузера:
            </p>
            
            <p style="word-break: break-all; background: #f3f4f6; padding: 15px; border-radius: 6px; font-size: 12px; color: #4b5563;">
                {{ $verificationUrl }}
            </p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>© {{ date('Y') }} ForumEarth. Все права защищены.</p>
            <p>
                Это автоматическое сообщение. Пожалуйста, не отвечайте на него.<br>
                Если у вас есть вопросы, свяжитесь с нашей <a href="#">поддержкой</a>.
            </p>
        </div>
    </div>
</body>
</html>

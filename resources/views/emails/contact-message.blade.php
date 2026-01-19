<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Yeni İletişim Mesajı</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: #2563eb;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
            background: #f8f9fa;
        }

        .field {
            margin-bottom: 15px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .footer {
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Yeni İletişim Mesajı</h1>
        </div>
        <div class="content">
            <div class="field">
                <span class="label">İsim:</span> {{ $message->name }}
            </div>
            <div class="field">
                <span class="label">E-posta:</span> {{ $message->email }}
            </div>
            @if($message->phone)
                <div class="field">
                    <span class="label">Telefon:</span> {{ $message->phone }}
                </div>
            @endif
            @if($message->subject)
                <div class="field">
                    <span class="label">Konu:</span> {{ $message->subject }}
                </div>
            @endif
            <div class="field">
                <span class="label">Mesaj:</span><br>
                {{ $message->message }}
            </div>
        </div>
        <div class="footer">
            Bu e-posta {{ config('app.name') }} web sitesi üzerinden gönderilmiştir.
        </div>
    </div>
</body>

</html>
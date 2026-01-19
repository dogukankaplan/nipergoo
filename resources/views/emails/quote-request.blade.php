<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Yeni Teklif Talebi</title>
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
            <h1>Yeni Teklif Talebi</h1>
        </div>
        <div class="content">
            <div class="field">
                <span class="label">İsim:</span> {{ $quote->name }}
            </div>
            <div class="field">
                <span class="label">E-posta:</span> {{ $quote->email }}
            </div>
            @if($quote->phone)
                <div class="field">
                    <span class="label">Telefon:</span> {{ $quote->phone }}
                </div>
            @endif
            @if($quote->company)
                <div class="field">
                    <span class="label">Firma:</span> {{ $quote->company }}
                </div>
            @endif
            @if($quote->category)
                <div class="field">
                    <span class="label">Kategori:</span> {{ $quote->category->name }}
                </div>
            @endif
            @if($quote->product)
                <div class="field">
                    <span class="label">Ürün:</span> {{ $quote->product->title }}
                </div>
            @endif
            @if($quote->budget_range)
                <div class="field">
                    <span class="label">Bütçe:</span> {{ $quote->budget_range }}
                </div>
            @endif
            @if($quote->timeline)
                <div class="field">
                    <span class="label">Zamanlama:</span> {{ $quote->timeline }}
                </div>
            @endif
            @if($quote->project_details)
                <div class="field">
                    <span class="label">Proje Detayları:</span><br>
                    {{ $quote->project_details }}
                </div>
            @endif
            @if($quote->message)
                <div class="field">
                    <span class="label">Ek Mesaj:</span><br>
                    {{ $quote->message }}
                </div>
            @endif
        </div>
        <div class="footer">
            Bu e-posta {{ config('app.name') }} web sitesi üzerinden gönderilmiştir.
        </div>
    </div>
</body>

</html>
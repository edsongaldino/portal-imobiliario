<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Falha na Integração de Anúncios</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <style>
        html, body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #f1f1f1;
            font-family: 'Lato', sans-serif;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        table, td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
            border-spacing: 0 !important;
            border-collapse: collapse !important;
        }
        table {
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
        }
        .header {
            padding: 3em 2.5em 0 2.5em;
            text-align: center;
        }
        .body {
            padding: 2em 2.5em;
            color: #333333;
        }
        .footer {
            background: #fafafa;
            padding: 2.5em;
            border-top: 1px solid rgba(0,0,0,.05);
            color: rgba(0,0,0,.5);
            font-size: 14px;
        }
        h2 {
            color: #d9534f;
            font-size: 24px;
            font-weight: 700;
            margin-top: 0;
        }
        p {
            line-height: 1.6;
            margin-bottom: 1.5em;
        }
        .alert-box {
            background-color: #fdf7f7;
            border: 1px solid #d9534f;
            border-radius: 4px;
            padding: 15px;
            margin: 20px 0;
            color: #b94a48;
            font-family: monospace;
            white-space: pre-wrap;
            word-break: break-all;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #0a5296;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #f1f1f1;">
    <center style="width: 100%; background-color: #f1f1f1; padding: 20px 0;">
        <div class="email-container">
            <div class="header">
                <img src="https://redeimoveismt.com.br/assets/portal/images/header-logo2.png" width="200" alt="Rede Imóveis MT Logo">
            </div>
            
            <div class="body">
                @if($destinatarioTipo === 'admin')
                    <h2>[ADMIN] Falha no Processamento da Integração</h2>
                    <p>Olá Administrador,</p>
                    <p>Ocorreu um erro ao processar a integração automática XML do anunciante <strong>{{ $anunciante->nome }}</strong>.</p>
                    <p>A integração deste anunciante foi temporariamente <strong>bloqueada</strong> para evitar inconsistências nos dados do portal.</p>
                    
                    <div class="alert-box"><strong>Detalhes do Erro:</strong><br>{{ $mensagemErro }}</div>
                    
                    <p>Para desbloquear e reprocessar, ajuste a URL ou as configurações no painel administrativo.</p>
                @else
                    <h2>Atenção: Falha na Integração de Anúncios</h2>
                    <p>Olá <strong>{{ $anunciante->nome }}</strong>,</p>
                    <p>Detectamos um erro ao tentar acessar ou processar o arquivo XML de integração de seus anúncios.</p>
                    <p>Para segurança e integridade das informações no portal, a atualização automática de seus anúncios foi temporariamente <strong>bloqueada</strong>.</p>
                    
                    <div class="alert-box"><strong>Descrição do Problema:</strong><br>{{ $mensagemErro }}</div>
                    
                    <p><strong>Como resolver:</strong></p>
                    <p>1. Verifique se o link/URL do seu XML está correto e acessível publicamente.<br>
                       2. Certifique-se de que o arquivo está no formato XML esperado.<br>
                       3. Acesse o seu painel de controle e salve as configurações de integração novamente para reativar as atualizações automáticas.</p>
                    
                    <div class="text-center" style="margin-top: 30px;">
                        <a href="https://redeimoveismt.com.br/painel/integracao/configuracao" class="btn">Acessar Configurações</a>
                    </div>
                @endif
            </div>
            
            <table class="footer" width="100%">
                <tr>
                    <td width="60%">
                        <strong>Rede Imóveis MT</strong><br>
                        Plataforma imobiliária
                    </td>
                    <td width="40%" align="right">
                        Suporte Técnico<br>
                        contato@redeimoveismt.com.br
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Semanal</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif; }
        table { border-collapse: collapse; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; }
        .header { background-color: #035b96; color: #ffffff; padding: 30px 20px; }
        .header h1 { margin: 0; font-size: 24px; font-weight: normal; text-align: right; }
        .header p { margin: 5px 0 0; font-size: 14px; text-align: right; }
        .header .date { font-size: 12px; text-align: right; margin-top: 10px; }
        .content { padding: 30px 20px; }
        .greeting { color: #035b96; font-size: 18px; font-weight: bold; margin-bottom: 10px; }
        .intro-text { color: #333333; font-size: 14px; line-height: 1.5; margin-bottom: 30px; }
        
        .stats-table { width: 100%; margin-bottom: 30px; }
        .stat-card { background-color: #f9f9f9; border-radius: 8px; text-align: center; padding: 20px 10px; border-bottom: 4px solid #035b96; }
        .stat-icon { background-color: #035b96; color: #ffffff; width: 40px; height: 40px; border-radius: 50%; display: inline-block; line-height: 40px; font-size: 20px; margin-bottom: 10px; }
        .stat-title { color: #035b96; font-size: 11px; font-weight: bold; text-transform: uppercase; margin-bottom: 10px; }
        .stat-value { color: #035b96; font-size: 32px; font-weight: bold; margin: 0; }
        .stat-desc { color: #666666; font-size: 11px; margin-top: 5px; }
        
        .top-section-title { text-align: center; color: #333333; font-size: 16px; font-weight: bold; margin-bottom: 20px; text-transform: uppercase; }
        
        .property-card { border: 1px solid #e0e0e0; border-radius: 8px; margin-bottom: 15px; width: 100%; padding: 10px; box-sizing: border-box; }
        .property-rank { background-color: #035b96; color: #ffffff; width: 30px; height: 30px; text-align: center; line-height: 30px; border-radius: 4px; font-weight: bold; font-size: 14px; }
        .property-img { width: 120px; height: 80px; object-fit: cover; border-radius: 4px; }
        .property-info { padding-left: 15px; }
        .property-title { font-weight: bold; font-size: 14px; color: #333333; margin: 0 0 5px 0; }
        .property-location { font-size: 12px; color: #666666; margin: 0 0 5px 0; }
        .property-details { font-size: 11px; color: #888888; margin: 0; }
        
        .property-views-box { background-color: #f0f7f4; padding: 15px 10px; border-radius: 8px; text-align: center; }
        .property-views-label { font-size: 10px; color: #035b96; font-weight: bold; text-transform: uppercase; }
        .property-views-val { font-size: 22px; color: #035b96; font-weight: bold; margin-top: 5px; }
        
        .tip-box { background-color: #f0f7f4; border-radius: 8px; padding: 20px; margin-top: 30px; }
        .tip-icon { background-color: #035b96; color: #ffffff; width: 40px; height: 40px; border-radius: 4px; display: inline-block; text-align: center; line-height: 40px; }
        .tip-content { padding-left: 15px; }
        .tip-title { color: #035b96; font-size: 14px; font-weight: bold; margin: 0 0 5px 0; }
        .tip-text { color: #333333; font-size: 12px; margin: 0; }
        .btn-green { background-color: #035b96; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 4px; font-weight: bold; font-size: 12px; display: inline-block; }
        
        .footer-text { text-align: center; color: #333333; font-size: 13px; margin: 30px 0; }
        .footer { background-color: #035b96; color: #ffffff; padding: 20px; text-align: center; font-size: 12px; }
        .footer a { color: #ffffff; text-decoration: none; }
    </style>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f4f4;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <table class="container" width="600" cellpadding="0" cellspacing="0" border="0">
                    <!-- Header -->
                    <tr>
                        <td class="header">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="30%" valign="middle">
                                        <img src="https://redeimoveismt.com.br/assets/portal/images/header-logo2.png" alt="Rede Imóveis MT" style="max-width: 150px; filter: brightness(0) invert(1);">
                                    </td>
                                    <td width="70%" valign="middle" align="right">
                                        <h1>Relatório Semanal</h1>
                                        <p>Seu desempenho no Portal Rede Imóveis</p>
                                        <div class="date">&#128197; {{ $dadosRelatorio['data_inicio'] }} a {{ $dadosRelatorio['data_fim'] }}</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td class="content">
                            <div class="greeting">Olá, {{ $anunciante->nome ?? 'Parceiro' }}!</div>
                            <div class="intro-text">
                                Confira o desempenho dos seus imóveis no Portal Rede Imóveis na última semana.<br>
                                Acompanhe suas principais métricas e veja quais imóveis estão se destacando!
                            </div>
                            
                            <!-- Stats Cards -->
                            <table class="stats-table" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <!-- Imoveis Ativos -->
                                    <td width="31%" valign="top">
                                        <div class="stat-card">
                                            <div class="stat-title">IMÓVEIS ATIVOS</div>
                                            <div class="stat-value">{{ number_format($dadosRelatorio['imoveis_ativos'], 0, ',', '.') }}</div>
                                            <div class="stat-desc">Total de imóveis publicados</div>
                                        </div>
                                    </td>
                                    <td width="3%"></td>
                                    <!-- Visualizacoes -->
                                    <td width="31%" valign="top">
                                        <div class="stat-card">
                                            <div class="stat-title">VISUALIZAÇÕES NA SEMANA</div>
                                            <div class="stat-value">{{ number_format($dadosRelatorio['visualizacoes'], 0, ',', '.') }}</div>
                                            <div class="stat-desc">Total de visualizações</div>
                                        </div>
                                    </td>
                                    <td width="3%"></td>
                                    <!-- Leads -->
                                    <td width="31%" valign="top">
                                        <div class="stat-card">
                                            <div class="stat-title">LEADS NA SEMANA</div>
                                            <div class="stat-value">{{ number_format($dadosRelatorio['leads'], 0, ',', '.') }}</div>
                                            <div class="stat-desc">Total de leads recebidos</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Top Imoveis -->
                            @if(count($topImoveis) > 0)
                            <div class="top-section-title">&#127942; TOP 3 IMÓVEIS MAIS ACESSADOS<br><span style="font-size: 12px; font-weight: normal; color: #666666;">na última semana</span></div>
                            
                            @foreach($topImoveis as $index => $imovel)
                            <table class="property-card" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="40" align="center" valign="middle">
                                        <div class="property-rank">{{ $index + 1 }}º</div>
                                    </td>
                                    <td width="130" align="center" valign="middle">
                                        @php
                                            $foto = $imovel->fotos->first() ? asset($imovel->fotos->first()->arquivo) : asset('assets/portal/images/property/fp1.jpg');
                                            // Handle external XML images
                                            if ($imovel->fotos->first() && str_starts_with($imovel->fotos->first()->arquivo, 'http')) {
                                                $foto = $imovel->fotos->first()->arquivo;
                                            }
                                        @endphp
                                        <img src="{{ $foto }}" class="property-img" alt="Foto">
                                    </td>
                                    <td valign="middle" class="property-info">
                                        <h3 class="property-title">{{ mb_strimwidth($imovel->titulo, 0, 45, '...') }}</h3>
                                        <p class="property-location">&#128205; {{ $imovel->endereco->bairro_endereco ?? '' }}, {{ $imovel->endereco->cidade->nome_cidade ?? '' }} - {{ $imovel->endereco->cidade->estado->uf_estado ?? '' }}</p>
                                        <p class="property-details">Código: {{ $imovel->id_externo ?? $imovel->id }} | {{ $imovel->transacao }} | {{ $imovel->tipo->nome ?? '' }}</p>
                                    </td>
                                    <td width="120" valign="middle" align="center">
                                        <div class="property-views-box">
                                            <div class="property-views-label">VISUALIZAÇÕES</div>
                                            <div class="property-views-val">{{ number_format($imovel->acessos_semana, 0, ',', '.') }}</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            @endforeach
                            @endif
                            
                            <!-- Tip Box -->
                            <table class="tip-box" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="50" valign="middle" align="center">
                                        <div class="tip-icon">&#128200;</div>
                                    </td>
                                    <td valign="middle" class="tip-content">
                                        <h4 class="tip-title">Dica para aumentar seus resultados</h4>
                                        <p class="tip-text">Mantenha seus anúncios sempre atualizados com fotos de qualidade, descrições completas e preço competitivo para atrair ainda mais interessados.</p>
                                    </td>
                                    <td width="180" valign="middle" align="center">
                                        <a href="https://redeimoveismt.com.br/login" class="btn-green">Acessar meus anúncios</a>
                                    </td>
                                </tr>
                            </table>
                            
                            <div class="footer-text">
                                Estamos juntos para gerar mais oportunidades para o seu negócio!<br>
                                <strong style="color: #035b96;">Equipe Rede Imóveis MT</strong>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td class="footer">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="50%" align="left">
                                        Dúvidas? Fale com nosso time!<br>
                                        (65) 99999-9999 | parceiros@redeimoveismt.com.br
                                    </td>
                                    <td width="50%" align="right">
                                        <a href="https://www.redeimoveismt.com.br">www.redeimoveismt.com.br</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

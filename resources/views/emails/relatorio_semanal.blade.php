<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Semanal</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f7f6; font-family: 'Segoe UI', Arial, sans-serif; }
        table { border-collapse: collapse; }
        .container { max-width: 700px; margin: 0 auto; background-color: #ffffff; }
        
        .header { padding: 30px 40px; border-bottom: 1px solid #eeeeee; }
        .header h1 { margin: 0; font-size: 26px; font-weight: bold; color: #026a42; text-align: right; }
        .header p { margin: 5px 0 0; font-size: 14px; color: #666666; text-align: right; }
        .header .date { font-size: 12px; color: #888888; text-align: right; margin-top: 5px; font-weight: bold; }
        
        .content { padding: 30px 40px; }
        
        .greeting-table { width: 100%; margin-bottom: 30px; }
        .greeting-icon-box { width: 60px; height: 60px; border: 2px solid #c2e2cb; border-radius: 50%; text-align: center; }
        .greeting-title { color: #026a42; font-size: 22px; font-weight: bold; margin: 0 0 5px 0; }
        .greeting-text { color: #555555; font-size: 14px; margin: 0; line-height: 1.5; }
        
        .stats-table { width: 100%; margin-bottom: 40px; }
        .stat-card { border: 1px solid #eeeeee; border-radius: 8px; text-align: center; padding: 20px 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
        .stat-icon { width: 40px; height: 40px; border-radius: 50%; background-color: #eaf5ec; display: inline-block; margin-bottom: 10px; }
        .stat-title { color: #026a42; font-size: 11px; font-weight: bold; text-transform: uppercase; margin-bottom: 5px; }
        .stat-value { color: #222222; font-size: 34px; font-weight: bold; margin: 0; }
        .stat-desc { color: #888888; font-size: 12px; margin-top: 10px; border-top: 1px solid #eeeeee; padding-top: 10px; }
        
        .top-section-title { text-align: center; color: #026a42; font-size: 16px; font-weight: bold; margin-bottom: 25px; text-transform: uppercase; border-top: 1px solid #026a42; padding-top: 15px; }
        
        .property-card { border: 1px solid #eeeeee; border-radius: 8px; margin-bottom: 15px; width: 100%; padding: 15px; box-sizing: border-box; background-color: #ffffff; }
        .property-rank { background-color: #026a42; color: #ffffff; width: 30px; height: 30px; text-align: center; line-height: 30px; border-radius: 4px; font-weight: bold; font-size: 14px; }
        .property-img { width: 130px; height: 90px; object-fit: cover; border-radius: 6px; }
        .property-info { padding-left: 15px; }
        .property-title { font-weight: bold; font-size: 14px; color: #222222; margin: 0 0 8px 0; }
        .property-location { font-size: 12px; color: #666666; margin: 0 0 5px 0; }
        .property-details { font-size: 12px; color: #888888; margin: 0; }
        
        .property-views-box { background-color: #eaf5ec; padding: 15px 5px; border-radius: 8px; text-align: center; min-width: 90px; }
        .property-views-label { font-size: 10px; color: #026a42; font-weight: bold; text-transform: uppercase; }
        .property-views-val { font-size: 24px; color: #026a42; font-weight: bold; margin-top: 5px; }
        
        .tip-box { background-color: #eaf5ec; border-radius: 8px; padding: 20px; margin-top: 30px; }
        .tip-icon { background-color: #026a42; color: #ffffff; width: 50px; height: 50px; border-radius: 8px; display: inline-block; text-align: center; line-height: 50px; font-size: 24px; }
        .tip-content { padding-left: 20px; }
        .tip-title { color: #026a42; font-size: 16px; font-weight: bold; margin: 0 0 5px 0; }
        .tip-text { color: #444444; font-size: 12px; margin: 0; line-height: 1.5; }
        .btn-green { background-color: #026a42; color: #ffffff; text-decoration: none; padding: 12px 20px; border-radius: 6px; font-weight: bold; font-size: 13px; display: inline-block; }
        
        .footer-top { background-color: #fafafa; padding: 30px 40px; border-top: 1px solid #eeeeee; }
        .social-icon { display: inline-block; width: 30px; height: 30px; background-color: #026a42; border-radius: 50%; color: #ffffff; text-align: center; line-height: 30px; margin-right: 5px; text-decoration: none; font-size: 14px; font-weight: bold; }
        .contact-title { font-size: 14px; font-weight: bold; color: #222222; margin: 0 0 5px 0; }
        .contact-text { font-size: 12px; color: #666666; margin: 0 0 10px 0; }
        .btn-light-green { background-color: #eaf5ec; color: #026a42; text-decoration: none; padding: 10px 20px; border-radius: 6px; font-weight: bold; font-size: 12px; display: inline-block; border: 1px solid #c2e2cb; }
        
        .footer-bottom { background-color: #026a42; color: #ffffff; padding: 15px 40px; font-size: 11px; }
    </style>
</head>
<body>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f7f6;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <table class="container" width="700" cellpadding="0" cellspacing="0" border="0">
                    <!-- Header -->
                    <tr>
                        <td class="header">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="30%" valign="middle">
                                        <img src="https://redeimoveismt.com.br/assets/portal/images/header-logo2.png" alt="Rede Imóveis MT" style="max-width: 150px;">
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
                            <!-- Greeting -->
                            <table class="greeting-table" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="80" valign="top">
                                        <div class="greeting-icon-box">
                                            <span style="font-size: 30px; color: #026a42; line-height: 60px;">&#127968;</span>
                                        </div>
                                    </td>
                                    <td valign="middle">
                                        <div class="greeting-title">Olá, {{ mb_strtoupper($anunciante->nome ?? 'PARCEIRO') }}!</div>
                                        <div class="greeting-text">
                                            Confira o desempenho dos seus imóveis no Portal Rede Imóveis na última semana.<br>
                                            Acompanhe suas principais métricas e veja quais imóveis estão se destacando!
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Stats Cards -->
                            <table class="stats-table" width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <!-- Imoveis Ativos -->
                                    <td width="31%" valign="top">
                                        <div class="stat-card">
                                            <div class="stat-icon">
                                                <span style="font-size: 20px; color: #026a42; line-height: 40px;">&#127968;</span>
                                            </div>
                                            <div class="stat-title">IMÓVEIS ATIVOS</div>
                                            <div class="stat-value">{{ number_format($dadosRelatorio['imoveis_ativos'], 0, ',', '.') }}</div>
                                            <div class="stat-desc">Total de imóveis publicados</div>
                                        </div>
                                    </td>
                                    <td width="3%"></td>
                                    <!-- Visualizacoes -->
                                    <td width="31%" valign="top">
                                        <div class="stat-card">
                                            <div class="stat-icon">
                                                <span style="font-size: 20px; color: #026a42; line-height: 40px;">&#128065;</span>
                                            </div>
                                            <div class="stat-title">VISUALIZAÇÕES NA SEMANA</div>
                                            <div class="stat-value">{{ number_format($dadosRelatorio['visualizacoes'], 0, ',', '.') }}</div>
                                            <div class="stat-desc">Total de visualizações</div>
                                        </div>
                                    </td>
                                    <td width="3%"></td>
                                    <!-- Leads -->
                                    <td width="31%" valign="top">
                                        <div class="stat-card">
                                            <div class="stat-icon">
                                                <span style="font-size: 20px; color: #026a42; line-height: 40px;">&#128100;</span>
                                            </div>
                                            <div class="stat-title">LEADS NA SEMANA</div>
                                            <div class="stat-value">{{ number_format($dadosRelatorio['leads'], 0, ',', '.') }}</div>
                                            <div class="stat-desc">Total de leads recebidos</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Top Imoveis -->
                            @if(count($topImoveis) > 0)
                            <div class="top-section-title">&#127942; TOP 3 IMÓVEIS MAIS ACESSADOS<br><span style="font-size: 12px; font-weight: normal; color: #666666; text-transform: none;">na última semana</span></div>
                            
                            @foreach($topImoveis as $index => $imovel)
                            <table class="property-card" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="45" align="center" valign="middle">
                                        <div class="property-rank">{{ $index + 1 }}º</div>
                                    </td>
                                    <td width="145" align="center" valign="middle">
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
                                    <td width="110" valign="middle" align="center">
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
                                    <td width="60" valign="middle" align="center">
                                        <div class="tip-icon">&#128227;</div>
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
                            
                        </td>
                    </tr>
                    
                    <!-- Footer Top -->
                    <tr>
                        <td class="footer-top">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="50%" align="left" valign="middle">
                                        <img src="https://redeimoveismt.com.br/assets/portal/images/header-logo2.png" alt="Rede Imóveis MT" style="max-width: 130px; margin-bottom: 15px;"><br>
                                        <a href="#" class="social-icon">f</a>
                                        <a href="#" class="social-icon">ig</a>
                                        <a href="#" class="social-icon">w</a>
                                    </td>
                                    <td width="50%" align="right" valign="middle" style="border-left: 1px solid #dddddd; padding-left: 20px;">
                                        <div class="contact-title">Dúvidas ou sugestões?</div>
                                        <div class="contact-text">Entre em contato com nossa equipe.</div>
                                        <a href="https://wa.me/5565999999999" class="btn-light-green">&#128172; Fale conosco</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer Bottom -->
                    <tr>
                        <td class="footer-bottom">
                            &copy; {{ date('Y') }} Rede Imóveis MT. Todos os direitos reservados.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

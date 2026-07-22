<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
    @include('includes.portal.head')
    <style>
        .resumo-relatorio .ff_one {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            margin-bottom: 20px;
        }
        .resumo-relatorio .ff_one .timer {
            font-size: 30px;
            font-weight: bold;
            color: #28a745;
        }
        .resumo-relatorio .style2 .timer { color: #007bff; }
        .resumo-relatorio .style3 .timer { color: #dc3545; }
        .resumo-relatorio .style4 .timer { color: #ffc107; }
        .relatorio-container {
            padding: 40px 0;
            background: #f9f9f9;
            min-height: 100vh;
        }
        .breadcrumb_title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    @include('includes.portal.menu')

    <section class="relatorio-container mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h2 class="breadcrumb_title">Relatório de Importação</h2>
                    <p>Resumo da integração de anúncios do anunciante <strong>{{ $RelatorioGeral->anunciante->nome ?? '' }}</strong></p>
                    <p><strong>Data:</strong> {{ $RelatorioGeral->created_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>

            <div class="row resumo-relatorio">
                <div class="col-sm-6 col-md-3">
                    <div class="ff_one">
                        <div class="detais">
                            <div class="timer">{{ $RelatorioGeral->total_incluidos }}</div>
                            <p>Incluídos</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="ff_one style2">
                        <div class="detais">
                            <div class="timer">{{ $RelatorioGeral->total_alterados }}</div>
                            <p>Alterados</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="ff_one style3">
                        <div class="detais">
                            <div class="timer">{{ $RelatorioGeral->total_removidos }}</div>
                            <p>Removidos</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="ff_one style4">
                        <div class="detais">
                            <div class="timer">{{ $RelatorioGeral->total_alertas }}</div>
                            <p>Alertas</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Código</th>
                                            <th scope="col">Anúncio</th>
                                            <th scope="col">Situação</th>
                                            <th scope="col">Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $log)
                                        <tr>
                                            <td>{{ $log->id_externo }}</td>
                                            <td>{{ $log->tituloAnuncio ?? '' }}</td>
                                            <td>
                                                @if($log->tipo == 'Sucesso')
                                                    <span class="badge badge-success" style="background-color: #28a745; color: white; padding: 5px 10px; border-radius: 4px;">{{ $log->tipo }}</span>
                                                @elseif($log->tipo == 'Erro')
                                                    <span class="badge badge-danger" style="background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 4px;">{{ $log->tipo }}</span>
                                                @else
                                                    <span class="badge badge-warning" style="background-color: #ffc107; color: black; padding: 5px 10px; border-radius: 4px;">{{ $log->tipo }}</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i:s') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="d-flex justify-content-center mt-4">
                                {{ $logs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.portal.footer')
</div>

<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap.min.js') }}"></script>
</body>
</html>

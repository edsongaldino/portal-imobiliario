@extends('layouts.painel')
@section('conteudo')
<div class="row">


    <div class="col-lg-4 col-xl-4 mb10">
        <div class="breadcrumb_content style2 mb30-991">
            <h2 class="breadcrumb_title">Integrações / Relatório Geral</h2>
			<p>Últimas importações realizadas</p>
        </div>
    </div>

    <div class="col-lg-8 col-xl-8">
        <div class="btn-processar-atualizacao" id="ProcessarAtualizacaoXML" data-id="{{ $usuario->anunciante->id }}" data-token="{{ csrf_token() }}"><i class="fa fa-refresh"></i> Processar Atualização Manual</div>
    </div>

    <div class="col-lg-12">
        <div class="my_dashboard_review mb40">
            <div class="col-lg-12">

                <div class="savesearched_table">
                    <div class="table-responsive mt0">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="dn-lg" scope="col">Código</th>
                                    <th scope="col">Data Importação</th>
                                    <th scope="col">Hora</th>
                                    <th class="dn-lg" scope="col">Total Imóveis</th>
                                    <th scope="col">Erros</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($logs as $log)
                                <tr>
                                    <td class="dn-lg">{{ $log->id }}</td>
                                    <td class="title" scope="row">{{ $log->created_at }}</td>
                                    <td class="dn-lg">{{ $log->created_at }}</td>
                                    <td>{{ $log->total_incluidos }}</td>
                                    <td class="para">{{ $log->total_alertas }}</td>
                                    <td>
                                        <ul class="view_edit_delete_list mb0">
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="View"><a href="{{ url('painel/integracoes/'.$log->id.'/relatorio-importacao') }}"><span class="flaticon-view"></span></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{ $logs->links() }}

            </div>
        </div>
    </div>
</div>
@endsection

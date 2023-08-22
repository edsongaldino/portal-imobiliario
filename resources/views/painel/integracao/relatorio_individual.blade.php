@extends('layouts.painel')
@section('conteudo')
<div class="row">


    <div class="col-lg-4 col-xl-4 mb10">
        <div class="breadcrumb_content style2 mb30-991">
            <h2 class="breadcrumb_title">Integrações / Configuração Geral</h2>
			<p>Configure as integrações disponíveis no portal</p>
        </div>
    </div>
    <div class="col-lg-8 col-xl-8">
        <div class="candidate_revew_select style2 text-right mb30-991">
            <ul class="mb0">
                <li class="list-inline-item">
                    <div class="candidate_revew_search_box course fn-520">
                        <form class="form-inline my-2">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search Courses" aria-label="Search">
                            <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="my_dashboard_review mb40">
            <div class="col-lg-12">

                <div class="row resumo-relatorio">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="ff_one">
                            <div class="icon"><i class="fa fa-home"></i></div>
                            <div class="detais">
                                <div class="timer">{{ $RelatorioGeral->total_incluidos }}</div>
                                <p>Total de Imóveis Incluídos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="ff_one style2">
                            <div class="icon"><i class="fa fa-check"></i></div>
                            <div class="detais">
                                <div class="timer">{{ $RelatorioGeral->total_alterados }}</div>
                                <p>Total Alterados</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="ff_one style3">
                            <div class="icon"><i class="fa fa-close"></i></div>
                            <div class="detais">
                                <div class="timer">{{ $RelatorioGeral->total_removidos }}</div>
                                <p>Toral Removidos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                        <div class="ff_one style4">
                            <div class="icon"><i class="fa fa-warning"></i></div>
                            <div class="detais">
                                <div class="timer">{{ $RelatorioGeral->total_alertas }}</div>
                                <p>Total de Alertas</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="savesearched_table">
                    <div class="table-responsive mt0">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="dn-lg" scope="col">Código</th>
                                    <th scope="col">Anúncio</th>
                                    <th class="dn-lg" scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Data Importação</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($logs as $log)
                                <tr>
                                    <td class="dn-lg">{{ $log->id_externo }}</td>
                                    <th class="title" scope="row">{{ $log->tituloAnuncio ?? '' }}</th>
                                    <td class="dn-lg"></td>
                                    <td></td>
                                    <td>{{ $log->tipo }}</td>
                                    <td class="para">{{ $log->created_at }}</td>
                                    <td>
                                        <ul class="view_edit_delete_list mb0">
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="View"><a href="#"><span class="flaticon-view"></span></a></li>
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><a href="#"><span class="flaticon-edit"></span></a></li>
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></li>
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

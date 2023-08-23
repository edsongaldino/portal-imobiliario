<!-- Main Header Nav -->
<header class="header-nav menu_style_home_one style2 menu-fixed main-menu">
    <div class="container-fluid p0">
        <!-- Ace Responsive Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid" src="{{ asset('assets/painel/images/header-logo.png') }}" alt="header-logo.png">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="#" class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid" src="{{ asset('assets/painel/images/header-logo2.png') }}" alt="header-logo.png">
                <img class="logo2 img-fluid" src="{{ asset('assets/painel/images/header-logo2.png') }}" alt="header-logo2.png">
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                <li class="list-inline-item add_listing painel"><a href="{{ url("/painel/anuncios/incluir") }}"><span class="flaticon-plus"></span><span class="dn-lg"> Incluir Anúncio</span></a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Main Header Nav For Mobile -->
<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="d-flex justify-content-between">
                <a class="mobile-menu-trigger" href="#menu"><img src="{{ asset('assets/painel/images/icon-menu.png') }}" alt=""></a>
                <a class="nav_logo_img" href="{{ url("/dashboard") }}"><img class="img-fluid mt20" src="{{ asset('assets/painel/images/header-logo2.png')}}" alt="header-logo2.png"></a>
                <a class="mobile-menu-reg-link" href="{{ url("/dashboard") }}"><span class="flaticon-user"></span></a>
            </div>
        </div>
    </div><!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
        <ul>
            <li class="treeview active"><a href="{{ url("/dashboard") }}"><i class="flaticon-layers"></i><span> Dashboard</span></a></li>
            <li class="treeview"><a href="{{ url("/painel/leads") }}"><i class="flaticon-envelope"></i><span> Contatos (Leads)</span></a></li>
            <li class="treeview"><a href="{{ url("/painel/anuncios") }}"><i class="flaticon-home"></i> <span>Gerenciar Anúncios</span></a></li>
            <li class="treeview"><a href="{{ url("/painel/integracoes/relatorio-geral") }}"><i class="flaticon-share"></i><span> Integrações</span></a></li>
            <li><a href="/painel/{{ Auth::user()->id }}/perfil"><i class="flaticon-user"></i> <span>Meu Perfil</span></a></li>
            <li><a href="{{ url("/logout-painel") }}"><i class="flaticon-logout"></i> <span>Sair</span></a></li>
            <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="{{ url("/painel/anuncios/incluir") }}"><span class="flaticon-plus"></span> Incluir Anúncio</a></li>
        </ul>
    </nav>
</div>

<div class="dashboard_sidebar_menu dn-992">
    <ul class="sidebar-menu">
        <li class="header"><img src="{{ asset('assets/painel/images/header-logo.png') }}" alt="header-logo2.png"></li>
        <li class="title"><span>Painel Administrativo</span></li>
        <li class="treeview active"><a href="{{ url("/dashboard") }}"><i class="flaticon-layers"></i><span> Dashboard</span></a></li>
        <li class="treeview"><a href="{{ url("/painel/leads") }}"><i class="flaticon-envelope"></i><span> Contatos (Leads)</span></a></li>
        <li class="title"><span>Gerenciar Anúncios</span></li>
        <li class="treeview">
            <a href="#"><i class="flaticon-home"></i> <span>Meus anúncios</span><i class="fa fa-angle-down pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ url("/painel/anuncios") }}"><i class="fa fa-circle"></i> Venda</a></li>
                <li><a href="{{ url("/painel/anuncios") }}"><i class="fa fa-circle"></i> Locação</a></li>
                <li><a href="{{ url("/painel/anuncios") }}"><i class="fa fa-circle"></i> Lançamentos</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#"><i class="flaticon-share"></i><span> Integrações</span><i class="fa fa-angle-down pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ url("/painel/integracoes/configuracao") }}"><i class="fa fa-cog"></i> Configuração</a></li>
                <li><a href="{{ url("/painel/integracoes/relatorio-geral") }}"><i class="fa fa-circle"></i> Relatório Geral</a></li>
            </ul>
        </li>
        <li class="title"><span>Gerenciar Conta</span></li>
        <li><a href="/painel/{{ Auth::user()->id }}/perfil"><i class="flaticon-user"></i> <span>Meu Perfil</span></a></li>
        <li><a href="{{ url("/logout-painel") }}"><i class="flaticon-logout"></i> <span>Sair</span></a></li>
    </ul>
</div>

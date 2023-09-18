<!-- Main Header Nav -->
<header class="header-nav menu_style_home_one {{ $menu ?? ''}} navbar-scrolltofixed stricky main-menu">
    <div class="container-fluid p0">
        <!-- Ace Responsive Menu -->
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid" src="{{ asset('assets/portal/images/header-'.$logo.'.png') }}" alt="header-logo.png">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="{{url("/")}}" class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid" src="{{ asset('assets/portal/images/header-'.$logo.'.png') }}" alt="header-logo.png">
                <img class="logo2 img-fluid" src="{{ asset('assets/portal/images/header-logo2.png') }}" alt="header-logo2.png">
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                <li>
                    <a href="{{url("/lista-imoveis/venda")}}"><span class="title">Comprar</span></a>
                </li>
                <li>
                    <a href="{{url("/lista-imoveis/locacao")}}"><span class="title">Alugar</span></a>
                </li>
                <li>
                    <a href="{{url("/lista-imoveis/novos")}}"><span class="title">Lançamentos</span></a>
                </li>

                <li class="last">
                    <a href="{{ url('/simular-financiamento-de-imoveis') }}"><span class="title">Financiamento</span></a>
                </li>
                <!--<li class="list-inline-item list_s"><a href="#" class="btn flaticon-user" data-toggle="modal" data-target=".bd-example-modal-lg"> <span class="dn-lg">Login/Cadastro</span></a></li>-->
                <li class="list-inline-item add_listing"><a href="{{url("/login")}}"><span class="flaticon-plus"></span><span class="dn-lg"> Anunciar</span></a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Main Header Nav For Mobile -->
<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="d-flex justify-content-between">
                <a class="mobile-menu-trigger" href="#menu"><img src="{{ asset('assets/portal/images/icon-menu.png') }}" alt=""></a>
                <a class="nav_logo_img" href="{{url("/")}}"><img class="img-fluid mt20" src="{{ asset('assets/portal/images/header-logo2.png') }}" alt="header-logo2.png"></a>
                <a class="mobile-menu-reg-link" href="page-register.html"><span class="flaticon-user"></span></a>
            </div>
        </div>
    </div><!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
        <ul>
            <li>
                <a href="{{url("/imoveis-buscar")}}"><span class="title">Comprar</span></a>
            </li>
            <li>
                <a href="{{url("/imoveis-buscar")}}"><span class="title">Alugar</span></a>
            </li>
            <li>
                <a href="{{url("/imoveis-buscar")}}"><span class="title">Lançamentos</span></a>
            </li>

            <li class="last">
                <a href="#"><span class="title">Financiamento</span></a>
            </li>
            <!--<li><a href="page-login.html"><span class="flaticon-user"></span> Login/Cadastro</a></li>-->
            <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="{{ url("/login") }}"><span class="flaticon-plus"></span> Anunciar</a></li>
        </ul>
    </nav>
</div>

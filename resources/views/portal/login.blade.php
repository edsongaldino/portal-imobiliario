<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
    @include('includes.portal.head')
</head>
<body>
<div class="wrapper">
    <div class="preloader"></div>

    @php $menu = "style2"; $logo = "logo2"; @endphp
    @include('includes.portal.menu')

    <!-- Breadcrumb -->
    <section class="inner_page_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                        <h4 class="breadcrumb_title">Login / Cadastro</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-log bgc-fa">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6 offset-lg-3">
                <div class="login_form inner_page">

                    {{-- FORM LOGIN --}}
                    <div id="form-login">
                        <form method="POST" action="{{ route('login.portal') }}">
                            @csrf
                            <div class="heading">
                                <h3 class="text-center">Acesse sua conta</h3>
                                <p class="text-center">
                                    Não possui acesso?
                                    <a href="#" class="text-thm" data-auth-target="register">
                                        Cadastre-se!
                                    </a>
                                </p>
                            </div>

                            {{-- erros de login --}}
                            @if ($errors->has('email') || $errors->has('password'))
                                <div class="alert alert-danger">
                                    Verifique seus dados de login e tente novamente.
                                </div>
                            @endif

                            <div class="form-group">
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="emailLogin"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Email"
                                    required
                                >
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="senhaLogin"
                                    name="password"
                                    placeholder="Senha"
                                    required
                                >
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group custom-control custom-checkbox">
                                <input type="checkbox"
                                       class="custom-control-input"
                                       id="remember"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Lembrar</label>

                                <a href="#" class="tdu btn-fpswd float-right" data-auth-target="reset">
                                    Esqueceu sua senha?
                                </a>
                            </div>

                            <button type="submit" class="btn btn-log btn-block btn-thm2">Login</button>

                            <div class="divide">
                                <span class="lf_divider">Ou</span>
                            </div>
                            <div class="row mt40">
                                <div class="col-lg">
                                    <button type="button" class="btn btn2 btn-block color-white bgc-gogle mb0">
                                        <i class="fa fa-google float-left mt5"></i> Google
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- FORM CADASTRO --}}
                    <div id="form-register" class="d-none">
                        <form method="POST" action="{{ route('cadastro.portal') }}">
                            @csrf
                            <div class="heading">
                                <h3 class="text-center">Cadastre-se</h3>
                                <p class="text-center">
                                    Já possui uma conta?
                                    <a href="#" class="text-thm" data-auth-target="login">
                                        Faça login
                                    </a>
                                </p>
                            </div>

                            {{-- erros de cadastro --}}
                            @if ($errors->has('name') || $errors->has('password'))
                                <div class="alert alert-danger">
                                    Verifique os dados de cadastro e tente novamente.
                                </div>
                            @endif

                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="nome"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Nome completo"
                                    required
                                >
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="emailCadastro"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Email"
                                    required
                                >
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="senhaCadastro"
                                    name="password"
                                    placeholder="Senha"
                                    required
                                >
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="senhaCadastro2"
                                    name="password_confirmation"
                                    placeholder="Repita a senha"
                                    required
                                >
                            </div>

                            <div class="form-group custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="termos" required>
                                <label class="custom-control-label" for="termos">
                                    Eu li e aceito os Termos e Política de Privacidade
                                </label>
                            </div>

                            <button type="submit" class="btn btn-log btn-block btn-thm2">Cadastrar</button>
                        </form>
                    </div>

                    {{-- FORM ESQUECI SENHA --}}
                    <div id="form-reset" class="d-none">
                        <form method="POST" action="{{ route('resetar.senha.portal') }}">
                            @csrf
                            <div class="heading">
                                <h3 class="text-center">Recuperar senha</h3>
                                <p class="text-center">
                                    Informe seu e-mail para receber um link de redefinição.
                                </p>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="form-group">
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="emailReset"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Email"
                                    required
                                >
                            </div>

                            <button type="submit" class="btn btn-log btn-block btn-thm2">
                                Enviar link de redefinição
                            </button>

                            <p class="text-center mt20">
                                Lembrou a senha?
                                <a href="#" class="text-thm" data-auth-target="login">
                                    Voltar ao login
                                </a>
                            </p>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


    @include('includes.portal.footer')

</div>

<link rel="stylesheet" href="{{ asset('assets/portal/css/responsive.css') }}">

<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery.mmenu.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/ace-responsive-menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/isotop.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/snackbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/simplebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/scrollto.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-scrolltofixed-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery.counterup.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/pricing-slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/timepicker.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLZYFMbNKXu2gyC_yxbdEDGxA6G0LSNu8&callback=initMap" type="text/javascript"></script>
<script src="https://kit.fontawesome.com/952ef81d56.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/custom.js') }}"></script>

<script>
    function showAuthForm(target) {
        // esconde todos
        $('#form-login, #form-register, #form-reset').addClass('d-none');
        // mostra o escolhido
        $('#form-' + target).removeClass('d-none');
        // rola um pouco para garantir que o usuário veja o form
        $('html, body').animate({
            scrollTop: $('.login_form.inner_page').offset().top - 80
        }, 300);
    }

    $(function () {
        // links com data-auth-target="login|register|reset"
        $(document).on('click', '[data-auth-target]', function (e) {
            e.preventDefault();
            const target = $(this).data('auth-target');
            showAuthForm(target);
        });

        // lógica para abrir o form certo se vier com erro do backend
        @if ($errors->has('name') || $errors->has('password') && url()->current() === route('register'))
            showAuthForm('register');
        @elseif (session('status'))
            showAuthForm('reset');
        @else
            showAuthForm('login');
        @endif
    });
</script>


</body>
</html>
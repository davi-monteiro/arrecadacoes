<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- LIBS CSS -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/slick/slick-theme.css')}}">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">

    <title>@yield('titulo')</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('assets/imagens/doe_sempre.png')}}" alt="logo doe sempre"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-auto text-uppercase d-flex align-items-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}/#comoFunciona">Como funciona</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary rounded-pill text-white px-4" href="{{route('todas_insts')}}">Quero doar</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{route('todas_insts')}}">
                    <input name="busca" value="{{(isset($_GET['busca']))? $_GET['busca'] : '' }}" class="form-control mr-sm-2" type="search" placeholder="Instituição">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    @if(Auth::guard('usuario')->user())
                    <a class="nav-link" href="{{route('painel.index')}}">Minha conta</a>
                    <a class="nav-link" href="{{route('logout')}}">Sair</a>
                    @else
                    <a class="nav-link" href="{{route('login')}}">Login/Cadastro</a>
                    @endif
                </form>
            </div>
        </nav>
    </header>
    <main>
        @yield('conteudo')
    </main>
    <footer class="bg-dark text-white">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="font-weight-bold">Quem somos</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing, elit. Dolorum, delectus. Ipsa ullam, enim. Hic aut suscipit enim facere accusamus numquam voluptate, aspernatur placeat ab quaerat dolorum, inventore, est distinctio et!
                    </p>
                </div>
                <div class="col-md-6">
                    <h3 class="font-weight-bold">Contatos</h3>
                    <ul>
                        <li>Telefone: (00) 0000-0000</li>
                        <li>Email: contato@teste</li>
                        <li>Endereço: Rua Lorem, 9880, São Paulo/SP</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- LIBS JS-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/libs/mask/mask.js')}}"></script>

    <!-- SCRIPTS -->
    <script>
        $('.carrossel-instituicao').slick({
            dots: true,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        $('input[name="valor"], .valor').mask("#.##0,00", {
            reverse: true
        });

        @if(session('doacao'))
        $('.modal-sucesso').modal('show');
        @endif

        @if(session('msg-dados'))
        $('.modal-alterar-dados').modal('show');
        @endif

        @if(session('msg-erro'))
        $('.modal-erro').modal('show');
        @endif
    </script>


</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'MyApp')</title>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Super Gestão</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{ route('base') }}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=" {{ route('sobre-nos') }} " class="nav-link px-0">
                                <i class="fs-4 bi bi-archive"></i> <span
                                    class="ms-1 d-none d-sm-inline">Sobre-nós</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contato') }}" class="nav-link px-0">
                                <i class="fs-4 bi bi-chat-square-text"></i> <span
                                    class="ms-1 d-none d-sm-inline">Contato</span> </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link px-0">
                                <i class="fs-4 bi bi-box-arrow-right"></i> <span
                                    class="ms-1 d-none d-sm-inline">Acessar</span> </a>
                        </li>

                        @if (isset($session['id']) && $session['id'] != '')
                            <li>
                                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-speedometer2"></i> <span
                                        class="ms-1 d-none d-sm-inline">Aplicação</span> </a>
                                <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href=" {{ route('app.home') }} " class="nav-link px-0">
                                            <i class="bi bi-house-door-fill"></i> <span
                                                class="ms-1 d-none d-sm-inline">Home</span> </a>
                                    </li>
                                    <li class="w-100">
                                        <a href=" {{ route('app.fornecedores') }} " class="nav-link px-0">
                                            <i class="bi bi-buildings"></i> <span
                                                class="ms-1 d-none d-sm-inline">Fornecedores</span> </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('app.produtos') }}" class="nav-link px-0">
                                            <i class="bi bi-box2-fill"></i> <span
                                                class="ms-1 d-none d-sm-inline">Produtos</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('app.clientes') }}" class="nav-link px-0">
                                            <i class="bi bi-person-fill"></i><span
                                                class="ms-1 d-none d-sm-inline">Clientes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('app.sair') }}" class="nav-link px-0">
                                            <i class="bi bi-box-arrow-left"></i><span
                                                class="ms-1 d-none d-sm-inline">Sair</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <hr>

                </div>
            </div>
            <div class="col py-3">
                @yield('content')
            </div>
        </div>
    </div>

    @stack('scripts')
</body>

</html>

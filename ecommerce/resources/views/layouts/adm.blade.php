<!DOCTYPE html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>@yield('title')</title>
            <!-- CSS Bootstrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <!-- Fonts Google -->
            <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
            <!-- Jquery -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

            <!-- CSS da aplicação -->
            <link rel="stylesheet" href="/css/style.css">
            <script src="/js/function.js"></script>
        </head>
        <body>
            
        <header>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Site Principal</a>
                </li>
                @auth
                <li class="nav-item">
                <form action="/logout" method="POST">
                  @csrf
                  <a href="/logout" 
                    class="nav-link" 
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Sair
                  </a>
                </form>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produtos/create">Cadastror Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categorias/create">Cadastrar Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produtos/list">Lista Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lista Categorias</a>
                </li>

                @endauth

            </ul>
        </header>


        <main>
            <div class="container">
                <div class="bloco">
                    @if(session('msg'))
                        <p class='msg'>{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>


        <footer>
            <p>E-commerce</p>
        </footer>
    </body>
</html>

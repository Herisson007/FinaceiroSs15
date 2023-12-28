<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FinanceiroSs15</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            line-height: 1.5;
            background-color: #f3f4f6;
            color: #1a202c;
            transition: background-color 0.5s, color 0.5s;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        .logo {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            transition: transform 0.3s;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand h1 {
            margin: 0;
        }

        .nav a {
            text-decoration: none;
            color: #4b5563;
            font-weight: 600;
            transition: color 0.3s;
        }

        .nav a:hover {
            color: #1a202c;
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ef4444;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #cc0000;
        }

        .features-section {
            margin-top: 40px;
        }

        .feature {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .feature-icon {
            font-size: 48px;
            color: #ef4444;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="navbar-brand">
                <img src="https://img.freepik.com/vetores-premium/modelo-de-vetor-de-design-de-logotipo-hv-simbolo-de-vetor-de-icone-de-design-de-logotipo-de-letra-hv-letra-ligada-inicial-hv_657409-175.jpg?size=626&ext=jpg" alt="Logo" class="logo">
                <h1>FinanceiroSs15</h1>
            </div>
            <div class="nav">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrar</a>
                    @endif
                @endauth
            </div>
        </div>

        <div class="features-section">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fas fa-chart-bar feature-icon"></i>
                        <h3>Adicione Registros</h3>
                        <p>Reccebido, gastos adicione a descrição e selecione o tipo, assim tera um contro do que voce recebe e gasta.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fas fa-cogs feature-icon"></i>
                        <h3>Graficos</h3>
                        <p>Aqui você tem um grafico de entrada e saida que voce registrou.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature">
                        <i class="fas fa-shield-alt feature-icon"></i>
                        <h3>Resultado</h3>
                        <p>Veja seus resultados se esta com dinheiro sobrando.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-U7UqZ4eg6sF8w3pViA/4aif5EIl5uKJeqnSwAO8eQ+OrCXaRkatA8JLlvIbQOmS" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>
</html>

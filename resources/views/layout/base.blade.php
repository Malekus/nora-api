<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>ClickClick</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/reset.css")  }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/normalize.css")  }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/style.css")  }}" type="text/css">
</head>
<body>
<header>
    <nav id="navbar">
        <div id="navbarLeft">
            <p>ClickClick</p>
        </div>
        <div id="navbarRight">
            <a href="#" id="btnConfig" data-toggle="modal" data-target=".modalConfig">
                <span class="icon"><i class="fa fa-cogs"></i></span>
            </a>
        </div>
    </nav>
</header>
<main>


    <div id="badgeAlert" style="position: absolute; width: 100%" class="text-center d-none">
        <div class="alert alert-primary" role="alert" style="width: auto; margin: 0 auto">
            On est la
        </div>
    </div>

    <div id="container">
        @yield('content')
    </div>
</main>
<div class="no-height"></div>
<footer></footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset("js/script.js")  }}"></script>
@yield('ajax')
<script src="{{ asset("js/ajaxCategorie.js")  }}"></script>
<script src="{{ asset("js/ajaxPhrase.js")  }}"></script>
</body>
</html>

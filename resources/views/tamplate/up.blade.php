
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
  <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>
    Célio Eletricista - Sistema orçamento
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('css/material-kit.css?v=2.0.7')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand mb-3" href="{{route('index')}}">
          <img src="{{asset('img/logo/logo.png')}}" alt="" width="130vh" class="ml-2 mb-3">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          @if(!Auth::user())

               <li class="nav-item">
                 <a class="nav-link" href="/login">
                   <i class="material-icons">lock_outline</i>Entrar no Sistema
                 </a>
               </li>
           @else 
               <li class="nav-item">
                 <a class="nav-link" href="{{route('novo-orcamento')}}">
                  <span class="material-icons">
                    control_point
                    </span> Novo Orçamento
                 </a>
               </li>
               <li class="nav-item">
                <a class="nav-link" href="{{route('enviados')}}">
                  <span class="material-icons">
                    send
                    </span> Enviados
                </a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="{{route('index')}}">
                  <span class="material-icons">
                    account_circle
                    </span> {{ Auth::user()->name }}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                  <span class="material-icons">
                    exit_to_app
                    </span> Sair
                </a>
              </li>
           @endif
 
        </ul>
      </div>
    </div>
  </nav>
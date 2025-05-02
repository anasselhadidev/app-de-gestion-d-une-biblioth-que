<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <!-- Ajoutez vos balises meta, liens CSS, etc. ici -->

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link.active {
            color: #ffffff; /* Couleur du texte pour l'élément actif */
            background-color: #007bff; /* Couleur de fond pour l'élément actif */
        }
    </style>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{url('/')}}" class="logo">
                            <img src="assets/images/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav" style="white-space:nowrap;">
                            <li><a href="{{url('/')}}" class="active">Home</a></li>
                            <li ><a href="{{url('explore')}}" >Explore</a></li>
                            @if (Route::has('login'))
                                @auth
                                <li>
                                    <a href="{{url('book_history')}}" >My Borrows</a>
                                </li>
                                <li>
                                    <a href="{{url('book_reservation')}}">My Reservation</a>
                                </li>
                                
                                <li>
                                    <x-app-layout>
                                    </x-app-layout>
                                </li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </ul> 
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- Ajoutez le reste de votre contenu HTML ici -->

    <!-- Script jQuery pour gérer la classe active des liens de navigation -->


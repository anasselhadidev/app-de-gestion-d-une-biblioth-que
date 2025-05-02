<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset('admin/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style>
        .return-date {
            color: black; /* Couleur de texte noire */
        }
        body {
            background-color: black; /* Couleur de fond */
            color: white; /* Couleur de texte */
        }
        .center {
            text-align: center;
            margin: auto;
            width: 90%;
            border: 1px solid white;
            margin-top: 60px;
            background-color: black; /* Couleur de fond */
            color: white; /* Couleur de texte */
        }
        th {
            background-color: skyblue;
            color: white;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            padding: 15px; /* Ajustement de l'espacement */
            min-width: 120px; /* Largeur minimale de la colonne */
        }
        td {
            text-align: center;
            padding: 15px; /* Ajustement de l'espacement */
            min-width: 120px; /* Largeur minimale de la colonne */
        }
        /* Ajustement pour l'image */
        .book-image {
            height: 150px;
            width: auto; /* Garder le ratio */
        }
    </style>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch" style="background-color: black;">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content" style="background-color: black;">
            <div class="page-header">
                <div class="container-fluid">
                    <table class="center">
                        <tr>
                            <th>User Name</th>
                            <th>Phone</th>
                            <th>Book Title</th>
                            <th>Borrow date</th>
                            <th>Expected return date</th>
                            <th>Quantity</th>
                            <th>Borrow Status</th>
                            <th>Book Image</th>
                            <th>Change Status</th>
                            <th>Return Date</th>
                        </tr>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->user->phone}}</td>
                            <td>{{$item->book->title}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->borrow_date)->format('d F Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->expected_return_date)->format('d F Y') }}</td>
                            <td>{{$item->book->quantity}}</td>
                            <td>
                                @if($item->status == 'approved')
                                <span style="color: skyblue;">{{$item->status}}</span>
                                @elseif($item->status == 'rejected')
                                <span style="color: red;">{{$item->status}}</span>
                                @elseif($item->status == 'returned')
                                <span style="color: green;">{{$item->status}}</span>
                                @elseif($item->status == 'canceled')
                                <span style="color: #4CAF50;">{{$item->status}}</span>
                                @elseif($item->status == 'Applied')
                                <span style="color: white;">{{$item->status}}</span>
                                @endif
                            </td>
                            <td>
                                <img class="book-image" src="book/{{$item->book->book_img}}">
                            </td>
                            <style>
                                .btn-sm {
                                    margin: 2px; /* Ajoute un petit espace entre les boutons */
                                }
                            </style>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{ url('approve_book', $item->id) }}">Approved</a>
                                <a class="btn btn-danger btn-sm" href="{{ url('rejected_book', $item->id) }}">Rejected</a>
                                <a class="btn btn-info btn-sm" href="{{ url('return_book', $item->id) }}">Returned</a>
                                <a class="btn btn-primary btn-sm" href="{{ url('cancel_book', $item->id) }}">Canceled</a>
                            </td>
                            <td class="return-date">
                                <form action="{{url('update_return_date', $item->id)}}" method="POST">
                                    @csrf
                                    <input type="datetime-local" name="return_date" value="{{ $item->return_date ? \Carbon\Carbon::parse($item->return_date)->format('Y-m-d\TH:i') : '' }}">
                                    <button type="submit" class="btn btn-success mt-2">Update</button>
                                </form>
                                <!-- Affichage de la nouvelle date de retour -->
                                @if($item->updated_return_date)
                                    {{$item->updated_return_date}}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>
</html>

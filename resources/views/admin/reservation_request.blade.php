<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        .return-date {
            color: black !important; /* Couleur de texte noire avec !important */
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
        .btn-sm {
            margin: 2px; /* Ajoute un petit espace entre les boutons */
        }
    </style>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <table class="center">
                        <tr>
                            <th>User Name</th>
                            <th>Phone</th>
                            <th>Book Title</th>
                            <th>Quantity</th>
                            <th>Reservation Status</th>
                            <th>Book Image</th>
                            <th>Reservation Date</th>
                            <th>Expected Return Date</th>
                            <th>Change Status</th>
                            <th>Return Date</th>
                        </tr>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$item->user->name}}</td>
                            <td>{{$item->user->phone}}</td>
                            <td>{{$item->book->title}}</td>  
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
                                @elseif($item->status == 'pending')
                                <span style="color: white;">{{$item->status}}</span>
                                @endif
                            </td>
                            <td>
                                <img class="book-image" src="book/{{$item->book->book_img}}">
                            </td>
                            <td>
                                @if($item->reserve_date)
                                    {{ \Carbon\Carbon::parse($item->reserve_date)->format('d M Y H:i') }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{$item->expected_return_date}}</td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="{{url('approve_reservation', $item->id)}}">Approved</a>
                                <a class="btn btn-danger btn-sm" href="{{url('rejected_reservation', $item->id)}}">Rejected</a>
                                <a class="btn btn-info btn-sm" href="{{ url('return_reservation', $item->id) }}">Returned</a>
                                <a class="btn btn-primary btn-sm" href="{{ url('cancel_reservation', $item->id) }}">Canceled</a>
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

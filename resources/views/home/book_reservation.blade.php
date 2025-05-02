<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style type="text/css">
        .table_deg {
            text-align: center;
            margin: auto;
            border: 1px solid white;
            margin-top: 100px;
        }
        th {
            background-color: skyblue;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-align: center;
        }
        td {
            background-color: black;
            color: white;
            border: 1px solid white;
        }
        .book_img {
            height: 120px;
            width: 80px;
            margin: auto;
        }
    </style>
</head>
<body>
    @include('home.header')
    <div class="currently-market">
       <div class="container">
         <div class="row">
            @if(session()->has('message'))
            <div style="margin-top:100px;" class="alert alert-success">
                {{session()->get('message')}}
                <button type="button" class="close" aria-hidden="true" data-bs-dismiss="alert">x</button>
            </div>
            @endif
            <table class="table_deg">
                <tr>
                    <th>Book Name</th>
                    <th>Image</th>
                    <th>Reservation Status</th>
                    <th>Reservation Date</th>
                    <th>Expected return Date</th>
                    <th>Return Date</th>
                    <th>Cancel Reservation</th>
                </tr>
                @foreach($data as $item)
                <tr>
                    <td>{{$item->book->title}}</td>
                    <td>
                        <img class="book_img" src="book/{{$item->book->book_img}}">
                    </td>
                    <td>{{$item->status}}</td>
                    <td>
                        @if($item->reserve_date)
                        {{ \Carbon\Carbon::parse($item->reserve_date)->format('d M Y H:i') }}
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        @if($item->expected_return_date)
                        {{ \Carbon\Carbon::parse($item->expected_return_date)->format('d M Y H:i') }}
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        @if($item->return_date)
                        {{ \Carbon\Carbon::parse($item->return_date)->format('d M Y H:i') }}
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        @if($item->status == 'pending')
                        <a href="{{url('cancel_reserv', $item->id)}}" class="btn btn-warning">Cancel</a>
                        @else
                        <p style="color:white; font-weight:bold;">Not allowed</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
      </div>
    </div>
    @include('home.footer')
</body>
</html>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Reservation;

class HomeController extends Controller
{
    public function index()
    {
        // Récupérer les données des livres depuis la base de données
        $data = Book::all();

        // Passer les données à la vue
        return view('home.index', compact('data'));
    }

    public function borrow_books(Request $request, $id)
{
    // Vérifier si l'utilisateur est authentifié
    if (Auth::check()) {
        $book = Book::findOrFail($id);
        $quantity = $book->quantity;

        if ($quantity > 0) {
            // Si des livres sont disponibles, afficher le formulaire de demande de prêt
            return view('home.borrow_form', compact('book'));
        } else {
            // Si aucun livre n'est disponible, rediriger vers la page de réservation
            return redirect()->route('reservation', $id);
        }
    } else {
        // Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié
        return redirect('/login');
    }
}
    
public function submitBorrowForm(Request $request, $id)
    {
        $request->validate([
            'borrow_date' => 'required|date',
            'expected_return_date' => 'required|date|after:borrow_date',
        ]);

        $book = Book::findOrFail($id);
        // Logique pour enregistrer les informations d'emprunt
        $borrow = new Borrow();
        $borrow->book_id = $id;
        $borrow->user_id = Auth::id();
        $borrow->borrow_date = $request->borrow_date;
        $borrow->expected_return_date = $request->expected_return_date;
        if (!$request->has('status')) {
            $borrow->status = 'Applied';
        } else {
            $borrow->status = $request->status;
        }
        $borrow->save();
            
        return redirect('/home')->with('message', 'Emprunt successfully confirmed.');
    }

    public function reservation($id)
    {
        $book = Book::findOrFail($id);
        $nextReturnDate = Borrow::where('book_id', $id)
                                ->where('return_date', '>', Carbon::now())
                                ->min('return_date');
        return view('home.reservation', compact('book', 'nextReturnDate'));
    }

    public function submitReservation(Request $request, $id)
{
    // Récupérer la plus proche date de retour du livre
    $nextReturnDate = Borrow::where('book_id', $id)
                            ->where('return_date', '>', Carbon::now())
                            ->min('return_date');

    // Valider les données du formulaire
    $request->validate([
        'reserve_date' => ['required', 'date', function ($attribute, $value, $fail) use ($nextReturnDate) {
            if (Carbon::parse($value)->lte(Carbon::parse($nextReturnDate))) {
                $fail('The reservation date must be after the next return date : ' . Carbon::parse($nextReturnDate)->format('d/m/Y') . '.');
            }
        }],
    ]);

    // Créer une nouvelle réservation
    $reservation = new Reservation();
    $reservation->book_id = $id; // ID du livre
    $reservation->user_id = Auth::id();
    $reservation->book_title = $request->book_title; // Titre du livre
    $reservation->user_email = Auth::user()->email; // Email de l'utilisateur connecté
    $reservation->reserve_date = $request->reserve_date; // Date de réservation saisie par l'utilisateur
    $reservation->expected_return_date = $request->return_date;

    // Enregistrer la réservation dans la base de données
    $reservation->save();

    // Redirection avec un message de confirmation
    return redirect('/home')->with('success', 'Reservation successfully confirmed.');
}

public function book_history()
{
    if(Auth::id())
    {
        $userid = Auth::user()->id;
        $data = Borrow::where('user_id', '=', $userid)->get();
        return view('home.book_history', compact('data'));
    }
}

public function cancel_req($id)
{
    $data = Borrow::find($id);
    $data->delete();
    return redirect()->back()->with('message', 'Book Borrow request canceled successfully');
}

public function book_reservation()
{
    if(Auth::check()) // Checks if the user is authenticated
    {
        $userid = Auth::id();
        $data = Reservation::where('user_id', $userid)->get();
        return view('home.book_reservation', compact('data'));
    } else {
        return redirect()->route('login')->with('error', 'Please log in to access this page.');
    }
}

    public function cancel_reserv($id)
    {
    $reservation = Reservation::findOrFail($id); // Finds the reservation or returns a 404 error if not found

    if($reservation->user_id === Auth::id()) // Checks if the current user is the owner of the reservation
    {
        $reservation->delete();
        return redirect()->back()->with('message', 'Reservation request canceled successfully.');
    } else {
        return redirect()->back()->with('error', 'You are not authorized to cancel this reservation.');
    }
    }

    public function explore()
    {
        $category= Category::all();
        $data = Book::all();
        return view('home.explore',compact('data','category'));
    }
    
    public function search(Request $request)
    {
        $category= Category::all();
        $search = $request->search;
        $data = Book::where('title','LIKE','%'.$search.'%')->orwhere('auther_name','LIKE','%'.$search.'%')->get();
        return view('home.explore',compact('data','category'));
    }
    public function cat_search($id)
    {
        $category= Category::all();
        $data = Book::where('category_id',$id)->get();
        return view('home.explore',compact('data','category'));
    }
    public function book_detail($id)
    {
        $data = Book::find($id);
        return view('home.book_detail',compact('data'));
    }
}
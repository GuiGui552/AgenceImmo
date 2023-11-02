<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormBienRequest;
use App\Models\Bien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenceImmoController extends Controller
{
    public function index() {
        return view('home', [
            'biens' => Bien::select('biens.id', 'titre', 'surface', 'prix', 'ville', 'code_postal')
                            ->with('images')
                            ->orderBy('created_at', 'desc')
                            ->take(4)
                            ->get()
        ]);
    }

    public function listeBiens() {
        return view('bien.listeBiens', [
            'biens' => Bien::select('biens.id', 'titre', 'surface', 'prix', 'ville', 'code_postal')
                        ->with('images')
                        ->orderBy('created_at', 'desc')
                        ->get()
        ]);
    }

    public function searchBiens(Request $request)
    {
        $query = Bien::query();

        if ($request->filled('max_price')) {
            $maxPrice = $request->input('max_price');
            $query->where('prix', '<=', $maxPrice);
        }

        if ($request->filled('min_surface')) {
            $minSurface = $request->input('min_surface');
            $query->where('surface', '>=', $minSurface);
        }

        if ($request->filled('max_piece')) {
            $maxPiece = $request->input('max_piece');
            $query->where('pieces', '<=', $maxPiece);
        }

        if ($request->filled('keyword')) {
            $keyWord = $request->input('keyword');
            $query->where('titre', 'like', '%' . $keyWord . '%');
        }

        $biens = $query->with('images')->orderBy('created_at', 'desc')->get();

        $view = view('bien.parcoursBiens', ['biens' => $biens])->render();

        return $view;
    }

}

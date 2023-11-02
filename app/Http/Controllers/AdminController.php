<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;
use App\Http\Requests\FormBienRequest;
use App\Http\Requests\FormImageBienRequest;
use App\Http\Requests\FormOptionRequest;
use App\Models\Image;
use App\Models\Option;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    
    // Partie gestion des biens

    public function listeBiens() {
        if (Gate::allows('admin')) {
            return view('admin.bien.listeBiens', [
                'biens' => Bien::all()
            ]);
        }
        else {
            return redirect()->route('home')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
        }
    }

    public function createBien(){
        return view('admin.bien.createBien', [
            'bien' => new Bien(),
            'options' => Option::select('id', 'nom')->get()
        ]);
    }

    public function storeBien(FormBienRequest $request, FormImageBienRequest $requestImage) {
        // dd($requestImage->validated());

        $bien = Bien::create($request->validated());
        $bien->option()->sync($request->validated('option'));
        $images = $requestImage->validated('images');

        // verifier si $requestImage est null => oui -> alors create image par defaut
        // sinon boucler sur chaque image et pour chaque image create Image avec l'id
        
        // if ($images == null) {
        //     Image::create([
        //         'src_image' => asset('images/image_defaut.jpg'),
        //         'bien_id' => $bien->id
        //     ]);
        // }

        $this->storeImage($bien, $images);
    
        return redirect()->route('admin.biens.listeBien')->with('success', 'Le bien a été créé avec succès.');
    }

    public function editBien(Bien $bien) {
        return view('admin.bien.editBien', [
           'bien' => $bien,
           'images' => Image::select('id', 'bien_id', 'src_image')->where('bien_id', $bien->id)->get(),
           'options' => Option::select('id', 'nom')->get()
        ]);
    }

    public function updateBien(Bien $bien, FormBienRequest $request, FormImageBienRequest $requestImage) {
        
        $bien->update($request->validated());
        $bien->option()->sync($request->validated('option'));
        $images = $requestImage->validated('images');

        if ($images) {
            $this->storeImage($bien, $images);
        }

        return redirect()->route('admin.biens.listeBien')->with('success', 'Le bien a été modifié avec succès.');
    }

    private function storeImage(Bien $bien, $images) {
        foreach ($images as $image) {
            Image::create([
                'src_image' => $image->store('biens/images_bien'.$bien->id, 'public'),
                'bien_id' => $bien->id
            ]);
        }
    }

    public function deleteImage(Image $image) {
        // Appel de la finction delete image pour eviter la duplication de code
        $this->deleteImageBis($image);

        return redirect()->back()->with('success', 'L\'image a été supprimée avec succès.');
    }

    // Evite la duplication de code dans la fonction deleteImage et deleteBien
    private function deleteImageBis(Image $image) {

        $imagePath = $image->src_image;
        
        // Supprimez le fichier image du serveur si nécessaire
        Storage::disk('public')->delete($image->src_image);

        // Obtenez le chemin du dossier contenant l'image
        $folderPath = dirname($imagePath);

        // Vérifiez si le dossier est vide
        if (count(Storage::disk('public')->files($folderPath)) === 0) {
            // Supprimez le dossier
            Storage::disk('public')->deleteDirectory($folderPath);
        }
        
        // Supprimez l'entrée de la base de données
        $image->delete();
    }

    public function deleteBien(Bien $bien) {
        $images = Image::where('bien_id', $bien->id)->get();

        // Appel de la finction delete image pour eviter la duplication de code
        foreach ($images as $image) {
            $this->deleteImageBis($image);
        }

        $bien->delete();

        return redirect()->back()->with('success', 'Le bien a été supprimé avec succès.');
    }
    

    // Partie gestion des options

    public function listeOptions() {
        if (Gate::allows('admin')) {
            return view('admin.option.listeOptions', [
                'options' => Option::select('id', 'nom')->get(),
                'option' => new Option()
            ]);
        }
        else {
            return redirect()->route('home')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
        }
    }

    public function storeOption(FormOptionRequest $request) {
        Option::create($request->validated());

        return redirect()->back()->with('success', 'l\'option a été ajouté avec succès.');
    }

    public function updateOption (Option $option, FormOptionRequest $request) {
        $option->update($request->validated());

        return redirect()->back()->with('success', 'L\'option '.$option->nom.' a été modifié avec succès.');
    }

    public function deleteOption(Option $option) {
        $option->delete();

        return redirect()->back()->with('success', 'L\'option a été supprimé avec succès.');
    }

    // Partie gestion des utilisateurs
    public function listeUsers() {
        if (Gate::allows('admin')) {
            return view('admin.user.listeUsers', [
                'users' => User::select('id', 'name', 'email', 'avatar')->with('roles')->get(),
                'roles' => Role::select('id', 'nom')->get()
            ]);
        }
        else {
            return redirect()->route('home')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
        }
    }

    public function updateUser(User $user, Request $request) {
        $request->validate([
            'role' => ['exists:roles,id']
        ]);
        $user->roles()->sync($request->role);

        return to_route('admin.user.listeUsers')->with('success', 'le role de '.$user->name.' a été mis à jour');
    }

}

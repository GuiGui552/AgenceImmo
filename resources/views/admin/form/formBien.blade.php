<div class="@if ($bien->id) flex flex-col md:gap-6 md:flex-row @endif">
    
    <div class="@if ($bien->id) md:w-2/3 @endif">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method($bien->id ? 'PATCH' : 'POST')

            <label for="vendu" class="relative inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" value="{{ old('vendu', $bien->vendu) }}" name="vendu" id="vendu" @if ($bien->vendu) checked @endif class="sr-only peer" onclick="updateCheckboxValue(this)">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900">Vendu ?</span>
                @error('vendu')
                    {{ $message }}
                @enderror
            </label>

            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="titre" id="titre" value="{{ old('titre', $bien->titre) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                <label for="titre" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Titre</label>
                @error('titre')
                    {{ $message }}
                @enderror
            </div>
        
            <div class="relative z-0 w-full mb-6 group">
                <input type="number" name="surface" id="surface" value="{{ old('surface', $bien->surface) }}" min="1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                <label for="surface" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Surface</label>
                @error('surface')
                    {{ $message }}
                @enderror
            </div>
        
            <div class="relative z-0 w-full mb-6 group">
                <input type="number" name="prix" id="prix" value="{{ old('prix', $bien->prix) }}" min="1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                <label for="prix" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prix</label>
                @error('prix')
                    {{ $message }}
                @enderror
            </div>
        
            <div class="relative z-0 w-full mb-6 group">
                <textarea name="description" id="description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">{{ old('description', $bien->description) }}</textarea>
                <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        
            <div class="grid md:grid-cols-3 md:gap-6">
        
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="pieces" id="pieces" value="{{ old('pieces', $bien->pieces) }}" min="0" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                    <label for="pieces" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pièces</label>
                    @error('pieces')
                        {{ $message }}
                    @enderror
                </div>
        
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="chambres" id="chambres" value="{{ old('chambres', $bien->chambres) }}" min="0" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                    <label for="chambres" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chambres</label>
                    @error('chambres')
                    {{ $message }}
                @enderror
                </div>
        
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="etages" id="etages" value="{{ old('etages', $bien->etages) }}" min="0" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                    <label for="etages" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Etages</label>
                    @error('etages')
                        {{ $message }}
                    @enderror
                </div>
        
            </div>
        
            <div class="grid md:grid-cols-3 md:gap-6">
        
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="adresse" id="adresse" value="{{ old('adresse', $bien->adresse) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                    <label for="adresse" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse</label>
                    @error('adresse')
                        {{ $message }}
                    @enderror
                </div>
        
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="ville" id="ville" value="{{ old('ville', $bien->ville) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                    <label for="ville" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ville</label>
                    @error('ville')
                        {{ $message }}
                    @enderror
                </div>
        
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="code_postal" id="code_postal" value="{{ old('code_postal', $bien->code_postal) }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                    <label for="code_postal" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Code Postal</label>
                    @error('code_postal')
                        {{ $message }}
                    @enderror
                </div>
        
            </div>
        
            <div class="grid justify-center items-center md:grid-cols-2 md:gap-6">
                       
                <div class="relative z-0 w-full mb-6 group">
                    <label for="images" class="block mb-2 text-sm font-medium text-gray-900">Ajouter des photos</label>
                    <input id="images" name="images[]" value="{{ old('images', $bien->images) }}" type="file" multiple class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    @error('images')
                        {{ $message }}
                    @enderror
                </div>
        
                @php
                    $optionId = $bien->option()->pluck('id');
                @endphp
                <div class="relative z-0 w-full mb-6 group">
                    
                    <label for="option" class="block mb-2 text-sm font-medium text-gray-900">Choisir une ou plusieurs options</label>
                    <select id="option" name="option[]" size="5" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @foreach ($options as $option)
                            <option @selected($optionId->contains($option->id)) value="{{ $option->id }}">{{ $option->nom }}</option>
                        @endforeach
                    </select>
                    @error('option')
                        {{ $message }}
                    @enderror
                </div>
        
            </div>
        
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                @if ($bien->id)
                    Enregister  
                @else
                    Publier
                @endif
            </button>
        
        </form>
    </div>
    
    @if ($bien->id)    
        <div class="md:w-1/3">
            @if ($bien->id)
                <h2 class="py-2 font-bold">Image(s) déjà enregistrée(s):</h2>
                <div class="flex flex-col justify-around items-center">
                    @foreach ($images as $image)
                        <div class="inline-block relative mb-2">
                            <img class="w-96" src="{{ $image->imageUrl() }}" alt="image_bien{{ $image->id }}">
                            <form action="{{ route('admin.biens.deleteImage', ['image' => $image->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?')" class="absolute w-full bottom-0 text-center bg-red-600 text-white">Supprimer</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
</div>

<script>
    function updateCheckboxValue(checkbox) {
        if (checkbox.checked) {
            checkbox.value = "1";
        } else {
            checkbox.value = "0";
        }
    }
</script>
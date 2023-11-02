




<!-- Main modal -->
<div 
    @if ($option->id)
        id="popup-modal-updateOption{{ $option->id }}" 
    @else
        id="popup-modal-createOption"
    @endif
    tabindex="-1" 
    aria-hidden="true" 
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
>
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <button 
                type="button" 
                @if ($option->id)    
                    data-modal-hide="popup-modal-updateOption{{ $option->id }}" 
                @else
                    data-modal-hide="popup-modal-createOption"
                @endif
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
            >
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900">
                    @if ($option->id)
                        Modification de l'option {{ $option->nom }}
                    @else
                        Ajouter une option
                    @endif
                </h3>
                <form 
                    class="space-y-6" 
                    @if ($option->id)
                        action="{{ route('admin.option.editOption', ['option' => $option->id]) }}" 
                    @else
                        action="{{ route('admin.option.storeOption') }}" 
                    @endif
                    method="POST"
                >
                    @csrf
                    @if ($option->id)
                        @method('patch')
                    @endif
                    <div>
                        <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Option:</label>
                        <input 
                            type="text" 
                            name="nom" 
                            id="nom" 
                            required 
                            placeholder="Garage..." 
                            @if ($option->id)
                                value="{{ $option->nom }}" 
                            @endif
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        >
                    </div>
                    
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        @if ($option->id)
                            Mettre à jour l'option
                        @else
                            Ajouter une option
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
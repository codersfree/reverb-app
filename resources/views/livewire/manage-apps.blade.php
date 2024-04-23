<div>
    
    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">

        <form wire:submit="save">

            <x-label>
                Nombre de la aplicación
            </x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingresa el nombre" />

            <x-input-error for="name" />

            <div class="flex justify-end mt-4">
                <x-button>
                    Guardar
                </x-button>
            </div>

        </form>

    </div>

    @if ($apps->count())

        <div class="bg-white rounded-lg shadow-lg px-6 py-3">

            {{-- <h1 class="text-lg font-bold">Aplicaciones</h1> --}}

            <ul class="divide-y divide-gray-200">
                @foreach ($apps as $app)
                    <li class="py-3">
                        <div class="flex justify-between items-center py-2">
                            <span class="font-semibold">{{ $app->name }}</span>
                            <button wire:click="delete({{ $app->id }})" class="text-red-500">Eliminar</button>
                        </div>

                        <div>
                            <p>
                                <span class="font-semibold">
                                    key:
                                </span>
                                {{$app->key}}
                            </p>

                            <p>
                                <span class="font-semibold">
                                    secret:
                                </span>
                                {{$app->secret}}
                            </p>

                            <p>
                                <span class="font-semibold">
                                    app id:
                                </span>
                                {{$app->app_id}}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
        
    @endif


</div>

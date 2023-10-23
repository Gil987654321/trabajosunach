{{-- Care about people's approval and you will be their prisoner. --}}
<div>
    <div class="bg-white overflow-hidden shadown-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>

                <div class="flex flex-col md:flex-row item-stretch gap-3 mt-5 md:mt-0">
                    <a href="#"
                        class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Candidatos
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Editar
                    </a>
                    {{-- <button wire:click="$dispatch('prueba', {vacante_id: {{ $vacante->id }}})"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Eliminar
                    </button> --}}
                    <button wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }})"
                        class="text-center bg-red-500 py-2 px-4 rounded-lg text-white text-xs font-bold">Eliminar</button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse

    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <script>
        // Livewire.on('prueba', () => {
        //     alert('Desde el Código de JS')
        // })

        // Livewire.on('prueba', vacanteId => {
        //     alert(vacanteId)
        // })

        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "Una vacante eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    //eliminar vacante
                    Livewire.dispatch('eliminarVacante', {
                        vacante: vacanteId
                    })

                    Swal.fire(
                        'Se eliminó la vacante',
                        'Eliminado Correctamente',
                        'success'
                    )
                }
            })
        })

        /*
                                        Swal.fire({
                                            title: '¿Eliminar Vacante?',
                                            text: "Una vacante eliminada no se puede recuperar",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Si, ¡Eliminar!',
                                            cancelButtonText: 'Cancelar'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Your file has been deleted.',
                                                    'success'
                                                )
                                            }
                                        })
                                        */
    </script>
@endpush

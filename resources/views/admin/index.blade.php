@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios MarketPlant</h1>
@stop

@section('content')
    <table id="productos" class="table table-fixed table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr class="bg-gray-800 text-white">
                <th class="border px-4 py-2"> ID</th>
                <th class="border px-4 py-2">NOMBRE</th>
                <th class="border px-4 py-2">CORREO</th>

                <th class="border px-4 py-2">IDENTIFICACION</th>
                <th class="border px-4 py-2">FECHA DE REGISTRO</th>
                <th class="border px-4 py-2">ACCIONES</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($userArray as $users)
                <tr>
                    <td class="border px-14 py-1"> {{ $users['id'] }}</td>
                    <td class="border px-14 py-1">{{ $users['name'] }}</td>
                    <td class="border px-14 py-1">{{ $users['email'] }}</td>

                    <td class="border px-14 py-1">{{ $users['identificacion'] }}</td>
                    <td class="border px-14 py-1">{{ $users['created_at'] }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex justify-center rounded-lg text-lg" role="group">
                            <!-- botón editar -->

                            <!-- botón borrar -->
                            <form action="{{ route('admin.destroy', $users['id']) }}" method="POST" class="formEliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    </div>
    </div>
    </div>
    </div>

@stop

@section('css')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        (function() {
            'use strict'
            //debemos crear la clase formEliminar dentro del form del boton borrar
            //recordar que cada registro a eliminar esta contenido en un form  
            var forms = document.querySelectorAll('.formEliminar')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault()
                        event.stopPropagation()
                        Swal.fire({
                            title: '¿Confirma la eliminación del registro?',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#20c997',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Confirmar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                this.submit();
                                Swal.fire('¡Eliminado!',
                                    'El registro ha sido eliminado exitosamente.', 'success');
                            }
                        })
                    }, false)
                })
        })()
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {
            $('#productos').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, 'ALL']
                ]

            });
        });
    </script>
@stop

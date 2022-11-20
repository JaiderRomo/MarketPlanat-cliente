@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mis Productos</h1>
@stop

@section('content')
  
<table id="productos" class="table table-fixed table-bordered shadow-lg mt-4" style="width:100%">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($blogArray as $articulo)
    <tr>
        <td>{{$articulo['id']}}</td>
        <td>{{$articulo['nombre']}}</td>
        <td>{{$articulo['descripcion']}}</td>
        <td>{{$articulo['cantidad']}}</td>
        <td>{{$articulo['precio']}}</td>
        <td>
         <form action="{{ route('perfil_us.destroy',$articulo['id']) }}" method="POST" class="formEliminar">
        
            <a href="/perfil_us/{{$articulo['id']}}/edit" class="btn btn-info">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Borrar</button>
         </form>          
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>

@stop

@section('css')
<link  href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
  (function () {
  'use strict'
  // crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
  .forEach(function (form) {
  form.addEventListener('submit', function (event) {        
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
                Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
            }
        })                      
  }, false)
  })
  })()
  </script>
  
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function () {
    $('#productos').DataTable({
 "lengthMenu": [[5,10,50,-1],[5,10,50, 'ALL']]

    });
});
  </script>
@stop 

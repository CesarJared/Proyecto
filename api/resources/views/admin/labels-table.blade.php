@php
 $p=2;   
@endphp

@extends('admin.layouts.main')

@section('contenido')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Etiquetas</h3></div>
        <div class="col-sm-6">
          <h3 class="mb-0" style="float: right">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
                Insertar
            </button>
          </h3>
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>

  <div class="app-content p-3">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nombre</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($labels as $l)
        <tr>
          <th scope="row">{{ $l->id }}</th>
          <td>{{$l->name}}</td>
          <td> 
            <button class="btn btn-info btnEditar" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$l->id}}" data-name="{{$l->name}}">Editar</button>
          </td>
          <td>
            <button class="btn btn-danger btnElim" data-id="{{$l->id}}" data-name="{{$l->name}}" data-bs-toggle="modal" data-bs-target="#elimModal">Eliminar</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div>
      @if($errors->any())
    <div class="alert bg-danger mt-4 p-4 text-white">
        <h5>Error:</h5>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
  </div>

  <div class="modal fade" tabindex="-1" id="insertModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <form action="{{url('admin/labels/add')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Insertar Etiqueta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="">Nombre</label>
              <input type="text" class="form-control" name="name">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" tabindex="-1" id="editModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <form action="" method="POST" enctype="multipart/form-data" id="editForm">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Editar Etiqueta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="">Nombre</label>
              <input type="text" class="form-control" name="name" id="editName">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" id="elimModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Etiqueta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="txtElim"></p>
        </div>
        <div class="modal-footer">
          <form action="" method="GET" id="elimForm">
            @csrf
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
  window.onload=()=>{
    var btnEdit=document.getElementsByClassName('btnEditar');
    for(let i=0;i<btnEdit.length;i++){
        btnEdit[i].addEventListener('click',(evt)=>{
            var id=btnEdit[i].getAttribute('data-id');
            var name=btnEdit[i].getAttribute('data-name');
            document.getElementById('editName').value=name;
            document.getElementById('editForm').action='/admin/labels/edit/'+id;
        });
    }

    var btnElim=document.getElementsByClassName('btnElim');

    for(let i=0;i<btnElim.length;i++){
        btnElim[i].addEventListener('click',(evt)=>{
            var id=btnElim[i].getAttribute('data-id');
            var name=btnElim[i].getAttribute('data-name');
            document.getElementById('txtElim').innerHTML='¿Desea eliminar la etiqueta '+name+'?';
            document.getElementById('elimForm').action='/admin/labels/delete/'+id;
        });
    }
  }
  
</script>
@endsection
@php
 $p=1;   
@endphp

@extends('admin.layouts.main')

@section('contenido')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Subidas</h3></div>
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
          <th scope="col">Usuario</th>
          <th scope="col">Categoria</th>
          <th scope="col">Imagen</th>
          <th scope="col">Titulo</th>
          <th scope="col">Descripcion</th>
          <th scope="col">slug</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($uploads as $u)
        <tr>
          <th scope="row">{{ $u->id }}</th>
          <td>{{$u->user_id}}</td>
          <td>{{$u->category_id}}</td>
          <td>{{$u->img}}</td>
          <td>{{$u->title}}</td>
          <td>{{$u->description}}</td>
          <td>{{$u->slug}}</td>
          <td> 
            <button class="btn btn-info btnEditar" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$u->id}}" data-category="{{$u->category_id}}" data-title="{{$u->title}}" data-description="{{$u->description}}">Editar</button>
          </td>
          <td>
              <button class="btn btn-danger btnElim" data-id="{{$u->id}}" data-title="{{$u->title}}" data-bs-toggle="modal" data-bs-target="#elimModal">Eliminar</button>
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
        <form action="{{url('admin/uploads/add')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title">Nueva Subida</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="">Titulo</label>
              <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
              <label for="">Descripcion</label>
              <input type="text" class="form-control" name="description">
            </div>
              <div class="mb-3">
                <label for="">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                  <option selected>Seleccionar</option>
                  @foreach ($categories as $c)
                    <option value="{{$c->id}}">{{$c->category}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="">Imagen</label>
                <input type="file" class="form-control" name='img'>
              </div>
              <div class="mb-3">
                <label for="">Video(s)</label>
                <input type="file" class="form-control" name="video">
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
            <h5 class="modal-title">Editar Información</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="">Titulo</label>
              <input type="text" class="form-control" name="title" id="editTitle">
            </div>
            <div class="mb-3">
              <label for="">Descripcion</label>
              <input type="text" class="form-control" name="description" id="editDescription">
            </div>
              <div class="mb-3">
                <label for="">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="category_id" id="editCategory">
                  <option selected>Seleccionar</option>
                  @foreach ($categories as $c)
                    <option value="{{$c->id}}">{{$c->category}}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="">Imagen</label>
                <input type="file" class="form-control" name='img' id="editImg">
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
          <h5 class="modal-title">Eliminar Subida</h5>
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
    var btnEditar = document.getElementsByClassName('btnEditar');

    for(let z=0;z<btnEditar.length;z++){
        btnEditar[z].addEventListener('click',(evt)=>{
          var id=evt.target.getAttribute('data-id');
          var category=evt.target.getAttribute('data-category');
          var title=evt.target.getAttribute('data-title');
          var description=evt.target.getAttribute('data-description');
          
          document.getElementById('editCategory').value=category;
          document.getElementById('editTitle').value=title;
          document.getElementById('editDescription').value=description;

          document.getElementById('editForm').action='/admin/uploads/edit/'+id;
        });
    }

     var btnElim=document.getElementsByClassName('btnElim');

     for(let i=0;i<btnElim.length;i++){
         btnElim[i].addEventListener('click',(evt)=>{
             var id=btnElim[i].getAttribute('data-id');
             var title=btnElim[i].getAttribute('data-title');
             document.getElementById('txtElim').innerHTML='¿Desea eliminar '+title+'?';
             document.getElementById('elimForm').action='/admin/uploads/delete/'+id;
         });
     }
  }
</script>

@endsection
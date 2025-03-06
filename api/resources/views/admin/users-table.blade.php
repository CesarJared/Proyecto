@php
 $p=4;   
@endphp

@extends('admin.layouts.main')

@section('contenido')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Usuarios</h3></div>
        <div class="col-sm-6">
          
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
          <th scope="col">Email</th>
          <th scope="col">Contraseña</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($users as $u)
        <tr>
          <th scope="row">{{ $u->id }}</th>
          <td>{{$u->name}}</td>
          <td>{{$u->email}}</td>
          <td>********</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
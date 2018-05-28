@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tablas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="{{ route('categorias.index') }}" title="Categorias">Categorias</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('subcategorias.index') }}" title="Sub-Categorias">Sub-Categorias</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('unidades.index') }}" title="Sub-Categorias">Unidades</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('codigos.index') }}" title="Codigos">Codigos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('proveedores.index') }}" title="Sub-Categorias">Proveedores</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}" title="Materia Prima">Productos</a></li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <ul class="nav">

                                <li class="nav-item"><a class="nav-link" href="{{ route('ordendecompras.index') }}" title="Orden de compra">Solicitud de Compra</a></li>
                                <li class="nav-item"><a class="nav-link" href="" title="Compras">Pedido de Compras</a></li>

                                <li class="nav-item"><a class="nav-link" href="{{ route('ordendecompras.index') }}" title="Orden de compra">Orde de Compra</a></li>
                                <li class="nav-item"><a class="nav-link" href="" title="Compras">Compras</a></li>

                            </ul>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="" title="Categorias">Inventario MP</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

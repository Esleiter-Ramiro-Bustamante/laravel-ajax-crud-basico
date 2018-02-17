@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Panel Administrativo</div>

                <div class="panel-body " >
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<p>
    <span id="products-total">{{$products->total()}} </span>Registros | 
    pagina {{$products->currentPage()}}
de {{$products->lastPage()}}
</p>
<div id="alert" class="alert alert-info"></div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="20px">ID</th>
                            <th >Nombre del producto</th>
                             <th >&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $k) <!-- mostrando lista productos-->
                        <tr>
                            <th width="20px">{{$k->id}}</th>
                            <td>{{$k->name}}</td>
                            <td width="20px">
             {!! Form::open(['route'=>['destroyProduct',$k->id],'method'=>'delete']) !!}
                        <a href="#" class="btn-delete">Eliminar</a>
                     {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach <!-- mostrando lista productos-->
                    </tbody>
                </table>   
                {!! $products->render() !!}  <!-- Paginacion-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
 <script src="{{ asset('js/script.js') }}"></script>
@endsection
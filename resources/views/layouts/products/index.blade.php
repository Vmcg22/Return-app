@extends("layouts.admin")

@section('titulo')
    <span> Productos </span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection

@section('contenido')
    <div class="card">
        <div class="card-body">
            <table id="dt-products" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"> Nombre </th>
                        <th class="text-center"> Descripción </th>
                        <th class="text-center"> Precio Unitario </th>
                        <th class="text-center"> Cantidad </th>
                        <th class="text-center"> Costo Total </th>
                        <th class="text-center"> Acciones </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr class="text-center">
                            <td> {{$product->name}} </td>
                            <td> {{$product->description}} </td>
                            <td> ${{$product->unit_price}} </td>
                            <td> {{$product->quantity}} </td>
                            <td> ${{$product->total_cost}} </td>
                            <td> 
                                <button type="button" class="btn btn-primary">Ver</button> 
                                <button type="button" class="btn btn-success">Detalles</button> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href=" {{asset('libs/datatables/dataTables.bootstrap4.min.css')}} ">
@endpush


@push('scripts')
    <script src=" {{asset('libs/datatables/jquery.dataTables.min.js')}} "></script>
    <script src=" {{asset('libs/datatables/dataTables.bootstrap4.min.js')}} "></script>
@endpush
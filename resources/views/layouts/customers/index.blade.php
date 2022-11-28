@extends("layouts.admin")

@section('titulo')
    <span> Customers </span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection

@section('contenido')

    @include('layouts.products.modals.create')

    <div class="card">
        <div class="card-body">
            <table id="dt-products" class="table table-striped table-bordered dts">
                <thead>
                    <tr>
                        
                        <th class="text-center"> Contact </th>
                        <th class="text-center"> Active </th>
                        <th class="text-center"> City </th>
                        <th class="text-center"> State </th>
                        <th class="text-center"> ZIP  </th>
                        <th class="text-center"> Address </th>
                        <th class="text-center"> Number </th>
                        <th class="text-center"> Type  </th>
                        <th class="text-center"> Credit Limit  </th>
                        <th class="text-center"> Acciones </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="text-center">
                            <td> {{ $customer->contact }} </td>
                            <td> {{ $customer->active }} </td>
                            <td> {{ $customer->city }} </td>
                            <td> {{ $customer->state }} </td>
                            <td> {{ $customer->zip }} </td>
                            <td> {{ $customer->address }} </td>
                            <td> {{ $customer->phone_number }} </td>
                            <td> {{ $customer->type }} </td>
                            <td> {{ $customer->credit_limit }} </td>
                            <td> 
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editarMdl">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#eliminarMdl">
                                    <i class="fas fa-trash"></i>
                                </a>
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

    @if(!$errors->isEmpty())
        @if($errors->has('post'))
            <script>
                $(function () {
                    $('#createMdl').modal('show');
                });
            </script>
        @else
            <script>
                $(function () {
                    $('#editMdl').modal('show');
                });
            </script>
        @endif
    @endif

@endpush
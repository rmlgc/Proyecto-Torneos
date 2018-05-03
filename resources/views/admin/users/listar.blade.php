
@extends('layouts.AdminLTE')

@section('content')
<div class="container-fluid ">
    <ul class="nav">
        <li class=" mr-20">




        </li>
    </ul>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(count($users) >0)
{!! count($users) !!} usuarios encontrados
@endif</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla usuarios </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form method="post" action="users-update" class="form-horizontal">
            @csrf
            <input type="submit" name="submit" value="update" class="btn" >
              <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>nº</th>
                  <th>nombre</th>
                  <th>AKA</th>
                  <th>apellido</th>
                  <th>email</th>
                  <th>es</th>
                  <th>accion</th>
                </tr>
                </thead>
                <tbody>

              @foreach($users as $key => $value)
                @if( count($users) == null )
                   <tr>
                       <td>no hay torneos creados</td>
                    </tr>
                @else


                <tr>
                                      <td>{{ ++$key }}</td>
                  <a href="admin/users/{{ $value->name }}"><td>{{ $value->name }}</td></a>
                  <td> x </td>
                  <td>{{ $value->surname }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->role }}</td>
                  <td><a href="/delete/{{ $value->slug }}">delete</a> |
                  <a href="{{ route( 'perfil', [ $value->id ] ) }}">ver</a></td>
                </tr>

                @endif
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>nº</th>
                  <th>nombre</th>
                  <th>apellido</th>
                  <th>email</th>
                  <th>rol</th>
                  <th>accion</th>
                </tr>
                </tfoot>
              </table>

</form>
            </div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <!-- SlimScroll -->
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>




    <script>
    $(function () {
        $('#example1').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
        })
    })
    </script>

@endpush

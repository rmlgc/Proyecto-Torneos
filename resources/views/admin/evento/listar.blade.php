@extends('layouts.AdminLTE')

@section('content')
<div class="container-fluid ">
    <ul class="nav">
        <li class=" mr-20">
@if(count($eventos) >0)
{!! count($eventos) !!} eventos encontrados
@else
<a href="/add-evento" class="navbar-right btn  btn-primary ">Nuevo evento</a>

@endif
        </li>
    </ul>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabla Torneos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>nº</th>
                  <th>nombre</th>
                  <th>inico</th>
                  <th>localizacion</th>
                  <th>nº participantes</th>
                  <th>accion</th>
                </tr>
                </thead>
                <tbody>
              @foreach($eventos as $key => $value)
                @if( count($eventos) == null )
                   <tr>
                       <td>no hay torneos creados</td>
                    </tr>
                @else
                <tr>
                                      <td>{{ ++$key }}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->dateIni }}</td>
                  <td>{{ $value->venue_id }}</td>
                  <td>x</td>
                  <td><a href="/delete/{{ $value->slug }}">delete</a> |
                  <a href="/admin/{{ $value->slug }}">ver</a></td>
                </tr>


                @endif
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>nº</th>
                  <th>nombre</th>
                  <th>inico</th>
                  <th>localizacion</th>
                  <th>nº participantes</th>
                  <th>accion</th>
                </tr>
                </tfoot>
              </table>
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

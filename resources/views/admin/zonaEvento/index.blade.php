@extends('layouts.AdminLTE')

@section('content')
<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Creando Zona</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/add-zona"  class="form-horizontal">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNombre" class="col-sm-2 control-label">Nombre:</label>
                  <div class="col-sm-10">
                    <input class="form-control input-sm" name="name" type="text" id="name" value="
@if (old('name'))
                        {{ old('name') }}
                    @else
{{ trim('Blanquerna') }}
@endif" placeholder="Name" required>
                  </div>
                  <label for="inputDireccion" class="col-sm-2 control-label">Direccion:</label>
                  <div class="col-sm-10">
                    <input class="form-control input-sm" name="direction" type="text" id="direction" value="@if (old('direction')) {{ old('direction') }} @else
Carrer des Caülls, 19, 07141 Marratxí, Islas Baleares, España @endif" placeholder="Direction">
                  </div>
                  <label for="inputDescripcion" class="col-sm-2 control-label">Descripcion:</label>
                  <div class="col-sm-10">
                    <input class="form-control input-sm" name="description" type="text" id="Description" value="@if (old('description')) {{ old('description') }} @else En frente del Colegio Blanquerna @endif" placeholder="Direction">
                  </div>
<!--                  <label for="inputEmail3" class="col-sm-2 control-label">ciudad:</label>
                  <div class="col-sm-10">
                    <input class="form-control input-sm" type="text" id="city" value="Es Pont d'Inca" placeholder="City">
                  </div>

                  <label for="inputEmail3" class="col-sm-2 control-label">Codigo Postal:</label>
                  <div class="col-sm-10">
                    <input class="form-control input-sm" type="text" id="CP" value="07141" placeholder="CP">
                  </div>

                    <label for="inputEmail3" class="col-sm-2 control-label">comuidad:</label>
                  <div class="col-sm-10">
                    <input class="form-control input-sm" type="text" id="CP" value="Mallorca" placeholder="CP">
                  </div>-->
                  <label for="inputLatitud" class="col-sm-2 control-label">Latitud:</label>
                  <div class="col-sm-10">
                    <input class="form-control input-sm" name="latitude" type="text" id="Latitude" value="@if (old('latitude')) {{ old('latitude') }} @else 39.604722 @endif" placeholder="Latitude">
                  </div>
                  <label for="inputLongitude" class="col-sm-2 control-label">Longitud:</label>
                  <div class="col-sm-10">
                    <input class="form-control input-sm" name="longitude" type="text" id="Longitude" value="@if (old('longitude')) {{ old('longitude') }} @else 2.695351 @endif" placeholder="Longitude">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <button type="submit" name="submit" value="add" class="btn btn-default">Cancel</button>

                <button type="submit" name="submit" class="btn btn-info pull-right">submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>



                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scriptsHead')

 <!-- daterange picker -->
 <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

@endpush

@push('scripts')
<!-- date-range-picker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<script>
  $(function () {
   //Date range as a button
   $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'este año'       : [moment().startOf('year'), moment().endOf('year')],
          'este mes'   : [moment().startOf('month'), moment().endOf('month')],
          'este trimestre': [moment().startOf('month'), moment().endOf('month').subtract(-3, 'month')],
          'siguiente año'   : [moment().startOf('year').subtract(-1, 'year'), moment().endOf('year').subtract(-1, 'year')],
          'siguiente mes'   : [moment().startOf('month').subtract(-1, 'month'), moment().endOf('month').subtract(-2, 'month')],
          'siguiente trimestre': [moment().startOf('month').subtract(-1, 'month'), moment().endOf('month').subtract(-4, 'month')],

        },
        alwaysShowCalendars: true,
        startDate: moment().subtract(5, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  })
</script>

@endpush

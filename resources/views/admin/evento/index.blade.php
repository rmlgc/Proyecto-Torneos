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
            <form method="post" action="/add-evento"  class="form-horizontal">
            @csrf
            <div class="box-header with-border">
              <h3 class="box-title">Creando evento</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="inputNombre" class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-10">
                        <input class="form-control input-sm" name="nameEvento" type="text" id="name" value=
                        @if (old('name'))
                            "{{ old('name') }}"
                        @else
                            "Fecha1"
                        @endif
                        placeholder="Name" required>
                    </div>
                    <label for="inputNombre" class="col-sm-2 control-label">Torneo:</label>
                    <select class="form-control select2 col-sm-4" name="torneo" >
                    @foreach($torneos as $key => $value)
                    <option @if($value->name == "local") selected @endif>{{ $value->name}}</option>

                    @endforeach

                </select>

                <div class="input-group date ">
                <label for="inicio" class="col-sm-3 control-label">fecha:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date" class="form-control pull-right" id="datepicker" required>
                </div></div>

                            <label>Tematica</label>
                            <select class="form-control select2 col-sm-4" name="tematica" required  multiple="multiple" data-placeholder="Select">

                            @foreach($tematicaCategory as $key => $value)

                                <option @if($value->name == "local") selected @endif>{{ $value->name}}</option>

                            @endforeach
                            </select>
                            <label>Patrones</label>
                            <select class="form-control select2 col-sm-4" name="patrones" required data-placeholder="Select">

                            @foreach($patronesCategory as $key => $value)

                                <option @if($value->name == "local") selected @endif>{{ $value->name}}</option>

                            @endforeach
                            </select>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box box-header with-border box-info">
              <h3 class="box-title">Zona</h3>
            </div>
            <div class="box-body">
            @if(count($zonas) > 0)
            <select class="form-control select2 col-sm-4" name="zona" >
                    @foreach($zonas as $key => $value)
                    <option @if($value->venue_name == "local") selected @endif>{{ $value->venue_name}}</option>

                    @endforeach

                </select>
            @else


                <div class="form-group">
                  <label for="inputNombre" class="col-sm-2 control-label">Nombre:</label>
                  <div class="col-sm-10">
                    <input class="form-control input-sm" name="zona" type="text" id="name" value=
                    @if (old('name'))
                        "{{ old('name') }}"
                    @else
                        "Blanquerna"
                    @endif
                    placeholder="Name" required>
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

                @endif
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <button type="submit" name="submit" value="add" class="btn btn-default">Cancel</button>

                @if(count($zonas) > 0)
                <button type="submit" name="submit"  value="submit" class="btn btn-info pull-right">submit</button>
                @else
                <button type="submit" name="submit" value="createZona" class="btn btn-info pull-right">submit</button>
                @endif
              </div>
              <!-- /.box-footer -->
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
    <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css') }}">

 <!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">


@endpush

@push('scriptsHead')


@endpush

@push('scripts')

<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<script>

  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2()

    //Date picker
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
      autoclose: true
    })


  })
</script>

@endpush

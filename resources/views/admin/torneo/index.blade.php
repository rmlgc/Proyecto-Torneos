@extends('layouts.AdminLTE')

@section('content')
<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Creando Torneo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="add-torneo" class="form-horizontal">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nombre:</label>
                  <div class="col-sm-10">
                    <input class=" input-sm select2" name="name" value=
                    @if(old('name'))
                        "{{old('name')}}"
                    @else
                        "Batallas UP 2018"
                    @endif
                     type="text" id="tornamen" placeholder="tournament Name" required>
                  </div>
                </div>
                <div class="form-group">
                    <div class="input-group date col-sm-5">
                        <label for="inicio" class="col-sm-3 control-label">fecha:</label>
                        <span><i class="fa fa-calendar"></i><i class="fa fa-caret-down"></i></span>
                        <div class="input-group date col-sm-2">
                            <input type="text" onclick="return false" value="" name="date" class="btn btn-default pull-left" id="daterange-btn" required>
                            </input>
                        </div>
                        <label for="promotor" class="col-sm-3 control-label">Promotor:</label>
                        <div class="input-group sponsor ">
                            <input class="form-control input-sm" name="sponsor" type="text" id="sponsor" placeholder="sponsor">
                        </div>
                        <label for="organizador" class="col-sm-3 control-label">Organizador:</label>
                        <div class="input-group host ">
                            <input class="form-control input-sm" name="host" type="text" value="Colt" id="host" placeholder="host organizer">
                        </div>
                        <div class="input-group col-sm-5">
                            <label for="free">Abierto</label>
                                <input type="radio" name="type" value="free" class="flat-red" checked>
 |
                                <input type="radio" name="type" value="private" class="flat-red">
                            <label for="private">por invitacion</label>
                        </div>
                        <label>A Nivel</label>
                <select class="form-control select2" style="width: 100%;">
                    @foreach($level as $key => $value)

                    <option @if($value->name == "local") selected @endif>{{ $value->name}}</option>

                    @endforeach

                </select>
                    </div>
                </div>
              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" value="add" class="btn btn-default">Cancel</button>
                <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
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
        timePicker: true,
        format: 'yyyy-MM-dd h:mm',
        startDate: moment().startOf('year') ,
        endDate: moment().endOf('year'),
      },
      function (start, end) {
        $('input[name="date"]').val(start.format('MM D, YYYY h:mm') + ' - ' + end.format('YYYY-mm-dd h:mm'))
      },
      function (start, end) {
      $('input[name="date"]').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(start.format('YYYY-mm-dd h:mm') + ' - ' + end.format('YYYY-mm-dd h:mm'))
      })},
      function (start, end) {
      $('input[name="date"]').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('')
      })},
    )
  })
</script>

@endpush

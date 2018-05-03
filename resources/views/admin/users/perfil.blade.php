@extends('layouts.AdminLTE')


@section('title')
{!! $title='Configuracion' !!}
@endsection
@section('content')
<div class="container-fluid ">
    <div class="row justify-content-center">




<div class="col-md-9">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Configuracion -<small> <b>Usuario:</b> {{ $user->name}} {{ $user->surname }} - <b>Email:</b> {{ $user->email }} -

              @if( !empty($aka) )
              <b>mc:</b> {{ $aka->name }} </small></h3>
              @endif
            </div>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#user" data-toggle="tab">Usuario</a></li>
              <li><a href="#competitor" data-toggle="tab">competitor</a></li>
              <li><a href="#password" data-toggle="tab">usuario y contraseña</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="user">
                <!-- Post -->
                <form class="form-horizontal" method="post" action="update-user" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name*</label>

                    <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="{{ $user->name}}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSurname" class="col-sm-2 control-label">surname</label>

                    <div class="col-sm-10">
                      <input type="text" name="surname" class="form-control" id="inputSurname" placeholder="@if( $user->surname !="" ) {{ $user->surname}} @else {{ '[ Apellido ] ' }} @endif">
                    </div>
                  </div>
                  <div class="form-group navbar-nav">

                  <div class="col-sm-4">
                    <div class="user-panel" >
                        <div class="image pull-right">
                        @if ($user->picture == null)
                            <img style='border:solid 0.1em;' src=" {{ asset('img-up/up-default.png') }}" class="img-circle" alt="User Image">
                        @else
                            <img style='border:solid 0.1em;' src=" {{ Storage::url($user->picture) }}" class="img-circle" alt="User Image">
                        @endif
                        </div>
                        <label for="InputFile" class=" control-label">icon User</label>
                    </div>
                  </div>
                     <div class="col-sm-8 justify-content-center">
                      <input type="file" name="icon" id="InputFile">


                     </div>
                  </div>
                  <div class="form-group">
                  <input type="hidden" name="named" value="{{ $user->id}}">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="submit" value="user" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
                <!-- /.post -->
              </div>

<div class="tab-pane" id="competitor">
                <!-- Post -->

                @if( $mc==null )
                <form class="form-horizontal"  method="post" action="create-aka" >
                @csrf

                @else
                <form class="form-horizontal"  method="post" action="update-user" >
                @csrf
                @endif
                  <div class="form-group">
                    <label for="inputAka" class="col-sm-2 control-label">Name(Aka)*</label>

                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputAka" placeholder="Name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="inputDescription" placeholder="Description"></textarea>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputContact" class="col-sm-2 control-label">Email contact</label>

                    <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputContact" placeholder="Email contact">
                    </div>
                  </div>
                  <div class="form-group">
                  <input type="hidden" name="named" value="{{ $user->id}}">
                    <div class="col-sm-offset-2 col-sm-10">
                    @if( $mc==null )
                    <button type="submit" name="submit" value="aka" class="btn btn-danger">Submit</button>
                      @else
                      <button type="submit" name="submit" value="competitor" class="btn btn-danger">Submit</button>
                    @endif
                    </div>
                  </div>
                </form>
                <!-- /.post -->
              </div>

              <div class="tab-pane" id="password">
                <form class="form-horizontal"  method="post" action="update-user">
                @csrf
                  <div class="form-group">
                    <label for="inputLogin" class="col-sm-2 control-label">login</label>

                    <div class="col-sm-10">
                      <input type="email" name="login" class="form-control" id="inputLogin" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword"  class="col-sm-2 control-label">pasword</label>

                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Pasword">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputRepassword" class="col-sm-2 control-label">Confirm password</label>

                    <div class="col-sm-10">
                      <input type="password" name="repassword" class="form-control" id="inputRepassword" placeholder="Confirm pasword">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="confirm" > Are you sure
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                  <input type="hidden" name="named" value="{{ $user->id}}">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="submit" value="password" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          </div>
          <!-- /.nav-tabs-custom -->
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

@extends('layouts.app')
@include('includes.hrNavbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
          <div class="col-md-12">
            <div class="panel panel-success">
              <div class="panel-heading">

              </div>
              <div class='panel-body'>
                <center>
                  <a href="/finance" class="btn btn-success btn-lg">Modul Finance</a>
                </center>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-heading">

              </div>
              <div class='panel-body'>
                <center>
                  <a href="hr" class="btn btn-primary btn-lg">Modul Human Resource</a>
                </center>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

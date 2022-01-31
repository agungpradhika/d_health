@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="{{route('nonracikan.index')}}">
                            <div class="small-box bg-info">
                              <div class="inner">
                                <h3></h3>

                                <p>Non Racikan</p>
                    
                              </div>
                              <div class="icon">
                                <i class="fas fa-tablets"></i>
                              </div>
                              
                            </div>
                        </a>
                      </div>

                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <a href="">
                            <div class="small-box bg-success">
                              <div class="inner">
                                <h3><sup style="font-size: 20px"></sup></h3>

                                <p>Racikan</p>
                              </div>
                              <div class="icon">
                                <i class="fas fa-prescription-bottle"></i>
                              </div>
                            </div>
                        </a>
                      </div>
                      <!-- ./col -->
                    </div>
                
                </div>
            </div>
        </div>
    </div>
@stop

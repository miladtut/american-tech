@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h5> شاشة ترحيبية </h5>
                </div>

                <div class="panel-body">
                    <p>
     ،                     مرحبا بك {{ Auth::user()->name }}

                    </p>

                    <div class="row">
                      
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                              <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                  
                              <div class="info-box-content">
                                <span class="info-box-text">  طلبات الاستشارات</span>
                                <span class="info-box-number">{{@$count_consultation}}<small></small></span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div>

                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                              <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                  
                              <div class="info-box-content">
                                <span class="info-box-text">  طلبات عروض الأسعار</span>
                                <span class="info-box-number">{{@$count_offer}}<small></small></span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div> 

                          
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                              <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                  
                              <div class="info-box-content">
                                <span class="info-box-text">  طلبات التوظيف للتسويق </span>
                                <span class="info-box-number">{{@$count_marketingteam}}<small></small></span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div> 


                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                              <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                  
                              <div class="info-box-content">
                                <span class="info-box-text">   الانضمام لفريق الشركة  </span>
                                <span class="info-box-number">{{@$count_team}}<small></small></span>
                              </div>
                              <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                          </div> 
                          
                    <div>
                </div>
            </div>
        </div>
    </div>
@endsection

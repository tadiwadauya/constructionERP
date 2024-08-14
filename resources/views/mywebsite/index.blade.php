   <?php
/**
 * Created by PhpStorm for wpm
 * User: Tadiwa Dauya
 * Date: 06/28/2023
 * Time: 3:33 AM
 */
?>

@extends('layouts.app')

@section('template_title')
   Website Management
@endsection

@section('template_linked_css')


@endsection
@section('content')
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             Vakai system Developed by <a href="{{ url('http://basilamark.co.zw') }}" class="m-0">Basilmark software solutions</a>
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                
                <p>Sliders</p>
              </div>
              <div class="icon">
                <i class="ion ion-image"></i>
              </div>
              <a href="{{ url('/mywebsite/sliders') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
               

                <p>About Us</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-users"></i>
              </div>
              <a href="{{ url('/mywebsite/abouts') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <p>Services</p>
              </div>
              <div class="icon">
                <i class="ion ion-Settings"></i>
              </div>
              <a href="{{ url('/mywebsite/services') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <p>WE SERVE IN</p>
              </div>
              <div class="icon">
                <i class="ion ion-building"></i>
              </div>
              <a href="{{ url('/mywebsite/serves') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">

                <p>Works/Projects</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('/mywebsite/portfolios') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: url('{{ asset('/design/dist/img/photo2.png') }}') center center;">
              <div class="inner">

                <p>Testimonials</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('/mywebsite/testimonials') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-default">
              <div class="inner">

                <p>Contacts</p>
              </div>
              <div class="icon">
                <i class="ion ion-user"></i>
              </div>
              <a href="{{ url('/contactus') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">

                <p>Quotations</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-black">
              <div class="inner">

                <p>Gallery</p>
              </div>
              <div class="icon">
                <i class="ion ion-image"></i>
              </div>
              <a href="{{ url('/mywebsite/exhibits') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

                <p>Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-building"></i>
              </div>
              <a href="{{ url('/mywebsite/posts') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>
        </div>
        
@endsection
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
   Website | slider
@endsection

@section('template_linked_css')
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">--}}

    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: 0;
        }

    </style>

@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">  
             Slider Content
    <div class="btn-group pull-right btn-group-xs">
                                <div class="btn pull-left btn-group-xs">
                                    <a class="btn btn-info  btn-block" href="#}">
                                       
                          Create slider
   
                                    </a>
                                </div>
                                     @permission('users.delete')
                                    <div class="btn pull-left btn-group-xs">
                                        <a class="btn btn-primary btn-light btn-block" href="{{ url('/users/deleted') }}">
                                            <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                            Show Deleted Users
                                        </a>
                                    </div>
                                @endpermission
                            </div>
                        </div>
                    

              
                <div class="card-body">
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                 <th>service</th>
                <th>Discription</th>
                <th>slider</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <td></td>
        <td></td>
        <td></td>

                     <td>
                        <a href="#" target="_blank"></a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-info" target="_blank">Preview Website</a>
                          <a href="#" class="btn btn-primary">Edit</a>
                        <form action="#" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
           
        </tbody>
    </table>
@endsection
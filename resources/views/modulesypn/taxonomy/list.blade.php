@extends('system::layouts.master')
   {{--header files--}}
@section('style')

   @stop
@section('script')
    <script src="/js/admin/categories.js"></script>
    @stop
{{--main--}}
@section('content')
     <div class="row">
         <div class="col-sm-12">
             <ul class="breadcrumb" >
                 <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                 <li class="active">{{'Taxonomy'}}</li>
             </ul>
             <section class="panel">
                 <header class="panel-heading">
                     {{'Location'}}
                     <span class="tools pull-right">
                        <button type="button" class="btn btn-info btn-xs delete-all"><i class="fa fa-trash-o" ></i> {{'Delete'}}</button>
                        <a href="#CategoryModalLabel" data-toggle="modal"  > <button type="button" class="btn btn-info btn-xs add-vocabulary"><i class="fa fa-plus" ></i> {{'Addnew'}}</button></a>
                     </span>
                 </header>

                <input id="_token" type="hidden" value="{{ csrf_token() }}"  >
                 <div class="panel-body">
                     <form class="form-inline" role="form" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control input-sm" name="name" id="name" value="{{isset($_GET['name'])?$_GET['name']:''}}" placeholder="{{'Name'}}">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">{{'Apply'}}</button>
                     </form>
                     <section id="unseen">
                         <table class="table table-bordered table-striped table-condensed">
                             <thead>
                             <tr>

                                 <th style="width: 10px"><input type="checkbox" class="checkall" ></th>
                                 <th>#</th>
                                 <th>{{'Name'}}</th>
                                 <th   >{{'Actions'}}</th>
                             </tr>
                             </thead>
                             <tbody>

                             <?php
                             $index = $start;
                             foreach($listdata as $v){
                             $index = $index  + 1;
                             ?>
                             <tr>
                                 <td><input type="checkbox" class="checkone" value="{{$v['id']}}" ></td>
                                 <td>{{ $index }}</td>
                                 <td><a href="/manager/taxonomy/taxonomy-item/{{$v['id']}}" >{{ $v['name'] }}</a><br><i>{{$v['description']}}</i></td>
                                 <!--<td><a href="#" >{{ $v['name'] }}</a><br><i>{{$v['description']}}</i></td>-->
                                 <td>
                                    <button title="edit"  class="btn btn-sm btn-danger edit-vocabulary " data-id = "{{$v['id']}}"><i class="fa fa-edit"></i></button>
                                    <button title="delete"  class="btn btn-sm btn-warning delete-vocabulary" data-name = "{{$v['name']}}" data-id="{{$v['id'] }}"  ><i class="fa fa-trash-o"></i></button>
                                 </td>
                             </tr>
                             <?php } ?>
                             </tbody>
                         </table>
                         <div style="float: right;" >
                             {!! $paging->render() !!}
                         </div>
                     </section>
                 </div>
             </section>
         </div>
     </div>

     <div aria-hidden="true" aria-labelledby="CategoryModalLabel" role="dialog" tabindex="-1" id="CategoryModalLabel" class="modal fade">
         <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">{{'Add Taxonomy'}}</h4>
                  </div>
                  <div class="modal-body">
                      <form method="post" id="form-vocabulary">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                              <label for="name">{{'Name'}}</label>
                              <input type="hidden" id="_id" name="_id" value="" >
                              <input type="text" class="form-control" id="name" name="name" placeholder="{{'Name'}}">
                          </div>
                          <div class="form-group">
                              <label for="description">{{'Description'}}</label>
                              <textarea class="form-control" name="description" id="description" placeholder="{{'Description'}}"></textarea>
                          </div>

                          <button type="button" id = "submit-vocabulary" class="btn btn-default">{{'Save'}}</button>
                      </form>
                  </div>
              </div>
         </div>
     </div>

  @stop


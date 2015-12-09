@extends('system::layouts.master')
{{--header files--}}
@section('style')
    <link rel="stylesheet" type="text/css" href="/js/select2/select2.css" />
@stop

@section('script')
    <script src="/js/admin/system.js"></script>
    <script src="/js/admin/categories.js"></script>


    <script src="/assets/global/plugins/select2/select2.min.js"></script>
    <script> jQuery(function () {
            jQuery("#parent-term").select2();
        })
    </script>

@stop


{{--main--}}
@section('content')
     <div class="row">
         <div class="col-sm-12">
             <ul class="breadcrumb" >
                 <li><a href="/manager/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                 <li><a href="/manager/taxonomy">{{'Category'}}</a></li>
                 <li class="active">{{$vocabulary['name']}}</li>
             </ul>
             <section class="panel">
                 <header class="panel-heading">
                     {{$vocabulary['name']}}
                     <span class="tools pull-right">
                        <button type="button" class="btn btn-info btn-xs destroy_all_taxonomyitem"><i class="fa fa-trash-o" ></i> {{'Delete'}}</button>
                        <a href="#vocabulary-term" data-toggle="modal"  > <button type="button" class="btn btn-info btn-xs add-term"><i class="fa fa-plus" ></i> {{'Addnew'}}</button></a>
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
                                 <th>{{'Actions'}}</th>
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
                                 <th><?php echo $index?></th>
                                 <td>{{ $v['name'] }}</td>
                                 <td>
                                     <button title="edit"  class="btn btn-sm btn-danger edit-vocabulary-term " data-parent = "{{$v['parent']}}" data-id = "{{$v['id']}}" ><i class="fa fa-edit"></i></button>
                                     <button title="delete"  class="btn btn-sm btn-warning delete-vocabulary-term" data-name = "{{$v['nameold']}}"    data-id="{{$v['id'] }}"  ><i class="fa fa-trash-o"></i></button>
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

     <div aria-hidden="true" aria-labelledby="vocabulary-term" role="dialog" tabindex="-1" id="vocabulary-term" class="modal fade">
         <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">{{trans('system.edit_item')}}</h4>
                  </div>
                  <div class="modal-body">

                      <form method="post" id="form-vocabulary-term">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                              <label for="name">{{trans('system.Name')}}</label>
                              <input type="hidden" id="_id" name="_id" value="" >
                              <input type="hidden" id="vid" name="vid" value="{{$vid}}" >
                              <input type="text" class="form-control" id="name" name="name" placeholder="{{'Name'}}">
                          </div>
                          <div class="form-group">
                              <label for="parent-term">{{trans('system.Parent')}}</label>
                              <select class="populate" id="parent-term" name="parent" style="width: 100%">
                                <option value="0" >{{trans('system.Select_category')}}</option>
                                @foreach($listree as $v)
                                <option value="{{$v['id']}}" >{{$v['name']}}</option>
                                @endforeach
                              </select>
                          </div>
                          <!--
                          <div class="form-group">
                              <label for="logo">{{'Logo'}}</label>
                              <div class="input-group">
                                  <input type="hidden" id="logoid" name="logoid" >
                                  <input type="text" class="form-control" id = "logourl" name="logourl">
                                  <div class="input-group-addon" onclick="CATEGORY.uploadlogo(this)" >{{trans("system.Upload")}}</div>
                              </div>
                          </div>-->
                          <button type="button" id = "submit-vocabulary-term" class="btn btn-default">{{trans("system.Save")}}</button>
                      </form>
                  </div>
              </div>
         </div>
     </div>
     {!! Utility::files() !!}
  @stop
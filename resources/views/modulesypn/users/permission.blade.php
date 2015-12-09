@extends('system::layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb" >
                <li><a href="/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                <li  class="active" >{{trans('system.permission')}}</li>
            </ul>
            <section class="panel">
                <header class="panel-heading">
                    {{trans('system.permission')}}
                    <span class="tools pull-right">
                        <a href="#myModal" data-toggle="modal"  ><button type="button"  class="btn btn-info btn-xs"><i class="fa fa-plus" ></i> {{ trans('system.addnew') }}</button></a>
                     </span>
                </header>

                <input id="_token" type="hidden" value="{{ csrf_token() }}"  >
                <div class="panel-body">
                    <form class="form-inline" role="form" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" name="name" id="name" value="{{isset($_GET['name'])?$_GET['name']:''}}" placeholder="{{trans('system.name')}}">
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">{{trans('system.apply')}}</button>
                    </form>
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <?php foreach($groups as $v){ ?>
                                <th style="width: 10px;text-align: center">{{$v['name']}}</th>
                                <?php } ?>
                                <th style="width: 100px"  >{{trans('system.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $index = $start;
                            foreach($listdata as $v){
                            $index = $index  + 1;
                            ?>
                            <tr>
                                <td>{{ $v['name'] }}({{$v['key']}})<br><i>{{$v['description']}}</i></td>
                                <?php foreach($groups as $vl){ ?>
                                <?php
                                $permission = (array)json_decode($vl['permissions']);
                                ?>
                                <td style="text-align: center" ><input class="permission-{{$v['id']}}" <?php echo  (isset($permission[$v['key']]) && $permission[$v['key']] == 1 )?'checked="checked"':'' ?> data-permission = "{{$v['id']}}"  data-group = "{{$vl['id']}}"  type="checkbox" value="1" ></td>
                                <?php } ?>
                                <td>
                                    <button class="btn btn-sm save-permission  btn-success" data-key = "{{$v['key']}}" data-name = "{{$v['name']}}" data-id="{{ $v['id'] }}"  ><i class="fa fa-save"></i></button>
                                    <button class="btn btn-sm delete-permission  btn-warning" data-name = "{{$v['name']}}" data-id="{{ $v['id'] }}"  ><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div style="float: right" >
                            @if ($paging->lastPage() > 1)
                                <ul class="pagination">
                                    <li class="{{ ($paging->currentPage() == 1) ? ' disabled' : '' }}">
                                        <a href="{{ $paging->url(1) }}">Previous</a>
                                    </li>
                                    @for ($i = 1; $i <= $paging->lastPage(); $i++)
                                        <li class="{{ ($paging->currentPage() == $i) ? ' active' : '' }}">
                                            <a href="{{ $paging->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="{{ ($paging->currentPage() == $paging->lastPage()) ? ' disabled' : '' }}">
                                        <a href="{{ $paging->url($paging->currentPage()+1) }}" >Next</a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>



    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">{{trans('system.add_permission')}}</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="form-permission" >
                    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}" >
                    <div class="form-group">
                        <label for="name">{{trans('system.name')}}</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="{{trans('system.name')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">{{trans('system.description')}}</label>
                        <textarea  class="form-control" name="description" id="description" placeholder="{{trans('system.description')}}"></textarea>
                    </div>

                    <button type="button" id = "submit-permission" class="btn btn-default">{{trans('system.save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script src="<?php echo Config::get('app.domain'); ?>/js/admin/users.js" ></script>
@stop



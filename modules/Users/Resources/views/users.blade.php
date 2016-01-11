@extends('system::layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    {{trans('system.users')}}
                    <span class="tools pull-right">
                        <button type="button" class="btn btn-warning btn-xs user-delete-multi"><i class="fa fa-trash-o" ></i> delete</button>
                        <a href="/manager/users/edit/"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-plus" ></i> add new</button></a>
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

                                <th style="width: 10px"><input type="checkbox" class="checkall" ></th>
                                <th>#</th>
                                <th>{{ trans('system.first_name') }}</th>
                                <th>{{ trans('system.last_name') }}</th>
                                <th>{{ trans('system.email') }}</th>
                                <th>{{ trans('system.status') }}</th>
                                <th>{{trans('system.actions')}}</th>
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
                                <td>{{ $v['first_name'] }}</td>
                                <td>{{ $v['last_name'] }}</td>
                                <td>{{ $v['email'] }}</td>
                                <td><input type="checkbox" data-size="mini" {{($v['activated'] == 1)?'checked="checked"':''}} data-id = "{{$v['id']}}" class="switch-mini">{{ ($v['actived']) }}</td>
                                <td>
                                    <a title="edit" class="btn btn-sm btn-success" href="/manager/users/edit/{{$v['id']}}" ><i class="fa fa-edit"></i></a>
                                    <button title="delete" class="btn btn-sm btn-warning delete-user" data-name = "{{$v['first_name']}} {{$v['last_name']}}" data-id="{{ $v['id'] }}"  ><i class="fa fa-trash-o"></i></button>
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

@stop
@section('script')
    <script src="/js/admin/users.js" ></script>
@stop



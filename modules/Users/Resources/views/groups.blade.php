@extends('system::layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    GROUPS
                    <span class="tools pull-right">
                        <button type="button" class="btn btn-info btn-xs" id = "btn-add-groups"><i class="fa fa-plus"></i> Add new</button>
                     </span>
                </header>
                <div class="panel-body">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>

                                <th>#</th>
                                <th>{{ trans('system.name')}}</th>
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
                                <td>{{ $index }}</td>
                                <td>{{ $v['name'] }}</td>
                                <td>
                                    @if($v['id']!=1)
                                        <button title="edit"  data-id = "{{$v->id}}"  class="btn btn-sm btn-success edit-groups" data-name = "{{$v->name}}" ><i class="fa fa-edit"></i></button>
                                        <button  title="delete"  class="btn btn-sm btn-warning delete-groups" data-name = "{{$v->name}}" data-id="{{$v->id }}"  ><i class="fa fa-trash-o"></i></button>
                                    @endif
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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
                    </section>
                </div>
            </section>


        </div>
    </div>


    <div aria-hidden="true" aria-labelledby="groups-users" role="dialog" tabindex="-1" id="groups-users" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">{{'Add item'}}</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="add-groups">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">{{'Name'}}</label>
                            <input type="hidden" id="_id" name="_id" value="" >
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{'Name'}}">
                        </div>
                        <button type="button" id = "save-groups-users" class="btn btn-default">{{'Save'}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
@section('script')
    <script src="<?php echo Config::get('app.domain'); ?>/js/admin/users.js" ></script>
@stop
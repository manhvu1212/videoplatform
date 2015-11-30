@extends('system::layouts.master')
@section('style')
	<link rel="stylesheet" type="text/css" href="/css/admin/home.css" />
@stop
@section('content')
	<?php $user = Sentry::getUser(); ?>
	<div class="row">
		<div class="col-sm-12">
			<section class="panel">
				<header class="panel-heading">
					<?php echo $title?>
					<span class="tools pull-right">
                        <button type="button" class="btn btn-warning btn-xs delete-multi"><i class="fa fa-trash-o" ></i> delete</button>
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
					</br>
					<section id="unseen">
						<table class="table table-bordered table-striped table-condensed">
							<thead>
							<tr>
								<th style="width: 10px"><input type="checkbox" class="checkall" ></th>
								<th>#</th>

								<th style="width: 30%">{{ trans('system.first_name') }}</th>

								<th style="width: 15%">{{ trans('system.last_name') }}</th>
								<th style="width: 15%">{{ trans('system.email') }}</th>
								<th style="width: 15%">{{ trans('system.phone') }}</th>
								<th style="width: 15%">{{ trans('system.Account_Id') }}</th>
								<!--
								<th>{{ trans('system.status') }}</th> -->
								<th>{{ trans('system.update') }}</th>
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

								<td>{{$v['first_name']}}</td>
								<td>{{$v['last_name']}}</td>
								<td>{{$v['email']}}</td>
								<td>{{$v['phone']}}</td>
								<td>{{$v['account_id']}}</td>
<!--
								<td><input type="checkbox" data-size="mini" {{(isset($v['status']) && $v['status'] == 1)?'checked="checked"':''}} data-id = "{{$v['id']}}" class="switch-mini switch-mini-product">{{ ($v['actived']) }}</td> -->
								<td><?php echo date('m/d/Y',strtotime($v['updated_at']))?></td>
								<td  align="center">

									<button title="delete" class="btn btn-sm btn-warning delete-item" data-name = "{{$v['name']}}" data-id="{{ $v['id'] }}"  ><i class="fa fa-trash-o"></i></button>
								</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
						<div style="float: right" >
							{!! $paging->render() !!}
						</div>
					</section>
				</div>
			</section>
		</div>
	</div>

@stop
@section('script')
	<script src="/js/admin/registers.js" ></script>
@stop



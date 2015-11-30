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
                        <button type="button" class="btn btn-warning btn-xs product-delete-multi"><i class="fa fa-trash-o" ></i> delete</button>
                        <a href="/manager/form/add"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-plus" ></i> add new</button></a>
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
								<th style="width: 15%">{{ trans('system.category') }}</th>
								<th style="width: 15%">{{ trans('system.title') }}</th>

								<th style="width: 15%">{{ trans('system.link') }}</th>
								<th>{{ trans('system.iframe') }}</th>
								<th>{{ trans('system.check_id') }}</th>
								<th>{{ trans('system.status') }}</th>
								<th>{{ trans('system.update') }}</th>
								<th>{{trans('system.actions')}}</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$index = $start;
							foreach($listdata as $v){
									$img = json_decode($v['image']);
							$index = $index  + 1;
							?>
							<tr>
								<td><input type="checkbox" class="checkone" value="{{$v['id']}}" ></td>
								<td>{{ $index }}</td>
								<td>
									<?php $cat = Utility::get_taxonomyitem($v['cat_id']); echo $cat['name']?>
								</td>
								<td class="edit-inline" >
									{{ $v['title'] }}
								</td>


								<td >
									{{ $v['summary'] }}
								</td>


								<td><input type="checkbox" data-size="mini" {{(isset($v['frame']) && $v['frame'] == 1)?'checked="checked"':''}} data-id = "{{$v['id']}}" class="switch_change_frame switch-mini-product">{{ ($v['actived']) }}</td>
								<td><input type="checkbox" data-size="mini" {{(isset($v['checkid']) && $v['checkid'] == 1)?'checked="checked"':''}} data-id = "{{$v['id']}}" class="switch_change_check_id switch-mini-product">{{ ($v['actived']) }}</td>
								<td><input type="checkbox" data-size="mini" {{(isset($v['status']) && $v['status'] == 1)?'checked="checked"':''}} data-id = "{{$v['id']}}" class="switch-mini switch-mini-product">{{ ($v['actived']) }}</td>
								<td><?php echo date('m/d/Y',strtotime($v['updated_at']))?></td>
								<td  align="center">

										<a title="edit" class="btn btn-sm btn-success" href="/manager/form/add/{{$v['id']}}?cat={{$v['cat_id']}}" ><i class="fa fa-edit"></i></a>

									<!--
                                    <a title="comparison" class="btn btn-sm btn-success" href="/manager/products/comparison/{{$v['_id']}}?cat={{$v['cat_id']}}" ><i class="fa fa-arrow-right"></i></a>
                                    -->
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
	<script src="/js/admin/posts.js" ></script>
	<script src="/js/select2/select2.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="/assets/admin/pages/scripts/form-validation.js"></script>
@stop



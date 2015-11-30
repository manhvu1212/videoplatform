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
                        <a href="/manager/<?php echo $type?>/add/<?php echo $type?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-plus" ></i> add new</button></a>
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
								<?php if($type!='faq'){?>
								<th style="width: 20%">{{ trans('system.image') }}</th>
								<?php } else{?>
								<th style="width: 30%">{{ trans('system.category') }}</th>
								<?php }?>
								<th style="width: 15%">{{ trans('system.title') }}</th>
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
								<?php if($type!='faq'){?>
								<td align="center">
									@if(isset($img->url) && $img->url!='')
										<img style="width: 50px" src="{{DOMAIN_IMG}}thumbs/200/200/{{$img->url}}" >
									@endif
								</td>
								<?php } else{?>
								<td>
									<?php $cat = Utility::get_taxonomyitem($v['cat_id']); echo $cat['name']?>
								</td>
								<?php } ?>
								<td class="edit-inline" >
									{{ $v['title'] }}
								</td>



								<td><input type="checkbox" data-size="mini" {{(isset($v['status']) && $v['status'] == 1)?'checked="checked"':''}} data-id = "{{$v['id']}}" class="switch-mini switch-mini-product">{{ ($v['actived']) }}</td>
								<td><?php echo date('m/d/Y',strtotime($v['updated_at']))?></td>
								<td  align="center">
									<?php if($type=='posts') {?>
									<a title="edit" class="btn btn-sm btn-success" href="/manager/posts/edit/{{$v['id']}}?cat={{$v['cat_id']}}" ><i class="fa fa-edit"></i></a>
										<?php } elseif($type=='page'){?>
									<a title="edit" class="btn btn-sm btn-success" href="/manager/page/edit/{{$v['id']}}?cat={{$v['cat_id']}}" ><i class="fa fa-edit"></i></a>
										<?php } elseif($type=='faq'){?>
										<a title="edit" class="btn btn-sm btn-success" href="/manager/faq/edit/{{$v['id']}}?cat={{$v['cat_id']}}" ><i class="fa fa-edit"></i></a>
										<?php } ?>
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
@stop



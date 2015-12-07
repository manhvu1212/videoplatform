@extends('system::layouts.master')
@section('style')
	<link rel="stylesheet" type="text/css" href="/css/admin/home.css" />
@stop
@section('content')	
<?php  $user = Sentry::getUser(); ?>
<div class="row">
	<div class="col-sm-12">
		<section class="panel">
			<header class="panel-heading">
				<span class="tools pull-right">
	                <button type="button" class="btn btn-warning btn-xs product-delete-multi"><i class="fa fa-trash-o" ></i> delete</button>
	                <a href="/manager/videos/add"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-plus" ></i> add new</button></a>
	            </span>
	        </header>
	        <input type="hidden" id="_token" value="{{ csrf_token() }}">
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
	        					<td style="width:20px"><input type="checkbox" class="checkall"></td>
	        					<td>#</td>
	        					<td style="width:45%">{{trans('system.title')}}</td>
	        					<td>{{trans('system.status')}}</td>
	        					<td>{{trans('system.update')}}</td>
	        					<td>{{trans('system.actions')}}</td>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				@foreach($videos as $k=>$video)
	        				<tr>
		        				<td style="width:20px"><input type="checkbox" class="checkone" value="{{$video->_id}}"></td>
		        				<td>{{$k+1}}</td>
		        				<td style="width:45%">{{$video->title}}</td>
		        				<td><input type="checkbox" class="switch-mini switch-mini-product" data-id="{{$video->_id}}" data-size="mini" {{(isset($video->status)&&$video->status==1)?'checked':''}}></td>
		        				<td>{{$video->updated_at}}</td>
		        				<td align="center">
		        					<a title="edit" class="btn btn-sm btn-success" href="/manager/videos/edit/{{$video->_id}}"><i class="fa fa-edit"></i></a>
		        					<button title="delete" class="btn btn-sm btn-warning delete-item" data-id="{{$video->_id}}"><i class="fa fa-trash-o"></i></button>
		        				</td>
	        				</tr>
	        				@endforeach	
	        			</tbody>
	        		</table>
	        	</section>      	
	        </div>
		</section>
		

	</div>
</div>

@stop

@section('script')
	<script src="/js/admin/videosplatform.js" ></script>
	<script src="/js/select2/select2.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="/assets/admin/pages/scripts/form-validation.js"></script>
@stop

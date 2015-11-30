@extends('system::layouts.master')
@section('style')
	<link rel="stylesheet" type="text/css" href="/js/select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="/css/admin/home.css" />
@stop
@section('script')
	<script src="/js/tinymce/tinymce.min.js" ></script>
	<script src="/js/select2/select2.js"></script>
	<script src="/js/admin/posts.js" ></script>
	<script src="/js/jquery.tmpl.min.js" ></script>
	<script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script src="/assets/admin/pages/scripts/form-validation.js"></script>
	<script type="text/javascript" src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
@stop
@section('content')
	<ul class="page-breadcrumb breadcrumb">
		<li>
			<a href="/dashboard">Home</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<a href="#">Add new</a>
		</li>
	</ul>
	<!-- END PAGE BREADCRUMB -->
	<!-- END PAGE HEADER-->
	<!-- BEGIN PAGE CONTENT-->
	<div class="row">
		<div class="col-md-12">
			<!-- BEGIN VALIDATION STATES-->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>{{trans('system.post')}}
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse" data-original-title="" title="">
						</a>
						<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
						</a>
						<a href="javascript:;" class="reload" data-original-title="" title="">
						</a>
						<a href="javascript:;" class="remove" data-original-title="" title="">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form method="POST" id="form-add" class ="form-horizontal">
						<input id="_token" type="hidden" name="_token"  value="{{ csrf_token() }}"  >
						<input id="_id" type="hidden" name="_id" value="{{isset($data['id'])?$data['id']:''}}"  >
						<input id="type" type="hidden" name="type" value="{{$type}}"  >
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3">{{ trans('system.title') }}<span class="required">*</span></label>
								<div class="col-md-4"><input type="text" class="form-control" id="title" name="title" value="{{isset($data['title'])?$data['title']:''}}"/></div>
							</div>
						</div>
						<?php if($type!='page') {?>
							<div class="form-body">
								<div class="form-group">
									<label class="control-label col-md-3">{{ trans('system.category') }}</label>
									<div class="col-md-4">
										<select id="select-category" name="cat_id" class="populate select-category" data="2" style="width: 300px" data-selectsplitter-firstselect-selector>
											<option>{{ trans('system.choice_category') }}</option>
											@foreach($list as $v)
												<option  value="{{$v['id']}}" <?php if(isset($data) && $data['cat_id']==$v['id']) echo 'selected="selected"'?> >{{$v['name']}}</option>
											@endforeach
										</select>

									</div>
								</div>
							</div>
						<?PHP } else{?>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3">{{ trans('system.choice_template') }}</label>
								<div class="col-md-4">
									<select id="select-category" name="template" class="populate select-category" data="2" style="width: 300px" data-selectsplitter-firstselect-selector>
										<option>{{ trans('system.choice_template') }}</option>
										<option {{(isset($data['template']) && $data['template']=='template_about')?'selected="selected"':''}} value="template_about" >About template</option>
										<option {{(isset($data['template']) && $data['template']=='template_service')?'selected="selected"':''}} value="template_service" >Service template</option>
										<option  {{(isset($data['template']) && $data['template']=='template_ira')?'selected="selected"':''}} value="template_ira" >Self-Directed IRA template</option>
										<option  {{(isset($data['template']) && $data['template']=='template_account_options')?'selected="selected"':''}} value="template_account_options" >Account Options template</option>
										<option  {{(isset($data['template']) && $data['template']=='template_news')?'selected="selected"':''}} value="template_news" >News template</option>
									</select>
								</div>
							</div>
						</div>
						<?php }?>
						<?php if($type!='faq') {?>
						<div class="form-group">
							<label class="control-label col-md-3">{{ trans('system.summary1') }}
							</label>
							<div class="col-md-4">
								<textarea class="form-control" style="height:150px" id="summary" name="summary">{{isset($data['summary'])?$data['summary']:''}}</textarea>
							</div>
						</div>
						<div class="form-group" id="div_img-dd" style="<?php if(!isset($data)) echo 'display:none' ?>">
							<label class="control-label col-md-3">&nbsp;</label>
							<div class="col-md-4 div_img-dd">
								<?php if(isset($data['image'])) {
								$img = json_decode($data['image']);
									if($img->url!=''){
								?>
								<img src="{{DOMAIN_IMG}}thumbs/200/200/{{$img->url}}" class="img-dd" />
								<?php }} ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">{{ trans('system.image') }}</label>
							<div class="col-md-4 input-group" style="padding:0px 15px !important;">
								<input type="hidden" id="imageid" name="imageid" >
								<input type="text" class="form-control" readonly id = "imageurl" name="imageurl" value="{{isset($img->url)?$img->url:''}}">
								<div class="input-group-addon" onclick="POST.upload_image(this)" >Upload</div>
							</div>
						</div>
						<?php }?>
						<div class="form-group">
							<label class="control-label col-md-3">{{ trans('system.Content') }}<span class="required">*</span></label>
							<div class="col-md-8">
								<textarea name="content" style="height: 300px" id="content" class="form-control content_post" >{{isset($data['content'])?$data['content']:''}}</textarea>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green" id="submit">Submit</button>
									<button type="button" class="btn default">Cancel</button>
								</div>
							</div>
						</div>
					</form>
					<!-- END FORM-->
				</div>
			</div>
			<!-- END VALIDATION STATES-->
		</div>
	</div>
	<!-- END PAGE CONTENT-->

	{!! Utility::files() !!}
@stop

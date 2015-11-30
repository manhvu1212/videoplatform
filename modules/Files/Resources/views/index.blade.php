@extends('system::layouts.master')
{{--header files--}}
@section('style')

@stop
@section('script')
	<script src="<?php echo Config::get('app.domain'); ?>/js/admin/system.js"></script>
@stop
{{--main--}}
@section('content')
	<div class="form-group">
		<label class="col-sm-3 control-label">Thumb Images:</label>
		<div class="col-sm-6">
			<div class="input-group">
				<input class="form-control" value="" id="xFilePath0" maxlength="255" name="data[Travel][thumb]" required/>
				<span onclick="BrowseServer(0);" class="input-group-addon" >Browse</span>
                <?php echo Utility::files() ?>
			</div>
		</div>
	</div>



@stop
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Tastable</title>
	<!--Core CSS -->
	<link href="/bs3/css/bootstrap.min.css" rel="stylesheet">
	<link href="/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<!-- Custom styles for this template -->
	<link href="/css/admin/popup1.css" rel="stylesheet" />
	<link href="/js/contextMenu1/src/jquery.contextMenu.css" rel="stylesheet" />
	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]>

	<script src="/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 s and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	<?php
	$setting=Utility::setting();
	$setting1=Utility::setting('file_settings');
		if(isset($setting1->content)){
			$setting1=json_decode($setting1->content);
		}
	?>
	<script>
		var SETTINGS = <?php echo isset($setting->content)?$setting->content:''?>;
		var UPLOAD = { size:<?php echo $setting1->maximum_size*1024*1024 ;?>, ext:"<?php echo $setting1->extension ?>"}
	</script>
</head>
<body>
<section id="container">
	<section id="main-content">
		<div style="display: none" >
			<input type="hidden" id = "folder_id" name="folder_id" value="<?php echo $id?>" >
		</div>
		</div>
		<div class="files-left" >
			<ul class="list-folder" >
				<li><a href="/manager/files/manager" ><i class="fa <?php echo ($id == 0)?'fa-folder-open':'fa-folder'; ?>" ></i> All</a></li>
				<?php foreach($folders as $v) { ?>
				<li class="folder-right-click" data-id = "{{(string)$v['id']}}" data-name = "<?php echo $v['name']?>" ><a href="/manager/files/manager/{{$v['id']}}" ><i class="fa <?php echo ($id == $v['id'])?'fa-folder-open':'fa-folder' ?> " ></i> <?php echo $v['name']?></a></li>
				<?php } ?>


			</ul>
			<div aria-hidden="true" aria-labelledby="form-newfolder" role="dialog" tabindex="-1" id="form-newfolder" class="modal fade bs-example-modal-sm">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
							<h4 class="modal-title">Create folder</h4>
						</div>
						<div class="modal-body">

							<form id="frform-newfolder" method="post" action="" />
							<input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}"  >
							<input type="hidden" value="" name="id" id = "_id" >
							<div class="modal-body" style="text-align: center">
								<input type="text" id="folder_name" class="form-control" name="folder_name"   >
							</div>
							</form>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" id  = "create-newfolder"  class="btn btn-primary">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="files-right">
			<div class="col-sm-12 listfile-right ">
				<div class="btn-group pull-right action-popup">
					<button type="button" class="btn btn-white btn-sm upload-photos"><i class="fa fa-upload"></i> Upload New File</button>
					<button type="button" class="btn btn-white btn-sm" onclick="window.location.reload()" ><i class="fa fa-folder-open"></i> Refresh</button>
					<form action="/manager/files/index/{{$id}}" type="post" enctype ="multipart/form-data" name = "frm1">

						<input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}"  >
					<div class="row div_search">
						<div class="col-xs-1 col-sm-1" style="margin-top: 5px;">Search</div>
						<div class="col-xs-4 col-sm-4">
							<input type="text" id="field2c" name="keyword" class="form-control input-sm" value="">
						</div>
						<div class="col-xs-1 col-sm-1"> <input type="submit" name="" value="Search" class="btn btn-success btn-info btn-sm"></div>
						<!-- Add the extra clearfix for only the required viewport -->
						<div class="clearfix visible-xs-block"></div>
					</div>
					</form>
				</div>

				<div id="gallery" class="media-gal">
					<?php foreach ($listdata as $v){ ?>
					<div class="images item " >
						<a title="{{$v['name']}} ">
							<img class="photos" data-id = "<?php echo $v['id']?>"
								 <?php if(in_array($v['extension'],array('jpg','png','gif','jpeg'))) {?>
								 src="{{ Utility::thumb($v['url'],200,200)}}"
								 <?php } else { ?>
								 <?php
								 switch($v['extension']){
									 case 'pdf':
										 $url = DOMAIN.'/js/tinymce/plugins/files/icons/pdf.png';
										 break;
									 case 'doc':
									 case 'docx':
										 $url = DOMAIN.'/js/tinymce/plugins/files/icons/doc.png';
										 break;
									 case 'xsl':
									 case 'xlsx':
										 $url = DOMAIN.'/js/tinymce/plugins/files/icons/excel.png';
										 break;
									 default:
										 $url = DOMAIN.'/js/tinymce/plugins/files/icons/file.png';
										 break;
								 }
								 ?>
								 src="<?php echo $url ?>"
								 <?php } ?>
								 alt="<?php echo $v['name']?>" />
						</a>

					</div>
					<?php } ?>
				</div>

				<div class="col-md-12 text-center clearfix paging-bottom ">
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
				</div>

				<!-- Modal -->
				<div class="modal fade" id="photo-detail" tabindex="-1" role="dialog" aria-labelledby="image-detail" aria-hidden="true">
					<div class="modal-dialog">

						<form id="form-edit-file" method="post">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Edit file</h4>
								</div>
								<input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}"  >
								<div class="modal-body row">
									<input name="id" type="hidden" id="input-photo-id"  >
									<input name="server" type="hidden" id="input-photo-server"  >
									<input name="input-extension"  type="hidden" id = "input-extension"   >
									<div class="col-md-5 col-xs-5 img-modal">
										<img id = "image_preview"  style="width: 200px;height: 200px"  src="/images/admin/noimage.jpg" alt="">
										<p class="mtop10"><strong>File Name:</strong> <span id = "photo-filename"  ></span></p>
										<p><strong>File Type:</strong> <span id="file-type" ></span></p>
									</div>
									<div class="col-md-7 col-xs-7">
										<div class="form-group">
											<label> Name</label>
											<input name = "name" id = "input-photo-filename" value="" class="form-control">
										</div>
										<div class="form-group">
											<label> Tittle Text</label>
											<input name = "title" id = "input-photo-title" value="" class="form-control">
										</div>

										<div class="form-group">
											<label> Link URL</label>
											<input name = "url" id="input-photo-link" readonly = "readonly" value="" class="form-control">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button id = "delete-media"  class="btn btn-danger" type="button">Delete</button>
									<button id = "update-media"  class="btn btn-primary" type="button">Save changes</button>
									<button id = "select-media"  class="btn btn-primary" type="button">Select</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<!-- modal -->
				<div aria-hidden="true" aria-labelledby="form-upload-photos" role="dialog" tabindex="-1" id="form-upload-photos" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
								<h4 class="modal-title">Photos</h4>
							</div>
							<div class="modal-body">

								<form action="" method="post" id="form-upload-file">
									<input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}"  >
									<div class="modal-body" style="text-align: center">
										<div class="list-process" >
										</div>
										<input type="file" id="image" name="image" style="display: none" multiple   >
									</div>
								</form>

								<div class="modal-footer">
									<span>The size of file must be less than <?php echo $setting1->maximum_size?>MB</span>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" id  = "browser-file"  class="btn btn-primary">Browser</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</section>


<script src="/js/jquery.js"></script>


<script src="/bs3/js/bootstrap.min.js"></script>
<script src="/js/ui-1.11.4/jquery-ui.js"></script>


<script src="/js/contextMenu1/src/jquery.contextMenu.js"></script>


<script src="/js/file-uploader/js/jquery.fileupload.js" ></script>
<script src="/js/file-uploader/js/jquery.iframe-transport.js" ></script>

<!--common script init for all pages-->


<script src="/js/admin/files.js"></script>
</body>
</html>

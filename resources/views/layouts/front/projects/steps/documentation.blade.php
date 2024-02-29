@extends('layouts.front.master')
@section('title', 'Documentation')

@section('content')
    <div class="breadcrumb-title-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb m-0">
						@php $projectId = base64_encode($project_id); @endphp
						<li class="breadcrumb-item"><a
							href="{{ route('design.studio', ['project_id' => base64_encode($project_id)]) }}"><svg
								width="5" height="9" viewBox="0 0 5 9" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1"
									stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
									stroke-linejoin="round" />
							</svg> Back</a>
						</li>
                    </ol>
                </div>
            </div>
            <div class="row d-lg-none mt-4">
                <div class="col-12">
                    <div class="signin-notes">Add a new project</div>
                </div>
            </div>
            <div class="row breadcrumb-title">
                <div class="col-12 col-lg-7">
                    <div class="breadcrumb-addproject-title-wrap breadcrumb-addproject-step-3">
                        <div class="section-title">Documentation</div>
                        <div class="section-subtitle d-none d-lg-block">Please upload all below documents</div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 text-end">
                    <div class="step-count">
                        <div class="step-count-title">Step 1 out of 3</div>
                        <div class="step-count-progress current-step-3">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="breadcrumb-addproject-step-1">
                        <div class="section-subtitle d-lg-none">Select your style, please be sure to check with your HOA before installation</div>
                    </div>
                    <div class="breadcrumb-addproject-title-wrap breadcrumb-addproject-step-2">
                        <div class="section-subtitle d-lg-none">Please fill out the below details</div>
                    </div>
                    <div class="breadcrumb-addproject-title-wrap breadcrumb-addproject-step-3">
                        <div class="section-subtitle d-lg-none">Please upload all below documents</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="studio-stepform-sec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="studio-stepform-wrap">
                        <form id="documentform_step3" name="documentform_step3" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="project_id" id="project_id" value="{{ $project_id }}" />
                            <div class="studio-step-3">
                                <div class="row">
									<!-- START UPLOAD YOUR DOCUMNETS -->
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-element">
												<div id="main_documents" class="upload-documents">
													<div class="drop-section text-center">
														<div class="col">
															<label for="lbl-documents">
																<div class="cloud-icon">
																	<img src="http://localhost/wroofing_laravel/public/frontend-assets/images/receive-square.svg" alt="cloud">
																</div>
																<div class="upload-img-text">Your Documents</div>
																<div class="upload-img-formate">
																	(Third party agreement, signed contract and warranty from manufacturer)
																</div>
															</label>
															<button class="file-selector">Browse Files</button>
															<input type="file" class="file-selector-input" name="documents[]" multiple onchange="previewFiles(event, 'main_documents')" />
														</div>
														<div class="col">
															<div class="drop-here">Drop Here</div>
														</div>
													</div>
													<div id="listsection" class="list-section">
														<div class="list-title">Uploaded Files</div>
														<div class="list"></div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-element">
												Insurance Documents
											</div>
										</div>
									</div>
									<!-- END UPLOAD YOUR DOCUMNETS -->

									<div class="row">
										<div class="form-group button-wrap col-md-12">
											<div class="field-wrap text-center">
												<button type="submit" class="btn btn-primary">Get started now</button>
												<!-- <a href="project-list.html" class="btn btn-primary">Get started now</a> -->
											</div>
										</div>
										<!-- <div class="backto-login text-center"><a href="javascript:void(0)"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></div> -->
										<div class="backto-login text-center"><a
											href="{{ route('design.studio', ['project_id' => base64_encode($project_id)]) }}"><svg
												width="5" height="9" viewBox="0 0 5 9" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1"
													stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10"
													stroke-linecap="round" stroke-linejoin="round" />
											</svg> Back</a>
										</div>
									</div>
                            	</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('form').on('click', '.remove-document', function(e) {
                e.preventDefault();
                var link = $(this);
                var fileInput = link.closest('.upload-img-wrap').find('input[type="file"]');
                var hiddenInput = link.closest('.upload-img-wrap').find('input[type="hidden"]');
                var project_id = $('#project_id').val();
                // alert(project_id);
                var isConfirmed = confirm('Are you sure you want to remove this document?');

                if (isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('remove.document') }}',
                        data: {
                            _token: $('input[name="_token"]').val(),
                            file: hiddenInput.val(),
                            project_id: project_id,
                        },
                        success: function(response) {
                            fileInput.val('');
                            hiddenInput.val('');
                            location.reload();
                        },
                        error: function(error) {
                            console.error('Error removing document:', error);
                        }
                    });
                }
            });
        });
    </script>
	<!-- START CSS MULTIPLE IMAGE UPLOAD -->
	<style>
	.drop-section{
		min-height: 250px;
		border: 1px dashed #A8B3E3;
		background-image: linear-gradient(180deg, white, #F1F6FF);
		/* margin: 5px 35px 35px 35px; */
		border-radius: 12px;
		position: relative;
	}
	.drop-section div.col:first-child{
		opacity: 1;
		visibility: visible;
		transition-duration: 0.2s;
		transform: scale(1);
		width: 200px;
		margin: auto;
	}
	.drop-section div.col:last-child{
		font-size: 40px;
		font-weight: 700;
		color: #c0cae1;
		position: absolute;
		top: 0px;
		bottom: 0px;
		left: 0px;
		right: 0px;
		margin: auto;
		width: 200px;
		height: 55px;
		pointer-events: none;
		opacity: 0;
		visibility: hidden;
		transform: scale(0.6);
		transition-duration: 0.2s;
	}
	/* we will use "drag-over-effect" class in js */
	.drag-over-effect div.col:first-child{
		opacity: 0;
		visibility: hidden;
		pointer-events: none;
		transform: scale(1.1);
	}
	.drag-over-effect div.col:last-child{
		opacity: 1;
		visibility: visible;
		transform: scale(1);
	}
	.drop-section .cloud-icon{
		margin-top: 25px;
		margin-bottom: 20px;
	}
	.drop-section span,
	.drop-section button{
		display: block;
		margin: auto;
		color: #707EA0;
		margin-bottom: 10px;
	}
	.drop-section button{
		color: white;
		background-color: #5874C6;
		border: none;
		outline: none;
		padding: 7px 20px;
		border-radius: 8px;
		margin-top: 20px;
		cursor: pointer;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
	}
	.drop-section input{
		display: none;
	}
	.list-section{
		display: none;
		text-align: left;
		
		padding-bottom: 20px;
	}
	.list-section .list-title{
		font-size: 0.95rem;
		color: #707EA0;
	}
	.list-section li{
		display: flex;
		margin: 15px 0px;
		padding-top: 4px;
		padding-bottom: 2px;
		border-radius: 8px;
		transition-duration: 0.2s;
	}
	.list-section li:hover{
		box-shadow: #E3EAF9 0px 0px 4px 0px, #E3EAF9 0px 12px 16px 0px;
	}
	.list-section li .col{
		flex: .1;
	}
	.list-section li .col:nth-child(1){
		flex: .15;
		text-align: center;
	}
	.list-section li .col:nth-child(2){
		flex: .75;
		text-align: left;
		font-size: 0.9rem;
		color: #3e4046;
		padding: 8px 10px;
	}
	.list-section li .col:nth-child(2) div.name{
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
		max-width: 250px;
		display: inline-block;
	}
	.list-section li .col .file-name span{
		color: #707EA0;
		float: right;
	}
	.list-section li .file-progress{
		width: 100%;
		height: 5px;
		margin-top: 8px;
		border-radius: 8px;
		background-color: #dee6fd;
	}
	.list-section li .file-progress span{
		display: block;
		width: 0%;
		height: 100%;
		border-radius: 8px;
		background-image: linear-gradient(120deg, #6b99fd, #9385ff);
		transition-duration: 0.4s;
	}
	.list-section li .col .file-size{
		font-size: 0.75rem;
		margin-top: 3px;
		color: #707EA0;
	}
	.list-section li .col svg.cross,
	.list-section li .col svg.tick{
		fill: #8694d2;
		background-color: #dee6fd;
		position: relative;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		border-radius: 50%;
	}
	.list-section li .col svg.tick{
		fill: #50a156;
		background-color: transparent;
	}
	.list-section li.complete span,
	.list-section li.complete .file-progress,
	.list-section li.complete svg.cross{
		display: none;
	}
	.list-section li.in-prog .file-size,
	.list-section li.in-prog svg.tick{
		/* display: none; */
	}
	</style>
	<!-- END CSS MULTIPLE IMAGE UPLOAD -->
	<script>
		const fileSelector = document.querySelector('.file-selector');
		const fileSelectorInput = document.querySelector('.file-selector-input');
		jQuery(document).ready(function() {
			$('.file-selector').on('click', function(event) {
				event.preventDefault();
				// Additional handling if needed
				jQuery(fileSelectorInput).click();
			});
		});

		function previewFiles(event, sectionId) {
			// var filePreview = document.getElementById('listsection');
			var filePreview = $('#' + sectionId + ' .listsection');
			jQuery(filePreview).show();
			var fileInfo = $('#' + sectionId + ' .listsection');
			filePreview.html('');
    		fileInfo.html('');
			var files = event.target.files;

			for (let i = 0; i < files.length; i++) { // Changed var to let
				let file = files[i]; // Changed var to let
				let reader = new FileReader();
				reader.onload = (function(file) {
					return function(e) {
						var fileItem = $('<div>').addClass('fileInfoItem');
						fileItem.className = 'fileInfoItem';

						var li = $('<li>').addClass('in-prog').html(`
							<div class="col">
								<img src="{{URL('/')}}/icons/${iconSelector(file.type)}" alt="">
							</div>
							<div class="col">
								<div class="file-name">
									<div class="name">${file.name}</div>
								</div>
								<div class="file-size">${(file.size/(1024*1024)).toFixed(2)} MB</div>
							</div>
							<div class="col">
								<svg xmlns="http://www.w3.org/2000/svg" class="tick" height="20" width="20"><path d="m8.229 14.438-3.896-3.917 1.438-1.438 2.458 2.459 6-6L15.667 7Z"/></svg>
							</div>
						`);
							
						fileItem.append(li);
						fileInfo.append(fileItem);
					};
				})(file);
				reader.readAsDataURL(file);
			}
		}

		// find icon for file
		function iconSelector(type){
			var splitType = (type.split('/')[0] == 'application') ? type.split('/')[1] : type.split('/')[0];
			return splitType + '.png'
		}

		function formatBytes(bytes, decimals = 2) {
			if (bytes === 0) return '0 Bytes';
			const k = 1024;
			const dm = decimals < 0 ? 0 : decimals;
			const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
			const i = Math.floor(Math.log(bytes) / Math.log(k));
			return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
		}
	</script>
@endsection

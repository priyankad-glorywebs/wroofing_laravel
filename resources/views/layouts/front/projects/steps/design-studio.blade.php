@extends('layouts.front.master')
@section('title', 'Design Studio')
 
@section('css')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style>
	/* #image-upload{
		border-radius: 7px;
    border: 1px dashed rgba(10, 132, 255, 0.50);
    background: #F5FBFF;
    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.25);
    padding: 30px;
    cursor: pointer;
	} */

	.custom-video {
    /* Add your custom styles for video display here */
    max-width: 150px;
    height: auto;
    /* Add any other styles as needed */
}

	</style>
@endsection
@section('content')
<!-- Add Plyr styles and script -->
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.4/plyr.css" />
<script src="https://cdn.plyr.io/3.6.4/plyr.js"></script>

<div class="breadcrumb-title-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{ route('general.info',['project_id' => $project_id])}}"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></li>
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
					<div class="breadcrumb-addproject-step-1">
						<div class="section-title">Design Studio</div>
						<div class="section-subtitle d-none d-lg-block">Select your style, please be sure to check with your HOA before installation</div>
					</div>
					<!-- <div class="breadcrumb-addproject-title-wrap breadcrumb-addproject-step-2">
						<div class="section-title">General Information</div>
						<div class="section-subtitle d-none d-lg-block">Please fill out the below details</div>
					</div>
					<div class="breadcrumb-addproject-title-wrap breadcrumb-addproject-step-3">
						<div class="section-title">Documentation</div>
						<div class="section-subtitle d-none d-lg-block">Please upload all below documents</div>
					</div> -->
				</div>
				<div class="col-12 col-lg-5 text-end">
					<div class="step-count">
						<div class="step-count-title">Step 1 out of 2</div>
						<div class="step-count-progress current-step-2">
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
<?php
if(isset($projectId)){
	// dd($project_id);
	$data = \App\Models\Project::where('id',$projectId)->first();
}

?>


	<section class="studio-stepform-sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="studio-stepform-wrap">
						{{--$project_id--}}
						{{--<form id="design_studio_step1" enctype="multipart/form-data" method="post" name="design_studio_step1">
								@csrf
								<input type="hidden" name="project_id" value="{{$project_id}}" id="project_id">
							<div class="studio-step-1">
								<div class="row">
									<div class="form-group col-12">
										<div class="field-wrap">
											<div class="form-element">
												<!-- <div class="upload-img-wrap">
													<input id="uploadimage" type="file" name="project_image" accept="image/jpg, image/jpeg, image/png">
													<label for="uploadimage">
														<div class="upload-img-icon">
															 @if(!isset($data))
															<img src="{{asset('frontend-assets/images/img-icon.svg')}}" alt="img-icon" width="30" height="30">
															@else
															<img src="{{ asset('storage/'.$data->project_image) }}" alt="img-icon" width="30" height="30">
															@endif 
														</div>
														<div class="upload-img-text">Upload your roof photos and Videos</div>
														<div class="upload-img-formate">(PNG or JPGE file accepted)</div>
													</label>
												</div> -->
												<div class="upload-img-wrap">
												<input id="uploadimage" type="file" name="project_image" accept="image/jpg, image/jpeg, image/png">
												<label for="uploadimage">
													<div class="upload-img-icon">
														@if(isset($data->project_image))
															<img src="{{ asset('storage/'.$data->project_image) }}" alt="img-icon" width="30" height="30">
														@else
															<img src="{{ asset('frontend-assets/images/img-icon.svg') }}" alt="img-icon" width="30" height="30">
														@endif 
													</div>
													<div class="upload-img-text">Upload your roof photos and Videos</div>
													<div class="upload-img-formate">(PNG or JPGE file accepted)</div>
												</label>
											</div>

											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-6">
										<div class="field-wrap">
											<div class="form-element">
												<div class="upload-studio-img-item">
													<input id="uploadstudioimg1" type="file"  name="roofandgutterdesign" accept="image/jpg, image/jpeg, image/png">
													<label for="uploadstudioimg1">
														<div class="upload-studio-img-icon">
														@if(!isset($data->roofandgutterdesign))	
														<img class="d-none d-lg-block" src="{{asset('frontend-assets/images/upload-img.png')}}" alt="img-icon" width="130" height="100">
														<img class="d-lg-none" src="{{asset('frontend-assets/images/upload-img-1.png')}}" alt="img-icon" width="157" height="145">
														@else
														<img class="" src="{{asset('storage/'.$data->roofandgutterdesign)}}" alt="img-icon" width="157" height="145">

														@endif
														</div>
														<div class="upload-studio-img-text-wrap d-flex align-items-center justify-content-between">
															<div class="upload-studio-img-text">Roof and gutter designer</div>
															<div class="upload-studio-img-text-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
														</div>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group col-6">
										<div class="field-wrap">
											<div class="form-element">
												<div class="upload-studio-img-item">
													<input id="uploadstudioimg1" type="file" name="rooftypeandrating" accept="image/jpg, image/jpeg, image/png">
													<label for="uploadstudioimg1">
														<div class="upload-studio-img-icon">
														@if(!isset($data->rooftypeandrating))	
														<img class="d-none d-lg-block" src="{{asset('frontend-assets/images/upload-img.png')}}" alt="img-icon" width="130" height="100">
															<img class="d-lg-none" src="{{asset('frontend-assets/images/upload-img-1.png')}}" alt="img-icon" width="157" height="145">
														@else
														<img class="" src="{{asset('storage/'.$data->rooftypeandrating)}}" alt="img-icon" width="157" height="145">
														@endif
														</div>
														<div class="upload-studio-img-text-wrap d-flex align-items-center justify-content-between">
															<div class="upload-studio-img-text">Roof types and ratings</div>
															<div class="upload-studio-img-text-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
														</div>
													</label>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group col-6">
										<div class="field-wrap">
											<div class="form-element">
												<div class="upload-studio-img-item">
													<input id="uploadstudioimg1" type="file" name="guttertypeaccessories" accept="image/jpg, image/jpeg, image/png">
													<label for="uploadstudioimg1">
														<div class="upload-studio-img-icon">
															@if(!isset($data->guttertypeaccessories))
															<img class="d-none d-lg-block" src="{{asset('frontend-assets/images/upload-img.png')}}" alt="img-icon" width="130" height="100">
															<img class="d-lg-none" src="{{asset('frontend-assets/images/upload-img-1.png')}}" alt="img-icon" width="157" height="145">
															@else
															<img class="" src="{{asset('storage/'.$data->guttertypeaccessories)}}" alt="img-icon" width="157" height="145">
															@endif
														</div>
														<div class="upload-studio-img-text-wrap d-flex align-items-center justify-content-between">
															<div class="upload-studio-img-text">Gutter types and accessories</div>
															<div class="upload-studio-img-text-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
														</div>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group col-6">
										<div class="field-wrap">
											<div class="form-element">
												<div class="upload-studio-img-item">
													<input id="uploadstudioimg1" type="file" name="guttertypeaccessories1" accept="image/jpg, image/jpeg, image/png">
													<label for="uploadstudioimg1">
														<div class="upload-studio-img-icon">
														@if(!isset($data->guttertypeaccessories1))		
														<img class="d-none d-lg-block" src="{{asset('frontend-assets/images/upload-img.png')}}" alt="img-icon" width="130" height="100">
															<img class="d-lg-none" src="{{asset('frontend-assets/images/upload-img-1.png')}}" alt="img-icon" width="157" height="145">
															@else
															<img class="" src="{{asset('storage/'.$data->guttertypeaccessories1)}}" alt="img-icon" width="157" height="145">
														
														@endif
														</div>
														<div class="upload-studio-img-text-wrap d-flex align-items-center justify-content-between">
														
															<div class="upload-studio-img-text">Gutter types and accessories</div>
															<div class="upload-studio-img-text-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
														
														</div>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group button-wrap col-md-12">
										<div class="field-wrap text-center">
											<button type="submit" class="btn btn-primary btn-studio-step-1">Submit and continue</button>
										</div>
									</div>
									<div class="backto-login text-center"><a href="#"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></div>
								</div>
							</div>
						</form>--}}

							{{--dropzone--}}

					{{--<form id="my-dropzone" enctype="multipart/form-data" class="dropzone" method="post" name="design_studio_step1">
					<input type="hidden" name="project_id" value="{{$project_id}}" id="project_id">

													@csrf
												<button type="button">Submit and continue</button>

											</form>--}}

				{{--<form name="dropzoneForm" class="dropzone" enctype="multipart/form-data" action="{{route('design.studio.post', ['project_id' => $project_id])}}">
			@csrf		
			</form>
					<div align="center">
						<br/>
					<button type="submit" id="submit-all" class="btn btn-primary btn-studio-step-1">Submit and continue</button>
														</div>
--}}
<form method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
  <input type="hidden" name="project_id" value="{{$project_id}}" id="project_id"> @csrf <div></div>
</form>
<!-- <span id="errorMessage" style="color: red;"></span> -->
<span id="error-message" style="color: red;"></span>


<div id="uploaded-images"> <?php
	$projectData = \App\Models\Project::findOrFail(base64_decode($project_id));
    $imageArray = json_decode($projectData->project_image, true);
?> 
  {{-- <div id="existing-images">
		@if (is_array($imageArray)) @foreach ($imageArray as $image) 
		<img src="{{ asset('storage/project_images/' . $image) }}" alt="Image"> 
		@endforeach @else <p>No images found</p> 
		@endif 
	</div>--}}
</div>
<br />
<br />
<div class="row">
			<div class="form-group col-6">
				<div class="field-wrap">
					<div class="form-element">
						<div class="upload-studio-img-item">
							<input id="uploadstudioimg1" type="file"  name="roofandgutterdesign" accept="image/jpg, image/jpeg, image/png">
							<label for="uploadstudioimg1">
								<div class="upload-studio-img-icon">
								@if(!isset($data->roofandgutterdesign))	
								<img class="d-none d-lg-block" src="{{asset('frontend-assets/images/upload-img.png')}}" alt="img-icon" width="130" height="100">
								<img class="d-lg-none" src="{{asset('frontend-assets/images/upload-img-1.png')}}" alt="img-icon" width="157" height="145">
								@else
								<img class="" src="{{asset('storage/'.$data->roofandgutterdesign)}}" alt="img-icon" width="157" height="145">

								@endif
								</div>
								<div class="upload-studio-img-text-wrap d-flex align-items-center justify-content-between">
									<div class="upload-studio-img-text">Roof and gutter designer</div>
									<div class="upload-studio-img-text-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
								</div>
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group col-6">
				<div class="field-wrap">
					<div class="form-element">
						<div class="upload-studio-img-item">
							<input id="uploadstudioimg1" type="file" name="rooftypeandrating" accept="image/jpg, image/jpeg, image/png" multiple>
							<label for="uploadstudioimg1">
								<div class="upload-studio-img-icon">
								@if(!isset($data->rooftypeandrating))	
								<img class="d-none d-lg-block" src="{{asset('frontend-assets/images/upload-img.png')}}" alt="img-icon" width="130" height="100">
									<img class="d-lg-none" src="{{asset('frontend-assets/images/upload-img-1.png')}}" alt="img-icon" width="157" height="145">
								@else
								<img class="" src="{{asset('storage/'.$data->rooftypeandrating)}}" alt="img-icon" width="157" height="145">
								@endif
								</div>
								<div class="upload-studio-img-text-wrap d-flex align-items-center justify-content-between">
									<div class="upload-studio-img-text">Roof types and ratings</div>
									<div class="upload-studio-img-text-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
								</div>
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group col-6">
				<div class="field-wrap">
					<div class="form-element">
						<div class="upload-studio-img-item">
							<input id="uploadstudioimg1" type="file" name="guttertypeaccessories" accept="image/jpg, image/jpeg, image/png">
							<label for="uploadstudioimg1">
								<div class="upload-studio-img-icon">
									@if(!isset($data->guttertypeaccessories))
									<img class="d-none d-lg-block" src="{{asset('frontend-assets/images/upload-img.png')}}" alt="img-icon" width="130" height="100">
									<img class="d-lg-none" src="{{asset('frontend-assets/images/upload-img-1.png')}}" alt="img-icon" width="157" height="145">
									@else
									<img class="" src="{{asset('storage/'.$data->guttertypeaccessories)}}" alt="img-icon" width="157" height="145">
									@endif
								</div>
								<div class="upload-studio-img-text-wrap d-flex align-items-center justify-content-between">
									<div class="upload-studio-img-text">Gutter types and accessories</div>
									<div class="upload-studio-img-text-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
								</div>
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group col-6">
				<div class="field-wrap">
					<div class="form-element">
						<div class="upload-studio-img-item">
							<input id="uploadstudioimg1" type="file" name="guttertypeaccessories1" accept="image/jpg, image/jpeg, image/png">
							<label for="uploadstudioimg1">
								<div class="upload-studio-img-icon">
								@if(!isset($data->guttertypeaccessories1))		
								<img class="d-none d-lg-block" src="{{asset('frontend-assets/images/upload-img.png')}}" alt="img-icon" width="130" height="100">
									<img class="d-lg-none" src="{{asset('frontend-assets/images/upload-img-1.png')}}" alt="img-icon" width="157" height="145">
									@else
									<img class="" src="{{asset('storage/'.$data->guttertypeaccessories1)}}" alt="img-icon" width="157" height="145">
								
								@endif
								</div>
								<div class="upload-studio-img-text-wrap d-flex align-items-center justify-content-between">
								
									<div class="upload-studio-img-text">Gutter types and accessories</div>
									<div class="upload-studio-img-text-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
								
								</div>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
<br />
<div align="center">
  <button type="submit" align="center" id="submit-all" class="btn btn-primary btn-studio-step-1">Submit and continue</button>
<br/><br/>
  <div class="backto-login text-center"><a href="{{ route('general.info',['project_id' => $project_id])}}"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></div>

</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection

	@section('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


<script type="text/javascript">
Dropzone.autoDiscover = false;

$(document).ready(function () {
    var project_id = $('#project_id').val();

    // Initialize Dropzone
    var dropzone = new Dropzone('#image-upload', {
        thumbnailWidth: 200,
        url: "{{ route('test') }}",
        maxFilesize: 20,
		// createImageThumbnails:true,
        addRemoveLinks: true, 
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4",
        dictRemoveFile: "Remove file",
		uploadMultiple: true,
        init: function () {
            loadExistingImages(this);

            this.on("removedfile", function (file) {
                if (confirm("Are you sure you want to delete this image?")) {
                    var fileName = file.name;
                    removeImageFromServer(fileName);
                }
            });
        }
    });

    $('#submit-all').click(function () {
        var files = dropzone.getAcceptedFiles();
          // Check if no files are selected
		//   if (files.length === 0 || existingImages.length === 0) {
        //     alert("Please select at least one image before submitting.");
        //     return;
        // }

		var formData = new FormData();


        for (var i = 0; i < files.length; i++) {
            formData.append('file[]', files[i]);
        }

        var existingImages = <?php echo json_encode($imageArray); ?> || [];
        for (var i = 0; i < existingImages.length; i++) {
            formData.append('existing_images[]', existingImages[i]);
        }


		if (files.length === 0 && existingImages.length === 0) {
        displayErrorMessage("Please select at least one image before submitting.");
        return;
    }
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            type: 'POST',
            url: "{{ route('design.studio.post', ['project_id' => '__project_id__']) }}".replace('__project_id__', project_id),
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                var project_id = response.project_id;

                window.location.href = "{{ route('documentation', ['project_id' => '__project_id__']) }}".replace('__project_id__', project_id);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

		function loadExistingImages(dropzoneInstance) {
			var existingImages = <?php echo json_encode($imageArray); ?> || [];

			if (existingImages.length > 0) {
				for (var i = 0; i < existingImages.length; i++) {
					var file = {
						name: existingImages[i],
						size: 12345, 
						accepted: true,
						kind: 'image',
		                dataURL: "{{ asset('storage/project_images/') }}" + '/' + existingImages[i]
					};
					dropzoneInstance.emit('addedfile', file);
					$('.dz-progress').addClass('d-none');
					dropzoneInstance.emit('thumbnail', file, "{{ asset('storage/project_images/') }}" + '/' + existingImages[i]);
				}
			}
		}


		// function loadExistingImages(dropzoneInstance) {
		//     var existingImages = <?php //echo json_encode($imageArray); ?> || [];

		//     if (existingImages.length > 0) {
		//         for (var i = 0; i < existingImages.length; i++) {
		//             var fileExtension = existingImages[i].split('.').pop().toLowerCase();
		//             var isVideo = ['mp4'].indexOf(fileExtension) > -1;

		//             var file = {
		//                 name: existingImages[i],
		//                 size: 12345,
		//                 accepted: true,
		//                 kind: isVideo ? 'video' : 'image',
		//                 dataURL: "{{ asset('storage/project_images/') }}" + '/' + existingImages[i]
		//             };

		//             dropzoneInstance.emit('addedfile', file);
		//             $('.dz-progress').addClass('d-none');

		//             if (isVideo) {
		//                 // Display video tag for .mp4 files
		//                 var videoContainer = document.createElement('div');
		//                 videoContainer.classList.add('video-container');
		//                 dropzoneInstance.element.appendChild(videoContainer);

		//                 videoContainer.innerHTML = '<video class="custom-video" controls><source src="' + file.dataURL + '" type="video/mp4"></video>';
		//             } else {
		//                 // Display image preview for other file types
		//                 dropzoneInstance.emit('thumbnail', file, file.dataURL);
		//             }
		//         }
		//     }
		// }




    function removeImageFromServer(fileName) {
        $.ajax({
            type: 'POST',
            url: "{{ route('remove.image') }}",
            data: { file_name: fileName, project_id: project_id, _token: '{{ csrf_token() }}' },
            success: function (response) {
                // console.log(response); 
            },
            error: function (error) {
                // console.log(error); 
            }
        });
    }

	function displayErrorMessage(message) {
		$('#error-message').text(message);

}

});

</script>
@endsection

@extends('layouts.front.master')
@section('title', 'Design Studio')
 
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script> -->

<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> -->
<style>
	/* .contractor-sec .project-detail-tabs .project-detail-photos-item-img {height:100%;} */
     /* img {height: 100%; width: 100%; object-fit: cover; object-position: center center;}
.image-gallery-popup, 
 .video_container,
	.video {width: 100%; height: 100%;
	}
	 .lightbox {height:200px;}
	video {background-color:#000;}
	 */
    /* .contractor-sec{padding :14px 0;} */

	.design-studio-img-items .lightbox{
		width:100%;
		height:100%;
	}

.btn-gallery-filter{border-radius: 50px;
    background-color: #EFEFEF;
    font-size: 14px;
    color: #48484A;
    padding: 10px 15px;
    border: none;
    box-shadow: none;
    margin-right: 10px;
}
.design-studio-img-items {
    background-color: #fff;
    border-radius: 10px;
    filter: drop-shadow(0px 0px 4px rgba(0, 0, 0, 0.15));
    display: inline-block;
    margin: 0 10px 10px 0;
	width: 150px;
    height: 150px;
	overflow: hidden;
}
.design-studio-img-items img {
	object-fit: cover;
    object-position: center center;
    width: 100%;
    height: 100%;
}
.remove-img {
	border: none;
    box-shadow: none;
    background: #0A84FF;
    opacity: 1;
    display: inline-block;
    font-size: 10px;
    color: #fff;
    border-radius: 50px;
    max-width: 20px;
    max-height: 20px;
    line-height: 1;
    text-align: center;
    position: absolute;
    top: 5px;
    right: 5px;
	width:20px;
	height:20px;
}
.image-upload-time {
	position: absolute;
    bottom: 0;
    width: 100%;
    left: 0;
    background-color: rgba(255, 255, 255, .6);
    padding: 3px 5px;
    font-size: 12px;
    font-weight: 500;
}
.studio-stepform-wrap h6 {
	margin-top: 15px;
    margin-bottom: 15px;
    font-size: 16px;
    border-bottom: 1px solid #E0E0E0;
    padding-bottom: 10px;
}
#image-upload {
	width: 100%;
    text-align: center;
    border-radius: 7px;
    border: 1px dashed rgba(10, 132, 255, 0.50);
    background: #F5FBFF;
    box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.25);
    padding: 30px;
    cursor: pointer;
}

	</style>

<link rel="stylesheet" href="https://cdn.plyr.io/3.6.4/plyr.css" />
@endsection
@section('content')
<!-- Add Plyr styles and script -->

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
						<!-- <div class="section-subtitle d-none d-lg-block">Select your style, please be sure to check with your HOA before installation</div> -->
						<div class="mt-3">
							<a href="{{route('general.info', ['project_id' => $project_id])}}" ><button class="btn-gallery-filter" >General Info</button></a>
							<a class="project-list-item-link" href="{{ route('design.studio', ['project_id' => $project_id]) }}"><button class="btn-gallery-filter">Design studio</button></a>
							<a class="project-list-item-link" href="{{route('documentation', ['project_id' => $project_id])}}"><button class="btn-gallery-filter">Documents</button></a>
							<a class="project-list-item-link" href="{{route('contractor.list')}}"><button class="btn-gallery-filter">Contractor Portal</button></a>
						</div>
                </div>
					
				</div>
				<div class="col-12 col-lg-5 text-end">
					{{--<div class="step-count">
						<div class="step-count-title">Step 1 out of 2</div>
						<div class="step-count-progress current-step-2">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>--}}
                    <!-- <button class="btn-primary btn-sm" id="add-designstudio">Add</button> -->
                    <a class="btn-primary mt-3" href="#" data-bs-toggle="modal" data-bs-target="#sendquotepopup"><img src="{{asset('frontend-assets/images/upload_photos.webp')}}" style="width:30px;"/>Add</a>



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
	$data = \App\Models\Project::where('id',$projectId)->first();
}

?>



	<section class="studio-stepform-sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
				<?php
	$projectImageData = \App\Models\ProjectImagesData::where('project_id',base64_decode($project_id))
	->orderBy('date', 'desc')
	->get();
	$groupedData = $projectImageData->groupBy('date');
?>
					
						<div class="row">
								<div class="col-12">
									<form id="filterForm" action="" method="get">
											@csrf
											<div class="row">
											
											<div class="col-md-3">
												<label for="design-filter">To Date:</label>
												<input type="text" id="design-filter_todate" name="design-filter" placeholder="Select Date" required>
											</div>
											<div class="col-md-3">
												<label for="design-filter">From Date:</label>
												<input type="text" id="design-filter_fromdate" name="design-filter" placeholder="Select Date" required>
											</div>
											<div class="col-md-2">
												<br/>
												<input type="button" class="btn-primary" value="Filter" id="dsfilterButton">
											</div>
											<div class="col-md-2">
												<br/>
												<input type="button" class="btn-primary" value="Reset Filter" id="dsresetFilterButton">
											</div>
		                                       <div class="col-md-1 col-sm-2 text-end">
												<br/>
											</div>
										</div>
										<br/>
									</form>
							    <div>
							</div>

<div class="studio-stepform-wrap" id="testData">
						 	@if($groupedData)
							@foreach($groupedData as $date => $mediaItems)
							<h6>{{ $date }}</h6>
							@foreach($mediaItems as $mediaItem)
							@if($mediaItem->media_type == 'image') 
								<div class="design-studio-img-items gallery_container">
									<button type="button" class="remove-img" data-media-item-id="{{ $mediaItem->id }}">X</button>
									<a class="lightbox" href="{{ asset('storage/project_images/'.$mediaItem->project_image)  }}">
									<img src="{{ asset('storage/project_images/'.$mediaItem->project_image)  }}" alt="Image">
									</a>
									<span class="image-upload-time">{{$mediaItem->time}}</span>
								</div>
								@elseif($mediaItem->media_type == 'video')
								<!-- <div class="video-container"> -->
								<div class="design-studio-img-items video-container">
									<button type="button" class="remove-img" data-media-item-id="{{ $mediaItem->id }}">X</button>

									<a class="image-gallery-popup video_model " href="{{ asset('storage/project_images/'.$mediaItem->project_image) }}">
										<video width="150" height="150" controls>
											<source src="{{ asset('storage/project_images/'.$mediaItem->project_image) }}" type="video/mp4">
											Your browser does not support the video tag.
										</video>
									</a>
									<span class="image-upload-time">{{$mediaItem->time}}</span>
								</div>	
							@endif 
								<!-- </div> -->
								@endforeach
								@endforeach
							@endif
								{{--<button type="submit" id="submit-all" class="btn btn-primary btn-studio-step-1">Submit and continue</button>--}}
							</div>

					
			</div>
		</div>
	</div>
</section>


    <!-- Quote Modal -->
	<!-- <div class="modal fade sendquotepopup" id="sendquotepopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabeltitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title" id="staticBackdropLabeltitle">Design Studio</div>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
				</div>
				<div class="modal-body">
					<form id="addproject" action="thankyou.html" novalidate="novalidate">
						<div class="row">
							<div class="form-group col-12 col-md-6">
							<form method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
				<input type="hidden" name="project_id" value="{{$project_id}}" id="project_id"> 
				@csrf <div></div>
				</form>
				 <span id="errorMessage" style="color: red;"></span> 
				<span id="error-message" style="color: red;"></span>


				<div id="uploaded-images"> <?php
					//$projectData = \App\Models\Project::findOrFail(base64_decode($project_id));
					//$imageArray = json_decode($projectData->project_image, true);
				?> 
				</div>
				<br />
				<br />
			</div>
							
						</div>
						<div class="row justify-content-center">
							<div class="form-group button-wrap col-md-5">
								<div class="field-wrap text-center">
								<button type="submit" align="center" id="submit-all" class="btn btn-primary btn-studio-step-1">Submit and continue</button>

									 <button type="submit" class="btn btn-primary d-block w-100">Submit and continue</button> 
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> -->

<!-- Quote Modal -->
<div class="modal fade sendquotepopup" id="sendquotepopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabeltitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="staticBackdropLabeltitle">Design Studio</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
			<form method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
					
                    <!-- Other form fields... -->
					<div class="row">
                        <div class="form-group col-12 col-md-12">
                            <!-- Move the image-upload form outside of the main form -->
                            <!-- <div id="image-upload" class="dropzone"> -->
                                <input type="hidden" name="project_id" value="{{$project_id}}" id="project_id">
                                @csrf
                            </div>
                        </div>
						</form>
                            <span id="error-message" style="color: red;"></span>
                            <div id="uploaded-images">
                                <?php
                                $projectData = \App\Models\Project::findOrFail(base64_decode($project_id));
                                $imageArray = json_decode($projectData->project_image, true);
                                ?>
						     </div>
                            <br />
                            <br />
                        </div>
                    <!-- </div> -->

                    <!-- Other form fields... -->
					 <div class="row justify-content-center">
                        <div class="form-group button-wrap col-md-5">
                            <div class="field-wrap text-center">
                                <button type="submit" align="center" id="submit-all" class="btn btn-primary btn-studio-step-1">Submit and continue</button>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<!-- Add this script to initialize Dropzone -->

<script>

/* Video Popup*/
jQuery(document).ready(function ($) {
  // Define App Namespace
  var popup = {
    // Initializer
    init: function() {
      popup.popupVideo();
    },
    popupVideo : function() {

    $('.video_model').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    gallery: {
          enabled:true
        }
  });

/* Image Popup*/ 
 $('.gallery_container').magnificPopup({
      delegate: 'a',
    type: 'image',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    gallery: {
          enabled:true
        }
  });

   }
  };
  popup.init($);
});


Dropzone.autoDiscover = false;



$(document).ready(function () {

    var project_id = $('#project_id').val();
	var csrfToken = $('meta[name="csrf-token"]').attr('content');
 
	// Initialize Dropzone
		var dropzone = new Dropzone('#image-upload', {
			thumbnailWidth: 200,
			url: "{{ route('test') }}",
			maxFilesize: 200,
			// createImageThumbnails:true,
			addRemoveLinks: true, 
			acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4",
			dictRemoveFile: "Remove file",
			uploadMultiple: true,
			headers: {
					'X-CSRF-TOKEN': csrfToken
				},

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
			console.log(files);
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
					console.log(response.designstudio);
					$('#sendquotepopup').modal('hide');
				    $('#testData').html(response.designstudio);
					// window.location.href = "{{ route('documentation', ['project_id' => '__project_id__']) }}".replace('__project_id__', project_id);
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


	

		$('.remove-img').on('click', function (e) {
			e.preventDefault();
    	var project_id = $('#project_id').val();
		var file = $(this).data('media-item-id'); 
		console.log(file);
		currentButton = $(this);
        var isConfirmed = confirm('Are you sure you want to remove this file?');

            if (isConfirmed) {
			$.ajax({
           // url: '/delete-image/' + project_id + '/' + file,
		   url: "{{ route('delete.image.designstudio', ['project_id' => ':project_id', 'file' => ':file']) }}"
                .replace(':project_id', project_id)
                .replace(':file', file),

            type: 'post',
			data:{_token:'{{ csrf_token() }}'},
            success: function (response) {

				var file = $(this).closest('media-item-id'); 

				currentButton.closest('.design-studio-img-items').remove();

               // alert("File deleted");
            },
            error: function (error) {
                console.error('Error deleting file:', error);
            }
        });
 		  }else{
				//alert("out")
			}
        });






	$('#design-filter_todate').datepicker({
		dateFormat: 'yy-mm-dd', 
		onSelect: function (dateText, inst) {
		}
	});


	$('#design-filter_fromdate').datepicker({
		dateFormat: 'yy-mm-dd', 
		onSelect: function (dateText, inst) {
		}
	});


	$('#dsfilterButton').on('click', function (e) {
		e.preventDefault();
    	var project_id = $('#project_id').val();
		// alert(project_id)

			var designfilter_todate = $('#design-filter_todate').val();
			var designfilter_fromdate = $('#design-filter_fromdate').val();

          
            $.ajax({
                // url: '/design/studio/'+project_id, 
				 url:"{{ route('design.studio', ['project_id' => $project_id]) }}",

                type: 'GET',
                data: { designfilter_todate: designfilter_todate,
					designfilter_fromdate:designfilter_fromdate },
                success: function (data) {
					$('#testData').html(data.filterdata);
                    //$('#test').html(data.html);
                },
                error: function (xhr, status, error) {
                    //console.error(error);
                }
            });
        });

    $('#dsresetFilterButton').on('click', function () {
           window.location.reload();
	});

});

// });




</script>


<!-- <script src="https://cdn.plyr.io/3.6.4/plyr.js"></script> -->
@endsection


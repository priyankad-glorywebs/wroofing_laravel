@extends('layouts.front.master')
@section('title', 'Documentation')
 
@section('css')
<link rel="stylesheet" href="{{asset('frontend-assets/css/custom.css')}}" type="text/css">

<style>
/* .btn-gallery-filter{
border-radius: 50px;
    background-color: #EFEFEF;
    font-size: 14px;
    color: #48484A;
    padding: 10px 15px;
    border: none;
    box-shadow: none;
    margin-right: 10px;
} */
</style>
@endsection
@section('content')

<div class="breadcrumb-title-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ol class="breadcrumb m-0">
						
					@php
					$projectId  = base64_encode($project_id);

					@endphp
						<li class="breadcrumb-item"><a href="{{ route('design.studio',['project_id' => base64_encode($project_id)])}}"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></li>
					</ol>
					<div class="section-title">Documents</div>

					<div class="mt-3">
						
					<a class="btn-gallery-filter project-list-item-link" href="{{route('general.info', ['project_id' => base64_encode($project_id)])}}" >General Info</a>
        <a class="btn-gallery-filter project-list-item-link" href="{{ route('design.studio', ['project_id' => base64_encode($project_id)]) }}">Design studio</a>
        <a class="btn-gallery-filter project-list-item-link active" href="{{route('documentation', ['project_id' => base64_encode($project_id)])}}">Documents</a>
		<a class="btn-gallery-filter project-list-item-link" href="{{route('contractor.list')}}">Contractor Portal</a>
                
	</div>
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
					{{--<div class="step-count">
						<div class="step-count-title">Step 1 out of 3</div>
						<div class="step-count-progress current-step-3">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>--}}
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
					<form id="documentform_step3" name="documentform_step3" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="project_id" id="project_id" value="{{$project_id}}" />
						 <div class="studio-step-3">
								<div class="row">
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">	
											<div class="form-element">
												<div class="upload-img-wrap">
													<input id="documents" type="file" name="documents" accept="image/jpg, image/jpeg, image/png">
													<label for="documents">
													
														<div class="upload-img-icon">
														
														@if(!isset($documents))
														<img src="{{asset('frontend-assets/images/receive-square.svg')}}" alt="img-icon" width="30" height="30">
														@else
														<a href="#" class="remove-document">Remove</a>
														@endif
														</div>
														@if(isset($documents))
														<div class="upload-img-text">{{$documents['basename']}}</div>
															<input type="hidden" name="documents_hidden" id="documents_hidden" value="{{$documents['basename']}}"/>
														@else
														<div class="upload-img-text">Your Documents</div>
														@endif
														<div class="upload-img-formate">(Third party agreement, signed contract and warranty from manufacturer)</div>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-element">
												<div class="upload-img-wrap">
													<input id="insurancedocuments" type="file" name="insurancedocuments"  accept="image/jpg, image/jpeg, image/png">
													<label for="insurancedocuments">
														<div class="upload-img-icon">
														@if(!isset($insurancedocuments))
															<img src="{{asset('frontend-assets/images/receive-square.svg')}}" alt="img-icon" width="30" height="30">
														@else
														<a href="#" class="remove-document">Remove</a>
														@endif
														</div>
														@php
														@endphp
														@if(isset($insurancedocuments))
														<div class="upload-img-text">{{$insurancedocuments['basename']}}</div>
															<input type="hidden" name="insurancedocuments_hidden" id="insurancedocuments_hidden" value="{{$insurancedocuments['basename']}}"/>
														@else
														<div class="upload-img-text">Insurance Documents</div>
														@endif
														<div class="upload-img-formate">(Insurance Scope, final invoice and completion doc)</div>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-element">
												<div class="upload-img-wrap">
													<input id="mortgagedocuments" type="file" name="mortgagedocuments" accept="image/jpg, image/jpeg, image/png">
													<label for="mortgagedocuments">
														<div class="upload-img-icon">
														@if(!isset($mortgagedocuments))
															<img src="{{asset('frontend-assets/images/receive-square.svg')}}" alt="img-icon" width="30" height="30">
														@else
														<a href="" class="remove-document">Remove</a>
														@endif
														</div>
														@if(isset($mortgagedocuments))
														<div class="upload-img-text">{{$mortgagedocuments['basename']}}</div>
															<input type="hidden" name="mortgagedocuments_hidden" id="mortgagedocuments_hidden" value="{{$mortgagedocuments['basename']}}"/>
														@else
														<div class="upload-img-text">Mortgage Documents</div>
														@endif
														<div class="upload-img-formate">(Loss Draft Package ready for HO to sign)</div>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-element">
												<div class="upload-img-wrap">
													<input id="contractordocuments" type="file" name="contractordocuments" accept="image/jpg, image/jpeg, image/png">
													<label for="contractordocuments">
														<div class="upload-img-icon">
														@if(!isset($contractordocuments))
															<img src="{{asset('frontend-assets/images/receive-square.svg')}}" alt="img-icon" width="30" height="30">
														@else
														<a href="" class="remove-document">Remove</a>
														@endif
														</div>
														@if(isset($contractordocuments))
														<div class="upload-img-text">{{$contractordocuments['basename']}}</div>
															<input type="hidden" name="contractordocuments_hidden" id="contractordocuments_hidden" value="{{$contractordocuments['basename']}}"/>
														@else
														<div class="upload-img-text">Contractor Documents</div>
														@endif
														<div class="upload-img-formate">(Estimate and final invoice and warranty)</div>
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-group button-wrap col-md-12">
										<div class="field-wrap text-center">
											<button type="submit" class="btn btn-primary">Get started now</button>
											<!-- <a href="project-list.html" class="btn btn-primary">Get started now</a> -->
										</div>
									</div>

									<!-- <div class="backto-login text-center"><a href="javascript:void(0)"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></div> -->
									<div class="backto-login text-center"><a href="{{ route('design.studio',['project_id' => base64_encode($project_id)])}}"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></div>
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
$(document).ready(function () {
        $('form').on('click', '.remove-document', function (e) {
            e.preventDefault();
            var link = $(this);
            var fileInput = link.closest('.upload-img-wrap').find('input[type="file"]');
            var hiddenInput = link.closest('.upload-img-wrap').find('input[type="hidden"]');
			var project_id = $('#project_id').val();
            var isConfirmed = confirm('Are you sure you want to remove this document?');
            
            if (isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '{{route("remove.document")}}', 
                    data: {
                        _token: $('input[name="_token"]').val(),
                        file: hiddenInput.val(),
						project_id:project_id,
                    },
                    success: function (response) {
                        fileInput.val('');
                        hiddenInput.val('');
						location.reload(); 

                    },
                    error: function (error) {
                        console.error('Error removing document:', error);
                    }
                });
            }
        });
    });
</script>

	@endsection
@extends('layouts.front.master')
@section('title', 'General Information')
 

@section('css')
<style>
/* .btn-gallery-filter{border-radius: 50px;
    background-color: #EFEFEF;
    font-size: 14px;
    color: #48484A;
    padding: 10px 15px;
    border: none;
    box-shadow: none;
    margin-right: 10px;
} */
</style>
<link rel="stylesheet" href="{{asset('frontend-assets/css/custom.css')}}" type="text/css">
@endsection
@section('content')
	{{--$project_id--}}
<?PHP
if(isset($project_id)){
	$data = \App\Models\Project::where('id',$project_id)->first();
	//dd($data);
	// $project_id =base64_encode($project_id);
}
?>
<div class="breadcrumb-title-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ol class="breadcrumb m-0">
						<!-- <li class="breadcrumb-item"><a href="login.html"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></li> -->
						<li class="breadcrumb-item"><a href="{{URL::to('add/project/'.base64_encode($project_id))}}"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></li>
					</ol>

					<div class="section-title">General Information</div>

                <div class="mt-3">
					<a class="btn-gallery-filter project-list-item-link active" href="{{route('general.info', ['project_id' => base64_encode($project_id)])}}" >General Info</a>
					<a class="project-list-item-link btn-gallery-filter" href="{{ route('design.studio', ['project_id' => base64_encode($project_id)]) }}">Design studio</a>
					<a class="project-list-item-link btn-gallery-filter" href="{{route('documentation', ['project_id' => base64_encode($project_id)])}}">Documents</a>
					<a class="project-list-item-link btn-gallery-filter" href="{{route('contractor.list')}}">Contractor Portal</a>
                </div>
				
			</div>
			<div class="row d-lg-none mt-4">
				<div class="col-12">
					<div class="signin-notes">Add a new project</div>
				</div>
			</div>
			<div class="row breadcrumb-title">
				<div class="col-12 col-lg-7">
					<!-- <div class="breadcrumb-addproject-step-1">
						<div class="section-title">Design Studio</div>
						<div class="section-subtitle d-none d-lg-block">Select your style, please be sure to check with your HOA before installation</div>
					</div> -->
					 <div class="breadcrumb-addproject-title-wrap breadcrumb-addproject-step-2">
						<div class="section-title">General Information</div>
						<div class="section-subtitle d-none d-lg-block">Please fill out the below details</div>
					</div>
					<!--<div class="breadcrumb-addproject-title-wrap breadcrumb-addproject-step-3">
						<div class="section-title">Documentation</div>
						<div class="section-subtitle d-none d-lg-block">Please upload all below documents</div>
					</div> -->
				</div>
				<div class="col-12 col-lg-5 text-end">
					{{--<div class="step-count">
						<div class="step-count-title">Step 1 out of 3</div>
						<div class="step-count-progress current-step-1">
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
						<!-- <form id="addproject" action="thankyou.html"> -->
						<form id="addproject" method="post" enctype="multipart/form-data">
							@csrf

							<div class="studio-step-2" >
								<div class="row">
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-label">
												<label for="name">Name<span>*</span></label>
											</div>
											<div class="form-element">
												<input id="name" type="text" name="title" 
												@if(isset($data))
												value="{{$data->title??''}}"
												@endif
												placeholder="John doe">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12">
										<div class="field-wrap">
											<div class="form-label">
												<label for="address">Address<span>*</span></label>
											</div>
											<div class="form-element"><textarea id="address" name="address" rows="4" placeholder="Enter your address">@if(isset($data)){{$data->address??''}}@endif</textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-label">
												<label for="insurancecompany">Insurance company<span>*</span></label>
											</div>
											<div class="form-element">
												<input id="insurancecompany" type="text"
												@if(isset($data))
												value="{{$data->insurance_company ??''}}"
											@endif
												name="insurancecompany" placeholder="Enter insurance company name">
											</div>
										</div>
									</div>
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-label">
												<label for="insuranceagency">Insurance agency<span>*</span></label>
											</div>
											<div class="form-element">
												<input id="insuranceagency" type="text" 
												@if(isset($data))
												value="{{$data->insurance_agency ??''}}"
											@endif
												name="insuranceagency" placeholder="Enter insurance agency name">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-label">
												<label for="billing">Billing<span>*</span></label>
											</div>
											<div class="form-element">
												<input id="billing" type="text"
												@if(isset($data))
												value = "{{$data->billing??''}}"
												@endif
												name="billing" placeholder="Enter billing info">
											</div>
										</div>
									</div>
									<div class="form-group col-12 col-md-6">
										<div class="field-wrap">
											<div class="form-label">
												<label for="mortgagecompany">Mortgage company<span>*</span></label>
											</div>
											<div class="form-element">
												<input id="mortgagecompany" type="text"
													@if(isset($data))
													value = "{{$data->mortgage_company??''}}"
													@endif
												name="mortgagecompany" placeholder="Enter mortgage company name">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group button-wrap col-md-12">
										<div class="field-wrap text-center">
											<button type="submit" class="btn btn-primary btn-studio-step-2">Submit and continue</button>
										</div>
									</div>
									<div class="backto-login text-center"><a href="{{URL::to('add/project/'.base64_encode($project_id))}}"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></div>
									<!-- <a href="{{-- route('documentation', ['project_id' => $data->id]) --}}">Documentation</a> -->

								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
    @endsection

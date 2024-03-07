@extends('layouts.front.master')
@section('title', 'Design Studio')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
	.profileimg{
		height:55px;
		
	}
</style>
@endsection

@section('content')
<div class="breadcrumb-title-wrap pb-0">
		<div class="container">
			{{--<div class="row">
				<div class="col-12">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="#"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></li>
					</ol>
				</div>
			</div>--}}
			<div class="row d-lg-none mt-4">
				<div class="col-12">
					<div class="signin-notes">Request a quote</div>
				</div>
			</div>
			{{--<div class="row breadcrumb-title">
				<div class="col-12 col-lg-8">
					<div class="section-title">Projects</div>

				</div>
			</div>--}}

			<div class="row">
				<div class="col-12">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="contractor-list-tab" data-bs-toggle="tab" data-bs-target="#contractor-list-tab-pane" type="button" role="tab" aria-controls="contractor-list-tab-pane" aria-selected="true" >Projects list</button>
						</li>
						{{--<li class="nav-item" role="presentation">
							<button class="nav-link" id="view-quotes-tab" data-bs-toggle="tab" data-bs-target="#view-quotes-tab-pane" type="button" role="tab" aria-controls="view-quotes-tab-pane" aria-selected="false">View quotes</button>
						</li>--}}
					</ul>
				</div>
			</div>
		</div>
	</div>



	<section class="contractor-sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="tab-content list-view" id="myTabContent">
						<div class="tab-pane fade show active" id="contractor-list-tab-pane" role="tabpanel" aria-labelledby="contractor-list-tab" tabindex="0">
							<div class="row">
								<div class="col-12">
									<form id="filterForm" action="{{ route('contractor.dashboard') }}" method="get">
											@csrf
											<div class="row">
											<div class="col-md-3">
												<label for="from_date">Search:</label>
												<input type="text" id="title" name="fromtitledate"  required>
											</div>
											<div class="col-md-2">
												<label for="from_date">From Date:</label>
												<input type="text" id="from_date" name="from_date" placeholder="From Date" required>
											</div>
											<div class="col-md-2">
												<label for="to_date">To Date:</label>
												<input type="text" id="to_date" name="to_date" placeholder="To Date" required>
											</div>
											<div class="col-md-2">
												<br/>
												<input type="button" class="btn-primary" value="Filter" id="filterButton">
											</div>
											<div class="col-md-2">
												<br/>
												<input type="button" class="btn-primary" value="Reset Filter" id="resetFilterButton">
											</div>
		                                       <div class="col-md-1 col-sm-2 text-end">
												<br/>
												<button type="button" class="btn-primary btn-change-view"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 3.75H3.75V12.5H12.5V3.75Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M26.25 3.75H17.5V12.5H26.25V3.75Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M26.25 17.5H17.5V26.25H26.25V17.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12.5 17.5H3.75V26.25H12.5V17.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>
											</div>
										</div>
										<br/>
									</form>
							    <div>
							</div>
						</div>
						<div class="col-12">
							<div class="btn-gallery-filter-wrap">
								<button class="btn-gallery-filter active" data-category="all">All</button>
								<button class="btn-gallery-filter" data-category="approved1">Approved</button>
								<button class="btn-gallery-filter" data-category="requested1">Requested</button>
								<button class="btn-gallery-filter" data-category="rejected1">Rejected</button>
							</div>
						</div>

						<div class="col-12" >
							<div class="row" id="test">

								<div class="col-12 col-md-6 col-lg-4 item list-view-main-title" data-category="requested1" style="">
									<div class="contractor-list-item">
										<div class="contractor-img-wrap">
											<div class="contractor-img"></div>
											<div class="contractor-review approved-txt d-flex align-items-center">
												<div class="contractor-review-text">Request</div>
											</div>
											
										</div>
										<div class="contractor-detail-wrap">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<div class="accordion-header" id="headingOne">
														<div class="accordion-button collapsed list-view-detial-item">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																</div>
																<div class="contractor-title-main">
																	<div class="project-detail-item project-title">Project Title</div>
																	
																	<div class="project-detail-item d-flex">
																		<div class="project-detail-item-detail project-title">Customer</div>
																	</div>
																	
																	<div class="project-detail-item d-flex ">
																		<div class="project-detail-item-detail project-title">Call</div>
																	</div>
																	<div class="project-detail-item d-flex">
																		<div class="project-detail-item-detail project-title">Email</div>
																	</div>
																	<div class="project-detail-item">
																		<div class="project-detail-item-detail project-title">Status</div>
																	</div>
																	<div class="project-detail-item  d-flex justify-content-end"></div>
																</div>
															</div>
														</div>
												
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								@if(isset($projects))
								@foreach($projects as $project)
								@php
									$userinfo = \App\Models\User::where('id',$project->user_id)->first();
									$images =  json_decode($project->project_image, true);
								@endphp
								<div class="col-12 col-md-6 col-lg-4 item" data-category="requested1">
									<div class="contractor-list-item">
										<div class="contractor-img-wrap">
											<div class="contractor-img">
											@if(isset($images) && is_array($images) && count($images) > 0)
											<img src="{{ asset('storage/project_images/'.$images[0]) }}" alt="ProjectImage" width="370" height="200">
											@else
											<img src="{{asset('frontend-assets/images/project-1.png')}}" alt="projectimage" width="370" height="200">
											@endif
											</div>
											<div class="contractor-review approved-txt d-flex align-items-center">
												<div class="contractor-review-text">{{$project->project_status??''}}</div>
											</div>
											{{--<div class="contractor-img-icon" data-bs-toggle="modal" data-bs-target="#gallerypopup">
												<img src="{{asset('frontend-assets/images/img-icon.svg')}}" alt="img-icon" width="32" height="32">
											</div>--}}
										</div>
										<div class="contractor-detail-wrap">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<div class="accordion-header" id="headingOne">
														<div class="accordion-button collapsed list-view-detial-item">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img class="project-img-list-view" src="{{asset('frontend-assets/images/project-1.png')}}" alt="contractor" width="370" height="200">
																</div>
																<div class="contractor-title-main">
																	<div class="project-detail-item project-title">{{$project->title??''}}
																		@if($project->id)
																	<div class="contractor-location-text">#{{$project->id??''}}</div>
																		@endif

																	</div>
																	
																	<div class="project-detail-item d-flex">
																		<div class="project-detail-item-detail"><a href="">{{$userinfo->name??''}}</a></div>
																	</div>
																	
																	<div class="project-detail-item d-flex">
																		<div class="project-detail-item-detail"><a href="tel:8525625112">{{$userinfo->contact_number??''}}</a></div>
																	</div>
																	<div class="project-detail-item d-flex">
																		<div class="project-detail-item-detail"><a href="mailto:jon.doe4@gmail.com">{{$userinfo->email??''}}</a></div>
																	</div>
																	<div class="project-detail-item">
																		<div class="project-detail-item-detail"><a href="">{{$project->project_status??''}}</a></div>
																	</div>
																	<div class="project-detail-item  d-flex justify-content-end">
																		<a class="detail-project-link" href="{{URL::to('contractor/project/details/'.base64_encode($project->id))}}">View More</a>
																	</div>
																</div>
															</div>
														</div>
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="display:none;">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img class="project-img-list-view" src="{{asset('frontend-assets/images/project-.png')}}" alt="contractor" width="370" height="200" style="display: none;">
																	<img class="profile-image-grid-view" src="{{asset('frontend-assets/images/Ellipse 15.svg')}}" alt="contractor-img" width="55" height="55">
																</div>
																<div class="contractor-title-main">
																	<div class="contractor-title">{{$project->title??''}}</div>
																	@if($project->id != NULL)
																	<div class="contractor-location d-flex align-items-center">
																		<!-- <div class="contractor-location-icon"><img src="{{asset('frontend-assets/images/location-icon.svg')}}"></div> -->
																		<div class="contractor-location-text">#{{$project->id??''}}</div>
																	</div> 
																	@endif
																</div>
															</div>
														</button>
													</div>
													<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
														<div class="accordion-body">
															<div class="quotes-detail">
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Customer:</div>
																	<div class="quotes-detail-item-content">{{$userinfo->name??''}}</div>
																</div>
																{{--<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Time:</div>
																	<div class="quotes-detail-item-content">9:00am to 5:00pm</div>
																</div>--}}
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Call:</div>
																	<div class="quotes-detail-item-content"><a href="tel:8525625112">{{$userinfo->contact_number??''}}</a></div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Email:</div>
																	<div class="quotes-detail-item-content"><a href="mailto:jon.doe4@gmail.com">{{$userinfo->email??''}}</a></div>
																</div>
																<div class="quotes-request-btn-wrap">
																	<a class="btn-primary d-block" href="{{URL::to('contractor/project/details/'.base64_encode($project->id))}}">View More</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- <a class="contractor-link" href="{{URL::to('contractor/project/details/'.base64_encode($project->id))}}" style=""></a> -->
									</div>
								</div>
								@endforeach
								@endif

								{{--<div class="col-12 col-md-6 col-lg-4 item" data-category="approved1">
									<div class="contractor-list-item">
										<div class="contractor-img-wrap">
											<div class="contractor-img">
												<img src="images/project-1.png" alt="contractor" width="370" height="200">
											</div>
											<div class="contractor-review requestedforquote-txt d-flex align-items-center">
												<div class="contractor-review-text">Requested for quote</div>
											</div>
											<div class="contractor-img-icon" data-bs-toggle="modal" data-bs-target="#gallerypopup">
												<img src="images/img-icon.svg" alt="img-icon" width="32" height="32">
											</div>
										</div>
										<div class="contractor-detail-wrap">
											<div class="accordion" id="accordionExample2">
												<div class="accordion-item">
													<div class="accordion-header" id="headingTwo">
														<div class="accordion-button collapsed list-view-detial-item" style="display: none;">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img class="project-img-list-view" src="images/project-1.png" alt="contractor" width="370" height="200">
																</div>
																<div class="contractor-title-main">
																	<div class="project-detail-item project-title">Bob’s Roofing</div>
																	<div class="project-detail-item d-flex">
																		<div class="project-detail-item-title">Call:</div>
																		<div class="project-detail-item-detail"><a href="tel:8525625112">852 - 562 - 5112</a></div>
																	</div>
																	<div class="project-detail-item d-flex">
																		<div class="project-detail-item-title">Email:</div>
																		<div class="project-detail-item-detail"><a href="mailto:jon.doe4@gmail.com">jon.doe4@gmail.com</a></div>
																	</div>
																	<div class="project-detail-item  d-flex justify-content-end">
																		<a class="detail-project-link" href="#">View More</a>
																	</div>
																</div>
															</div>
														</div>
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img src="images/Ellipse 15.svg" alt="contractor-img" width="55" height="">
																</div>
																<div class="contractor-title-main">
																	<div class="contractor-title">Bob’s Roofing</div>
																	<div class="contractor-location d-flex align-items-center">
																		<div class="contractor-location-icon"><img src="images/location-icon.svg"></div>
																		<div class="contractor-location-text">Rockwall (3.5 miles away)</div>
																	</div>
																</div>																
															</div>
														</button>
													</div>
												</div>
											</div>
										</div>
										<a class="contractor-link" href="#" style=""></a>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4 item" data-category="rejected1">
									<div class="contractor-list-item">
										<div class="contractor-img-wrap">
											<div class="contractor-img">
												<img src="images/project-1.png" alt="contractor" width="370" height="200">
											</div>
											<div class="contractor-review rejected-txt d-flex align-items-center">
												<div class="contractor-review-text">Rejected</div>
											</div>
											<div class="contractor-img-icon" data-bs-toggle="modal" data-bs-target="#gallerypopup">
												<img src="images/img-icon.svg" alt="img-icon" width="32" height="32">
											</div>
										</div>
										<div class="contractor-detail-wrap">
											<div class="accordion" id="accordionExample3">
												<div class="accordion-item">
													<div class="accordion-header" id="headingThree">
														<div class="accordion-button collapsed list-view-detial-item" style="display: none;">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img class="project-img-list-view" src="images/project-1.png" alt="contractor" width="370" height="200">
																</div>
																<div class="contractor-title-main">
																	<div class="project-detail-item project-title">Bob’s Roofing</div>
																	<div class="project-detail-item d-flex">
																		<div class="project-detail-item-title">Call:</div>
																		<div class="project-detail-item-detail"><a href="tel:8525625112">852 - 562 - 5112</a></div>
																	</div>
																	<div class="project-detail-item d-flex">
																		<div class="project-detail-item-title">Email:</div>
																		<div class="project-detail-item-detail"><a href="mailto:jon.doe4@gmail.com">jon.doe4@gmail.com</a></div>
																	</div>
																	<div class="project-detail-item  d-flex justify-content-end">
																		<a class="detail-project-link" href="#">View More</a>
																	</div>
																</div>
															</div>
														</div>
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" style="">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img src="images/Ellipse 15.svg" alt="contractor-img" width="55" height="">
																</div>
																<div class="contractor-title-main">
																	<div class="contractor-title">Bob’s Roofing</div>
																	<div class="contractor-location d-flex align-items-center">
																		<div class="contractor-location-icon"><img src="images/location-icon.svg"></div>
																		<div class="contractor-location-text">Rockwall (3.5 miles away)</div>
																	</div>
																</div>																
															</div>
														</button>
													</div>
												</div>
											</div>
										</div>
										<a class="contractor-link" href="#" style=""></a>
									</div>
								</div>--}}
							</div>

								</div>

						</div>
						{{--<div class="tab-pane fade" id="view-quotes-tab-pane" role="tabpanel" aria-labelledby="view-quotes-tab" tabindex="0">
							<div class="row">
								<div class="col-12">
									<div class="btn-gallery-filter-wrap">
										<button class="btn-gallery-filter active" data-category="all">All</button>
										<button class="btn-gallery-filter" data-category="approved">Approved</button>
										<button class="btn-gallery-filter" data-category="requested">Requested</button>
										<button class="btn-gallery-filter" data-category="rejected">Rejected</button>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-md-6 col-lg-4 item" data-category="approved">
									<div class="contractor-list-item">
										<div class="contractor-detail-wrap">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<div class="accordion-header" id="headingOne">
														<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img src="{{asset('frontend-assets/images/Ellipse 15.svg')}}" alt="contractor-img" width="55" height="">
																</div>
																<div class="contractor-title-main">
																	<div class="contractor-title">Bob’s Roofing</div>
																	<div class="contractor-location d-flex align-items-center">
																		<div class="contractor-location-icon"><img src="{{asset('frontend-assets/images/location-icon.svg')}}"></div>
																		<div class="contractor-location-text">Rockwall (3.5 miles away)</div>
																	</div>
																</div>																
															</div>
														</button>
													</div>
													<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
														<div class="accordion-body">
															<div class="quotes-detail">
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">
																		<svg class="me-2" width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77148 1.35645V3.75645" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.1719 1.35645V3.75645" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M1.17188 7.02832H14.7719" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.1715 6.55664V13.3566C15.1715 15.7566 13.9715 17.3566 11.1715 17.3566H4.77148C1.97148 17.3566 0.771484 15.7566 0.771484 13.3566V6.55664C0.771484 4.15664 1.97148 2.55664 4.77148 2.55664H11.1715C13.9715 2.55664 15.1715 4.15664 15.1715 6.55664Z" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.9278 10.7164H10.935" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.9278 13.1163H10.935" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.96787 10.7164H7.97506" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.96787 13.1163H7.97506" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.00693 10.7164H5.01412" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.00693 13.1163H5.01412" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
																		<strong>21  Nov  2023 , Tue</strong>
																	</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Quoted price: </div>
																	<div class="quotes-detail-item-content"><span class="price-tag">$2,000</span></div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Status: </div>
																	<div class="quotes-detail-item-content"><span class="quotes-status-tag">Approved</span></div>
																</div>
																<div class="quotes-request-btn-wrap d-none">
																	<a class="btn-primary d-block btn-requested" href="#" data-bs-toggle="modal" data-bs-target="#quotepopup">Request a quote</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4 item" data-category="requested">
									<div class="contractor-list-item">
										<div class="contractor-detail-wrap">
											<div class="accordion" id="accordionExample2">
												<div class="accordion-item">
													<div class="accordion-header" id="headingTwo">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img src="{{asset('frontend-assets/images/Ellipse 15.svg')}}" alt="contractor-img" width="55" height="">
																</div>
																<div class="contractor-title-main">
																	<div class="contractor-title">Bob’s Roofing</div>
																	<div class="contractor-location d-flex align-items-center">
																		<div class="contractor-location-icon"><img src="{{asset('frontend-assets/images/location-icon.svg')}}"></div>
																		<div class="contractor-location-text">Rockwall (3.5 miles away)</div>
																	</div>
																</div>																
															</div>
														</button>
													</div>
													<div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
														<div class="accordion-body">
															<div class="quotes-detail">
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">
																		<svg class="me-2" width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77148 1.35645V3.75645" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.1719 1.35645V3.75645" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M1.17188 7.02832H14.7719" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.1715 6.55664V13.3566C15.1715 15.7566 13.9715 17.3566 11.1715 17.3566H4.77148C1.97148 17.3566 0.771484 15.7566 0.771484 13.3566V6.55664C0.771484 4.15664 1.97148 2.55664 4.77148 2.55664H11.1715C13.9715 2.55664 15.1715 4.15664 15.1715 6.55664Z" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.9278 10.7164H10.935" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.9278 13.1163H10.935" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.96787 10.7164H7.97506" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.96787 13.1163H7.97506" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.00693 10.7164H5.01412" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.00693 13.1163H5.01412" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
																		<strong>21  Nov  2023 , Tue</strong>
																	</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Status: </div>
																	<div class="quotes-detail-item-content"><span class="requested-status-tag">Requested for quote</span></div>
																</div>																
																<!-- <div class="quotes-request-btn-wrap">
																	<a class="btn-primary d-block btn-approved" href="#" data-bs-toggle="modal" data-bs-target="#quotepopup">Request a quote</a>
																</div> -->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4 item" data-category="rejected">
									<div class="contractor-list-item">
										<div class="contractor-detail-wrap">
											<div class="accordion" id="accordionExample3">
												<div class="accordion-item">
													<div class="accordion-header" id="headingThree">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img src="{{asset('frontend-assets/images/Ellipse 15.svg')}}" alt="contractor-img" width="55" height="">
																</div>
																<div class="contractor-title-main">
																	<div class="contractor-title">Bob’s Roofing</div>
																	<div class="contractor-location d-flex align-items-center">
																		<div class="contractor-location-icon"><img src="{{asset('frontend-assets/images/location-icon.svg')}}"></div>
																		<div class="contractor-location-text">Rockwall (3.5 miles away)</div>
																	</div>
																</div>																
															</div>
														</button>
													</div>
													<div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample3">
														<div class="accordion-body">
															<div class="quotes-detail">
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Quoted price: </div>
																	<div class="quotes-detail-item-content"><span class="price-tag">$2,000</span></div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Status: </div>
																	<div class="quotes-detail-item-content"><span class="rejected-status-tag">Rejected</span></div>
																</div>
																<div class="quotes-request-btn-wrap">
																	<a class="btn-primary d-block" href="#" data-bs-toggle="modal" data-bs-target="#quotepopup">Send a new quote</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>--}}
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Modal -->
	<div class="modal fade gallerypopup" id="gallerypopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title" id="staticBackdropLabel">Work gallery</div>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
				</div>
				<div class="modal-body">
					<div class="contractor-title-detail d-sm-flex">
						<div class="contractor-popuptitle">Bob’s Roofing</div>
						<div class="contractor-review d-flex align-items-center">
							<div class="contractor-review-text">4.5</div>
							<div class="contractor-review-icons">
								<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
								<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
								<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
								<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
								<img src="{{asset('frontend-assets/images/remaing-star.svg')}}" alt="star" width="12" height="12">
							</div>
						</div>
					</div>
					<div class="gallery-wrap">
						<div class="btn-gallery-filter-wrap">
							<button class="btn-gallery-filter active" data-category="all">All</button>
							<button class="btn-gallery-filter" data-category="images">Images</button>
							<button class="btn-gallery-filter" data-category="video">Video</button>
							<button class="btn-gallery-filter" data-category="recentwork">Recent work</button>
						</div>
						<div class="items">
							<div class="item" data-category="images">
								<a class="image-gallery-popup" href="images/gallery-img-1.png">
									<img src="{{asset('frontend-assets/images/gallery-img-1.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>

							<div class="item" data-category="video">
								<a class="image-gallery-popup video" href="https://www.youtube.com/watch?v=LXb3EKWsInQ">
									<img src="{{asset('frontend-assets/images/gallery-img-2.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>

							<div class="item" data-category="video recentwork">
								<a class="image-gallery-popup video" href="https://www.youtube.com/watch?v=LXb3EKWsInQ">
									<img src="{{asset('frontend-assets/images/gallery-img-3.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>

							<div class="item" data-category="images recentwork">
								<a class="image-gallery-popup" href="images/gallery-img-4.png">
									<img src="{{asset('frontend-assets/images/gallery-img-4.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>

							<div class="item" data-category="images">
								<a class="image-gallery-popup" href="images/gallery-img-5.png">
									<img src="{{asset('frontend-assets/images/gallery-img-5.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>

							<div class="item" data-category="images recentwork">
								<a class="image-gallery-popup" href="images/gallery-img-6.png">
									<img src="{{asset('frontend-assets/images/gallery-img-6.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Quote Modal -->
	<div class="modal fade quotepopup" id="quotepopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title" id="staticBackdropLabel">Quote details</div>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
				</div>
				<div class="modal-body">
					<div class="contractor-title-detail d-sm-flex">
						<div class="contractor-popuptitle">Bob’s Roofing Quote</div>
						<div class="contractor-review d-flex align-items-center">
							<div class="contractor-review-text">4.5</div>
							<div class="contractor-review-icons">
								<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
								<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
								<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
								<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
								<img src="{{asset('frontend-assets/images/remaing-star.svg')}}" alt="star" width="12" height="12">
							</div>
						</div>
					</div>
					<div class="quotepopup-wrap">
						<div class="quotepopup-item">
							<div class="quotepopup-item-title">Scheduled date:</div>
							<div class="quotepopup-item-content">21  Nov  2023 , Tue</div>
						</div>
						<div class="quotepopup-item">
							<div class="quotepopup-item-title">Scheduled time:</div>
							<div class="quotepopup-item-content">9:00am to 5:00pm</div>
						</div>
						<div class="quotepopup-item">
							<div class="quotepopup-item-title">Quote price:</div>
							<div class="quotepopup-item-content"><span class="quotepopup-price-tag">$2,000</span></div>
						</div>
						<div class="quotepopup-item">
							<div class="quotepopup-item-title">Description:</div>
							<div class="quotepopup-item-content">Please call us for further discussion </div>
						</div>
						<div class="quotepopup-item">
							<div class="quotepopup-item-title">Call:</div>
							<div class="quotepopup-item-content">852 - 562 - 5112</div>
						</div>
						<div class="quotepopup-item">
							<div class="quotepopup-item-title">Email:</div>
							<div class="quotepopup-item-content">johndoe4@gmail.com</div>
						</div>
						<div class="quotepopup-button-wrap d-flex">
							<a class="btn-outline-secondary me-3 d-block" href="#">Reject</a>
							<a class="btn-primary d-block" href="#">Approve</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection

	@section('scripts')

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   
<script>
$(document).ready(function () {

var currentDate = new Date();

var fromDefaultDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

var year = fromDefaultDate.getFullYear();
var month = ('0' + (fromDefaultDate.getMonth() + 1)).slice(-2); 
var day = ('0' + fromDefaultDate.getDate()).slice(-2);

var formattedfromDate = year + '-' + month + '-' + day;
$('#from_date').val(formattedfromDate);

var toDefaultDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);

var year = toDefaultDate.getFullYear();
var month = ('0' + (toDefaultDate.getMonth() + 1)).slice(-2); 
var day = ('0' + toDefaultDate.getDate()).slice(-2);

var formattedtoDate = year + '-' + month + '-' + day;
$('#to_date').val(formattedtoDate);
  $('#from_date, #to_date').datepicker({
            dateFormat: 'yy-mm-dd',
            defaultDate: fromDefaultDate, 
            onSelect: function (dateText, inst) {
            }
        });

        $('#to_date').datepicker({
            dateFormat: 'yy-mm-dd',
            defaultDate: toDefaultDate, 
            onSelect: function (dateText, inst) {
            }
        });

        $('#filterButton').on('click', function () {
			// alert("in");
            var fromDate = $('#from_date').val();
            var toDate = $('#to_date').val();
			var title = $('#title').val();

            $.ajax({
                url: '{{ route("contractor.dashboard")}}', 
                type: 'GET',
                data: { from_date: fromDate, to_date: toDate,title:title },
                success: function (data) {
                    $('#test').html(data.html);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
		      $('#resetFilterButton').on('click', function () {
            $('#from_date').datepicker('setDate', formattedfromDate);
            $('#to_date').datepicker('setDate', formattedtoDate);
			window.location.reload();
		 });
	});


</script>
@endsection

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
											
											<div class="project-detail-item d-flex">
												<div class="project-detail-item-detail project-title">Call	</div>
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
												<div class="project-detail-item-detail "><a href="tel:8525625112">{{$userinfo->contact_number??''}}</a></div>
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
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
										{{--<div class="quotes-detail-item d-flex align-items-center justify-content-between">
											<div class="quotes-detail-item-title">Date:</div>
											<div class="quotes-detail-item-content">Monday to Friday</div>
										</div>--}}
										<div class="quotes-detail-item d-flex align-items-center justify-content-between">
											<div class="quotes-detail-item-title">Customer:</div>
											<div class="quotes-detail-item-content">{{$userinfo->name??''}}</div>
										</div>
										<div class="quotes-detail-item d-flex align-items-center justify-content-between">
											<div class="quotes-detail-item-title">Call:</div>
											<div class="quotes-detail-item-content"><a href="tel:8525625112">{{$userinfo->contact_number??''}}</a></div>
										</div>
										<div class="quotes-detail-item d-flex align-items-center justify-content-between">
											<div class="quotes-detail-item-title">Email:</div>
											<div class="quotes-detail-item-content"><a href="mailto:jon.doe4@gmail.com">{{$userinfo->email??''}}</a></div>
										</div>
										<div class="quotes-request-btn-wrap">
											<a class="btn-primary d-block" href="#">View More</a>
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

	</div>

		</div>

</div>
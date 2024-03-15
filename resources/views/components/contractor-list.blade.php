<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    

<div class="breadcrumb-title-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="{{URL::to('/project/list')}}"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></li>
					</ol>
				</div>
			</div>
			<div class="row d-lg-none mt-4">
				<div class="col-12">
					<div class="signin-notes">Request a quote</div>
				</div>
			</div>
			<div class="row breadcrumb-title">
				<div class="col-12 col-lg-8">
					<div class="section-title">Contractor</div>
							{{--<div class="section-subtitle d-none d-lg-block">The contractors on this list are held to the highest standards and are local to your exact area. <br class="d-none d-lg-block">
							We only partner with the top contractors in your area and will back their warranty if anything ever happens.</div>
						</div>--}}
				<div class="col-12 col-lg-4 text-end">
					<div class="section-subtitle d-lg-none">The contractors on this list are held to the highest standards and are local to your exact area. <br class="d-none d-lg-block">
					We only partner with the top contractors in your area and will back their warranty if anything ever happens.</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="contractor-list-tab" data-bs-toggle="tab" data-bs-target="#contractor-list-tab-pane" type="button" role="tab" aria-controls="contractor-list-tab-pane" aria-selected="true">Contractor list</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="view-quotes-tab" data-bs-toggle="tab" data-bs-target="#view-quotes-tab-pane" type="button" role="tab" aria-controls="view-quotes-tab-pane" aria-selected="false">View quotes</button>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<section class="contractor-sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="contractor-list-tab-pane" role="tabpanel" aria-labelledby="contractor-list-tab" tabindex="0">
							<div class="row">
								<!--contractor list  -->
                                @if(isset($contarctorList))
                            @foreach($contarctorList as $contractorList)
                             <div class="col-12 col-md-6 col-lg-4">
									<div class="contractor-list-item">
										<div class="contractor-img-wrap">
											<div class="contractor-img">
												
												@if(isset($contractorList->banner_image))
												<img src="{{asset('contractor_banner/'.$contractorList->banner_image)}}" alt="Contractor Banner">

												@else
												<img src="{{asset('frontend-assets/images/contractor-1.png')}}" alt="contractor" width="370" height="200">
												@endif
											</div>
											<div class="contractor-pin">Recommended</div>
											{{--<div class="contractor-review d-flex align-items-center">
												<div class="contractor-review-text">4.5</div>
												<div class="contractor-review-icons">
													<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
													<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
													<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
													<img src="{{asset('frontend-assets/images/star.svg')}}" alt="star" width="12" height="12">
													<img src="{{asset('frontend-assets/images/remaing-star.svg')}}" alt="star" width="12" height="12">
												</div>
											</div>--}}
											<div class="contractor-img-icon" data-bs-toggle="modal" data-bs-target="#gallerypopup">
												<img src="{{asset('frontend-assets/images/img-icon.svg')}}" alt="img-icon" width="32" height="32">
											</div>
										</div>
										<div class="contractor-detail-wrap">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<div class="accordion-header" id="headingOne">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
                                                            	    @if(isset($contractorList->profile_image))
																	<img src="{{asset($contractorList->profile_image)}}" onerror="setDefaultImage(this)" alt="contractor-img" width="55" height="">
                                                                    @else
																	<img src="{{asset('frontend-assets/images/Ellipse 15.svg')}}" alt="contractor-img" width="55" height="">
                                                                    @endif
                                                                </div>
																<div class="contractor-title-main">
																	<div class="contractor-title">{{$contractorList->name??''}}’s Roofing</div>
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
																	<div class="quotes-detail-item-title">Date:</div>
																	<div class="quotes-detail-item-content">Monday to Friday</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Time:</div>
																	<div class="quotes-detail-item-content">9:00am to 5:00pm</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Call:</div>
																	<div class="quotes-detail-item-content"><a href="tel:8525625112">{{$contractorList->contact_number??''}}</a></div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Email:</div>
																	<div class="quotes-detail-item-content"><a href="mailto:jon.doe4@gmail.com">{{$contractorList->email??''}}</a></div>
																</div>
																<div class="quotes-request-btn-wrap">
																	<a class="btn-primary d-block" href="#">Request a quote</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                                @endforeach
                                @endif
                                    <!--end contractor list  -->
                             
								{{--<div class="col-12 col-md-6 col-lg-4">
									<div class="contractor-list-item">
										<div class="contractor-img-wrap">
											<div class="contractor-img">
												<img src="{{asset('frontend-assets/images/contractor-2.png')}}" alt="contractor" width="370" height="200">
											</div>
											<div class="contractor-pin">Recommended</div>
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
											<div class="contractor-img-icon" data-bs-toggle="modal" data-bs-target="#gallerypopup">
												<img src="{{asset('frontend-assets/images/img-icon.svg')}}" alt="img-icon" width="32" height="32">
											</div>
										</div>
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
																	<div class="quotes-detail-item-title">Date:</div>
																	<div class="quotes-detail-item-content">Monday to Friday</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Time:</div>
																	<div class="quotes-detail-item-content">9:00am to 5:00pm</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Call:</div>
																	<div class="quotes-detail-item-content"><a href="tel:8525625112">852 - 562 - 5112</a></div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Email:</div>
																	<div class="quotes-detail-item-content"><a href="mailto:jon.doe4@gmail.com">jon.doe4@gmail.com</a></div>
																</div>
																<div class="quotes-request-btn-wrap">
																	<a class="btn-primary d-block" href="#">Request a quote</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4">
									<div class="contractor-list-item">
										<div class="contractor-img-wrap">
											<div class="contractor-img">
												<img src="{{asset('frontend-assets/images/contractor-3.png')}}" alt="contractor" width="370" height="200">
											</div>
											<div class="contractor-pin">Recommended</div>
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
											<div class="contractor-img-icon" data-bs-toggle="modal" data-bs-target="#gallerypopup">
												<img src="{{asset('frontend-assets/images/img-icon.svg')}}" alt="img-icon" width="32" height="32">
											</div>
										</div>
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
																	<div class="quotes-detail-item-title">Date:</div>
																	<div class="quotes-detail-item-content">Monday to Friday</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Time:</div>
																	<div class="quotes-detail-item-content">9:00am to 5:00pm</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Call:</div>
																	<div class="quotes-detail-item-content"><a href="tel:8525625112">852 - 562 - 5112</a></div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Email:</div>
																	<div class="quotes-detail-item-content"><a href="mailto:jon.doe4@gmail.com">jon.doe4@gmail.com</a></div>
																</div>
																<div class="quotes-request-btn-wrap">
																	<a class="btn-primary d-block" href="#">Request a quote</a>
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
						<div class="tab-pane fade" id="view-quotes-tab-pane" role="tabpanel" aria-labelledby="view-quotes-tab" tabindex="0">
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
								<div class="col-12 col-md-6 col-lg-4 item" data-category="requested">
									<div class="contractor-list-item">
										<div class="contractor-detail-wrap">
											<div class="accordion" id="accordionExample">
												<div class="accordion-item">
													<div class="accordion-header" id="headingOne">
														<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
															<div class="contractor-detail-title-wrap d-flex">
																<div class="contractor-title-img">
																	<img src="{{asset('frontend-assets/images/Ellipse 15.svg'
                                                                        )}}" alt="contractor-img" width="55" height="">
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
													<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
														<div class="accordion-body">
															<div class="quotes-detail">
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Date:</div>
																	<div class="quotes-detail-item-content">Monday to Friday</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Time:</div>
																	<div class="quotes-detail-item-content">9:00am to 5:00pm</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Call:</div>
																	<div class="quotes-detail-item-content"><a href="tel:8525625112">852 - 562 - 5112</a></div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Email:</div>
																	<div class="quotes-detail-item-content"><a href="mailto:jon.doe4@gmail.com">jon.doe4@gmail.com</a></div>
																</div>
																<div class="quotes-request-btn-wrap">
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

								<div class="col-12 col-md-6 col-lg-4 item" data-category="approved">
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
																	<div class="quotes-detail-item-title">Date:</div>
																	<div class="quotes-detail-item-content">Monday to Friday</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Time:</div>
																	<div class="quotes-detail-item-content">9:00am to 5:00pm</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Call:</div>
																	<div class="quotes-detail-item-content"><a href="tel:8525625112">852 - 562 - 5112</a></div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Email:</div>
																	<div class="quotes-detail-item-content"><a href="mailto:jon.doe4@gmail.com">jon.doe4@gmail.com</a></div>
																</div>
																<div class="quotes-request-btn-wrap">
																	<a class="btn-primary d-block btn-approved" href="#" data-bs-toggle="modal" data-bs-target="#quotepopup">Request a quote</a>
																</div>
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
																	<div class="quotes-detail-item-title">Date:</div>
																	<div class="quotes-detail-item-content">Monday to Friday</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Time:</div>
																	<div class="quotes-detail-item-content">9:00am to 5:00pm</div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Call:</div>
																	<div class="quotes-detail-item-content"><a href="tel:8525625112">852 - 562 - 5112</a></div>
																</div>
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">Email:</div>
																	<div class="quotes-detail-item-content"><a href="mailto:jon.doe4@gmail.com">jon.doe4@gmail.com</a></div>
																</div>
																<div class="quotes-request-btn-wrap">
																	<a class="btn-primary d-block btn-rejected" href="#" data-bs-toggle="modal" data-bs-target="#quotepopup">Request a quote</a>
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
						</div>
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
								<a class="image-gallery-popup" href="{{asset('frontend-assets/images/gallery-img-1.png')}}">
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
								<a class="image-gallery-popup" href="{{asset('frontend-assets/images/gallery-img-4.png')}}">
									<img src="{{asset('frontend-assets/images/gallery-img-4.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>

							<div class="item" data-category="images">
								<a class="image-gallery-popup" href="images/gallery-img-5.png">
									<img src="images/gallery-img-5.png" alt="gallery-img" width="170" height="150">
								</a>
							</div>

							<div class="item" data-category="images recentwork">
								<a class="image-gallery-popup" href="{{asset('frontend-assets/images/gallery-img-6.png')}}">
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

    
</div>
<script>
    function setDefaultImage(element) {
        element.onerror = null; 
        element.src = '{{ asset('frontend-assets/images/defaultimage.jpg') }}';
    }
</script>

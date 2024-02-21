@extends('layouts.front.master')
@section('title', 'Design Studio')
 
@section('content')

<section class="contractor-sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="contractor-list-tab-pane" role="tabpanel" aria-labelledby="contractor-list-tab" tabindex="0">
							<div class="row">
								<div class="col-12">
									<div class="project-detail-tabs">
										<nav>
											<div class="nav nav-tabs" id="nav-tab" role="tablist">
											<button class="nav-link active" id="nav-general-info-tab" data-bs-toggle="tab" data-bs-target="#nav-general-info" type="button" role="tab" aria-controls="nav-general-info" aria-selected="true">General Info</button>
												<button class="nav-link" id="nav-design-studio-tab" data-bs-toggle="tab" data-bs-target="#nav-design-studio" type="button" role="tab" aria-controls="nav-design-studio" aria-selected="false">Design studio</button>
												<button class="nav-link" id="nav-documentation-tab" data-bs-toggle="tab" data-bs-target="#nav-documentation" type="button" role="tab" aria-controls="nav-documentation" aria-selected="false">Documentation</button>
											</div>
										</nav>
										<div class="tab-content" id="project-detail-nav">
											<div class="tab-pane fade" id="nav-design-studio" role="tabpanel" aria-labelledby="nav-design-studio-tab" tabindex="0">
												<div class="row">
													<div class="col-12">
														<div class="section-subtitle mb-4">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12 col-md-6 col-lg-4">
														<div class="contractor-list-item">
															<div class="contractor-img-wrap">
                                                            @php $images =  json_decode($projectinfo->project_image, true);
                                                            @endphp
										                        @if(isset($images) && is_array($images) && count($images) > 0)
																<div class="contractor-img">
																	<img src="{{ asset('storage/project_images/'.$images[0]) }}" alt="contractor" width="370" height="200">
																</div>

																<div class="contractor-img-icon" data-bs-toggle="modal" data-bs-target="#gallerypopup">
																	<img src="{{asset('frontend-assets/images/img-icon.svg')}}" alt="img-icon" width="32" height="32">
																</div>
                                                                @endif
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-6 col-md-4 col-lg-3">
														<div class="project-detail-photos-item">
															<div class="project-detail-photos-item-img">
																<img src="{{asset('frontend-assets/images/project-photos-1.png')}}" alt="project-photos" width="270" height="230">
															</div>
															<div class="project-detail-photos-item-title">Roof and gutter designer</div>
														</div>
													</div>
													<div class="col-6 col-md-4 col-lg-3">
														<div class="project-detail-photos-item">
															<div class="project-detail-photos-item-img">
																<img src="{{asset('frontend-assets/images/project-photos-2.png')}}" alt="project-photos" width="270" height="230">
															</div>
															<div class="project-detail-photos-item-title">Roof types and ratings</div>
														</div>
													</div>
													<div class="col-6 col-md-4 col-lg-3">
														<div class="project-detail-photos-item">
															<div class="project-detail-photos-item-img">
																<img src="{{asset('frontend-assets/images/project-photos-3.png')}}" alt="project-photos" width="270" height="230">
															</div>
															<div class="project-detail-photos-item-title">Gutter types and accessories</div>
														</div>
													</div>
													<div class="col-6 col-md-4 col-lg-3">
														<div class="project-detail-photos-item">
															<div class="project-detail-photos-item-img">
																<img src="{{asset('frontend-assets/images/project-photos-4.png')}}" alt="project-photos" width="270" height="230">
															</div>
															<div class="project-detail-photos-item-title">Gutter types and accessories</div>
														</div>
													</div>
												</div>
												<div class="row justify-content-center">
													<div class="col-12 col-md-6 col-lg-4">
														<a class="btn-primary d-block" id="designStudiotab" href="javascript:void(0)">Next</a>
													</div>
												</div>
											</div>
											<div class="tab-pane fade show active" id="nav-general-info" role="tabpanel" aria-labelledby="nav-general-info-tab" tabindex="0">
												<div class="row">
													<div class="col-12">
														<div class="section-subtitle mb-4">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<div class="general-info-wrap">
															<div class="general-info-item">
																<div class="general-info-item-title">Name:</div>
																<div class="general-info-item-detail">{{$projectinfo->name??''}}</div>
															</div>
															<div class="general-info-item">
																<div class="general-info-item-title">Address:</div>
																<div class="general-info-item-detail">{{$projectinfo->address??''}}</div>
															</div>
															<div class="general-info-item">
																<div class="general-info-item-title">Insurance company:</div>
																<div class="general-info-item-detail">{{$projectinfo->insurance_company??''}}</div>
															</div>
															<div class="general-info-item">
																<div class="general-info-item-title">Insurance agency:</div>
																<div class="general-info-item-detail">{{$projectinfo->insurance_agency??''}} </div>
															</div>
															<div class="general-info-item">
																<div class="general-info-item-title">Billing:</div>
																<div class="general-info-item-detail">{{$projectinfo->billing??''}}</div>
															</div>
															<div class="general-info-item">
																<div class="general-info-item-title">Mortgage company:</div>
																<div class="general-info-item-detail">{{$projectinfo->mortgage_company??''}}</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row justify-content-center">
													<div class="col-12 col-md-6 col-lg-4">
														<a class="btn-primary d-block" id="generalinfotab" href="javascript:void(0)">Next</a>
													</div>
												</div>
											</div>
											<div class="tab-pane fade" id="nav-documentation" role="tabpanel" aria-labelledby="nav-documentation-tab" tabindex="0">
												<div class="row">
													<div class="col-12">
														<div class="section-subtitle mb-4">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12 col-lg-6">
														<div class="documentation-download-item">
															<div class="documentation-download-img">
																<img src="{{asset('frontend-assets/images/pdf.png')}}" alt="download icon" width="50" height="50">
															</div>
															<div class="documentation-download-detail-wrap">
																<div class="documentation-download-title">Third party agreement document</div>
																<div class="documentation-download-contant">(Third party agreement, signed contract and warranty from manufacturer)</div>
																<div class="documentation-download-btn-wrap text-end" style="">
																@if(isset($documentdata) && $documentdata !== NULL && $documentdata !== '')
                                                                <a class="btn-outline-secondary" href="{{route('download.file', ['filename' => $documentdata]) }}"> Download <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.0631 11.6913C15.2753 11.5145 15.3039 11.1992 15.1271 10.9871C14.9504 10.7749 14.6351 10.7462 14.4229 10.923L15.0631 11.6913ZM10.5004 14.8427L10.1803 15.2268C10.3657 15.3813 10.635 15.3813 10.8205 15.2268L10.5004 14.8427ZM6.57778 10.923C6.36564 10.7462 6.05036 10.7749 5.87358 10.987C5.6968 11.1992 5.72546 11.5145 5.9376 11.6913L6.57778 10.923ZM11.0004 6.35736C11.0004 6.08122 10.7765 5.85736 10.5004 5.85736C10.2242 5.85736 10.0004 6.08122 10.0004 6.35736H11.0004ZM14.4229 10.923L10.1803 14.4586L10.8205 15.2268L15.0631 11.6913L14.4229 10.923ZM10.8205 14.4586L6.57778 10.923L5.9376 11.6913L10.1803 15.2268L10.8205 14.4586ZM11.0004 14.8427V6.35736H10.0004V14.8427H11.0004ZM16.9351 17.0347C13.3813 20.5884 7.61949 20.5884 4.06572 17.0347L3.35861 17.7418C7.30291 21.6861 13.6979 21.6861 17.6422 17.7418L16.9351 17.0347ZM4.06572 17.0347C0.511948 13.4809 0.511948 7.7191 4.06572 4.16533L3.35861 3.45822C-0.585683 7.40252 -0.585683 13.7975 3.35861 17.7418L4.06572 17.0347ZM4.06572 4.16533C7.61949 0.611557 13.3813 0.611557 16.9351 4.16533L17.6422 3.45822C13.6979 -0.486074 7.30291 -0.486074 3.35861 3.45822L4.06572 4.16533ZM16.9351 4.16533C20.4888 7.7191 20.4888 13.4809 16.9351 17.0347L17.6422 17.7418C21.5865 13.7975 21.5865 7.40252 17.6422 3.45822L16.9351 4.16533Z" fill="#53B746"/></svg></a>
																@endif
                                                            </div>
															</div>
														</div>
													<!-- </div>
													<div class="col-12 col-lg-6"> -->
														<div class="documentation-download-item">
															<div class="documentation-download-img">
																<img src="{{asset('frontend-assets/images/word-file.png')}}" alt="download icon" width="50" height="50">
															</div>
															<div class="documentation-download-detail-wrap">
																<div class="documentation-download-title">Insurance documents</div>
																<div class="documentation-download-contant">(Insurance Scope, final invoice and completion doc)</div>
																<div class="documentation-download-btn-wrap text-end" style="">
<<<<<<< HEAD
																	{{-- <a class="btn-outline-secondary" href="{{route('download.file', ['filename' => $contractordocuments]) }}">Download <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.0631 11.6913C15.2753 11.5145 15.3039 11.1992 15.1271 10.9871C14.9504 10.7749 14.6351 10.7462 14.4229 10.923L15.0631 11.6913ZM10.5004 14.8427L10.1803 15.2268C10.3657 15.3813 10.635 15.3813 10.8205 15.2268L10.5004 14.8427ZM6.57778 10.923C6.36564 10.7462 6.05036 10.7749 5.87358 10.987C5.6968 11.1992 5.72546 11.5145 5.9376 11.6913L6.57778 10.923ZM11.0004 6.35736C11.0004 6.08122 10.7765 5.85736 10.5004 5.85736C10.2242 5.85736 10.0004 6.08122 10.0004 6.35736H11.0004ZM14.4229 10.923L10.1803 14.4586L10.8205 15.2268L15.0631 11.6913L14.4229 10.923ZM10.8205 14.4586L6.57778 10.923L5.9376 11.6913L10.1803 15.2268L10.8205 14.4586ZM11.0004 14.8427V6.35736H10.0004V14.8427H11.0004ZM16.9351 17.0347C13.3813 20.5884 7.61949 20.5884 4.06572 17.0347L3.35861 17.7418C7.30291 21.6861 13.6979 21.6861 17.6422 17.7418L16.9351 17.0347ZM4.06572 17.0347C0.511948 13.4809 0.511948 7.7191 4.06572 4.16533L3.35861 3.45822C-0.585683 7.40252 -0.585683 13.7975 3.35861 17.7418L4.06572 17.0347ZM4.06572 4.16533C7.61949 0.611557 13.3813 0.611557 16.9351 4.16533L17.6422 3.45822C13.6979 -0.486074 7.30291 -0.486074 3.35861 3.45822L4.06572 4.16533ZM16.9351 4.16533C20.4888 7.7191 20.4888 13.4809 16.9351 17.0347L17.6422 17.7418C21.5865 13.7975 21.5865 7.40252 17.6422 3.45822L16.9351 4.16533Z" fill="#53B746"/></svg></a> --}}
																</div>
=======
																@if(isset($contractordocuments) && $contractordocuments !== NULL && $contractordocuments !== '')
                                                                <a class="btn-outline-secondary" href="{{route('download.file', ['filename' => $contractordocuments]) }}">Download <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.0631 11.6913C15.2753 11.5145 15.3039 11.1992 15.1271 10.9871C14.9504 10.7749 14.6351 10.7462 14.4229 10.923L15.0631 11.6913ZM10.5004 14.8427L10.1803 15.2268C10.3657 15.3813 10.635 15.3813 10.8205 15.2268L10.5004 14.8427ZM6.57778 10.923C6.36564 10.7462 6.05036 10.7749 5.87358 10.987C5.6968 11.1992 5.72546 11.5145 5.9376 11.6913L6.57778 10.923ZM11.0004 6.35736C11.0004 6.08122 10.7765 5.85736 10.5004 5.85736C10.2242 5.85736 10.0004 6.08122 10.0004 6.35736H11.0004ZM14.4229 10.923L10.1803 14.4586L10.8205 15.2268L15.0631 11.6913L14.4229 10.923ZM10.8205 14.4586L6.57778 10.923L5.9376 11.6913L10.1803 15.2268L10.8205 14.4586ZM11.0004 14.8427V6.35736H10.0004V14.8427H11.0004ZM16.9351 17.0347C13.3813 20.5884 7.61949 20.5884 4.06572 17.0347L3.35861 17.7418C7.30291 21.6861 13.6979 21.6861 17.6422 17.7418L16.9351 17.0347ZM4.06572 17.0347C0.511948 13.4809 0.511948 7.7191 4.06572 4.16533L3.35861 3.45822C-0.585683 7.40252 -0.585683 13.7975 3.35861 17.7418L4.06572 17.0347ZM4.06572 4.16533C7.61949 0.611557 13.3813 0.611557 16.9351 4.16533L17.6422 3.45822C13.6979 -0.486074 7.30291 -0.486074 3.35861 3.45822L4.06572 4.16533ZM16.9351 4.16533C20.4888 7.7191 20.4888 13.4809 16.9351 17.0347L17.6422 17.7418C21.5865 13.7975 21.5865 7.40252 17.6422 3.45822L16.9351 4.16533Z" fill="#53B746"/></svg></a>
																@endif 	
															</div>
>>>>>>> 7ad1e6a978b7d41d29ea8861a388803606c3d504
															</div>
														</div>
													</div>
													<div class="col-12 col-lg-6">
														<div class="documentation-download-item">
															<div class="documentation-download-img">
																<img src="{{asset('frontend-assets/images/file.png')}}" alt="download icon" width="50" height="50">
															</div>
															<div class="documentation-download-detail-wrap">
																<div class="documentation-download-title">Insurance documents</div>
																<div class="documentation-download-contant">(Insurance Scope, final invoice and completion doc)</div>
																<div class="documentation-download-btn-wrap text-end" style="">
<<<<<<< HEAD
																	{{-- <a class="btn-outline-secondary" href="{{route('download.file', ['filename' => $insurancedocuments]) }}">Download <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.0631 11.6913C15.2753 11.5145 15.3039 11.1992 15.1271 10.9871C14.9504 10.7749 14.6351 10.7462 14.4229 10.923L15.0631 11.6913ZM10.5004 14.8427L10.1803 15.2268C10.3657 15.3813 10.635 15.3813 10.8205 15.2268L10.5004 14.8427ZM6.57778 10.923C6.36564 10.7462 6.05036 10.7749 5.87358 10.987C5.6968 11.1992 5.72546 11.5145 5.9376 11.6913L6.57778 10.923ZM11.0004 6.35736C11.0004 6.08122 10.7765 5.85736 10.5004 5.85736C10.2242 5.85736 10.0004 6.08122 10.0004 6.35736H11.0004ZM14.4229 10.923L10.1803 14.4586L10.8205 15.2268L15.0631 11.6913L14.4229 10.923ZM10.8205 14.4586L6.57778 10.923L5.9376 11.6913L10.1803 15.2268L10.8205 14.4586ZM11.0004 14.8427V6.35736H10.0004V14.8427H11.0004ZM16.9351 17.0347C13.3813 20.5884 7.61949 20.5884 4.06572 17.0347L3.35861 17.7418C7.30291 21.6861 13.6979 21.6861 17.6422 17.7418L16.9351 17.0347ZM4.06572 17.0347C0.511948 13.4809 0.511948 7.7191 4.06572 4.16533L3.35861 3.45822C-0.585683 7.40252 -0.585683 13.7975 3.35861 17.7418L4.06572 17.0347ZM4.06572 4.16533C7.61949 0.611557 13.3813 0.611557 16.9351 4.16533L17.6422 3.45822C13.6979 -0.486074 7.30291 -0.486074 3.35861 3.45822L4.06572 4.16533ZM16.9351 4.16533C20.4888 7.7191 20.4888 13.4809 16.9351 17.0347L17.6422 17.7418C21.5865 13.7975 21.5865 7.40252 17.6422 3.45822L16.9351 4.16533Z" fill="#53B746"/></svg></a> --}}
=======
																	@if(isset($insurancedocuments) && $insurancedocuments !== NULL  && $insurancedocuments !== '')
																	<a class="btn-outline-secondary" href="{{route('download.file', ['filename' => $insurancedocuments]) }}">Download <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.0631 11.6913C15.2753 11.5145 15.3039 11.1992 15.1271 10.9871C14.9504 10.7749 14.6351 10.7462 14.4229 10.923L15.0631 11.6913ZM10.5004 14.8427L10.1803 15.2268C10.3657 15.3813 10.635 15.3813 10.8205 15.2268L10.5004 14.8427ZM6.57778 10.923C6.36564 10.7462 6.05036 10.7749 5.87358 10.987C5.6968 11.1992 5.72546 11.5145 5.9376 11.6913L6.57778 10.923ZM11.0004 6.35736C11.0004 6.08122 10.7765 5.85736 10.5004 5.85736C10.2242 5.85736 10.0004 6.08122 10.0004 6.35736H11.0004ZM14.4229 10.923L10.1803 14.4586L10.8205 15.2268L15.0631 11.6913L14.4229 10.923ZM10.8205 14.4586L6.57778 10.923L5.9376 11.6913L10.1803 15.2268L10.8205 14.4586ZM11.0004 14.8427V6.35736H10.0004V14.8427H11.0004ZM16.9351 17.0347C13.3813 20.5884 7.61949 20.5884 4.06572 17.0347L3.35861 17.7418C7.30291 21.6861 13.6979 21.6861 17.6422 17.7418L16.9351 17.0347ZM4.06572 17.0347C0.511948 13.4809 0.511948 7.7191 4.06572 4.16533L3.35861 3.45822C-0.585683 7.40252 -0.585683 13.7975 3.35861 17.7418L4.06572 17.0347ZM4.06572 4.16533C7.61949 0.611557 13.3813 0.611557 16.9351 4.16533L17.6422 3.45822C13.6979 -0.486074 7.30291 -0.486074 3.35861 3.45822L4.06572 4.16533ZM16.9351 4.16533C20.4888 7.7191 20.4888 13.4809 16.9351 17.0347L17.6422 17.7418C21.5865 13.7975 21.5865 7.40252 17.6422 3.45822L16.9351 4.16533Z" fill="#53B746"/></svg></a>
																	@endif
>>>>>>> 7ad1e6a978b7d41d29ea8861a388803606c3d504
																</div>
															</div>
														</div>
													<!-- </div>
													<div class="col-12 col-lg-6"> -->
														<div class="documentation-download-item">
															<div class="documentation-download-img">
																<img src="{{asset('frontend-assets/images/file.png')}}" alt="download icon" width="50" height="50">
															</div>
															<div class="documentation-download-detail-wrap">
																<div class="documentation-download-title">Insurance documents</div>
																<div class="documentation-download-contant">(Insurance Scope, final invoice and completion doc)</div>
																<div class="documentation-download-btn-wrap text-end" style="">
<<<<<<< HEAD
																	{{-- <a class="btn-outline-secondary" href="{{route('download.file', ['filename' => $mortgagedocuments]) }}">Download <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.0631 11.6913C15.2753 11.5145 15.3039 11.1992 15.1271 10.9871C14.9504 10.7749 14.6351 10.7462 14.4229 10.923L15.0631 11.6913ZM10.5004 14.8427L10.1803 15.2268C10.3657 15.3813 10.635 15.3813 10.8205 15.2268L10.5004 14.8427ZM6.57778 10.923C6.36564 10.7462 6.05036 10.7749 5.87358 10.987C5.6968 11.1992 5.72546 11.5145 5.9376 11.6913L6.57778 10.923ZM11.0004 6.35736C11.0004 6.08122 10.7765 5.85736 10.5004 5.85736C10.2242 5.85736 10.0004 6.08122 10.0004 6.35736H11.0004ZM14.4229 10.923L10.1803 14.4586L10.8205 15.2268L15.0631 11.6913L14.4229 10.923ZM10.8205 14.4586L6.57778 10.923L5.9376 11.6913L10.1803 15.2268L10.8205 14.4586ZM11.0004 14.8427V6.35736H10.0004V14.8427H11.0004ZM16.9351 17.0347C13.3813 20.5884 7.61949 20.5884 4.06572 17.0347L3.35861 17.7418C7.30291 21.6861 13.6979 21.6861 17.6422 17.7418L16.9351 17.0347ZM4.06572 17.0347C0.511948 13.4809 0.511948 7.7191 4.06572 4.16533L3.35861 3.45822C-0.585683 7.40252 -0.585683 13.7975 3.35861 17.7418L4.06572 17.0347ZM4.06572 4.16533C7.61949 0.611557 13.3813 0.611557 16.9351 4.16533L17.6422 3.45822C13.6979 -0.486074 7.30291 -0.486074 3.35861 3.45822L4.06572 4.16533ZM16.9351 4.16533C20.4888 7.7191 20.4888 13.4809 16.9351 17.0347L17.6422 17.7418C21.5865 13.7975 21.5865 7.40252 17.6422 3.45822L16.9351 4.16533Z" fill="#53B746"/></svg></a> --}}
=======
																@if(isset($mortgagedocuments) && $mortgagedocuments !== NULL && $mortgagedocuments !== '')
																	<a class="btn-outline-secondary" href="{{route('download.file', ['filename' => $mortgagedocuments]) }}">Download <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.0631 11.6913C15.2753 11.5145 15.3039 11.1992 15.1271 10.9871C14.9504 10.7749 14.6351 10.7462 14.4229 10.923L15.0631 11.6913ZM10.5004 14.8427L10.1803 15.2268C10.3657 15.3813 10.635 15.3813 10.8205 15.2268L10.5004 14.8427ZM6.57778 10.923C6.36564 10.7462 6.05036 10.7749 5.87358 10.987C5.6968 11.1992 5.72546 11.5145 5.9376 11.6913L6.57778 10.923ZM11.0004 6.35736C11.0004 6.08122 10.7765 5.85736 10.5004 5.85736C10.2242 5.85736 10.0004 6.08122 10.0004 6.35736H11.0004ZM14.4229 10.923L10.1803 14.4586L10.8205 15.2268L15.0631 11.6913L14.4229 10.923ZM10.8205 14.4586L6.57778 10.923L5.9376 11.6913L10.1803 15.2268L10.8205 14.4586ZM11.0004 14.8427V6.35736H10.0004V14.8427H11.0004ZM16.9351 17.0347C13.3813 20.5884 7.61949 20.5884 4.06572 17.0347L3.35861 17.7418C7.30291 21.6861 13.6979 21.6861 17.6422 17.7418L16.9351 17.0347ZM4.06572 17.0347C0.511948 13.4809 0.511948 7.7191 4.06572 4.16533L3.35861 3.45822C-0.585683 7.40252 -0.585683 13.7975 3.35861 17.7418L4.06572 17.0347ZM4.06572 4.16533C7.61949 0.611557 13.3813 0.611557 16.9351 4.16533L17.6422 3.45822C13.6979 -0.486074 7.30291 -0.486074 3.35861 3.45822L4.06572 4.16533ZM16.9351 4.16533C20.4888 7.7191 20.4888 13.4809 16.9351 17.0347L17.6422 17.7418C21.5865 13.7975 21.5865 7.40252 17.6422 3.45822L16.9351 4.16533Z" fill="#53B746"/></svg></a>
																@endif
>>>>>>> 7ad1e6a978b7d41d29ea8861a388803606c3d504
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
																<div class="quotes-detail-item d-flex align-items-center justify-content-between">
																	<div class="quotes-detail-item-title">
																		<svg class="me-2" width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77148 1.35645V3.75645" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.1719 1.35645V3.75645" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M1.17188 7.02832H14.7719" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.1715 6.55664V13.3566C15.1715 15.7566 13.9715 17.3566 11.1715 17.3566H4.77148C1.97148 17.3566 0.771484 15.7566 0.771484 13.3566V6.55664C0.771484 4.15664 1.97148 2.55664 4.77148 2.55664H11.1715C13.9715 2.55664 15.1715 4.15664 15.1715 6.55664Z" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.9278 10.7164H10.935" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.9278 13.1163H10.935" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.96787 10.7164H7.97506" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.96787 13.1163H7.97506" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.00693 10.7164H5.01412" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.00693 13.1163H5.01412" stroke="#0A84FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
																		<strong>21  Nov  2023 , Tue</strong>
																	</div>
																	<div class="quotes-detail-item-content"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editquotepopup">View details</a></div>
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
																	<a class="btn-primary d-block" href="#" data-bs-toggle="modal" data-bs-target="#sendquotepopup">Send a new quote</a>
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
										@if(isset($images) && is_array($images) && count($images) > 0)
                                @foreach($images as $img)
                            <div class="item" data-category="images">
                                    <a class="image-gallery-popup" href="{{asset('frontend-assets/images/gallery-img-1.png')}}">
                                        <img src="{{ asset('storage/project_images/'.$img) }}" alt="gallery-img" width="170" height="150">
                                    </a>
                            </div>
                            @endforeach
                            @endif
							{{--<div class="item" data-category="images">
								<a class="image-gallery-popup" href="{{asset('frontend-assets/images/gallery-img-1.png')}}">
									<img src="{{asset('frontend-assets/images/gallery-img-1.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>--}}

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

							{{--<div class="item" data-category="images recentwork">
								<a class="image-gallery-popup" href="images/gallery-img-4.png">
									<img src="{{asset('frontend-assets/images/gallery-img-4.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>

							<div class="item" data-category="images">
								<a class="image-gallery-popup" href="images/gallery-img-5.png">
									<img src="{{asset('frontend-assets/images/gallery-img-5.png')}}" alt="gallery-img" width="170" height="150">
								</a>
							</div>--}}

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
	<div class="modal fade sendquotepopup" id="sendquotepopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabeltitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title" id="staticBackdropLabeltitle">Send a new quote</div>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
				</div>
				<div class="modal-body">
					<form id="addproject" action="thankyou.html" novalidate="novalidate">
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<div class="field-wrap">
									<div class="form-label">
										<label for="name">Scheduled date<span>*</span></label>
									</div>
									<div class="form-element">
										<input id="name" type="date" name="date" placeholder="21  Nov  2023 , Tue">
										<!-- <span class="input-icon">
											<svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.96509 1.44556V4.44556" stroke="#2C2C2E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.9651 1.44556V4.44556" stroke="#2C2C2E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M1.46509 8.53555H18.4651" stroke="#2C2C2E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M18.9651 7.94556V16.4456C18.9651 19.4456 17.4651 21.4456 13.9651 21.4456H5.96509C2.46509 21.4456 0.965088 19.4456 0.965088 16.4456V7.94556C0.965088 4.94556 2.46509 2.94556 5.96509 2.94556H13.9651C17.4651 2.94556 18.9651 4.94556 18.9651 7.94556Z" stroke="#2C2C2E" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.6598 13.1456H13.6688" stroke="#2C2C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.6598 16.1456H13.6688" stroke="#2C2C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.96057 13.1456H9.96955" stroke="#2C2C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.96057 16.1456H9.96955" stroke="#2C2C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.2594 13.1456H6.26838" stroke="#2C2C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.2594 16.1456H6.26838" stroke="#2C2C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
										</span> -->
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="field-wrap">
									<div class="form-label">
										<label for="name">Scheduled time<span>*</span></label>
									</div>
									<div class="row">
										<div class="form-group col-12 col-md-6">
											<div class="form-element">
												<div class="input-group">
													<input type="text" name="from" placeholder="9:00am">
													<span class="input-group-text" id="inputGroup-sizing-default">From</span>
												</div>
											</div>
										</div>
										<div class="form-group col-12 col-md-6">
											<div class="form-element">
												<div class="input-group">
													<input type="text" name="to" placeholder="5:00am">
													<span class="input-group-text" id="inputGroup-sizing-default">to</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<div class="field-wrap">
									<div class="form-label">
										<label for="name">Quote price*<span>*</span></label>
									</div>
									<div class="form-element">
										<input id="name" type="text" name="price" placeholder="$2,000">
										<span class="input-icon">
											<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.67212 13.3298C7.67212 14.6198 8.66212 15.6598 9.89212 15.6598H12.4021C13.4721 15.6598 14.3421 14.7498 14.3421 13.6298C14.3421 12.4098 13.8121 11.9798 13.0221 11.6998L8.99212 10.2998C8.20212 10.0198 7.67212 9.58984 7.67212 8.36984C7.67212 7.24984 8.54212 6.33984 9.61212 6.33984H12.1221C13.3521 6.33984 14.3421 7.37984 14.3421 8.66984" stroke="#53B746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.0002 5V17" stroke="#53B746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.0002 21C16.5231 21 21.0002 16.5228 21.0002 11C21.0002 5.47715 16.5231 1 11.0002 1C5.4774 1 1.00024 5.47715 1.00024 11C1.00024 16.5228 5.4774 21 11.0002 21Z" stroke="#53B746" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group col-12 col-md-6">
								<div class="field-wrap">
									<div class="form-label">
										<label for="name">Description<span>*</span></label>
									</div>
									<div class="form-element">
										<input id="name" type="text" name="description" placeholder="Please call us for further discussion">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<div class="field-wrap">
									<div class="form-label">
										<label for="callphone">Call<span>*</span></label>
									</div>
									<div class="form-element">
										<input id="callphone" type="text" name="callphone" placeholder="852 - 562 - 5112">
									</div>
								</div>
							</div>
							<div class="form-group col-12 col-md-6">
								<div class="field-wrap">
									<div class="form-label">
										<label for="email">Email<span>*</span></label>
									</div>
									<div class="form-element">
										<input id="email" type="text" name="email" placeholder="Johndoe4@gmail.com">
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
										<input id="billing" type="text" name="billing" placeholder="Enter billing info">
									</div>
								</div>
							</div>
							<div class="form-group col-12 col-md-6">
								<div class="field-wrap">
									<div class="form-label">
										<label for="mortgagecompany">Mortgage company<span>*</span></label>
									</div>
									<div class="form-element">
										<input id="mortgagecompany" type="text" name="mortgagecompany" placeholder="Enter mortgage company name">
									</div>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="form-group button-wrap col-md-5">
								<div class="field-wrap text-center">
									<button type="submit" class="btn btn-primary d-block w-100">Send quotation</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Quote Modal -->
	<div class="modal fade quotepopup" id="editquotepopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
						<div class="quotepopup-button-wrap d-flex justify-content-center">
							<a class="btn-primary d-block" href="javascript:void(0)">Edit quote details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



@endsection

@section('scripts')
<script>
$('#generalinfotab').on("click",function(){
	$('#nav-general-info').removeClass('show active');
	$('#nav-design-studio').addClass('show active');
})

$('#designStudiotab').on("click",function(){
	$('#nav-design-studio').removeClass('show active');
	$('#nav-documentation').addClass('show active');
})


</script>
@endsection
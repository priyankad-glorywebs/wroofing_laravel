@extends('layouts.front.master')
@section('title', 'Contact-us Page')
 
@section('content')

<div class="breadcrumb-wrap d-lg-none">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="login.html"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
     <section class="stepform-sec">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="signin-notes d-lg-none">Reset now</div>
					<div class="section-title">View Profile</div>
					<div class="step-count">
					</div>
					<div class="section-subtitle">Let’s know a little more about you...</div>
				</div>
				<div class="col-12">
			
				    <form id="updateprofile-customerform" action="{{route('customer.profile.update')}}" method="post" enctype="multipart/form-data">
					 @csrf
						
                        @php
                        $user= auth()->user();
                        @endphp
                        <input type="hidden" id="user_id"  name="user_id" value="{{$user->id??''}}">
						<div class="step-2" style="">
							<div class="row">
							@if(session('success'))
							<div class="alert alert-success alert-dismissible fade show">
								{{ session('success') }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							@endif
						
								<div class="form-group col-12">
									<div class="field-wrap">
										<div class="form-label">
											<label for="uname">Name<span>*</span></label>
										</div>
										<div class="form-element">
											<input id="name" type="text" value="{{ old('name', $user->name ?? '') }}" name="name" placeholder="John doe">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
									</div>
								</div>
								<div class="form-group col-12">
									<div class="field-wrap">
										<div class="form-label">
											<label for="email">Email<span>*</span></label>
										</div>
										<div class="form-element">
											<input id="email" type="email" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Enter your email address">
                                            @error('uemail')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
									</div>
								</div>


								<div class="form-group col-12">
									
									<div class="field-wrap">
										<div class="form-element">
											<div class="upload-img-wrap">
												<input id="uploadimage" type="file" name="customer_profile" accept="image/jpg, image/jpeg, image/png">
												<label for="uploadimage">
													<div class="upload-img-icon">
														<img src="{{asset('frontend-assets/images/img-icon.svg')}}" alt="img-icon" width="30" height="30">
													</div>
                                                    @if(isset($user->profile_image) && $user->profile_image !== NULL && $user->profile_image !== '')
                                                    <div class="upload-img-text">{{$user->profile_image??''}}</div>
                                                    @else
                                                    <div class="upload-img-text">Upload your picture</div>
                                                    @endif
													<div class="upload-img-formate">(PNG or JPGE file accepted)</div>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group col-12">
									<div class="field-wrap">
										<div class="form-label">
											<label for="contactnumber">Contact number<span>*</span></label>
										</div>
										<div class="form-element">
											<input type="text" value="{{ old('contactnumber', $user->contact_number ?? '') }}" id="contactnumber" name="contactnumber" placeholder="Enter your contact number">
                                            @error('contactnumber')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
									</div>
								</div>
								<div class="form-group col-12">
									<div class="field-wrap">
										<div class="form-label">
											<label for="zipcode">Zip code<span>*</span></label>
										</div>
										<div class="form-element">
											<input id="zipcode" type="text" value="{{ old('zipcode', $user->zip_code ?? '') }}" name="zipcode" placeholder="Enter zip code">
                                            @error('zipcode')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
									</div>
								</div>
								<div class="form-group button-wrap col-md-12">
									<div class="field-wrap">
										<button type="submit" class="btn btn-primary d-block w-100">Get started</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('scripts')
<script>
$("#updateprofile-customerform button[type='submit']").click(function () {
		var form = $("#updateprofile-customerform");
		form.validate({
			errorElement: 'span',
			errorClass: 'help-block',
			rules: {
				name: {
					required: true,
				},
				email: {
					required: true,
					email: true
				},
				// contactnumber: {
				// 	required: true,
				// 	minlength: 9,
				// 	maxlength: 14,
				// },
				// zipcode: {
				// 	required: true,
                //     minlength: 10,
                //     maxlength: 6,
                // },
			},
		});
	});
</script>
@endsection
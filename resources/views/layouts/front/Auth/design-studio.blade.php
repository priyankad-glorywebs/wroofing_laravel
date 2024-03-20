@extends('layouts.front.master')
@section('title', 'Register ')
@section('content')


<section class="stepform-sec">


    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="signin-notes d-lg-none">Reset now</div>
                <div class="section-title">Let us know</div>
                <div class="step-count">
                    <div class="step-count-title">Step 1 out of 2</div>
                    <div class="step-count-progress current-step-1"></div>
                </div>
                <div class="section-subtitle">Let’s know a little more about you...</div>
            </div>
            <div class="col-12 customer-section">
                {!! Form::open(['route' => 'register','method'=>'POST','enctype'=>'multipart/form-data','id'=>'register']) !!}

                    @csrf
                    <div class="step-1">
                        <div class="form-label-ques text-center">Are you a ...</div>
                        <div class="row">
                            <div class="form-group col-6">
                                <div class="field-wrap">
                                    <div class="form-label type-of-customer-item">
                                        <label for="customer">
                                            <div class="type-of-customer">
                                                <img src="{{asset('frontend-assets/images/customer.svg')}}" alt="customer" width="270" height="230">
                                            </div>
                                            <div class="customer-type-wrap d-flex align-items-center justify-content-between">
                                                <div class="customer-type">Customer</div>
                                                <input id="customer" type="radio" checked="checked" value="customer" name="areyoua">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="field-wrap">
                                    <div class="form-label type-of-customer-item">
                                        <label for="contractor">
                                            <div class="type-of-customer">
                                                <img src="{{asset('frontend-assets/images/contractor.svg')}}" alt="customer" width="270" height="230">
                                            </div>
                                            <div class="customer-type-wrap d-flex align-items-center justify-content-between">
                                                <div class="customer-type">Contractor</div>
                                                <input id="contractor" value="contractor" type="radio" name="areyoua">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary btn-step-1" >Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="step-2 customer-field-wrap" style="display: none;">
                        <div class="row">
                            <div class="form-group col-12">
                                <div class="field-wrap">
                                    <div class="form-label">
                                        <label for="name">Name<span>*</span></label>
                                    </div>
                                    <div class="form-element">
                                        <input type="text" value="{{old('name')}} name="name" placeholder="John doe">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="field-wrap">
                                    <div class="form-label">
                                        <label for="email">Email<span>*</span></label>
                                    </div>
                                    <div class="form-element">
                                        <input type="email" value="{{old('email')}}" name="email" placeholder="john@example.com">
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <div class="field-wrap">
                                    <div class="form-label">
                                        <label for="password">Enter new password<span>*</span></label>
                                    </div>
                                  
                                    <div class="form-element">
                                        <input type="password"  name="password" placeholder="Enter new password">
                                        <span class="input-icon password-icon">
                                            <div class="password-icon-view"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.9271 9.74097C12.9271 11.3529 11.619 12.6555 10.0002 12.6555C8.38137 12.6555 7.07324 11.3529 7.07324 9.74097C7.07324 8.12901 8.38137 6.82642 10.0002 6.82642C11.619 6.82642 12.9271 8.12901 12.9271 9.74097Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 16.4737C12.8861 16.4737 15.5759 14.7803 17.4481 11.8495C18.184 10.7016 18.184 8.77211 17.4481 7.6242C15.5759 4.69337 12.8861 3 10 3C7.11395 3 4.42412 4.69337 2.55187 7.6242C1.81604 8.77211 1.81604 10.7016 2.55187 11.8495C4.42412 14.7803 7.11395 16.4737 10 16.4737Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                                            <div class="password-icon-hide"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.024 7.97605L7.97599 12.024C7.45599 11.504 7.13599 10.792 7.13599 10C7.13599 8.41605 8.416 7.13605 10 7.13605C10.792 7.13605 11.504 7.45605 12.024 7.97605Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.656 5.01597C13.256 3.95997 11.656 3.38397 9.99995 3.38397C7.17592 3.38397 4.5439 5.04797 2.71188 7.92797C1.99187 9.05597 1.99187 10.952 2.71188 12.08C3.34389 13.072 4.07989 13.928 4.8799 14.616" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.13599 16.024C8.048 16.408 9.016 16.616 10 16.616C12.824 16.616 15.4561 14.952 17.2881 12.072C18.0081 10.944 18.0081 9.04805 17.2881 7.92005C17.0241 7.50405 16.7361 7.11205 16.4401 6.74405" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.808 10.56C12.6 11.688 11.68 12.608 10.552 12.816" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.97606 12.024L2 18" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M18 2L12.0239 7.976" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                                        </span>
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="field-wrap">
                                    <div class="form-label">
                                        <label for="password_confirmation">Confirm new password<span>*</span></label>
                                    </div>
                                    <div class="form-element">
                                        <input type="password" name="password_confirmation" placeholder="Confirm new password">
                                        <span class="input-icon password-icon">
                                            <div class="password-icon-view"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.9271 9.74097C12.9271 11.3529 11.619 12.6555 10.0002 12.6555C8.38137 12.6555 7.07324 11.3529 7.07324 9.74097C7.07324 8.12901 8.38137 6.82642 10.0002 6.82642C11.619 6.82642 12.9271 8.12901 12.9271 9.74097Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 16.4737C12.8861 16.4737 15.5759 14.7803 17.4481 11.8495C18.184 10.7016 18.184 8.77211 17.4481 7.6242C15.5759 4.69337 12.8861 3 10 3C7.11395 3 4.42412 4.69337 2.55187 7.6242C1.81604 8.77211 1.81604 10.7016 2.55187 11.8495C4.42412 14.7803 7.11395 16.4737 10 16.4737Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                                            <div class="password-icon-hide"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.024 7.97605L7.97599 12.024C7.45599 11.504 7.13599 10.792 7.13599 10C7.13599 8.41605 8.416 7.13605 10 7.13605C10.792 7.13605 11.504 7.45605 12.024 7.97605Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.656 5.01597C13.256 3.95997 11.656 3.38397 9.99995 3.38397C7.17592 3.38397 4.5439 5.04797 2.71188 7.92797C1.99187 9.05597 1.99187 10.952 2.71188 12.08C3.34389 13.072 4.07989 13.928 4.8799 14.616" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.13599 16.024C8.048 16.408 9.016 16.616 10 16.616C12.824 16.616 15.4561 14.952 17.2881 12.072C18.0081 10.944 18.0081 9.04805 17.2881 7.92005C17.0241 7.50405 16.7361 7.11205 16.4401 6.74405" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.808 10.56C12.6 11.688 11.68 12.608 10.552 12.816" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.97606 12.024L2 18" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/><path d="M18 2L12.0239 7.976" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                                        </span>
                                    </div>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <div class="field-wrap">
                                    <div class="form-element">
                                        <div class="upload-img-wrap">
                                            <input id="uploadimage" type="file" name="profile_image" accept="image/jpg, image/jpeg, image/png">

                                            <label for="uploadimage">
                                                <div class="upload-img-icon">
                                                    <img src="{{asset('frontend-assets/images/img-icon.svg')}}" alt="img-icon" width="30" height="30">
                                                </div>
                                                <div class="upload-img-text">Upload your picture</div>
                                                <div class="upload-img-formate">(PNG or JPGE file accepted)</div>
                                            </label>
                                        </div>
                                        {{-- @error('profile_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-12">
                                <div class="field-wrap">
                                    <div class="form-label">
                                        <label for="contact_number">Contact number<span>*</span></label>
                                    </div>
                                    <div class="form-element">
                                        <input type="number" name="contact_number" placeholder="Enter Contact Number">
                                    </div>
                                    @error('contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="field-wrap">
                                    <div class="form-label">
                                        <label for="zip_code">Zip code<span>*</span></label>
                                    </div>
                                   
                                    <div class="form-element">
                                        <input type="number" name="zip_code" placeholder="Enter Zip code">
                                    </div>
                                    @error('zip_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group button-wrap col-md-12">
                                <div class="field-wrap">
                                     <input type="submit" class="btn btn-primary d-block w-100" value="Get started"> 
                                    {{-- <a href="project-list.html" class="btn btn-primary d-block w-100">Get started</a> --}}
                                </div>
                            </div>
                            <div class="backto-login text-center"><a href="javascript:void(0)"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></div>
                        </div>
                    </div>
                    {{--<div class="step-2 contractor-field-wrap" style="display: none;">
							<div class="row">
								<div class="form-group col-12 col-md-6">
									<div class="field-wrap">
										<div class="form-label">
											<label for="uname">Name<span>*</span></label>
										</div>
										<div class="form-element">
											<input id="uname" type="text" name="uname" placeholder="John doe">
										</div>
									</div>
								</div>
								<div class="form-group col-12 col-md-6">
									<div class="field-wrap">
										<div class="form-label">
											<label for="uemail">Email<span>*</span></label>
										</div>
										<div class="form-element">
											<input id="uemail" type="email" name="uemail" placeholder="Enter your email address">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-12 col-md-6">
									<div class="field-wrap">
										<div class="form-label">
											<label for="upassword">Enter new password<span>*</span></label>
										</div>
										<div class="form-element">
											<input id="upassword" type="password" name="upassword" placeholder="Enter new password">
											<span class="input-icon password-icon">
												<div class="password-icon-view"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.9271 9.74097C12.9271 11.3529 11.619 12.6555 10.0002 12.6555C8.38137 12.6555 7.07324 11.3529 7.07324 9.74097C7.07324 8.12901 8.38137 6.82642 10.0002 6.82642C11.619 6.82642 12.9271 8.12901 12.9271 9.74097Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10 16.4737C12.8861 16.4737 15.5759 14.7803 17.4481 11.8495C18.184 10.7016 18.184 8.77211 17.4481 7.6242C15.5759 4.69337 12.8861 3 10 3C7.11395 3 4.42412 4.69337 2.55187 7.6242C1.81604 8.77211 1.81604 10.7016 2.55187 11.8495C4.42412 14.7803 7.11395 16.4737 10 16.4737Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
												<div class="password-icon-hide"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.024 7.97605L7.97599 12.024C7.45599 11.504 7.13599 10.792 7.13599 10C7.13599 8.41605 8.416 7.13605 10 7.13605C10.792 7.13605 11.504 7.45605 12.024 7.97605Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M14.656 5.01597C13.256 3.95997 11.656 3.38397 9.99995 3.38397C7.17592 3.38397 4.5439 5.04797 2.71188 7.92797C1.99187 9.05597 1.99187 10.952 2.71188 12.08C3.34389 13.072 4.07989 13.928 4.8799 14.616" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7.13599 16.024C8.048 16.408 9.016 16.616 10 16.616C12.824 16.616 15.4561 14.952 17.2881 12.072C18.0081 10.944 18.0081 9.04805 17.2881 7.92005C17.0241 7.50405 16.7361 7.11205 16.4401 6.74405" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12.808 10.56C12.6 11.688 11.68 12.608 10.552 12.816" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7.97606 12.024L2 18" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 2L12.0239 7.976" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
											</span>
										</div>
									</div>
								</div>

								<div class="form-group col-12 col-md-6">
									<div class="field-wrap">
										<div class="form-label">
											<label for="uconfirmpassword">Confirm new password<span>*</span></label>
										</div>
										<div class="form-element">
											<input id="uconfirmpassword" type="teext" name="uconfirmpassword" placeholder="Confirm new password">
											<span class="input-icon password-icon">
												<div class="password-icon-view"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.9271 9.74097C12.9271 11.3529 11.619 12.6555 10.0002 12.6555C8.38137 12.6555 7.07324 11.3529 7.07324 9.74097C7.07324 8.12901 8.38137 6.82642 10.0002 6.82642C11.619 6.82642 12.9271 8.12901 12.9271 9.74097Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10 16.4737C12.8861 16.4737 15.5759 14.7803 17.4481 11.8495C18.184 10.7016 18.184 8.77211 17.4481 7.6242C15.5759 4.69337 12.8861 3 10 3C7.11395 3 4.42412 4.69337 2.55187 7.6242C1.81604 8.77211 1.81604 10.7016 2.55187 11.8495C4.42412 14.7803 7.11395 16.4737 10 16.4737Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
												<div class="password-icon-hide"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.024 7.97605L7.97599 12.024C7.45599 11.504 7.13599 10.792 7.13599 10C7.13599 8.41605 8.416 7.13605 10 7.13605C10.792 7.13605 11.504 7.45605 12.024 7.97605Z" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M14.656 5.01597C13.256 3.95997 11.656 3.38397 9.99995 3.38397C7.17592 3.38397 4.5439 5.04797 2.71188 7.92797C1.99187 9.05597 1.99187 10.952 2.71188 12.08C3.34389 13.072 4.07989 13.928 4.8799 14.616" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7.13599 16.024C8.048 16.408 9.016 16.616 10 16.616C12.824 16.616 15.4561 14.952 17.2881 12.072C18.0081 10.944 18.0081 9.04805 17.2881 7.92005C17.0241 7.50405 16.7361 7.11205 16.4401 6.74405" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12.808 10.56C12.6 11.688 11.68 12.608 10.552 12.816" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7.97606 12.024L2 18" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 2L12.0239 7.976" stroke="#2C2C2E" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-12 col-md-6">
									<div class="field-wrap">
										<div class="form-element">
											<div class="upload-img-wrap">
												<input id="uploadimagecontractor" type="file" name="uploadimagecontractor" accept="image/jpg, image/jpeg, image/png">
												<label for="uploadimagecontractor">
													<div class="upload-img-icon">
														<img src="images/img-icon.svg" alt="img-icon" width="30" height="30">
													</div>
													<div class="upload-img-text">Upload your picture</div>
													<div class="upload-img-formate">(PNG or JPGE file accepted)</div>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group col-12 col-md-6">
									<div class="field-wrap">
										<div class="form-element">
											<div class="upload-img-wrap">
												<input id="uploadimagerecentwork" type="file" name="uploadimagerecentwork[]" multiple accept="image/jpg, image/jpeg, image/png">
												<label for="uploadimagerecentwork">
													<div class="upload-img-icon">
														<img src="images/img-icon.svg" alt="img-icon" width="30" height="30">
													</div>
													<div class="upload-img-text">Upload your recent work photos and videos</div>
													<div class="upload-img-formate">(MP4  video file accepted)</div>
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-12 col-md-6">
									<div class="field-wrap">
										<div class="form-label">
											<label for="companyname">Company name<span>*</span></label>
										</div>
										<div class="form-element">
											<input type="text" id="companyname" name="contactnumber" placeholder="Enter your contact number">
										</div>
									</div>
								</div>
								<div class="form-group col-12 col-md-6">
									<div class="field-wrap">
										<div class="form-label">
											<label for="contactnumber">Contact number<span>*</span></label>
										</div>
										<div class="form-element">
											<input type="text" id="contactnumber" name="contactnumber" placeholder="Enter your contact number">
										</div>
									</div>
								</div>
								<div class="form-group col-12 col-md-6">
									<div class="field-wrap">
										<div class="form-label">
											<label for="zipcode">Zip code<span>*</span></label>
										</div>
										<div class="form-element">
											<input id="zipcode" type="text" name="zipcode" placeholder="Enter zip code">
										</div>
									</div>
								</div>
							</div>
							<div class="row justify-content-center">
								<div class="form-group button-wrap col-md-6">
									<div class="field-wrap">
										<input type="submit" class="btn btn-primary d-block w-100" value="Get started"/>
										<!-- <a href="project-list.html" class="btn btn-primary d-block w-100">Get started</a> -->
									</div>
								</div>
								<div class="backto-login text-center"><a href="javascript:void(0)"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path></svg> Back</a></div>
							</div>
						</div>
                    </div>--}}
                        <!-- </form> -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@endsection 

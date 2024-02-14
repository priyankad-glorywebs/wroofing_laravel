@extends('layouts.front.master')
@section('title', 'Design Studio')
 
@section('content')

<div class="breadcrumb-title-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('project.list')}}"><svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.13654 8L1.25522 5.11869C0.914945 4.77841 0.914945 4.22159 1.25522 3.88131L4.13654 1" stroke="#0A84FF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg> Back</a></li>
                </ol>
            </div>
        </div>
        <div class="row breadcrumb-title d-none d-lg-flex">
            <div class="col-12 col-lg-6">
               @php
                if(isset($project_id)){
                    $projectId = base64_decode($project_id);
                    $data = \App\Models\Project::where('id',$projectId)->first();
                }
                @endphp
                <div class="section-title">
                    @if(isset($data))
                    {{$data->title}}
                    @else
                    Roof project 1
                    @endif
                   </div>
            </div>
            <!-- <div class="col-12 col-lg-6 text-end">
                <a class="btn-primary" href="#">Add a new project</a>
            </div> -->
        </div>
    </div>
</div>


<div class="project-list-sec">
    <div class="container">
        <div class="row d-lg-none">
            <div class="col-12">
                <div class="signin-notes">Get started</div>
                <div class="section-title text-center">Roof project 1</div>
            </div>
        </div>
        <div class="row">
        <div class="col-6 col-md-4 col-lg-3">
                <div class="project-list-item">
                    <div class="project-item-img">
                        <img src="{{asset('frontend-assets/images/project-detail-2.png')}}" alt="project img" width="270" height="230">
                    </div>
                    <div class="project-item-title-wrap d-flex align-items-center justify-content-between">
                        <div class="project-item-title">General Info</div>
                        <div class="project-item-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </div>
                    {{-- <a class="project-list-item-link" href="design-studio-1.html?step=step2"></a> --}}
                    <a class="project-list-item-link" href="{{route('general.info', ['project_id' => $project_id])}}"></a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="project-list-item">
                    <div class="project-item-img">
                        <img src="{{asset('frontend-assets/images/project-detail-1.png') }}" alt="project img" width="270" height="230">
                    </div>
                    <div class="project-item-title-wrap d-flex align-items-center justify-content-between">
                        <div class="project-item-title">Design Studio</div>
                        <div class="project-item-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </div>
                    {{-- <a class="project-list-item-link" href="design-studio-1.html"></a> --}}

                    <a class="project-list-item-link" href="{{ route('design.studio', ['project_id' => $project_id]) }}"></a>

                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3">                      
                <div class="project-list-item">
                    <div class="project-item-img">
                        <img src="{{asset('frontend-assets/images/project-detail-3.png')}}" alt="project img" width="270" height="230">
                    </div>
                    <div class="project-item-title-wrap d-flex align-items-center justify-content-between">
                        <div class="project-item-title">Documents</div>
                        <div class="project-item-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </div>
                    {{-- <a class="project-list-item-link" href="design-studio-1.html?step=step3"></a> --}}
                    <a class="project-list-item-link" href="{{route('documentation', ['project_id' => $project_id])}}"></a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="project-list-item">
                    <div class="project-item-img">
                        <img src="{{asset('frontend-assets/images/project-detail-4.png')}}" alt="project img" width="270" height="230">
                    </div>
                    <div class="project-item-title-wrap d-flex align-items-center justify-content-between">
                        <div class="project-item-title">Contractor Portal</div>
                        <div class="project-item-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </div>
                    <!-- <a class="project-list-item-link" href="contractor.html"></a> -->
                    <a class="project-list-item-link" href="{{route('contractor.list')}}"></a>
                </div>
            </div>
           {{-- <div class="col-6 col-md-4 col-lg-3">
                <div class="project-list-item">
                    <div class="project-item-img">
                        <img src="{{asset('frontend-assets/images/project-detail-5.png')}}" alt="project img" width="270" height="230">
                    </div>
                    <div class="project-item-title-wrap d-flex align-items-center justify-content-between">
                        <div class="project-item-title">Earn Extra Credits</div>
                        <div class="project-item-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </div>
                    <a class="project-list-item-link" href="design-studio-1.html"></a>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="project-list-item">
                    <div class="project-item-img">
                        <img src="{{asset('frontend-assets/images/project-list-7.png')}}" alt="project img" width="270" height="230">
                    </div>
                    <div class="project-item-title-wrap d-flex align-items-center justify-content-between">
                        <div class="project-item-title">Have Another Project?</div>
                        <div class="project-item-icon"><svg width="9" height="17" viewBox="0 0 9 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 16L7.43043 9.82576C8.18986 9.09659 8.18986 7.90341 7.43043 7.17424L1 1" stroke="#0A84FF" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                    </div>
                    <a class="project-list-item-link" href="design-studio-1.html"></a>
                </div>
            </div>--}}
        </div>
        <!-- <div class="row d-lg-none">
            <div class="col-12">
                <a class="btn-primary d-block" href="#">Add a new project</a>
            </div>
        </div> -->
    </div>
</div>
@endsection
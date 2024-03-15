	@if($groupedData)
	@foreach($groupedData as $date => $mediaItems)
	<h6>{{ $date }}</h6>
	@foreach($mediaItems as $mediaItem)
	@if($mediaItem->media_type == 'image') 
	<div class="design-studio-img-items project-detail-photos-item-img gallery_container">
	@php
	$authuser = \Auth::user()->id;

	@endphp 

	@if($authuser == $mediaItem->created_by??'')
	<button type="button" class="remove-img" data-media-item-id="{{ $mediaItem->id }}">X</button>
	@endif	
	<a class="lightbox" href="{{ asset('storage/project_images/'.$mediaItem->project_image)  }}">
			<img src="{{ asset('storage/project_images/'.$mediaItem->project_image)  }}" alt="Image">
		</a>
		<span class="image-upload-time">{{$mediaItem->time}}</span>
	</div>
	@elseif($mediaItem->media_type == 'video')
	<div class="design-studio-img-items project-detail-photos-item-img video_container ">

	@php
	$authuser = \Auth::user()->id;
	@endphp 
	@if($authuser == $mediaItem->created_by??'')
		<button type="button" class="remove-img" data-media-item-id="{{ $mediaItem->id }}">X</button>
	@endif  
	<a class="image-gallery-popup video_model" href="{{ asset('storage/project_images/'.$mediaItem->project_image) }}">
			<video width="150" height="150" controls>
				<source src="{{ asset('storage/project_images/'.$mediaItem->project_image) }}" type="video/mp4">
				Your browser does not support the video tag.
			</video>
		</a>
		<span class="image-upload-time">{{$mediaItem->time}}</span>
	</div>
	@endif 
	@endforeach
	@endforeach
	@endif
		</div>

<script type="text/javascript">

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
		   url: "{{ route('delete.image.designstudio.contractor', ['project_id' => ':project_id', 'file' => ':file']) }}"
                .replace(':project_id', project_id)
                .replace(':file', file),

            type: 'post',
			data:{_token:'{{ csrf_token() }}'},
            success: function (response) {

				var file = $(this).closest('media-item-id'); 

				currentButton.closest('.design-studio-img-items').remove();

            },
            error: function (error) {
                console.error('Error deleting file:', error);
            }
        });
 		  }else{
				//alert("out")
			}
        });
</script>



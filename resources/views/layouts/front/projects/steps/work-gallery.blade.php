@foreach($groupedData as $date => $mediaItems)
 <h6>{{ $date }}</h6>
@foreach($mediaItems as $mediaItem)
    {{--@if($mediaItem->project_image == 'image') --}}
    <div class="design-studio-img-items">
        <button type="button" class="remove-img" data-media-item-id="{{ $mediaItem->id }}">X</button>
            <img src="{{ asset('storage/project_images/'.$mediaItem->project_image)  }}" alt="Image">
            <span class="image-upload-time">{{$mediaItem->time}}</span>
        @if($mediaItem->media_type == 'video')
            <video width="320" height="240" controls>
                <source src="{{ $mediaItem->media_url }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif
    </div>
@endforeach
@endforeach


<script>

$('.remove-img').on('click', function (e) {
		e.preventDefault();
    	var project_id = $('#project_id').val();
		var file = $(this).data('media-item-id'); 
		var isConfirmed = confirm('Are you sure you want to remove this file?');
            if (isConfirmed) {
				$.ajax({
            url: '/delete-image/' + project_id + '/' + file,
            type: 'post',
			data:{_token:'{{ csrf_token() }}'},
            success: function (response) {
                var file = $(this).closest('media-item-id'); 
                alert("File deleted");
            },
            error: function (error) {
                console.error('Error deleting file:', error);
            }
        });
 		  }else{
				alert("out")
			}
        });
    </script>
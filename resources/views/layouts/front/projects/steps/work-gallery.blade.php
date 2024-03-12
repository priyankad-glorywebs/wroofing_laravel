
{{--No images or videos found
@if($groupedData)
@foreach($groupedData as $date => $mediaItems)
    <h6>{{ $date }}</h6>
@foreach($mediaItems as $mediaItem)
    @if($mediaItem->media_type == 'image') 
    <div class="design-studio-img-items">
        <button type="button" class="remove-img" data-media-item-id="{{ $mediaItem->id }}">X</button>
                <img src="{{ asset('storage/project_images/'.$mediaItem->project_image)  }}" alt="Image">
            <span class="image-upload-time">{{$mediaItem->time}}</span>
        @elseif($mediaItem->media_type == 'video')
            <video width="150" height="150" controls>
                <source src="{{ asset('storage/project_images/'.$mediaItem->project_image) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <span class="image-upload-time">{{$mediaItem->time}}</span>

        @endif 
    </div>
    @endforeach
@endforeach
@endif--}}

            @if($groupedData)
            @foreach($groupedData as $date => $mediaItems)
            <h6>{{ $date }}</h6>
            @foreach($mediaItems as $mediaItem)
            @if($mediaItem->media_type == 'image') 
                <div class="design-studio-img-items gallery_container">
                    <button type="button" class="remove-img" data-media-item-id="{{ $mediaItem->id }}">X</button>
                    <a class="lightbox" href="{{ asset('storage/project_images/'.$mediaItem->project_image)  }}">
                    <img src="{{ asset('storage/project_images/'.$mediaItem->project_image)  }}" alt="Image">
                    </a>
                    <span class="image-upload-time">{{$mediaItem->time}}</span>
                </div>
                @elseif($mediaItem->media_type == 'video')
                <!-- <div class="video-container"> -->
                <div class="design-studio-img-items video-container">
                    <button type="button" class="remove-img" data-media-item-id="{{ $mediaItem->id }}">X</button>

                    <a class="image-gallery-popup video_model " href="{{ asset('storage/project_images/'.$mediaItem->project_image) }}">
                        <video width="150" height="150" controls>
                            <source src="{{ asset('storage/project_images/'.$mediaItem->project_image) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </a>
                    <span class="image-upload-time">{{$mediaItem->time}}</span>
                </div>	
            @endif 
                <!-- </div> -->
                @endforeach
                @endforeach
            @endif

							{{--<button type="submit" id="submit-all" class="btn btn-primary btn-studio-step-1">Submit and continue</button>--}}




<script>

      // Define App Namespace
  var popup = {
    // Initializer
    init: function() {
      popup.popupVideo();
    },
    popupVideo : function() {

    $('.video_model').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    gallery: {
          enabled:true
        }
  });

/* Image Popup*/ 
 $('.gallery_container').magnificPopup({
      delegate: 'a',
    type: 'image',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    gallery: {
          enabled:true
        }
  });

   }
  };
  popup.init($);
// });


$('.remove-img').on('click', function (e) {
		e.preventDefault();
    	var project_id = $('#project_id').val();
		var file = $(this).data('media-item-id'); 
        var currentButton = $(this);
		var isConfirmed = confirm('Are you sure you want to remove this file?');
            if (isConfirmed) {
				$.ajax({
            url: '/delete-image/' + project_id + '/' + file,
            type: 'post',
			data:{_token:'{{ csrf_token() }}'},
            success: function (response) {
                var file = $(this).closest('media-item-id'); 
               // alert("File deleted");
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
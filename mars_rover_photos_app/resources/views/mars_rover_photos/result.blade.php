<!DOCTYPE html>
<html>
<head>
    <title>Mars Rover Photos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('index') }}" class="btn btn-link mb-3">
                <img src="{{ asset('images/back.png') }}" alt="Back" class="back-icon">
            </a>
        </div>
        <div class="col-md-8 text-center">
            @if (!empty($photos['photos']))
                <h2 class="mb-4">Photos taken on {{ date('j F Y', strtotime($photos['photos'][0]['earth_date'])) }}</h2>
                <h2 class="mb-4">{{ $photos['photos'][0]['camera']['full_name'] }}</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($photos['photos'] as $index => $photo)
            <div class="col-md-4 mb-4">
                <div class="photo-frame">
                    <a href="#" class="photo-link" data-target="#photoModal"
                       data-photo-index="{{ $index }}" data-photo-id="{{ $photo['id'] }}">
                        <img src="{{ $photo['img_src'] }}" alt="Mars Rover Photo" class="img-fluid">
                    </a>
                </div>
            </div>
        @endforeach
        @else
            <p>No photos available for the selected date and camera.</p>
        @endif
    </div>
</div>

<!-- Модальное окно для полноразмерной картинки -->
<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img id="modal-image" src="" alt="Mars Rover Photo" class="img-fluid">
                <p>ID: <span id="modal-photo-id"></span></p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let photoLinks = document.querySelectorAll('.photo-link');

        photoLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                let photoIndex = this.getAttribute('data-photo-index');
                let photoId = this.getAttribute('data-photo-id');
                let photos = @json($photos['photos'] ?? []);

                if (photos && photos[photoIndex] && photos[photoIndex]['img_src']) {
                    let photoSrc = photos[photoIndex]['img_src'];
                    let modalImage = document.getElementById('modal-image');
                    let modalPhotoId = document.getElementById('modal-photo-id');

                    modalImage.src = photoSrc;
                    modalPhotoId.textContent = photoId;

                    $('#photoModal').modal('show');
                }
            });
        });
    });
</script>
</body>
</html>

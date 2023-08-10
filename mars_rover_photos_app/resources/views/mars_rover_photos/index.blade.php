@vite(['resources/css/app.css', 'resources/js/app.js'])
    <!DOCTYPE html>
<html>
<head>
    <title>Mars Rover Photos</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="POST" action="{{ route('get_photos') }}" class="mb-3">
                @csrf
                <div class="mb-3">
                    <label for="earth_date" class="form-label">Enter Date:</label>
                    <input type="date" class="form-control" name="earth_date" required>
                </div>
                <div class="mb-3">
                    <label for="camera" class="form-label">Select Camera:</label>
                    <select class="form-select" name="camera" required>
                        <option value="FHAZ">Front Hazard Avoidance Camera</option>
                        <option value="RHAZ">Rear Hazard Avoidance Camera</option>
                        <option value="MAST">Mast Camera</option>
                        <option value="CHEMCAM">Chemistry and Camera Complex</option>
                        <option value="MAHLI">Mars Hand Lens Imager</option>
                        <option value="NAVCAM">Navigation Camera</option>
                        <option value="MARDI">Mars Descent Imager</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-danger">Get Photos</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

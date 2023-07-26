<!-- resources/views/ckeditor_file_upload.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor Image Upload</title>
</head>
<body>
    <h2>CKEditor Image Upload</h2>
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="upload" accept="image/*">
        <button type="submit">Upload Image</button>
    </form>
</body>
</html>

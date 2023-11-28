<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="row">
          <div class="col-sm-8 mt-5">
            <form action="/create" method="POST">
                @csrf
                <input types"text" name="titulo" class="form-control mb-5" placeholder="Titulo"
                />
                <textarea class="form-control mt-5" name="description" id="editor"></textarea>
                <button class="btn btn-success mt-4" type="submit">Enviar</button>
            </form>
          </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor'), {
                ckfinder:{
                    uploadUrl: '{{route('ckeditor.upload'). '?_token='.csrf_token()}}'
                }
            } )

            .then( editor => {
                console.log( editor );
            } )
            .catch (error => {
                console.error (error);
            } );
    </script>
</body>
</html>

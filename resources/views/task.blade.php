<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .submit {
            padding-right: 35px;
            padding-left: 35px;
            border-radius: 10px;
            height: 45px;
        }

        .user {
            text-align: right;
        }
        .all{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row g-4">
            <div class="col-md-6 col-xl-12">
                @if(session()->has('success'))
                <div class="alert alert-dismissable alert success" style="background: white;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {!! session()->get('success') !!}
                    </strong>
                </div>

                @endif
                <div style="display:flex;">
                    <a href="taskindex" class="btn btn-primary">All Task List</a>
                    <h4 class="offset-1">Add User <?php echo date('Y-m-d'); ?> Task</h4>
                </div>
                <div class="user">
                    <a href="user" class="btn btn-primary mb-3">Create User</a>
                    <a href="userindex" class="btn btn-warning mb-3">All User</a>
                </div>
                <div class="card" style="border-radius: 20px;">
                    <div class="card-body">
                        <form action="{{ url('task/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label for="title" class="all">User Name</label>
                                <select class="form-control" name="name">
                                    @foreach($users as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <div>
                                    <label for="title" class="all">Task Name</label>
                                    <textarea type="text" class="form-control tinymce-editor " name="task" cols="30" rows="5" placeholder="Write some description here..."></textarea>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row mt-3  mb-4">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-danger submit">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    var editorConfig = {
        selector: 'textarea.tinymce-editor',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount', 'image'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    };

    $(document).ready(function() {
    tinymce.init(editorConfig)

    })
     setTimeout(afaq, 611);
    function afaq(){
        $('.tox-notification').addClass('d-none')

    }
</script>
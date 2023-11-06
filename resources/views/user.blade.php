<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .task{
            text-align: right;
        }
        .font{
            font-size: 20px;
        }
    </style>
</head>
<body> 
    <div class="container mt-5">
        <div class="row g-4">
            <div class="col-md-3 col-xl-3"></div>
            <div class="col-md-6 col-xl-6">
            <a href="userindex" class="btn btn-primary mb-3">All User</a>
                <div class="task">
                    <a href="{{ url('/')}}" class="btn btn-primary mb-3">Create Task User</a>
                    <a href="taskindex" class="btn btn-warning mb-3">All Task List</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('user/store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf   
                                    <div>
                                        <label for="title" class="font">User Name</label>
                                        <input type="text" name="name" required class="form-control"  placeholder="Add New User">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3  mb-4">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
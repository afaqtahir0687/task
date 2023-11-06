<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <title>Task List</title>
    <style>
        body {
            background: linear-gradient(0.25turn, #3f87a6, #ebf8e1, Olive);
            font-family: Arial, sans-serif;
        }

        .container-fluid {
            padding-top: 30px;
        }

        .task-list-container {
            background-color: #ffffff;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .task-list-title {
            text-align: center;
            margin-bottom: 20px;
            color: DarkGoldenrod;
            font-weight: bold;
            text-decoration: underline;
        }

        .hi {
            color: green;
            font-size: 60px;
        }

        .hii {
            color: DarkSlateGray;
        }

        .add-button {
            display: block;
            margin: 0 auto;
            max-width: 150px;
            border-radius: 15px;
            font-size: 15px;
            padding: 10px 20px;
        }

        .add-button:hover {
            background-color: #001f3f;
        }

        .font-italic {
            font-style: italic;
            color: navy;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
        }
        
        tr:nth-child(even) {
            background-color: #e0f2f1;
        }

        tr:hover {
            background-color: #d4e9e2;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="task-list-container">
                    <h1 class="task-list-title"><span class="hi">Task</span> <span class="hii">List</span></h1>
                    <a href="{{ url('/')}}" class="btn btn-outline-primary add-button mb-3" style="border-radius: 15px;">Add Data</a>
                    <table class="table table-striped table-bordered table-sm display nowrap" id="example" style="width:100%">
                        <thead>
                            <tr style="text-align:center;">
                                <th>Date</th>
                                <th>User Names</th>
                                <th>User No Task</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center;">
                            @foreach($tasks as $item)
                            <tr class="font-italic">
                                <td>{{ $item['task_created_at'] }}</td>
                                <td style="text-align: center; height:40px; padding-top: 25px;">{{ $item['user_names'] }}</td>
                                <td style="text-align: center; height: 40px; padding-top: 25px;">{{$item['notsubmit'] }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</body>

</html>
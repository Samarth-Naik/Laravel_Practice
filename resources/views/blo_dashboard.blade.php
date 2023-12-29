<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Your Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <!-- Add more navigation links as needed -->
            </ul>
        </div>
        <div class="container">
            welcome {{$user->name}}
        </div>
    </div>
</nav>

<!-- Add this above the table -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar content goes here -->
        </div>
        <div class="col-md-9">
            <h2>Welcome to your Dashboard, {{ $user->name }}! You are an {{$user->role}}</h2>
            
            <h3>People Under You</h3>
            <div class="mb-10">
                <label for="filter" class="form-label">Filter:</label>
                <select class="form-select" id="filter" onchange="applyFilter()">
                    <option value="all">All</option>
                    <option value="above_80">Above 80 years</option>
                    <option value="pwd">PWD Candidates</option>
                </select>
            </div>

            <form id="formDeliveredForm" action="{{ route('save-form-delivered') }}" method="post">
                @csrf
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Mobile No</th>
                            <th>Accessibility</th>
                            <th>Form Delivered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peoples as $people)
                            <tr data-age="{{ $people->age }}" data-accessibility="{{ $people->accessibility }}">
                                <td>{{ $people->name }}</td>
                                <td>{{ $people->age }}</td>
                                <td>{{ $people->gender }}</td>
                                <td>{{ $people->mobileno }}</td>
                                <td>{{ $people->accessibility }}</td>
                                <td>
                                    <input type="checkbox" 
                                           name="form_delivered[]" 
                                           value="{{ $people->id }}" 
                                           {{ $people->form_delivered ? 'checked disabled' : '' }}>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No people found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <!-- Add a Submit button outside the table -->
                <button type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-sEN9tB1N3qLp2E9HDQfKa/URtqUqA4C/1QckfnxFUrbcZ9gE21nLOe1tAAuFaTw" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Add this inside the <head> or at the end of your <body> section -->
<script>
    function applyFilter() {
        var filterValue = document.getElementById('filter').value;
        var tableRows = document.querySelectorAll('tbody tr');

        tableRows.forEach(function (row) {
            var age = parseInt(row.getAttribute('data-age'));
            var accessibility = row.getAttribute('data-accessibility');

            // Apply the filters
            if (filterValue === 'above_80' && age > 80) {
                row.style.display = '';
            } else if (filterValue === 'pwd' && accessibility !== 'NONE' && !(age > 80)) {
                row.style.display = '';
            } else if (filterValue === 'all') {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

</script>

</body>
</html>

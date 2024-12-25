@php
    use App\Models\products;
    $products = products::all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table img {
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-warning {
            color: #fff;
            background-color: #f0ad4e;
            border-color: #f0ad4e;
        }
        .btn-danger {
            color: #fff;
            background-color: #d9534f;
            border-color: #d9534f;
        }
        .dashboard-header {
            background: linear-gradient(135deg, #007bff, #6610f2);
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="dashboard-header text-center">
            <h1>Admin Dashboard</h1>
            <p>Welcome back! Manage your products efficiently.</p>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-light">Logout</button>
            </form>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <h2>Product Management</h2>
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Add New Product</a>
        </div>

        <table class="table table-striped table-hover mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" width="100">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.delete', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

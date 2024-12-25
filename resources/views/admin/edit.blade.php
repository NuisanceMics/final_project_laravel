<!-- resources/views/admin/edit.blade.php -->
<form action="{{ route('admin.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')  <!-- Use PUT method for updating -->
    
    <!-- Form Fields for product name, price, image, etc. -->
    <div>
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}" required>
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="text" name="price" value="{{ old('price', $product->price) }}" required>
    </div>
    <div>
        <label for="image">Image:</label>
        <input type="file" name="image">
    </div>
    
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
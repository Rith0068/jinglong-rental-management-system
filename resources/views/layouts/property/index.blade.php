<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test lg </title>
</head>
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

<body>
    <form action="{{route('property.store')}}" method="POST">
        @csrf
        <label for="">Name:</label> 
        <input type="text" name="name" placeholder="Enter name">
        <label for="">Address:</label>
        <input type="text" name="address" placeholder="Enter your  address">
        <label for="">Price</label>
        <input type="text" name="price" placeholder="Enter your price">
        <label for="">description</label>
        <input type="text" name="description" placeholder="Enter your description"> 
        <button type="submit">Submit</button>
    </form>
</body>
</html>
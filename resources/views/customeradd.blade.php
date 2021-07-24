@extends('layout')

@section('content')
<div>
    <div class="col-sm-6 offset-3">
    <h3 class="heading">Add New</h3>
    <form method="post" action="customeradd" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Customer Name</label>
        <input type="text" name="customer_name" class="form-control" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label>Contact</label>
        <input type="text" name="ph_no" class="form-control" placeholder="Enter Contact">
    </div>
    <div class="form-group">
        <label>Gender</label>&nbsp;&nbsp;
        Male <input type="radio" name="gender" value="Male">&nbsp;&nbsp;
        Female <input type="radio" name="gender" value="Female">
    </div>
    <div class="form-group">
        <label>DOB</label>
        <input type="date" name="dob" class="form-control" placeholder="Enter Contact">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control" placeholder="Enter Address">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
@Stop
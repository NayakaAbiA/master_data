@extends('admin.layouts.main')
@section('content')

<h2>Hallo {{ auth()->user()->name }} !</h2>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            Simple Datatable
        </h5>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</div>
@endsection
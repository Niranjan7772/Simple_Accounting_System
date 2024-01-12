@extends('layouts.my')
@section('content')

<h1>Student Information List </h1>
<table class="table" >
<tr><th>Id</th><th>Name</th><th>Email</th><th>Course</th></tr>
@foreach($invoices as $invoice)
<tr><td>{{ $invoice->id }}</td>
<td>{{ $invoice->date }}</td>
<td>{{ $invoice->amount }}</td>
<td>{{ $invoice->status }}</td>
</tr>
@endforeach

@endsection

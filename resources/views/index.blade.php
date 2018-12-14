@extends('layouts.app2')

@section('content')
<div class="col-sm-3">
    <div class="input-group">
        <input type="text" class="form-control input-sm" name="search" placeholder="Search email">
        <div class="input-group-btn">
            <button type="submit" class="btn btn-sm btn-primary">Search</button>
        </div>
    </div>
</div>    
@endsection
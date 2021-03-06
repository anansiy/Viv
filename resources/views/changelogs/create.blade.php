@extends('layouts.app')

@section('hero')
<div class="jumbotron">
    <div class="container">
        <h2>
            Changelogs
            <small>
                <a href="{{ route('showChangelogs') }}">Changelogs</a>
                <i class="fal fa-fw fa-angle-right"></i>
                <span class="text">New changelog</span>
            </small>
        </h2>
    </div>
</div>
@endsection

@section('content')
<form method="POST" action="{{ route('storeChangelogs') }}" class="row row-p-10">
    {{ csrf_field() }}
    <div class="col-3">
        <div class="form-group">
            <label for="platform">Platform</label>
            <select class="form-control" id="platform" name="platform" aria-describedby="platform">
                <option value="0">Generic</option>
                <option value="1">PC</option>
                <option value="2">Mobile</option>
                <option value="3">Xbox</option>
                <option value="4">Server</option>
                <option value="5">Holographic</option>
                <option value="6">IoT</option>
                <option value="7">Team</option>
                <option value="8">ISO</option>
                <option value="8">SDK</option>
            </select>
        </div>
    </div>
    <div class="col-9">
        <div class="form-group">
            <label for="build_string">String</label>
            <input type="text" class="form-control" id="build_string" name="build_string" aria-describedby="build_string" placeholder="Build string">
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="changelog">Changelog</label>
            <textarea class="form-control text-monospace" id="changelog" name="changelog" aria-describedby="changelog" placeholder="Changelog" rows="30"></textarea>
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block"><i class="fal fa-fw fa-plus"></i> Add</button>
    </div>
</form>
@endsection
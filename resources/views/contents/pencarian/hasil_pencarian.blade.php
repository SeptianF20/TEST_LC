@extends('app')
@section("head")
@include('layouts.head')
@endsection
@section("script")
@include('layouts.script')
@endsection
@section('content')
<style>
    .fa-book:hover {
        color: blue;
    }

</style>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<div class="card ml-3 mt-3 mr-3 mb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-succees card-outline">
                <div class="card-header border-5">
                    <div class="d-flex justify-content-between">
                        <h1>Meaning of "{{ $kata }}"</h1>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a>{{ $kata }}</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            @if(isset($data['title']) && $data['title'] === 'No Definitions Found')
                            <p>{{ $data['message'] }}</p>
                            @else
                            <div class="callout">
                                <form action="{{ route('mark.favorite', ['kata' => $kata]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-heart"></i> Add to Favorite
                                    </button>
                                </form>
                            </div>
                            @foreach ($data as $entry)
                            @foreach ($entry['meanings'] as $meaning)
                            <div class="col-md-12">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $meaning['partOfSpeech'] }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <!-- Date dd/mm/yyyy -->
                                        <div class="group">
                                            <div class="meaning-group">
                                                <ul>
                                                    @foreach ($meaning['definitions'] as $definition)
                                                    <li>{{ $definition['definition'] }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endforeach
                            @endif
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection

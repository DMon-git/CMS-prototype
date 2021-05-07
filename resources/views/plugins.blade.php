@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" id="div_posts">
                Тут будут плагины
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('js/pluginsPage.js') }}" ></script>

@endsection
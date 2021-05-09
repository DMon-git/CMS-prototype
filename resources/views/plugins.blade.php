@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table id="plugins_table" class="table">
            	<thead>
            		<th>№</th>
            		<th>Название</th>
            		<th>Описание</th>
            		<th>Стутус</th>
            		<th>Действие</th>
            	</thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('js/pluginsPage.js') }}" ></script>

@endsection
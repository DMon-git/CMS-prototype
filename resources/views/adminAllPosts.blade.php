@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <table id="posts_table" class="table">
                	<thead>
                		<th>№</th>
                		<th>Название</th>
                		<th>Автор</th>
                		<th>Действие</th>
                	</thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
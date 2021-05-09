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
            <nav aria-label="...">
              <ul class="pagination pagination-sm">
                <li class="page-item active" aria-current="page">
                  <span class="page-link">1</span>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
              </ul>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('js/adminAllPage.js') }}" ></script>

@endsection
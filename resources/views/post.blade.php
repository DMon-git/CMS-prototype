@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-4" id="div_post">
            	<p id="title"></p>
            	<div class="mb-3 p-3" id="contentPost">
            		
            	</div>
            </div>

            <div class="mb-3">
            	<h5>Добавить комментарий:</h5>	
            	<div class="mb-3">
            		<textarea class="form-control" cols="10" rows="2" id="comment"> </textarea>
                    <em>
                        <label>Комментарий может состоять из русских и английских букв, цифр, знаков .,-? и пробела</label>
                        <label>Длина комментария должна быть от 3 и до 255 символов</label>
                    </em>
            	</div>
            	
            	<button class="btn btn-outline-secondary btn-sm" id="addComment" onclick="addComment()">Добавить</button>
            </div>

            <div class="mb-3">
            	<h5>Комментарии:</h5>
            	<div id="comments">
            		
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/onePost.js') }}" ></script>

@endsection
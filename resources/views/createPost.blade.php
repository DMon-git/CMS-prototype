@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	<center><h4>Создать пост</h4></center>
            <div class="card p-3" id="div_create_posts">
            	<div class="mb-3">
            		<label class="form-label">Название поста</label>
               		<input type="text" name="name_post" id="name_post" class="form-control">
                    <em>
                        <label>Длина названия поста должна быть от 3 и до 255 символов</label>
                    </em>
            	</div>
                
                <div class="mb-3">
                	<label class="form-label">Содержание поста</label><br>
                	<textarea class="form-control" cols="30" rows="10" id="contentPost"></textarea>
                    <em>
                        <label>Длина поста должна быть от 3 и до 1400 символов</label>
                    </em>
                </div>

                <div class="mb-3">
                    <select class="custom-select" id="publish">
                        <option value="1">Опубликовать</option>
                        <option value="0">Не публиковать</option>
                    </select>
                </div>

                <div class="mb-3">
                	<input type="button" name="btn_create_post" id="btn_create_post" class="btn btn-secondary" value="Создать пост" onclick="createPost()">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('js/createPostPage.js') }}" ></script>

@endsection
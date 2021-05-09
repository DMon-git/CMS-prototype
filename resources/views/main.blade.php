@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" id="div_posts">
            </div>

            @if (!empty($pages)) 
                <nav aria-label="...">
                  <ul class="pagination pagination-sm" id="ulPageLinks">
                    @for ($i = 1; $i <= $pages; $i++)
                        <li class="page-item @if($i == 1) active @endif" aria-current="page">
                            <a class="page-link" href="#" id="pageLink_{{ $i }}" onclick="getPageData(this)">{{ $i }}</a>
                        </li>
                    @endfor
                  </ul>
                </nav>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('js/mainPage.js') }}" ></script>

@endsection
<div class="app-body bg-dark h-100">
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav d-flex flex-column">

    	  <li class="nav-item">
        	<a class="nav-link text-white" href="/"><i class="icon-speedometer"></i> Главная</a>
      	</li>

    		<li class="nav-item">
      		<a class="nav-link text-white" href="/dashboard"><i class="icon-speedometer"></i> Личный кабинет</a>
    		</li>

    		<li class="nav-item">
      		<a class="nav-link text-white" href="/createPost"><i class="icon-speedometer"></i> Создать пост</a>
    		</li>

    		<li class="nav-item">
      		<a class="nav-link text-white" href="/adminAllPosts"><i class="icon-speedometer"></i> Записи</a>
    		</li>

    		<li class="nav-item">
      		<a class="nav-link text-white" href="/plugins"><i class="icon-speedometer"></i> Плагины</a>
    		</li>

        @include('layouts.sidePlugins')

      </ul>
    </nav>
  </div>
</div>
  
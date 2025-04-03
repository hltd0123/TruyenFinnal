
<li class="nav-item">
    <a href="{{ route('authors.index') }}" class="nav-link {{ Request::is('authors*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Authors</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Categories</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('chapters.index') }}" class="nav-link {{ Request::is('chapters*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Chapters</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('comments.index') }}" class="nav-link {{ Request::is('comments*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Comments</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('favorites.index') }}" class="nav-link {{ Request::is('favorites*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Favorites</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('stories.index') }}" class="nav-link {{ Request::is('stories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Stories</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('views.index') }}" class="nav-link {{ Request::is('views*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Views</p>
    </a>
</li>

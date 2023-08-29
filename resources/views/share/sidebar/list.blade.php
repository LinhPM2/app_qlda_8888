@foreach ($list as $key )
<li class="nav-item">
    <a href="/admin/dealer/list/" class="nav-link">
        <i class="nav-icon fas fa-solid fa-bars"></i>
        <p>
            {{$key->name}}
        </p>
    </a>
</li>
@endforeach

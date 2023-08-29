@foreach ($list as $key )
    @unless ($key->allowUser && (strtolower(Auth::user()->roles) == 'user'))
        <li class="nav-item">
            <a href={{$key->path}} class="nav-link">
                <i class="{{$key->icon}}"></i>
                <p>
                    {{$key->name}}
                </p>
            </a>
        </li>
    @endunless
@endforeach

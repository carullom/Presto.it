<form action="{{route('locale',$lang)}}" method="POST">
    @csrf
    <button type="submit" class="nav-link bg-transparent border-0">
    <span class="flag-icon flag-icon-{{$nation}}"></span>
    </button>
</form>
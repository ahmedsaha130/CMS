<div class="wn__sidebar">
    <aside class="widget recent_widget">
        <ul>
            <li class="list-group-item">

                @if (auth()->user()->user_image != '')

                    <img src="{{ asset('assets/users/'.auth()->user()->user_image) }}" alt="{{ auth()->user()->name }}">

                @else
                    <img src="{{ asset('assets/users/profile.png') }}" alt="{{ auth()->user()->name }}">

                @endif
            </li>

            <li class="list-group-item"><a href="{{ route('frontend.dashboard') }}">My Posts</a></li>
            <li class="list-group-item"><a href="{{ route('users.post.create') }}">Create Post</a></li>
            <li class="list-group-item"><a href="{{route('users.comments')}}">Manage Comments</a></li>
            <li class="list-group-item"><a href="{{ route('users.edit.info') }}">Update Information</a></li>
            <li class="list-group-item"><a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        </ul>
    </aside>
</div>

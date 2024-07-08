<style>

    .btn-delete {
        border: none;
        background: none;
    }
</style>

<form action="{{route('get.index')}}" method="get">
    <input type="text" name="search"  value="{{request()->get('search')}}">
    <button type="submit">Tìm kiếm</button>
</form>

<ul>
    @foreach($users as $user)
        <li>
            {{$user->name}} - {{$user->email}} -
            <a href="{{route('get.detail', ['id' => $user->id])}}">edit</a>
            -
            <form action="{{route('post.delete', ['id' => $user->id])}}" method="post">
                @csrf
                <button class="btn-delete" type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>

<h1>Main</h1>
<form action="{{route('post.create')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="name">
    <br>
    <br>
    <input type="text" name="email" placeholder="email">
    <br>
    <br>
    <input type="text" name="password" placeholder="password">
    <br>
    <br>
    <button type="submit">Submit</button>
</form>
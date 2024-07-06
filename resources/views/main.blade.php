
@foreach($users as $user)
<ul>
    <li>
        {{$user->name}} - {{$user->email}}
    </li>
</ul>
@endforeach

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
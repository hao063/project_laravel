<h1>Detail - {{$user->name}}</h1>



<form action="{{route('post.update')}}" method="post">
    @csrf
    <input value="{{$user->id}}" type="hidden" name="id" placeholder="name">
    <input value="{{$user->name}}" type="text" name="name" placeholder="name">
    @if($errors->has('name'))
        <span>{{$errors->first('name')}}</span>
    @endif
    <br>
    <br>
    <input value="{{$user->email}}" type="text" name="email" placeholder="email">
    @if($errors->has('email'))
        <span>{{$errors->first('email')}}</span>
    @endif
    <br>
    <br>
    <button type="submit">Submit</button>
    <a href="{{route('get.index')}}">Back</a>
</form>
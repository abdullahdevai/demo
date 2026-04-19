<h1>Welcome to Dashboard
    <span style="color:green;">{{ $user->name }}</span>
</h1>


<form action="{{ route('logout') }}" method="POST" >
    @csrf
    <button type="submit"> Logout</button>
</form>

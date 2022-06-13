<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="dropdown-item">Log Out</button>
  </form>    

<h1>Ini halaman Admin setelah login</h1>

<p>{{ auth()->user()->level }}</p>
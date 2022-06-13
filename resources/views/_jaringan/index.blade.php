<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="dropdown-item">Log Out</button>
  </form>        

<h1>Ini halaman jaringan setelah login</h1>

<p>{{ auth()->user()->level }}</p>
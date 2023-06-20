<x-header />
 
<h1>Tennivalók</h1>
<h2>Tennivalók listája</h2>
 
<table>
  @foreach($todos as $todo)
  <tr>
    <td>{{ $todo['task'] }}</td>
    <td><a href={{"delete/".$todo['id']}}>Törlés</a></td>
    <td><a href={{"edit/".$todo['id']}}>Szerkesztés</a></td>
  </tr>
  @endforeach
</table>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Kilépés</button>
</form>
<div>
<a href="{{ route('add') }}">Új bejegyzés létrehozása</a>
</div>
 
<x-footer />
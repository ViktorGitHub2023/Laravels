<x-header />
 
    <h2>Módosítás</h2>
 
    <form action="/edit" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$data['id']}}">
      <input type="text" name="task" value="{{$data['task']}}"><br>
      <button type="submit">Módosít</button>
    </form>
 
 
<x-footer />
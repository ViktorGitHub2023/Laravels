<x-header />
 
    <h2>Feladat hozzáadása</h2>
    <form  action="add" method="post">
      @csrf
      <input type="text" name="task">
 
      <button type="submit">Hozzáad</button>
    </form>
 
<x-footer />
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{asset('js/app.js')}}">

<b><i><h1 style="text-align: center;" >Wishlist</h1></i></b>
<div class="container">
    <form action="/wishlist" method="post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <label class="navbar-brand" value="titulo" for="">Título:</label>
    <input class="navbar-brand" type="text" name="titulo" id="titulo" required>
    <label class="navbar-brand" value="valor" for="">Valor:</label>
    <input class="navbar-brand" placeholder="0.00" name="valor" id="valor" type="decimal" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$"  required>
    <label class="navbar-brand" value="obs" for="">Observações:</label>
    <input class="navbar-brand" name="obs" id="obs" type="text">
    <label class="navbar-brand" value="date" for="">Data:</label>
    <input type="date" name="date" id="date" required>
    <label class="navbar-brand">Imagem</label>
    <input type="text" name="image" id="image" >
    <button type="submit">Inserir</button>
    </form>
   
</div>
<div>

<table id="myTable2">
   <tr>
    <th>Imagem</th>
    <th >Titulo</th>
    <th onclick="sortTable(0)" style="cursor: pointer;">Valor</th>
    <th >Observações</th>
    <th onclick="sortTable(0)" style="cursor: pointer;">Data</th>
    <th>Action</th>
  </tr>
  {{$total=null}}
  
  @foreach ($wishlist as $wishlists) 
  <label hidden="true" > {{$wishlists->email }}</label>
  <tr>
    <td><img width="70" height="70" src="{{ $wishlists->image }}"></img></td>
    <td>{{ $wishlists->titulo }}</td>
    <td>{{ $wishlists->valor }}</td>
    <td>{{ $wishlists->obs }}</td>
    <td>{{ $wishlists->date }}</td>
    <td class="center">
      <a onclick="alert('apagado com sucesso');" id="delete" href="{{URL::to('/deleteWishlistRow/'.$wishlists->id) }}">
        
        <i class="bi bi-trash">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
          </svg>
        </i>

        </a>
      </td>


    <label hidden="hidden">{{ $total += $wishlists->valor}}</label>
    
  </tr>
  @endforeach
   </table>     

   <h3>Valor Total : {{$total}}</h3>
</div>

@endsection


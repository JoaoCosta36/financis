@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<b><i><h1 style="text-align: center;" >Poupanças</h1></i></b>
<div class="container">
    <form action="/poupancas" method="post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <label class="navbar-brand" value="titulo" for="">Título:</label>
    <input class="navbar-brand" type="text" name="titulo" id="titulo" required>
    <label class="navbar-brand" value="valor" for="">Valor:</label>
    <input class="navbar-brand" name="valor" id="valor" type="text" required>
    <label class="navbar-brand" value="obs" for="">Observações:</label>
    <input class="navbar-brand" name="obs" id="obs" type="text">
    <label class="navbar-brand" value="date" for="">Data:</label>
    <input type="date" name="date" id="date" required>
    <button type="submit">Inserir</button>
    </form>
   
</div>
<div>

<table >
   <tr>
    <th>Titulo</th>
    <th>Valor</th>
    <th>Observações</th>
    <th>Data</th>
  </tr>
  {{$total=null}}
  @foreach ($poupancas as $poupanca) 
  
  <tr>
    <td>{{ $poupanca->titulo }}</td>
    <td>{{ $poupanca->valor }}</td>
    <td>{{ $poupanca->obs }}</td>
    <td>{{ $poupanca->date }}</td>
    <label hidden="hidden">{{ $total += $poupanca->valor}}</label>
    
  </tr>
  @endforeach
   </table>     

   <h3>Valor Total Poupança: {{$total}}</h3>
</div>

@endsection


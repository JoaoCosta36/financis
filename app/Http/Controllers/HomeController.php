<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dividas()
    {
    $loggedemail = \Auth::user()->email;
    $dividas = DB::table('dividas')->where('email', '=', $loggedemail)->select('id','titulo','valor','obs','date','email')->get();
    return view('dividas')->with('dividas', $dividas);
    }
    public function poupancas(){
    $loggedemail = \Auth::user()->email;
    $poupancas = DB::table('poupancas')->where('email', '=', $loggedemail)->select('id','titulo','valor','obs','date','email')->get();
    return view('poupancas')->with('poupancas', $poupancas);
  }
  public function wishlist(){
    $loggedemail = \Auth::user()->email;
    $wishlist = DB::table('wishlist')->where('email', '=', $loggedemail)->select('id','image','email','titulo','valor','obs','date')->get();
    return view('wishlist')->with('wishlist', $wishlist);
    
  }
    public function inserirPoupancas(Request $request){
        $titulo = $request->input('titulo');
        $valor = $request->input('valor');
        $date = $request->input('date');
        $obs =$request->input('obs');
        $loggedemail = \Auth::user()->email;
        $data=array('titulo'=>$titulo,"valor"=>$valor,"date"=>$date,"obs"=>$obs,"email"=>$loggedemail);
        
        DB::table('poupancas')->insert($data);
        
        return redirect()->back();
    }
    public function inserirDividas(Request $request){
        $titulo = $request->input('titulo');
        $valor = $request->input('valor');
        $date = $request->input('date');
        $obs =$request->input('obs');
        $loggedemail = \Auth::user()->email;
        $data=array('titulo'=>$titulo,"valor"=>$valor,"date"=>$date,"obs"=>$obs,"email"=>$loggedemail);
        
        DB::table('dividas')->insert($data);
        
        return redirect()->back();
    }
    public function inserirWishlist(Request $request){
        
        $titulo = $request->input('titulo');
        $valor = $request->input('valor');
        $date = $request->input('date');
        $obs =$request->input('obs');
        $img =$request->input('image');
        $loggedemail = \Auth::user()->email;
        $data=array('titulo'=>$titulo,"valor"=>$valor,"date"=>$date,"obs"=>$obs,"image"=>$img,"email"=>$loggedemail);
        
        DB::table('wishlist')->insert($data);
        
        echo "<script>alert('Inserido com sucesso');</script>";
        return redirect()->back();
    }
    public function deleteWishlistRow($id){
    echo "<script>window.alert('Apagado com sucesso');</script>";
        $query = DB::table('wishlist'); // Isso busca o usuário com o ID 1
        $loggedemail = \Auth::user()->email;
        $row =DB::table('wishlist')->where('id', $id);
        $del= $row->where('email',$loggedemail)->delete();
        
        return redirect()->back();
    }
    public function deletePoupancasRow($id){
        echo "<script>window.alert('Apagado com sucesso');</script>";
            $query = DB::table('poupancas'); // Isso busca o usuário com o ID 1
            $loggedemail = \Auth::user()->email;
            $row =DB::table('poupancas')->where('id', $id);
            $del= $row->where('email',$loggedemail)->delete();
            
            return redirect()->back();
        }
        public function deleteDividasRow($id){
            echo "<script>window.alert('Apagado com sucesso');</script>";
                $query = DB::table('dividas'); // Isso busca o usuário com o ID 1
                $loggedemail = \Auth::user()->email;
                $row =DB::table('dividas')->where('id', $id);
                $del= $row->where('email',$loggedemail)->delete();
                
                return redirect()->back();
            }

}
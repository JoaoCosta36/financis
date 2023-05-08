<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
    $dividas = DB::table('dividas')->where('email', '=', $loggedemail)->select('titulo','valor','obs','date')->get();
    return view('dividas')->with('dividas', $dividas);
    }
    public function poupancas(){
    $loggedemail = \Auth::user()->email;
    $poupancas = DB::table('poupancas')->where('email', '=', $loggedemail)->select('titulo','valor','obs','date')->get();
    return view('poupancas')->with('poupancas', $poupancas);
    
  }
    public function inserirPoupancas(Request $request){
        $titulo = $request->input('titulo');
        $valor = $request->input('valor');
        $date = $request->input('date');
        $obs =$request->input('obs');
        $loggedemail = \Auth::user()->email;
        $data=array('titulo'=>$titulo,"valor"=>$valor,"date"=>$date,"obs"=>$obs,"email"=>$loggedemail);
        
        DB::table('poupancas')->insert($data);
        
        echo "Record inserted successfully for the email:.<br/>";
        echo '<a href = "/poupancas">Click Here</a> to go back.';
    }
    public function inserirDividas(Request $request){
        $titulo = $request->input('titulo');
        $valor = $request->input('valor');
        $date = $request->input('date');
        $obs =$request->input('obs');
        $loggedemail = \Auth::user()->email;
        $data=array('titulo'=>$titulo,"valor"=>$valor,"date"=>$date,"obs"=>$obs,"email"=>$loggedemail);
        
        DB::table('dividas')->insert($data);
        
        echo "Record inserted successfully for the email:.<br/>";
        echo '<a href = "/dividas">Click Here</a> to go back.';
    }
  
}

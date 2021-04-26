<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App;
use App\Compatible;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use \PDF;
use App\User;
use App\Lista;
class DiskController extends Controller
{
    public function inicio(){
        return view('home');
    }

    public function usuarios(){
        
        $dis = DB::table('users')
        ->select('*')
        ->get();
        return view('auth.adm', compact('dis'));
    }
    public function buscar($id){

        return redirect('https://www.google.com/search?q='.$id.'+to+sata');
    }

    public function addTable(Request $request){

        $campos=[
            'usb' => 'required',
            'sata' => 'required',
            
        ];
        $mensaje=[
            "required"=>'Campo requerido',  
        ];
        $this->validate($request,$campos,$mensaje);


        $lista = new Lista();
        $lista->USB = strtoupper($request->usb);
        $lista->SATA = strtoupper($request->sata);
        $lista->save();

        return back();
    }



public function regUs(Request $request){
        
        
    $campos=[
        'name' => 'required',
        'email' => 'required | unique:users,email',
        'password' => 'required',
        'bandera' => 'required',
        
    ];
    $mensaje=[
        "required"=>'Campo requerido',  
        "unique"=>'Correo ya Registrado',
    ];
    $this->validate($request,$campos,$mensaje);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->desencriptado = $request->password;
        $user->bandera = $request->get('bandera');

        $user->save();

        return redirect('home');
    }

    public function registro(){
        return view('registro');
    }

    public function crear(Request $request){

        $campos=[
            'id_numero' => 'required',
            'targetaLogica' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'capacidad' => 'required',
            'tipoEntrada' => 'required',
            
        ];
        $mensaje=[
            "required"=>'Campo requerido',
        ];
        $this->validate($request,$campos,$mensaje);


        
        $discoNuevo = new App\Disk();
        $discoNuevo->id_numero = strtoupper( $request->id_numero);
        $discoNuevo->tarjetaLogica = strtoupper($request->targetaLogica);
        $discoNuevo->modelo = strtoupper($request->modelo);
        $discoNuevo->marca = strtoupper($request->marca);
        $discoNuevo->capacidad = strtoupper($request->capacidad);
        $discoNuevo->tipoEntrada = strtoupper($request->tipoEntrada);
        $discoNuevo->observaciones = strtoupper($request->observaciones);

        $discoNuevo->save();

        $new = $request->targetaLogica;
            return view('addCompatible',compact('new'));
    
            //return back()->with('mensaje', 'Disco Agregado');
    }

        public function editar($id){
            $disco = App\Disk::findOrFail($id);
            return view('editar',compact('disco'));
        }
        
        public function update(Request $request, $id){
               $discoUpdate = App\Disk::findOrFail($id);
               $discoUpdate->id = $request->id;
               $discoUpdate->id_numero = strtoupper($request->id_numero);
               $discoUpdate->tarjetaLogica = strtoupper($request->tarjetaLogica);
               $discoUpdate->modelo = strtoupper($request->modelo);
               $discoUpdate->marca = strtoupper($request->marca);
               $discoUpdate->capacidad = strtoupper($request->capacidad);
               $discoUpdate->tipoEntrada = strtoupper($request->tipoEntrada);
               $discoUpdate->observaciones = strtoupper($request->observaciones);
               
               $discoUpdate->save();

               $new = $request->targetaLogica;

               DB::table('disks')
                ->where('id', $id)
                ->update(['bandera' => 0]);

                $dis = DB::table('compatibles')
                ->select('*')
                ->where('id_logica', $id)
                ->get();


               return view('editCompatible',compact('new','dis','id'));
        }
        


        public function eliminar(Request $request, $id){
            
            $disco = DB::table('disks')->where('id', '=', $id)->delete();
            

        return back();  
        }

        public function eliminarUsuario(Request $request, $id){
            $usuario = DB::table('users')->where('id','=',$id)->delete();
            return back(); 
        }

        public function editarUsuario($id){
            $usuarioD = App\User::findOrFail($id);
            return view('editarUsuario',compact('usuarioD'));
        }

        public function updateU(Request $request,$id){

            $UsuarioUpdate = App\User::findOrFail($id);
            $UsuarioUpdate->name = $request->name;
            $UsuarioUpdate->email = $request->email;
            $UsuarioUpdate->password =bcrypt($request->password);
            $UsuarioUpdate->desencriptado =$request->password;
            $UsuarioUpdate->save();
            return redirect('usuarios');
        }
        
        public function eliminarCompatible(Request $request, $id){
            
            $disco = DB::table('compatibles')->where('id', '=', $id)->delete();
      
        $id_dis = DB::table('disks')
        ->select('id')
        ->where('bandera','0')
        ->first();

            $dis = DB::table('compatibles')
                ->select('*')
                ->where('id_logica', $id_dis->id)
                ->get();
                
                return view('editCompatible',compact('dis'));
        }

          public function imprimir(){
              $dis = DB::table('disks')
              ->select('disks.*')
              ->get();
              $pdf = \PDF::loadView('pdf',compact('dis'))->setOptions(['defaultFont' => 'sans-serif']); 
              return $pdf->download('inventario.pdf'); 
        } 

     public function compatible(Request $request){

        $request->validate([
            'logico' => 'required'
        ]);
         $busqueda = strtoupper($request->input('logico'));   
         //https://www.google.com/search?q=701499&oq=701499&aqs=chrome..69i57.2100j0j15&sourceid=chrome&ie=UTF-8       
         $discoL = DB::table('compatibles')
         ->join('disks','disks.id','=','compatibles.id_logica')
         ->where('tarjeta_logica',  strtoupper($request->logico))
         ->get();
         if(sizeof($discoL)>0){
             return view('resultado',compact('discoL'));

         }else{
             $dis = DB::table('listas')
             ->select('USB','SATA')
            ->where('USB',  $busqueda)
            ->distinct('SATA')
            ->get();
            $mensaje='Tarjeta Logica USB-SATA';
             if (sizeof($dis)>0) {
                 return view('lista',compact('dis','mensaje'));
             }else{         
                    $dis = DB::table('listas')
                    ->select('USB','SATA')
                    ->where('SATA',  $busqueda)
                    ->distinct('USB')
                    ->get();
                    $mensaje='Tarjeta Logica SATA-USB';
                    if (sizeof($dis)>0) {
                        return view('lista',compact('dis','mensaje'));
                    }else{
                        return redirect('https://www.google.com/search?q='.$busqueda.'+to+sata');
                    }
             }
            
             
         }
                
     }   

    public function add(Request $request){
        
        $discoL = DB::table('disks')
         ->where('bandera', 0)
         ->get();

         foreach ($discoL as $discoL) {
            $tl = $discoL->id;
         }

        $compatible = new Compatible();
        $compatible->id_logica =  $tl;
        $compatible->tarjeta_logica =  strtoupper($request->compatible);
        $compatible->save();

        return redirect('addCompatible')->with('mensaje','Tajeta Logica Compatible Añadida');
    }

    public function listaC(){
        $listaCom = DB::table('listas')
        ->select('*')
        ->get();
        return view('listaC', compact('listaCom'));
    }

    public function eliminarLista(Request $request,$id){
        $listaE = DB::table('listas')->where('id','=',$id)->delete();
            return back(); 
    }

    public function editarLista($id){
        $listaEd = App\Lista::findOrFail($id);
        return view('editarLista',compact('listaEd'));
    }

    public function updateL(Request $request,$id){
        $ListaU = App\Lista::findOrFail($id);
            $ListaU->USB = strtoupper($request->USB);
            $ListaU->SATA = strtoupper($request->SATA);
            $ListaU->save();
            return redirect('listaC');
    }

    public function add2(Request $request){
        
        $discoL = DB::table('disks')
         ->where('bandera', 0)
         ->get();

         foreach ($discoL as $discoL) {
            $tl = $discoL->id;
         }

        $compatible = new Compatible();
        $compatible->id_logica =  $tl;
        $compatible->tarjeta_logica = strtoupper( $request->compatible);
        $compatible->save();

        $dis = DB::table('compatibles')
        ->select('*')
        ->where('id_logica', $tl)
        ->get();

        return view('editCompatible',compact('dis'))->with('mensaje','Tajeta Logica Compatible Añadida');
    }

    public function resultado(){
        return view('resultado');
    }

    public function terminaRegistro(){
        DB::table('disks')
            ->where('bandera', 0)
            ->update(['bandera' => 1]);
            
        return view('home');
    }
    public function terminaRegistro2(){
        DB::table('disks')
            ->where('bandera', 0)
            ->update(['bandera' => 1]);
            
            $dis = DB::table('disks')->get();

            return view('showDisk',compact('dis'));
    }

    public function addCompatible(){
        return view('addCompatible');
    }

    public function showDisk(){
        // $discoL = DB::table('compatibles')
        //     ->select("disks.*"
        //     	,DB::raw("(GROUP_CONCAT(compatibles.tarjeta_logica SEPARATOR '-')) as `tarjeta_logica`"))
        //     ->leftjoin("disks","disks.id","=","compatibles.id_logica")
        //     ->groupBy('compatibles.id_logica')

        //     ->get();       
        $dis = DB::table('disks')->get();

      return view('showDisk',compact('dis'));
    }
    public function filtrado(Request $request){
        $request->validate([
            'busqueda' => 'required'
        ]);
        $buscado = strtoupper($request->input('busqueda')); 
        
        $dis = DB::table('disks')
        ->select('disks.*')
        ->where('tarjetaLogica',$buscado)
        ->get();
        
          return view('showDisk', compact('dis'));
       
     
    }

    public function cerrar(){

        
        Auth::logout();
        return Redirect::to('/');
        

    }


}

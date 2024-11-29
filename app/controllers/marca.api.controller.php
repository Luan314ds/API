<?php
require_once "./app/models/model.marca.php";
require_once "./app/models/model.producto.php";
require_once "./app/views/view.json.php";



class MarcaApiController{

    private $model;
    private $view;


       public function __construct(){
        $this-> model = new MarcaModel();
        $this-> view = new JSONView();
    }

    public function mostrarTodo($req, $res) {

        $orderBy = false;

        if (isset($req->query->orderBy)) {
            $orderBy =  $req->query->orderBy;
        }


       
        $marcas = $this->model->ObtenerMarcas($orderBy);

        return $this->view->response($marcas);
     
    }
 
    public function mostrar($req, $res) {


        //VER ID(EN ESTE CASO ES LA MARCA DEL PRODUCTO)
        $idmarca = $req->params->id;

    
        $productos = $this->model->obtenerIDmarca($idmarca);


        if(!$productos){
            return $this->view->response("El id=$idmarca de marca no existe", 404);
        }

        
        $this->view->response($productos);
    
    }

    public function añadir($req, $res) {

        // valido los datos
        if (empty($req->body->nombre_marca) || empty($req->body->importador) || empty($req->body->pais_origen)) {
            return $this->view->response('Faltan completar datos', 400);
       }

        // obtengo los datos
        $nombre= $req->body->nombre_marca;    
        $importador= $req->body->importador;       
        $paisorigen = $req->body->pais_origen;       


        // inserto los datos
        $id = $this->model->insertoMarcas($nombre, $importador, $paisorigen);

        if (!$id) {
            return $this->view->response("Error al insertar la marca", 500);
        }

        // buena práctica es devolver el recurso insertado
        $marca = $this->model->obtenerIDmarca($id);
        return $this->view->response($marca, 201);
    }


    public function modificar($req, $res)
    {
        $id = $req->params->id;

        // verifico que exista
        $marca = $this->model->obtenerIDmarca($id);
        if (!$marca) {
            return $this->view->response("La marca con el id=$id no existe", 404);
        }

         // valido los datos
         if (empty($req->body->importador) || empty($req->body->pais_origen)) {
             return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $importador= $req->body->importador;       
        $paisOrigen = $req->body->pais_origen;     

        // actualiza la tarea
        $this->model->cambioValoresMarca($id, $importador, $paisOrigen);

        // obtengo la tarea modificada y la devuelvo en la respuesta
        $marca = $this->model->obtenerIDmarca($id);
        $this->view->response($marca, 200);
    

    }
  
  
}
?>
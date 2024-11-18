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
       
        $marcas = $this->model->ObtenerMarcas();

        return $this->view->response($marcas);
     
    }
 
    public function mostrar($req, $res) {


        //VER ID(EN ESTE CASO ES LA MARCA DEL PRODUCTO)
        $marca = $req->params->marca_producto;

    
        $productos = $this->model->obtenerProductosPorMarca($marca);


        if(!$productos){
            return $this->view->response("La marca $marca no existe", 404);
        }

        
        $this->view->response($productos);
    
    }

  
  
}
?>
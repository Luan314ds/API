<?php
include_once "./app/models/model.producto.php";
include_once "./app/models/model.marca.php";
include_once "./app/views/view.json.php";

class ProductoApiController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->view = new JSONview();
        $this->model = new ProductoModel();
    }

    public function mostrarTodo($req, $res)
    {

        $orderBy = false;


        if (isset($req->query->orderBy)) {
            $orderBy =  $req->query->orderBy;
        }


        $productos = $this->model->ObtenerProductos($orderBy);


        return $this->view->response($productos);
    }

    public function mostrar($req, $res)
    {


        //VER ID(EN ESTE CASO ES LA MARCA DEL PRODUCTO)
        $producto = $req->params->id_productos;


        $productos = $this->model->obtenerProductoPorId($producto);


        if (!$productos) {
            return $this->view->response("El producto $producto no existe", 404);
        }


        $this->view->response($productos);
    }

    public function añadir($req, $res) {

        // valido los datos
        if (empty($req->body->marca_producto) || empty($req->body->tipo_producto) || empty($req->body->modelo) || empty($req->body->color) || empty($req->body->descripcion_producto) || empty($req->body->precio)) {
            return $this->view->response('Faltan completar datos', 400);
       }

        // obtengo los datos
        $marca= $req->body->marca_producto;    
        $tipoproducto= $req->body->tipo_producto;       
        $modelo = $req->body->modelo;       
        $color = $req->body->color;
        $descripcion = $req->body->descripcion_producto;
        $precio = $req->body->precio;

        // inserto los datos
        $id = $this->model->insertoProductos($marca, $tipoproducto, $modelo, $color, $descripcion, $precio);

        if (!$id) {
            return $this->view->response("Error al insertar tarea", 500);
        }

        // buena práctica es devolver el recurso insertado
        $producto = $this->model->obtenerIDproducto($id);
        return $this->view->response($producto, 201);
    }


    public function modificar($req, $res)
    {
        $id = $req->params->id_productos;

        // verifico que exista
        $producto = $this->model->obtenerIDproducto($id);
        if (!$producto) {
            return $this->view->response("El producto con el id=$id no existe", 404);
        }

         // valido los datos
         if (empty($req->body->tipo_producto) || empty($req->body->modelo) || empty($req->body->color) || empty($req->body->descripcion_producto) || empty($req->body->precio)) {
             return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $tipoproducto= $req->body->tipo_producto;       
        $modelo = $req->body->modelo;       
        $color = $req->body->color;
        $descripcion = $req->body->descripcion_producto;
        $precio = $req->body->precio;

        // actualiza la tarea
        $this->model->cambioValoresProducto($id, $tipoproducto, $modelo, $color, $descripcion, $precio);

        // obtengo la tarea modificada y la devuelvo en la respuesta
        $producto = $this->model->obtenerIDproducto($id);
        $this->view->response($producto, 200);
    

    }
}

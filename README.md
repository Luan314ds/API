'marcas', 'GET', 'MarcaApiController', 'mostrarTodo': este endpoint sirve para listar todos los datos que se encuentran en la tabla marcas.

'marca/:marca_producto', 'GET', 'MarcaApiController', 'mostrar': este endpoint sirve para ver los productos pertenecientes  una marca especifica , por ejemplo si el endpoint solicitado es 'marca/:MOTOROLA', 'GET', 'MarcaApiController', 'mostrar', mostrara los productos de la marca MOTOROLA.

'producto/:id_productos', 'GET', 'ProductoApiController', 'mostrar': este endpoint sirve para ver un producto especifico por su ID, por ejemplo si el endpoint solicitado es 'producto/:12', 'GET', 'ProductoApiController', 'mostrar', mostrara el producto con el ID 12.

'producto', 'POST', 'ProductoApiController', 'añadir': este endpoint sirve para añadir un producto nuevo con sus respectivos datos.


'producto/:id_productos', 'PUT', 'ProductoApiController', 'modificar': este endpoint sirve para modificar los datos de un producto segun su ID, por ejemplo si el endpoint es 'producto/:12', 'PUT', 'ProductoApiController', 'modificar', este modificara los datos del producto con el ID 12. 

ejemplo PUT: 
{
  "tipo_producto": "CELULAR",
  "modelo": "G30",
  "color": "AZUL",
  "descripcion_producto": "NUEVO",
  "precio": 30
}

ejemplo POST:
{
  "marca_producto": "APPLE",
  "tipo_producto": "MacBoock",
  "modelo": "15 plus",
  "color": "negra",
  "descripcion_producto": "roto",
  "precio": 200000000
}
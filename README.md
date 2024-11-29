'marcas', 'GET', 'MarcaApiController', 'mostrarTodo': este endpoint sirve para listar todos los datos que se encuentran en la tabla marcas.

'marcas/:marca_producto', 'GET', 'MarcaApiController', 'mostrar': este endpoint sirve para ver los productos pertenecientes  una marca especifica , por ejemplo si el endpoint solicitado es 'marca/:MOTOROLA', 'GET', 'MarcaApiController', 'mostrar', mostrara los productos de la marca MOTOROLA.

'productos/:id_productos', 'GET', 'ProductoApiController', 'mostrar': este endpoint sirve para ver un producto especifico por su ID, por ejemplo si el endpoint solicitado es 'producto/:12', 'GET', 'ProductoApiController', 'mostrar', mostrara el producto con el ID 12.

'productos', 'POST', 'ProductoApiController', 'añadir': este endpoint sirve para añadir un producto nuevo con sus respectivos datos.


'productos/:id_productos', 'PUT', 'ProductoApiController', 'modificar': este endpoint sirve para modificar los datos de un producto segun su ID, por ejemplo si el endpoint es 'producto/:12', 'PUT', 'ProductoApiController', 'modificar', este modificara los datos del producto con el ID 12. 

'marcas', 'POST', 'MarcaApiController', 'añadir': este endpoint sirve para añadir una marca.

'marcas/:id', 'PUT', 'MarcaApiController', 'modificar': este endpoint sirve para modificar los atributos de una marca.

http://localhost/API/api/marcas?orderBy=idDESC: Este endpoint sirve para ordenar las marcas de forma descendente por su id.

http://localhost/API/api/marcas?orderBy=idASC: Este endpoint sirve para ordenar las marcas de forma ascendente por su id.

http://localhost/API/api/productos?orderBy=precioASC: Este endpoint sirve para ordenar los productos de forma ascendente por su precio.

http://localhost/API/api/productos?orderBy=precioDESC: Este endpoint sirve para ordenar los productos de forma descendente por su precio.

ejemplo PUT Productos: 
{
  "tipo_producto": "CELULAR",
  "modelo": "G30",
  "color": "AZUL",
  "descripcion_producto": "NUEVO",
  "precio": 30
}

ejemplo POST Productos:
{
  "marca_producto": "APPLE",
  "tipo_producto": "MacBoock",
  "modelo": "15 plus",
  "color": "negra",
  "descripcion_producto": "roto",
  "precio": 200000000
}

ejemplo PUT Marcas:

{
   "importador": "INDIA",
   "pais_origen": "GROENLANDIA"
}

ejemplo POST Marcas:
{
   "nombre_marca": "MOTOROLA",
   "importador": "INDIA",
   "pais_origen": "GROENLANDIA"
}

GET(VER UN ID EN ESPECIAL):

http://localhost/API/api/marcas/7

http://localhost/API/api/productos/15


LA BASE DE DATOS TIENE COMO NOMBRE "WEB 2", CON UNA SEPARACION ENTRE WEB Y 2

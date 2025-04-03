/**
 * **Caso 2: Información de un Producto de una Tienda Online**
Estás construyendo una tienda en línea y necesitas representar la información de los productos en objetos JavaScript.
**Tareas:**

1. **Creación del Objeto:**
    - Define un objeto llamado `producto` con las siguientes propiedades:
        - `nombre`: El nombre del producto.
        - `precio`: El precio del producto.
        - `descripcion`: Una breve descripción del producto.
        - `stock`: La cantidad disponible en stock.
        - `imagenes`: Un arreglo con las URLs de las imágenes del producto.
    - Agrega un método llamado `mostrarDetalles` que imprima en la consola el nombre, precio y descripción del producto.
2. **Acceso y Actualización:**
    - Imprime en la consola el precio del producto.
    - Reduce el valor de `stock` en 1 (se ha vendido un producto).
    - Agrega una nueva imagen al arreglo `imagenes`.
    - Llama al método `mostrarDetalles`.
3. **Exploración:**
    - Verifica si el objeto `producto` tiene la propiedad "descuento" e imprime el resultado.
    - Imprime la cantidad de propiedades que tiene el objeto producto.
 */

    const producto = {
        nombre: "Laptop XYZ",
        precio: 1200,
        descripcion: "Laptop de alto rendimiento",
        stock: 10,
        imagenes: ["./img/camiseta1.webp", "./img/camiseta2.webp"],
        mostrarDetalles () {
          console.log(`Nombre: ${this.nombre}, Precio: $${this.precio}, Descripción: ${this.descripcion}`);
        },
      };
      
      console.log("Precio del producto: ", producto.precio);
      producto.stock--;
      console.log(producto.stock)
      producto.imagenes.push("./img/camiseta3.webp");
      producto.mostrarDetalles();
      console.log(producto.imagenes)
      console.log(producto.hasOwnProperty("descuento"));
      console.log(Object.keys(producto).length);
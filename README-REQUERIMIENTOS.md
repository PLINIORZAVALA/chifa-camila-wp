# 📋 Requerimientos de la Tienda en Línea - Chifa Camila

Este documento detalla el estado de cada requerimiento solicitado para la plataforma e-commerce basada en WordPress y WooCommerce.

## ✅ Requerimientos Implementados

1. **WooCommerce instalado y configurado**
   - Plugin presente y documentado en `DESARROLLO.md`.
   - Configuración básica realizada.

2. **Menú principal con opción Tienda y carrito**
   - Planificado en la guía de desarrollo.
   - Estructura del menú lista para incluir Tienda, Blog, Contacto, etc.
   - Estructura para productos simples y variables.
4. **Botón de WhatsApp en tienda, producto, carrito y checkout**
   - Plugin `oneclick-whatsapp-order` instalado y configurado.
   - Código y documentación muestran integración en todas las páginas relevantes.
5. **Página de tienda con categorías y productos en filas**
   - Uso de ShopEngine y WooCommerce para mostrar productos y categorías.
   - Widgets y plantillas disponibles.

6. **Página de producto con botón de carrito y WhatsApp**
   - Integración activa de ambos botones.
   - Opciones para botón flotante y persistente.

7. **Página de carrito con botón de finalizar compra y WhatsApp**
   - Funcionalidad implementada.

8. **Checkout con métodos de pago personalizados**
   - Métodos de pago configurados en WooCommerce.
   - Documentación indica agregar Transferencia, Contra reembolso, Mercado Pago, Yape y WhatsApp.

9. **Zonas de envío configurables**
   - WooCommerce permite crear zonas y métodos de envío.
   - Documentado en la guía.

10. **Cupones de descuento (EPIIS123, 10%)**
    - WooCommerce soporta cupones.
    - Integración con WhatsApp activa.

11. **Gestión de pedidos y producto descargable (PDF)**
    - WooCommerce permite productos descargables.
    - Documentación indica cómo crear y probar pedidos.

---

- **Creación manual de productos y categorías:**
  - Se debe ingresar todos los productos reales de la empresa (mínimo 15), con imágenes y descripciones optimizadas.

- **Configuración visual del menú principal:**
  - Verificar que el menú en el sitio real muestre todas las opciones requeridas.

- **Configuración de métodos de pago locales:**
  - Mercado Pago y Yape requieren integración y pruebas reales.

- **Configuración de zonas de envío:**
  - Definir regiones y métodos según la logística de la empresa.

- **Creación y prueba de cupones:**
  - Crear producto PDF, simular compra y validar proceso de descarga vía WhatsApp.
- **Validación visual y funcional:**
  - Revisar que los botones de WhatsApp y carrito sean visibles y funcionales en todas las páginas.
  - Verificar que la tienda muestre productos en filas de 3 y las categorías sean accesibles.
---

## 📝 Recomendaciones



**Última revisión:** 15 de agosto de 2025


# ⚠️ Solución: Botón 'Añadir al carrito' no aparece en la tienda

---

## 🏷️ Pasos para crear y validar el cupón EPIIS123 en WooCommerce

1. **Accede al panel de administración de WordPress**
   - Ingresa a http://localhost/chifaCamila/wp-admin y accede con tu usuario.

2. **Ve a la sección de cupones**
   - Menú lateral: Marketing > Cupones
   - (En algunas versiones: WooCommerce > Cupones)

3. **Crear un nuevo cupón**
   - Haz clic en “Añadir cupón”.
   - En el campo Código del cupón, escribe: EPIIS123.
   - En Descripción, puedes poner: “Cupón de descuento académico”.

4. **Configura el descuento**
   - En Tipo de descuento, selecciona:
     - “Descuento fijo en el carrito” o “Porcentaje de descuento” (elige 10% si es porcentaje).
   - Ingresa el valor: 10 (si es porcentaje).
   - Configura restricciones si lo deseas (mínimo de compra, productos específicos, fechas, etc.).

5. **Publica el cupón**
   - Haz clic en “Publicar” para guardar el cupón.

6. **Prueba el cupón**
   - Ve a la tienda, añade productos al carrito.
   - En el carrito, ingresa el código EPIIS123 en el campo de cupones y aplica.
   - Verifica que se aplique el descuento correctamente.
Si en la página de tienda solo aparece el botón “Read more” y no puedes agregar productos al carrito, sigue estos pasos:

1. **Verifica la configuración de cada producto:**
   - Ve a **Productos > Todos los productos**
   - Edita cada producto y asegúrate de que:
     - Está marcado como “En stock”
     - Tiene precio asignado
     - El tipo de producto es “Simple” o “Variable”
     - El estado es “Publicado”

2. **Revisa el modo catálogo de WooCommerce:**
   - Ve a **WooCommerce > Ajustes > Productos**
   - Asegúrate de que no está activado el “Modo catálogo” ni plugins que oculten el botón de añadir al carrito

   - Ve a **Apariencia > Personalizar > WooCommerce > Catálogo de productos**
   - Activa la opción “Mostrar botón de añadir al carrito”
   - Desactiva plugins de catálogo si están activos

4. **Productos variables o agrupados:**
   - Asegúrate de que todas las variaciones tengan precio y estén en stock

5. **Permitir añadir varios productos al carrito:**
   - Todos los productos deben estar “En stock” y tener precio
   - El botón “Añadir al carrito” debe aparecer en la tienda y en la página de cada producto
   - Para compras múltiples, puedes instalar un plugin de “Quick Shop” o “WooCommerce Product Table”

---

## 🛒 Pasos para crear productos y categorías en WooCommerce

### 1. Acceder al panel de administración de WordPress
- Ingresa a tu sitio: `http://localhost/chifaCamila/wp-admin`
- Inicia sesión con tu usuario y contraseña.

### 2. Crear categorías de productos
1. Menú lateral: **Productos > Categorías**
2. Completa los campos:
   - **Nombre:** Ejemplo: "Aeropuertos", "Arroz Chaufa", "Bebidas", "Chaufa Especiales", "Chaufa Mixtos", "Sopas (Caldo de Gallina)", "Tallarín Saltado"
   - **Slug:** (se genera automáticamente o puedes personalizarlo)
   - **Descripción:** Breve texto sobre la categoría (opcional)
   - **Imagen:** Sube una imagen representativa (opcional, pero recomendable)
3. Haz clic en **"Añadir nueva categoría"**
4. Repite el proceso para todas las categorías necesarias.

### 3. Crear productos
1. Menú lateral: **Productos > Añadir nuevo**
2. Completa los campos:
   - **Nombre del producto**
   - **Descripción larga** (opcional)
   - **Descripción corta** (opcional)
   - **Imagen del producto** (opcional, pero recomendable)
   - **Categoría** (elige una de las que creaste)
   - **Tipo de producto:** Simple o Variable
   - **Precio**
3. Haz clic en **"Publicar"** para guardar el producto.
4. Repite hasta tener mínimo 15 productos reales, distribuidos en tus categorías.

### 4. Verificar en la tienda
- Ve a la página **Tienda** y revisa que los productos y categorías se muestren correctamente.
- Confirma que cada producto tiene imagen, descripción y precio.

---

## 🖥️ Pasos para la configuración visual del menú principal

### 1. Verificar el menú actual
1. Ingresa al panel de administración: `http://localhost/chifaCamila/wp-admin`
2. Ve a **Apariencia > Menús**
3. Selecciona el menú principal (usualmente llamado “Menú Principal” o “Header”)
4. Revisa que tenga las siguientes opciones:
   - Inicio
   - Nosotros
   - Tienda
   - Blog
   - Contacto
   - (Opcional) Carrito de compras

### 2. Si falta alguna opción, agrégala
1. En la sección de la izquierda, busca “Páginas”, “Productos” o “Enlaces personalizados”
2. Marca la página que falta (por ejemplo, “Tienda”) y haz clic en **“Añadir al menú”**
3. Arrastra para ordenar las opciones según el orden requerido
4. Para el carrito, puedes agregar un enlace personalizado:
   - URL: `/cart` o `/carrito`
   - Texto: “Carrito”
   - Haz clic en **“Añadir al menú”**

### 3. Guardar y comprobar en el sitio
1. Haz clic en **“Guardar menú”**
2. Ve al sitio web y verifica que el menú principal muestre todas las opciones requeridas y que los enlaces funcionen correctamente

---

## 💳 Pasos para instalar y configurar Mercado Pago y Yape en WooCommerce

### 1. Instalar el plugin de Mercado Pago
1. Ingresa al panel de administración: `http://localhost/chifaCamila/wp-admin`
2. Ve a **Plugins > Añadir nuevo**
3. Busca: `Mercado Pago for WooCommerce`
4. Haz clic en **Instalar** y luego en **Activar**

### 2. Configurar Mercado Pago
1. Ve a **WooCommerce > Ajustes > Pagos**
2. Busca "Mercado Pago" en la lista de métodos de pago y haz clic en **Configurar**
3. En la pantalla de configuración, selecciona el tipo de integración que deseas (Checkout Pro, Checkout Básico, etc.)
4. Ingresa tus credenciales de Mercado Pago:
   - **Client ID** y **Client Secret**: Obtén estos datos en tu cuenta de Mercado Pago, sección "Credenciales" (https://www.mercadopago.com.pe/developers/panel/credentials)
   - Copia y pega ambos valores en los campos correspondientes
5. Configura las opciones adicionales:
   - Elige los medios de pago que quieres aceptar (tarjeta, efectivo, etc.)
   - Personaliza el mensaje/instrucciones para el cliente si lo deseas
   - Activa/desactiva el modo sandbox para pruebas
6. Haz clic en **Guardar cambios**
7. Ve a la tienda y realiza una compra de prueba:
   - Elige un producto y procede al checkout
   - Selecciona Mercado Pago como método de pago
   - Completa el proceso y verifica que la transacción se registre correctamente
8. Revisa en tu panel de Mercado Pago que la venta se haya registrado
9. Si todo funciona, desactiva el modo sandbox para ventas reales

**Recomendaciones:**
- Si tienes problemas, revisa que las credenciales sean correctas y que tu cuenta esté habilitada para recibir pagos.
- Consulta la documentación oficial de Mercado Pago para WooCommerce si necesitas ayuda avanzada.

### 3. Instalar y configurar Yape (método personalizado)
1. Ve a **Plugins > Añadir nuevo**
2. Busca: `YAPE A1 Tiendas` o similar
3. Instala y activa el plugin
4. Ve a **WooCommerce > Ajustes > Pagos**
5. Haz clic en **Añadir método de pago** y selecciona "Custom Gateway" o "Transferencia bancaria"
6. Nombra el método como "Yape"
7. En las instrucciones, coloca el número de celular Yape y los pasos para el pago
8. Activa el método y guarda los cambios
9. Realiza una compra de prueba para verificar que aparece y funciona

### 4. Recomendaciones finales
- Verifica que ambos métodos aparezcan en el checkout
- Realiza pruebas reales de pago
- Documenta cualquier ajuste adicional realizado

---

**Pasos para verificar productos variables o agrupados:**

1. Ve a **Productos > Todos los productos** en el panel de WordPress.
2. Busca los productos que sean de tipo **Variable** o **Agrupado** y haz clic en **Editar**.
3. En la pantalla de edición, ve a la sección **Datos del producto** y selecciona **Variable** o **Agrupado** según corresponda.
4. Para productos variables:
   - Ve a la pestaña **Variaciones**.
   - Revisa cada variación:
     - Asegúrate de que cada una tenga un **precio** asignado.
     - Marca la casilla “En stock” para cada variación.
     - Si alguna variación no tiene precio o está marcada como “Agotado”, el botón de añadir al carrito no aparecerá correctamente.
   - Haz clic en **Guardar cambios** en la sección de variaciones.
5. Para productos agrupados:
   - Verifica que todos los productos agrupados estén “En stock” y tengan precio.
6. Ve a la tienda y comprueba que puedes añadir las variaciones al carrito desde la página del producto.

**Recomendación:**
- Realiza una compra de prueba con cada variación para asegurarte que el proceso funciona correctamente.
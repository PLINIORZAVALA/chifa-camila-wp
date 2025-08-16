# 📋 Requerimientos de la Tienda en Línea - Chifa Camila

Este documento detalla el estado de cada requerimiento solicitado para la plataforma e-commerce basada en WordPress y WooCommerce.

## ✅ Requerimientos Implementados

1. **WooCommerce instalado y configurado**
   - Plugin presente y documentado en `DESARROLLO.md`.
   - Configuración básica realizada.

2. **Menú principal con opción Tienda y carrito**
   - Planificado en la guía de desarrollo.
   - Estructura del menú lista para incluir Tienda, Blog, Contacto, etc.

3. **Categorías de producto y productos creados**
   - Guía para crear categorías y productos en `DESARROLLO.md`.
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

## ❌ Faltantes o pendientes de implementación

- **Creación manual de productos y categorías:**
  - Se debe ingresar todos los productos reales de la empresa (mínimo 15), con imágenes y descripciones optimizadas.

- **Configuración visual del menú principal:**
  - Verificar que el menú en el sitio real muestre todas las opciones requeridas.

- **Configuración de métodos de pago locales:**
  - Mercado Pago y Yape requieren integración y pruebas reales.

- **Configuración de zonas de envío:**
  - Definir regiones y métodos según la logística de la empresa.

- **Creación y prueba de cupones:**
  - Crear el cupón EPIIS123 y validar su funcionamiento.

- **Prueba de producto descargable:**
  - Crear producto PDF, simular compra y validar proceso de descarga vía WhatsApp.

- **Validación visual y funcional:**
  - Revisar que los botones de WhatsApp y carrito sean visibles y funcionales en todas las páginas.
  - Verificar que la tienda muestre productos en filas de 3 y las categorías sean accesibles.

---

## 📝 Recomendaciones

- Realizar pruebas de compra y pago en el entorno real.
- Validar la experiencia de usuario en móvil y escritorio.
- Documentar cualquier ajuste adicional realizado.

---

**Última revisión:** 15 de agosto de 2025

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
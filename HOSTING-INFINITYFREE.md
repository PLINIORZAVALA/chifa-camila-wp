# 🌐 Guía de Hosting - Chifa Camila en InfinityFree

**Paso a paso para subir tu sitio WordPress a hosting gratuito**

---

## 🎯 **INFORMACIÓN DEL HOSTING**

**Proveedor:** InfinityFree  
**Plan:** Hosting Gratuito  
**Email de cuenta:** 201072@unamba.edu.pe  
**Características:**
- ✅ Espacio: Ilimitado
- ✅ Ancho de banda: Ilimitado  
- ✅ Bases de datos MySQL: 400
- ✅ Subdominios: Ilimitados
- ✅ SSL gratuito
- ✅ Panel de control cPanel

---

## 📋 **REQUISITOS PREVIOS**

### **✅ Lo que debes tener listo ANTES de empezar:**
```
✅ Sitio WordPress funcionando en local (http://localhost/chifaCamila)
✅ Todas las páginas creadas y configuradas
✅ Contenido añadido (textos, imágenes, menús)
✅ Plugins instalados y configurados
✅ Cuenta activa en InfinityFree
```

### **❌ Si aún no tienes esto, DETENTE y complétalo primero:**
- Configuración básica de WordPress
- Páginas principales creadas
- Menús de navegación configurados
- Contenido añadido a las páginas

---

## 🚀 **PROCESO COMPLETO DE MIGRACIÓN**

### **FASE 1: Preparación del Dominio (15 minutos)**

#### **1.1 Crear Cuenta de Hosting**
```bash
📍 Sitio web: https://infinityfree.net
📧 Email: 201072@unamba.edu.pe
⏱️ Tiempo: 5 minutos

PASOS:
1. Ir a infinityfree.net
2. Hacer clic en "Create Account" (si no tienes cuenta)
3. Verificar email
4. Iniciar sesión con tu cuenta
```

#### **1.2 Crear Nuevo Sitio Web**
```bash
📍 Ubicación: Panel de InfinityFree > Crear cuenta de hosting
⏱️ Tiempo: 10 minutos

PASOS:
1. En el panel principal, hacer clic en "Create Account"
2. Elegir subdominio:
   - Opción 1: chifacamila.rf.gd
   - Opción 2: chifacamila.atwebpages.com
   - Opción 3: chifacamila.my03.com
3. Contraseña: [crear contraseña segura]
4. Hacer clic en "Create Account"
5. Esperar confirmación (puede tomar 5-10 minutos)
```

### **FASE 2: Configuración del Hosting (20 minutos)**

#### **2.1 Acceder al Panel de Control** ✅ COMPLETADO
```bash
📍 Ubicación: Email de confirmación o panel de InfinityFree
⏱️ Tiempo: 5 minutos

INFORMACIÓN RECIBIDA:
✅ URL del sitio: https://chifacamila.great-site.net
✅ Usuario de cuenta: if0_39644372
✅ Contraseña: **************
✅ Estado: Activo
✅ Fecha de creación: 06-08-2025

DATOS CONFIRMADOS:
✅ Dominio asignado: chifacamila.great-site.net
✅ Cuenta activa y funcionando
✅ Listo para configurar cPanel
```

#### **2.2 Acceder a cPanel**
```bash
📍 Hacer clic en el enlace de cPanel del email
⏱️ Tiempo: 2 minutos

VERIFICAR:
✅ Acceso a cPanel exitoso
✅ Panel en español o inglés (cambiar si es necesario)
✅ Sección "Bases de datos" visible
✅ Sección "Archivos" visible
```

#### **2.3 Crear Base de Datos MySQL**
```bash
📍 Ubicación: cPanel > Bases de datos MySQL
⏱️ Tiempo: 10 minutos

PASOS:
1. Hacer clic en "Bases de datos MySQL"
2. Crear nueva base de datos:
   - Nombre: chifacamila_bd
3. Crear usuario de base de datos:
   - Usuario: chifacamila_user
   - Contraseña: [contraseña segura]
4. Asignar usuario a base de datos:
   - Seleccionar usuario y base de datos
   - Otorgar "Todos los privilegios"
5. ANOTAR estos datos (los necesitarás después):
   - Nombre de BD: [prefijo]_chifacamila_bd
   - Usuario: [prefijo]_chifacamila_user
   - Contraseña: [la que creaste]
   - Host: localhost
```

#### **2.4 Activar SSL Gratuito**
```bash
📍 Ubicación: cPanel > SSL/TLS
⏱️ Tiempo: 3 minutos

PASOS:
1. Ir a "SSL/TLS"
2. Hacer clic en "Let's Encrypt SSL"
3. Seleccionar tu dominio
4. Hacer clic en "Issue Certificate"
5. Esperar confirmación (puede tomar unos minutos)
```

### **FASE 3: Preparar Archivos Locales (30 minutos)**

#### **3.1 Exportar Base de Datos Local**
```bash
📍 Ubicación: http://localhost/phpmyadmin
⏱️ Tiempo: 10 minutos

PASOS:
1. Abrir phpMyAdmin (http://localhost/phpmyadmin)
2. Seleccionar base de datos "chifacamila"
3. Hacer clic en "Exportar"
4. Configuración:
   - Método: Rápido
   - Formato: SQL
5. Hacer clic en "Continuar"
6. Guardar archivo como: chifacamila_backup.sql
```

#### **3.2 Preparar Archivos de WordPress**
```bash
📍 Ubicación: C:\xampp2\htdocs\chifaCamila
⏱️ Tiempo: 15 minutos

PASOS:
1. Comprimir toda la carpeta chifaCamila en ZIP
2. O copiar todos los archivos a una carpeta temporal
3. IMPORTANTE: No incluir la carpeta wp-config.php aún
```

#### **3.3 Configurar wp-config.php**
```bash
📍 Ubicación: Archivo wp-config.php local
⏱️ Tiempo: 5 minutos

CREAR NUEVO wp-config.php con estos datos:
```

**CONTENIDO PARA wp-config.php (IMPORTANTE - Copia exactamente):**
```php
<?php
/**
 * Configuración de WordPress para InfinityFree
 */

// ** Configuración de base de datos ** //
define( 'DB_NAME', '[prefijo]_chifacamila_bd' );     // Nombre de tu BD
define( 'DB_USER', '[prefijo]_chifacamila_user' );   // Usuario de BD
define( 'DB_PASSWORD', '[tu_contraseña_bd]' );       // Contraseña de BD
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

// ** URLs del sitio ** //
define( 'WP_HOME', 'https://chifacamila.great-site.net' );     // Tu dominio
define( 'WP_SITEURL', 'https://chifacamila.great-site.net' );  // Tu dominio

// ** Claves de seguridad ** //
// Generar en: https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',         'poner aquí clave generada' );
define( 'SECURE_AUTH_KEY',  'poner aquí clave generada' );
define( 'LOGGED_IN_KEY',    'poner aquí clave generada' );
define( 'NONCE_KEY',        'poner aquí clave generada' );
define( 'AUTH_SALT',        'poner aquí clave generada' );
define( 'SECURE_AUTH_SALT', 'poner aquí clave generada' );
define( 'LOGGED_IN_SALT',   'poner aquí clave generada' );
define( 'NONCE_SALT',       'poner aquí clave generada' );

// ** Configuración especial para InfinityFree ** //
define( 'FS_METHOD', 'direct' );
define( 'WP_DEBUG', false );

// ** Prefijo de tablas ** //
$table_prefix = 'wp_';

// ** Configuración absoluta de paths ** //
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
```

### **FASE 4: Subir Archivos (45 minutos)**

#### **4.1 Subir Archivos vía Administrador de Archivos**
```bash
📍 Ubicación: cPanel > Administrador de archivos
⏱️ Tiempo: 30 minutos

PASOS:
1. En cPanel, hacer clic en "Administrador de archivos"
2. Navegar a carpeta "htdocs" o "public_html"
3. Eliminar archivos por defecto (index.html, etc.)
4. Subir archivo ZIP de WordPress:
   - Hacer clic en "Subir"
   - Seleccionar tu archivo ZIP
   - Esperar que se suba (puede tomar tiempo)
5. Extraer archivo ZIP:
   - Hacer clic derecho en el archivo ZIP
   - Seleccionar "Extract"
   - Confirmar extracción
6. Mover archivos a raíz si es necesario
```

#### **4.2 Configurar wp-config.php en el Servidor**
```bash
📍 Ubicación: Administrador de archivos > wp-config.php
⏱️ Tiempo: 10 minutos

PASOS:
1. En el administrador de archivos, buscar wp-config.php
2. Hacer clic derecho > "Edit" o "Code Editor"
3. Reemplazar todo el contenido con el wp-config.php que preparaste
4. VERIFICAR que los datos de BD sean correctos
5. Guardar archivo (Ctrl + S)
```

#### **4.3 Configurar Permisos de Archivos**
```bash
📍 Ubicación: Administrador de archivos
⏱️ Tiempo: 5 minutos

CONFIGURAR PERMISOS:
1. Seleccionar carpeta wp-content
2. Hacer clic derecho > "Change Permissions"
3. Establecer: 755
4. Marcar "Recurse into subdirectories"
5. Para archivo wp-config.php:
   - Permisos: 644
```

### **FASE 5: Importar Base de Datos (20 minutos)**

#### **5.1 Acceder a phpMyAdmin en el Hosting** ✅ ACCEDIENDO
```bash
📍 Ubicación: cPanel > phpMyAdmin
⏱️ Tiempo: 5 minutos

PASOS:
1. ✅ En cPanel, hacer clic en "phpMyAdmin" - COMPLETADO
2. 🔄 PRÓXIMO: Crear base de datos si no existe
3. 🔄 PRÓXIMO: Verificar configuración de base de datos

¡IMPORTANTE! Antes de importar datos, asegúrate de tener:
- Base de datos local exportada desde XAMPP
- Sitio WordPress funcionando en localhost
```

#### **5.2 Importar Base de Datos**
```bash
📍 Ubicación: phpMyAdmin > Importar
⏱️ Tiempo: 10 minutos

PASOS:
1. Hacer clic en "Importar"
2. Hacer clic en "Seleccionar archivo"
3. Elegir tu archivo chifacamila_backup.sql
4. Configuración:
   - Formato: SQL
   - Codificación: utf8_general_ci
5. Hacer clic en "Continuar"
6. Esperar confirmación de importación exitosa
```

#### **5.3 Actualizar URLs en Base de Datos**
```bash
📍 Ubicación: phpMyAdmin > SQL
⏱️ Tiempo: 5 minutos

EJECUTAR ESTAS CONSULTAS SQL:
```

**CONSULTAS SQL para cambiar URLs:**
```sql
-- Actualizar URL principal
UPDATE wp_options SET option_value = 'https://chifacamila.great-site.net' 
WHERE option_name = 'home';

UPDATE wp_options SET option_value = 'https://chifacamila.great-site.net' 
WHERE option_name = 'siteurl';

-- Actualizar URLs en contenido
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost/chifaCamila', 'https://chifacamila.great-site.net');

-- Actualizar URLs en metadatos
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost/chifaCamila', 'https://chifacamila.great-site.net');
```

### **FASE 6: Pruebas y Verificación (15 minutos)**

#### **6.1 Acceso Inicial al Sitio**
```bash
📍 URL: https://chifacamila.rf.gd
⏱️ Tiempo: 5 minutos

VERIFICAR:
✅ El sitio carga correctamente
✅ No hay errores de base de datos
✅ El diseño se ve correcto
✅ El certificado SSL funciona (https://)
```

#### **6.2 Probar Funcionalidades**
```bash
⏱️ Tiempo: 10 minutos

VERIFICAR:
✅ Navegación entre páginas funciona
✅ Menús cargan correctamente
✅ Imágenes se muestran
✅ Página de administración accesible (/wp-admin)
✅ Plugins funcionan correctamente
```

### **FASE 7: Configuración Final (10 minutos)**

#### **7.1 Acceder al Panel de WordPress**
```bash
📍 URL: https://chifacamila.rf.gd/wp-admin
⏱️ Tiempo: 5 minutos

PASOS:
1. Ir a tu-dominio/wp-admin
2. Iniciar sesión con tus credenciales locales
3. Verificar que todo funciona
4. Actualizar permalinks:
   - Ajustes > Enlaces permanentes
   - Guardar cambios
```

#### **7.2 Configuraciones de Seguridad**
```bash
📍 Ubicación: WordPress Admin
⏱️ Tiempo: 5 minutos

CONFIGURAR:
✅ Cambiar contraseña de administrador si es necesario
✅ Verificar usuarios activos
✅ Actualizar información de contacto
✅ Verificar plugins activos
```

---

## 🔧 **SOLUCIÓN DE PROBLEMAS COMUNES**

### **❌ Error: "Error al establecer conexión con la base de datos"**
```bash
SOLUCIÓN:
1. Verificar datos en wp-config.php
2. Confirmar que la base de datos fue creada
3. Revisar permisos de usuario de BD
```

### **❌ Error 404 en páginas internas**
```bash
SOLUCIÓN:
1. Ir a wp-admin > Ajustes > Enlaces permanentes
2. Guardar configuración (regenera .htaccess)
```

### **❌ Imágenes no cargan**
```bash
SOLUCIÓN:
1. Verificar URLs en base de datos
2. Ejecutar consultas SQL de actualización de URLs
3. Re-subir imágenes si es necesario
```

### **❌ Sitio muy lento**
```bash
SOLUCIÓN:
1. Optimizar imágenes antes de subir
2. Instalar plugin de caché
3. Minimizar plugins activos
```

---

## ✅ **CHECKLIST FINAL DE MIGRACIÓN**

### **Antes de considerar completa la migración:**
```bash
☐ Sitio accesible via HTTPS
☐ Todas las páginas cargan correctamente
☐ Menús de navegación funcionan
☐ Imágenes se muestran correctamente
☐ Formularios funcionan (Contact Form 7)
☐ WooCommerce funciona (si aplica)
☐ Panel de administración accesible
☐ SSL certificado activo
☐ Velocidad de carga aceptable
☐ Responsive design funciona en móvil
☐ SEO básico configurado
```

---

## 📱 **INFORMACIÓN DEL SITIO FINAL**

**URL Principal:** https://chifacamila.rf.gd  
**Panel de Administración:** https://chifacamila.rf.gd/wp-admin  
**Hosting:** InfinityFree  
**SSL:** Let's Encrypt (Gratuito)  
**Soporte:** Foro de InfinityFree  

---

## 🎯 **PRÓXIMOS PASOS DESPUÉS DE LA MIGRACIÓN**

### **Optimización:**
1. Instalar plugin de caché
2. Optimizar imágenes
3. Configurar SEO con Yoast
4. Crear sitemap XML

### **Marketing:**
1. Configurar Google Analytics
2. Registrar en Google My Business
3. Crear perfiles en redes sociales
4. Promocionar el sitio

### **Mantenimiento:**
1. Realizar backups regulares
2. Actualizar WordPress y plugins
3. Monitorear velocidad y seguridad
4. Revisar estadísticas periódicamente

---

**💡 Importante:** Guarda todos los datos de acceso (cPanel, base de datos, WordPress admin) en un lugar seguro.

**🚀 ¡Tu sitio web de Chifa Camila estará en línea y accesible desde cualquier dispositivo con internet!**

**📧 Para entregar:** Envía la URL https://chifacamila.rf.gd para revisión académica.

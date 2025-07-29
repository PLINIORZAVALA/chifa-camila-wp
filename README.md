# Chifa Camila 🥢

Un sitio web moderno para restaurante chifa construido con WordPress, diseñado para ofrecer una experiencia excepcional tanto para clientes como para el equipo del restaurante.

## 📋 Descripción

Chifa Camila es un sitio web completo para un restaurante de comida china-peruana (chifa) que incluye funcionalidades para mostrar el menú, realizar reservas, pedidos en línea y gestionar la información del restaurante.

## 🚀 Características

- **Diseño Responsivo**: Optimizado para dispositivos móviles, tablets y escritorio
- **Gestión de Menú**: Sistema completo para mostrar platos, precios y categorías
- **Sistema de Reservas**: Permite a los clientes reservar mesas en línea
- **Pedidos en Línea**: Funcionalidad para pedidos para entrega o recojo
- **Galería de Imágenes**: Showcase de platos y ambiente del restaurante
- **Información de Contacto**: Ubicación, horarios y datos de contacto
- **Blog/Noticias**: Sección para promociones y noticias del restaurante
- **Panel de Administración**: Gestión completa desde WordPress Admin

## 🛠️ Tecnologías Utilizadas

- **CMS**: WordPress (última versión)
- **Servidor Local**: XAMPP
- **Base de Datos**: MySQL
- **Lenguajes**: PHP, HTML5, CSS3, JavaScript
- **Temas**: Compatible con temas personalizados de WordPress

## 📦 Requisitos del Sistema

### Servidor Web
- Apache 2.4 o superior
- PHP 7.4 o superior
- MySQL 5.7 o superior / MariaDB 10.3 o superior

### Desarrollo Local
- XAMPP 8.0 o superior
- WordPress 6.0 o superior

## 🔧 Instalación

### 1. Configuración del Entorno Local

```bash
# Asegúrate de que XAMPP esté ejecutándose
# Inicia Apache y MySQL desde el panel de control de XAMPP
```

### 2. Base de Datos

1. Abre phpMyAdmin en `http://localhost/phpmyadmin`
2. Crea una nueva base de datos llamada `chifacamila`
3. La configuración de la base de datos está en `wp-config.php`:
   - **Nombre de BD**: `chifacamila`
   - **Usuario**: `root`
   - **Contraseña**: (vacía por defecto en XAMPP)
   - **Host**: `localhost`

### 3. Configuración de WordPress

1. Navega a `http://localhost/chifaCamila`
2. Sigue el asistente de instalación de WordPress
3. Configura el sitio con los siguientes datos:
   - **Título del sitio**: Chifa Camila
   - **Usuario administrador**: (tu elección)
   - **Contraseña**: (segura)
   - **Email**: (tu email)

### 4. Configuración Inicial

```bash
# Accede al panel de administración
http://localhost/chifaCamila/wp-admin

# Configura los permalinks
Ajustes > Enlaces permanentes > Estructura personalizada: /%postname%/
```

## 📁 Estructura del Proyecto

```
chifaCamila/
├── wp-admin/                 # Panel de administración de WordPress
├── wp-content/              # Contenido personalizable
│   ├── themes/             # Temas del sitio
│   │   ├── twentytwentyfive/
│   │   ├── twentytwentyfour/
│   │   └── twentytwentythree/
│   ├── plugins/            # Plugins instalados
│   │   ├── akismet/
│   │   └── hello.php
│   └── uploads/            # Archivos subidos (imágenes, etc.)
├── wp-includes/            # Core de WordPress
├── wp-config.php          # Configuración principal
├── index.php             # Archivo principal
└── README.md             # Este archivo
```

## 🎨 Personalización

### Temas
- El sitio viene con los temas por defecto de WordPress
- Se recomienda crear un tema hijo para personalizaciones
- Archivos de tema en: `wp-content/themes/`

### Plugins Recomendados
- **WooCommerce**: Para funcionalidad de e-commerce
- **Contact Form 7**: Formularios de contacto
- **Yoast SEO**: Optimización SEO
- **WP Reservation**: Sistema de reservas
- **Elementor**: Constructor de páginas
- **WP Super Cache**: Caché para mejor rendimiento

## 🔒 Seguridad

### Configuración Básica
1. Cambia las claves de seguridad en `wp-config.php`
2. Usa contraseñas fuertes para todos los usuarios
3. Instala plugins de seguridad como Wordfence
4. Mantén WordPress y plugins actualizados

### Backup
```bash
# Respalda la base de datos regularmente
# Respalda la carpeta wp-content/
# Usa plugins como UpdraftPlus para backups automáticos
```

## 🚀 Despliegue en Producción

### 1. Preparación
```bash
# Exporta la base de datos desde phpMyAdmin
# Comprime todos los archivos del proyecto
```

### 2. Servidor de Producción
1. Sube todos los archivos al servidor web
2. Crea la base de datos en el hosting
3. Importa la base de datos
4. Actualiza `wp-config.php` con los datos del servidor
5. Actualiza las URLs en la base de datos

### 3. Configuración de Dominio
```sql
-- Actualizar URLs en la base de datos
UPDATE wp_options SET option_value = 'https://chifacamila.com' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://chifacamila.com' WHERE option_name = 'siteurl';
```

## 📱 SEO y Performance

### Optimización
- Usa imágenes optimizadas (WebP cuando sea posible)
- Implementa caché (WP Super Cache o similar)
- Configura CDN si es necesario
- Optimiza la base de datos regularmente

### SEO
- Instala Yoast SEO o RankMath
- Configura sitemap XML
- Optimiza meta descripciones y títulos
- Implementa datos estructurados para restaurantes

## 🐛 Solución de Problemas

### Problemas Comunes

**Error de conexión a la base de datos**
```php
// Verifica wp-config.php
define( 'DB_NAME', 'chifacamila' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
```

**Error 404 en páginas**
1. Ve a Ajustes > Enlaces permanentes
2. Guarda la configuración para regenerar .htaccess

**Problemas de permisos**
```bash
# En servidor Linux/Mac
chmod 755 wp-content/
chmod 644 wp-config.php
```

## 📞 Soporte

### Documentación
- [WordPress Codex](https://codex.wordpress.org/)
- [Documentación de Desarrolladores](https://developer.wordpress.org/)

### Comunidad
- [Foros de WordPress](https://es.wordpress.org/support/)
- [Stack Overflow](https://stackoverflow.com/questions/tagged/wordpress)

## 📄 Licencia

Este proyecto utiliza WordPress, que está licenciado bajo GPL v2 o posterior.

## 👥 Contribuciones

Si deseas contribuir al proyecto:

1. Fork del repositorio
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit de tus cambios (`git commit -am 'Añade nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

## 📝 Changelog

### Versión 1.0.0 (2025-07-29)
- Instalación inicial de WordPress
- Configuración básica del proyecto
- Estructura de archivos establecida
- README inicial creado

---

**Desarrollado con ❤️ para Chifa Camila**

*Para más información o soporte, contacta al equipo de desarrollo.*

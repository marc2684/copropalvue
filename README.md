### VUE-OCREND-FRAMEWORK
- Implementación de vue cli + vuex + vue-router + axios + Ocrend Framework 3 REST (Sin controladores ni rutas)

### Configuración inicial
- Para la API, es necesario editar en *./src/store/store.js*
```javascript
{
    ...
    
    api : 'http://localhost/OCREND/vue-ocrend-framework/api/'
}
```

### Cómo iniciar el setup

``` bash
# instalar todas las dependencias de vue
npm install

# levanta el servidor de desarrollo en localhost:8080
npm run dev

# para compilar a producción se debe utilizar
npm run build
```
- Es necesario que apache esté activo, para que [Ocrend Framework](https://github.com/prinick96/Ocrend-Framework) funcione.

### Cómo utilizar el sistema de usuarios
``` bash

# Moverse a la rama que contiene el sistema de usuarios
git checkout users-system-base

# Instalar las nuevas dependencias
npm install
```
- Debe existir una previa instalación de la tabla en la base de datos y la configuración de Ocrend.ini.yml

## Sobre Ocrend Software

- [@web](https://ocrend.com)

## Licencia

[MIT](http://opensource.org/licenses/MIT)

Copyright (c) 2018-presente Brayan Narváez
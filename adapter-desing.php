<?php

// Estamos trabajando con distintas versiones de sistemas operativos Windows 7 y Windows 10. Al compartir archivos como Word, Excel, Power Point, surgen problemas al abrirlos en Windows 10 debido a la falta de compatibilidad con la versión Windows 7. Debes crear un programa donde Windows 10 pueda aceptar estos archivos independientemente de que sean de versiones anteriores.
// Para ello, aplica el patrón de diseño Adapter.



// Interfaz que define el comportamiento esperado para abrir archivos
interface Archivo {
    public function abrir();
}

// Clase que representa un archivo de Word de una versión anterior
class ArchivoWordAntiguo implements Archivo {
    public function abrir() {
        return "Abriendo archivo de Word de versión antigua.";
    }
}

// Clase que representa un archivo de Excel de una versión anterior
class ArchivoExcelAntiguo implements Archivo {
    public function abrir() {
        return "Abriendo archivo de Excel de versión antigua.";
    }
}

// Clase que representa un archivo de PowerPoint de una versión anterior
class ArchivoPowerPointAntiguo implements Archivo {
    public function abrir() {
        return "Abriendo archivo de PowerPoint de versión antigua.";
    }
}

// Interfaz que define el comportamiento esperado para abrir archivos en Windows 10
interface ArchivoModerno {
    public function abrirArchivo();
}

// Adaptador para archivos de Word
class AdaptadorArchivoWord implements ArchivoModerno {
    private $archivoAntiguo;

    public function __construct(Archivo $archivo) {
        $this->archivoAntiguo = $archivo;
    }

    public function abrirArchivo() {
        return $this->archivoAntiguo->abrir();
    }
}

// Adaptador para archivos de Excel
class AdaptadorArchivoExcel implements ArchivoModerno {
    private $archivoAntiguo;

    public function __construct(Archivo $archivo) {
        $this->archivoAntiguo = $archivo;
    }

    public function abrirArchivo() {
        return $this->archivoAntiguo->abrir();
    }
}

// Adaptador para archivos de PowerPoint
class AdaptadorArchivoPowerPoint implements ArchivoModerno {
    private $archivoAntiguo;

    public function __construct(Archivo $archivo) {
        $this->archivoAntiguo = $archivo;
    }

    public function abrirArchivo() {
        return $this->archivoAntiguo->abrir();
    }
}
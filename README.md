
# Proyecto PHP - Estadísticas Básicas y Sistemas de Ecuaciones

Este proyecto forma parte del laboratorio de **Introducción a la Programación en PHP**. Contiene dos ejercicios desarrollados con programación orientada a objetos y tipado fuerte, además de una interfaz gráfica básica para el usuario final.

---

## 🧮 Ejercicio 1: Sistema de Ecuaciones Lineales (2x2)

Se resuelve un sistema de ecuaciones lineales utilizando el **método de sustitución**. Las ecuaciones se representan mediante arrays asociativos y se encapsulan en una clase orientada a objetos.

### Estructura

- `SistemaEcuaciones` (abstracta)
- `SistemaLineal` (implementación)
- Interfaz gráfica para ingresar los coeficientes de las ecuaciones

### Uso

1. Ingresa los valores de las ecuaciones en la interfaz.
2. Se calcula automáticamente el valor de `x` y `y`.
3. Se validan los datos para evitar errores algebraicos (como división por 0).

---

## 📊 Ejercicio 2: Estadísticas Básicas

Se calcula la **media**, **mediana** y **moda** de uno o más conjuntos de datos numéricos.

### Estructura

- `Estadistica` (abstracta)
- `EstadisticaBasica` (implementación)
- Interfaz gráfica para ingresar conjuntos de datos separados por comas.

### Uso

1. Introduce los conjuntos de datos.
2. El sistema calculará y mostrará media, mediana y moda por conjunto.

---

## 📁 Estructura del Proyecto

```
Proyecto-2P/
│
├── Sistema_Ecuaciones/
│   ├── Classes/
│   │   ├── SistemaEcuaciones.php
│   │   └── SistemaLineal.php
│   ├── Controllers/
│   │   └── Procesar.php
│   └── index.php
│   └── styles.css
├── Estadisticas_Basicas/
│   ├── Classes/
│   │   ├── Estadistica.php
│   │   └── EstadisticaBasica.php
│   ├── Controllers/
│   │   └── Procesar.php
│   └── index.php
│   └── styles.css 
└── README.md
```

---

## 🚀 Requisitos

- PHP 8.x o superior
- XAMPP o cualquier servidor local (Apache + PHP)
- Navegador web moderno

---

## ▶️ ¿Cómo ejecutar?

1. Clona o descarga este repositorio en la carpeta `htdocs` de XAMPP:

   ```bash
   git clone https://github.com/ChristianDonoso23/Proyecto-2P.git
   ```

2. Abre XAMPP y enciende el servidor Apache.

3. Accede en tu navegador a:

   ```
   http://localhost/Proyecto-2P/Sistema_Ecuaciones/
   http://localhost/Proyecto-2P/Estadisticas_Basicas/
   ```

---

## 🧠 Autor

- Christian Donoso
- Universidad de las Fuerzas Armadas ESPE
- Aplicación de tecnologías Web
- Año: 2025

---

## 📌 Notas

- El proyecto utiliza **tipado fuerte** con `declare(strict_types=1);`.
- Se puede extender fácilmente para sistemas más grandes o estadísticas avanzadas.

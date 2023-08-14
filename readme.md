# Trabajo Sube 2023:
El siguiente trabajo es un enunciado iterativo. Todas las semanas nuevos requerimientos serán agregados y/o modificados para ilustrar la dinámica de desarrollo de software.

## Iteración 1.

Escribir un programa con programación orientada a objetos que permita ilustrar el funcionamiento del transporte urbano de pasajeros de la ciudad de Rosario.

Las clases que interactúan en la simulación son: Colectivo, Tarjeta y Boleto.

Cuando un usuario viaja en colectivo con una tarjeta, obtiene un boleto como resultado de la operación $coletivo->pagarCon($tarjeta);


Para esta iteración se consideran los siguientes supuestos:

- No hay medio boleto de ningún tipo.
- No hay transbordos.
- No hay viajes plus.
- La tarifa básica de un pasaje es de: $120
- Las cargas aceptadas de tarjetas son: (150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000)
- El límite de saldo de una tarjeta es de $6600

Se pide:

- Hacer un fork del repositorio.
- Implementar el código de las clases Tarjeta, Colectivo y Boleto.
- Hacer que el test Boleto.php funcione correctamente con todos los montos de pago listados.
- Enviar el enlace del repositorio al mail del profesor con los integrantes del grupo(Un mail por grupo).


Para instalar el código inicial clonar el repositorio y luego ejecutar:
```
composer install
```

En caso de no contar con composer instalado, descargarlo desde: https://getcomposer.org/
Para correr los tests:
```
./vendor/bin/phpunit
```

Si se agregan nuevas clases al código tal vez sea necesario correr:
```
composer dump-autoload
```

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

## Iteración 2.
Para esta iteración hay 3 tareas principales. Crear un [issue](https://docs.github.com/es/issues/tracking-your-work-with-issues/creating-an-issue) en github copiando la descripción de cada tarea y completar cada uno en una rama diferente. Éstas serán mergeadas al validar, luego de una revisión cruzada (de ambos integrantes del grupo), que todo el código tiene sentido y está correctamente implementado. Ademas deberan configurar Github Actions.

No es necesario que todo el código para un issue esté funcionando al 100% antes de mergiarlo, pueden crear pull requests que solucionen algún item particular del problema para avanzar más rápido.

Además de las tareas planteadas, cada grupo tiene tareas pendientes de la iteración anterior que debe finalizar antes de comenzar con la iteración 2. Cuando la iteración 1 esté completada, [crear un tag](https://www.youtube.com/watch?v=5DkX3HFgklM) llamado iteracion1: Y subirlo a github.

IMPORTANTE: Como punto de control, alguna de estas dos funcionalidades: "Viaje plus" o "Franquicia de Boleto" tiene que estar lista para revisar a mitad de la iteración. (5 de Septiembre).

## Descuento de saldos.
- Cada vez que una tarjeta paga un boleto, descuenta el valor del monto gastado.
- Si la tarjeta se queda sin saldo, la operación ```$colectivo->pagarCon($tarjeta)``` devuelve FALSE,
- Escribir un test que valide dos casos, pagar con saldo y pagar sin saldo.

## Viaje plus
- Si la tarjeta se queda sin crédito, puede tener un saldo negativo de hasta $211,84.
- Cuando se vuelve a cargar la tarjeta, se descuenta el saldo de lo que se haya consumido en concepto de viaje plus.
- Escribir un test que valide que la tarjeta no pueda quedar con menos saldo que el permitido.
- Escribir un test que valide que el saldo de la tarjeta descuenta correctamente el/los viaje/s plus otorgado/s.

## Franquicia de Boleto.
- Existen dos tipos de franquicia en lo que refiere a tarjetas, las franquicias parciales, como el medio boleto estudiantil o el universitario, y las completas como las de jubilados(Notar que también existe boleto gratuito para estudiantes).
- Implementar cada tipo de tarjeta como una Herencia de la tarjeta original.
- Para esta iteración considerar simplemente que cuando se paga con una tarjeta del tipo MedioBoleto el costo del pasaje vale la mitad, independientemente de cuántas veces se use y que día de la semana sea.
- Escribir un test que valide que una tarjeta de FranquiciaCompleta siempre puede pagar un boleto.
- Escribir un test que valide que el monto del boleto pagado con medio boleto es siempre la mitad del normal.

## Iteracion 3
Al igual que la iteración anterior, se pide mantener la mecánica de trabajo para ir añadiendo las nuevas funcionalidades y/o modificaciones (issue, una rama específica para cada tarea y finalmente el mergeo cuando todo funcione correctamente..., etc.)
En esta iteración daremos una introducción a la manipulación de fechas y horarios. Éstos serán necesarios en esta oportunidad para realizar las modificaciones pedidas. Consultar este video para conocer más sobre el manejo de fechas y horas en PHP: https://www.youtube.com/watch?v=dVRl1kqxdwY

## Más datos sobre el boleto.
  La clase boleto tendrá nuevos métodos que permitan conocer: (Fecha, tipo de tarjeta, línea de colectivo, total abonado, saldo e ID de la tarjeta. El boleto deberá indicar además el saldo restante en la tarjeta.
Además el boleto tiene una descripción extra indicando si se canceló el saldo negativo con el pago de este boleto (Ejemplo: Abona saldo 120).
- Escribir los tests correspondientes a los posibles tipos de boletos a obtener según el tipo de tarjeta.
## Limitación en el pago de medio boletos
  Para evitar el uso de una tarjeta de tipo medio boleto en más de una persona en el mismo viaje se pide que:
Al utilizar una tarjeta de tipo medio boleto para viajar, deben pasar como mínimo 5 minutos antes de realizar otro viaje. No será posible pagar otro viaje antes de que pasen estos 5 minutos.
- Escribir un test que verifique efectivamente que no se deje marcar nuevamente al intentar realizar otro viaje en un intervalo menor a 5 minutos con la misma tarjeta medio boleto. Para el caso del medio boleto, se pueden realizar hasta cuatro viajes por día. El quinto viaje ya posee su valor normal.
- Escribir un test que verifique que no se puedan realizar más de cuatro viajes por día con medio boleto.
## Limitación en el pago de franquicias completas.
  Para evitar el uso de una tarjeta de tipo boleto educativo gratuito en más de una persona en el mismo viaje se pide que:
Al utilizar una tarjeta de tipo boleto educativo gratuito se pueden realizar hasta 2 viajes gratis por día.
- Escribir un test que verifique que no se puedan realizar más de dos viajes gratuitos por día.
- Escribir un test que verifique que los viajes posteriores al segundo se cobran con el precio completo.
## Saldo de la tarjeta.
  Una tarjeta SUBE no puede almacenar más de 6600 pesos. Por lo tanto cuando se realiza una carga que haga que se supere este límite, se deberá acreditar la carga en la tarjeta hasta alcanzar el monto máximo permitido y el monto restante se deberá dejar pendiente de acreditación. Luego ese saldo pendiente se acredita a medida que se usa la tarjeta.
- Modificar la función para cargar la tarjeta añadiendo esta funcionalidad.
- Escribir un test que valide que si a una tarjeta se le carga un monto que supere el máximo permitido, se acredite el saldo hasta alcanzar el máximo(6600) y que el excedente quede almacenado y pendiente de acreditación.
- Escribir un test que valide que luego de realizar un viaje, verifique si hay saldo pendiente de acreditación y recargue la tarjeta hasta llegar al máximo nuevamente.


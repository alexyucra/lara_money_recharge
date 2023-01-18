# Caso Practico - Depósito de Recargas

La empresa necesita una solución que le permita registrar las apuestas deportivas de sus clientes; los clientes envían dos tipos de información:
• PlayerID: ID del jugador
• Voucher de deposito: Dicho voucher contempla el monto a recargar, así como el banco sobre el cual depositaron.

Un promotor de ventas atiende al cliente por algún canal de comunicación (WhatsApp o TeleGram),
es importante identificar el medio por el cual se realizó la atención, ya que ese dato es un indicador
importante para el análisis de información. 

El promotor recibe el deposito y realiza la recarga al cliente. 
Posterior a ello el debe visualizar el saldo del cliente en su panel de billetero virtual. 

La solución debe permitir saber cuanto se recargo al cliente, que medio se uso, el banco y también
poder consultar información histórica del cliente, considerar que un promotor puede equivocarse e
ingresar un monto erróneo al cliente, por lo cual debe tener la opción de actualizar el monto de
recarga. 

## passos para implementación 

Una posible solución para este escenario podría ser la creación de una aplicación web que permita a los promotores de ventas registrar las apuestas deportivas de los clientes. La aplicación tendría las siguientes características:

- Un formulario de registro para clientes donde el promotor puede ingresar la información de PlayerID y Deposit Voucher. El formulario también debe tener un campo para el canal de comunicación utilizado (WhatsApp o Telegram) para identificar el medio por el cual se brindó la atención.

- Un panel de billetera virtual (wallet) donde el promotor puede ver el saldo del cliente y recargar al cliente.

- Una sección de historial donde el promotor puede ver las transacciones pasadas del cliente, permitiendo actualizar el monto de la recarga si hay algún error.

- Una opción para comprobar los datos bancarios. (falta implementar)

- Validación para asegurarse de que el PlayerID y el Cupón de depósito se ingresen correctamente.

- Una sección de administración donde un administrador puede ver todas las transacciones, clientes y promotores. (falta implementar)

- Una función de informes que permite generar informes sobre las transacciones y los clientes para el análisis de datos. (falta implementar)

- Inicio de sesión seguro y acceso basado en roles para garantizar que solo el personal autorizado pueda acceder a la aplicación. (falta implementar)

La aplicación debe diseñarse para que sea fácil de usar y fácil de usar, con instrucciones claras y mensajes de validación para ayudar a los promotores a ingresar la información correcta. La aplicación también debe estar diseñada para ser segura y confiable para proteger la información y las transacciones de los clientes.
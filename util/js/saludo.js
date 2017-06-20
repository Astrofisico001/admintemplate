var notification = window.Notification || window.mozNotification || window.webkitNotificat
if ('undefined' === typeof notification)
    alert('Tu navegador no soporta notificaciones');
else
    notification.requestPermission(function (permission) {

        if ('undefined' === typeof notification)
            alert('Tu navegador no soporta notificaciones');
        else
            notification.requestPermission(function (permission) {
            });
        Notifica("Bienvenida", "Bienvenido al sistema beer");
    });

function Notifica(titulo, contenido)
{
    if ('undefined' === typeof notification)
        return false; //Not supported....
    var notificar = new notification(
            titulo, {
                body: contenido, //el texto o resumen de lo que deseamos notificar
                dir: 'auto', // izquierda o derecha (auto) determina segun el idioma y region
                lang: 'ES', //El idioma utilizado en la notificación
                tag: 'notificationPopup', //Un ID para el elemento para hacer get/set de ser necesario
                icon: '../../img/logo.png' //El URL de una imágen para usarla como icono
            }
    );
    notificar.onclick = function () {
        console.log('notification.Click');
    };
    notificar.onerror = function () {
        console.log('notification.Error');
    };
    notificar.onshow = function () {
        console.log('notification.Show');
    };
    notificar.onclose = function () {
        console.log('notification.Close');
    };
    return true;
}
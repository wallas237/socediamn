
self.addEventListener("push", (event)=>{
    notification = event.data.json()
    event.waitUntil(self.registration.showNotification(notification.title, {
        body: notification.body,
        icon: "../../img/logo.PNG",
        data:{
            notifURL: notification.url
        }
    }))
})

self.addEventListener("noficationclick", (event)=>{
    event.waitUntil(clients.openWindow(event.notification.data.notifURL));
})




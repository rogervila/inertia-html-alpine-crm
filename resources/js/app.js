import { createInertiaApp } from 'inertia-html'
import Alpine from 'alpinejs'

createInertiaApp({
    resolve: name => require(`./Pages/${name}.html`),
    setup({ el, isServer, load, props }) {
        load({ target: el, isServer, props }).then(() => {
            window.Alpine = Alpine
            Alpine.start()
        })
    },
})

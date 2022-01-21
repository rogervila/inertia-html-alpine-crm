
import { createInertiaApp } from 'inertia-html'

createInertiaApp({
    resolve: name => require(`./Pages/${name}.html`),
    setup({ el, isServer, load, props }) {
        load({ target: el, isServer, props })
    },
})

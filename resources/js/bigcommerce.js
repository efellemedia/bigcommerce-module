import routes from './routes'

// append routes
window.Fusion.booting((router, state) => router.addRoutes(routes))

// register components
window.Vue.component('bigcommerce-settings-fieldsets', require('./components/settings/Fieldsets').default)
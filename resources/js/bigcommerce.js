import routes from './routes'

window.Fusion.booting(function (router, state) {
    router.addRoutes(routes)
})
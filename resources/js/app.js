import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createPinia } from 'pinia'
import * as helpers from './helpers'

createInertiaApp({
  progress: {
    color: '#4F46E5',
    includeCSS: true,
    showSpinner: false,
  },
  resolve: name => {
    const pages = import.meta.glob('./app/Pages/**/*.vue', { eager: true })
    return pages[`./app/Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    const pinia = createPinia()
    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(pinia)

    app.config.globalProperties.$helpers = helpers

    app.mount(el)
  },
})
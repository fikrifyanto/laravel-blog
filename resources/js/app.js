// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createPinia } from 'pinia'
import * as helpers from './helpers'

// Require Froala Editor js file.
import 'froala-editor/js/froala_editor.pkgd.min.js'
import 'froala-editor/js/plugins/font_size.min.js'
import 'froala-editor/js/plugins/colors.min.js'
import 'froala-editor/js/plugins/inline_class.min.js'
import 'froala-editor/js/plugins/inline_style.min.js'
import 'froala-editor/js/plugins/align.min.js'
import 'froala-editor/js/plugins/link.min.js'
import 'froala-editor/js/plugins/image.min.js'
import 'froala-editor/js/plugins/video.min.js'
import 'froala-editor/js/plugins/table.min.js'
import 'froala-editor/js/plugins/emoticons.min.js'
import 'froala-editor/js/plugins/special_characters.min.js'
import 'froala-editor/js/third_party/embedly.min.js'
import 'froala-editor/js/plugins/fullscreen.min.js'
import 'froala-editor/js/third_party/spell_checker.min.js'
import 'froala-editor/js/plugins/code_view.min.js'
import 'froala-editor/js/plugins/code_beautifier.min.js'
import 'froala-editor/js/plugins/paragraph_format.min.js'
import 'froala-editor/js/plugins/help.min.js'

// Require Froala Editor css files.
import 'froala-editor/css/froala_editor.pkgd.min.css'
import 'froala-editor/css/froala_style.min.css'

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
      .use(VueFroala)

    app.config.globalProperties.$helpers = helpers

    app.mount(el)
  },
})
import js from '@eslint/js'
import pluginVue from 'eslint-plugin-vue'

export default [
  js.configs.recommended,
  ...pluginVue.configs['flat/recommended'],
  {
    languageOptions: {
      globals: {
        // Mendaftarkan variabel global browser & Node agar tidak dianggap error 'not defined'
        fetch: 'readonly',
        URL: 'readonly',
        console: 'readonly',
        process: 'readonly',
      },
    },
    rules: {
      // Aturan tambahan jika diperlukan
    }
  }
]
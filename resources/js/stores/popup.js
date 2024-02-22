import { defineStore } from "pinia";
import { watch } from "vue";

export const usePopupStore = defineStore('popup', {
    state: () => ({
        isShow: false,
        isCancel: false,
        isConfirm: false,
        title: '',
        message: '',
        type: 'success',
        forms: {},
        formSubmitted: {},
        confirmButtonType: 'primary',
        confirmButtonText: '',
        cancelButtonText: '',
        cancelButtonType: 'secondary',
        watchChange: null
    }),
    actions: {
        show(data = null) {
            this.isShow = true
            this.formSubmitted = {}

            if (data) {
                this.title = data.title
                this.message = data.message
                this.confirmButtonText = data.confirmButtonText
                this.cancelButtonText = data.cancelButtonText
            }
        },
        clear() {
            this.isShow = false
            this.isCancel = false
            this.isConfirm = false
            this.title = ''
            this.message = ''
            this.type = 'success'
            this.forms = {}
            this.formSubmitted = {}
            this.confirmButtonType = 'primary'
            this.confirmButtonText = ''
            this.cancelButtonText = ''
            this.cancelButtonType = 'secondary'
        },
        close() {
            this.clear()
            this.isCancel = true
        },
        confirm() {
            const formSubmitted = this.formSubmitted
            this.clear()
            this.formSubmitted = formSubmitted
            this.isConfirm = true
        },
        bind() {
            this.clear()
            this.isShow = !this.isShow
        },
        setType(value) {
            this.type = value
        },
        setForms(value) {
            this.forms = value
        },
        setTitle(title) {
            this.title = title
        },
        setMessage(message) {
            this.message = message
        },
        setConfirmButtonText(text) {
            this.confirmButtonText = text
        },
        setCancelButtonText(text) {
            this.cancelButtonText = text
        },
        change(callback) {
            this.watchChange = watch(() => this.isShow, () => {
                if (this.isShow == false) {
                    callback(this.$state)
                    this.watchChange()
                } else {
                    callback(this.$state)
                }
            })
        }
    }
})
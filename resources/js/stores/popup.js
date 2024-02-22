import { defineStore } from "pinia";

export const usePopupStore = defineStore('popup', {
    state: () => ({
        isShow: false,
        title: '',
        message: '',
        confirmButton: false,
        confirmButtonText: '',
        cancelButton: false,
        cancelButtonText: ''
    }),
    actions: {
        show() {
            this.isShow = true
        },
        hide() {
            this.isShow = false
        },
        bind() {
            this.isShow = !this.isShow
        },
    }
})
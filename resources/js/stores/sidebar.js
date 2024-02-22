import { defineStore } from "pinia";

export const useSidebarStore = defineStore('sidebar', {
    state: () => ({
        isShow: false
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
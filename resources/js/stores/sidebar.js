import { defineStore } from "pinia";
import { isMobile } from "../helpers";

export const useSidebarStore = defineStore('sidebar', {
    state: () => ({
        isShow: isMobile() ? false : true
    }),
    actions: {
        show() {
            this.isShow = true
        },
        close() {
            this.isShow = false
        },
        bind() {
            this.isShow = !this.isShow
        },
    }
})
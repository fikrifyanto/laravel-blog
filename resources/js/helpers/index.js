export function isMobile() {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        return true;
    } else {
        return false;
    }
}

export function capitalizeFirstLetter(string) {
    if (!string) return null
    return string.charAt(0).toUpperCase() + string.slice(1);
}
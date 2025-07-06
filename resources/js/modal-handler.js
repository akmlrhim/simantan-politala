setTimeout(() => {
    const toasts = document.querySelectorAll('[id^="toast-"]');
    toasts.forEach((toast) => {
        toast.style.transition = "opacity 0.5s ease";
        toast.style.opacity = "0";
        setTimeout(() => {
            toast.style.display = "none";
        }, 500);
    });
}, 3000);

window.showDeleteModal = function (actionUrl, message) {
    const form = document.getElementById("deleteForm");
    const messageElement = document.getElementById("modalMessage");
    const modal = document.getElementById("deleteModal");

    if (form && messageElement && modal) {
        form.action = actionUrl;
        messageElement.innerText = message;
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }
};

window.closeDeleteModal = function () {
    const modal = document.getElementById("deleteModal");
    if (modal) {
        modal.classList.remove("flex");
        modal.classList.add("hidden");
    }
};

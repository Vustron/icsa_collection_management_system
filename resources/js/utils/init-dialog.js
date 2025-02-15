export function initializeDialogs() {

    window.showDialog = function (id) {
        const dialog = document.getElementById(id);
        document.body.style.overflow = 'hidden';
        dialog.showModal();
    };

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            document.body.style.overflow = 'auto';
        }
    });

    window.closeDialog = function (id) {
        document.getElementById(id).close();
        document.body.style.overflow = 'auto';
    }
}
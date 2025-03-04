export function initializeDialogs() {
    let modals_opend = 0;
    window.showDialogByID = function (id, code = -1, userData = null) {

        // wala nako kabalo hahahah ala ko nag consider man gud what if mag open nag daghan kayug dialogs na pasunod^2 dele naku ma maintain ang iyang data, :< mao rajud ni akong na huna^2 an HAHAHA my bad

        if (userData && code == 0) {
            document.getElementById("aar_user_id").value = userData['id'];
            document.getElementById("aar_user_name").value = userData['user_name'];
        }

        const dialog = document.getElementById(id);
        document.body.style.overflow = 'hidden';
        modals_opend++;
        dialog.showModal();
    };

    document.addEventListener('keydown', function (event) {
        modals_opend = Math.max(0, modals_opend - 1);
        if (event.key === 'Escape' && modals_opend == 0) {
            document.body.style.overflow = 'auto';
        }
    });

    window.closeDialog = function (id) {
        modals_opend = Math.max(0, modals_opend - 1);
        document.getElementById(id).close();
        if (modals_opend == 0) {
            document.body.style.overflow = 'auto';
        }
    }
}
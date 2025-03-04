<x-ui.modal.dialog id="admin_manager_delete_admin" title="Confirm Delete Admin">
    <form method="POST" id="admin_delete_form">
        @csrf
        @method('delete')
        <div class="p-6 border border-red-300 text-red-600">
            Are you sure you want to delete username <span id="username_to_delete" class="underline"></span>?
        </div>
        <button type="submit" class="w-full mt-2 py-3 focus:outline-none focus:right-0 rounded bg-red-600 text-white">
            Confirm Delete
        </button>
    </form>
</x-ui.modal.dialog>

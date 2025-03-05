<x-ui.modal.dialog id="admin_manager_delete_admin" title="Confirm Delete Admin">
    <form method="POST" id="admin_delete_form">
        @csrf
        @method('delete')
        <div class="border border-red-300 p-6 text-red-600">
            Are you sure you want to delete username <span id="username_to_delete" class="underline"></span>?
        </div>
        <button type="submit" class="mt-2 w-full rounded bg-red-600 py-3 text-white focus:right-0 focus:outline-none">
            Confirm Delete
        </button>
    </form>
</x-ui.modal.dialog>

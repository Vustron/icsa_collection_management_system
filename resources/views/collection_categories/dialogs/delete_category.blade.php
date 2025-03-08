<x-ui.modal.dialog id="delete_collection_category_modal" title="Confirm Delete Collection Category">
    <form action="{{ route('collection_categories.destroy', '__ID__') }}" method="POST" class="max-w-sm"
        id="collection_category_delete_form">
        @csrf
        @method('delete')
        <div class="border border-red-300 p-6 text-red-600">
            Are you sure you want to delete category named: <span id="collection_name_to_delete"
                class="underline"></span>?
        </div>
        <button type="submit" class="mt-2 w-full rounded bg-red-600 py-3 text-white focus:right-0 focus:outline-none">
            Confirm Delete
        </button>
    </form>
</x-ui.modal.dialog>

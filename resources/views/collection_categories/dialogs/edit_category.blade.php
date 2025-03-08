<x-ui.modal.dialog id="edit_collection_category_modal" title="Edit Collection Category">
    <form action="{{ route('collection_categories.update', '__ID__') }}" method="POST" class=" max-w-sm"
        id="collection_category_edit_form">
        @csrf
        @method('put')

        <input type="hidden" name="institute_id" value="{{ auth()->user()['institute_id'] }}">

        <div class="space-y-2">
            <div class="space-y-2">
                <x-ui.form.label for="edit_category_name">Category Name</x-ui.form.label>
                <x-ui.form.input type="text" name="category_name" id="edit_category_name" placeholder="Category Name"
                    required class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400" />
            </div>
        </div>

        <div class="space-y-2 mt-1">
            <div class="space-y-2">
                <x-ui.form.label for="edit_description">Description</x-ui.form.label>
                <textarea name="description" id="edit_description" placeholder="Enter category description..."
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-[1.5px] focus:ring-violet-400 focus:border-violet-400 resize-none"
                    rows="4"></textarea>
            </div>
        </div>

        <x-ui.button.dynamic-button type="submit" variant="default" size="default"
            class="submitBtn mt-3 w-full bg-red-600 hover:bg-red-700 focus:ring-red-500">
            Update Category
        </x-ui.button.dynamic-button>
    </form>
</x-ui.modal.dialog>

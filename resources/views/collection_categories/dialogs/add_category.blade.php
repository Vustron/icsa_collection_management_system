<x-ui.modal.dialog id="collection_categories_add_collection" title="Add New Category" class="max-w-sm">
    <form action="{{ route('collection_categories.store') }}" method="POST">
        @csrf

        <input type="hidden" name="institute_id" value="{{ auth()->user()['institute_id'] }}">

        <div class="space-y-2">
            <div class="space-y-2">
                <x-ui.form.label for="category_name">Category Name</x-ui.form.label>
                <x-ui.form.input type="text" name="category_name" id="category_name" placeholder="Category Name"
                    required class="border-grey-200 focus:border-none focus:border-purple-400 focus:ring-purple-400"
                    value="{{ old('category_name') }}" />
            </div>
        </div>

        <div class="mt-1 space-y-2">
            <div class="space-y-2">
                <x-ui.form.label for="description">Description</x-ui.form.label>
                <textarea name="description" id="description" placeholder="Enter category description..."
                    class="w-full resize-none rounded-lg border border-gray-300 p-3 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400"
                    rows="4" value="{{ old('description') }}"></textarea>
            </div>
        </div>

        <div class="flex items-center space-x-1">
            <x-ui.button.dynamic-button type="button" variant="outline" size="default"
                class="submitBtn mt-2 w-36 bg-gray-100 hover:bg-gray-300 focus:ring-purple-500"
                onclick="closeDialog('admin_manager_add_admin_role')">
                Cancel
            </x-ui.button.dynamic-button>
            <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                class="submitBtn mt-2 w-full bg-purple-600 hover:bg-purple-700 focus:ring-purple-500">
                Add New Category
            </x-ui.button.dynamic-button>
        </div>
    </form>
</x-ui.modal.dialog>

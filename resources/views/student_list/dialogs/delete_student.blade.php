<x-ui.modal.dialog id="delete_student_modal" title="Confirm Delete Student" class="max-w-sm">
    <form action="{{ route('student_list.destroy', '__ID__') }}" method="POST" id="student_delete_form">
        @csrf
        @method('delete')
        <div class="border border-red-300 p-6 text-red-600">
            Are you sure you want to delete student name: <span id="student_to_delete" class="underline"></span>?
        </div>
        <button type="submit" class="mt-2 w-full rounded bg-red-600 py-3 text-white focus:right-0 focus:outline-none">
            Confirm Delete
        </button>
    </form>
</x-ui.modal.dialog>
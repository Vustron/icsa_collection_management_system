document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-student").forEach((button) => {
        button.addEventListener("click", function () {
            let student = JSON.parse(this.getAttribute("data-student"));

            document.getElementById("student_delete_form").action = document
                .getElementById("student_delete_form")
                .action.replace("__ID__", student.id);

            // console.log(student);

            document.getElementById("student_to_delete").textContent =
                student["first_name"] +
                " " +
                (student["middle_name"] != null
                    ? student["middle_name"] + " "
                    : "") +
                student["last_name"];

            showDialogByID("delete_student_modal");
        });
    });

    // document.querySelectorAll(".view-collection_category").forEach((button) => {
    //     button.addEventListener("click", function () {
    //         let collectionCategory = JSON.parse(
    //             this.getAttribute("data-collection_category"),
    //         );
    //         document.getElementById("view_category_name").textContent =
    //             collectionCategory["category_name"];
    //         document.getElementById("view_category_description").textContent =
    //             collectionCategory["description"];
    //         showDialogByID("view_collection_category");
    //     });
    // });

    document.querySelectorAll(".edit-student").forEach((button) => {
        button.addEventListener("click", function () {
            let student = JSON.parse(this.getAttribute("data-student"));
            console.log(student);

            document.getElementById("student_edit_form").action = document
                .getElementById("student_edit_form")
                .action.replace("__ID__", student.id);

            document.getElementById("edit_first_name").value =
                student["first_name"];
            document.getElementById("edit_last_name").value =
                student["last_name"];
            document.getElementById("edit_middle_ename").value =
                student["middle_name"];
            document.getElementById("edit_email").value = student["email"];
            document.getElementById("edit_school_id").value =
                student["school_id"];
            document.getElementById("edit_rfid").value = student["rfid"];
            document.getElementById("edit_program_id").value =
                student["program_id"];
            document.getElementById("edit_year").value = student["year"];
            document.getElementById("edit_set").value = student["set"];
            document.getElementById("edit_status").value = student["status"];

            showDialogByID("edit_student");
        });
    });
});

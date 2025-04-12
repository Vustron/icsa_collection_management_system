document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll(".delete-collection_category")
        .forEach((button) => {
            button.addEventListener("click", function () {
                let collectionCategory = JSON.parse(
                    this.getAttribute("data-collection_category"),
                );

                document.getElementById(
                    "collection_category_delete_form",
                ).action = document
                    .getElementById("collection_category_delete_form")
                    .action.replace("__ID__", collectionCategory.id);

                document.getElementById(
                    "collection_name_to_delete",
                ).textContent = collectionCategory["category_name"];

                showDialogByID("delete_collection_category_modal");
            });
        });

    document.querySelectorAll(".view-collection_category").forEach((button) => {
        button.addEventListener("click", function () {
            let collectionCategory = JSON.parse(
                this.getAttribute("data-collection_category"),
            );
            document.getElementById("view_category_name").textContent =
                collectionCategory["category_name"];
            document.getElementById("view_category_description").textContent =
                collectionCategory["description"];
            document.getElementById("created_at").textContent =
                "Create on: " +
                new Date(collectionCategory["created_at"]).toLocaleDateString(
                    "en-US",
                    {
                        month: "long",
                        day: "numeric",
                        year: "numeric",
                    },
                );

            showDialogByID("view_collection_category");
        });
    });

    document.querySelectorAll(".edit-collection_category").forEach((button) => {
        button.addEventListener("click", function () {
            let collectionCategory = JSON.parse(
                this.getAttribute("data-collection_category"),
            );

            // console.log(collectionCategory);

            document.getElementById("collection_category_edit_form").action =
                document
                    .getElementById("collection_category_edit_form")
                    .action.replace("__ID__", collectionCategory["id"]);

            document.getElementById("edit_category_name").value =
                collectionCategory["category_name"];
                document.getElementById("edit_collection_fee").value =
                collectionCategory["collection_fee"];
            document.getElementById("edit_description").value =
                collectionCategory["description"];

            showDialogByID("edit_collection_category_modal");
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-user").forEach(button => {
        button.addEventListener("click", function () {

            let userData = JSON.parse(this.getAttribute("data-user"));

            document.getElementById("admin_delete_form").action =
                "{{ route('admin_manager.destroy', '') }}/" + userData.id;

            document.getElementById('username_to_delete').textContent = userData[
                'user_name'];

            showDialogByID("admin_manager_delete_admin");
        });
    });

    document.querySelectorAll(".view-user").forEach(button => {
        button.addEventListener("click", function () {

            let userData = JSON.parse(this.getAttribute("data-user"));
            let tbody = document.getElementById('view_admin_table');
            tbody.innerHTML = "";

            // console.log(userData);
            // console.log(userData['roles']);
            // console.log(userData['roles']);

            document.getElementById("va_institute_name").textContent = userData['institute']['institute_name'];
            document.getElementById("va_username").textContent = userData['user_name'];
            document.getElementById("va_email").textContent = userData['email'];
            document.getElementById("va_status").textContent = userData['status'];

            userData['roles'].forEach(role => {

                let newRow = document.createElement("tr");
                newRow.classList.add("hover:bg-violet-100", "last:border-violet-700", "even:bg-gray-100");

                let cellData = [
                    role["id"],
                    role["role_name"]["role"],
                    role["system_name"]["name"],
                    new Date(role["created_at"]).toLocaleDateString(),
                ];

                cellData.forEach((data) => {
                    let cell = document.createElement("td");
                    cell.classList.add("p-2", "border", "border-gray-300");
                    cell.textContent = data;
                    newRow.appendChild(cell);
                });

                tbody.appendChild(newRow);
            });

            showDialogByID("admin_manager_view_admin");
        });
    });
    document.querySelectorAll(".edit-user").forEach(button => {
        button.addEventListener("click", function () {

            let userData = JSON.parse(this.getAttribute("data-user"));
            // console.log(userData);

            document.getElementById("ea_institute_name").textContent = userData['institute']['institute_name'];
            document.getElementById("ea_user_name").value = userData['user_name'];
            document.getElementById("ea_user_email").value = userData['email'];
            document.getElementById("ea_status").value = userData['status'];

            let tbody = document.getElementById('edit_admin_table');
            tbody.innerHTML = "";
            userData['roles'].forEach(role => {

                let newRow = document.createElement("tr");
                newRow.classList.add("hover:bg-violet-100", "last:border-violet-700", "even:bg-gray-100");

                let cellData = [
                    role["id"],
                    role["role_name"]["role"],
                    role["system_name"]["name"],
                    new Date(role["created_at"]).toLocaleDateString(),
                ];

                cellData.forEach((data) => {
                    let cell = document.createElement("td");
                    cell.classList.add("p-2", "border", "border-gray-300");
                    cell.textContent = data;
                    newRow.appendChild(cell);
                });

                tbody.appendChild(newRow);
            });

            // NOTE: DAPAT PUD DIAY DLI PWEDE MAKA DELETE OG ROLE UNLESS ANG CURRENT NA SYSTEM GINA GAMIT IS SAME SA ROLE NGA E DELETE

            showDialogByID("admin_manager_edit_admin", 0, userData);
        });
    })
});
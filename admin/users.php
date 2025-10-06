<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Management</title>
  <link rel="stylesheet" href="../styles/global_admin.css" />
  <link rel="stylesheet" href="../styles/admin_navbar.css">
  <link rel="stylesheet" href="../styles/admin_users.cssw">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <?php include 'admin_navbar.php'; ?>

  <div class="main-content">
    <div class="header">
      <h2>User Management</h2>
    </div>

    <div class="user-controls">
      <div class="search-container">
        <i class="fa fa-search search-icon"></i>
        <input type="text" id="searchInput" placeholder="Search Users" />
      </div>

      <div class="right-controls">
        <select id="exportSelect">
          <option>Export</option>
          <option value="pdf">PDF</option>
          <option value="csv">CSV</option>
        </select>
        <button class="filter-btn">Apply Filter</button>
      </div>
    </div>

    <div class="table-container">
      <table id="usersTable" class="user-table">
        <thead>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone #</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>

<script>
$(document).ready(function() {
  const table = $("#usersTable").DataTable({
    ajax: "../controls/get_users.php",
    columns: [
      { data: "id" },
      { data: "full_name" },
      { data: "address" },
      { data: "contact_no" },
      {
        data: null,
        render: function(data) {
          return `
            <div class="actions">
              <button class="view-btn" data-id="${data.id}" title="View Details">
                <i class="fa fa-eye"></i>
              </button>
              <button class="download-btn" data-id="${data.id}" title="Download Details">
                <i class="fa fa-file-download"></i>
              </button>
            </div>
          `;
        }
      }
    ],
    dom: 'lrtip',
    pageLength: 10,
    language: {
      loadingRecords: "Loading users...",
      emptyTable: "No users found.",
    }
  });

  $("#searchInput").on("keyup", function() {
    table.search(this.value).draw();
  });
  $("#usersTable").on("click", ".view-btn", function() {
    const id = $(this).data("id");
    $.ajax({
      url: "../controls/get_users.php",
      method: "GET",
      data: { id: id },
      dataType: "json",
      success: function(user) {
        if (user.error) {
          Swal.fire("Error", user.error, "error");
          return;
        }
        Swal.fire({
          title: `<strong>${user.full_name}</strong>`,
          html: `
            <b>Email:</b> ${user.email}<br>
            <b>Contact:</b> ${user.contact_no}<br>
            <b>Address:</b> ${user.address}<br>
          `,
          icon: "info",
          confirmButtonColor: "#f28b82",
        });
      },
      error: function() {
        Swal.fire("Error", "Unable to load user details.", "error");
      }
    });
  });

  // pdf donnload kada row
  $("#usersTable").on("click", ".download-btn", function() {
    const id = $(this).data("id");

    $.ajax({
      url: "../controls/get_users.php",
      method: "GET",
      data: { id: id },
      dataType: "json",
      success: function(user) {
        if (user.error) {
          Swal.fire("Error", user.error, "error");
          return;
        }

        const docDefinition = {
          content: [
            { text: "User Details Report", style: "header" },
            { text: `Generated on: ${new Date().toLocaleString()}`, style: "date" },
            { text: "\n" },
            {
              style: "tableExample",
              table: {
                widths: ["30%", "70%"],
                body: [
                  ["Full Name", user.full_name],
                  ["Email", user.email],
                  ["Contact No.", user.contact_no],
                  ["Address", user.address || "N/A"],
                ]
              },
              layout: "lightHorizontalLines"
            }
          ],
          styles: {
            header: {
              fontSize: 20,
              bold: true,
              alignment: "center",
              margin: [0, 0, 0, 10]
            },
            date: {
              fontSize: 10,
              alignment: "center",
              color: "gray"
            },
            tableExample: {
              margin: [0, 10, 0, 0]
            }
          },
          defaultStyle: {
            fontSize: 12
          }
        };

        pdfMake.createPdf(docDefinition).download(`User_Details_${user.id}.pdf`);
      },
      error: function() {
        Swal.fire("Error", "Unable to generate PDF.", "error");
      }
    });
  });
});
</script>
</body>
</html>

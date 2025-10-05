<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Management</title>

  <!-- Styles -->
  <link rel="stylesheet" href="../styles/global_admin.css" />
  <link rel="stylesheet" href="../styles/admin_navbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
  body {
    background: #fef7f7;
  }

  .user-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
  }

  .search-container {
    position: relative;
    width: 300px;
  }

  .search-container input {
    width: 100%;
    padding: 10px 10px 10px 35px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background: #fff;
    font-size: 15px;
  }

  .search-icon {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #888;
  }

  .right-controls {
    display: flex;
    gap: 10px;
  }

  select, .filter-btn {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 8px 12px;
    background-color: #f7b8b6;
    color: #333;
    cursor: pointer;
    font-weight: 500;
  }

  .filter-btn {
    background-color: #f28b82;
    border: none;
    color: #fff;
  }

  .filter-btn:hover {
    background-color: #e57373;
  }

  .table-container {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  }

  .user-table {
    width: 100%;
    border-collapse: collapse;
  }

  .user-table th {
    background-color: #f8d7da;
    color: #333;
    padding: 12px;
    text-align: left;
  }

  .user-table td {
    padding: 12px;
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
  }

  .actions {
    display: flex;
    gap: 8px;
  }

  .actions button {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.1em;
  }

  .actions .view-btn i {
    color: #555;
  }

  .actions .download-btn i {
    color: #3498db;
  }

  .actions button:hover i {
    transform: scale(1.2);
    transition: 0.2s ease;
  }
  </style>
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
    });

    // Search input
    $("#searchInput").on("keyup", function() {
      table.search(this.value).draw();
    });

    // SweetAlert - View Details
    $("#usersTable").on("click", ".view-btn", function() {
      const id = $(this).data("id");
      $.ajax({
        url: "../controls/get_users.php",
        method: "GET",
        data: { id: id },
        dataType: "json",
        success: function(user) {
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

    // Download as PDF
    // $("#usersTable").on("click", ".download-btn", function() {
    //   const id = $(this).data("id");
    //   window.open(`../controls/download_user_pdf.php?id=${id}`, "_blank");
    // });
  });
  </script>
</body>
</html>

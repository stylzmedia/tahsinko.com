document.getElementById("table-gridjs") &&
    new gridjs.Grid({
        columns: [
            {
                name: "SL",
                formatter: function (e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>");
                },
            },
            {
                name: "Title",
                formatter: function (e) {
                    return gridjs.html('<a href="">' + e + "</a>");
                },
            },
            {
                name: "Status",
                width: "120px",
                formatter: function (e) {
                    return gridjs.html("<input type='checkbox' class='form-check-input' id='customSwitchsizelg' checked=''></input>");
                },
            },

            {
                name: "Actions",
                width: "120px",
                formatter: function (e) {
                    return gridjs.html("<a href='#' class='btn btn-sm btn-info'>Edit</a> <a href='#' class='btn btn-sm btn-danger'>Delete</a>");
                },
            },
        ],
        pagination: { limit: 5 },
        sort: !0,
        search: !0,
        data: [
            ["01", "Digital documentation of COVID-19 certificates: test result: web annex: DDCC:TR core data dictionary, 31 March 2022"],
            ["02", "Women in Jamaican Dancehall: Rethinking Jamaican Dancehall through a Women-Centered Informal Economy Approach, 31 March 2022"],
        ],
    }).render(document.getElementById("table-gridjs"));


    document.getElementById("table-media") &&
    new gridjs.Grid({
        columns: [
            {
                name: "SL",
                formatter: function (e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>");
                },
            },
            {
                name: "Name",
                formatter: function (e) {
                    return gridjs.html('<a href="">' + e + "</a>");
                },
            },
            'Position',
            'Category',

            {
                name: "Actions",
                width: "120px",
                formatter: function (e) {
                    return gridjs.html("<a href='/edit-gallery' class='btn btn-sm btn-info'>Edit</a> <a href='#' class='btn btn-sm btn-danger'>Delete</a>");
                },
            },
        ],
        pagination: { limit: 5 },
        sort: !0,
        search: !0,
        data: [
            ["01", "Photo Gallery","01", "photo-gallery"],
            ["02", "Video Gallery","02", "video-gallery"],
        ],
    }).render(document.getElementById("table-media"));


    document.getElementById("page-gridjs") &&
    new gridjs.Grid({
        columns: [
            {
                name: "SL",
                formatter: function (e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>");
                },
            },
            {
                name: "Title",
                formatter: function (e) {
                    return gridjs.html('<a href="">' + e + "</a>");
                },
            },
            {
                name: "Status",
                width: "120px",
                formatter: function (e) {
                    return gridjs.html("<input type='checkbox' class='form-check-input' id='customSwitchsizelg' checked=''></input>");
                },
            },

            {
                name: "Actions",
                width: "120px",
                formatter: function (e) {
                    return gridjs.html("<a href='/edit-page' class='btn btn-sm btn-info'>Edit</a> <a href='#' class='btn btn-sm btn-danger'>Delete</a>");
                },
            },
        ],
        pagination: { limit: 5 },
        sort: !0,
        search: !0,
        data: [
            ["01", "About Us"],
            ["02", "Contact"],
        ],
    }).render(document.getElementById("page-gridjs"));

    document.getElementById("admin-gridjs") &&
    new gridjs.Grid({
        columns: [
            {
                name: "SL",
                formatter: function (e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>");
                },
            },
            'Name',
            {
                name: "Email",
                formatter: function (e) {
                    return gridjs.html('<a href="">' + e + "</a>");
                },
            },
            'Role',

            {
                name: "Actions",
                width: "120px",
                formatter: function (e) {
                    return gridjs.html("<a href='/edit-page' class='btn btn-sm btn-info'>Edit</a> <a href='#' class='btn btn-sm btn-danger'>Delete</a>");
                },
            },
        ],
        pagination: { limit: 5 },
        sort: !0,
        search: !0,
        data: [
            ["01", "Admin", "admin@gmail.com", "Admin"],
            ["02", "Author", "author@gmail.com", "Author"],
        ],
    }).render(document.getElementById("admin-gridjs"));

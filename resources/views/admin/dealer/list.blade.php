@extends('admin.main')
@section('content')
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .search-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    select {
        width: 200px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #btnSearch {
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-row {
        display: flex;
        align-items: center;
    }

    label {
        font-weight: bold;
        margin-right: 10px;
    }

    select.small-combobox {
        padding: 3px;
        font-size: 12px;
        width: 60px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .short-text {
        width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="search-container mt-3 mb-3">
    <label for="search-input" class="ml-2">Tìm kiếm:</label>
    <input type="text" id="search-input" placeholder="Nhập từ khóa...">

    <label for="typeSearch" class="ml-2">Tìm kiếm theo:</label>
    <select id="typeSearch">
        <option value="dealerName">Tên đại lý</option>
        <option value="phoneNumber">Số điện thoại</option>
    </select>

    <label for="orderType" class="ml-2">Sắp xếp theo:</label>
    <select id="orderType" class="mr-2">
        <option value="dealerName">Tên đại lý</option>
        <option value="phoneNumber">Số điện thoại</option>
    </select>

    <label for="orderBy" class="ml-2">Kiểu Sắp xếp :</label>
    <select id="orderBy" class="mr-2">
        <option value="asc">Tăng dần</option>
        <option value="desc">Giảm dần</option>
    </select>

    <input type="button" id="btnSearch" class="btn btn-success" onclick="clickSearch()" value="Tìm kiếm">
    <a href="/admin/dealer/add" class="btn btn-success"><i class="fas fa-plus mr-1"></i>Thêm</a>
</div>
<div style="min-height: 600px">
    <table id="tbl_data" >
        <tr>
        </tr>
    </table>
</div>
<div id="pagination-container"></div>



<div class="form-row ml-3">
    <label for="pageSize">Hiển thị:</label>
    <select id="pageSize" onchange="changePageSize()" class="small-combobox">
        @for ($i = 1; $i <= 10; $i++)
            <option value="{{ $i }}" @if ($i == 10) selected @endif>{{ $i }}</option>
        @endfor
    </select>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    var searchValue = document.getElementById("search-input").value;
    var typeSearch = document.getElementById("typeSearch").value;
    var orderType = document.getElementById("orderType").value;
    var orderBy = document.getElementById("orderBy").value;
    var currentPage = 1;
    var pageSize = parseInt(document.getElementById("pageSize").value);
    var totalPage = 0;

    function getList() {
        $.ajax({
            url: "/admin/dealer/getList",
            method: "GET",
            data: { searchValue,typeSearch,orderType,orderBy,currentPage,pageSize},
            success: function (result) {
                let rs = JSON.parse(result)
                listData = rs.list;
                totalPage = rs.totalPage;

                $('#tbl_data').html("\
                    <thead>\
                            <tr align='center'>\
                                <th>STT</th>\
                                <th>Tên Đại Lý</th>\
                                <th>Giới Tính</th>\
                                <th>Số điện thoại</th>\
                                <th>Ngày sinh</th>\
                                <th>Quốc gia</th>\
                                <th>Địa chỉ</th>\
                                <th>Mặt hàng kinh doanh</th>\
                                <th>Thao tác</th>\
                            </tr>\
                        </thead>\
                    <tbody id=\"tbl_data_printer\"></tbody>\
                    ");
                let htmlResult = "";
                let ci = (currentPage -1) * pageSize
                let start = ci + 1;
                let end = start + listData.length -1;
                for (let i = start; i <= end; i++) {
                    htmlResult += "\
                    <tr>\
                        <td>" + i + "</td>\
                        <td class ='MSSV'>" + listData[i - ci - 1].dealerName + "</td>\
                        <td class ='MSSV'>" + (listData[i - ci - 1].gender == 0 ? "Nam" : "Nữ") + "</td>\
                        <td class ='MSSV'>" + listData[i - ci - 1].phoneNumber + "</td>\
                        <td class ='MSSV'>" + listData[i - ci - 1].dateOfBirth + "</td>\
                        <td class ='MSSV'>" + listData[i - ci - 1].country + "</td>\
                        <td class ='MSSV'><p class='short-text' title="+listData[i - ci - 1].specificAddress+">" + listData[i - ci - 1].specificAddress + "</p></td>\
                        <td class ='MSSV'>" + listData[i - ci - 1].businessItem + "</td>\
                        <td>\
                        <a href=\"/admin/dealer/edit/"+ listData[i - ci - 1].id + "\"class=\"btn btn-primary mr-2\"><i class=\"fas fa-edit\"></i></a>\
                        <button onclick=\"DeleteDealer("+listData[i - ci - 1].id+",'/admin/dealer/delete')\" class=\"btn btn-danger\"><i class=\"fas fa-trash\"></i></button>\
                    </td>\
                        ";
                }
                $('#tbl_data_printer').append(htmlResult);

                createPagination(totalPage)
                setActivePage();
            }
        }
        )
    }

    function clickSearch() {
        setValue();
    }


    function setValue() {
        searchValue = document.getElementById("search-input").value;
        typeSearch = document.getElementById("typeSearch").value;
        orderType = document.getElementById("orderType").value;
        orderBy = document.getElementById("orderBy").value;
        currentPage = 1;
        pageSize = parseInt(document.getElementById("pageSize").value);
        getList()
    }

    function changePageSize() {
        pageSize = parseInt(document.getElementById("pageSize").value);
        setPage(1);
    }

    function createPagination(totalPages) {

        var previousPage = currentPage - 1;
        var nextPage = currentPage + 1;

        // Tạo chuỗi template cho mã HTML
        var paginationHTML = `
            <nav aria-label="Page navigation example" class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" ${currentPage !== 1 ? `onclick="setPage(${previousPage})"` : ''}>Previous</a>
                </li>`;

        // Tạo các phần tử trang
        for (var i = 1; i <= totalPages; i++) {
            if (i === currentPage) {
                paginationHTML += `
            <li class="page-item active">
              <a class="page-link" href="#" onclick="setPage(${i})">${i}</a>
            </li>`;
            } else {
                paginationHTML += `
            <li class="page-item">
              <a class="page-link" href="#" onclick="setPage(${i})">${i}</a>
            </li>`;
            }
        }

        // Thêm phần tử "Next"
        paginationHTML += `
        <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
          <a class="page-link" href="#" ${currentPage !== totalPages ? `onclick="setPage(${nextPage})"` : ''}>Next</a>
        </li>
      </ul>
    </nav>`;

        // Chèn mã HTML vào phần tử thích hợp trong trang
        var paginationContainer = document.getElementById('pagination-container');
        paginationContainer.innerHTML = paginationHTML;
    }

    getList();


    function setPage(page) {
        if (page < 1) {
            currentPage = 1;
        } else if (page > totalPage) {
            currentPage = totalPage;
        } else {
            currentPage = page;
        }
        getList();
    }

    function setActivePage() {
        var paginationItems = document.querySelectorAll('.page-item');
        paginationItems.forEach(function (item) {
            item.classList.remove('active');
        });
        var currentPageItem = document.querySelector(`.page-item:nth-child(${currentPage + 1})`);
        currentPageItem.classList.add('active');
    }

    function createPagination(totalPages) {

        var previousPage = currentPage - 1;
        var nextPage = currentPage + 1;

        // Tạo chuỗi template cho mã HTML
        var paginationHTML = `
            <nav aria-label="Page navigation example" class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" ${currentPage !== 1 ? `onclick="setPage(${previousPage})"` : ''}>Previous</a>
                </li>`;

        // Tạo các phần tử trang
        for (var i = 1; i <= totalPages; i++) {
            if (i === currentPage) {
                paginationHTML += `
            <li class="page-item active">
              <a class="page-link" href="#" onclick="setPage(${i})">${i}</a>
            </li>`;
            } else {
                paginationHTML += `
            <li class="page-item">
              <a class="page-link" href="#" onclick="setPage(${i})">${i}</a>
            </li>`;
            }
        }

        // Thêm phần tử "Next"
        paginationHTML += `
                <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a class="page-link" href="#" ${currentPage !== totalPages ? `onclick="setPage(${nextPage})"` : ''}>Next</a>
                </li>
            </ul>
            </nav>`;

        // Chèn mã HTML vào phần tử thích hợp trong trang
        var paginationContainer = document.getElementById('pagination-container');
        paginationContainer.innerHTML = paginationHTML;
    }
</script>

@endsection

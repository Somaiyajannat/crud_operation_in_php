<script>
        function pagelimit()
        {
        var select = document.getElementById("page");
        var pageLimit = select.options[select.selectedIndex].value;
        var currentPage = document.getElementById("currentPage").innerHTML;
        //console.log(pageLimit);

        console.log(currentPage);
        window.location.href = "view_user.php?page_number=" + currentPage + "&pageLimit=" + pageLimit;
        }
</script>
//window.location.href("view_user.php?pageLimit="+pageLimit);
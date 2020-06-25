$(document).ready(

    function getISBNFromTable() {
        $('.selling-wanted input').on('click', 'tr', function () { //tbody?
            var rows = $(this).children('td').map(function () {
                return $(this).text();
            }).get();

            var isbnIndex = 1;
            return rows[isbnIndex];
        })
    }
);
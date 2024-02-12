$(document).ready(function () {
    $.ajax({
        method: "GET",
        url: "/admin/totalProduct",
        success: function (response) {
            var formatResponse = response < 10 ? '0' + response : response;
            // console.log(formatResponse);
            $('#prdctCnt').text(formatResponse);
        }
    });
    $.ajax({
        method: "GET",
        url: "/admin/totalAdmin",
        success: function (response) {
            var formatResponse = response < 10 ? '0' + response : response;
            // console.log(formatResponse);
            $('#admnCnt').text(formatResponse);
        }
    });
    $.ajax({
        method: "GET",
        url: "/admin/totalPreciousProgram",
        success: function (response) {
            var formatResponse = response < 10 ? '0' + response : response;
            // console.log(formatResponse);
            $('#prcsCnt').text(formatResponse);
        }
    });
    $.ajax({
        method: "GET",
        url: "/admin/totalHighlightProgram",
        success: function (response) {
            var formatResponse = response < 10 ? '0' + response : response;
            // console.log(formatResponse);
            $('#hghlhtCnt').text(formatResponse);
        }
    });
    $.ajax({
        method: "GET",
        url: "/admin/totalBanner",
        success: function (response) {
            var formatResponse = response < 10 ? '0' + response : response;
            // console.log(formatResponse);
            $('#bnrCnt').text(formatResponse);
        }
    });
});
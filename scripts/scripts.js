$(document).ready(function() {
    setFocus();
    getAllBooksInCategorie();
});

function getQueryStringValue(key) {
    return decodeURI(window.location.search.replace(new RegExp("^(?:.*[&\\?]" +
        escape(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
}

function setFocus() {
    var page = getQueryStringValue("page");
    if (page == "over-ons") {
        $("ul > li.over-ons").addClass('focus');
    }
    if (page == "productenoverzicht" || page == "product-detail" || page == "winkelwagen") {
        $("ul > li.webshop").addClass('focus');
    }
}

function getAllBooksInCategorie() {
    $("#categorie").change(function() {
        var url = window.location.origin + window.location.pathname;
        window.location = url + "?page=productenoverzicht" + "&categorie=" + $("#categorie").val();
    });
}

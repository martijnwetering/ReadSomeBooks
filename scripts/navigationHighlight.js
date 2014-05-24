$(document).ready(function() {
    setFocus();
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
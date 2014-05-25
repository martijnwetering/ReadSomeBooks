$(document).ready(function() {
    setFocus();
    getAllBooksInCategorie();
    updateQuantity();
    recalculateTotal();
    continuShopping();
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
        var value = $(this).val();
        if (value == "alle-producten")
        {
            window.location = url + "?page=productenoverzicht";
        }
        else
        {
            window.location = url + "?page=productenoverzicht" + "&categorie=" + value;
        }
    });
}

function updateQuantity() {
    $(".aantal").on("change", function() {
        var url = window.location.href;
        var productId = $(this).val();
        var quantity = $(this).find("option:selected").text();

        var obj = {
            productId: productId,
            quantity: quantity
        };

        $.ajax({
            type: "POST",
            url: url,
            data: obj
        });
    });
}

function recalculateTotal() {
    $(".herbereken").click(function() {
        location.reload();
    });
}

function continuShopping() {
    $(".verder-winkelen").click(function() {
        var url = window.location.origin + window.location.pathname;
        window.location = url + "?page=productenoverzicht";
    });
}

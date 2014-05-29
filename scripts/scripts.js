$(document).ready(function() {
    setFocus();
    getAllBooksInCategorie();
    updateQuantity();
    recalculateTotal();
    continuShopping();
    addToShoppingCart();
    addItemAndQuantityToShoppingCart();
    closeErrorMessage();
    goToPayment();
    cancelConfirmPayment();
    confirmPayment();
    goToConfirmPayment();
});

// Returns the querystring value for the given key.
function getQueryStringValue(key) {
    return decodeURI(window.location.search.replace(new RegExp("^(?:.*[&\\?]" +
        escape(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
}

// Adds the focus class to the currently active navigation element.
function setFocus() {
    var page = getQueryStringValue("page");
    if (page == "over-ons") {
        $("ul > li.over-ons").addClass('focus');
    }
    if (page == "productenoverzicht" || page == "product-detail"
        || page == "winkelwagen" || page == "afrekenen") {
        $("ul > li.webshop").addClass('focus');
    }
}

// Sorts book based on categorie.
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

// Updates the quantity of an item in the shopping cart.
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
    $(".terug-productenoverzicht").click(function() {
        var url = window.location.origin + window.location.pathname;
        window.location = url + "?page=productenoverzicht";
    });
}

function addToShoppingCart() {
    $(".addToShoppingCart").on("click", function() {
        var that = $(this);
        var productId = that.next().val();
        var obj = {
            item:  productId
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            url: window.location.origin + "/app/shoppingCart.php",
            data: obj
        })
            .success(function(response) {
                if (response.success == true) {
                    that.addClass("in-winkelwagen");
                }
                else
                {
                    $("#error").css("display", "block");
                    $("#error-message").html(response.message);
                }
                console.log(error);
            })
            .error(function(e) {
                console.log(e);
            });
    });
}

function addItemAndQuantityToShoppingCart() {
    $("#bestelHoofdItem").click(function() {
        var that = $(this);
        var productId = $("#productId").val();
        var quantity = $("#aantalHoofdItem").val();

        var obj = {
            item: productId,
            quantity: quantity
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            url: window.location.origin + "/app/shoppingCart.php",
            data: obj
        })
            .success(function(response) {
                if (response.success == true) {
                    that.addClass("in-winkelwagen");
                }
                else
                {
                    $("#error").css("display", "block");
                    $("#error-message").html(response.message);
                }
                console.log(response);
            })
            .error(function(e) {
                console.log(e);
            });
    });
}

function closeErrorMessage() {
    $("#afsluiten").click(function() {
        $("#error").css("display", "none");
    });
}

function goToPayment() {
    $(".afrekenen").click(function() {
        window.location = window.location.origin +
            window.location.pathname +"?page=afrekenen";
    });
}

function goToConfirmPayment() {
    $(".betaal").click(function() {
        $("#overlay").css("display", "block");
        $("#betaal-bevestiging").css("display", "block");
    });
}

function confirmPayment() {
    $("#bevestig").click(function() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: window.location.origin + "/app/checkout.php"
        })
            .success(function(response) {
                if (response.success == true)
                {
                    $("#content").html("U heeft betaald!");
                }
                else
                {
                    $("#content").html("De betaling is helaas mislukt.");
                }
                $("#overlay").css("display", "none");
                $("#betaal-bevestiging").css("display", "none");
            })
            .error(function(e) {
                console.log(e);
            });


    });

}

function cancelConfirmPayment() {
    $("#annuleer").click(function() {
        $("#overlay").css("display", "none");
        $("#betaal-bevestiging").css("display", "none");
    });
}


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
    searchBook();
    setItemsPerPage();
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
            window.location = url + "?page=productenoverzicht&pageNumber=1";
        }
        else
        {
            window.location = url + "?page=productenoverzicht&pageNumber=1" + "&categorie=" + value;
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

// Refreshes the pages so the correct total price is displayed again.
function recalculateTotal() {
    $(".herbereken").click(function() {
        location.reload();
    });
}

// Redirects the user to the product overview page.
function continuShopping() {
    $(".terug-productenoverzicht").click(function() {
        var url = window.location.origin + window.location.pathname;
        window.location = url + "?page=productenoverzicht";
    });
}

// Sends a post request to the server with the item to add to the
// shopping cart. On success it will make the cart button green.
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

// Sends a post request to the server containing the item to add
// and the quantity. On success it will make the cart button green.
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

// Closes the error message.
function closeErrorMessage() {
    $("#afsluiten").click(function() {
        $("#error").css("display", "none");
    });
}

// Redirects to the payment page.
function goToPayment() {
    $(".afrekenen").click(function() {
        window.location = window.location.origin +
            window.location.pathname +"?page=afrekenen";
    });
}

// Gives the user a window where he can confirm his purchase.
function goToConfirmPayment() {
    $(".betaal").click(function() {
        $("#overlay").css("display", "block");
        $("#betaal-bevestiging").css("display", "block");
    });
}

// Sends a get request to the server indicating the user wants to buy
// the items in his shopping cart. If everything is prossesed correctly
// on the server the user will be notified his purchase was succesfull.
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

// Closes the window were the user can confirm his payment.
function cancelConfirmPayment() {
    $("#annuleer").click(function() {
        $("#overlay").css("display", "none");
        $("#betaal-bevestiging").css("display", "none");
    });
}

// Sends a request to the server to search for a book based on the provided
// data in the quesrystring.
function searchBook() {
    $("#submitSearch").click(function() {
        var searchString = $("#searchString").val();
        var url = window.location.origin + window.location.pathname
            + "?page=productenoverzicht&search=" + searchString;
        window.location = url;
    });
}

// Sends to the server the number of items the user wants displayed on the
// product overview page.
function setItemsPerPage() {
    $("#numberOfItemsPerPage").change(function() {
        var recordLimit = $("#numberOfItemsPerPage").val();
        var url = window.location.origin + window.location.pathname
            + "?page=productenoverzicht"+ "&recordLimit=" + recordLimit;
        window.location = url;
    });

}
